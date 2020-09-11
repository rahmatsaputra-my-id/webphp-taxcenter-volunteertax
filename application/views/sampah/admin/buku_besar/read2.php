                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet box blue-hoki">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-settings"></i>
                                        <span class="caption-subject bold uppercase"><?="Data ".$judul;?></span>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body table-both-scroll">
                                    <a type="button" class="btn btn-default" name="add" href="<?=base_url($link2);?>"><i class="fa fa-chevron-left fa-fw"></i>Kembali</a>
                                    <br/>
                                    <h4 align='center'><?php $query2=$this->db->query('SELECT * FROM data_akun WHERE id='.$pk); 
                                        foreach ($query2->result() as $row) {
                                            echo $row->nama_akun;
                                        }
                                    ?></h4>
                                    <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_">
                                        <thead>
                                            <tr>
                                                <th width="2%">No</th>
                                                <th width="18%">Nama Transaksi</th>
                                                <th width="40%">Catatan</th>
                                                <th width="10%">Departemen</th>
                                                <th width="15%">Debet</th>
                                                <th width="15%">Kredit</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th width="2%"></th>
                                                <th width="18%">Saldo Awal</th>
                                                <th width="40%">:&nbsp; <?php $query4 = $this->db->where('id',$pk)->get($table2);foreach ($query4->result() as $r5 ){echo number_format($saldo_awal=$r5->saldo_awal,0,",",".");}?></strong> </th>
                                                <th width="10%">Jumlah :</th>
                                                <th width="15%"><?php $this->db->select_sum('debet');$query2 = $this->db->where('coa',$pk)->get($table);foreach ($query2->result() as $r3 ){echo number_format($debet=$r3->debet,0,",",".");}?></strong></th>
                                                <th width="15%"><?php $this->db->select_sum('kredit');$query3 = $this->db->where('coa',$pk)->get($table);foreach ($query3->result() as $r4 ){echo number_format($kredit=$r4->kredit,0,",",".");}?></strong></th>
                                            </tr>
                                            <tr>
                                                <th width="2%"></th>
                                                <th width="18%">Saldo Akhir</th>
                                                <th width="40%">:&nbsp;<?php $query5 = $this->db->where('id',$pk)->get($table2);
                                                foreach ($query5->result() as $r6 ){ $saldo_normal=$r6->saldo_normal; }
                                                if ($saldo_normal == 'Debet'){
                                                    $mutasi=$debet-$kredit;
                                                }else{
                                                    $mutasi=$kredit-$debet;
                                                }
                                                $saldo_akhir=$saldo_awal+$mutasi;echo number_format($saldo_akhir,0,",",".");?></th>
                                                <th width="10%" style="text-align:'right';">Mutasi :</th>
                                                <th width="15%"><?php 
                                                echo number_format($mutasi,0,",",".");
                                                ?></th>
                                                <th width="15%"></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php $no=1; ?>
                                                <?php                                                 
                                                foreach ($query->result() as $row2) {

                                                    $query3 = $this->db->query('SELECT * FROM '.$row2->nama_tabel.' WHERE id='.$row2->header);
                                                    foreach ($query3->result() as $row3) {
                                                    ?>
                                                
                                                <tr class="odd gradeX">
                                                    <td><?=$no;?></td>
                                                    <td><?=($row2->nama_transaksi.'; '.$row3->no_transaksi);?></td>
                                                    <td><?=($row3->keterangan);?></td>
                                                    <td><?php //=($row2->debet);?></td>
                                                    <td><?=($row2->debet);?></td>
                                                    <td><?=($row2->kredit);?></td>
                                                </tr>
                                            <?php $no++; }
                                        }?>
                                                
                                        </tbody>
                                    </table>
                                </div>
                            </div>
<script type="text/javascript">

$(function(){

$.ajaxSetup({
    type:"post",
    cache:false,
    dataType: "json"
})


$(document).on("click","td",function(){
$(this).find("span[class~='caption']").hide();
$(this).find("input[class~='editor']").fadeIn().focus();
});

$(document).on("keydown",".editor",function(e){
if(e.keyCode==13){
var target=$(e.target);
var value=target.val();
var id=target.attr("data-id");
var data={id:id,value:value};
if(target.is(".field-saldo-awal")){
data.modul="saldo_awal";
}

$.ajax({
    data:data,
    url:"<?php echo base_url('home/updatenama_akun2');?>",
    success: function(a){
     target.hide();
     target.siblings("span[class~='caption']").html(value).fadeIn();
    }

})

}

});

});

</script>
<style type="text/css">

td {
    cursor: pointer;
}

.editor{
    display: none;
}

</style>
