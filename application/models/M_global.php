<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_global extends CI_Model {

	function __construct() {
        parent::__construct();
    }

	public function create($table,$data) 
	{
		return $this->db->insert($table,$data);	
	}
	
	public function read($table,$fieldpk) 
	{
		$this->db->order_by($fieldpk,'ASC');
		$query = $getData = $this->db->get($table);
		if ($getData->num_rows()>0)
		{return $query;}
		else 
		{return null;}
	}

    public function updatearray2($table,$fieldpk,$pk,$data){
        foreach($data as $row => $value)
        {
            $this->db->where($fieldpk, $data[$pk]);
            $query=$this->db->update($table, $value);
        }
        return $result;
    }

    public function updatearray()
    {
        foreach($this->input->post('id') as $key => $value)
        {
            $menuData = array(
                'id'            => intval($value),
                'saldo_awal'    => intval($this->input->post('saldo_awal'))
            );
            $this->db->where('id', $value);
            $this->db->update('data_akun', $menuData);
        }
    }
	
	public function read_update($table,$fieldpk,$pk) 
	{
		$this->db->order_by($fieldpk,'ASC');
		$this->db->where($fieldpk,$pk);
		$query = $getData = $this->db->get($table);
		
		if ($getData->num_rows()>0)
		{return $query;}
		else 
		{return null;}
	}
	
	public function update($table,$fieldpk,$pk,$data)
	{
		$this->db->where($fieldpk,$pk);
		$this->db->update($table,$data);
	}
	
	public function delete($table,$fieldpk,$pk){
		$this->db->where($fieldpk,$pk);
		return $this->db->delete($table);
	}

    function getkodeunikanggota($table,$fieldpk,$tipe) { 
        $q = $this->db->query("SELECT $fieldpk AS idmax FROM ".$table." WHERE tipe='".$tipe."'");
        $kd = ""; //kode awal
        if($q->num_rows()>0){ //jika data ada
            foreach($q->result() as $k){
                $tmp = ($k->idmax); //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $kd = substr($tmp,3,5); //kode ambil 4 karakter terakhir
                $kode = $kd+1;
                if($kode == 0){
                    $kode2 = '0001';
                }else if($kode >= 1000){
                    $kode2 = $kode;
                }else if($kode >= 100){
                    $kode2 = '0'.$kode;
                }else if($kode >= 10){
                    $kode2 = '00'.$kode;
                }else{
                    $kode2 = '000'.$kode;
                }
            }
        }else{ //jika data kosong diset ke kode awal
            $kode2 = "0001";
        }
        if ($tipe=='anggota'){
            return 'ANG'.$kode2;
        }elseif($tipe=='karyawan'){
            return 'KAR'.$kode2;
        }
   }

	function getkodeunik($table,$fieldpk) { 
        $q = $this->db->query("SELECT $fieldpk AS idmax FROM ".$table);
        $kd = ""; //kode awal
        if($q->num_rows()>0){ //jika data ada
            foreach($q->result() as $k){
                $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $kd = sprintf($tmp); //kode ambil 4 karakter terakhir
            }
        }else{ //jika data kosong diset ke kode awal
            $kd = "1";
        }
        return $kd;
   }

	function getkodeunikpegawai($table,$fieldpk) { 
        $q = $this->db->query("SELECT $fieldpk AS idmax FROM ".$table);
        $kd = ""; //kode awal
        if($q->num_rows()>0){ //jika data ada
            foreach($q->result() as $k){
                $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $kd = substr($tmp,6,4); //kode ambil 4 karakter terakhir
            }
        }else{ //jika data kosong diset ke kode awal
            $kd = "0001";
        }
        $tanggal=getdate();
        if ($table=='data_guru'){
        return $tanggal['year'].$this->session->userdata('id_sekolah').'1'.$kd;
    	}elseif($table=='data_staff'){
    		return $tanggal['year'].$this->session->userdata('id_sekolah').'2'.$kd;
    	}
   }

	function getkodeuniksiswa($table,$fieldpk) { 
        $q = $this->db->query("SELECT $fieldpk AS idmax FROM ".$table);
        $kd = ""; //kode awal
        if($q->num_rows()>0){ //jika data ada
            foreach($q->result() as $k){
                $tmp = ((int)$k->idmax)+1; //string kode diset ke integer dan ditambahkan 1 dari kode terakhir
                $kd = substr($tmp,6,4); //kode ambil 4 karakter terakhir
            }
        }else{ //jika data kosong diset ke kode awal
            $kd = "000001";
        }
        $tanggal=getdate();
        return $tanggal['year'].$this->session->userdata('id_sekolah').$kd;
    	
   }

    //Akuntansi
    public $jumlah_baris;
    public function getPeriode($start,$limit)
        {
            $q=$this->uri->segment(3);
            $this->db->select('*');
            $this->db->from('data_periode_akuntansi');
            if($q!="" && $q!="all" )
                {
                    $this->db->where('kode_periode',$q);
                }
            $this->db->limit($start,$limit);
            $query = $this->db->get();
            return $query->result();
        }   
    public function getPeriodeAktif()   
        {
            $sql_cek="SELECT * FROM data_periode_akuntansi WHERE status='Aktif' AND id_perusahaan=".$this->session->userdata('id_perusahaan');
            $data_cek=$this->db->query($sql_cek);
            return $this->db->query($sql_cek)->row_array(); 
        }
    public  function getByID($pk,$id,$tableheader)
        {
                $this->db->where($pk,$id);
                return $this->db->get($tableheader);
        }   
    public function getDetailTransaksi($pk,$tabledetail)
        {
            $header=$pk;
            $this->db->select($tabledetail.'.*,kepala_akun,klasifikasi_akun,kode_akun,nama_akun');
            $this->db->from($tabledetail);
            $this->db->join('data_akun a', 'coa=a.id','left');
            $this->db->where("header",$header);
            $this->db->order_by("debet","DESC");
            $this->db->order_by("kepala_akun");
            $query=$this->db->get();
            return $query->result();
        }   
    public function setSTE($header,$tableheader,$tabledetail)
        {
            $ste=1;
            //-------------------------------------------------------------------
            $sql    =   "SELECT SUM(debet) AS t_debet,SUM(kredit) AS t_kredit
                            FROM $tabledetail
                            WHERE header='$header'";
            $d=$this->db->query($sql)->row();
            if($d->t_debet+$d->t_kredit==0)
                {
                    $ste=2;
                    $sql    =   "UPDATE $tableheader SET ste='$ste'
                                    WHERE id='$header'";
                    $this->db->query($sql); 
                    return true;
                }
            if($d->t_debet!=$d->t_kredit)
                {
                    $ste=2;
                    $sql    =   "UPDATE $tableheader SET ste='$ste'
                                    WHERE id='$header'";
                    $this->db->query($sql);
                    return true;
                }
            $sql    =   "UPDATE $tableheader SET ste='$ste'
                            WHERE id='$header'";
            $this->db->query($sql);
            //-------------------------------------------------------------------
        }
}
?>