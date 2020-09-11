<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class="portlet box blue-hoki">
  <div class="portlet-title">
    <div class="caption">
      <i class="icon-settings"></i>
      <span class="caption-subject bold uppercase"><?="Data ".$judul ?></span>
    </div>
    <div class="tools"> </div>
  </div>
  <div class="portlet-body">
    <a type="button" class="btn btn-default" name="add" href="<?=base_url($link2);?>"><i class="fa fa-chevron-left fa-fw"></i>Kembali</a>
    <br/>
    <br/>
    <div class="tabbable tabbable-tabdrop">
      <ul class="nav nav-tabs">
        <li class="active">
          <a href="#tab1" data-toggle="tab">Semua</a>
        </li>
        <li>
          <a href="#tab2" data-toggle="tab">Penerimaan</a>
        </li>
        <li>
          <a href="#tab3" data-toggle="tab">Pengeluaran</a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab1">
          <a href="<?=base_url($linkprint);?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <br/>
          <br/>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th width="2%">No</th>
                <th width="10%">Tanggal</th>
                <th width="5%">ID</th>
                <th width="15%">Penerima / Pengirim</th>
                <th width="10%">Kode Akun</th>
                <th width="10%">Nama Akun</th> 
                <th width="10%">Debet</th>
                <th width="10%">Kredit</th>
                <th width="10%">Aksi</th>  
              </tr>
            </thead>
            <tbody>
              <?php
              $no=1;
              foreach ($query as $r)
              {
               $cls="class='odd gradeX'";
               if($r->ste==2)
               {
                 $cls="class='warning odd gradeX'";	
               }
               ?>
               <tr <?php echo $cls;?>>
                <td><strong><?php echo ($no++); ?></strong></td>
                <td><strong><?php echo $r->tanggal_transaksi;?></strong></td>
                <td><strong><?php echo $r->no_transaksi;?></strong></td>
                <td><strong><?php echo $r->nama_depan.' '.$r->nama_tengah.' '.$r->nama_belakang;?></strong></td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">
                  <a class="btn btn-info btn-sm" name="view" href="<?=base_url($linkview.$r->id);?>"><i class="fa fa-search fa-fw"></i></a>
                  <?php 
                  if ($r->jenis_transaksi=='penerimaan')
                  {
                    ?><a class="btn btn-success btn-sm"  title="Edit Akun" href="<?=base_url($linkupdatepenerimaan.$r->id);?>"><i class="glyphicon glyphicon-edit"></i></a>
                    <a class="btn btn-danger btn-sm" name="delete" href="<?=base_url($linkdeletepenerimaan.$r->id);?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fa fa-trash fa-fw"></i></a>
                    <?php
                  }else if($r->jenis_transaksi=='pengeluaran')
                  {
                    ?><a class="btn btn-success btn-sm"  title="Edit Akun" href="<?=base_url($linkupdatepengeluaran.$r->id);?>"><i class="glyphicon glyphicon-edit"></i></a>
                    <a class="btn btn-danger btn-sm" name="delete" href="<?=base_url($linkdeletepengeluaran.$r->id);?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fa fa-trash fa-fw"></i></a>
                    <?php
                  }else if($r->jenis_transaksi=='transfer_kas')
                  {
                    ?><a class="btn btn-success btn-sm"  title="Edit Akun" href="<?=base_url($linkupdatetransfer_kas.$r->id);?>"><i class="glyphicon glyphicon-edit"></i></a>
                    <a class="btn btn-danger btn-sm" name="delete" href="<?=base_url($linkdeletetransfer_kas.$r->id);?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fa fa-trash fa-fw"></i></a>
                    <?php
                  }
                  ?>
                </td>
              </tr>
              <?php
              $rincian=$this->db->query('SELECT p.*,kepala_akun,klasifikasi_akun,kode_akun,nama_akun FROM '.$table2.' p LEFT JOIN data_akun b ON p.coa=b.id WHERE header='.$r->id.' AND p.nama_transaksi="Kas & Bank"');
              foreach ($rincian->result_array() as $r2 ){
               ?>
               <tr <?php echo $cls;?>>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><?php echo $r2['kode_akun'];?>&nbsp;</td>
                <td><?php echo $r2['nama_akun'];?></td>
                <td align="right"><?php echo number_format($r2['debet'],0,",",".");?></td>
                <td align="right"><?php echo number_format($r2['kredit'],0,",",".");?></td>
                <td>&nbsp;</td>
              </tr>
              <?php
            }
          }
          ?>
          <tr>
            <td colspan="6" align="center"><strong>Saldo</strong></td>
            <td align="right"><strong><?php $this->db->select_sum('debet');$query2 = $this->db->where('id_perusahaan',$this->session->userdata('id_perusahaan'))->where('nama_transaksi','Kas & Bank')->get($table2);foreach ($query2->result() as $r3 ){echo number_format($r3->debet,0,",",".");}?></strong></td>
            <td align="right"><strong><?php $this->db->select_sum('kredit');$query3 = $this->db->where('id_perusahaan',$this->session->userdata('id_perusahaan'))->where('nama_transaksi','Kas & Bank')->get($table2);foreach ($query3->result() as $r4 ){echo number_format($r4->kredit,0,",",".");}?></strong></td>
            <td align="center">&nbsp;</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="tab-pane" id="tab2">
      <a href="<?=base_url($linkprintpenerimaan);?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
      <br/>
      <br/>
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th width="2%">No</th>
            <th width="10%">Tanggal</th>
            <th width="5%">ID</th>
            <th width="15%">Penerima / Pengirim</th>
            <th width="10%">Kode Akun</th>
            <th width="10%">Nama Akun</th> 
            <th width="10%">Debet</th>
            <th width="10%">Kredit</th> 
            <th width="10%">Aksi</th> 
          </tr>
        </thead>
        <tbody>
          <?php
          $no=1;
          foreach ($querypenerimaan as $r7)
          {
            $cls="class='odd gradeX'";
            if($r7->ste==2)
            {
              $cls="class='warning odd gradeX'";  
            }
            ?>
            <tr <?php echo $cls;?>>
              <td><strong><?php echo ($no++); ?></strong></td>
              <td><strong><?php echo $r7->tanggal_transaksi;?></strong></td>
              <td><strong><?php echo $r7->no_transaksi;?></strong></td>
              <td><strong><?php echo $r7->nama_depan.' '.$r7->nama_tengah.' '.$r7->nama_belakang;?></strong></td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">
                <a class="btn btn-info btn-sm" name="view" href="<?=base_url($linkviewpenerimaan.$r7->id);?>"><i class="fa fa-search fa-fw"></i></a>
                <a class="btn btn-success btn-sm"  title="Edit Akun" href="<?=base_url($linkupdatepenerimaan.$r7->id);?>"><i class="glyphicon glyphicon-edit"></i></a>
                <a class="btn btn-danger btn-sm" name="delete" href="<?=base_url($linkdeletepenerimaan.$r7->id);?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fa fa-trash fa-fw"></i></a>
              </td>
              </tr>
              <?php
              $rincian3=$this->db->query('SELECT p.*,kepala_akun,klasifikasi_akun,kode_akun,nama_akun FROM '.$table2.' p LEFT JOIN data_akun b ON p.coa=b.id WHERE header='.$r->id.' AND p.nama_transaksi="Kas & Bank"');
              foreach ($rincian3->result_array() as $r8 )
              {
                ?>
                <tr <?php echo $cls;?>>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><?php echo $r8['kode_akun'];?></td>
                  <td><?php echo $r8['nama_akun'];?></td>
                  <td align="right"><?php echo number_format($r8['debet'],0,",",".");?></td>
                  <td align="right"><?php echo number_format($r8['kredit'],0,",",".");?></td>
                  <td align="center">&nbsp;</td>
                </tr>
                <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
      <div class="tab-pane" id="tab3">
        <a href="<?=base_url($linkprintpengeluaran);?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        <br/>
        <br/>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th width="2%">No</th>
              <th width="10%">Tanggal</th>
              <th width="5%">ID</th>
              <th width="15%">Penerima / Pengirim</th>
              <th width="10%">Kode Akun</th>
              <th width="10%">Nama Akun</th> 
              <th width="10%">Debet</th>
              <th width="10%">Kredit</th> 
              <th width="10%">Aksi</th> 
            </tr>
          </thead>
          <tbody>
            <?php
            $no=1;
            foreach ($querypengeluaran as $r5){
              $cls="class='odd gradeX'";
              if($r5->ste==2)
              {
                $cls="class='warning odd gradeX'";  
              }
              ?>
              <tr <?php echo $cls;?>>
                <td><strong><?php echo ($no++); ?></strong></td>
                <td><strong><?php echo $r5->tanggal_transaksi;?></strong></td>
                <td><strong><?php echo $r5->no_transaksi;?></strong></td>
                <td><strong><?php echo $r5->nama_depan.' '.$r5->nama_tengah.' '.$r5->nama_belakang;?></strong></td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">
                  <a class="btn btn-info btn-sm" name="view" href="<?=base_url($linkviewpengeluaran.$r5->id);?>"><i class="fa fa-search fa-fw"></i></a>
                  <a class="btn btn-success btn-sm"  title="Edit Akun" href="<?=base_url($linkupdatepengeluaran.$r5->id);?>"><i class="glyphicon glyphicon-edit"></i></a>
                  <a class="btn btn-danger btn-sm" name="delete" href="<?=base_url($linkdeletepengeluaran.$r5->id);?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"><i class="fa fa-trash fa-fw"></i></a></td>
                </tr>
                <?php
                $rincian5=$this->db->query('SELECT p.*,kepala_akun,klasifikasi_akun,kode_akun,nama_akun FROM '.$table2.' p LEFT JOIN data_akun b ON p.coa=b.id WHERE header='.$r->id.' AND p.nama_transaksi="Kas & Bank"');
                foreach ($rincian5->result_array() as $r6 ){
                  ?>
                  <tr <?php echo $cls;?>>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><?php echo $r6['kode_akun'];?></td>
                    <td><?php echo $r6['nama_akun'];?></td>
                    <td align="right"><?php echo number_format($r6['debet'],0,",",".");?></td>
                    <td align="right"><?php echo number_format($r6['kredit'],0,",",".");?></td>
                    <td align="center">&nbsp;</td>
                  </tr>
                  <?php
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>