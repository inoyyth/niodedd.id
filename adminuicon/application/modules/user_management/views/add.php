<ol class="breadcrumb">
    <li> User Management</li>
    <li class="active"> List User Management<li>
</ol>
<form method="post" action="<?=base_url();?>user_management/add_proses" enctype="multipart/form-data" >
<div style="margin-bottom: 5px;text-align: right;">
    <input type="submit" class="btn btn-primary" value="Save" /> <input type="button" onclick="window.location.replace('<?php echo base_url(); ?>user_management');" class="btn btn-danger" value="Cancel" />
</div>
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title"> Add New User </h3>
    </div>
    <div class="panel-body" id="panelx">
        <div class="row" style="font-size: 12px;">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" name="username" required>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label>First Name</label>
                    <input class="form-control" name="first_name" required>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Last Name</label>
                    <input class="form-control" name="last_name" required>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" required>
                        <option value="Y">Active</option>
                        <option value="N">Not Active</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<?php $this->load->view('combobox_autocomplete');?>
<?php $this->load->view('tinyfck');?>
<script type="text/javascript">
function TampilModel(file){
window.open(file,'_blank','toolbar=no,scrollbars=yes,statusbar=yes,height=485,width=520').focus();
}
</script>
