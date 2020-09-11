<?php

class Registrasi extends CI_Controller {
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
		$this->load->helper(array('form'));
        $isi['id']          =$this->m_login->getkodeunik('data_register','id');
        $isi['kursus']      =$this->db
                                  ->get('data_kursus');
        $isi['id_ujian']    =$this->db
                                  ->where('status', 'Aktif')
                                  ->get('tr_ujian')
                                  ->row();
        $this->load->view('register_start2',$isi);
    }
	
	function konfirmasi() {
		$this->load->helper(array('form'));
        $this->load->view('register_konfirmasi2');
    }
	
	public function konfirmasi_bayar()
    {
        if ($this->input->post('simpan')){
		$query=$this->db->where('npm',$this->input->post('npm'))->get('data_register');
			if($query->num_rows()>0){
				$this->load->library('upload');
				$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
				$config['upload_path'] = './assets/upload/blanko/'; //path folder
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
				$config['max_size'] = '20488'; //maksimum besar file 20M
				$config['file_name'] = $nmfile; //nama yang terupload nantinya
				$this->upload->initialize($config);
				if($_FILES['image']['name'])
				{
					if (!$this->upload->do_upload('image'))
					{
						redirect($this->home.'/konfirmasi_bayar/'); //jika gagal maka akan ditampilkan form tambahgambar
					}else{
						$gbr = $this->upload->data();
						$data = array(
							'npm'               => $this->input->post('npm'),
							'image'             => $gbr['file_name']
							);
						$data2 = array(
							'npm'               => $this->input->post('npm'),
							'status'            => '1'
							);
						$this->m_global->create('data_blanko',$data);
						$this->m_global->update('user','npm',$this->input->post('npm'),$data2);
						$this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Konfirmasi Pembayaran silahkan tunggu 24 jam untuk di verifikasi oleh Admin lalu setelah itu anda dapat melakukan login <a href="'.base_url().'login/">di link ini</a>.</div></div>');
						redirect('registrasi/konfirmasi');
					}
				}else{
						$this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-warning">Anda Belum Melampirkan Bukti Pembayaran.</div></div>');
						redirect('registrasi/konfirmasi');
				}
			}else{
				$this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-warning">NPM Anda Belum Terdaftar.</div></div>');
				redirect('registrasi/konfirmasi');
			}
        }else{
        $this->load->helper(array('form'));
        $this->load->view('register_konfirmasi2');
        }
    }

    function createregister($id) {
        if ($this->input->post('simpan')){
            $npm	    = $this->input->post('npm');
			$email	    = $this->input->post('email');
            $term       = $this->input->post('term');
			
			$contentemail	= '<p style="text-align : center;">Terima Kasih anda telah mendaftar sebagai peserta kursus brevet yang diselenggarakan oleh Tax Center Universitas Gunadarma.</br> Silahkan mengambil blanko pembayaran di ruang D117 Tax Center Universitas Gunadarma. </br> Setelah melakukan pembayaran harap konfirmasi pembayaran <a href="'.base_url().'registrasi/konfirmasi/">di link ini</a>.</p>';
			
			if(!empty($npm)){
				if($term){
					$checkuser = "SELECT * FROM data_register WHERE `npm`='".$npm."'";
					$query=$this->db->query($checkuser);
						if($query->num_rows() > 0){
							$this->session->set_flashdata('message', '<p style="text-align : center;">Anda sudah melakukan registrasi, silahkan cek email untuk info lebih lanjut</p>');
							redirect('registrasi/');
						}else{
							$this->m_login->create('data_register',$this->field_datauser());
							$this->m_login->create('user',$this->field_datauser2());
                            $this->m_login->create('tr_mahasiswa_kursus',$this->field_datauser3());
							$this->email->to($email);
							$this->email->from('noreply@taxcenter.gunadarma.ac.id','No Reply Tax Center UG');
							$this->email->Subject('Registrasi Kursus Brevet');
							$this->email->message($contentemail);
							$this->email->send();
							redirect('registrasi/complete', 'refresh');
						}
				}else{
					$this->session->set_flashdata('message', '<p style="text-align : center;">Ceklis Agree Term and Condition</p>');
					redirect('registrasi/');
				}
			}else{
				$this->session->set_flashdata('message', '<p style="text-align : center;">Silahkan isi form dibawah ini terlebih dahulu.</p>');
				redirect('registrasi/');
			}
        }else{
            redirect('registrasi/', 'refresh');
        }
    }
	
	function complete() {
		$this->load->helper(array('form'));
        $this->load->view('register_finish2');
    }
    
    function field_datauser()
    {
        return array(
            'id'            => $this->input->post('id'),
            'nama_depan'    => $this->input->post('nama_depan'),
			'nama_belakang' => $this->input->post('nama_belakang'),
			'jk'    		=> $this->input->post('jk'),
			'npm'    		=> $this->input->post('npm'),
			'kelas'    		=> $this->input->post('kelas'),
			'jurusan'       => $this->input->post('jurusan'),
			'fakultas'    	=> $this->input->post('fakultas'),
			'domisili'    	=> $this->input->post('domisili'),
			'no_hp'    		=> $this->input->post('no_hp'),
			'tempat_lahir'  => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'alamat'    	=> $this->input->post('alamat'),
			'kota'    		=> $this->input->post('kota'),
            'email'         => $this->input->post('email')
        );
    }
	
	function field_datauser2()
    {
        $password   = $this->input->post('password');
        $npassword  = $this->encryptIt( $password );
        return array(
            'id_tabel'      => $this->input->post('id'),
			'password'    	=> $npassword,
			'level'    		=> "Mahasiswa",
			'npm'      		=> $this->input->post('npm'),
            'email'         => $this->input->post('email')
        );
    }
    
    function field_datauser3()
    {
        return array(
            'id_mahasiswa'  		=> $this->input->post('id'),
            'id_kursus'     		=> $this->input->post('id_kursus'),
            'id_ujian'      		=> '0',
            'id_gelombang'  		=> '0',
            'status_pembayaran'		=> 'Belum Bayar'
        );
    }

}
