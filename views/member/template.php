<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Website Resmi RSUD Datu Sanggul Rantau">
        <meta name="author" content="PT. Data Mustika Abadi www.datadigital.co.id">
        <meta name="keywords" content="Rumah Sakit, Rumah Sakit Umum Daerah, RSUD Datu Sanggul, Rantau, Tapin," />
        <base href="<?php echo base_url(); ?>" id="my">

        <title><?php echo isset($rs->rsakronim) ? $rs->rsakronim : ' '; ?></title>

        <link rel="shortcut icon" href="<?php echo base_url('asset/img/icon.ico'); ?>"> 
        <link href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('asset/css/font-awesome.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('asset/css/dataTables.bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('asset/css/select2.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('asset/css/datepicker3.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap3-wysihtml5.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('asset/css/style.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('asset/css/color.css'); ?>">
        
        <link href="https://fonts.googleapis.com/css?family=Asul:400,700" rel="stylesheet">   
    </head>
    <body class="<?php echo $rs->rscolor;?>">
        <header role="banner" id="myheader">
            <nav class="navbar navbar-default shadow" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <a href="#" class="js-mynavbar-nav-toggle mynavbar-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
                        <a class="navbar-brand" href="<?php echo base_url(); ?>"><strong><?php echo isset($rs->rsakronim) ? $rs->rsakronim : ' '; ?></strong></a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="nav navbar-nav navbar-right">
                            <?php
                            $s = '<li class="dropdown">' .
                                    '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> ' . $this->auth->get_un() . ' <span class="caret"></span></a>' .
                                    '<ul class="dropdown-menu">' .
                                    '<li><a href="' . base_url('inside/user/change') . '"><i class="fa fa-lock"></i> change password</a></a></li>' .
                                    '<li><a href="' . base_url('inside/user/logout') . '"><i class="fa fa-sign-out"></i> sign out</a></a></li>' .
                                    '</ul></li>';

                            $menu = array('home' => '<i class="fa fa-home"></i> Home',
                                'member/user' => $s);
                            foreach ($menu as $k => $m) {
                                echo $m == $s ? $s : '<li><a href="' . base_url($k) . '">' . $m . '</a></li>';
                            }
                            ?> 
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container mt4">
            <div class="row">
                <div class="col-sm-12 pad5">
                    <div class="row logo text-uppercase mb1">
                        <div class="col-sm-2 text-center">
                            <?php echo isset($rs->rslogo1) ? '<img src="' . base_url('asset/img/' . $rs->rslogo1) . '" alt="" data-animation="animated bounceInDown">' : ' '; ?>
                        </div>
                        <div class="col-sm-10 small">
                            <p data-animation="animated lightSpeedIn" style="margin-bottom: 0;" class="color-white"><?php echo isset($rs->rstype2) ? $rs->rstype2 : ' '; ?></p>  
                            <h1 data-animation="animated bounceInDown" class="color-white"><span data-letter="<?php echo isset($rs->rsname) ? $rs->rsname : ' '; ?>"><?php echo isset($rs->rsname) ? $rs->rsname : ' '; ?></span></h1>
                            <p data-animation="animated lightSpeedIn" class="color-white"><?php echo isset($rs->rsregion) ? $rs->rsregion : ' '; ?></p>  
                        </div>
                    </div>
                </div>
                <div class="col-sm-12pad5">
                    <?php $this->load->view($main); ?>
                </div>
                <div class="col-sm-12">
                    <p class="text-center color-clouds" style="margin-bottom: 0;font-size: 0.8em;">&COPY; SIMRS - iHOS 2016 by <a href="http://datadigital.co.id/" class="color-white">datadigital.co.id</a>. All Rights Reserved.</p>
                </div>
            </div>
        </div>

        <script src="<?php echo base_url('asset/js/jquery-2.1.4.min.js'); ?>"></script>
        <script src="<?php echo base_url('asset/js/jquery-ui.min.js'); ?>"></script>        
        <script src="<?php echo base_url('asset/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('asset/js/jquery.dataTables.min.js'); ?>"></script>
        <script src="<?php echo base_url('asset/js/dataTables.bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('asset/js/select2.min.js'); ?>"></script>
        <script src="<?php echo base_url('asset/js/bootstrap-datepicker.js'); ?>"></script>
        <script src="<?php echo base_url('asset/js/bootstrap-datepicker.id.js'); ?>"></script>
        <script src="<?php echo base_url('asset/js/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
        <script src="<?php echo base_url('asset/js/my.js'); ?>" type="text/javascript"></script>
        <?php $jsadd == '' ? '' : $this->load->view($jsadd); ?>
    </body>
</html>