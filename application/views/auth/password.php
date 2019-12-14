<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Trades | Log in</title>  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/theme/plugins/fontawesome-free/css/all.min.css">  
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">  
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css">  
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/theme/dist/css/adminlte.min.css">  
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<?php if($this->session->userdata('trade_session')){
		redirect("admin","");
	} 

$urlEmail = $this->uri->segment('3');
$urlCode = $this->uri->segment('4');
	?>

<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url();?>/assets/theme/index2.html"><b>Trading</b></a>
  </div>
  
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><b>Change Password</b></p>
	  <form action="<?=base_url();?>auth/password/<?=$urlEmail;?>/<?=$urlCode;?>" method="post">
		<?php if($this->session->flashdata('message')) { ?>
			<div class="alets-pop">	
				<div class="alert alert-<?=$this->session->flashdata('type');?>">
					<strong><?=ucfirst($this->session->flashdata('type'));?>!</strong> <?=$this->session->flashdata('message');?>
				</div>
			</div>
		<?php } ?>
		
		<?php if(validation_errors()) { ?>
			<div class="alets-pop">	
				<div class="alert alert-danger">
					<strong>Error!</strong> <?php echo validation_errors();?>
				</div>
			</div>
		<?php } ?>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="New Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
         
          <div class="col-4">
            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Update">			
          </div>
          
        </div>
      </form>
      <div class="social-auth-links text-center mb-3">
        
      </div>
     
    </div>
  </div>
</div>
<script src="<?php echo base_url();?>/assets/theme/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>/assets/theme/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>/assets/theme/dist/js/adminlte.min.js"></script>
</body>
</html>
