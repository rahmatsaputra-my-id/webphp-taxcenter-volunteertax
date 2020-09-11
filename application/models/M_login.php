<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class m_login extends CI_Model {

    //untuk login admin dan menyimpan sesi untuk admin
    function cek_login($username, $password, $link) {
	$query 		= $this->db->query("SELECT * FROM user WHERE npm='$username' AND password='$password'");
	$query2		= $this->db->query("SELECT * FROM user WHERE npm='$username' AND password='$password' AND status='1' ");
	$query4 	= $this->db->query("SELECT * FROM user WHERE npm='$username'");
		if ($query4->num_rows() > 0){
			$row 		= $query->row();
			//$id_tabel  	= $row->id_tabel;
			$numrows	= $query->num_rows();
			if ($numrows === 1) {
				if($query2->num_rows() > 0){
					if ($row->level == "Mahasiswa"){
						$id_tabel  	= $row->id_tabel;
						$query3 = $this->db->query("SELECT * FROM data_register WHERE id=$id_tabel");
						$row2 		= $query3->row();
							$sess_array = array();
							$sess_array = array(
								'id'        		=> $row2->id,
								'nama'				=> $row2->nama_lengkap.$row2->nama_depan.' '.$row2->nama_belakang,
								'logged_in' 		=> true,
								'id_tabel'			=> $row->id_tabel,
								'level'     		=> $row->level,
								'id_user'      		=> $row->id
								);
							$this->session->set_userdata($sess_array);
							$status = array('status' => true);
							redirect($link);
					}else if ($row->level == "Super Admin"){
						$sess_array = array();
						$sess_array = array(
							'id'        		=> $row->id,
							'nama'				=> $row->level, 
							'logged_in' 		=> true,
							'id_tabel'			=> $row->id_tabel,
							'level'     		=> $row->level
							);
						$this->session->set_userdata($sess_array);
						$status = array('status' => true);
						redirect($link);
					}else if ($row->level == "Admin"){
						$sess_array = array();
						$sess_array = array(
							'id'        		=> $row->id,
							'nama'				=> $row->level, 
							'logged_in' 		=> true,
							'id_tabel'			=> $row->id_tabel,
							'level'     		=> $row->level
							);
						$this->session->set_userdata($sess_array);
						$status = array('status' => true);
						redirect($link);
					}else if ($row->level == "Pengajar"){
						$query4 = $this->db->query("SELECT * FROM data_pengajar WHERE id=$id_tabel");
						$row3 		= $query4->row();
						$sess_array = array(
							'id'        		=> $row3->id,
							'nama'				=> $row3->nama_depan.' '.$row3->nama_belakang, 
							'logged_in' 		=> true,
							'id_tabel'			=> $row->id_tabel,
							'level'     		=> $row->level
							);
						$this->session->set_userdata($sess_array);
						$status = array('status' => true);
						redirect($link);
					}
				}else{
					$this->session->set_flashdata('message', '<p style="text-align:center;">Anda Belum Melakukan Pembayaran</p>');
					redirect($link.'/index/login');
				}
			}else{
				$this->session->set_flashdata('message', '<p style="text-align:center;">Email atau Password Salah</p>');
				redirect($link.'/index/login');
			}
		}else{
			$this->session->set_flashdata('message', '<p style="text-align:center;">Anda Belum terdaftar di kursus ini, silahkan daftar dengan mengisi form di bawah ini.</p>');
				redirect($link.'/index/login');
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

    public function create($table,$data) 
    {
        return $this->db->insert($table,$data); 
    }
    
    public function update($table,$fieldpk,$pk,$data)
    {
        $this->db->where($fieldpk,$pk);
        $this->db->update($table,$data);
    }

}
