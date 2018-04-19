<ol class="breadcrumb">
    <li> Newsletter</li>
    <li class="active"></i> Newsletter Management</li>
</ol>
<input type="button" class="btn btn-primary btn-xs" style="margin-bottom: 5px;" value="Newsletter List" onclick="window.location.replace('<?=base_url();?>newsletter');" />
<input type="button" class="btn btn-primary btn-xs" style="margin-bottom: 5px;" value="Email List" disabled/>
<div class="panel panel-default">
    <div class="panel-heading">Newsletter</div>
        <div class="panel-body">
            <div style="margin-bottom: 5px;">
                <input type="button" class="btn btn-primary btn-xs" value=" + New" id="new" />
                    <form method="post" action="<?=base_url();?>newsletter/search" id="form2"/>
                        <select style="float: right;width: 50px;margin-top: -19px;" name="page_sr" onchange="coba('form2');"/>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </form>
            </div>
            <i>
                Total Data: <?=$total_data;?>
            </i>
            <div class="table-responsive" style="font-size: 12px;">
                <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                        <tr>
                            <th>Email <i class="fa fa-sort"></i></th>
                            <th>Subscribe Date <i class="fa fa-sort"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                      if(count($data)<1){
                          echo"<td colspan='10' align='center'>Data Not Found</td>";
                      }else{
                      $no=0;
                      foreach($data as $data){
                          $id_cat=$data->id;
                          $no++;
                    ?>
                        <tr>
                            <td><?php echo $data->email; ?></td>
                            <td><?php echo $data->subscribe_date; ?></td>
                        </tr>
                      <?php }} ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <form method="post" action="<?=base_url();?>newsletter/search_mail_list" id="form1"/>
                                
                                <td><input name="email_sr" class="form-control" value="<?=$email_sr;?>" style="width: 100%;" type="text" onkeyup="javascript:if(event.keyCode == 13){coba('form1');}else{return false;};"/></td>
                                <td><input name="date_sr" class="form-control" value="<?=$date_sr;?>" style="width: 100%;" type="text" onkeyup="javascript:if(event.keyCode == 13){coba('form1');}else{return false;};"/></td>
                            </form>
                        </tr>
                    </tfoot>
                </table>
                <div class="pagination"><?=$halaman;?></div>
            </div>
        </div>
    </div>
<!--end attribute form-->
<?php $this->load->view('combobox_autocomplete');?>
<script type="text/javascript">
    $(document).ready(function (){
        $("#new").click(function(){
           window.location.replace("<?php echo base_url(); ?>newsletter/add");
        });
        });
        function indexx(){
        window.location.replace("<?php echo base_url(); ?>newsletter");
        }
        function updatex(id){
        window.location.replace("<?php echo base_url(); ?>newsletter/update/"+id+"/<?=($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;?>");
        }
         function deletex(id){
               if(confirm('Delete this record?')){
               window.location.replace("<?php echo base_url(); ?>newsletter/delete/"+id+"/<?=($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;?>");
                }else{

                }
            }
        function coba(tables){
            //alert("valuenya "+id+" fieldnya "+tables);
            document.getElementById(tables).submit();
        }
        function send_mail(id){
            if(confirm('Sure Send This Newsletter ?')){
                $.ajax({
                    type: 'post',
                    url: '<?= base_url(); ?>newsletter/send_email',
                    data: {id_news:id},
                    cache: false,
                    success: function (data) {
                        window.location.replace('<?=base_url();?>newsletter/search/<?=($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;?>');
                    }
                });
            }
        }
</script>