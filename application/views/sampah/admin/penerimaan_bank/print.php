<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laporan</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link href="<?=base_url('assets/backend');?>/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link href="<?=base_url('assets/backend');?>/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="window.print('landscape','A4');">
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
          <!-- info row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
                  <table class="table">
                    <tr>
                      <td width='10%' align='center'><?php //$image = $list->image;
                                                    /*if ($image) { */echo "<img src='"./*.base_url('assets/upload/siswa/'.$image).*/"' alt='User Image' width='100' height='150'>";/*}else{*/ /*echo "<a> Tidak Ada Foto </a>";*//*}*/ ?></td>
                      
                      <td width='90%' align='center'>
                          <strong>KOPERASI SERBA USAHA SYARIAH</strong><br>
                          <strong>BAITUL MAAL WAT TAMWIL</strong><br>
                          <strong>BAKTI NURUL HUDA</strong>
                      </td>
                    </tr>
                  </table>
            </div><!-- /.col -->
          </div><!-- /.row -->
          <style type="text/css">
          .table>thead>tr>th{
              vertical-align: middle;
          }
          .th1 {
              text-align: center;
          }
          .table1{
            text-align: center;;
          }
          .table>tbody>tr>td{
            padding: 2px;
          }
          </style>
          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>No Transaksi</th>
                    <th>Tanggal Transaksi</th>
                    <th colspan="2">Keterangan</th>
                    <th>Debet</th>
                    <th>Kredit</th>
                  </tr>
                </thead>
                <tbody>
                                <?php
                                $no=1;
                                foreach ($query->result() as $r){
                                  $cls="class='odd gradeX'";
                                  if($r->ste==2)
                                    {
                                      $cls="class='warning odd gradeX'";  
                                    }
                                ?>
                                <tr <?php echo $cls;?>>
                                  <td><strong><?php echo ($no++); ?></strong></td>
                                  <td><strong><?php echo $r->no_transaksi;?></strong></td>
                                  <td><strong><?php echo $r->tanggal_transaksi;?></strong></td>
                                  <td colspan="2"><strong><?php echo $r->keterangan;?></strong></td>
                                  <td align="center">&nbsp;</td>
                                  <td align="center">&nbsp;</td>
                                </tr>
                              <?php
                                $rincian=$this->db->query('SELECT '.$table2.'.*,kepala_akun,klasifikasi_akun,kode_akun,nama_akun FROM '.$table2.' LEFT JOIN data_akun b ON coa=b.id WHERE nama_transaksi="Kas & Bank" AND header='.$r->id);
                                foreach ($rincian->result_array() as $r2 ){
                              ?>
                                <tr <?php echo $cls;?>>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>&nbsp;</td>
                                  <td>(<?php echo $r2['kepala_akun'].'-'.$r2['klasifikasi_akun'].'-'.$r2['kode_akun'];?>)&nbsp;<?php echo $r2['nama_akun'];?></td>
                                  <td align="right"><?php echo number_format($r2['debet'],0,",",".");?></td>
                                  <td align="right"><?php echo number_format($r2['kredit'],0,",",".");?></td>
                                </tr>
                            <?php
                                }
                              }
                            ?>
                              <tr>
                                <td colspan="5">Total</td>
                                <td align="right"><?php $this->db->select_sum('debet');$query2 = $this->db->where('nama_transaks','Kas & Bank')->get($total_debet);foreach ($query2->result() as $r3 ){echo number_format($r3->debet,0,",",".");}?></td>
                                <td align="right"><?php $this->db->select_sum('kredit');$query3 = $this->db->where('nama_transaksi','Kas & Bank')->get($total_kredit);foreach ($query3->result() as $r4 ){echo number_format($r4->kredit,0,",",".");}?></td>
                                <td></td>
                              </tr>
                  </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->
          <!-- info row -->
          <div class="row">
            <div class="col-xs-4 table-responsive pull-right">
              <table class="table table-bordered table1">
                <thead>
                  <tr>
                    <th class="th1" width="20%">Membuat</th>
                    <th class="th1" width="20%">Memeriksa</th>
                    <th class="th1" width="20%">Mengetahui</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="odd gradeX">
                      <td><br/><br/><br/><br/><br/></td>
                      <td><br/><br/><br/><br/><br/></td>
                      <td><br/><br/><br/><br/><br/></td>
                  </tr>
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        <div class="clearfix"></div>
  </body>
</html>