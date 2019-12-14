<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="<?= base_url(); ?>assets/front/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?= base_url(); ?>assets/front/css/Ages-Traders.css" rel="stylesheet">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">  
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css">  
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/theme/dist/css/adminlte.min.css">  
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/theme/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link href="<?=base_url();?>assets/custom-style.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    
    
    <title>Ages-Traders</title>
</head>
<body>
    <!-- Header section starts here -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-4 padding">
                    <?php if (empty($this->sess)) { ?>
                        <a href="<?= base_url(); ?>">
                            <p><strong>Aegis</strong> Traders</p>
                        </a>
                    <?php } else { ?>
                        <a href="<?= base_url(); ?>userdashboard">
                            <p><strong>Aegis</strong> Traders</p>
                        </a>
                    <?php } ?>
                </div>
                <div class="col-md-8 padding">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <?php if (!empty($this->sess)) { ?>
                                    <li class="nav-item">
                                    <a class="nav-link" href="<?=base_url();?>userdashboard">Dashboard</a>
                                </li>
                                <?php } ?>
                                
                                <li class="nav-item active">
                                    <a class="nav-link PredictionsLink" href="#">Predictions <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Top Stocks</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Why Us</a>
                                </li>
                                

                                <!--  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
                            </ul>
                            <?php if (empty($this->sess)) { ?>
                                <?php if($this->uri->segment('1') == 'register'){ ?>
                                <a class="nav-link SignUPLink" href="<?=base_url();?>">SIGN IN</a>
                            <?php }else{ ?>
                                <a class="nav-link SignUPLink" href="#plans">SIGN UP</a>                            
                            <?php } }else{ ?>
                                <a class="nav-link SignUPLink" href="<?=base_url();?>logout">LOGOUT</a>
                            <?php } ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="clearfix"></div>
    <!-- Header section end here -->