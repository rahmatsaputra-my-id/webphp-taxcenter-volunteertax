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
              <table class="table table-bordered table1">
                <thead>
                  <tr>
                    <th class="th1">No.</th>
                    <th class="th1">No. KTA</th>
                    <th class="th1">Nama</th>
                    <th class="th1">Tipe Identitas</th>
                    <th class="th1">No Identitas</th>
                    <th class="th1">Jenis Kelamin</th>
                    <th class="th1">Alamat</th>
                    <th class="th1">Tempat Tanggal Lahir</th>
                    <th class="th1">No Telepon</th>
                    <th class="th1">Status</th>
                    <th class="th1">Pekerjaan</th>
                    <th class="th1">Tanggal Masuk</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; 
                  $query = $this->db->get('data_karyawan');
                  foreach($query->result() as $row){ ?>
                  
                  <tr class="odd gradeX">
                      <td><?= $no;?></td>
                      <td><?=($row->no_kta);?></td>
                      <td><?=($row->nama_depan.' '.$row->nama_tengah.' '.$row->nama_belakang);?></td>
                      <td><?=($row->tipe_identitas);?></td>
                      <td><?=($row->no_identitas);?></td>
                      <td><?=($row->jenis_kelamin);?></td>
                      <td><?=($row->alamat.', jalan '.$row->jalan.', kota '.$row->kota.', Kode Pos '.$row->kode_pos);?></td>
                      <td><?=($row->tempat_lahir.', '.$row->tanggal_lahir);?></td>
                      <td><?=($row->no_telepon);?></td>
                      <td><?=($row->status);?></td>
                      <td><?=($row->pekerjaan);?></td>
                      <td><?=($row->tanggal_masuk);?></td>
                  </tr>
                  <?php $no++; }?>
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