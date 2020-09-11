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
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="1%">NO</th>
							<th>Nama Event</th>
                            <th>Nama Ujian</th>
                            <th>Jumlah Soal</th>
                            <th>Waktu</th>
                            <th>Nilai</th>
                            <th width="20%">Kerjakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        <?php foreach($query->result() as $row){ ?>
                        
                        <tr class="odd gradeX">
                            <td><?= $no;?></td>
                            <td><?=($row->nama_kursus);?></td>
                            <td><?=($row->nama_ujian);?></td>
                            <td><?=($row->jumlah_soal);?></td>
                            <td><?=($row->waktu.' Menit');?></td>
                            <td><?php  
                            $query2 = $this->db
                                  ->where('id_user', $this->session->userdata('id'))
                                  ->where('id_tes', $row->id)
                                  ->get('tr_ikut_ujian')
                                  ->row();
                                if (empty($query2)){
                                    echo "";
                                }else{
                                    echo $query2->nilai;
                                }?></td>
                            <td><?php 
                                if (empty($query2)){
                                    echo '<a class="btn btn-primary" name="view" href="'.base_url($linkview.$row->id).'"><i class="fa fa-pencil fa-fw"></i> Kerjakan</a>';
                                }else{
                                    if ($query2->status == 'n'){
                                        echo '<a class="btn btn-primary" name="view" href="'.base_url($linkview.$row->id).'"><i class="fa fa-pencil fa-fw"></i> Kerjakan</a>';
                                    }else{
                                        echo 'Sudah Dikerjakan';
                                    }
                                } ;?>
                                
                        </tr>
                    <?php $no++; }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>