<?php

class Index extends CI_Controller {
    /* Konstructor : wajib ada !!  */

    function __construct() {
        parent::__construct();
        $this->load->model('m_login'); //load model uploads yang berada di folder model
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->load->model('m_global');
        $this->load->library('email');
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

    //fungsi yang pertama kali dipanggil (default)
    function index() {
        $isi['kelassingle'] = 'beranda';$isi['kelasroot']   = ''; $isi['kelas']     = '';
        $isi['judul']       = 'Beranda';
        $isi['content']     = 'frontend/content';
        $this->load->view('frontend/index',$isi);
    }

    function harga() {
        $isi['kelassingle'] = 'harga';$isi['kelasroot']   = ''; $isi['kelas']     = '';
        $isi['judul']       = 'Harga';
        $isi['content']     = 'frontend/harga';
        $this->load->view('frontend/index',$isi);
    }

    function tentang() {
        $isi['kelassingle'] = 'tentang';$isi['kelasroot']   = ''; $isi['kelas']     = '';
        $isi['judul']       = 'Tentang Kami';
        $isi['content']     = 'frontend/tentang';
        $this->load->view('frontend/index',$isi);
    }

    function prosedur() {
        $isi['kelassingle'] = 'prosedur';$isi['kelasroot']   = ''; $isi['kelas']     = '';
        $isi['judul']       = 'Prosedur';
        $isi['content']     = 'frontend/prosedur';
        $this->load->view('frontend/index',$isi);
    }

    function kontak() {
        $isi['kelassingle'] = 'kontak';$isi['kelasroot']   = ''; $isi['kelas']     = '';
        $isi['judul']       = 'Kontak Kami';
        $isi['content']     = 'frontend/kontak';
        $this->load->view('frontend/index',$isi);
    }

    function faq() {
        $isi['kelassingle'] = 'faq';$isi['kelasroot']   = ''; $isi['kelas']     = '';
        $isi['judul']       = 'Frequently Asked Questions';
        $isi['content']     = 'frontend/faq';
        $this->load->view('frontend/index',$isi);
    }

    function forget() {
        $isi['kelassingle'] = 'Forget';$isi['kelasroot']   = ''; $isi['kelas']     = '';
        $isi['judul']       = 'Forget Password';
        $isi['content']     = 'frontend/forget-password';
        $this->load->view('frontend/index',$isi);
    }
    
    //fungsi yang pertama kali dipanggil (default)
    function login() {
        if ($this->session->userdata('logged_in')) {
            redirect('', 'refresh');
        } else {
            $this->load->helper(array('form'));
            $isi['kelassingle'] = 'login'; $isi['kelasroot']   = ''; $isi['kelas']     = '';
            $isi['judul']       = 'Login';
            $isi['content']     = 'frontend/login';
            $this->load->view('frontend/index',$isi);
        }
    }

    //fungsi untuk pengecekan data
    function cek_login() {
        if ($this->input->post('username', true) == "" && $this->input->post('password', true) == "") {
            $this->session->set_flashdata('message', '<p style="text-align:center;">Email atau Password Tidak Boleh Kosong</p>');
            redirect('index/login', 'refresh');
        }else{
            $link   ='';
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);
            $npassword = $this->encryptIt( $password );
            $this->m_login->cek_login($username, $npassword, $link);
        }
    }

    function registrasi() {
		$status = $this->db->where('id','1')->get('data_kursus')->row_array();
        if($status['status']=='Tidak Aktif'){
			$isi['kelassingle'] = 'registrasi';$isi['kelasroot']   = ''; $isi['kelas']     = '';
			$isi['id']          =$this->m_login->getkodeunik('data_register','id');
			$isi['kursus']      =$this->db->get('data_kursus');
			$isi['judul']       = 'Registrasi';
			$isi['content']     = 'frontend/registrasi-tutup';
			$this->load->view('frontend/index',$isi);
		}else{
			$isi['kelassingle'] = 'registrasi';$isi['kelasroot']   = ''; $isi['kelas']     = '';
			$isi['id']          =$this->m_login->getkodeunik('data_register','id');
			$isi['kursus']      =$this->db->get('data_kursus');
			$isi['judul']       = 'Registrasi';
			$isi['content']     = 'frontend/registrasi';
			$this->load->view('frontend/index',$isi);
		}
    }

