<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->model('m_global'); //load model uploads yang berada di folder model
        $this->load->helper(array('url','file','date')); //load helper url
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->load->library('breadcrumb');
        if (!$this->session->userdata('logged_in')) {
            redirect('index'); 
        } 
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

	public function index()
	{
  		//$this->breadcrumb->add('','');
        //$this->breadcrumb->add('Beranda','admin/home/index');
        //    ->add('Management','admin/home/index');
        //    ->add('Add new Page','pages/manage/add');
        //$this->session->set_flashdata('message','<div class="note note-info">Anda Telah Berhasil Melakukan Perubahan Data.</div>');
        $isi['nav']         = 'Beranda';
        $isi['kelassingle']	= 'beranda';$isi['kelasroot']   = ''; $isi['kelas']		= '';
        $isi['judul']       = 'Beranda';
        $isi['content']     = 'admin/beranda';
        $isi['perusahaan']  = $this->db->where('id',$this->session->userdata('id_tabel'))->get('data_register');
        $this->load->view('admin/index',$isi);
	}

    public function logout() {
        $this->session->unset_userdata('logged_in');
        redirect('index/login', 'refresh');
    }

    //Jurnal Umum=====================================================================================
    private $fieldpkjurnal_umum_akuntansi    = 'id';
    private $tablejurnal_umum_akuntansi      = 'tbl_ju_header';
    private $table2jurnal_umum_akuntansi     = 'data_transaksi_detail';
    private $juduljurnal_umum_akuntansi      = 'Jurnal Umum';
    private $folderjurnal_umum_akuntansi     = 'admin/jurnal_umum_akuntansi';
    private $linkjurnal_umum_akuntansi       = 'jurnal_umum_akuntansi';

    public function jurnal_umum_akuntansi()
    {
            $this->breadcrumb
                 ->add('Akuntansi','home/')
                 ->add('Jurnal Umum','home/jurnal_umum_akuntansi');
            $isi['kelassingle'] = '';$isi['kelasroot'] = 'akuntansi'; $isi['kelas'] = 'jurnal_umum_akuntansi';
            $isi['judul']       = 'Jurnal Transaksi';
            $isi['content']     = $this->folderjurnal_umum_akuntansi.'/'.$this->read;
            $isi['query']       = $this->db->select('p.id, p.no_transaksi, p.tanggal_transaksi, p.ste, p.keterangan')
                                           ->join('data_periode_akuntansi e','p.periode = e.id_periode','LEFT')
                                           ->where('e.status','Aktif')->where('p.id_perusahaan',$this->session->userdata('id_perusahaan'))->get($this->tablejurnal_umum_akuntansi.' p')->result();
            $isi['link2']       = $this->home.'/menu_'.$this->linkjurnal_umum_akuntansi.'/';
            $isi['table2']      = $this->table2jurnal_umum_akuntansi;
            $isi['linkprint']   = $this->home.'/print_'.$this->linkjurnal_umum_akuntansi;
            $isi['linkcreate']  = $this->home.'/'.$this->create.$this->linkjurnal_umum_akuntansi.'/';
            $isi['linkupdate']  = $this->home.'/'.$this->update.$this->linkjurnal_umum_akuntansi.'/';
            $isi['linkdelete']  = $this->home.'/'.$this->delete.$this->linkjurnal_umum_akuntansi.'/';
            $isi['linkview']    = $this->home.'/view'.$this->linkjurnal_umum_akuntansi.'/';
            $isi['link']        = base_url().$this->linkimport_data;
            $this->load->view('admin/index',$isi);
    }

    public function viewjurnal_umum_akuntansi($pk)
    {
            $this->breadcrumb
                 ->add('Akuntansi','home/')
                 ->add('Jurnal Umum','home/jurnal_umum_akuntansi');
            $isi['kelassingle'] = '';$isi['kelasroot'] = 'akuntansi'; $isi['kelas'] = 'jurnal_umum_akuntansi';
            $isi['judul']       = 'Jurnal Transaksi';
            $isi['content']     = $this->folderjurnal_umum_akuntansi.'/'.$this->read.'2';
            $isi['query']       = $this->db->where('id',$pk)->get($this->tablejurnal_umum_akuntansi)->result();
            $isi['link2']       = $this->home.'/'.$this->linkjurnal_umum_akuntansi.'/';
            $isi['table2']      = $this->table2jurnal_umum_akuntansi;
            $isi['linkprint']   = $this->home.'/print_'.$this->linkjurnal_umum_akuntansi;
            $isi['linkcreate']  = $this->home.'/'.$this->create.$this->linkjurnal_umum_akuntansi.'/';
            $isi['linkupdate']  = $this->home.'/'.$this->update.$this->linkjurnal_umum_akuntansi.'/';
            $isi['linkdelete']  = $this->home.'/'.$this->delete.$this->linkjurnal_umum_akuntansi.'/';
            $isi['linkview']    = $this->home.'/view'.$this->linkjurnal_umum_akuntansi.'/';
            $isi['link']        = base_url().$this->linkimport_data;
            $this->load->view('admin/index',$isi);
    }

    public function createjurnal_umum_akuntansi()
    {
        if ($this->input->post('simpan')){
            if($this->db->insert($this->tablejurnal_umum_akuntansi,$this->field_datajurnal_umum_akuntansi())){
                $header=$this->db->insert_id();
                //----------------INSERT DETAIL--------------------------------------
                if($this->input->post('coa')){
                    $v1=$this->input->post('coa');
                    while(list($key,$value)=each($v1))
                        {
                            $ca=$this->input->post("coa[$key]");
                            $debet      =$this->input->post("debet[$key]")*1;
                            $kredit     =$this->input->post("kredit[$key]")*1;
                            $data2=array('coa'=>$ca,
                                         'header'=>$header,
                                         'debet'=>$debet,
                                         'nama_tabel'=>$this->tablejurnal_umum_akuntansi,
                                         'id_perusahaan'     =>$this->session->userdata('id_perusahaan'),
                                         'nama_transaksi'=>'Jurnal Umum',
                                         'kredit'=>$kredit);
                            $this->db->insert($this->table2jurnal_umum_akuntansi,$data2);           
                        }
                    if($this->m_global->setSTE($header,$this->tablejurnal_umum_akuntansi,$this->table2jurnal_umum_akuntansi)){
                        redirect($this->home.'/'.$this->update.$this->linkjurnal_umum_akuntansi."/".$header);
                    }else{
                        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                        redirect($this->home.'/'.$this->create.$this->linkjurnal_umum_akuntansi);
                    }
                }else{
                    redirect($this->home.'/'.$this->create.$this->linkjurnal_umum_akuntansi);
                }
            }else{
                redirect($this->home.'/'.$this->create.$this->linkjurnal_umum_akuntansi);
            }
        }else{
        //--------------------------------------------------------------------------
        $id=  $this->uri->segment(4);
        $d=$this->m_global->getPeriodeAktif();
        $isi['periode']     =$d['id_periode']*1;
        $isi['kode_periode']=$d['kode_periode'];
        $isi['r']           =false;
        //-------------------------------------------------------------------------
        $this->breadcrumb
             ->add('Akuntansi','home/')
             ->add('Jurnal Umum','home/jurnal_umum_akuntansi');
        $isi['kelassingle'] = '';$isi['kelasroot'] = 'akuntansi'; $isi['kelas'] = 'jurnal_umum_akuntansi';
        $isi['judul']       ='Entry Jurnal';
        $isi['content']     =$this->folderjurnal_umum_akuntansi.'/form';
        $isi['query']       =false;
        $isi['link2']       =$this->home.'/menu_'.$this->linkjurnal_umum_akuntansi;
        $isi['link']        =$this->home.'/'.$this->create.$this->linkjurnal_umum_akuntansi;
        $isi['aksi']        ='create';
        $this->load->view('admin/index',$isi);
        }
    }

    public function updatejurnal_umum_akuntansi($pk)
    {
        if ($this->input->post('simpan')){
            $this->db->where($this->fieldpkjurnal_umum_akuntansi,$pk);
            if($this->db->update($this->tablejurnal_umum_akuntansi,$this->field_datajurnal_umum_akuntansi()))
                {
                    //----------------INSERT DETAIL-----------------
                    if($this->input->post('coa'))
                        {
                            $v1=$this->input->post('coa');
                            while(list($key,$value)=each($v1))
                                {
                                    $ca=$this->input->post("coa[$key]");
                                    $debet      =$this->input->post("debet[$key]")*1;
                                    $kredit     =$this->input->post("kredit[$key]")*1;
                                    $data2=array('coa'=>$ca,
                                                 'header'=>$pk,
                                                 'debet'=>$debet,
                                                 'nama_tabel'=>$this->tablejurnal_umum_akuntansi,
                                                 'id_perusahaan'     =>$this->session->userdata('id_perusahaan'),
                                                 'nama_transaksi'=>'Jurnal Umum',
                                                 'kredit'=>$kredit);
                                    $this->db->insert($this->table2jurnal_umum_akuntansi,$data2);           
                                }
                        }
                    //------------------UPDATE DETAIL-------------------------------
                    if($this->input->post('coa_e'))
                        {
                            $v2=$this->input->post('coa_e');
                            while(list($key,$value)=each($v2))
                                {
                                    $debet      =$this->input->post("debet_e[$key]")*1;
                                    $kredit     =$this->input->post("kredit_e[$key]")*1;
                                    $data2=array('debet'=>$debet,
                                                 'nama_tabel'=>$this->tablejurnal_umum_akuntansi,
                                                 'id_perusahaan'     =>$this->session->userdata('id_perusahaan'),
                                                 'nama_transaksi'=>'Jurnal Umum',
                                                 'kredit'=>$kredit);
                                    $this->db->where("id",$key);
                                    $this->db->update($this->table2jurnal_umum_akuntansi,$data2);
                                }
                        }
                    //------------------HAPUS-------------------------------
                    if($this->input->post('coa_cb'))
                        {
                            $v3=$this->input->post('coa_cb');
                            while(list($key,$value)=each($v3))
                                {
                                    $this->db->where("id",$value);
                                    $this->db->delete($this->table2jurnal_umum_akuntansi);
                                }
                        }
                    if($this->m_global->setSTE($pk,$this->tablejurnal_umum_akuntansi,$this->table2jurnal_umum_akuntansi)){
                        redirect($this->home.'/'.$this->update.$this->linkjurnal_umum_akuntansi."/".$pk);
                    }else{
                        redirect($this->home.'/'.$this->linkjurnal_umum_akuntansi);
                    }
                }else{
                    redirect($this->home.'/'.$this->update.$this->linkjurnal_umum_akuntansi."/".$pk);
                }
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
            redirect($this->home.'/'.$this->linkjurnal_umum_akuntansi);
        }else{
            //--------------------------------------------------------------------------
        $id=  $this->uri->segment(4);
        $d=$this->m_global->getPeriodeAktif();
        $isi['periode']     =$d['id_periode']*1;
        $isi['kode_periode']=$d['kode_periode'];
        $isi['r']           =$this->m_global->getByID($this->fieldpkjurnal_umum_akuntansi,$pk,$this->tablejurnal_umum_akuntansi)->row_array();
        $isi['detail']      =$this->m_global->getDetailTransaksi($pk,$this->table2jurnal_umum_akuntansi);
        //-------------------------------------------------------------------------
        $this->breadcrumb
             ->add('Akuntansi','home/')
             ->add('Jurnal Umum','home/jurnal_umum_akuntansi');
        $isi['kelassingle'] = '';$isi['kelasroot'] = 'akuntansi'; $isi['kelas'] = 'jurnal_umum_akuntansi';
        $isi['judul']       ='Edit '.$this->juduljurnal_umum_akuntansi;
        $isi['content']     =$this->folderjurnal_umum_akuntansi.'/form';
        $isi['query']       =$this->m_global->read_update($this->tablejurnal_umum_akuntansi,$this->fieldpkjurnal_umum_akuntansi,$pk);
        $isi['link2']       =$this->home.'/'.$this->linkjurnal_umum_akuntansi;
        $isi['link']        =$this->home.'/'.$this->update.$this->linkjurnal_umum_akuntansi.'/';
        $isi['aksi']        ='edit';
        $this->load->view('admin/index',$isi);
        }
    }

    public function deletejurnal_umum_akuntansi($pk)
    {
        $id=  $this->uri->segment(3);
        $this->db->where('id',$pk);
        if($this->db->delete($this->tablejurnal_umum_akuntansi))
            {
                //---------Hapus dari rincian------------------
                $this->db->where('header',$pk);
                $this->db->delete($this->table2jurnal_umum_akuntansi);
                $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
                redirect($this->home.'/'.$this->linkjurnal_umum_akuntansi);
            }
        else
            {
                redirect($this->home.'/'.$this->linkjurnal_umum_akuntansi);
            }
    }
    
    private function field_datajurnal_umum_akuntansi()
    {
        return array(
            'no_transaksi'      =>$this->input->post('no_bukti'),
            'tanggal_transaksi' =>$this->input->post('tanggal_transaksi'),
            'id_perusahaan'     =>$this->session->userdata('id_perusahaan'),
            'keterangan'        =>$this->input->post('uraian'),
            'periode'           =>$this->input->post('periode')
            );
    }

    public function print_jurnal_umum_akuntansi()
    {
        $isi['query']           =$this->db->get($this->tablejurnal_umum_akuntansi);
        $isi['total_debet']     =$this->table2jurnal_umum_akuntansi;
        $isi['total_kredit']    =$this->table2jurnal_umum_akuntansi;
        $this->load->view($this->foldershu.'/print',$isi);
    }

    //Kursus=====================================================================================
    private $fieldpkkursus    = 'id';
    private $tablekursus      = 'data_kursus';
    private $navkursus        = 'Kursus';
    private $judulkursus      = 'Event';
    private $folderkursus     = 'admin/dst_kursus';
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
        $isi['linkaktif']   =$this->home.'/aktif'.$this->linkkursus.'/';
        $isi['linknonaktif']=$this->home.'/nonaktif'.$this->linkkursus.'/';
        $isi['linkview']    =$this->home.'/view'.$this->linkkursus.'/';
        $this->load->view('admin/index',$isi);
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
        $this->load->view('admin/index',$isi);
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
        $this->load->view('admin/index',$isi);
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
        $this->load->view('admin/index',$isi);
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

    public function aktifkursus($pk)
    {
        $this->m_global->update($this->tablekursus,$this->fieldpkkursus,$pk,array('status' => 'Aktif'));
        redirect($this->home.'/'.$this->linkkursus,'refresh');
    }

    public function nonaktifkursus($pk)
    {
        $this->m_global->update($this->tablekursus,$this->fieldpkkursus,$pk,array('status' => 'Tidak Aktif'));
        redirect($this->home.'/'.$this->linkkursus,'refresh');
    }

    //Ujian=====================================================================================
    private $fieldpkujian    = 'id';
    private $tableujian      = 'tr_ujian';
    private $navujian        = 'Ujian';
    private $judulujian      = 'Ujian';
    private $folderujian     = 'admin/dst_ujian';
    private $linkujian       = 'ujian';

    public function ujian()
    {
        $isi['nav']             =$this->navujian;
        $isi['judul']           =$this->judulujian;
        $isi['content']         =$this->folderujian.'/'.$this->read;
        $isi['query']           =$this->db
                                    ->select('p.id, p.id_kursus, c.nama_kursus, p.nama_ujian, p.jumlah_soal, p.waktu, p.jenis, p.status')
                                    ->join('data_kursus c','p.id_kursus = c.id','LEFT')
                                    ->order_by('id','ASC')
                                    ->get($this->tableujian.' p');
        $isi['linkcreate']      =$this->home.'/'.$this->create.$this->linkujian.'/';
        $isi['linkupdate']      =$this->home.'/'.$this->update.$this->linkujian.'/';
        $isi['linkdelete']      =$this->home.'/'.$this->delete.$this->linkujian.'/';
        $isi['linkview']        =$this->home.'/view'.$this->linkujian.'/';
        $isi['linkaktif']       =$this->home.'/aktif'.$this->linkujian.'/';
        $isi['linknonaktif']    =$this->home.'/nonaktif'.$this->linkujian.'/';
        $isi['linksoal']        =$this->home.'/soal/';
        $isi['linkhasil_ujian'] =$this->home.'/hasil_ujian/';
        $this->load->view('admin/index',$isi);
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
        $this->load->view('admin/index',$isi);
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
        $this->load->view('admin/index',$isi);
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
        $this->load->view('admin/index',$isi);
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
            'waktu'             => $this->input->post('waktu'),
            'status'            => $this->input->post('status'),
            'jumlah_soal'       => $this->input->post('jumlah_soal'),
            'id_kursus'         => $this->input->post('id_kursus')
            );
    }
    
    //Soal=====================================================================================
    private $fieldpksoal    = 'id';
    private $tablesoal      = 'data_soal';
    private $navsoal        = 'Soal';
    private $judulsoal      = 'Soal';
    private $foldersoal     = 'admin/dst_soal';
    private $linksoal       = 'soal';

    public function kursus2()
    {
        $isi['nav']         =$this->navsoal;
        $isi['judul']       =$this->judulsoal;
        $isi['content']     =$this->foldersoal.'/kursus';
        $isi['query']       =$this->db
                                  ->join('data_kursus c','p.id_kursus = c.id','LEFT')
                                  ->get($this->tableujian.' p');
        $isi['linksoal']    =$this->home.'/soal/';
        $this->load->view('admin/index',$isi);
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
        $isi['linkexport']  =$this->home.'/exportsoal/';
        $isi['linkupload']  =$this->home.'/uploadfotosoal/';
        $isi['link2']       =$this->home.'/ujian/';
        $this->load->view('admin/index',$isi);
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
        $this->load->view('admin/index',$isi);
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
        $isi['id_kursus']   =$id_tr_ujian;
        $this->load->view('admin/index',$isi);
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
                    'opsi_a'            => $this->input->post('opsi_a'),
                    'opsi_b'            => $this->input->post('opsi_b'),
                    'opsi_c'            => $this->input->post('opsi_c'),
                    'opsi_d'            => $this->input->post('opsi_d'),
                    'opsi_e'            => $this->input->post('opsi_e'),
                    'id_kategori'       => $this->input->post('id_kategori'),
                    'jawaban'           => strtoupper($this->input->post('jawaban')),
                    'tgl_input'         => $tanggal,
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
                    'opsi_a'            => $this->input->post('opsi_a'),
                    'opsi_b'            => $this->input->post('opsi_b'),
                    'opsi_c'            => $this->input->post('opsi_c'),
                    'opsi_d'            => $this->input->post('opsi_d'),
                    'opsi_e'            => $this->input->post('opsi_e'),
                    'id_kategori'       => $this->input->post('id_kategori'),
                    'jawaban'           => strtoupper($this->input->post('jawaban')),
                    'tgl_input'         => $tanggal
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
        $isi['id_kursus']   =$id_kursus;
        $isi['id']          =$this->m_global->getkodeunikpegawai($this->tablesoal,$this->fieldpksoal);
        $isi['link2']       =$this->home.'/'.$this->linksoal.'/';
        $this->load->view('admin/index',$isi);
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
                    'opsi_a'            => $this->input->post('opsi_a'),
                    'opsi_b'            => $this->input->post('opsi_b'),
                    'opsi_c'            => $this->input->post('opsi_c'),
                    'opsi_d'            => $this->input->post('opsi_d'),
                    'opsi_e'            => $this->input->post('opsi_e'),
                    'id_kategori'       => $this->input->post('id_kategori'),
                    'jawaban'           => strtoupper($this->input->post('jawaban')),
                    'tgl_input'         => $tanggal,
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
                    'opsi_a'            => $this->input->post('opsi_a'),
                    'opsi_b'            => $this->input->post('opsi_b'),
                    'opsi_c'            => $this->input->post('opsi_c'),
                    'opsi_d'            => $this->input->post('opsi_d'),
                    'opsi_e'            => $this->input->post('opsi_e'),
                    'id_kategori'       => $this->input->post('id_kategori'),
                    'jawaban'           => strtoupper($this->input->post('jawaban')),
                    'tgl_input'         => $tanggal
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
        $this->load->view('admin/index',$isi);
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
    private $folderimportsoal          = 'admin/dst_soal';
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
    
    public function exportsoal($id)
    {
        $isi['query']       =$this->db
                                  ->select('p.id, p.soal, p.jawaban, p.gambar, p.id_tr_ujian, p.opsi_a, p.opsi_b, p.opsi_c, p.opsi_d, p.opsi_e, p.id_kategori')
                                  ->where('p.id_tr_ujian', $id)
                                  ->get($this->tablesoal.' p');
        $this->load->view('admin/dst_soal/readexport',$isi);
    }
    
    //Hasil Ujian=====================================================================================
    private $fieldpkhasil_ujian    = 'id';
    private $tablehasil_ujian      = 'tr_ikut_ujian';
    private $navhasil_ujian        = 'Hasil Ujian';
    private $judulhasil_ujian      = 'Hasil Ujian';
    private $folderhasil_ujian     = 'admin/dst_hasil_ujian';
    private $linkhasil_ujian       = 'hasil_ujian';

    public function hasil_ujian($pk)
    {
        $isi['nav']         =$this->navhasil_ujian;
        $isi['judul']       =$this->judulhasil_ujian;
        $isi['content']     =$this->folderhasil_ujian.'/'.$this->read;
        $isi['query']       =$this->db
                                  ->select('p.id, d.npm, p.id_user, d.nama_lengkap, d.nama_depan, d.nama_belakang, d.kelas, p.nilai, p.jml_benar, p.jml_salah, p.jml_kosong, p.tgl_selesai')
                                  ->join('data_register d','p.id_user = d.id','LEFT')
                                  ->join('tr_ujian c','p.id_tes = c.id','LEFT')
                                  ->where('p.id_tes',$pk)
                                  ->get($this->tablehasil_ujian.' p');
        $isi['linkdelete']  =$this->home.'/'.$this->delete.$this->linkhasil_ujian.'/'.$pk.'/';
        $isi['linkview']    =$this->home.'/view'.$this->linkhasil_ujian.'/';
        $isi['link2']       =$this->home.'/ujian/';
        $this->load->view('admin/index',$isi);
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
        $this->load->view('admin/index',$isi);
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
        $this->load->view('admin/index',$isi);
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
        $this->load->view('admin/index',$isi);
        }
    }

    public function deletehasil_ujian($ujian,$pk)
    {
        $id_user = $this->db->query("SELECT id_user, id_tes from tr_ikut_ujian where id='".$pk."'");
        if (empty($id_user)){
            $this->m_global->delete($this->tablehasil_ujian,$this->fieldpkhasil_ujian,$pk);
        }else{
            $id_user2=$id_user->row_array();
            $this->db->query("DELETE FROM tr_jawab WHERE id_tes = ".$id_user2['id_tes']." AND id_user = ".$id_user2['id_user']);
            $this->m_global->delete($this->tablehasil_ujian,$this->fieldpkhasil_ujian,$pk);
        }
        
        $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Telah Berhasil Melakukan Perubahan Data.</div></div>');
        redirect($this->home.'/'.$this->linkhasil_ujian.'/'.$ujian);
    }
    
    private function field_datahasil_ujian()
    {
        return array(
            'id'                => $this->input->post('id'),
            'nama_ujian'        => $this->input->post('nama_ujian'),
            'waktu'             => $this->input->post('waktu'),
            'jumlah_soal'       => $this->input->post('jumlah_soal'),
            'id_kursus'         => $this->input->post('id_kursus')
            );
    }
    
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

    public function export_data()
    {
        //$this->breadcrumb->add('','');
        $this->breadcrumb->add('File','home/')
             ->add('Export Data','home/export_data');
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
        $this->breadcrumb->add('Help','home/help');
        //     ->add('Export Data','admin/home/export_data');
        //    ->add('Add new Page','pages/manage/add');
        //$this->session->set_flashdata('message','<div class="note note-info">Anda Telah Berhasil Melakukan Perubahan Data.</div>');
        $isi['kelassingle'] = 'help'; $isi['kelasroot']   = ''; $isi['kelas']     = '';
        $isi['judul']       = 'Help';
        $isi['content']     = 'admin/help/read';
        $this->load->view('admin/index',$isi);
    }
    
    //Soal=====================================================================================
    private $fieldpkpretest    = 'id';
    private $tablepretest      = 'data_soal';
    private $navpretest        = 'Soal Pretest';
    private $judulpretest      = 'Ujian';
    private $folderpretest     = 'admin/dsis_pretest';
    private $linkpretest       = 'pretest';

    public function pretest()
    {
        $isi['nav']         =$this->navpretest;
        $isi['judul']       =$this->judulpretest;
        $isi['content']     =$this->folderpretest.'/'.$this->read;
        $isi['query']       =$this->db
                                  ->select('p.id, p.nama_ujian, p.jumlah_soal, p.waktu, p.jenis, p.status, a.nama_kursus')
                                  ->where('status', 'Aktif')
                                  ->join('data_kursus a','p.id_kursus = a.id','LEFT')
                                  ->order_by('id','ASC')
                                  ->get('tr_ujian p');
        /*$isi['query2']      =$this->db
                                  ->where('id_user', $this->session->userdata('id'))
                                  ->get('tr_ikut_ujian')
                                  ->row();*/
        $isi['linkview']    =$this->home.'/kerjakan/';
        $this->load->view('admin/index',$isi);
    }

    public function kerjakan($pk)
    {
        $this->db->query("UPDATE tr_mahasiswa_kursus SET id_ujian = ".$pk." WHERE id_mahasiswa = '".$this->session->userdata('id')."'");
        $cek_sdh_selesai= $this->db->query("SELECT id FROM tr_ikut_ujian WHERE id_tes = ".$pk." AND id_user = '".$this->session->userdata('id')."' AND status = 'y'")->num_rows();
        if ($cek_sdh_selesai < 1) {
            $cek_detil_tes      = $this->db->query("SELECT * FROM tr_ujian WHERE id = ".$pk)->row();
            $q_cek_sdh_ujian    = $this->db->query("SELECT id FROM tr_ikut_ujian WHERE id_tes = ".$pk." AND id_user = '".$this->session->userdata('id')."'");
            $d_cek_sdh_ujian    = $q_cek_sdh_ujian->row();
            $cek_sdh_ujian      = $q_cek_sdh_ujian->num_rows();
            if ($cek_sdh_ujian == 0) {
                $waktu_selesai      =$this->tambah_jam_sql($cek_detil_tes->waktu);
                $this->db->query("INSERT INTO tr_ikut_ujian VALUES (null, ".$pk.", '".$this->session->userdata('id')."', '', 0, 0, 0, 0, 0, NOW(), ADDTIME(NOW(), '$waktu_selesai'), 'n')");
                $isi['nav']         =$this->navpretest;
                $isi['judul']       =$this->judulpretest;
                $isi['content']     =$this->folderpretest.'/form2';
                $isi['query2']      =$this->db->query("SELECT * FROM tr_ikut_ujian WHERE id_tes = ".$pk." AND id_user = '".$this->session->userdata('id')."'");
                $isi['query']       =$this->db->query("SELECT id, id_kategori, gambar, soal, opsi_a, opsi_b, opsi_c, opsi_d, opsi_e, '' AS jawaban FROM data_soal WHERE id_tr_ujian = ".$pk." ORDER BY RAND() LIMIT ".$cek_detil_tes->jumlah_soal);
                $isi['link']        =$this->home.'/jawab/'.$pk;
                $isi['link2']       =$this->home.'/'.$this->linkpretest.'/';
                $isi['aksi']        ='view';
                $this->load->view('admin/index',$isi);
            }else{
                $isi['nav']         =$this->navpretest;
                $isi['judul']       =$this->judulpretest;
                $isi['content']     =$this->folderpretest.'/form2';
                $isi['query2']      =$this->db->query("SELECT * FROM tr_ikut_ujian WHERE id_tes = ".$pk." AND id_user = '".$this->session->userdata('id')."'");
                $isi['query']       =$this->db->query("SELECT id, id_kategori, gambar, soal, opsi_a, opsi_b, opsi_c, opsi_d, opsi_e, '' AS jawaban FROM data_soal WHERE id_tr_ujian = ".$pk." ORDER BY RAND() LIMIT ".$cek_detil_tes->jumlah_soal);
                $isi['link']        =$this->home.'/jawab/'.$pk;
                $isi['link2']       =$this->home.'/'.$this->linkpretest.'/';
                $isi['aksi']        ='view';
                $this->load->view('admin/index',$isi);
            }
        }else {
            $this->session->set_flashdata('message','<div class="panel-body"><div class="alert alert-success">Anda Sudah selesai Mengerjakan soal Pretest.</div></div>');
            redirect('home/pretest/');
        }
    }

    public function jawab($pk)
    {
        if($this->input->post('simpan')){
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
                    $this->db->query("INSERT INTO tr_jawab VALUES (null, ".$pk.", '".$this->session->userdata('id')."', '$kategori', '$nomor', '')");
                    $kosong++;
                }else{
                    $jawaban    =$pilihan[$nomor];
                    $query      =$this->db->query("SELECT * from data_soal where id='$nomor' and jawaban='$jawaban'");
                    $cek        =$query->num_rows();
                    if($cek){
                        $update    = $update."".$nomor.":".$jawaban.",";
                        $this->db->query("INSERT INTO tr_jawab VALUES (null, ".$pk.", '".$this->session->userdata('id')."', '$kategori', '$nomor', '$jawaban')");
                        $benar++;
                    }else{
                        $update    = $update."".$nomor.":".$jawaban.",";
                        $this->db->query("INSERT INTO tr_jawab VALUES (null, ".$pk.", '".$this->session->userdata('id')."', '$kategori', '$nomor', '$jawaban')");
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
    
    //Mahasiswa=====================================================================================
    private $fieldpkmahasiswa    = 'id';
    private $tablemahasiswa      = 'data_register';
    private $navmahasiswa        = 'Mahasiswa';
    private $judulmahasiswa      = 'Mahasiswa';
    private $foldermahasiswa     = 'admin/dst_mahasiswa';
    private $linkmahasiswa       = 'mahasiswa';

    public function mahasiswa()
    {
        $isi['nav']         =$this->navmahasiswa;
        $isi['judul']       =$this->judulmahasiswa;
        $isi['content']     =$this->foldermahasiswa.'/'.$this->read;
        $isi['query']       =$this->db->where('status','Mahasiswa')->get($this->tablemahasiswa);
        $isi['linkcreate']  =$this->home.'/'.$this->create.$this->linkmahasiswa.'/';
        $isi['linkupdate']  =$this->home.'/'.$this->update.$this->linkmahasiswa.'/';
        $isi['linkdelete']  =$this->home.'/'.$this->delete.$this->linkmahasiswa.'/';
        $isi['linkview']    =$this->home.'/view'.$this->linkmahasiswa.'/';
        $isi['linkupload']  =$this->home.'/uploadfotomahasiswa/';
        $this->load->view('admin/index',$isi);
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
        $this->load->view('admin/index',$isi);
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
        $this->load->view('admin/index',$isi);
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
                    'alamat'             => $this->input->post('alamat'),
                    'kota'               => $this->input->post('kota'),
                    'email'              => $this->input->post('email'),
                    'npm'               => $this->input->post('npm'),
                    'kelas'             => $this->input->post('kelas'),
                    'jurusan'           => $this->input->post('jurusan'),
                    'fakultas'          => $this->input->post('fakultas'),
                    'domisili'          => $this->input->post('domisili')
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
        $this->load->view('admin/index',$isi);
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
                    'alamat'            => $this->input->post('alamat'),
                    'kota'              => $this->input->post('kota'),
                    'email'             => $this->input->post('email'),
                    'npm'               => $this->input->post('npm'),
                    'kelas'             => $this->input->post('kelas'),
                    'jurusan'           => $this->input->post('jurusan'),
                    'fakultas'          => $this->input->post('fakultas'),
                    'domisili'          => $this->input->post('domisili')
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
        $this->load->view('admin/index',$isi);
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
}