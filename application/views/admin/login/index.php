<?php $profil=$this->model->profil()->row_array(); ?>
<html>
<head>
    <?php $this->load->view('admin/template/header');?>
</head>
<body style="background: lightblue" >


    <div class="row" style="padding: 50px 50px 50px 50px">

        <div class="col-md-4 col-md-offset-4" style="margin-top: 130px;margin-bottom: 130px">
<div class="box box-solid box-primary">
                <div class="box-header text-center">
                  <h3 class="box-title ">Login Sistem</h3>
                  
                </div>
                <div class="box-body text-center">
                  <img src="<?php echo base_url('assets/img/'.$profil['logo']);?>" height="130"  />
                
                <form action="<?php echo site_url('admin/login/sign_in');?>" method="post">
                    <div class="panel-body">
                        <?php $this->load->view('fm') ?>
                        <div style="margin-bottom: 25px; margin-top: 10px" class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div style="margin-bottom: 20px" class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="input-group" style="width: 100%">
                            <input type="submit" class="btn btn-primary" name="log" value="LOGIN" style="width:100%;">
                        </div>
                        
                    </div>
                </form>
            </div>
                </div><!-- /.box-body -->
              </div>
            
        </div>
    </div>


</body>
</html>