    function createregister() {
        if ($this->input->post('submit')){
            $npm        = $this->input->post('npm');
            $email      = $this->input->post('email');
            $term       = $this->input->post('term');
            
            $contentemail   = '
            Terima kasih Anda telah melakukan registrasi Relawan Pajak yang diselenggarakan oleh Tax Center Gunadarma.<br/>
Untuk informasi tahap selanjutnya silahkan dicek di official Instagram kami @taxcenter.ug atau tunggu informasi dari pihak kami yang akan menghubungi. <br/>
<br/>
<br/>
Ayo ajak rekan dan kawanmu menjadi pemuda peduli pajak yang sadar akan Perpajakan Indonesia. Dukung kemajuan Bangsa Indonesia. <br/>
<br/>
<br/>
Diselenggarakan oleh<br/>
Tax Center Gunadarma<br/>';
            
            if(!empty($npm)){
                    $checkuser = "SELECT * FROM data_register WHERE `npm`='".$npm."'";
                    $query=$this->db->query($checkuser);
                        if($query->num_rows() > 0){
                            $this->session->set_flashdata('message', '<p style="text-align : center;">Anda sudah terdaftar. Silahkan Login</p>');
                            redirect('index/registrasi');
                        }else{
                            $this->m_login->create('data_register',$this->field_datauser());
                            $this->m_login->create('user',$this->field_datauser2());
                            $this->m_login->create('tr_mahasiswa_kursus',$this->field_datauser3());
                            $this->email->to($email);
                            $this->email->from('noreply@taxcenter.gunadarma.ac.id','No Reply Tax Center UG');
                            $this->email->Subject('Registrasi Kursus Brevet');
                            $this->email->message($contentemail);
                            $this->email->send();
                            redirect('index/complete', 'refresh');
                        }
            }else{
                $this->session->set_flashdata('message', '<p style="text-align : center;">Silahkan isi form dibawah ini terlebih dahulu.</p>');
                redirect('index/registrasi');
            }
        }else{
            redirect('index/registrasi', 'refresh');
        }
    }
    
    function complete() {
        $this->load->helper(array('form'));
        $isi['kelassingle'] = 'registrasi';$isi['kelasroot']   = ''; $isi['kelas']     = '';
        $isi['id']          =$this->m_login->getkodeunik('data_register','id');
        $isi['kursus']      =$this->db->get('data_kursus');
        $isi['judul']       = 'Registrasi';
        $isi['content']     ='frontend/registrasi-finish';
        $this->load->view('frontend/index',$isi);
    }
    
    function field_datauser()
    {
        return array(
            'id'            => $this->input->post('id'),
            'nama_lengkap'  => $this->input->post('nama_lengkap'),
            'jk'            => $this->input->post('jk'),
            'npm'           => $this->input->post('npm'),
            'ipk'           => $this->input->post('ipk'),
            'semester'      => $this->input->post('semester'),
            'kelas'         => $this->input->post('kelas'),
            'jurusan'       => $this->input->post('jurusan'),
            'fakultas'      => $this->input->post('fakultas'),
            'domisili'      => $this->input->post('domisili'),
            'no_hp'         => $this->input->post('no_hp'),
            'tempat_lahir'  => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat'        => $this->input->post('alamat'),
            'kota'          => $this->input->post('kota'),
            'tgl_register'  => date('Y-m-d'),
            'email'         => $this->input->post('email'),
            'status'        => "Mahasiswa",
        );
    }
    
    function field_datauser2()
    {
        $password   = $this->input->post('password');
        $npassword  = $this->encryptIt( $password );
        return array(
            'id_tabel'      => $this->input->post('id'),
            'password'      => $npassword,
            'level'         => "Mahasiswa",
            'npm'           => $this->input->post('npm'),
            'email'         => $this->input->post('email'),
            'status'        => "1"
        );
    }
    
    function field_datauser3()
    {
        return array(
            'id_mahasiswa'          => $this->input->post('id'),
            'id_kursus'             => $this->input->post('id_kursus'),
            'tgl_register'          => date('Y-m-d'),
            'id_ujian'              => '0',
            'id_gelombang'          => '0',
            'status_pembayaran'     => 'Belum Bayar'
        );
    }

}
