<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_global','m_login'); //load model uploads yang berada di folder model
        $this->load->helper(array('url','file','date')); //load helper url
        $this->load->library('breadcrumb');
        if (!$this->session->userdata('logged_in')) {
            redirect('index'); 
        } 
    }   

	public function index()
	{
  		//$this->breadcrumb->add('','');
        //$this->breadcrumb->add('Beranda','admin/home/index');
        //    ->add('Management','admin/home/index');
        //    ->add('Add new Page','pages/manage/add');
        //$this->session->set_flashdata('message','<div class="note note-info">Anda Telah Berhasil Melakukan Perubahan Data.</div>');
        $isi['kelassingle']	= 'beranda';$isi['kelasroot']   = ''; $isi['kelas']		= '';
        $isi['judul']       = 'Beranda';
        $isi['content']     = 'admin/beranda';
        $this->load->view('admin/index',$isi);
	}

    public function logout() {
        $this->session->unset_userdata('logged_in');
        redirect('index/login', 'refresh');
    }

    //link dan folder==============================================================================
    private $root               = 'admin';
    private $home               = 'home';
    //crud=========================================================================================
    private $create             = 'create';
    private $read               = 'read';
    private $update             = 'update';
    private $proses_update      = 'proses_update';
    private $delete             = 'delete';
    //=============================================================================================
    
    
    //import_data==============================================================================================
    private $fieldpkimport_data         = 'id';
    private $tableimport_data           = 'data_soal';
    private $folderimport_data          = 'frontend/import_data';
    private $linkimport_data            = 'home';
    private $titleimport_data           = 'Upload Soal';
    private $judulimport_data           = 'Import Data';

    public function import_data()
    {
        //$this->breadcrumb->add('','');
        $this->breadcrumb->add('File','admin/home/')
             ->add('Import Data','admin/home/import_data');
        //    ->add('Add new Page','pages/manage/add');
        //$this->session->set_flashdata('message','<div class="note note-info">Anda Telah Berhasil Melakukan Perubahan Data.</div>');
        $isi['kelassingle'] = '';$isi['kelasroot']   = 'file'; $isi['kelas']     = 'import_data';
        $isi['judul']       = $this->judulimport_data;
        $isi['id_kursus']   = $id_tr_ujian;
        $isi['content']     = $this->folderimport_data.'/fimport';
        $isi['link2']       = $this->home.'/'.$this->linksoal.'/';
        $isi['link']        = base_url().$this->linkimport_data;
        $this->load->view('admin/index',$isi);
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
                    'soal'              => $rowData[0][0],
                    'id_tr_ujian'       => $id_tr_ujian,
                    'opsi_a'            => $rowData[0][1],
                    'opsi_b'            => $rowData[0][2],
                    'opsi_c'            => $rowData[0][3],
                    'opsi_d'            => $rowData[0][4],
                    'opsi_e'            => $rowData[0][5],
                    'jawaban'           => strtoupper($rowData[0][6]),
                    'id_kategori'       => $rowData[0][7]
                );
                 
                //sesuaikan nama dengan nama tabel
                $insert = $this->db->insert($this->tablesoal,$data);
                delete_files($media['file_path']);
                     
            }
        redirect($this->home.'/'.$this->linksoal.'/'.$id_tr_ujian);
    }

    //Rekening=====================================================================================
    private $fieldpkrekening    = 'id';
    private $tablerekening      = 'data_rekening';
    private $judulrekening      = 'Rekening';
    private $folderrekening     = 'admin/rekening';
    private $linkrekening       = 'rekening';

    public function rekening()
    {
        //$this->breadcrumb->add('','');
        $this->breadcrumb->add('File','admin/home/')
             ->add('Import Data','admin/home/import_data');
        //    ->add('Add new Page','pages/manage/add');
        //$this->session->set_flashdata('message','<div class="note note-info">Anda Telah Berhasil Melakukan Perubahan Data.</div>');
        $isi['kelassingle'] = '';$isi['kelasroot'] = 'data'; $isi['kelas'] = 'rekening';
        $isi['judul']       = $this->judulrekening;
        //$isi['id_kursus']   = $id_tr_ujian;
        $isi['content']     = $this->folderrekening.'/'.$this->read;
        //$isi['query']       = $this->db->get($this->tablerekening);
        $isi['link2']       = $this->root.'/'.$this->home.'/'.$this->linkrekening.'/';
        $isi['linkcreate']  = $this->root.'/'.$this->home.'/'.$this->create.$this->linkrekening.'/';
        $isi['linkupdate']  = $this->root.'/'.$this->home.'/'.$this->update.$this->linkrekening.'/';
        $isi['linkdelete']  = $this->root.'/'.$this->home.'/'.$this->delete.$this->linkrekening.'/';
        $isi['linkview']    = $this->root.'/'.$this->home.'/view'.$this->linkrekening.'/';
        $isi['link']        = base_url().$this->linkimport_data;
        $this->load->view('admin/index',$isi);
    }

    public function viewrekening($pk)
    {
        $isi['nav']         =$this->navrekening.' | Update';
        $isi['judul']       ='View '.$this->judulrekening;
        $isi['content']     =$this->folderrekening.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablerekening,$this->fieldpkrekening,$pk);
        $isi['link']        =$this->root.'/'.$this->home.'/'.$this->linkrekening.'/';
        $isi['link2']       =$this->root.'/'.$this->home.'/'.$this->linkrekening.'/';
        $isi['aksi']        ='view';
        $this->load->view('index',$isi);
    }

    public function createrekening()
    {
        if ($this->input->post('simpan')){
            $this->m_global->create($this->tablerekening,$this->field_datarekening());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->root.'/'.$this->home.'/'.$this->linkrekening);
        }else{
        $isi['nav']         =$this->navrekening.' | Create';
        $isi['judul']       ='Create '.$this->judulrekening;
        $isi['content']     =$this->folderrekening.'/form';
        $isi['link2']       =$this->root.'/'.$this->home.'/'.$this->linkrekening;
        $isi['link']        =$this->root.'/'.$this->home.'/'.$this->create.$this->linkrekening;
        $isi['aksi']        ='create';
        $isi['id']          =$this->m_global->getkodeunik($this->tablerekening,$this->fieldpkrekening);
        $this->load->view('index',$isi);
        }
    }

    public function updaterekening($pk)
    {
        if ($this->input->post('simpan')){
            $this->m_global->update($this->tablerekening,$this->fieldpkrekening,$pk,$this->field_datarekening());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->root.'/'.$this->home.'/'.$this->linkrekening);
        }else{
        $isi['nav']         =$this->navrekening.' | Update';
        $isi['judul']       ='Edit '.$this->judulrekening;
        $isi['content']     =$this->folderrekening.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablerekening,$this->fieldpkrekening,$pk);
        $isi['link2']       =$this->root.'/'.$this->home.'/'.$this->linkrekening;
        $isi['link']        =$this->root.'/'.$this->home.'/'.$this->update.$this->linkrekening.'/';
        $isi['aksi']        ='edit';
        $this->load->view('index',$isi);
        }
    }

    public function deleterekening($pk)
    {
        $this->m_global->delete($this->tablerekening,$this->fieldpkrekening,$pk);
        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect($this->root.'/'.$this->home.'/'.$this->linkrekening);
    }
    
    private function field_datarekening()
    {
        return array(
            'id'                => $this->input->post('id'),
            'nama_rekening'        => $this->input->post('nama_rekening'),
            );
    }



    /*public function import_data()
    {
        //$this->breadcrumb->add('','');
        $this->breadcrumb->add('File','admin/home/')
             ->add('Import Data','admin/home/import_data');
        //    ->add('Add new Page','pages/manage/add');
        //$this->session->set_flashdata('message','<div class="note note-info">Anda Telah Berhasil Melakukan Perubahan Data.</div>');
        $isi['kelassingle'] = '';$isi['kelasroot']   = 'file'; $isi['kelas']     = 'import_data';
        $isi['judul']       = 'Import Data';
        $isi['content']     = 'ini content';
        $this->load->view('admin/index',$isi);
    }*/

    public function export_data()
    {
        //$this->breadcrumb->add('','');
        $this->breadcrumb->add('File','admin/home/')
             ->add('Export Data','admin/home/export_data');
        //    ->add('Add new Page','pages/manage/add');
        //$this->session->set_flashdata('message','<div class="note note-info">Anda Telah Berhasil Melakukan Perubahan Data.</div>');
        $isi['kelassingle'] = '';$isi['kelasroot']   = 'file'; $isi['kelas']     = 'export_data';
        $isi['judul']       = 'Export Data';
        $isi['content']     = 'ini content';
        $this->load->view('admin/index',$isi);
    }

    public function help()
    {
        //$this->breadcrumb->add('','');
        $this->breadcrumb->add('Help','admin/home/help');
        //     ->add('Export Data','admin/home/export_data');
        //    ->add('Add new Page','pages/manage/add');
        //$this->session->set_flashdata('message','<div class="note note-info">Anda Telah Berhasil Melakukan Perubahan Data.</div>');
        $isi['kelassingle'] = 'help'; $isi['kelasroot']   = ''; $isi['kelas']     = '';
        $isi['judul']       = 'Help';
        $isi['content']     = 'ini content';
        $this->load->view('admin/index',$isi);
    }

    //Simpanan=====================================================================================
    private $fieldpksimpanan    = 'id';
    private $tablesimpanan      = 'data_simpanan';
    private $judulsimpanan      = 'Simpanan';
    private $foldersimpanan     = 'admin/simpanan';
    private $linksimpanan       = 'simpanan';

    public function simpanan()
    {
        //$this->session->set_flashdata('message','<div class="note note-info">Anda Telah Berhasil Melakukan Perubahan Data.</div>');
        $this->breadcrumb
             ->add('Pendanaan','home/')
             ->add($this->judulsimpanan,'home/simpanan');
        $isi['kelassingle'] = '';$isi['kelasroot'] = 'pendanaan'; $isi['kelas'] = 'simpanan';
        $isi['judul']       = $this->judulsimpanan;
        $isi['content']     = $this->foldersimpanan.'/'.$this->read;
        $isi['query']       = $this->db
                                   ->select('p.id, p.tanggal, p.id_produk, p.id_anggota, p.id_akun, p.jumlah_hisbah, p.total, p.saldo_simpanan, p.id_departemen, c.nama_produk_pendanaan, c. jumlah_minimal, d.no_kta, d.nama_depan, d.nama_tengah, d.nama_belakang, e.kepala_akun, e.klasifikasi_akun, e.kode_akun, e.nama_akun')
                                   ->join('data_produk_pendanaan c','p.id_produk = c.id','LEFT')
                                   ->join('data_anggota d','p.id_anggota = d.id','LEFT')
                                   ->join('data_akun e','p.id_akun = e.id','LEFT')
                                   ->get($this->tablesimpanan.' p');
        $isi['link2']       = $this->home.'/'.$this->linksimpanan.'/';
        $isi['linkcreate']  = $this->home.'/'.$this->create.$this->linksimpanan.'/';
        $isi['linkupdate']  = $this->home.'/'.$this->update.$this->linksimpanan.'/';
        $isi['linkdelete']  = $this->home.'/'.$this->delete.$this->linksimpanan.'/';
        $isi['linkview']    = $this->home.'/view'.$this->linksimpanan.'/';
        $isi['link']        = base_url().$this->linkimport_data;
        $this->load->view('admin/index',$isi);
    }

    public function viewsimpanan($pk)
    {
        $this->breadcrumb
             ->add('Pendanaan','home/')
             ->add($this->judulsimpanan,'home/simpanan');
        $isi['kelassingle'] = '';$isi['kelasroot'] = 'pendanaan'; $isi['kelas'] = 'simpanan';
        $isi['judul']       ='View '.$this->judulsimpanan;
        $isi['content']     =$this->foldersimpanan.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablesimpanan,$this->fieldpksimpanan,$pk);
        $isi['produk']      =$this->db->get($this->tableproduk_pendanaan);
        $isi['akun']        =$this->db->get($this->tablenama_akun);
        $isi['anggota']     =$this->db->get($this->tableanggota);
        $isi['link']        =$this->home.'/'.$this->linksimpanan.'/';
        $isi['link2']       =$this->home.'/'.$this->linksimpanan.'/';
        $isi['aksi']        ='view';
        $this->load->view('admin/index',$isi);
    }

    public function createsimpanan()
    {
        if ($this->input->post('simpan')){
            $this->m_global->create($this->tablesimpanan,$this->field_datasimpanan());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linksimpanan);
        }else{
        $this->breadcrumb
             ->add('Pendanaan','home/')
             ->add($this->judulsimpanan,'home/simpanan');
        $isi['kelassingle'] = '';$isi['kelasroot'] = 'pendanaan'; $isi['kelas'] = 'simpanan';
        $isi['judul']       ='Create '.$this->judulsimpanan;
        $isi['content']     =$this->foldersimpanan.'/form';
        $isi['produk']      =$this->db->get($this->tableproduk_pendanaan);
        $isi['akun']        =$this->db->get($this->tablenama_akun);
        $isi['anggota']     =$this->db->get($this->tableanggota);
        $isi['link2']       =$this->home.'/'.$this->linksimpanan;
        $isi['link']        =$this->home.'/'.$this->create.$this->linksimpanan;
        $isi['aksi']        ='create';
        $isi['id']          =$this->m_global->getkodeunik($this->tablesimpanan,$this->fieldpksimpanan);
        $this->load->view('admin/index',$isi);
        }
    }

    public function updatesimpanan($pk)
    {
        if ($this->input->post('simpan')){
            $this->m_global->update($this->tablesimpanan,$this->fieldpksimpanan,$pk,$this->field_datasimpanan());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linksimpanan);
        }else{
        $this->breadcrumb
             ->add('Pendanaan','home/')
             ->add($this->judulsimpanan,'home/simpanan');
        $isi['kelassingle'] = '';$isi['kelasroot'] = 'pendanaan'; $isi['kelas'] = 'simpanan';
        $isi['judul']       ='Edit '.$this->judulsimpanan;
        $isi['content']     =$this->foldersimpanan.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablesimpanan,$this->fieldpksimpanan,$pk);
        $isi['produk']      =$this->db->get($this->tableproduk_pendanaan);
        $isi['akun']        =$this->db->get($this->tablenama_akun);
        $isi['anggota']     =$this->db->get($this->tableanggota);
        $isi['link2']       =$this->home.'/'.$this->linksimpanan;
        $isi['link']        =$this->home.'/'.$this->update.$this->linksimpanan.'/';
        $isi['aksi']        ='edit';
        $this->load->view('admin/index',$isi);
        }
    }

    public function deletesimpanan($pk)
    {
        $this->m_global->delete($this->tablesimpanan,$this->fieldpksimpanan,$pk);
        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect($this->home.'/'.$this->linksimpanan);
    }
    
    private function field_datasimpanan()
    {
        return array(
            'id'               => $this->input->post('id'),
            'id_produk'        => $this->input->post('id_produk'),
            'tanggal'          => $this->input->post('tanggal'),
            'id_anggota'       => $this->input->post('id_anggota'),
            'id_akun'          => $this->input->post('id_akun'),
            'id_departemen'    => $this->input->post('id_departemen'),
            'saldo_simpanan'   => $this->input->post('saldo_simpanan'),
            'jumlah_hisbah'    => $this->input->post('jumlah_hisbah'),
            'total'            => $this->input->post('total'),
            );
    }

    //Penarikan=====================================================================================
    private $fieldpkpenarikan    = 'id';
    private $tablepenarikan      = 'data_penarikan';
    private $judulpenarikan      = 'Penarikan';
    private $folderpenarikan     = 'admin/penarikan';
    private $linkpenarikan       = 'penarikan';

    public function penarikan()
    {
        //$this->session->set_flashdata('message','<div class="note note-info">Anda Telah Berhasil Melakukan Perubahan Data.</div>');
        $this->breadcrumb
             ->add('Pendanaan','home/')
             ->add($this->judulpenarikan,'home/penarikan');
        $isi['kelassingle'] = '';$isi['kelasroot'] = 'pendanaan'; $isi['kelas'] = 'penarikan';
        $isi['judul']       = $this->judulpenarikan;
        $isi['content']     = $this->folderpenarikan.'/'.$this->read;
        $isi['query']       = $this->db
                                   ->select('p.id, p.tanggal, p.id_produk, p.id_anggota, p.id_akun, p.jumlah_hisbah, p.kuasa, p.total, p.saldo_simpanan, p.id_departemen, c.nama_produk_pendanaan, c. jumlah_minimal, d.no_kta, d.nama_depan, d.nama_tengah, d.nama_belakang, e.kepala_akun, e.klasifikasi_akun, e.kode_akun, e.nama_akun')
                                   ->join('data_produk_pendanaan c','p.id_produk = c.id','LEFT')
                                   ->join('data_anggota d','p.id_anggota = d.id','LEFT')
                                   ->join('data_akun e','p.id_akun = e.id','LEFT')
                                   ->get($this->tablepenarikan.' p');
        $isi['link2']       = $this->home.'/'.$this->linkpenarikan.'/';
        $isi['linkcreate']  = $this->home.'/'.$this->create.$this->linkpenarikan.'/';
        $isi['linkupdate']  = $this->home.'/'.$this->update.$this->linkpenarikan.'/';
        $isi['linkdelete']  = $this->home.'/'.$this->delete.$this->linkpenarikan.'/';
        $isi['linkview']    = $this->home.'/view'.$this->linkpenarikan.'/';
        $isi['link']        = base_url().$this->linkimport_data;
        $this->load->view('admin/index',$isi);
    }

    public function viewpenarikan($pk)
    {
        $this->breadcrumb
             ->add('Pendanaan','home/')
             ->add($this->judulpenarikan,'home/penarikan');
        $isi['kelassingle'] = '';$isi['kelasroot'] = 'pendanaan'; $isi['kelas'] = 'penarikan';
        $isi['judul']       ='View '.$this->judulpenarikan;
        $isi['content']     =$this->folderpenarikan.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablepenarikan,$this->fieldpkpenarikan,$pk);
        $isi['produk']      =$this->db->get($this->tableproduk_pendanaan);
        $isi['akun']        =$this->db->get($this->tablenama_akun);
        $isi['anggota']     =$this->db->get($this->tableanggota);
        $isi['link']        =$this->home.'/'.$this->linkpenarikan.'/';
        $isi['link2']       =$this->home.'/'.$this->linkpenarikan.'/';
        $isi['aksi']        ='view';
        $this->load->view('admin/index',$isi);
    }

    public function createpenarikan()
    {
        if ($this->input->post('simpan')){
            $this->m_global->create($this->tablepenarikan,$this->field_datapenarikan());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkpenarikan);
        }else{
        $this->breadcrumb
             ->add('Pendanaan','home/')
             ->add($this->judulpenarikan,'home/penarikan');
        $isi['kelassingle'] = '';$isi['kelasroot'] = 'pendanaan'; $isi['kelas'] = 'penarikan';
        $isi['judul']       ='Create '.$this->judulpenarikan;
        $isi['content']     =$this->folderpenarikan.'/form';
        $isi['produk']      =$this->db->get($this->tableproduk_pendanaan);
        $isi['akun']        =$this->db->get($this->tablenama_akun);
        $isi['anggota']     =$this->db->get($this->tableanggota);
        $isi['link2']       =$this->home.'/'.$this->linkpenarikan;
        $isi['link']        =$this->home.'/'.$this->create.$this->linkpenarikan;
        $isi['aksi']        ='create';
        $isi['id']          =$this->m_global->getkodeunik($this->tablepenarikan,$this->fieldpkpenarikan);
        $this->load->view('admin/index',$isi);
        }
    }

    public function updatepenarikan($pk)
    {
        if ($this->input->post('simpan')){
            $this->m_global->update($this->tablepenarikan,$this->fieldpkpenarikan,$pk,$this->field_datapenarikan());
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkpenarikan);
        }else{
        $this->breadcrumb
             ->add('Pendanaan','home/')
             ->add($this->judulpenarikan,'home/penarikan');
        $isi['kelassingle'] = '';$isi['kelasroot'] = 'bank'; $isi['kelas'] = 'penarikan';
        $isi['judul']       ='Edit '.$this->judulpenarikan;
        $isi['content']     =$this->folderpenarikan.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablepenarikan,$this->fieldpkpenarikan,$pk);
        $isi['produk']      =$this->db->get($this->tableproduk_pendanaan);
        $isi['akun']        =$this->db->get($this->tablenama_akun);
        $isi['anggota']     =$this->db->get($this->tableanggota);
        $isi['link2']       =$this->home.'/'.$this->linkpenarikan;
        $isi['link']        =$this->home.'/'.$this->update.$this->linkpenarikan.'/';
        $isi['aksi']        ='edit';
        $this->load->view('admin/index',$isi);
        }
    }

    public function deletepenarikan($pk)
    {
        $this->m_global->delete($this->tablepenarikan,$this->fieldpkpenarikan,$pk);
        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect($this->home.'/'.$this->linkpenarikan);
    }
    
    private function field_datapenarikan()
    {
        return array(
            'id'               => $this->input->post('id'),
            'id_produk'        => $this->input->post('id_produk'),
            'tanggal'          => $this->input->post('tanggal'),
            'id_anggota'       => $this->input->post('id_anggota'),
            'id_akun'          => $this->input->post('id_akun'),
            'kuasa'            => $this->input->post('kuasa'),
            'id_departemen'    => $this->input->post('id_departemen'),
            'saldo_simpanan'   => $this->input->post('saldo_simpanan'),
            'jumlah_hisbah'    => $this->input->post('jumlah_hisbah'),
            'total'            => $this->input->post('total'),
            );
    }
}
