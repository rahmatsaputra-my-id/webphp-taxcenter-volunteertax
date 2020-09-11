<?php

class coba extends CI_Controller {
    /* Konstructor : wajib ada !!  */

    function __construct() {
        parent::__construct();
        $this->load->model('m_login');
    }
    
    function encryptIt( $q ) {
        $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
        $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
        return( $qEncoded );
    }

    function decryptIt( $q ) {
        $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
        $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
        return( $qDecoded );
    }
	
	function index() {
		$isi['id']          =$this->m_login->getkodeunik('data_register','id');
        $isi['kursus']      =$this->db
                                  ->get('data_kursus');
        $isi['id_ujian']    =$this->db
                                  ->where('status', 'Aktif')
                                  ->get('tr_ujian')
                                  ->row();
        $this->load->view('login',$isi);
    }

    //fungsi yang pertama kali dipanggil (default)
    function index1() {
        $this->load->view('frontend/indexcoba1');
    }
	
	function index2() {
        $this->load->view('frontend/indexcoba2');
    }

    //fungsi untuk pengecekan data
    function cek_login() {
        if ($this->input->post('username', true) == "" && $this->input->post('password', true) == "") {
            $this->session->set_flashdata('message', 'Email atau Password Tidak Boleh Kosong');
            redirect('login', 'refresh');
        }else{
			$link   ='';
			$username = $this->input->post('username', true);
			$password = $this->input->post('password', true);
			$npassword = $this->encryptIt( $password );
			$this->m_login->cek_login($username, $npassword, $link);
        }
    }
    
    function register() {
        $this->load->helper(array('form'));
        $isi['id']     =$this->m_login->getkodeunik('user','id');
        $this->load->view('register_login',$isi);
    }

    function createregister($id) {
        if ($this->input->post('simpan')){
            $password   = $this->input->post('password');
            $repassword = $this->input->post('repassword');
            $email      = $this->input->post('email');
            $term       = $this->input->post('term');
            if($username && $password && $repassword && $email && $term){
                $checkuser = "SELECT * FROM user WHERE `email`='".$email;
                $query=$this->db->query($checkuser);
                    if ($query->num_rows() > 0){
                        $this->session->set_flashdata('message', 'Username atau Email Sudah digunakan');
                        redirect('login/register/'.$id);
                    }else{
                        $this->m_login->create('user',$this->field_datauser());
                        redirect('login', 'refresh');
                    }
            }else{
                $this->session->set_flashdata('message', 'Lengkapi Form Registrasi Berikut ini dan Ceklis Term and Condition ');
                redirect('guru/login/register/'.$id);
            }
        }else{
            redirect('login/register/'.$id, 'refresh');
        }
    }
    
    function field_datauser()
    {
        $id = $this->input->post('id');
        $password   = $this->input->post('password');
        $npassword  = $this->encryptIt( $password );
        $token = $id*25;
        return array(
            'id'            => $this->input->post('id'),
            'username'      => $this->input->post('username'),
            'password'      => $npassword,
            'email'         => $this->input->post('email'),
            'token'         => $token,
            'display'       => $this->input->post('display')
        );
    }

}
