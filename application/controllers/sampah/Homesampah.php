<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_global'); //load model uploads yang berada di folder model
        $this->load->helper(array('url','file','date')); //load helper url 
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        if (!$this->session->userdata('logged_in')) {
            redirect('index'); 
        } 
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

    public function index()
    {
        $isi['nav']         ='Dashboard';
        $isi['content']     ='home';
        $isi['judul']       ='Dashboard';
        $isi['query']       =$this->db->where('id',$this->session->userdata('id_tabel'))->get('data_register');
        $isi['dashboard']   =True;
        $this->load->view('index',$isi);
    }

    public function logout() {
        $this->session->unset_userdata('logged_in');
        redirect('index', 'refresh');
    }

    //link dan folder==============================================================================
    private $home               = 'home';
    //crud=========================================================================================
    private $create             = 'create';
    private $read               = 'read';
    private $update             = 'update';
    private $proses_update      = 'proses_update';
    private $delete             = 'delete';

    //user=========================================================================================
    private $fieldpkuser       = 'id';
    private $tableuser         = 'user';

	public function user()
	{   
        
        $isi['nav']         ='User';
        $isi['content']     ='user/fuser';
        $isi['judul']       ='User';
        $isi['query']       =$this->m_global->read_update($this->tableuser,$this->fieldpkuser,$this->session->userdata('id_user'));
        $this->load->view('index',$isi);
	}

    public function proses_updateuser($pk)
    {
        $this->m_global->update($this->tableuser,$this->fieldpkuser,$pk,$this->field_datauser());
        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect('home/user');
    }

    private function field_datauser()
    { 
        $password   = $this->input->post('password');
        $npassword  = $this->encryptIt( $password );
        return array(
            'email'      	=> $this->input->post('username'),
            'password'      => $npassword
        );
    }

    //Registrasi=====================================================================================
    private $fieldpkregistrasi    = 'id';
    private $tableregistrasi      = 'tr_mahasiswa_kursus';
    private $judulregistrasi      = 'Status Registrasi';
    private $folderregistrasi     = 'dst_registrasi';
    private $linkregistrasi       = 'registrasi';

    public function registrasi()
    {
        $isi['judul']           =$this->judulregistrasi;
        $isi['content']         =$this->folderregistrasi.'/'.$this->read;
        $isi['query']           =$this->db
                                    ->select('p.id,p.status_pembayaran,c.nama_kursus,d.nama_lengkap,d.nama_depan,d.nama_belakang,e.gelombang,e.kelas,f.nama_ujian')
                                    ->join('data_kursus c','p.id_kursus = c.id','LEFT')
                                    ->join('data_register d','p.id_mahasiswa = d.id','LEFT')
                                    ->join('data_gelombang e','p.id_gelombang = e.id','LEFT')
                                    ->join('tr_ujian f','p.id_ujian = f.id','LEFT')
                                    ->get($this->tableregistrasi.' p');
        $isi['linkcreate']      =$this->home.'/'.$this->create.$this->linkregistrasi.'/';
        $isi['linkupdate']      =$this->home.'/'.$this->update.$this->linkregistrasi.'/';
        $isi['linkdelete']      =$this->home.'/'.$this->delete.$this->linkregistrasi.'/';
        $isi['linkview']        =$this->home.'/view'.$this->linkregistrasi.'/';
        $isi['linkaktif']       =$this->home.'/aktif'.$this->linkregistrasi.'/';
        $isi['linknonaktif']    =$this->home.'/nonaktif'.$this->linkregistrasi.'/';
        $isi['linksoal']        =$this->home.'/soal/';
        $isi['linkhasil_registrasi'] =$this->home.'/hasil_registrasi/';
        $this->load->view('index',$isi);
    }

    public function viewregistrasi($pk)
    {
        $isi['judul']       ='View '.$this->judulregistrasi;
        $isi['content']     =$this->folderregistrasi.'/form';
        $isi['query']       =$this->m_global->read_update($this->tableregistrasi,$this->fieldpkregistrasi,$pk);
        $isi['kursus']      =$this->db->get($this->tablekursus);
        $isi['mahasiswa']   =$this->db->get($this->tablemahasiswa);
        $isi['ujian']       =$this->db->get($this->tableujian);
        $isi['gelombang']   =$this->db->get($this->tablegelombang);
        $isi['link']        =$this->home.'/'.$this->linkregistrasi.'/';
        $isi['link2']       =$this->home.'/'.$this->linkregistrasi.'/';
        $isi['aksi']        ='view';
        $this->load->view('index',$isi);
    }

    public function createregistrasi()
    {
        if ($this->input->post('simpan')){
            $this->m_global->create($this->tableregistrasi,$this->field_dataregistrasi());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkregistrasi);
        }else{
        $isi['judul']       ='Create '.$this->judulregistrasi;
        $isi['content']     =$this->folderregistrasi.'/form';
        $isi['link2']       =$this->home.'/'.$this->linkregistrasi;
        $isi['link']        =$this->home.'/'.$this->create.$this->linkregistrasi;
        $isi['kursus']      =$this->db->get($this->tablekursus);
        $isi['mahasiswa']   =$this->db->get($this->tablemahasiswa);
        $isi['ujian']       =$this->db->get($this->tableujian);
        $isi['gelombang']   =$this->db->get($this->tablegelombang);
        $isi['aksi']        ='create';
        $isi['id']          =$this->m_global->getkodeunik($this->tableregistrasi,$this->fieldpkregistrasi);
        $this->load->view('index',$isi);
        }
    }

    public function updateregistrasi($pk)
    {
        if ($this->input->post('simpan')){
            $this->m_global->update($this->tableregistrasi,$this->fieldpkregistrasi,$pk,$this->field_dataregistrasi());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkregistrasi);
        }else{
        $isi['judul']       ='Edit '.$this->judulregistrasi;
        $isi['content']     =$this->folderregistrasi.'/form';
        $isi['query']       =$this->m_global->read_update($this->tableregistrasi,$this->fieldpkregistrasi,$pk);
        $isi['kursus']      =$this->db->get($this->tablekursus);
        $isi['mahasiswa']   =$this->db->get($this->tablemahasiswa);
        $isi['ujian']       =$this->db->get($this->tableujian);
        $isi['gelombang']   =$this->db->get($this->tablegelombang);
        $isi['link2']       =$this->home.'/'.$this->linkregistrasi;
        $isi['link']        =$this->home.'/'.$this->update.$this->linkregistrasi.'/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    public function deleteregistrasi($pk)
    {
        $this->m_global->delete($this->tableregistrasi,$this->fieldpkregistrasi,$pk);
        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect($this->home.'/'.$this->linkregistrasi);
    }
    
    private function field_dataregistrasi()
    {
        return array(
            'id'                => $this->input->post('id'),
            'id_mahasiswa'      => $this->input->post('id_mahasiswa'),
            'id_kursus'         => $this->input->post('id_kursus'),
            'status_pembayaran' => $this->input->post('status_pembayaran'),
            'id_gelombang'      => $this->input->post('id_gelombang'),
            'id_ujian'          => $this->input->post('id_ujian'),
            );
    }

    //Pembayaran=====================================================================================
    private $fieldpkpembayaran    = 'id';
    private $tablepembayaran      = 'data_pembayaran';
    private $judulpembayaran      = 'Pembayaran';
    private $folderpembayaran     = 'dst_pembayaran';
    private $linkpembayaran       = 'pembayaran';

    public function pembayaran()
    {
        $isi['judul']           =$this->judulpembayaran;
        $isi['content']         =$this->folderpembayaran.'/'.$this->read;
        $isi['query']           =$this->db
                                    ->select('p.id,p.jumlah_bayar,p.tanggal_bayar,p.keterangan,p.no_kwitansi,c.nama_kursus,d.nama_lengkap,d.nama_depan,d.nama_belakang')
                                    ->join('data_kursus c','p.id_kursus = c.id','LEFT')
                                    ->join('data_register d','p.id_user = d.id','LEFT')
                                    ->get($this->tablepembayaran.' p');
        $isi['linkcreate']      =$this->home.'/'.$this->create.$this->linkpembayaran.'/';
        $isi['linkupdate']      =$this->home.'/'.$this->update.$this->linkpembayaran.'/';
        $isi['linkdelete']      =$this->home.'/'.$this->delete.$this->linkpembayaran.'/';
        $isi['linkview']        =$this->home.'/view'.$this->linkpembayaran.'/';
        $isi['linkaktif']       =$this->home.'/aktif'.$this->linkpembayaran.'/';
        $isi['linknonaktif']    =$this->home.'/nonaktif'.$this->linkpembayaran.'/';
        $isi['linksoal']        =$this->home.'/soal/';
        $isi['linkhasil_pembayaran'] =$this->home.'/hasil_pembayaran/';
        $this->load->view('index',$isi);
    }

    public function viewpembayaran($pk)
    {
        $isi['judul']       ='View '.$this->judulpembayaran;
        $isi['content']     =$this->folderpembayaran.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablepembayaran,$this->fieldpkpembayaran,$pk);
        $isi['kursus']      =$this->db->get($this->tablekursus);
        $isi['mahasiswa']   =$this->db->get($this->tablemahasiswa);
        $isi['link']        =$this->home.'/'.$this->linkpembayaran.'/';
        $isi['link2']       =$this->home.'/'.$this->linkpembayaran.'/';
        $isi['aksi']        ='view';
        $this->load->view('index',$isi);
    }

    public function createpembayaran()
    {
        if ($this->input->post('simpan')){
            $data=array(
                'status_pembayaran' => 'Sudah Bayar'
            );
            $data2=array(
                'status' => '1'
            );
            $this->m_global->create($this->tablepembayaran,$this->field_datapembayaran());
            $this->m_global->update($this->tableregistrasi,'id_mahasiswa',$this->input->post('id_user'),$data);
            $this->m_global->update('user','id_tabel',$this->input->post('id_user'),$data2);
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkpembayaran);
        }else{
        $isi['judul']       ='Create '.$this->judulpembayaran;
        $isi['content']     =$this->folderpembayaran.'/form';
        $isi['link2']       =$this->home.'/'.$this->linkpembayaran;
        $isi['link']        =$this->home.'/'.$this->create.$this->linkpembayaran;
        $isi['kursus']      =$this->db->get($this->tablekursus);
        $isi['mahasiswa']   =$this->db->get($this->tablemahasiswa);
        $isi['aksi']        ='create';
        $isi['id']          =$this->m_global->getkodeunik($this->tablepembayaran,$this->fieldpkpembayaran);
        $this->load->view('index',$isi);
        }
    }

    public function updatepembayaran($pk)
    {
        if ($this->input->post('simpan')){
            $this->m_global->update($this->tablepembayaran,$this->fieldpkpembayaran,$pk,$this->field_datapembayaran());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkpembayaran);
        }else{
        $isi['judul']       ='Edit '.$this->judulpembayaran;
        $isi['content']     =$this->folderpembayaran.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablepembayaran,$this->fieldpkpembayaran,$pk);
        $isi['kursus']      =$this->db->get($this->tablekursus);
        $isi['mahasiswa']   =$this->db->get($this->tablemahasiswa);
        $isi['link2']       =$this->home.'/'.$this->linkpembayaran;
        $isi['link']        =$this->home.'/'.$this->update.$this->linkpembayaran.'/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    public function deletepembayaran($pk)
    {
        $querypembayaran = $this->m_global->read_update($this->tablepembayaran,$this->fieldpkpembayaran,$pk);
        foreach ($querypembayaran->result() as $list) {
        $id_user                = $list->id_user;
        }
        $data=array(
            'status_pembayaran' => 'Belum Bayar'
        );
        $data2=array(
            'status' => '0'
        );
        $this->m_global->update('tr_mahasiswa_kursus','id_mahasiswa',$id_user,$data);
        $this->m_global->update('user','id_tabel',$id_user,$data2);
        $this->m_global->delete($this->tablepembayaran,$this->fieldpkpembayaran,$pk);

        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect($this->home.'/'.$this->linkpembayaran);
    }
    
    private function field_datapembayaran()
    {
        return array(
            'id'                => $this->input->post('id'),
            'no_kwitansi'       => $this->input->post('no_kwitansi'),
            'id_user'           => $this->input->post('id_user'),
            'id_kursus'         => $this->input->post('id_kursus'),
            'tanggal_bayar'     => $this->input->post('tanggal_bayar'),
            'jumlah_bayar'      => $this->input->post('jumlah_bayar'),
            'keterangan'        => $this->input->post('keterangan'),
            );
    }
	
	//Soal=====================================================================================
    private $fieldpksoal    = 'id';
    private $tablesoal      = 'data_soal';
    private $navsoal        = 'Soal';
    private $judulsoal      = 'Soal';
    private $foldersoal     = 'dst_soal';
    private $linksoal       = 'soal';

    public function kursus2()
    {
        $isi['nav']         =$this->navsoal;
        $isi['judul']       =$this->judulsoal;
        $isi['content']     =$this->foldersoal.'/kursus';
        $isi['query']       =$this->db
								  ->join('data_kursus c','p.id_kursus = c.id','LEFT')
								  ->get($this->tableujian.' p');
        $isi['linksoal']  	=$this->home.'/soal/';
        $this->load->view('index',$isi);
    }
	
	public function soal($id)
    {
        $isi['nav']         =$this->navsoal;
        $isi['judul']       =$this->judulsoal;
        $isi['content']     =$this->foldersoal.'/'.$this->read;
        $isi['query']       =$this->db
								  ->select('p.id, p.soal, p.jawaban, p.gambar, p.id_tr_ujian, c.nama_ujian, d.nama_kategorisoal')
                                  ->join('data_kategorisoal d','p.id_kategori = d.id','LEFT')
                                  ->join('tr_ujian c','p.id_tr_ujian = c.id','LEFT')
                                  ->where('p.id_tr_ujian', $id)
								  ->get($this->tablesoal.' p');
		$isi['id_kursus']   =$id;
        $isi['linkcreate']  =$this->home.'/'.$this->create.$this->linksoal.'/';
        $isi['linkupdate']  =$this->home.'/'.$this->update.$this->linksoal.'/';
        $isi['linkdelete']  =$this->home.'/'.$this->delete.$this->linksoal.'/';
        $isi['linkview']    =$this->home.'/view'.$this->linksoal.'/';
        $isi['linkimport']  =$this->home.'/importsoal/';
        $isi['linkupload']  =$this->home.'/uploadfotosoal/';
        $isi['link2']       =$this->home.'/ujian/';
        $this->load->view('index',$isi);
    }

    public function viewsoal($id_tr_ujian,$pk)
    {
        $isi['nav']         =$this->navsoal.' | Update';
        $isi['judul']       ='View '.$this->judulsoal;
        $isi['content']     =$this->foldersoal.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablesoal,$this->fieldpksoal,$pk);
        $isi['link']        =$this->home.'/'.$this->linksoal.'/';
        $isi['link2']       =$this->home.'/'.$this->linksoal.'/';
		$isi['id_kursus']   =$id_tr_ujian;
        $isi['aksi']        ='view';
        $this->load->view('index',$isi);
    }

    public function uploadfotosoal($pk,$id_tr_ujian)
    {
        if ($this->input->post('simpan')){
            $this->load->library('upload');
            $nmfile = "file_".$pk.'-'.time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './assets/upload/soal/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '20488'; //maksimum besar file 20M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            $this->upload->initialize($config);
            if($_FILES['image']['name'])
            {
                if (!$this->upload->do_upload('image'))
                {
                    redirect($this->home.'/uploadfotosoal/'.$pk); //jika gagal maka akan ditampilkan form tambahgambar
                    }else{
                    $gbr = $this->upload->data();
                    $data = array(
                    'id'                => $this->input->post('id'),
                    'image'             => $gbr['file_name']
                    );
                    $this->m_global->update($this->tablesoal,$this->fieldpksoal,$pk,$data);
                    $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                    redirect($this->home.'/'.$this->linksoal.'/'.$id_tr_ujian);
                }
            }else{
                $data = array(
                    'id'                => $this->input->post('id'),
                    );
                    $this->m_global->update($this->tablesoal,$this->fieldpksoal,$pk,$data);
                    $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                    redirect($this->home.'/'.$this->linksoal.'/'.$id_tr_ujian);
            }
        }else{
        $isi['nav']         =$this->navsoal.' | Update';
        $isi['judul']       ='Edit '.$this->judulsoal;
        $isi['content']     =$this->foldersoal.'/fupload';
        $isi['query']       =$this->m_global->read_update($this->tablesoal,$this->fieldpksoal,$pk);
        $isi['link']        =$this->home.'/uploadfotosoal/';
        $isi['link2']       =$this->home.'/'.$this->linksoal.'/';
		$isi['id_kursus']   =$$id_tr_ujian;
        $this->load->view('index',$isi);
        }
    }

    public function createsoal($id_kursus)
    {
        $id = $this->input->post('id');
        $tanggal = 'now()';
		if ($this->input->post('simpan')){
            $this->load->library('upload');
            $nmfile = "file_".$id.'-'.time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './assets/upload/soal/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '20488'; //maksimum besar file 20M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            $this->upload->initialize($config);
        if($_FILES['image']['name'])
        {
            if (!$this->upload->do_upload('image'))
            {
                redirect($this->home.'/'.$this->create.$this->linksoal,'refresh'); //jika gagal maka akan ditampilkan form tambahgambar
                }else{
                $gbr = $this->upload->data();
                $data = array(
                    'id'                => $this->input->post('id'),
                    'id_tr_ujian'       => $this->input->post('id_kursus'),
                    'bobot'             => $this->input->post('bobot'),
                    'soal'              => $this->input->post('soal'),
                    'opsi_a'		    => $this->input->post('opsi_a'),
                    'opsi_b'		    => $this->input->post('opsi_b'),
                    'opsi_c'		    => $this->input->post('opsi_c'),
                    'opsi_d'		    => $this->input->post('opsi_d'),
                    'opsi_e'		    => $this->input->post('opsi_e'),
                    'id_kategori'	    => $this->input->post('id_kategori'),
                    'jawaban'		    => strtoupper($this->input->post('jawaban')),
					'tgl_input'			=> $tanggal,
                    'gambar'            => $gbr['file_name']
                    );
                $this->m_global->create($this->tablesoal,$data);
                $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                redirect($this->home.'/'.$this->linksoal.'/'.$this->input->post('id_kursus'));
            }
        }else{
            $data = array(
                    'id'                => $this->input->post('id'),
                    'id_tr_ujian'       => $this->input->post('id_kursus'),
                    'bobot'             => $this->input->post('bobot'),
                    'soal'              => $this->input->post('soal'),
                    'opsi_a'		    => $this->input->post('opsi_a'),
                    'opsi_b'		    => $this->input->post('opsi_b'),
                    'opsi_c'		    => $this->input->post('opsi_c'),
                    'opsi_d'		    => $this->input->post('opsi_d'),
                    'opsi_e'		    => $this->input->post('opsi_e'),
                    'id_kategori'	    => $this->input->post('id_kategori'),
                    'jawaban'		    => strtoupper($this->input->post('jawaban')),
					'tgl_input'			=> $tanggal
                    );
                $this->m_global->create($this->tablesoal,$data);
                $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                redirect($this->home.'/'.$this->linksoal.'/'.$this->input->post('id_kursus'));
        }
        }else{
        $isi['nav']         =$this->navsoal.' | Create';
        $isi['judul']       ='Create '.$this->judulsoal;
        $isi['content']     =$this->foldersoal.'/form';
        $isi['link']        =$this->home.'/'.$this->create.$this->linksoal.'/'.$id_kursus;
        $isi['aksi']        ='create';
		$isi['id_kursus'] 	=$id_kursus;
        $isi['id']          =$this->m_global->getkodeunikpegawai($this->tablesoal,$this->fieldpksoal);
        $isi['link2']       =$this->home.'/'.$this->linksoal.'/';
        $this->load->view('index',$isi);
        }
    }

    public function updatesoal($id_tr_ujian,$pk)
    {
        $tanggal = 'now()';
        if ($this->input->post('simpan')){
            $this->load->library('upload');
            $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './assets/upload/soal/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '20488'; //maksimum besar file 20M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            $this->upload->initialize($config);
            if($_FILES['image']['name'])
            {
                if (!$this->upload->do_upload('image'))
                {
                    redirect($this->home.'/'.$this->update.$this->linksoal.'/'.$id_tr_ujian); //jika gagal maka akan ditampilkan form tambahgambar
                    }else{
                    $path       = './assets/upload/soal/';
                    $imagelama  = $this->input->post('imagelama');
                    @unlink($path.$imagelama);

                    $gbr = $this->upload->data();
                    $data = array(
                    'id'                => $this->input->post('id'),
                    'bobot'             => $this->input->post('bobot'),
                    'soal'              => $this->input->post('soal'),
                    'opsi_a'		    => $this->input->post('opsi_a'),
                    'opsi_b'		    => $this->input->post('opsi_b'),
                    'opsi_c'		    => $this->input->post('opsi_c'),
                    'opsi_d'		    => $this->input->post('opsi_d'),
                    'opsi_e'		    => $this->input->post('opsi_e'),
                    'id_kategori'	    => $this->input->post('id_kategori'),
                    'jawaban'		    => strtoupper($this->input->post('jawaban')),
					'tgl_input'			=> $tanggal,
                    'gambar'            => $gbr['file_name']
                    );
                $this->m_global->update($this->tablesoal,$this->fieldpksoal,$pk,$data);
                $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                redirect($this->home.'/'.$this->linksoal.'/'.$id_tr_ujian);
            }
        }else{
                $data = array(
                    'id'                => $this->input->post('id'),
                    'bobot'             => $this->input->post('bobot'),
                    'soal'              => $this->input->post('soal'),
                    'opsi_a'		    => $this->input->post('opsi_a'),
                    'opsi_b'		    => $this->input->post('opsi_b'),
                    'opsi_c'		    => $this->input->post('opsi_c'),
                    'opsi_d'		    => $this->input->post('opsi_d'),
                    'opsi_e'		    => $this->input->post('opsi_e'),
                    'id_kategori'	    => $this->input->post('id_kategori'),
                    'jawaban'		    => strtoupper($this->input->post('jawaban')),
					'tgl_input'			=> $tanggal
                    );
                    $this->m_global->update($this->tablesoal,$this->fieldpksoal,$pk,$data);
                    $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                    redirect($this->home.'/'.$this->linksoal.'/'.$id_tr_ujian);
            }
        }else{
        $isi['nav']         =$this->navsoal.' | Update';
        $isi['judul']       ='Edit '.$this->judulsoal;
		$isi['id_kursus']   =$id_tr_ujian;
        $isi['content']     =$this->foldersoal.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablesoal,$this->fieldpksoal,$pk);
        $isi['link2']       =$this->home.'/'.$this->linksoal.'/';
        $isi['link']        =$this->home.'/'.$this->update.$this->linksoal.'/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    public function deletesoal($id_tr_ujian,$pk)
    {
        $this->m_global->delete($this->tablesoal,$this->fieldpksoal,$pk);
        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect($this->home.'/'.$this->linksoal.'/'.$id_tr_ujian);
    }
	
	//==============================================================================================
    private $fieldpkimportsoal         = 'id';
    private $tableimportsoal           = 'data_soal';
    private $folderimportsoal          = 'dst_soal';
    private $linkimportsoal            = 'home';
    private $titleimportsoal           = 'Upload Soal';
    private $judulimportsoal           = 'Upload Soal';

    public function importsoal($id_tr_ujian)
    {
        $isi['nav']         =$this->navsoal;
		$isi['title']       =$this->titleimportsoal.' | Import';
        $isi['content']     =$this->folderimportsoal.'/fimport';
		$isi['id_kursus']   =$id_tr_ujian;
        $isi['judul']       ='Import '.$this->judulimportsoal;
        $isi['link2']       =$this->home.'/'.$this->linksoal.'/';
        $isi['link']        =base_url().$this->linkimportsoal;
        $this->load->view('index',$isi);
    }

    public function uploadsoal($id_tr_ujian)
    {
        $fileName = time().$_FILES['file']['name'];
         
        $config['upload_path'] = './assets/import/'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;
         
        $this->load->library('upload');
        $this->upload->initialize($config);
         
        if(! $this->upload->do_upload('file') )
        $this->upload->display_errors();
             
        $media = $this->upload->data('file');
        $inputFileName = './assets/import/'.$fileName;
         
        try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } 
        catch(Exception $e){
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
 
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
             
            for ($row = 2; $row <= $highestRow; $row++){                  //  Read a row of data into an array                 
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                                NULL,
                                                TRUE,
                                                FALSE);
                                                 
                //Sesuaikan sama nama kolom tabel di database                                
                 $data = array(
                    'soal'		        => $rowData[0][0],
					'id_tr_ujian'		=> $id_tr_ujian,
                    'opsi_a'      		=> $rowData[0][1],
                    'opsi_b'     		=> $rowData[0][2],
                    'opsi_c'     		=> $rowData[0][3],
                    'opsi_d'     		=> $rowData[0][4],
                    'opsi_e'     		=> $rowData[0][5],
                    'jawaban'           => strtoupper($rowData[0][6]),
                    'id_kategori'     	=> $rowData[0][7]
                );
                 
                //sesuaikan nama dengan nama tabel
                $insert = $this->db->insert($this->tablesoal,$data);
                delete_files($media['file_path']);
                     
            }
        redirect($this->home.'/'.$this->linksoal.'/'.$id_tr_ujian);
    }

    //Kategori Soal=====================================================================================
    private $fieldpkkategorisoal    = 'id';
    private $tablekategorisoal      = 'data_kategorisoal';
    private $navkategorisoal        = 'Kategori Soal';
    private $judulkategorisoal      = 'Kategori Soal';
    private $folderkategorisoal     = 'dst_kategorisoal';
    private $linkkategorisoal       = 'kategorisoal';

    public function kategorisoal()
    {
        $isi['nav']         =$this->navkategorisoal;
        $isi['judul']       =$this->judulkategorisoal;
        $isi['content']     =$this->folderkategorisoal.'/'.$this->read;
        $isi['query']       =$this->db->get($this->tablekategorisoal);
        $isi['linkcreate']  =$this->home.'/'.$this->create.$this->linkkategorisoal.'/';
        $isi['linkupdate']  =$this->home.'/'.$this->update.$this->linkkategorisoal.'/';
        $isi['linkdelete']  =$this->home.'/'.$this->delete.$this->linkkategorisoal.'/';
        $isi['linkview']    =$this->home.'/view'.$this->linkkategorisoal.'/';
        $this->load->view('index',$isi);
    }

    public function viewkategorisoal($pk)
    {
        $isi['nav']         =$this->navkategorisoal.' | Update';
        $isi['judul']       ='View '.$this->judulkategorisoal;
        $isi['content']     =$this->folderkategorisoal.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablekategorisoal,$this->fieldpkkategorisoal,$pk);
        $isi['link']        =$this->home.'/'.$this->linkkategorisoal.'/';
        $isi['link2']       =$this->home.'/'.$this->linkkategorisoal.'/';
        $isi['aksi']        ='view';
        $this->load->view('index',$isi);
    }

    public function createkategorisoal()
    {
        if ($this->input->post('simpan')){
            $this->m_global->create($this->tablekategorisoal,$this->field_datakategorisoal());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkkategorisoal);
        }else{
        $isi['nav']         =$this->navkategorisoal.' | Create';
        $isi['judul']       ='Create '.$this->judulkategorisoal;
        $isi['content']     =$this->folderkategorisoal.'/form';
        $isi['link2']       =$this->home.'/'.$this->linkkategorisoal;
        $isi['link']        =$this->home.'/'.$this->create.$this->linkkategorisoal;
        $isi['aksi']        ='create';
        $isi['id']          =$this->m_global->getkodeunik($this->tablekategorisoal,$this->fieldpkkategorisoal);
        $this->load->view('index',$isi);
        }
    }

    public function updatekategorisoal($pk)
    {
        if ($this->input->post('simpan')){
            $this->m_global->update($this->tablekategorisoal,$this->fieldpkkategorisoal,$pk,$this->field_datakategorisoal());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkkategorisoal);
        }else{
        $isi['nav']         =$this->navkategorisoal.' | Update';
        $isi['judul']       ='Edit '.$this->judulkategorisoal;
        $isi['content']     =$this->folderkategorisoal.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablekategorisoal,$this->fieldpkkategorisoal,$pk);
        $isi['link2']       =$this->home.'/'.$this->linkkategorisoal;
        $isi['link']        =$this->home.'/'.$this->update.$this->linkkategorisoal.'/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    public function deletekategorisoal($pk)
    {
        $this->m_global->delete($this->tablekategorisoal,$this->fieldpkkategorisoal,$pk);
        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect($this->home.'/'.$this->linkkategorisoal);
    }
    
    private function field_datakategorisoal()
    {
        return array(
            'id'                => $this->input->post('id'),
            'nama_kategorisoal'        => $this->input->post('nama_kategorisoal'),
            );
    }

    //Kategori Soal=====================================================================================
    private $fieldpkup    = 'id';
    private $tableup      = 'data_kategorisoal';
    private $navup        = 'Kategori Soal';
    private $judulup      = 'Kategori Soal';
    private $folderup     = 'dst_up';
    private $linkup       = 'up';

    public function up()
    {
        $isi['nav']         =$this->navup;
        $isi['judul']       =$this->judulup;
        $isi['content']     =$this->folderup.'/'.$this->read;
        $isi['query']       =$this->db->get($this->tableuser);
        $this->load->view('index',$isi);
    }
	
	//Aspek Penilaian=====================================================================================
    private $fieldpkaspekpenilaian    = 'id';
    private $tableaspekpenilaian      = 'data_aspekpenilaian';
    private $navaspekpenilaian        = 'Aspek Penilaian';
    private $judulaspekpenilaian      = 'Aspek Penilaian';
    private $folderaspekpenilaian     = 'dst_aspekpenilaian';
    private $linkaspekpenilaian       = 'aspekpenilaian';

    public function aspekpenilaian()
    {
        $isi['nav']         =$this->navaspekpenilaian;
        $isi['judul']       =$this->judulaspekpenilaian;
        $isi['content']     =$this->folderaspekpenilaian.'/'.$this->read;
        $isi['query']       =$this->db
								  ->join('data_kursus c','p.id_kursus = c.id','LEFT')
								  ->get($this->tableaspekpenilaian.' p');
        $isi['linkcreate']  =$this->home.'/'.$this->create.$this->linkaspekpenilaian.'/';
        $isi['linkupdate']  =$this->home.'/'.$this->update.$this->linkaspekpenilaian.'/';
        $isi['linkdelete']  =$this->home.'/'.$this->delete.$this->linkaspekpenilaian.'/';
        $isi['linkview']    =$this->home.'/view'.$this->linkaspekpenilaian.'/';
        $this->load->view('index',$isi);
    }

    public function viewaspekpenilaian($pk)
    {
        $isi['nav']         =$this->navaspekpenilaian.' | Update';
        $isi['judul']       ='View '.$this->judulaspekpenilaian;
        $isi['content']     =$this->folderaspekpenilaian.'/form';
		$isi['kursus']      =$this->db
                                  ->get('data_kursus');
        $isi['query']       =$this->m_global->read_update($this->tableaspekpenilaian,$this->fieldpkaspekpenilaian,$pk);
        $isi['link']        =$this->home.'/'.$this->linkaspekpenilaian.'/';
        $isi['link2']       =$this->home.'/'.$this->linkaspekpenilaian.'/';
        $isi['aksi']        ='view';
        $this->load->view('index',$isi);
    }

    public function createaspekpenilaian()
    {
        if ($this->input->post('simpan')){
            $this->m_global->create($this->tableaspekpenilaian,$this->field_dataaspekpenilaian());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkaspekpenilaian);
        }else{
        $isi['nav']         =$this->navaspekpenilaian.' | Create';
        $isi['judul']       ='Create '.$this->judulaspekpenilaian;
        $isi['content']     =$this->folderaspekpenilaian.'/form';
		$isi['kursus']      =$this->db
                                  ->get('data_kursus');
        $isi['link2']       =$this->home.'/'.$this->linkaspekpenilaian;
        $isi['link']        =$this->home.'/'.$this->create.$this->linkaspekpenilaian;
        $isi['aksi']        ='create';
        $isi['id']          =$this->m_global->getkodeunik($this->tableaspekpenilaian,$this->fieldpkaspekpenilaian);
        $this->load->view('index',$isi);
        }
    }

    public function updateaspekpenilaian($pk)
    {
        if ($this->input->post('simpan')){
            $this->m_global->update($this->tableaspekpenilaian,$this->fieldpkaspekpenilaian,$pk,$this->field_dataaspekpenilaian());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkaspekpenilaian);
        }else{
        $isi['nav']         =$this->navaspekpenilaian.' | Update';
        $isi['judul']       ='Edit '.$this->judulaspekpenilaian;
        $isi['content']     =$this->folderaspekpenilaian.'/form';
		$isi['kursus']      =$this->db
                                  ->get('data_kursus');
        $isi['query']       =$this->m_global->read_update($this->tableaspekpenilaian,$this->fieldpkaspekpenilaian,$pk);
        $isi['link2']       =$this->home.'/'.$this->linkaspekpenilaian;
        $isi['link']        =$this->home.'/'.$this->update.$this->linkaspekpenilaian.'/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    public function deleteaspekpenilaian($pk)
    {
        $this->m_global->delete($this->tableaspekpenilaian,$this->fieldpkaspekpenilaian,$pk);
        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect($this->home.'/'.$this->linkaspekpenilaian);
    }
    
    private function field_dataaspekpenilaian()
    {
        return array(
            'id'                => $this->input->post('id'),
            'id_kursus'         => $this->input->post('id_kursus'),
            'nama_aspek'        => $this->input->post('nama_aspek'),
            );
    }
	
	//Mahasiswa=====================================================================================
    private $fieldpkmahasiswa    = 'id';
    private $tablemahasiswa      = 'data_register';
    private $navmahasiswa        = 'Mahasiswa';
    private $judulmahasiswa      = 'Mahasiswa';
    private $foldermahasiswa     = 'dst_mahasiswa';
    private $linkmahasiswa       = 'mahasiswa';

    public function mahasiswa()
    {
        $isi['nav']         =$this->navmahasiswa;
        $isi['judul']       =$this->judulmahasiswa;
        $isi['content']     =$this->foldermahasiswa.'/'.$this->read;
        $isi['query']       =$this->db->get($this->tablemahasiswa);
        $isi['linkcreate']  =$this->home.'/'.$this->create.$this->linkmahasiswa.'/';
        $isi['linkupdate']  =$this->home.'/'.$this->update.$this->linkmahasiswa.'/';
        $isi['linkdelete']  =$this->home.'/'.$this->delete.$this->linkmahasiswa.'/';
        $isi['linkview']    =$this->home.'/view'.$this->linkmahasiswa.'/';
        $isi['linkupload']  =$this->home.'/uploadfotomahasiswa/';
        $this->load->view('index',$isi);
    }

    public function viewmahasiswa($pk)
    {
        $isi['nav']         =$this->navmahasiswa.' | Update';
        $isi['judul']       ='View '.$this->judulmahasiswa;
        $isi['content']     =$this->foldermahasiswa.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablemahasiswa,$this->fieldpkmahasiswa,$pk);
        $isi['link']        =$this->home.'/'.$this->linkmahasiswa.'/';
        $isi['link2']       =$this->home.'/'.$this->linkmahasiswa.'/';
        $isi['aksi']        ='view';
        $this->load->view('index',$isi);
    }

    public function uploadfotomahasiswa($pk)
    {
        if ($this->input->post('simpan')){
            $this->load->library('upload');
            $nmfile = "file_".$pk.'-'.time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './assets/upload/mahasiswa/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '20488'; //maksimum besar file 20M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            $this->upload->initialize($config);
            if($_FILES['image']['name'])
            {
                if (!$this->upload->do_upload('image'))
                {
                    redirect($this->home.'/uploadfotomahasiswa/'.$pk); //jika gagal maka akan ditampilkan form tambahgambar
                    }else{
                    $gbr = $this->upload->data();
                    $data = array(
                    'id'                => $this->input->post('id'),
                    'image'             => $gbr['file_name']
                    );
                    $this->m_global->update($this->tablemahasiswa,$this->fieldpkmahasiswa,$pk,$data);
                    $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                    redirect($this->home.'/'.$this->linkmahasiswa);
                }
            }else{
                $data = array(
                    'id'                => $this->input->post('id'),
                    );
                    $this->m_global->update($this->tablemahasiswa,$this->fieldpkmahasiswa,$pk,$data);
                    $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                    redirect($this->home.'/'.$this->linkmahasiswa);
            }
        }else{
        $isi['nav']         =$this->navmahasiswa.' | Update';
        $isi['judul']       ='Edit '.$this->judulmahasiswa;
        $isi['content']     =$this->foldermahasiswa.'/fupload';
        $isi['query']       =$this->m_global->read_update($this->tablemahasiswa,$this->fieldpkmahasiswa,$pk);
        $isi['link']        =$this->home.'/uploadfotomahasiswa/';
        $isi['link2']       =$this->home.'/'.$this->linkmahasiswa.'/';
        $this->load->view('index',$isi);
        }
    }

    public function createmahasiswa()
    {
        $id = $this->input->post('id');
		if ($this->input->post('simpan')){
            $this->load->library('upload');
            $nmfile = "file_".$id.'-'.time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './assets/upload/mahasiswa/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '20488'; //maksimum besar file 20M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            $this->upload->initialize($config);
        if($_FILES['image']['name'])
        {
            if (!$this->upload->do_upload('image'))
            {
                redirect($this->home.'/'.$this->create.$this->linkmahasiswa,'refresh'); //jika gagal maka akan ditampilkan form tambahgambar
                }else{
                $gbr = $this->upload->data();
                $data = array(
					'id'                => $this->input->post('id'),
					'nama_depan'        => $this->input->post('nama_depan'),
					'nama_belakang'     => $this->input->post('nama_belakang'),
					'tempat_lahir'      => $this->input->post('tempat_lahir'),
					'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
					'jk'                => $this->input->post('jk'),
					'no_hp'             => $this->input->post('nohp'),
					'alamat'		    => $this->input->post('alamat'),
					'kota'              => $this->input->post('kota'),
					'email'             => $this->input->post('email'),
					'npm'				=> $this->input->post('npm'),
					'kelas'				=> $this->input->post('kelas'),
					'jurusan'			=> $this->input->post('jurusan'),
					'fakultas'			=> $this->input->post('fakultas'),
					'domisili'			=> $this->input->post('domisili'),
					'gambar'            => $gbr['file_name']
                    );
                $this->m_global->create($this->tablemahasiswa,$data);
                $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                redirect($this->home.'/'.$this->linkmahasiswa);
            }
        }else{
            $data = array(
                    'id'                 => $this->input->post('id'),
					'nama_depan'         => $this->input->post('nama_depan'),
					'nama_belakang'      => $this->input->post('nama_belakang'),
					'tempat_lahir'       => $this->input->post('tempat_lahir'),
					'tanggal_lahir'      => $this->input->post('tanggal_lahir'),
					'jk'                 => $this->input->post('jk'),
					'no_hp'              => $this->input->post('nohp'),
					'alamat'		     => $this->input->post('alamat'),
					'kota'               => $this->input->post('kota'),
					'email'              => $this->input->post('email'),
					'npm'				=> $this->input->post('npm'),
					'kelas'				=> $this->input->post('kelas'),
					'jurusan'			=> $this->input->post('jurusan'),
					'fakultas'			=> $this->input->post('fakultas'),
					'domisili'			=> $this->input->post('domisili')
                    );
                $this->m_global->create($this->tablemahasiswa,$data);
                $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                redirect($this->home.'/'.$this->linkmahasiswa);
        }
        }else{
        $isi['nav']         =$this->navmahasiswa.' | Create';
        $isi['judul']       ='Create '.$this->judulmahasiswa;
        $isi['content']     =$this->foldermahasiswa.'/form';
        $isi['link']        =$this->home.'/'.$this->create.$this->linkmahasiswa;
        $isi['aksi']        ='create';
        $isi['id']          =$this->m_global->getkodeunikpegawai($this->tablemahasiswa,$this->fieldpkmahasiswa);
        $isi['link2']       =$this->home.'/'.$this->linkmahasiswa.'/';
        $this->load->view('index',$isi);
        }
    }

    public function updatemahasiswa($pk)
    {
        if ($this->input->post('simpan')){
            $this->load->library('upload');
            $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './assets/upload/mahasiswa/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '20488'; //maksimum besar file 20M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            $this->upload->initialize($config);
            if($_FILES['image']['name'])
            {
                if (!$this->upload->do_upload('image'))
                {
                    redirect($this->home.'/'.$this->update.$this->linkmahasiswa); //jika gagal maka akan ditampilkan form tambahgambar
                    }else{
                    $path       = './assets/upload/mahasiswa/';
                    $imagelama  = $this->input->post('imagelama');
                    @unlink($path.$imagelama);

                    $gbr = $this->upload->data();
                    $data = array(
					'id'                => $this->input->post('id'),
					'nama_depan'        => $this->input->post('nama_depan'),
					'nama_belakang'     => $this->input->post('nama_belakang'),
					'tempat_lahir'      => $this->input->post('tempat_lahir'),
					'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
					'jk'                => $this->input->post('jk'),
					'no_hp'             => $this->input->post('nohp'),
					'alamat'		    => $this->input->post('alamat'),
					'kota'              => $this->input->post('kota'),
					'email'             => $this->input->post('email'),
					'npm'				=> $this->input->post('npm'),
					'kelas'				=> $this->input->post('kelas'),
					'jurusan'			=> $this->input->post('jurusan'),
					'fakultas'			=> $this->input->post('fakultas'),
					'domisili'			=> $this->input->post('domisili'),
					'gambar'            => $gbr['file_name']
                    );
                $this->m_global->update($this->tablemahasiswa,$this->fieldpkmahasiswa,$pk,$data);
                $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                redirect($this->home.'/'.$this->linkmahasiswa);
            }
        }else{
                $data = array(
					'id'                => $this->input->post('id'),
					'nama_depan'        => $this->input->post('nama_depan'),
					'nama_belakang'     => $this->input->post('nama_belakang'),
					'tempat_lahir'      => $this->input->post('tempat_lahir'),
					'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
					'jk'                => $this->input->post('jk'),
					'no_hp'             => $this->input->post('nohp'),
					'alamat'		    => $this->input->post('alamat'),
					'kota'              => $this->input->post('kota'),
					'email'             => $this->input->post('email'),
					'npm'				=> $this->input->post('npm'),
					'kelas'				=> $this->input->post('kelas'),
					'jurusan'			=> $this->input->post('jurusan'),
					'fakultas'			=> $this->input->post('fakultas'),
					'domisili'			=> $this->input->post('domisili')
                    );
                    $this->m_global->update($this->tablemahasiswa,$this->fieldpkmahasiswa,$pk,$data);
                    $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                    redirect($this->home.'/'.$this->linkmahasiswa);
            }
        }else{
        $isi['nav']         =$this->navmahasiswa.' | Update';
        $isi['judul']       ='Edit '.$this->judulmahasiswa;
        $isi['content']     =$this->foldermahasiswa.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablemahasiswa,$this->fieldpkmahasiswa,$pk);
        $isi['link2']       =$this->home.'/'.$this->linkmahasiswa.'/';
        $isi['link']        =$this->home.'/'.$this->update.$this->linkmahasiswa.'/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    public function deletemahasiswa($pk)
    {
        $this->m_global->delete($this->tablemahasiswa,$this->fieldpkmahasiswa,$pk);
        $this->m_global->delete('user','id_tabel',$pk);
        $this->m_global->delete('tr_mahasiswa_kursus','id_mahasiswa',$pk);
        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect($this->home.'/'.$this->linkmahasiswa);
    }
	
	//Pengajar=====================================================================================
    private $fieldpka_pengajar    = 'id';
    private $tablea_pengajar      = 'data_pengajar';
    private $nava_pengajar        = 'Pengajar';
    private $judula_pengajar      = 'Pengajar';
    private $foldera_pengajar     = 'dst_pengajar';
    private $linka_pengajar       = 'a_pengajar';

    public function a_pengajar()
    {
        $isi['nav']         =$this->nava_pengajar;
        $isi['judul']       =$this->judula_pengajar;
        $isi['content']     =$this->foldera_pengajar.'/'.$this->read;
        $isi['query']       =$this->db->get($this->tablea_pengajar);
        $isi['linkcreate']  =$this->home.'/'.$this->create.$this->linka_pengajar.'/';
        $isi['linkupdate']  =$this->home.'/'.$this->update.$this->linka_pengajar.'/';
        $isi['linkdelete']  =$this->home.'/'.$this->delete.$this->linka_pengajar.'/';
        $isi['linkview']    =$this->home.'/view'.$this->linka_pengajar.'/';
        $isi['linkupload']  =$this->home.'/uploadfotoa_pengajar/';
        $this->load->view('index',$isi);
    }

    public function viewa_pengajar($pk)
    {
        $isi['nav']         =$this->nava_pengajar.' | Update';
        $isi['judul']       ='View '.$this->judula_pengajar;
        $isi['content']     =$this->foldera_pengajar.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablea_pengajar,$this->fieldpka_pengajar,$pk);
        $isi['link']        =$this->home.'/'.$this->linka_pengajar.'/';
        $isi['link2']       =$this->home.'/'.$this->linka_pengajar.'/';
        $isi['aksi']        ='view';
        $this->load->view('index',$isi);
    }

    public function uploadfotoa_pengajar($pk)
    {
        if ($this->input->post('simpan')){
            $this->load->library('upload');
            $nmfile = "file_".$pk.'-'.time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './assets/upload/pengajar/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '20488'; //maksimum besar file 20M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            $this->upload->initialize($config);
            if($_FILES['image']['name'])
            {
                if (!$this->upload->do_upload('image'))
                {
                    redirect($this->home.'/uploadfotoa_pengajar/'.$pk); //jika gagal maka akan ditampilkan form tambahgambar
                    }else{
                    $gbr = $this->upload->data();
                    $data = array(
                    'id'                => $this->input->post('id'),
                    'image'             => $gbr['file_name']
                    );
                    $this->m_global->update($this->tablea_pengajar,$this->fieldpka_pengajar,$pk,$data);
                    $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                    redirect($this->home.'/'.$this->linka_pengajar);
                }
            }else{
                $data = array(
                    'id'                => $this->input->post('id'),
                    );
                    $this->m_global->update($this->tablea_pengajar,$this->fieldpka_pengajar,$pk,$data);
                    $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                    redirect($this->home.'/'.$this->linka_pengajar);
            }
        }else{
        $isi['nav']         =$this->nava_pengajar.' | Update';
        $isi['judul']       ='Edit '.$this->judula_pengajar;
        $isi['content']     =$this->foldera_pengajar.'/fupload';
        $isi['query']       =$this->m_global->read_update($this->tablea_pengajar,$this->fieldpka_pengajar,$pk);
        $isi['link']        =$this->home.'/uploadfotoa_pengajar/';
        $isi['link2']       =$this->home.'/'.$this->linka_pengajar.'/';
        $this->load->view('index',$isi);
        }
    }

    public function createa_pengajar()
    {
        $id = $this->input->post('id');
		if ($this->input->post('simpan')){
            $this->load->library('upload');
            $nmfile = "file_".$id.'-'.time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './assets/upload/pengajar/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '20488'; //maksimum besar file 20M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            $this->upload->initialize($config);
        if($_FILES['image']['name'])
        {
            if (!$this->upload->do_upload('image'))
            {
                redirect($this->home.'/'.$this->create.$this->linka_pengajar,'refresh'); //jika gagal maka akan ditampilkan form tambahgambar
                }else{
                $gbr = $this->upload->data();
                $data = array(
					'id'                => $this->input->post('id'),
					'nama_depan'        => $this->input->post('nama_depan'),
					'nama_belakang'     => $this->input->post('nama_belakang'),
					'tempat_lahir'      => $this->input->post('tempat_lahir'),
					'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
					'jk'                => $this->input->post('jk'),
					'no_hp'             => $this->input->post('nohp'),
					'alamat'		    => $this->input->post('alamat'),
					'kota'              => $this->input->post('kota'),
					'email'             => $this->input->post('email'),
					'gambar'            => $gbr['file_name']
                    );
                $this->m_global->create($this->tablea_pengajar,$data);
                $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                redirect($this->home.'/'.$this->linka_pengajar);
            }
        }else{
            $data = array(
					'id'                => $this->input->post('id'),
					'nama_depan'        => $this->input->post('nama_depan'),
					'nama_belakang'     => $this->input->post('nama_belakang'),
					'tempat_lahir'      => $this->input->post('tempat_lahir'),
					'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
					'jk'                => $this->input->post('jk'),
					'no_hp'             => $this->input->post('nohp'),
					'alamat'		    => $this->input->post('alamat'),
					'kota'              => $this->input->post('kota'),
					'email'             => $this->input->post('email')
                    );
                $this->m_global->create($this->tablea_pengajar,$data);
                $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                redirect($this->home.'/'.$this->linka_pengajar);
        }
        }else{
        $isi['nav']         =$this->nava_pengajar.' | Create';
        $isi['judul']       ='Create '.$this->judula_pengajar;
        $isi['content']     =$this->foldera_pengajar.'/form';
        $isi['link']        =$this->home.'/'.$this->create.$this->linka_pengajar;
        $isi['aksi']        ='create';
        $isi['id']          =$this->m_global->getkodeunikpegawai($this->tablea_pengajar,$this->fieldpka_pengajar);
        $isi['link2']       =$this->home.'/'.$this->linka_pengajar.'/';
        $this->load->view('index',$isi);
        }
    }

    public function updatea_pengajar($pk)
    {
        if ($this->input->post('simpan')){
            $this->load->library('upload');
            $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './assets/upload/pengajar/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '20488'; //maksimum besar file 20M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            $this->upload->initialize($config);
            if($_FILES['image']['name'])
            {
                if (!$this->upload->do_upload('image'))
                {
                    redirect($this->home.'/'.$this->update.$this->linka_pengajar); //jika gagal maka akan ditampilkan form tambahgambar
                    }else{
                    $path       = './assets/upload/pengajar/';
                    $imagelama  = $this->input->post('imagelama');
                    @unlink($path.$imagelama);

                    $gbr = $this->upload->data();
                    $data = array(
					'id'                => $this->input->post('id'),
					'nama_depan'        => $this->input->post('nama_depan'),
					'nama_belakang'     => $this->input->post('nama_belakang'),
					'tempat_lahir'      => $this->input->post('tempat_lahir'),
					'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
					'jk'                => $this->input->post('jk'),
					'no_hp'             => $this->input->post('nohp'),
					'alamat'		    => $this->input->post('alamat'),
					'kota'              => $this->input->post('kota'),
					'email'             => $this->input->post('email'),
					'gambar'            => $gbr['file_name']
                    );
                $this->m_global->update($this->tablea_pengajar,$this->fieldpka_pengajar,$pk,$data);
                $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                redirect($this->home.'/'.$this->linka_pengajar);
            }
        }else{
                $data = array(
					'id'                => $this->input->post('id'),
					'nama_depan'        => $this->input->post('nama_depan'),
					'nama_belakang'     => $this->input->post('nama_belakang'),
					'tempat_lahir'      => $this->input->post('tempat_lahir'),
					'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
					'jk'                => $this->input->post('jk'),
					'no_hp'             => $this->input->post('nohp'),
					'alamat'		    => $this->input->post('alamat'),
					'kota'              => $this->input->post('kota'),
					'email'             => $this->input->post('email')
                    );
                    $this->m_global->update($this->tablea_pengajar,$this->fieldpka_pengajar,$pk,$data);
                    $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                    redirect($this->home.'/'.$this->linka_pengajar);
            }
        }else{
        $isi['nav']         =$this->nava_pengajar.' | Update';
        $isi['judul']       ='Edit '.$this->judula_pengajar;
        $isi['content']     =$this->foldera_pengajar.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablea_pengajar,$this->fieldpka_pengajar,$pk);
        $isi['link2']       =$this->home.'/'.$this->linka_pengajar.'/';
        $isi['link']        =$this->home.'/'.$this->update.$this->linka_pengajar.'/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    public function deletea_pengajar($pk)
    {
        $this->m_global->delete($this->tablea_pengajar,$this->fieldpka_pengajar,$pk);
        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect($this->home.'/'.$this->linka_pengajar);
    }

    //Kursus=====================================================================================
    private $fieldpkkursus    = 'id';
    private $tablekursus      = 'data_kursus';
    private $navkursus        = 'Kursus';
    private $judulkursus      = 'Kursus';
    private $folderkursus     = 'dst_kursus';
    private $linkkursus       = 'kursus';

    public function kursus()
    {
        $isi['nav']         =$this->navkursus;
        $isi['judul']       =$this->judulkursus;
        $isi['content']     =$this->folderkursus.'/'.$this->read;
        $isi['query']       =$this->db->get($this->tablekursus);
        $isi['linkcreate']  =$this->home.'/'.$this->create.$this->linkkursus.'/';
        $isi['linkupdate']  =$this->home.'/'.$this->update.$this->linkkursus.'/';
        $isi['linkdelete']  =$this->home.'/'.$this->delete.$this->linkkursus.'/';
        $isi['linkview']    =$this->home.'/view'.$this->linkkursus.'/';
        $this->load->view('index',$isi);
    }

    public function viewkursus($pk)
    {
        $isi['nav']         =$this->navkursus.' | Update';
        $isi['judul']       ='View '.$this->judulkursus;
        $isi['content']     =$this->folderkursus.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablekursus,$this->fieldpkkursus,$pk);
        $isi['link']        =$this->home.'/'.$this->linkkursus.'/';
        $isi['link2']       =$this->home.'/'.$this->linkkursus.'/';
        $isi['aksi']        ='view';
        $this->load->view('index',$isi);
    }

    public function createkursus()
    {
        if ($this->input->post('simpan')){
            $this->m_global->create($this->tablekursus,$this->field_datakursus());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkkursus);
        }else{
        $isi['nav']         =$this->navkursus.' | Create';
        $isi['judul']       ='Create '.$this->judulkursus;
        $isi['content']     =$this->folderkursus.'/form';
        $isi['link2']       =$this->home.'/'.$this->linkkursus;
        $isi['link']        =$this->home.'/'.$this->create.$this->linkkursus;
        $isi['aksi']        ='create';
        $isi['id']          =$this->m_global->getkodeunik($this->tablekursus,$this->fieldpkkursus);
        $this->load->view('index',$isi);
        }
    }

    public function updatekursus($pk)
    {
        if ($this->input->post('simpan')){
            $this->m_global->update($this->tablekursus,$this->fieldpkkursus,$pk,$this->field_datakursus());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkkursus);
        }else{
        $isi['nav']         =$this->navkursus.' | Update';
        $isi['judul']       ='Edit '.$this->judulkursus;
        $isi['content']     =$this->folderkursus.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablekursus,$this->fieldpkkursus,$pk);
        $isi['link2']       =$this->home.'/'.$this->linkkursus;
        $isi['link']        =$this->home.'/'.$this->update.$this->linkkursus.'/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    public function deletekursus($pk)
    {
        $this->m_global->delete($this->tablekursus,$this->fieldpkkursus,$pk);
        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect($this->home.'/'.$this->linkkursus);
    }
    
    private function field_datakursus()
    {
        return array(
            'id'                => $this->input->post('id'),
            'nama_kursus'        => $this->input->post('nama_kursus'),
            );
    }

    //Workshop=====================================================================================
    private $fieldpkworkshop    = 'id';
    private $tableworkshop      = 'data_workshop';
    private $navworkshop        = 'Workshop';
    private $judulworkshop      = 'Workshop';
    private $folderworkshop     = 'dst_workshop';
    private $linkworkshop       = 'workshop';

    public function workshop()
    {
        $isi['nav']         =$this->navworkshop;
        $isi['judul']       =$this->judulworkshop;
        $isi['content']     =$this->folderworkshop.'/'.$this->read;
        $isi['query']       =$this->db->get($this->tableworkshop);
        $isi['linkcreate']  =$this->home.'/'.$this->create.$this->linkworkshop.'/';
        $isi['linkupdate']  =$this->home.'/'.$this->update.$this->linkworkshop.'/';
        $isi['linkdelete']  =$this->home.'/'.$this->delete.$this->linkworkshop.'/';
        $isi['linkview']    =$this->home.'/view'.$this->linkworkshop.'/';
        $this->load->view('index',$isi);
    }

    public function viewworkshop($pk)
    {
        $isi['nav']         =$this->navworkshop.' | Update';
        $isi['judul']       ='View '.$this->judulworkshop;
        $isi['content']     =$this->folderworkshop.'/form';
        $isi['query']       =$this->m_global->read_update($this->tableworkshop,$this->fieldpkworkshop,$pk);
        $isi['link']        =$this->home.'/'.$this->linkworkshop.'/';
        $isi['link2']       =$this->home.'/'.$this->linkworkshop.'/';
        $isi['aksi']        ='view';
        $this->load->view('index',$isi);
    }

    public function createworkshop()
    {
        if ($this->input->post('simpan')){
            $this->m_global->create($this->tableworkshop,$this->field_dataworkshop());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkworkshop);
        }else{
        $isi['nav']         =$this->navworkshop.' | Create';
        $isi['judul']       ='Create '.$this->judulworkshop;
        $isi['content']     =$this->folderworkshop.'/form';
        $isi['link2']       =$this->home.'/'.$this->linkworkshop;
        $isi['link']        =$this->home.'/'.$this->create.$this->linkworkshop;
        $isi['aksi']        ='create';
        $isi['id']          =$this->m_global->getkodeunik($this->tableworkshop,$this->fieldpkworkshop);
        $this->load->view('index',$isi);
        }
    }

    public function updateworkshop($pk)
    {
        if ($this->input->post('simpan')){
            $this->m_global->update($this->tableworkshop,$this->fieldpkworkshop,$pk,$this->field_dataworkshop());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkworkshop);
        }else{
        $isi['nav']         =$this->navworkshop.' | Update';
        $isi['judul']       ='Edit '.$this->judulworkshop;
        $isi['content']     =$this->folderworkshop.'/form';
        $isi['query']       =$this->m_global->read_update($this->tableworkshop,$this->fieldpkworkshop,$pk);
        $isi['link2']       =$this->home.'/'.$this->linkworkshop;
        $isi['link']        =$this->home.'/'.$this->update.$this->linkworkshop.'/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    public function deleteworkshop($pk)
    {
        $this->m_global->delete($this->tableworkshop,$this->fieldpkworkshop,$pk);
        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect($this->home.'/'.$this->linkworkshop);
    }
    
    private function field_dataworkshop()
    {
        return array(
            'id'                => $this->input->post('id'),
            'nama_workshop'     => $this->input->post('nama_workshop'),
            );
    }

    //Ujian=====================================================================================
    private $fieldpkujian    = 'id';
    private $tableujian      = 'tr_ujian';
    private $navujian        = 'Ujian';
    private $judulujian      = 'Ujian';
    private $folderujian     = 'dst_ujian';
    private $linkujian       = 'ujian';

    public function ujian()
    {
        $isi['nav']         	=$this->navujian;
        $isi['judul']       	=$this->judulujian;
        $isi['content']     	=$this->folderujian.'/'.$this->read;
        $isi['query']       	=$this->db
									->join('data_kursus c','p.id_kursus = c.id','LEFT')
									->get($this->tableujian.' p');
        $isi['linkcreate']  	=$this->home.'/'.$this->create.$this->linkujian.'/';
        $isi['linkupdate']  	=$this->home.'/'.$this->update.$this->linkujian.'/';
        $isi['linkdelete']  	=$this->home.'/'.$this->delete.$this->linkujian.'/';
        $isi['linkview']    	=$this->home.'/view'.$this->linkujian.'/';
        $isi['linkaktif']   	=$this->home.'/aktif'.$this->linkujian.'/';
        $isi['linknonaktif']	=$this->home.'/nonaktif'.$this->linkujian.'/';
        $isi['linksoal']  		=$this->home.'/soal/';
        $isi['linkhasil_ujian'] =$this->home.'/hasil_ujian/';
        $this->load->view('index',$isi);
    }

    public function viewujian($pk)
    {
        $isi['nav']         =$this->navujian.' | Update';
        $isi['judul']       ='View '.$this->judulujian;
        $isi['content']     =$this->folderujian.'/form';
        $isi['query']       =$this->m_global->read_update($this->tableujian,$this->fieldpkujian,$pk);
        $isi['kursus']      =$this->db->get($this->tablekursus);
        $isi['link']        =$this->home.'/'.$this->linkujian.'/';
        $isi['link2']       =$this->home.'/'.$this->linkujian.'/';
        $isi['aksi']        ='view';
        $this->load->view('index',$isi);
    }

    public function createujian()
    {
        if ($this->input->post('simpan')){
            $this->m_global->create($this->tableujian,$this->field_dataujian());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkujian);
        }else{
        $isi['nav']         =$this->navujian.' | Create';
        $isi['judul']       ='Create '.$this->judulujian;
        $isi['content']     =$this->folderujian.'/form';
        $isi['link2']       =$this->home.'/'.$this->linkujian;
        $isi['link']        =$this->home.'/'.$this->create.$this->linkujian;
        $isi['kursus']      =$this->db->get($this->tablekursus);
        $isi['aksi']        ='create';
        $isi['id']          =$this->m_global->getkodeunik($this->tableujian,$this->fieldpkujian);
        $this->load->view('index',$isi);
        }
    }

    public function updateujian($pk)
    {
        if ($this->input->post('simpan')){
            $this->m_global->update($this->tableujian,$this->fieldpkujian,$pk,$this->field_dataujian());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkujian);
        }else{
        $isi['nav']         =$this->navujian.' | Update';
        $isi['judul']       ='Edit '.$this->judulujian;
        $isi['content']     =$this->folderujian.'/form';
        $isi['query']       =$this->m_global->read_update($this->tableujian,$this->fieldpkujian,$pk);
        $isi['kursus']      =$this->db->get($this->tablekursus);
        $isi['link2']       =$this->home.'/'.$this->linkujian;
        $isi['link']        =$this->home.'/'.$this->update.$this->linkujian.'/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    public function deleteujian($pk)
    {
        $this->m_global->delete($this->tableujian,$this->fieldpkujian,$pk);
        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect($this->home.'/'.$this->linkujian);
    }

    public function aktifujian($pk)
    {
        $this->m_global->update($this->tableujian,$this->fieldpkujian,$pk,array('status' => 'Aktif'));
        redirect($this->home.'/'.$this->linkujian,'refresh');
    }

    public function nonaktifujian($pk)
    {
        $this->m_global->update($this->tableujian,$this->fieldpkujian,$pk,array('status' => 'Tidak Aktif'));
        redirect($this->home.'/'.$this->linkujian,'refresh');
    }
    
    private function field_dataujian()
    {
        return array(
            'id'                => $this->input->post('id'),
            'nama_ujian'        => $this->input->post('nama_ujian'),
			'waktu'		        => $this->input->post('waktu'),
			'jumlah_soal'       => $this->input->post('jumlah_soal'),
			'id_kursus'         => $this->input->post('id_kursus')
            );
    }
	
	//Hasil Ujian=====================================================================================
    private $fieldpkhasil_ujian    = 'id';
    private $tablehasil_ujian      = 'tr_ikut_ujian';
    private $navhasil_ujian        = 'Hasil Ujian';
    private $judulhasil_ujian      = 'Hasil Ujian';
    private $folderhasil_ujian     = 'dst_hasil_ujian';
    private $linkhasil_ujian       = 'hasil_ujian';

    public function hasil_ujian($pk)
    {
        $isi['nav']         =$this->navhasil_ujian;
        $isi['judul']       =$this->judulhasil_ujian;
        $isi['content']     =$this->folderhasil_ujian.'/'.$this->read;
        $isi['query']       =$this->db
								  ->select('p.id, d.npm, p.id_user, d.nama_depan, d.nama_belakang, p.nilai, p.jml_benar, p.jml_salah, p.jml_kosong, p.tgl_selesai')
								  ->join('data_register d','p.id_user = d.id','LEFT')
								  ->join('tr_ujian c','p.id_tes = c.id','LEFT')
								  ->where('p.id_tes',$pk)
								  ->get($this->tablehasil_ujian.' p');
        $isi['linkdelete']  =$this->home.'/'.$this->delete.$this->linkhasil_ujian.'/';
        $isi['linkview']    =$this->home.'/view'.$this->linkhasil_ujian.'/';
        $isi['link2']       =$this->home.'/ujian/';
        $this->load->view('index',$isi);
    }

    public function viewhasil_ujian($pk)
    {
        $isi['nav']         =$this->navhasil_ujian.' | Update';
        $isi['judul']       ='View '.$this->judulhasil_ujian;
        $isi['content']     =$this->folderhasil_ujian.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablehasil_ujian,$this->fieldpkhasil_ujian,$pk);
        $isi['kursus']      =$this->db->get($this->tablekursus);
        $isi['link']        =$this->home.'/'.$this->linkhasil_ujian.'/';
        $isi['link2']       =$this->home.'/'.$this->linkhasil_ujian.'/';
        $isi['aksi']        ='view';
        $this->load->view('index',$isi);
    }

    public function createhasil_ujian()
    {
        if ($this->input->post('simpan')){
            $this->m_global->create($this->tablehasil_ujian,$this->field_datahasil_ujian());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkhasil_ujian);
        }else{
        $isi['nav']         =$this->navhasil_ujian.' | Create';
        $isi['judul']       ='Create '.$this->judulhasil_ujian;
        $isi['content']     =$this->folderhasil_ujian.'/form';
        $isi['link2']       =$this->home.'/'.$this->linkhasil_ujian;
        $isi['link']        =$this->home.'/'.$this->create.$this->linkhasil_ujian;
        $isi['kursus']      =$this->db->get($this->tablekursus);
        $isi['aksi']        ='create';
        $isi['id']          =$this->m_global->getkodeunik($this->tablehasil_ujian,$this->fieldpkhasil_ujian);
        $this->load->view('index',$isi);
        }
    }

    public function updatehasil_ujian($pk)
    {
        if ($this->input->post('simpan')){
            $this->m_global->update($this->tablehasil_ujian,$this->fieldpkhasil_ujian,$pk,$this->field_datahasil_ujian());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkhasil_ujian);
        }else{
        $isi['nav']         =$this->navhasil_ujian.' | Update';
        $isi['judul']       ='Edit '.$this->judulhasil_ujian;
        $isi['content']     =$this->folderhasil_ujian.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablehasil_ujian,$this->fieldpkhasil_ujian,$pk);
        $isi['kursus']      =$this->db->get($this->tablekursus);
        $isi['link2']       =$this->home.'/'.$this->linkhasil_ujian;
        $isi['link']        =$this->home.'/'.$this->update.$this->linkhasil_ujian.'/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    public function deletehasil_ujian($pk)
    {
        $this->m_global->delete($this->tablehasil_ujian,$this->fieldpkhasil_ujian,$pk);
		$id_user = $this->db->query("SELECT id_user from tr_ikut_ujian where id='".$pk."'");
		$this->db->query("DELETE FROM tr_jawab WHERE id_tes = 1 AND id_user = ".$id_user);
        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect($this->home.'/'.$this->linkhasil_ujian);
    }
    
    private function field_datahasil_ujian()
    {
        return array(
            'id'                => $this->input->post('id'),
            'nama_ujian'        => $this->input->post('nama_ujian'),
			'waktu'		        => $this->input->post('waktu'),
			'jumlah_soal'       => $this->input->post('jumlah_soal'),
			'id_kursus'         => $this->input->post('id_kursus')
            );
    }

    //a_modul====================================================================================
    private $fieldpka_modul    = 'id';
    private $tablea_modul      = 'data_modul';
    private $nava_modul        = 'Modul';
    private $judula_modul      = 'Modul';
    private $foldera_modul     = 'dst_modul';
    private $linka_modul       = 'a_modul';

    public function a_modul()
    {
        $isi['nav']         =$this->nava_modul;
        $isi['judul']       =$this->judula_modul;
        $isi['content']     =$this->foldera_modul.'/'.$this->read;
        $isi['query']       =$this->db->get($this->tablea_modul);
        $isi['linkcreate']  =$this->home.'/'.$this->create.$this->linka_modul.'/';
        $isi['linkupdate']  =$this->home.'/'.$this->update.$this->linka_modul.'/';
        $isi['linkdelete']  =$this->home.'/'.$this->delete.$this->linka_modul.'/';
        $isi['linkview']    =$this->home.'/view'.$this->linka_modul.'/';
        $isi['linkupload']  =$this->home.'/'.$this->update.$this->linka_modul.'/';
        $this->load->view('index',$isi);
    }

    public function createa_modul()
    {
        $id = $this->input->post('id');
        if ($this->input->post('simpan')){
            $this->load->library('upload');
            $nmfile = "file_".$id.'-'.time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './assets/upload/modul/'; //path folder
            $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '20488'; //maksimum besar file 20M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            $this->upload->initialize($config);
        if($_FILES['image']['name'])
        {
            if (!$this->upload->do_upload('image'))
            {
                redirect($this->home.'/'.$this->create.$this->linka_modul,'refresh'); //jika gagal maka akan ditampilkan form tambahgambar
                }else{
                $gbr = $this->upload->data();
                $data = array(
                    'id'                => $this->input->post('id'),
                    'judul_modul'       => $this->input->post('judul_modul'),
                    'nama_modul'        => $gbr['file_name']
                    );
                $this->m_global->create($this->tablea_modul,$data);
                $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                redirect($this->home.'/'.$this->linka_modul);
            }
        }else{
            $data = array(
                    'id'                => $this->input->post('id'),
                    'judul_modul'       => $this->input->post('judul_modul')
                    );
                $this->m_global->create($this->tablea_modul,$data);
                $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                redirect($this->home.'/'.$this->linka_modul);
        }
        }else{
        $isi['nav']         =$this->nava_modul.' | Create';
        $isi['judul']       ='Create '.$this->judula_modul;
        $isi['content']     =$this->foldera_modul.'/form';
        $isi['link']        =$this->home.'/'.$this->create.$this->linka_modul;
        $isi['aksi']        ='create';
        $isi['id']          =$this->m_global->getkodeunik($this->tablea_modul,$this->fieldpka_modul);
        $isi['link2']       =$this->home.'/'.$this->linka_modul.'/';
        $this->load->view('index',$isi);
        }
    }

    public function updatea_modul($pk)
    {
        if ($this->input->post('simpan')){
            $this->load->library('upload');
            $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './assets/upload/modul/'; //path folder
            $config['allowed_types'] = 'pdf'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '20488'; //maksimum besar file 20M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            $this->upload->initialize($config);
            if($_FILES['image']['name'])
            {
                if (!$this->upload->do_upload('image'))
                {
                    redirect($this->home.'/'.$this->update.$this->linka_modul); //jika gagal maka akan ditampilkan form tambahgambar
                    }else{
                    $path       = './assets/upload/modul/';
                    $imagelama  = $this->input->post('imagelama');
                    @unlink($path.$imagelama);

                    $gbr = $this->upload->data();
                    $data = array(
                    'id'                => $this->input->post('id'),
                    'judul_modul'       => $this->input->post('judul_modul'),
                    'nama_modul'        => $gbr['file_name']
                    );
                $this->m_global->update($this->tablea_modul,$this->fieldpka_modul,$pk,$data);
                $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                redirect($this->home.'/'.$this->linka_modul);
            }
        }else{
                $data = array(
                    'id'                => $this->input->post('id'),
                    'judul_modul'       => $this->input->post('judul_modul'),
                    );
                    $this->m_global->update($this->tablea_modul,$this->fieldpka_modul,$pk,$data);
                    $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                    redirect($this->home.'/'.$this->linka_modul);
            }
        }else{
        $isi['nav']         =$this->nava_modul.' | Update';
        $isi['judul']       ='Edit '.$this->judula_modul;
        $isi['content']     =$this->foldera_modul.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablea_modul,$this->fieldpka_modul,$pk);
        $isi['link2']       =$this->home.'/'.$this->linka_modul.'/';
        $isi['link']        =$this->home.'/'.$this->update.$this->linka_modul.'/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    public function deletea_modul($pk)
    {
        $this->m_global->delete($this->tablea_modul,$this->fieldpka_modul,$pk);
        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect($this->home.'/'.$this->linka_modul);
    }

    //A_Post=====================================================================================
    private $fieldpka_post    = 'id';
    private $tablea_post      = 'post';
    private $nava_post        = 'Post';
    private $judula_post      = 'Post';
    private $foldera_post     = 'dst_post';
    private $linka_post       = 'a_post';

    public function a_post()
    {
        $isi['nav']         =$this->nava_post;
        $isi['judul']       =$this->judula_post;
        $isi['content']     =$this->foldera_post.'/'.$this->read;
        $isi['query']       =$this->db->get($this->tablea_post);
        $isi['linkcreate']  =$this->home.'/'.$this->create.$this->linka_post.'/';
        $isi['linkupdate']  =$this->home.'/'.$this->update.$this->linka_post.'/';
        $isi['linkdelete']  =$this->home.'/'.$this->delete.$this->linka_post.'/';
        $isi['linkview']    =$this->home.'/view'.$this->linka_post.'/';
        $this->load->view('index',$isi);
    }

    public function viewa_post($pk)
    {
        $isi['nav']         =$this->nava_post.' | Update';
        $isi['judul']       ='View '.$this->judula_post;
        $isi['content']     =$this->foldera_post.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablea_post,$this->fieldpka_post,$pk);
        $isi['link']        =$this->home.'/'.$this->linka_post.'/';
        $isi['link2']       =$this->home.'/'.$this->linka_post.'/';
        $isi['aksi']        ='view';
        $this->load->view('index',$isi);
    }

    public function createa_post()
    {
        if ($this->input->post('simpan')){
            $this->m_global->create($this->tablea_post,$this->field_dataa_post());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linka_post);
        }else{
        $isi['nav']         =$this->nava_post.' | Create';
        $isi['judul']       ='Create '.$this->judula_post;
        $isi['content']     =$this->foldera_post.'/form';
        $isi['link2']       =$this->home.'/'.$this->linka_post;
        $isi['link']        =$this->home.'/'.$this->create.$this->linka_post;
        $isi['aksi']        ='create';
        $isi['id']          =$this->m_global->getkodeunik($this->tablea_post,$this->fieldpka_post);
        $this->load->view('index',$isi);
        }
    }

    public function updatea_post($pk)
    {
        if ($this->input->post('simpan')){
            $this->m_global->update($this->tablea_post,$this->fieldpka_post,$pk,$this->field_dataa_post());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linka_post);
        }else{
        $isi['nav']         =$this->nava_post.' | Update';
        $isi['judul']       ='Edit '.$this->judula_post;
        $isi['content']     =$this->foldera_post.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablea_post,$this->fieldpka_post,$pk);
        $isi['link2']       =$this->home.'/'.$this->linka_post;
        $isi['link']        =$this->home.'/'.$this->update.$this->linka_post.'/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    public function deletea_post($pk)
    {
        $this->m_global->delete($this->tablea_post,$this->fieldpka_post,$pk);
        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect($this->home.'/'.$this->linka_post);
    }
    
    private function field_dataa_post()
    {
        return array(
            'id'                => $this->input->post('id'),
            'post_title'        => $this->input->post('post_title'),
            'post_content'      => $this->input->post('post_content'),
            );
    }
	
	//Soal=====================================================================================
    private $fieldpkpretest    = 'id';
    private $tablepretest      = 'data_soal';
    private $navpretest        = 'Soal Pretest';
    private $judulpretest      = 'Soal Pretest';
    private $folderpretest     = 'dsis_pretest';
    private $linkpretest       = 'pretest';

    public function pretest()
    {
        $isi['nav']         =$this->navujian;
        $isi['judul']       =$this->judulujian;
        $isi['content']     =$this->folderpretest.'/'.$this->read;
        $isi['query']       =$this->db
                                  ->where('status', 'Aktif')
                                  ->join('data_kursus a','p.id_kursus = a.id','LEFT')
								  ->get('tr_ujian p');
        $isi['query2']      =$this->db
                                  ->where('id_user', $this->session->userdata('id'))
                                  ->get('tr_ikut_ujian')
                                  ->row();
        $isi['linkview']    =$this->home.'/kerjakan/';
        $this->load->view('index',$isi);
    }

    public function kerjakan($pk)
    {
        $this->db->query("UPDATE tr_mahasiswa_kursus SET id_ujian = ".$pk." WHERE id_mahasiswa = '".$this->session->userdata('id')."'");
        $cek_sdh_selesai= $this->db->query("SELECT id FROM tr_ikut_ujian WHERE id_tes = ".$pk." AND id_user = '".$this->session->userdata('id')."' AND status = 'y'")->num_rows();
        if ($cek_sdh_selesai < 1) {
            $cek_detil_tes      = $this->db->query("SELECT * FROM tr_ujian WHERE status = 'Aktif'")->row();
            $q_cek_sdh_ujian    = $this->db->query("SELECT id FROM tr_ikut_ujian WHERE id_tes = ".$pk." AND id_user = '".$this->session->userdata('id')."'");
            $d_cek_sdh_ujian    = $q_cek_sdh_ujian->row();
            $cek_sdh_ujian      = $q_cek_sdh_ujian->num_rows();
            if ($cek_sdh_ujian == 0) {
                $waktu_selesai      =$this->tambah_jam_sql($cek_detil_tes->waktu);
                $this->db->query("INSERT INTO tr_ikut_ujian VALUES (null, ".$pk.", '".$this->session->userdata('id')."', '', 0, 0, 0, 0, 0, NOW(), ADDTIME(NOW(), '$waktu_selesai'), 'n')");
                $isi['nav']         =$this->navpretest;
                $isi['judul']       ='View '.$this->judulpretest;
                $isi['content']     =$this->folderpretest.'/form';
                $isi['query2']      =$this->db->query("SELECT * FROM tr_ikut_ujian WHERE id_tes = ".$pk." AND id_user = '".$this->session->userdata('id')."'");
                $isi['query']       =$this->db->query("SELECT id, id_kategori, gambar, soal, opsi_a, opsi_b, opsi_c, opsi_d, opsi_e, '' AS jawaban FROM data_soal WHERE id_tr_ujian = ".$pk." ORDER BY RAND() LIMIT ".$cek_detil_tes->jumlah_soal);
                $isi['link']        =$this->home.'/jawab/1';
                $isi['link2']       =$this->home.'/'.$this->linkpretest.'/';
                $isi['aksi']        ='view';
                $this->load->view('index',$isi);
            }else{
                $isi['nav']         =$this->navpretest;
                $isi['judul']       ='View '.$this->judulpretest;
                $isi['content']     =$this->folderpretest.'/form';
                $isi['query2']      =$this->db->query("SELECT * FROM tr_ikut_ujian WHERE id_tes = ".$pk." AND id_user = '".$this->session->userdata('id')."'");
                $isi['query']       =$this->db->query("SELECT id, id_kategori, gambar, soal, opsi_a, opsi_b, opsi_c, opsi_d, opsi_e, '' AS jawaban FROM data_soal WHERE id_tr_ujian = ".$pk." ORDER BY RAND() LIMIT ".$cek_detil_tes->jumlah_soal);
                $isi['link']        =$this->home.'/jawab/1';
                $isi['link2']       =$this->home.'/'.$this->linkpretest.'/';
                $isi['aksi']        ='view';
                $this->load->view('index',$isi);
            }
        }else {
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Sudah selesai Mengerjakan soal Pretest.</div></div>');
            redirect('home/pretest/');
        }
    }

    public function jawab($pk)
    {
        if($this->input->post('submit')){
            $pilihan=$this->input->post("pilihan");
            $id_soal=$this->input->post("id");
            $id_kategori=$this->input->post("id_kategori");
            $jumlah=$this->input->post("jumlah");
            
            $score      =0;
            $benar      =0;
            $salah      =0;
            $kosong     =0;
            $update     ="";
            
            for ($i=0;$i<$jumlah;$i++){
                $nomor=$id_soal[$i];
                $kategori=$id_kategori[$i];
                if (empty($pilihan[$nomor])){
                    $update    = $update."".$nomor.":"."".",";
					$this->db->query("INSERT INTO tr_jawab VALUES (null, 1, '".$this->session->userdata('id')."', '$kategori', '$nomor', '')");
                    $kosong++;
                }else{
                    $jawaban    =$pilihan[$nomor];
                    $query      =$this->db->query("SELECT * from data_soal where id='$nomor' and jawaban='$jawaban'");
                    $cek        =$query->num_rows();
                    if($cek){
                        $update    = $update."".$nomor.":".$jawaban.",";
						$this->db->query("INSERT INTO tr_jawab VALUES (null, 1, '".$this->session->userdata('id')."', '$kategori', '$nomor', '$jawaban')");
                        $benar++;
                    }else{
                        $update    = $update."".$nomor.":".$jawaban.",";
						$this->db->query("INSERT INTO tr_jawab VALUES (null, 1, '".$this->session->userdata('id')."', '$kategori', '$nomor', '$jawaban')");
                        $salah++;
                    }
                }
            }
            $update = substr($update, 0, -1);
            $score  = 100/$jumlah*$benar;
            $hasil  = number_format($score,1);
            $this->db->query("UPDATE tr_ikut_ujian SET jml_benar = ".$benar.", jml_salah = ".$salah.", jml_kosong = ".$kosong.", nilai = '".$hasil."', list_jawaban = '".$update."', status = 'y' WHERE id_tes = '$pk' AND id_user = '".$this->session->userdata('id')."'");
			redirect('home/pretest/');
        }else{
            redirect('home/pretest/');
        }
    }

    public function tambah_jam_sql($menit) {
    $str = "";
    if ($menit < 60) {
        $str = "00:".str_pad($menit, 2, "0", STR_PAD_LEFT).":00";
    } else if ($menit >= 60) {
        $mod = $menit % 60;
        $bg = floor($menit / 60);
        $str = str_pad($bg, 2, "0", STR_PAD_LEFT).":".str_pad($mod, 2, "0", STR_PAD_LEFT).":00";
    }
    return $str;
    }
	
	//Pengajar=====================================================================================
    private $fieldpkpengajar    = 'id';
    private $tablepengajar      = 'data_pengajar';
    private $navpengajar        = 'Pengajar';
    private $judulpengajar      = 'Pengajar';
    private $folderpengajar     = 'dsis_pengajar';
    private $linkpengajar       = 'pengajar';

    public function pengajar()
    {
        $isi['nav']         =$this->navpengajar;
        $isi['judul']       =$this->judulpengajar;
        $isi['content']     =$this->folderpengajar.'/'.$this->read;
        $isi['query']       =$this->db->get($this->tablepengajar);
        $isi['linkview']    =$this->home.'/view'.$this->linkpengajar.'/';
        $this->load->view('index',$isi);
    }

    public function viewpengajar($pk)
    {
        $isi['nav']         =$this->navpengajar.' | Update';
        $isi['judul']       ='View '.$this->judulpengajar;
        $isi['content']     =$this->folderpengajar.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablepengajar,$this->fieldpkpengajar,$pk);
        $isi['link']        =$this->home.'/'.$this->linkpengajar.'/';
        $isi['link2']       =$this->home.'/'.$this->linkpengajar.'/';
        $isi['aksi']        ='view';
        $this->load->view('index',$isi);
    }

    //Profile Mahasiswa=====================================================================================
    private $fieldpkprofile    = 'id';
    private $tableprofile      = 'data_register';
    private $navprofile        = 'Profile';
    private $judulprofile      = 'Identitas Mahasiswa';
    private $folderprofile     = 'dsis_profile';
    private $linkprofile       = 'profile';

    public function profile()
    {
        $isi['profile']     =True;
        $isi['nav']         =$this->navprofile.' | Update';
        $isi['judul']       ='View '.$this->judulprofile;
        $isi['content']     =$this->folderprofile.'/form';
        $isi['query']       =$this->m_global->read_update($this->tableprofile,$this->fieldpkprofile,$this->session->userdata('id'));
        $isi['link']        =$this->home.'/'.$this->linkprofile.'/';
        $isi['link2']       =$this->home.'/'.$this->linkprofile.'/';
        $isi['linkupload']  =$this->home.'/uploadfotoprofile/';
        $isi['linkupdate']  =$this->home.'/'.$this->update.$this->linkprofile.'/';
        $isi['aksi']        ='view';
        $this->load->view('index',$isi);
    }

    public function uploadfotoprofile($pk)
    {
        if ($this->input->post('simpan')){
            $this->load->library('upload');
            $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './assets/upload/mahasiswa/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '20488'; //maksimum besar file 20M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            $this->upload->initialize($config);
            if($_FILES['image']['name'])
            {
                if (!$this->upload->do_upload('image'))
                {
                    redirect($this->home.'/uploadfotoprofile/'.$pk); //jika gagal maka akan ditampilkan form tambahgambar
                    }else{
                    $gbr = $this->upload->data();
                    $data = array(
                    'id'                => $this->input->post('id'),
                    'image'             => $gbr['file_name']
                    );
                    $this->m_global->update($this->tableprofile,$this->fieldpkprofile,$pk,$data);
                    $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                    redirect($this->home.'/'.$this->linkprofile);
                }
            }else{
                $data = array(
                    'id'                => $this->input->post('id'),
                    );
                    $this->m_global->update($this->tableprofile,$this->fieldpkprofile,$pk,$data);
                    $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                    redirect($this->home.'/'.$this->linkprofile);
            }
        }else{
        $isi['profile']     =True;
        $isi['nav']         =$this->navprofile.' | Update';
        $isi['judul']       ='Edit '.$this->judulprofile;
        $isi['content']     =$this->folderprofile.'/fupload';
        $isi['query']       =$this->m_global->read_update($this->tableprofile,$this->fieldpkprofile,$pk);
        $isi['link']        =$this->home.'/uploadfotoprofile/';
        $isi['link2']       =$this->home.'/'.$this->linkprofile.'/';
        $this->load->view('index',$isi);
        }
    }

    public function updateprofile($pk)
    {
        if ($this->input->post('simpan')){
            $this->load->library('upload');
            $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './assets/upload/mahasiswa/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '20488'; //maksimum besar file 20M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            $this->upload->initialize($config);
            if($_FILES['image']['name'])
            {
                if (!$this->upload->do_upload('image'))
                {
                    redirect($this->home.'/'.$this->update.$this->linkprofile); //jika gagal maka akan ditampilkan form tambahgambar
                    }else{
                    $path       = './assets/upload/siswa/';
                    $imagelama  = $this->input->post('imagelama');
                    @unlink($path.$imagelama);

                    $gbr = $this->upload->data();
                    $data = array(
                    'id'                => $this->input->post('id'),
                    'nama_depan'        => $this->input->post('nama_depan'),
                    'nama_belakang'     => $this->input->post('nama_belakang'),
                    'tempat_lahir'      => $this->input->post('tempat_lahir'),
                    'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
                    'jk'                => $this->input->post('jk'),
                    'no_hp'             => $this->input->post('nohp'),
                    'alamat'            => $this->input->post('alamat'),
                    'kota'              => $this->input->post('kota'),
                    'email'             => $this->input->post('email'),
                    'npm'               => $this->input->post('npm'),
                    'kelas'             => $this->input->post('kelas'),
                    'jurusan'           => $this->input->post('jurusan'),
                    'fakultas'          => $this->input->post('fakultas'),
                    'domisili'          => $this->input->post('domisili'),
                    'gambar'            => $gbr['file_name']
                    );
                $this->m_global->update($this->tableprofile,$this->fieldpkprofile,$pk,$data);
                $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                redirect($this->home.'/'.$this->linkprofile);
            }
        }else{
                $data = array(
                    'id'                => $this->input->post('id'),
                    'nama_depan'        => $this->input->post('nama_depan'),
                    'nama_belakang'     => $this->input->post('nama_belakang'),
                    'tempat_lahir'      => $this->input->post('tempat_lahir'),
                    'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
                    'jk'                => $this->input->post('jk'),
                    'no_hp'             => $this->input->post('nohp'),
                    'alamat'            => $this->input->post('alamat'),
                    'kota'              => $this->input->post('kota'),
                    'email'             => $this->input->post('email'),
                    'npm'               => $this->input->post('npm'),
                    'kelas'             => $this->input->post('kelas'),
                    'jurusan'           => $this->input->post('jurusan'),
                    'fakultas'          => $this->input->post('fakultas'),
                    'domisili'          => $this->input->post('domisili'),
                    'status'            => $this->input->post('status')
                    );
                    $this->m_global->update($this->tableprofile,$this->fieldpkprofile,$pk,$data);
                    $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                    redirect($this->home.'/'.$this->linkprofile);
            }
        }else{
        $isi['profile']     =True;
        $isi['nav']         =$this->navprofile.' | Update';
        $isi['judul']       ='Edit '.$this->judulprofile;
        $isi['content']     =$this->folderprofile.'/form_edit';
        $isi['query']       =$this->m_global->read_update($this->tableprofile,$this->fieldpkprofile,$pk);
        $isi['link2']       =$this->home.'/'.$this->linkprofile.'/';
        $isi['link']        =$this->home.'/'.$this->update.$this->linkprofile.'/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    //modul====================================================================================
    private $fieldpkmodul    = 'id';
    private $tablemodul      = 'data_modul';
    private $navmodul        = 'Modul';
    private $judulmodul      = 'Modul';
    private $foldermodul     = 'dsis_modul';
    private $linkmodul       = 'modul';

    public function modul()
    {
        $isi['nav']         =$this->navmodul;
        $isi['judul']       =$this->judulmodul;
        $isi['content']     =$this->foldermodul.'/'.$this->read;
        $isi['query']       =$this->db->get($this->tablemodul);
        $this->load->view('index',$isi);
    }

    //Post=====================================================================================
    private $fieldpkpost    = 'id';
    private $tablepost      = 'post';
    private $navpost        = 'Post';
    private $judulpost      = 'Post';
    private $folderpost     = 'dsis_post';
    private $linkpost       = 'post';

    public function post()
    {
        $isi['nav']         =$this->navpost;
        $isi['judul']       =$this->judulpost;
        $isi['content']     =$this->folderpost.'/'.$this->read;
        $isi['query']       =$this->db->get($this->tablepost);
        $isi['linkview']    =$this->home.'/view'.$this->linkpost.'/';
        $this->load->view('index',$isi);
    }

    public function viewpost($pk)
    {
        $isi['nav']         =$this->navpost.' | Update';
        $isi['judul']       ='View '.$this->judulpost;
        $isi['content']     =$this->folderpost.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablepost,$this->fieldpkpost,$pk);
        $isi['link']        =$this->home.'/'.$this->linkpost.'/';
        $isi['link2']       =$this->home.'/'.$this->linkpost.'/';
        $isi['aksi']        ='view';
        $this->load->view('index',$isi);
    }

    //Profile Pengajar=====================================================================================
    private $fieldpkp_profile    = 'id';
    private $tablep_profile      = 'data_pengajar';
    private $navp_profile        = 'Profile';
    private $judulp_profile      = 'Identitas Pengajar';
    private $folderp_profile     = 'dst_profile';
    private $linkp_profile       = 'p_profile';

    public function p_profile()
    {
        $isi['p_profile']    =True;
        $isi['nav']         =$this->navp_profile.' | Update';
        $isi['judul']       ='View '.$this->judulp_profile;
        $isi['content']     =$this->folderp_profile.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablep_profile,$this->fieldpkp_profile,$this->session->userdata('id_tabel'));
        $isi['link']        =$this->home.'/'.$this->linkp_profile.'/';
        $isi['link2']       =$this->home.'/'.$this->linkp_profile.'/';
        $isi['linkupload']  =$this->home.'/uploadfotop_profile/';
        $isi['linkupdate']  =$this->home.'/'.$this->update.$this->linkp_profile.'/';
        $isi['aksi']        ='view';
        $this->load->view('index',$isi);
    }

    public function uploadfotop_profile($pk)
    {
        if ($this->input->post('simpan')){
            $this->load->library('upload');
            $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './assets/upload/pegajar/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '20488'; //maksimum besar file 20M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            $this->upload->initialize($config);
            if($_FILES['image']['name'])
            {
                if (!$this->upload->do_upload('image'))
                {
                    redirect($this->home.'/uploadfotop_profile/'.$pk); //jika gagal maka akan ditampilkan form tambahgambar
                    }else{
                    $gbr = $this->upload->data();
                    $data = array(
                    'id'                => $this->input->post('id'),
                    'image'             => $gbr['file_name']
                    );
                    $this->m_global->update($this->tablep_profile,$this->fieldpkp_profile,$pk,$data);
                    $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                    redirect($this->home.'/'.$this->linkp_profile);
                }
            }else{
                $data = array(
                    'id'                => $this->input->post('id'),
                    );
                    $this->m_global->update($this->tablep_profile,$this->fieldpkp_profile,$pk,$data);
                    $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                    redirect($this->home.'/'.$this->linkp_profile);
            }
        }else{
        $isi['p_profile']    =True;
        $isi['nav']         =$this->navp_profile.' | Update';
        $isi['judul']       ='Edit '.$this->judulp_profile;
        $isi['content']     =$this->folderp_profile.'/fupload';
        $isi['query']       =$this->m_global->read_update($this->tablep_profile,$this->fieldpkp_profile,$pk);
        $isi['link']        =$this->home.'/uploadfotop_profile/';
        $isi['link2']       =$this->home.'/'.$this->linkp_profile.'/';
        $this->load->view('index',$isi);
        }
    }

    public function updatep_profile($pk)
    {
        if ($this->input->post('simpan')){
            $this->load->library('upload');
            $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './assets/upload/pengajar/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '20488'; //maksimum besar file 20M
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            $this->upload->initialize($config);
            if($_FILES['image']['name'])
            {
                if (!$this->upload->do_upload('image'))
                {
                    redirect($this->home.'/'.$this->update.$this->linkp_profile); //jika gagal maka akan ditampilkan form tambahgambar
                    }else{
                    $path       = './assets/upload/siswa/';
                    $imagelama  = $this->input->post('imagelama');
                    @unlink($path.$imagelama);

                    $gbr = $this->upload->data();
                    $data = array(
                    'id'                => $this->input->post('id'),
                    'nama_depan'        => $this->input->post('nama_depan'),
                    'nama_belakang'     => $this->input->post('nama_belakang'),
                    'tempat_lahir'      => $this->input->post('tempat_lahir'),
                    'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
                    'jk'                => $this->input->post('jk'),
                    'no_hp'             => $this->input->post('nohp'),
                    'alamat'            => $this->input->post('alamat'),
                    'kota'              => $this->input->post('kota'),
                    'email'             => $this->input->post('email'),
                    'gambar'            => $gbr['file_name']
                    );
                $this->m_global->update($this->tablep_profile,$this->fieldpkp_profile,$pk,$data);
                $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                redirect($this->home.'/'.$this->linkp_profile);
            }
        }else{
                $data = array(
                    'id'                => $this->input->post('id'),
                    'nama_depan'        => $this->input->post('nama_depan'),
                    'nama_belakang'     => $this->input->post('nama_belakang'),
                    'tempat_lahir'      => $this->input->post('tempat_lahir'),
                    'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
                    'jk'                => $this->input->post('jk'),
                    'no_hp'             => $this->input->post('nohp'),
                    'alamat'            => $this->input->post('alamat'),
                    'kota'              => $this->input->post('kota'),
                    'email'             => $this->input->post('email'),
                    );
                    $this->m_global->update($this->tablep_profile,$this->fieldpkp_profile,$pk,$data);
                    $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                    redirect($this->home.'/'.$this->linkp_profile);
            }
        }else{
        $isi['p_profile']   =True;
        $isi['nav']         =$this->navp_profile.' | Update';
        $isi['judul']       ='Edit '.$this->judulp_profile;
        $isi['content']     =$this->folderp_profile.'/form_edit';
        $isi['query']       =$this->m_global->read_update($this->tablep_profile,$this->fieldpkp_profile,$pk);
        $isi['link2']       =$this->home.'/'.$this->linkp_profile.'/';
        $isi['link']        =$this->home.'/'.$this->update.$this->linkp_profile.'/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    //Gelombang=====================================================================================
    private $fieldpkgelombang    = 'id';
    private $tablegelombang      = 'data_gelombang';
    private $navgelombang        = 'Gelombang';
    private $judulgelombang      = 'Gelombang';
    private $foldergelombang     = 'dst_gelombang';
    private $linkgelombang       = 'gelombang';

    public function rombelgelombang($id)
    {
        $isi['gelombang']   =True;
        $isi['nav']         =$this->navgelombang;
        $isi['judul']       =$this->judulgelombang;
        $isi['content']     =$this->foldergelombang.'/rombelgelombang';
        $isi['query']       =$this->db
                                  ->select('p.id_mahasiswa, d.nama_lengkap, d.nama_depan, d.nama_belakang, c.gelombang, c.kelas')
                                  ->join('data_register d','p.id_mahasiswa = d.id','LEFT')
                                  ->join('data_gelombang c','p.id_gelombang = c.id','LEFT')
                                  ->where('p.id_gelombang', $id)
                                  ->get('tr_mahasiswa_kursus p');
        $isi['gelombang']   =$this->db
                                  ->where('id', $id)
                                  ->get($this->tablegelombang);
        $isi['tgelombang']  =$this->db
                                  ->get($this->tablegelombang);
        $isi['naikkelas']   =$this->home.'/naikgelombang/'.$id;
        $isi['link']        =$this->home.'/'.$this->linkgelombang.'/';
        $this->load->view('index',$isi);
    }
    
    public function naikgelombang($pk)
    {
        if (isset($_POST['id'])){
            $id_gelombang = $this->input->post('id_gelombang');
            $counter = 0;
            foreach ($_POST['id'] as $id) {
                
                $this->db->where('id_mahasiswa', $id)
                         ->update('tr_mahasiswa_kursus', array('id_gelombang' => $id_gelombang));
                $counter++;
            }
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect('home/gelombang');
        }else{
            redirect('home/gelombang');
        }
    }

    public function gelombang()
    {
        $isi['gelombang']       =True;
        $isi['nav']         =$this->navgelombang;
        $isi['judul']       =$this->judulgelombang;
        $isi['content']     =$this->foldergelombang.'/'.$this->read;
        $isi['query']       =$this->db
                                  ->get($this->tablegelombang);
        $isi['linkcreate']  =$this->home.'/'.$this->create.$this->linkgelombang.'/';
        $isi['linkupdate']  =$this->home.'/'.$this->update.$this->linkgelombang.'/';
        $isi['linkdelete']  =$this->home.'/'.$this->delete.$this->linkgelombang.'/';
        $isi['linkrombel']  =$this->home.'/rombelgelombang/';
        $this->load->view('index',$isi);
    }

    public function creategelombang()
    {
        if ($this->input->post('simpan')){
            $this->m_global->create($this->tablegelombang,$this->field_datagelombang());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkgelombang);
        }else{
        $isi['gelombang']       =True;
        $isi['nav']         =$this->navgelombang.' | Create';
        $isi['judul']       ='Create '.$this->judulgelombang;
        $isi['content']     =$this->foldergelombang.'/form';
        $isi['link2']       =$this->home.'/'.$this->linkgelombang;
        $isi['link']        =$this->home.'/'.$this->create.$this->linkgelombang;
        $isi['aksi']        ='create';
        $isi['id']          =$this->m_global->getkodeunik($this->tablegelombang,$this->fieldpkgelombang);
        $this->load->view('index',$isi);
        }
    }

    public function updategelombang($pk)
    {
        if ($this->input->post('simpan')){
            $this->m_global->update($this->tablegelombang,$this->fieldpkgelombang,$pk,$this->field_datagelombang());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkgelombang);
        }else{
        $isi['gelombang']       =True;
        $isi['nav']         =$this->navgelombang.' | Update';
        $isi['judul']       ='Edit '.$this->judulgelombang;
        $isi['content']     =$this->foldergelombang.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablegelombang,$this->fieldpkgelombang,$pk);
        $isi['link2']       =$this->home.'/'.$this->linkgelombang;
        $isi['link']        =$this->home.'/'.$this->update.$this->linkgelombang.'/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    public function deletegelombang($pk)
    {
        $this->m_global->delete($this->tablegelombang,$this->fieldpkgelombang,$pk);
        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect($this->home.'/'.$this->linkgelombang);
    }
    
    private function field_datagelombang()
    {
        return array(
            'id'                => $this->input->post('id'),
            'gelombang'           => $this->input->post('gelombang'),
            'kelas'             => $this->input->post('kelas'),
            'pj'                => $this->input->post('pj')
            );
    }

    //Kelas=====================================================================================
    private $fieldpkkelas    = 'id';
    private $tablekelas      = 'data_kelas';
    private $navkelas        = 'Pengaturan | Kelas';
    private $judulkelas      = 'Kelas';
    private $folderkelas     = 'p_kelas';
    private $linkkelas       = 'kelas';

    public function rombel($id)
    {
        $isi['kelas']       =True;
        $isi['nav']         =$this->navkelas;
        $isi['judul']       =$this->judulkelas;
        $isi['content']     =$this->folderkelas.'/rombel';
        $isi['query']       =$this->db
                                  ->select('p.id, p.nama_siswa, c.tingkat, c.jurusan, c.kelas')
                                  ->join('data_kelas c','p.id_kelas = c.id','LEFT')
                                  ->where('status', 'Aktif')
                                  ->where('p.id_kelas', $id)
                                  ->where('p.id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tablesiswa.' p');
        $isi['kelas']       =$this->db
                                  ->select('id, tingkat, jurusan, kelas')
                                  ->where('id', $id)
                                  ->where('id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tablekelas);
        $isi['tkelas']       =$this->db
                                  ->select('id, tingkat, jurusan, kelas')
                                  ->where('id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tablekelas);
        $isi['naikkelas']   =$this->home.'/naikkelas/';
        $isi['link']        =$this->home.'/'.$this->linkkelas.'/';
        $this->load->view('index',$isi);
    }
    
    public function naikkelas($pk)
    {
        if (isset($_POST['id'])){
            $id_kelas = $this->input->post('id_kelas');
            $counter = 0;
            foreach ($_POST['id'] as $id) {
                $this->db->where('id_mahasiswa', $id)
                         ->update('tr_mahasiswa_kursus', array('id_gelombang' => $id_kelas));
                $counter++;
            }
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect('home/kelas');
        }else{
            redirect('home/kelas');
        }
    }

    public function kelas()
    {
        $isi['kelas']       =True;
        $isi['nav']         =$this->navkelas;
        $isi['judul']       =$this->judulkelas;
        $isi['content']     =$this->folderkelas.'/'.$this->read;
        $isi['query']       =$this->db
                                  ->select('p.id, p.tingkat, p.jurusan, p.kelas, c.nama_guru')
                                  ->join('data_guru c','p.id_guru = c.id','LEFT')
                                  ->where('p.id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tablekelas.' p');
        $isi['linkcreate']  =$this->home.'/'.$this->create.$this->linkkelas.'/';
        $isi['linkupdate']  =$this->home.'/'.$this->update.$this->linkkelas.'/';
        $isi['linkdelete']  =$this->home.'/'.$this->delete.$this->linkkelas.'/';
        $isi['linkrombel']  =$this->home.'/rombel/';
        $this->load->view('index',$isi);
    }

    public function createkelas()
    {
        if ($this->input->post('simpan')){
            $this->m_global->create($this->tablekelas,$this->field_datakelas());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkkelas);
        }else{
        $isi['kelas']       =True;
        $isi['guru']        =$this->db
                                  ->where('id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tableguru);
        $isi['nav']         =$this->navkelas.' | Create';
        $isi['judul']       ='Create '.$this->judulkelas;
        $isi['content']     =$this->folderkelas.'/form';
        $isi['link2']       =$this->home.'/'.$this->linkkelas;
        $isi['link']        =$this->home.'/'.$this->create.$this->linkkelas;
        $isi['aksi']        ='create';
        $isi['id']          =$this->m_global->getkodeunikpegawai($this->tablekelas,$this->fieldpkkelas);
        $this->load->view('index',$isi);
        }
    }

    public function updatekelas($pk)
    {
        if ($this->input->post('simpan')){
            $this->m_global->update($this->tablekelas,$this->fieldpkkelas,$pk,$this->field_datakelas());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkkelas);
        }else{
        $isi['kelas']       =True;
        $isi['guru']        =$this->db
                                  ->where('id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tableguru);
        $isi['nav']         =$this->navkelas.' | Update';
        $isi['judul']       ='Edit '.$this->judulkelas;
        $isi['content']     =$this->folderkelas.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablekelas,$this->fieldpkkelas,$pk);
        $isi['link2']       =$this->home.'/'.$this->linkkelas;
        $isi['link']        =$this->home.'/'.$this->update.$this->linkkelas.'/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    public function deletekelas($pk)
    {
        $this->m_global->delete($this->tablekelas,$this->fieldpkkelas,$pk);
        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect($this->home.'/'.$this->linkkelas);
    }
    
    private function field_datakelas()
    {
        return array(
            'id'                => $this->input->post('id'),
            'tingkat'           => $this->input->post('tingkat'),
            'jurusan'           => $this->input->post('jurusan'),
            'kelas'             => $this->input->post('kelas'),
            'id_guru'           => $this->input->post('id_guru'),
            'id_sekolah'        => $this->session->userdata("id_sekolah")
            );
    }

    //Tahun Pelajaran=====================================================================================
    private $fieldpktps    = 'id';
    private $tabletps      = 'data_tahun_pelajaran';
    private $navtps        = 'Tahun Pelajaran / Semester';
    private $judultps      = 'Tahun Pelajaran / Semester';
    private $foldertps     = 'tps';
    private $linktps       = 'tps';

    public function tps()
    {
        $isi['tas']         =True;
        $isi['nav']         =$this->navtps;
        $isi['judul']       =$this->judultps;
        $isi['content']     =$this->foldertps.'/'.$this->read;
        $isi['query']       =$this->db
                                  ->where('id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tabletps);
        $isi['linkcreate']  =$this->home.'/'.$this->create.$this->linktps.'/';
        $isi['linkupdate']  =$this->home.'/'.$this->update.$this->linktps.'/';
        $isi['linkdelete']  =$this->home.'/'.$this->delete.$this->linktps.'/';
        $isi['linkaktif']   =$this->home.'/aktif'.$this->linktps.'/';
        $isi['linknonaktif']=$this->home.'/nonaktif'.$this->linktps.'/';
        $this->load->view('index',$isi);
    }

    public function createtps()
    {
        if ($this->input->post('simpan')){
            $this->m_global->create($this->tabletps,$this->field_datatps());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linktps);
        }else{
        $isi['tas']         =True;
        $isi['nav']         =$this->navtps.' | Create';
        $isi['judul']       ='Create '.$this->judultps;
        $isi['content']     =$this->foldertps.'/form';
        $isi['link2']       =$this->home.'/'.$this->linktps;
        $isi['link']        =$this->home.'/'.$this->create.$this->linktps;
        $isi['aksi']        ='create';
        $isi['id']          =$this->m_global->getkodeunik($this->tabletps,$this->fieldpktps);
        $this->load->view('index',$isi);
        }
    }

    public function updatetps($pk)
    {
        if ($this->input->post('simpan')){
            $this->m_global->update($this->tabletps,$this->fieldpktps,$pk,$this->field_datatps());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linktps);
        }else{
        $isi['tas']         =True;
        $isi['nav']         =$this->navtps.' | Update';
        $isi['judul']       ='Edit '.$this->judultps;
        $isi['content']     =$this->foldertps.'/form';
        $isi['query']       =$this->m_global->read_update($this->tabletps,$this->fieldpktps,$pk);
        $isi['link2']       =$this->home.'/'.$this->linktps;
        $isi['link']        =$this->home.'/'.$this->update.$this->linktps.'/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    public function aktiftps($pk)
    {
        $this->m_global->update($this->tabletps,$this->fieldpktps,$pk,array('status' => 'Aktif'));
        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect($this->home.'/'.$this->linktps);
    }

    public function nonaktiftps($pk)
    {
        $this->m_global->update($this->tabletps,$this->fieldpktps,$pk,array('status' => 'Tidak Aktif'));
        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect($this->home.'/'.$this->linktps);
    }

    public function deletetps($pk)
    {
        $this->m_global->delete($this->tabletps,$this->fieldpktps,$pk);
        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect($this->home.'/'.$this->linktps);
    }
    
    private function field_datatps()
    {
        return array(
            'id'                => $this->input->post('id'),
            'tahun_pelajaran'   => $this->input->post('tahun_pelajaran'),
            'semester'          => $this->input->post('semester'),
            'id_sekolah'        => $this->session->userdata("id_sekolah"),
            'pembagian_raport'  => $this->input->post('pembagian_raport'),
            'status'            => $this->input->post('status')
            );
    }

    //Kelas Ajar=====================================================================================
    private $fieldpkkelas_ajar     = 'id';
    private $tablekelas_ajar       = 'rel_guru_matapelajaran';
    private $navkelas_ajar         = 'Kelas Ajar';
    private $judulkelas_ajar       = 'Kelas Ajar';
    private $folderkelas_ajar      = 'dst_guru';
    private $linkkelas_ajar        = 'kelas_ajar';

    public function kelas_ajar()
    {
        $isi['kelas_ajar']  =True;
        $isi['nav']         =$this->navkelas_ajar;
        $isi['judul']       =$this->judulkelas_ajar;
        $isi['content']     =$this->folderguru.'/read_kelas_ajar';
        $isi['query']       =$this->db
                                  ->select('p.id, a.nama_guru, b.nama_mapel, c.tingkat, c.jurusan, c.kelas')
                                  ->join('data_guru a','p.id_guru = a.id','LEFT')
                                  ->join('data_mapel b','p.id_mapel = b.id','LEFT')
                                  ->join('data_kelas c','p.id_kelas = c.id','LEFT')
                                  ->where('p.id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tablekelas_ajar.' p');
        $isi['linkcreate']  =$this->home.'/pilih_guru/';
        $isi['linkupdate']  =$this->home.'/'.$this->update.$this->linkkelas_ajar.'/';
        $isi['linkdelete']  =$this->home.'/'.$this->delete.$this->linkkelas_ajar.'/';
        $this->load->view('index',$isi);
    }

    public function pilih_guru()
    {
        $isi['kelas_ajar']  =True;
        $isi['nav']         =$this->navguru;
        $isi['judul']       =$this->judulguru;
        $isi['content']     =$this->folderguru.'/form_pilih_guru';
        $isi['query']       =$this->db
                                  ->where('id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tableguru);
        $isi['link']        =$this->home.'/createkelas_ajar/';
        $isi['link2']       =$this->home.'/'.$this->linkkelas_ajar.'/';
        $this->load->view('index',$isi);
    }

    public function createkelas_ajar()
    {
        $id_guru = $this->input->post('id');
        $isi['kelas_ajar']  =True;
        $isi['nav']         =$this->navguru.' | Update';
        $isi['judul']       ='Mata Pelajaran '.$this->judulguru;
        $isi['content']     =$this->folderguru.'/form_create_kelas_ajar';
        $isi['query']       =$this->m_global->read_update($this->tableguru,$this->fieldpkguru,$id_guru);
        $isi['tmapel']      =$this->db
                                  ->where('id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tablemapel);
        $isi['tkelas']      =$this->db
                                  ->where('id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tablekelas);
        $isi['link']        =$this->home.'/simpan_kelas_ajar/'.$id_guru.'/';
        $isi['link2']       =$this->home.'/'.$this->linkkelas_ajar.'/';
        $isi['aksi']        ='view';
        $this->load->view('index',$isi);
    }

    public function updatekelas_ajar($pk)
    {
        if ($this->input->post('simpan')){
            $this->m_global->update($this->tablekelas_ajar,$this->fieldpkkelas_ajar,$pk,$this->field_datakelas_ajar());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkkelas_ajar);
        }else{
        $isi['kelas_ajar']  =True;
        $isi['nav']         =$this->navkelas_ajar.' | Update';
        $isi['judul']       ='Edit '.$this->judulkelas_ajar;
        $isi['content']     =$this->folderkelas_ajar.'/form_update_kelas_ajar';
        $isi['query']       =$this->m_global->read_update($this->tablekelas_ajar,$this->fieldpkkelas_ajar,$pk);
        $isi['tguru']       =$this->db
                                  ->where('id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tableguru);
        $isi['tmapel']      =$this->db
                                  ->where('id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tablemapel);
        $isi['tkelas']      =$this->db
                                  ->where('id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tablekelas);
        $isi['link2']       =$this->home.'/'.$this->linkkelas_ajar;
        $isi['link']        =$this->home.'/'.$this->update.$this->linkkelas_ajar.'/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    public function simpan_kelas_ajar($id_guru)
    {
        if ($this->input->post('simpan')){
            $id_mapel= $this->input->post('id_mapel');
        if (isset($_POST['id_kelas'])){
            $counter = 0;
            foreach ($_POST['id_kelas'] as $id_kelas) {
                $this->db->insert($this->tablekelas_ajar, array(
                                  'id'          => $this->m_global->getkodeunik($this->tablekelas_ajar,$this->fieldpkkelas_ajar),
                                  'id_guru'     => $id_guru,
                                  'id_mapel'    => $id_mapel,
                                  'id_kelas'    => $id_kelas,
                                  'id_sekolah'  => $this->session->userdata("id_sekolah")
                                  ));
                $counter++;
            }
            redirect('home/'.$this->linkkelas_ajar);
        }else{
            redirect('home/pilih_guru');
        }}
    }

    public function deletekelas_ajar($pk)
    {
        $this->m_global->delete($this->tablekelas_ajar,$this->fieldpkkelas_ajar,$pk);
        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect($this->home.'/'.$this->linkkelas_ajar);
    }
    
    private function field_datakelas_ajar()
    {
        return array(
            'id_mapel'          => $this->input->post('id_mapel'),
            'id_guru'           => $this->input->post('id_guru'),
            'id_sekolah'        => $this->session->userdata("id_sekolah"),
            'id_kelas'          => $this->input->post('id_kelas')
            );
    }

    //Nilai Raport=====================================================================================
    private $fieldpknilai_raport     = 'id';
    private $tablenilai_raport       = 'penilaian_siswa';
    private $navnilai_raport         = 'Raport Siswa | Nilai Raport';
    private $judulnilai_raport       = 'Nilai Raport';
    private $foldernilai_raport      = 'r_nr';
    private $linknilai_raport        = 'nilai_raport';

    public function nilai_raport()
    {
        $isi['r']           =$isi['rnr']=True;
        $isi['nav']         =$this->navnilai_raport;
        $isi['judul']       =$this->judulnilai_raport;
        $isi['content']     =$this->foldernilai_raport.'/'.$this->read;
        $isi['query']       =$this->db
                                  ->select('p.id, a.nama_guru, b.nama_mapel, c.tingkat, c.jurusan, c.kelas')
                                  ->join('data_guru a','p.id_guru = a.id','LEFT')
                                  ->join('data_mapel b','p.id_mapel = b.id','LEFT')
                                  ->join('data_kelas c','p.id_kelas = c.id','LEFT')
                                  ->where('p.id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tablekelas_ajar.' p');
        $isi['linkcreate']  =$this->home.'/'.$this->create.$this->linknilai_raport.'/';
        $isi['linkupdate']  =$this->home.'/'.$this->update.$this->linknilai_raport.'/';
        $isi['linkview']    =$this->home.'/viewnilai_raport/';
        $this->load->view('index',$isi);
    }

    public function createnilai_raport($pk)
    {
        $kelas_ajar = $this->m_global->read_update($this->tablekelas_ajar,$this->fieldpkkelas_ajar,$pk);
        foreach ($kelas_ajar->result() as $list) { 
            $id_guru            = $list->id_guru;
            $id_mapel           = $list->id_mapel;
            $id_kelas           = $list->id_kelas;
            }
        $query = $this->db
                      ->select('p.id, p.id_siswa, c.nama_siswa, p.nilai_teori, p.nilai_praktek, p.komentar, p.sikap')
                      ->join('data_siswa c','p.id_siswa = c.id','LEFT')
                      ->where('p.id_kelas',$id_kelas)
                      ->where('p.id_guru',$id_guru)
                      ->where('p.id_mapel',$id_mapel)
                      ->get($this->tablenilai_raport.' p');
        if ($query->num_rows() > 0){
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Sudah Melakukan Input Data.</div></div>');
            redirect($this->home.'/'.$this->linknilai_raport);
        }else{
        $isi['r']           =$isi['rnr']=True;
        $isi['nav']         =$this->navnilai_raport.' | Update';
        $isi['judul']       ='Create '.$this->judulnilai_raport;
        $isi['content']     =$this->foldernilai_raport.'/form_create_nilai_raport';
        $isi['query']       =$this->m_global->read_update($this->tablekelas_ajar,$this->fieldpkkelas_ajar,$pk);
        $isi['tguru']       =$this->db
                                  ->where('id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tableguru);
        $isi['tmapel']      =$this->db
                                  ->where('id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tablemapel);
        $isi['tkelas']      =$this->db
                                  ->where('id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tablekelas);
        $isi['link2']       =$this->home.'/'.$this->linknilai_raport;
        $isi['link']        =$this->home.'/simpan_nilai_raport/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    public function simpan_nilai_raport()
    {
        if ($this->input->post('simpan')){
            $id_mapel       = $_POST['id_mapel'];
            $id_guru        = $_POST['id_guru'];
            $id_kelas       = $_POST['id_kelas'];
            $id_tps         = $_POST['id_tps'];
            foreach ($_POST['id_siswa'] as $id_siswa=>$val) {
                $result[] = array(
                                  'id_guru'             => $id_guru,
                                  'id_mapel'            => $id_mapel,
                                  'id_kelas'            => $id_kelas,
                                  'id_siswa'            => $_POST['id_siswa'][$id_siswa],
                                  'nilai_teori'         => $_POST['nilai_teori'][$id_siswa],
                                  'nilai_praktek'       => $_POST['nilai_praktek'][$id_siswa],
                                  'komentar'            => $_POST['komentar'][$id_siswa],
                                  'sikap'               => $_POST['sikap'][$id_siswa],
                                  'id_sekolah'          => $this->session->userdata("id_sekolah"),
                                  'id_tps'              => $id_tps
                                  );
            }
            $res = $this->db->insert_batch($this->tablenilai_raport,$result);
            if($res){
                redirect('home/'.$this->linknilai_raport);
            }else{
                redirect('home/'.$this->create.$this->linknilai_raport);
            }
            
        }
    }

    public function updatenilai_raport($pk)
    {
        $kelas_ajar = $this->m_global->read_update($this->tablekelas_ajar,$this->fieldpkkelas_ajar,$pk);
        foreach ($kelas_ajar->result() as $list) { 
            $id_guru            = $list->id_guru;
            $id_mapel           = $list->id_mapel;
            $id_kelas           = $list->id_kelas;
            }
        $query = $this->db
                      ->select('p.id, p.id_siswa, c.nama_siswa, p.nilai_teori, p.nilai_praktek, p.komentar, p.sikap')
                      ->join('data_siswa c','p.id_siswa = c.id','LEFT')
                      ->where('p.id_kelas',$id_kelas)
                      ->where('p.id_guru',$id_guru)
                      ->where('p.id_mapel',$id_mapel)
                      ->get($this->tablenilai_raport.' p');
        if ($query->num_rows() == 0){
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-warning">Anda Belum Melakukan Input Data.</div></div>');
            redirect($this->home.'/'.$this->linknilai_raport);
        }else{
        $isi['r']           =$isi['rnr']=True;
        $isi['nav']         =$this->navnilai_raport.' | Update';
        $isi['judul']       ='Edit '.$this->judulnilai_raport;
        $isi['content']     =$this->foldernilai_raport.'/form_update_nilai_raport';
        $isi['query']       =$this->m_global->read_update($this->tablekelas_ajar,$this->fieldpkkelas_ajar,$pk);
        $isi['tguru']       =$this->db
                                  ->where('id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tableguru);
        $isi['tmapel']      =$this->db
                                  ->where('id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tablemapel);
        $isi['tkelas']      =$this->db
                                  ->where('id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tablekelas);
        $isi['link2']       =$this->home.'/'.$this->linknilai_raport;
        $isi['link']        =$this->home.'/update_nilai_raport/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    public function update_nilai_raport()
    {
        if ($this->input->post('simpan')){
            $id_mapel       = $_POST['id_mapel'];
            $id_guru        = $_POST['id_guru'];
            $id_kelas       = $_POST['id_kelas'];
            $id_tps         = $_POST['id_tps'];
            $data           = array();
            for($i=0; $i< count($_POST['id']); $i++) {
                if($_POST['id'][$i]!=''){
                    $data[] = array(
                                $id ='id'             => $_POST['id'][$i],
                                'id_guru'             => $id_guru,
                                'id_mapel'            => $id_mapel,
                                'id_kelas'            => $id_kelas,
                                'id_siswa'            => $_POST['id_siswa'][$i],
                                'nilai_teori'         => $_POST['nilai_teori'][$i],
                                'nilai_praktek'       => $_POST['nilai_praktek'][$i],
                                'komentar'            => $_POST['komentar'][$i],
                                'sikap'               => $_POST['sikap'][$i],
                                'id_sekolah'          => $this->session->userdata("id_sekolah"),
                                'id_tps'              => $id_tps
                        );
                }
            }
            $linkcount = count($data);
            if ($linkcount){
                        $res = $this->db->update_batch($this->tablenilai_raport,$data, 'id');
                        redirect('home/'.$this->linknilai_raport);        
                    }else{
                        redirect('home/'.$this->create.$this->linknilai_raport);
                    }
        }
    }

    //Absen=====================================================================================
    private $fieldpkabsen    = 'id';
    private $tableabsen      = 'penilaian_absensiswa';
    private $navabsen        = 'Raport Siswa | Absen';
    private $judulabsen      = 'Absen Siswa';
    private $folderabsen     = 'r_absen';
    private $linkabsen       = 'absen';

    public function absen()
    {
        $isi['r']           =$isi['absen']=True;
        $isi['nav']         =$this->navabsen;
        $isi['judul']       =$this->judulabsen;
        $isi['content']     =$this->folderabsen.'/'.$this->read;
        $isi['query']       =$this->db
                                  ->select('p.id, p.tingkat, p.jurusan, p.kelas, p.id_guru, c.nama_guru')
                                  ->join('data_guru c','p.id_guru = c.id','LEFT')
                                  ->where('p.id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tablekelas.' p');
        $isi['linkcreate']  =$this->home.'/'.$this->create.$this->linkabsen.'/';
        $isi['linkupdate']  =$this->home.'/'.$this->update.$this->linkabsen.'/';
        $this->load->view('index',$isi);
    }

    public function createabsen($pk)
    {
        $kelas_ajar = $this->m_global->read_update($this->tablekelas,$this->fieldpkkelas,$pk);
        foreach ($kelas_ajar->result() as $list) { 
            $id_guru            = $list->id_guru;
            $id_kelas           = $list->id;
            }
        $query = $this->db
                      ->where('p.id_kelas',$id_kelas)
                      ->where('p.id_guru',$id_guru)
                      ->get($this->tableabsen.' p');
        if ($query->num_rows() > 0){
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Sudah Melakukan Input Data.</div></div>');
            redirect($this->home.'/'.$this->linkabsen);
        }else{
        $isi['r']           =$isi['absen']=True;
        $isi['nav']         =$this->navabsen.' | Create';
        $isi['judul']       ='Create '.$this->judulabsen;
        $isi['content']     =$this->folderabsen.'/form_create_nilai_absen';
        $isi['query']       =$this->m_global->read_update($this->tablekelas,$this->fieldpkkelas,$pk);
        $isi['tguru']       =$this->db
                                  ->where('id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tableguru);
        $isi['tkelas']      =$this->db
                                  ->where('id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tablekelas);
        $isi['link2']       =$this->home.'/'.$this->linkabsen;
        $isi['link']        =$this->home.'/simpan_nilai_absen/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    public function simpan_nilai_absen()
    {
        if ($this->input->post('simpan')){
            $id_guru        = $_POST['id_guru'];
            $id_kelas       = $_POST['id_kelas'];
            $id_tps         = $_POST['id_tps'];
            foreach ($_POST['id_siswa'] as $id_siswa=>$val) {
                $result[] = array(
                                  'id_guru'             => $id_guru,
                                  'id_kelas'            => $id_kelas,
                                  'id_siswa'            => $_POST['id_siswa'][$id_siswa],
                                  'alfa'                => $_POST['alfa'][$id_siswa],
                                  'izin'                => $_POST['izin'][$id_siswa],
                                  'sakit'               => $_POST['sakit'][$id_siswa],
                                  'id_sekolah'          => $this->session->userdata("id_sekolah"),
                                  'id_tps'              => $id_tps
                                  );
            }
            $res = $this->db->insert_batch($this->tableabsen,$result);
            if($res){
                redirect('home/'.$this->linkabsen);
            }else{
                redirect('home/'.$this->create.$this->linkabsen);
            }
            
        }
    }

    public function updateabsen($pk)
    {
        $kelas_ajar = $this->m_global->read_update($this->tablekelas,$this->fieldpkkelas,$pk);
        foreach ($kelas_ajar->result() as $list) { 
            $id_guru            = $list->id_guru;
            $id_kelas           = $list->id;
            }
        $query = $this->db
                      ->where('p.id_kelas',$id_kelas)
                      ->where('p.id_guru',$id_guru)
                      ->get($this->tableabsen.' p');
        if ($query->num_rows() == 0){
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-warning">Anda Belum Melakukan Input Data.</div></div>');
            redirect($this->home.'/'.$this->linkabsen);
        }else{
        $isi['r']           =$isi['absen']=True;
        $isi['nav']         =$this->navabsen.' | Update';
        $isi['judul']       ='Update '.$this->judulabsen;
        $isi['content']     =$this->folderabsen.'/form_update_nilai_absen';
        $isi['query']       =$this->m_global->read_update($this->tablekelas,$this->fieldpkkelas,$pk);
        $isi['tguru']       =$this->db
                                  ->where('id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tableguru);
        $isi['tkelas']      =$this->db
                                  ->where('id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tablekelas);
        $isi['link2']       =$this->home.'/'.$this->linkabsen;
        $isi['link']        =$this->home.'/update_nilai_absen/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    public function update_nilai_absen()
    {
        if ($this->input->post('simpan')){
            $id_guru        = $_POST['id_guru'];
            $id_kelas       = $_POST['id_kelas'];
            $id_tps         = $_POST['id_tps'];
            $data           = array();
            for($i=0; $i< count($_POST['id']); $i++) {
                if($_POST['id'][$i]!=''){
                    $data[] = array(
                                $id ='id'             => $_POST['id'][$i],
                                'id_guru'             => $id_guru,
                                'id_kelas'            => $id_kelas,
                                'id_siswa'            => $_POST['id_siswa'][$i],
                                'alfa'                => $_POST['alfa'][$i],
                                'izin'                => $_POST['izin'][$i],
                                'sakit'               => $_POST['sakit'][$i],
                                'id_sekolah'          => $this->session->userdata("id_sekolah"),
                                'id_tps'              => $id_tps
                        );
                }
            }
            $linkcount = count($data);
            if ($linkcount){
                        $res = $this->db->update_batch($this->tableabsen,$data, 'id');
                        redirect('home/'.$this->linkabsen);        
                    }else{
                        redirect('home/'.$this->create.$this->linkabsen);
                    }
        }
    }

    //Raport=====================================================================================
    //private $fieldpkraport    = 'id';
    //private $tableraport      = 'penilaian_organisasisiswa';
    private $navraport        = 'Raport Siswa';
    private $judulraport      = 'Raport Siswa';
    private $folderraport     = 'raport';
    private $linkraport       = 'raport';

    public function raport()
    {
        $isi['raport']      =True;
        $isi['nav']         =$this->navkelas;
        $isi['judul']       =$this->judulkelas;
        $isi['content']     =$this->root.'/raport/'.$this->read;
        $isi['query']       =$this->db
                                  ->select('p.id, p.tingkat, p.jurusan, p.kelas, c.nama_guru')
                                  ->join('data_guru c','p.id_guru = c.id','LEFT')
                                  ->where('p.id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tablekelas.' p');
        $isi['linkrombel']  =$this->home.'/raport_siswa/';
        $this->load->view('index',$isi);
    }

    public function raport_siswa($id)
    {
        $isi['raport']       =True;
        $isi['nav']         =$this->navkelas;
        $isi['judul']       =$this->judulkelas;
        $isi['content']     =$this->root.'/raport/raport_siswa';
        $isi['query']       =$this->db
                                  ->select('p.id, p.nama_siswa, c.tingkat, c.jurusan, c.kelas')
                                  ->join('data_kelas c','p.id_kelas = c.id','LEFT')
                                  ->where('status', 'Aktif')
                                  ->where('p.id_kelas', $id)
                                  ->where('p.id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->get($this->tablesiswa.' p');
        $isi['tkelas']       =$this->db
                                  ->select('id, tingkat, jurusan, kelas')
                                  ->where('id_sekolah',$this->session->userdata('id_sekolah'))
                                  ->where('id', $id)
                                  ->get($this->tablekelas);
        $isi['link']        =$this->home.'/raport/';
        $isi['linkview']    =$this->home.'/data_raport_siswa/';
        $this->load->view('index',$isi);
    }

    public function data_raport_siswa($id)
    {
        $isi['raport']          =True;
        $isi['nav']             =$this->navkelas;
        $isi['judul']           =$this->judulkelas;
        $isi['content']         =$this->root.'/raport/data_raport_siswa';
        $isi['id_siswa']        =$id;
        $isi['linkdatasekolah'] =$this->home.'/print_data_sekolah/';
        $isi['linkdatasiswa']   =$this->home.'/print_data_siswa/';
        $isi['link']            =$this->home.'/print_data_raport_siswa/';
        $isi['linkkomentar']    =$this->home.'/print_data_raport_siswa_komentar/';
        $isi['linkketerangan']  =$this->home.'/print_data_raport_siswa_keterangan/';
        $this->load->view('index',$isi);
    }

    public function print_data_sekolah()
    {
        $this->load->view('raport/print_data_sekolah');
    }

    public function print_data_siswa($id)
    {
        $isi['id_siswa']    =$id;
        $this->load->view('raport/print_data_siswa',$isi);
    }

    public function print_data_raport_siswa($id)
    {
        $isi['id_siswa']    =$id;
        $this->load->view('raport/print_data_raport_siswa',$isi);
    }

    public function print_data_raport_siswa_komentar($id)
    {
        $isi['id_siswa']    =$id;
        $this->load->view('raport/print_data_raport_siswa_komentar',$isi);
    }

    public function print_data_raport_siswa_keterangan($id)
    {
        $isi['id_siswa']    =$id;
        $this->load->view('raport/print_data_raport_siswa_keterangan',$isi);
    }

    public function detail_harta_tetap3($QUERY){
            echo '<html><head></head><body><table border="1px">';
        
            $query=$this->db->select('p.id, p.nama_harta_tetap, p.tanggal_beli, p.harga_beli, p.nilai_residu, p.umur_ekonomis, p.metode_penyusutan, p.departemen, p.lokasi, p.akumulasi_beban, p.nilai_buku, p.beban_perbulan, a.nama_lokasi, b.kode_akun')
                            ->join('data_lokasi a','p.lokasi = a.id','LEFT')
                            ->join('data_akun b','p.akun_depresiasi = b.id','LEFT')
                            ->where('p.id',$QUERY)
                            ->where('p.id_perusahaan',$this->session->userdata('id_perusahaan'))
                            ->get($this->tableharta_tetap.' p');
            $query2=$this->db->select('p.id, p.tanggal, p.id_periode, c.kode_akun, b.nama_harta_tetap, b.tanggal_beli, b.harga_beli, b.nilai_residu, b.umur_ekonomis, b.metode_penyusutan, b.akumulasi_beban, p.nilai_buku, b.beban_perbulan, b.nama_harta_tetap')
                            ->join('data_harta_tetap b','p.id_harta_tetap = b.id','LEFT')
                            ->join('data_akun c','b.akun_depresiasi = c.id','LEFT')
                            ->where('p.id_harta_tetap',$QUERY)
                            ->where('p.id_perusahaan',$this->session->userdata('id_perusahaan'))
                            ->get('data_harta_tetap_penyusutan'.' p');

            $harta_tetap=$query->row_array();

            $periode=$this->db->where('status','Aktif')->where('id_perusahaan',$this->session->userdata('id_perusahaan'))->get($this->tableperiode_akuntansi)->row_array();
            $hariini=$periode['kode_periode'].'-'.$periode['bulan'].'-'.substr($harta_tetap['tanggal_beli'],8,2);
                    
            $tanggalini =substr($hariini,8,2); 
            $bulanini =substr($hariini,5,2);
            $tahunini =substr($hariini,0,4);
            $bulanini2 = (int)$bulanini;//5
            $bulanini3 = (int)$bulanini-1;//4
            if($bulanini3 > 10){
                $bulanini4 = $bulanini3;    
            }else{
                $bulanini4 = '0'.$bulanini3;
            }
            $tanggalhariini= $tahunini.'-'.$bulanini4.'-'.$tanggalini;
            $bulankemarin=date('Y-m-t',strtotime($tanggalhariini));

            $ap=$periode['awal_periode'];
            $tanggalap =substr($ap,8,2); 
            $bulanap =substr($ap,5,2);
            $tahunap =substr($ap,0,4);
            $bulanap2 = (int)$bulanap;

            $tanggal =substr($harta_tetap['tanggal_beli'],8,2); 
            $bulan =substr($harta_tetap['tanggal_beli'],5,2);
            $tahun =substr($harta_tetap['tanggal_beli'],0,4);
            $bulan2 = (int)$bulan;
            if($bulan2 > 10){
                $bulan5 = $bulan2;    
            }else{
                $bulan5 = '0'.$bulan2;
            }

            $bulan3 = $bulan2+$query2->num_rows();
            $bulan4 = $bulan2;

            $tanggalbeli= $tahun.'-'.$bulan5.'-'.$tanggal;
            
            //echo $query2->num_rows();
            $no=1;
                        /*echo '<td>'.$tanggalbeli.'</td>';
                        echo '<td>'.$hariini.'</td>';*/

            if($tanggalbeli < $hariini){
                if(empty($query2->num_rows())) {
                    $no=1; $saldo=0;
                    $nilai_buku=$harta_tetap['nilai_buku'];
                    $nilai_buku2=$nilai_buku+$harta_tetap['beban_perbulan'];
                    if ($tahunini > $tahun) {
                        for ($i=$tahunini; $i >= $tahunap ; $i--) {//$tahunap => $tahun
                            for ($i2 = $bulanini3; $i2 >= 0 ; $i2--) {
                                if ($i2 != 0 && $i2 >= $bulanap2) { //&& $bulanini2 => $bulanap2
                                    if($i == $tahun){
                                        if($i2 == $bulan){
                                        }else{
                                            for ($i3 = $bulanini3; $i2 >= $bulan ; $i2--) {
                                                if($i2 < 10){
                                                    $i2 = '0'.$i2;    
                                                }else{
                                                    $i2 = $i2;
                                                }
                                                echo '<tr>';
                                                echo '<td>'.$no.'</td>';
                                                echo '<td>'.date('Y-m-t',strtotime($i.'-'.$i2)).'</td>';
                                                echo '<td>'.$harta_tetap['kode_akun'].'</td>';
                                                echo '<td> Rp.'.number_format($harta_tetap['beban_perbulan'],0,",",".").'</td>';
                                                echo '<td> Rp.'.number_format($nilai_buku2,0,",",".").'</td>';
                                                echo '</tr>';
                                                $no++;
                                                $nilai_buku2=$nilai_buku2+$harta_tetap['beban_perbulan'];
                                            }
                                        }
                                    }else{
                                        if($i2 < 10){
                                            $i2 = '0'.$i2;    
                                        }else{
                                            $i2 = $i2;
                                        }
                                        echo '<tr>';
                                        echo '<td>'.$no.'</td>';
                                        echo '<td>'.date('Y-m-t',strtotime($i.'-'.$i2)).'</td>';
                                        echo '<td>'.$harta_tetap['kode_akun'].'</td>';
                                        echo '<td> Rp.'.number_format($harta_tetap['beban_perbulan'],0,",",".").'</td>';
                                        echo '<td> Rp.'.number_format($nilai_buku2,0,",",".").'</td>';
                                        echo '</tr>';
                                        $no++;
                                        $nilai_buku2=$nilai_buku2+$harta_tetap['beban_perbulan'];
                                    }
                                }else{
                                    $bulanini3 = 12;
                                }
                            }
                        }
                    }else if ($tahunini == $tahun) {
                        $i2 = $bulanini3;
                        if($i2 == $bulan){
                        }else{
                                $nilai_buku=$harta_tetap['nilai_buku'];
                                $nilai_buku2=$nilai_buku+$harta_tetap['beban_perbulan'];
                            for ($i3 = $bulanini3; $i2 >= $bulanap2 ; $i2--) { //$bulanap2 => bulanini2
                                if($i2 < 10){
                                    $i2 = '0'.$i2;    
                                }else{
                                    $i2 = $i2;
                                }
                                echo '<tr>';
                                echo '<td>'.$no.'</td>';
                                echo '<td>'.date('Y-m-t',strtotime($tahunini.'-'.$i2)).'</td>';
                                echo '<td>'.$harta_tetap['kode_akun'].'</td>';
                                echo '<td> Rp.'.number_format($harta_tetap['beban_perbulan'],0,",",".").'</td>';
                                echo '<td> Rp.'.number_format($nilai_buku2,0,",",".").'</td>';
                                echo '</tr>';
                                $no++;
                                $nilai_buku2=$nilai_buku2+$harta_tetap['beban_perbulan'];
                            }
                        }
                    }else{
                    echo '<tr>';
                        echo '<td colspan="5" align="center">'.'Harta Belum Mengalami Penyusutan'.'</td>';
                    echo '</tr>';
                    }
                } else {
                    $no=1; $saldo=0;
                    foreach ($query2->result() as $result) {
                        echo '<tr>';
                        echo '<td>'.$no.'</td>';
                        echo '<td>'.$result->tanggal.'</td>';
                        echo '<td>'.$result->kode_akun.'</td>';
                        echo '<td> Rp.'.number_format($result->beban_perbulan,0,",",".").'</td>';
                        echo '<td> Rp.'.number_format($result->nilai_buku,0,",",".").'</td>';
                        echo '</tr>';
                        $no++;
                    }
                    $bulanini5 = (int)substr($result->tanggal,5,2)-1;
                    $nilai_buku=$result->nilai_buku;
                    $nilai_buku2=$nilai_buku+$result->beban_perbulan;
                    if($nilai_buku2 == $harta_tetap['harga_beli']){
                        $i2 = $bulanini5;
                        if($i2 < 10){
                            $i2 = '0'.$i2;    
                        }else{
                            $i2 = $i2;
                        }
                        echo '<tr>';
                        echo '<td>'.$no.'</td>';
                        echo '<td>'.date('Y-m-d',strtotime($harta_tetap['tanggal_beli'])).'</td>';
                        echo '<td>'.$result->kode_akun.'</td>';
                        echo '<td>'/*.'Rp.'.number_format($result->beban_perbulan,0,",",".")*/.'</td>';
                        echo '<td> Rp.'.number_format($nilai_buku2,0,",",".").'</td>';
                        echo '</tr>';
                        $no++;
                        $nilai_buku2=$nilai_buku2+$result->beban_perbulan;
                    }else{
                        if ($tahunini > $tahun) {
                            for ($i=$tahunini; $i >= $tahunap ; $i--) {//$tahunap => $tahun
                                for ($i2 = $bulanini5; $i2 >= 0 ; $i2--) {
                                    if ($i2 != 0 && $i2 >= $bulanap2) { //&& $bulanini2 => $bulanap2
                                        if($i == $tahun){
                                            if($i2 == $bulan){
                                            }else{
                                                for ($i3 = $bulanini5; $i2 >= $bulan ; $i2--) {
                                                    if($i2 < 10){
                                                        $i2 = '0'.$i2;    
                                                    }else{
                                                        $i2 = $i2;
                                                    }
                                                    echo '<tr>';
                                                    echo '<td>'.$no.'</td>';
                                                    echo '<td>'.date('Y-m-t',strtotime($i.'-'.$i2)).'</td>';
                                                    echo '<td>'.$result->kode_akun.'</td>';
                                                    echo '<td> Rp.'.number_format($result->beban_perbulan,0,",",".").'</td>';
                                                    echo '<td> Rp.'.number_format($nilai_buku2,0,",",".").'</td>';
                                                    echo '</tr>';
                                                    $no++;
                                                    $nilai_buku2=$nilai_buku2+$result->beban_perbulan;
                                                }
                                            }
                                        }else{
                                            if($i2 < 10){
                                                $i2 = '0'.$i2;    
                                            }else{
                                                $i2 = $i2;
                                            }
                                            echo '<tr>';
                                            echo '<td>'.$no.'</td>';
                                            echo '<td>'.date('Y-m-t',strtotime($i.'-'.$i2)).'</td>';
                                            echo '<td>'.$result->kode_akun.'</td>';
                                            echo '<td> Rp.'.number_format($result->beban_perbulan,0,",",".").'</td>';
                                            echo '<td> Rp.'.number_format($nilai_buku2,0,",",".").'</td>';
                                            echo '</tr>';
                                            $no++;
                                            $nilai_buku2=$nilai_buku2+$result->beban_perbulan;
                                        }
                                    }else{
                                        $bulanini5 = 12;
                                    }
                                }
                            }
                        }else if ($tahunini == $tahun) {
                            $i2 = $bulanini5;
                            if($i2 == $bulan){
                            }else{
                                $nilai_buku=$result->nilai_buku;
                                $nilai_buku2=$nilai_buku+$result->beban_perbulan;
                                for ($i3 = $bulanini5; $i2 >= $bulanap2 ; $i2--) { //$bulanap2 => $bulanini2
                                    if($i2 < 10){
                                        $i2 = '0'.$i2;    
                                    }else{
                                        $i2 = $i2;
                                    }
                                    echo '<tr>';
                                    echo '<td>'.$no.'</td>';
                                    echo '<td>'.date('Y-m-t',strtotime($tahunini.'-'.$i2)).'</td>';
                                    echo '<td>'.$result->kode_akun.'</td>';
                                    echo '<td> Rp.'.number_format($result->beban_perbulan,0,",",".").'</td>';
                                    echo '<td> Rp.'.number_format($nilai_buku2,0,",",".").'</td>';
                                    echo '</tr>';
                                    $no++;
                                    $nilai_buku2=$nilai_buku2+$result->beban_perbulan;
                                }
                            }
                        }else{
                        echo '<tr>';
                            echo '<td colspan="5" align="center">'.'Harta Belum Mengalami Penyusutan'.'</td>';
                        echo '</tr>';
                        }
                    }
                }
            }else if ($tanggalbeli >= $hariini) {
                if(empty($query2->num_rows())) { 
                    echo '<tr>';
                        echo '<td colspan="5" align="center">'.'Harta Belum Mengalami Penyusutan'.'</td>';
                    echo '</tr>';
                } else {
                    $no=1; $saldo=0;
                    foreach ($query2->result() as $result) {
                        echo '<tr>';
                        echo '<td>'.$no.'</td>';
                        echo '<td>'.$result->tanggal.'</td>';
                        echo '<td>'.$result->kode_akun.'</td>';
                        echo '<td> Rp.'.number_format($result->beban_perbulan,0,",",".").'</td>';
                        echo '<td> Rp.'.number_format($result->nilai_buku,0,",",".").'</td>';
                        echo '</tr>';
                        $no++;
                    }
                }
            }

            echo '</table></body></html>';
    }

    public function detail_harta_tetap4($QUERY){
            echo '<html><head></head><body><table border="1px">';
        
            $query=$this->db->select('p.id, p.nama_harta_tetap, p.tanggal_beli, p.harga_beli, p.nilai_residu, p.umur_ekonomis, p.metode_penyusutan, p.departemen, p.lokasi, p.akumulasi_beban, p.nilai_buku, p.beban_perbulan, a.nama_lokasi, b.kode_akun')
                            ->join('data_lokasi a','p.lokasi = a.id','LEFT')
                            ->join('data_akun b','p.akun_depresiasi = b.id','LEFT')
                            ->where('p.id',$QUERY)
                            ->where('p.id_perusahaan',$this->session->userdata('id_perusahaan'))
                            ->get($this->tableharta_tetap.' p');
            $query2=$this->db->select('p.id, p.tanggal, p.id_periode, c.kode_akun, b.nama_harta_tetap, b.tanggal_beli, b.harga_beli, b.nilai_residu, b.umur_ekonomis, b.metode_penyusutan, b.akumulasi_beban, p.nilai_buku, b.beban_perbulan, b.nama_harta_tetap')
                            ->join('data_harta_tetap b','p.id_harta_tetap = b.id','LEFT')
                            ->join('data_akun c','b.akun_depresiasi = c.id','LEFT')
                            ->where('p.id_harta_tetap',$QUERY)
                            ->where('p.id_perusahaan',$this->session->userdata('id_perusahaan'))
                            ->get('data_harta_tetap_penyusutan'.' p');

            $harta_tetap=$query->row_array();

            $periode=$this->db->where('status','Aktif')->where('id_perusahaan',$this->session->userdata('id_perusahaan'))->get($this->tableperiode_akuntansi)->row_array();
            $hariini=$periode['kode_periode'].'-'.$periode['bulan'].'-'.substr($harta_tetap['tanggal_beli'],8,2);
                    
            $tanggalini =substr($hariini,8,2); 
            $bulanini =substr($hariini,5,2);
            $tahunini =substr($hariini,0,4);
            $bulanini2 = (int)$bulanini;//5
            $bulanini3 = (int)$bulanini-1;//4
            if($bulanini3 > 10){
                $bulanini4 = $bulanini3;    
            }else{
                $bulanini4 = '0'.$bulanini3;
            }
            $tanggalhariini= $tahunini.'-'.$bulanini4.'-'.$tanggalini;
            $bulankemarin=date('Y-m-t',strtotime($tanggalhariini));

            $ap=$periode['awal_periode'];
            $tanggalap =substr($ap,8,2); 
            $bulanap =substr($ap,5,2);
            $tahunap =substr($ap,0,4);
            $bulanap2 = (int)$bulanap;

            $tanggal =substr($harta_tetap['tanggal_beli'],8,2); 
            $bulan =substr($harta_tetap['tanggal_beli'],5,2);
            $tahun =substr($harta_tetap['tanggal_beli'],0,4);
            $bulan2 = (int)$bulan;
            if($bulan2 > 10){
                $bulan5 = $bulan2;    
            }else{
                $bulan5 = '0'.$bulan2;
            }

            $bulan3 = $bulan2+$query2->num_rows();
            $bulan4 = $bulan2;

            $tanggalbeli= $tahun.'-'.$bulan5.'-'.$tanggal;
            
            //echo $query2->num_rows();
            $no=1;
                        echo '<td>'.$tanggalbeli.'</td>';
                        echo '<td>'.$hariini.'</td>';

            if($tanggalbeli < $hariini){
                if(empty($query2->num_rows())) {
                    $no=1; $saldo=0;
                    $nilai_buku=$harta_tetap['nilai_buku'];
                    $nilai_buku2=$nilai_buku+$harta_tetap['beban_perbulan'];
                    if ($tahunini >= $tahun) {
                        for ($i=$tahunini; $i >= $tahun ; $i--) {//$tahunap => $tahun
                            for ($i2 = $bulanini3; $i2 >= 0 ; $i2--) {
                                if ($i2 != 0 && $i2 >= $bulanap2) { //&& $bulanini2 => $bulanap2
                                    if($i == $tahun){
                                        if($i2 == $bulan){
                                        }else{
                                            for ($i3 = $bulanini3; $i2 > $bulan ; $i2--) {//hilang=
                                                if($i2 < 10){
                                                    $i2 = '0'.$i2;    
                                                }else{
                                                    $i2 = $i2;
                                                }
                                                echo '<tr>';
                                                echo '<td>'.$no.'</td>';
                                                echo '<td>'.date('Y-m-t',strtotime($i.'-'.$i2)).'</td>';
                                                echo '<td>'.$harta_tetap['kode_akun'].'</td>';
                                                echo '<td> Rp.'.number_format($harta_tetap['beban_perbulan'],0,",",".").'</td>';
                                                echo '<td> Rp.'.number_format($nilai_buku2,0,",",".").'</td>';
                                                echo '</tr>';
                                                $no++;
                                                $nilai_buku2=$nilai_buku2+$harta_tetap['beban_perbulan'];
                                            }
                                        }
                                    }else{
                                        if($i2 < 10){
                                            $i2 = '0'.$i2;    
                                        }else{
                                            $i2 = $i2;
                                        }
                                        echo '<tr>';
                                        echo '<td>'.$no.'</td>';
                                        echo '<td>'.date('Y-m-t',strtotime($i.'-'.$i2)).'</td>';
                                        echo '<td>'.$harta_tetap['kode_akun'].'</td>';
                                        echo '<td> Rp.'.number_format($harta_tetap['beban_perbulan'],0,",",".").'</td>';
                                        echo '<td> Rp.'.number_format($nilai_buku2,0,",",".").'</td>';
                                        echo '</tr>';
                                        $no++;
                                        $nilai_buku2=$nilai_buku2+$harta_tetap['beban_perbulan'];
                                    }
                                }else{
                                    $bulanini3 = 12;
                                }
                            }
                        }
                    }else if ($tahunini == $tahun) {
                        $i2 = $bulanini3;
                        if($i2 == $bulan){
                        }else{
                                $nilai_buku=$harta_tetap['nilai_buku'];
                                $nilai_buku2=$nilai_buku+$harta_tetap['beban_perbulan'];
                            for ($i3 = $bulanini3; $i2 >= $bulan2 ; $i2--) { //$bulanap2 => bulanini2
                                if($i2 < 10){
                                    $i2 = '0'.$i2;    
                                }else{
                                    $i2 = $i2;
                                }
                                echo '<tr>';
                                echo '<td>'.$no.'</td>';
                                echo '<td>'.date('Y-m-t',strtotime($tahunini.'-'.$i2)).'</td>';
                                echo '<td>'.$harta_tetap['kode_akun'].'</td>';
                                echo '<td> Rp.'.number_format($harta_tetap['beban_perbulan'],0,",",".").'</td>';
                                echo '<td> Rp.'.number_format($nilai_buku2,0,",",".").'</td>';
                                echo '</tr>';
                                $no++;
                                $nilai_buku2=$nilai_buku2+$harta_tetap['beban_perbulan'];
                            }
                        }
                    }else{
                    echo '<tr>';
                        echo '<td colspan="5" align="center">'.'Harta Belum Mengalami Penyusutan'.'</td>';
                    echo '</tr>';
                    }
                    $hasil=$no-1;
                    $hasil2=$hasil*$harta_tetap['beban_perbulan'];
                    echo '<tr>';
                        echo '<td align="center">'.$hasil.'</td>';
                        echo '<td colspan="4" align="center">'.$hasil2.'</td>';
                    echo '</tr>';
                } else {
                    $no=1; $saldo=0;
                    foreach ($query2->result() as $result) {
                        echo '<tr>';
                        echo '<td>'.$no.'</td>';
                        echo '<td>'.$result->tanggal.'</td>';
                        echo '<td>'.$result->kode_akun.'</td>';
                        echo '<td> Rp.'.number_format($result->beban_perbulan,0,",",".").'</td>';
                        echo '<td> Rp.'.number_format($result->nilai_buku,0,",",".").'</td>';
                        echo '</tr>';
                        $no++;
                    }
                    $bulanini5 = (int)substr($result->tanggal,5,2)-1;
                    $nilai_buku=$result->nilai_buku;
                    $nilai_buku2=$nilai_buku+$result->beban_perbulan;
                    if($nilai_buku2 == $harta_tetap['harga_beli']){
                        $i2 = $bulanini5;
                        if($i2 < 10){
                            $i2 = '0'.$i2;    
                        }else{
                            $i2 = $i2;
                        }
                        echo '<tr>';
                        echo '<td>'.$no.'</td>';
                        echo '<td>'.date('Y-m-d',strtotime($harta_tetap['tanggal_beli'])).'</td>';
                        echo '<td>'.$result->kode_akun.'</td>';
                        echo '<td>'/*.'Rp.'.number_format($result->beban_perbulan,0,",",".")*/.'</td>';
                        echo '<td> Rp.'.number_format($nilai_buku2,0,",",".").'</td>';
                        echo '</tr>';
                        $no++;
                        $nilai_buku2=$nilai_buku2+$result->beban_perbulan;
                    }else{
                        if ($tahunini > $tahun) {
                            for ($i=$tahunini; $i >= $tahun ; $i--) {//$tahunap => $tahun
                                for ($i2 = $bulanini5; $i2 >= 0 ; $i2--) {
                                    if ($i2 != 0 && $i2 >= $bulan2) { //&& $bulanini2 => $bulanap2
                                        if($i == $tahun){
                                            if($i2 == $bulan){
                                            }else{
                                                for ($i3 = $bulanini5; $i2 > $bulan ; $i2--) {//hilang=
                                                    if($i2 < 10){
                                                        $i2 = '0'.$i2;    
                                                    }else{
                                                        $i2 = $i2;
                                                    }
                                                    echo '<tr>';
                                                    echo '<td>'.$no.'</td>';
                                                    echo '<td>'.date('Y-m-t',strtotime($i.'-'.$i2)).'</td>';
                                                    echo '<td>'.$result->kode_akun.'</td>';
                                                    echo '<td> Rp.'.number_format($result->beban_perbulan,0,",",".").'</td>';
                                                    echo '<td> Rp.'.number_format($nilai_buku2,0,",",".").'</td>';
                                                    echo '</tr>';
                                                    $no++;
                                                    $nilai_buku2=$nilai_buku2+$result->beban_perbulan;
                                                }
                                            }
                                        }else{
                                            if($i2 < 10){
                                                $i2 = '0'.$i2;    
                                            }else{
                                                $i2 = $i2;
                                            }
                                            echo '<tr>';
                                            echo '<td>'.$no.'</td>';
                                            echo '<td>'.date('Y-m-t',strtotime($i.'-'.$i2)).'</td>';
                                            echo '<td>'.$result->kode_akun.'</td>';
                                            echo '<td> Rp.'.number_format($result->beban_perbulan,0,",",".").'</td>';
                                            echo '<td> Rp.'.number_format($nilai_buku2,0,",",".").'</td>';
                                            echo '</tr>';
                                            $no++;
                                            $nilai_buku2=$nilai_buku2+$result->beban_perbulan;
                                        }
                                    }else{
                                        $bulanini5 = 12;
                                    }
                                }
                            }
                        }else if ($tahunini == $tahun) {
                            $i2 = $bulanini5;
                            if($i2 == $bulan){
                            }else{
                                $nilai_buku=$result->nilai_buku;
                                $nilai_buku2=$nilai_buku+$result->beban_perbulan;
                                for ($i3 = $bulanini5; $i2 >= $bulan2 ; $i2--) { //$bulanap2 => $bulanini2
                                    if($i2 < 10){
                                        $i2 = '0'.$i2;    
                                    }else{
                                        $i2 = $i2;
                                    }
                                    echo '<tr>';
                                    echo '<td>'.$no.'</td>';
                                    echo '<td>'.date('Y-m-t',strtotime($tahunini.'-'.$i2)).'</td>';
                                    echo '<td>'.$result->kode_akun.'</td>';
                                    echo '<td> Rp.'.number_format($result->beban_perbulan,0,",",".").'</td>';
                                    echo '<td> Rp.'.number_format($nilai_buku2,0,",",".").'</td>';
                                    echo '</tr>';
                                    $no++;
                                    $nilai_buku2=$nilai_buku2+$result->beban_perbulan;
                                }
                            }
                        }else{
                        echo '<tr>';
                            echo '<td colspan="5" align="center">'.'Harta Belum Mengalami Penyusutan'.'</td>';
                        echo '</tr>';
                        }
                    }
                }
            }else if ($tanggalbeli > $hariini) {
                if(empty($query2->num_rows())) { 
                    echo '<tr>';
                        echo '<td colspan="5" align="center">'.'Harta Belum Mengalami Penyusutan'.'</td>';
                    echo '</tr>';
                } else {
                    $no=1; $saldo=0;
                    foreach ($query2->result() as $result) {
                        echo '<tr>';
                        echo '<td>'.$no.'</td>';
                        echo '<td>'.$result->tanggal.'</td>';
                        echo '<td>'.$result->kode_akun.'</td>';
                        echo '<td> Rp.'.number_format($result->beban_perbulan,0,",",".").'</td>';
                        echo '<td> Rp.'.number_format($result->nilai_buku,0,",",".").'</td>';
                        echo '</tr>';
                        $no++;
                    }
                }
            }

            echo '</table></body></html>';
    }
}