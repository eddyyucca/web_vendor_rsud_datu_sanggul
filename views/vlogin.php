<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="SIMRS Website Resmi Rumah Sakit">
        <meta name="keywords" content="website rumah sakit, rumah sakit, rsud, datadigital, dma" />
        <meta name="author" content="PT. Data Mustika Abadi">

        <title><?php echo isset($rs->rsakronim) ? $rs->rsakronim : ' '; ?></title>

        <link rel="shortcut icon" href="<?php echo base_url('asset/img/icon.ico'); ?>">
        <link href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('asset/css/font-awesome.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('asset/css/style.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('asset/css/color.css'); ?>">
        
        <link href="https://fonts.googleapis.com/css?family=Asul:400,700" rel="stylesheet"> 
    </head>
    <body class="<?php echo $rs->rscolor; ?>">    
        <div class="container" id="outer">
            <div id="middle">
                <div id="inner">
                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-8">
                            <div class="transparentbox" style="background: rgba(44, 62, 80, 0.3);">
                                <div class="row logo text-uppercase mt1">
                                    <div class="col-sm-3">
                                        <?php echo isset($rs->rslogo1) ? '<img src="' . base_url('asset/img/' . $rs->rslogo1) . '" alt="" data-animation="animated bounceInDown" class="img-responsive center-block">' : ' '; ?>
                                    </div>
                                    <div class="col-sm-9 small">
                                        <p data-animation="animated lightSpeedIn" style="margin-bottom: 0;" class="color-white"><?php echo isset($rs->rstype2) ? $rs->rstype2 : ' '; ?></p>  
                                        <h1 data-animation="animated bounceInDown" class="color-white"><span data-letter="<?php echo isset($rs->rsname) ? $rs->rsname : ' '; ?>"><?php echo isset($rs->rsname) ? $rs->rsname : ' '; ?></span></h1>
                                        <p data-animation="animated lightSpeedIn" class="color-white"><?php echo isset($rs->rsregion) ? $rs->rsregion : ' '; ?></p>  
                                    </div>
                                </div>
                                <hr>
                                <div class="pad10">
                                    <?php
                                    $message = $this->session->flashdata('logmsg');
                                    echo $message == '' ? '' : $message;
                                    ?>
                                </div>
                                <div class="row">
                                    <div class="col-sm-offset-3 col-sm-6">                                        
                                        <form role="form" method="post" action="<?php echo $action; ?>" class="mt1">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-user color-midnightblue"></i></span>
                                                    <?php
                                                    $un = array('name' => 'un', 'id' => 'un', 'value' => set_value('un'), 'autocomplete' => 'off', 'class' => 'form-control input-sm', 'placeholder' => 'username');
                                                    echo form_input($un);
                                                    ?>                            
                                                </div>
                                                <?php echo form_error('un', '<span class="help-box text-danger"><strong class="small">', '</strong></span>'); ?>
                                            </div>
                                            <div class="form-group">   
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-lock color-midnightblue"></i></span>
                                                    <?php
                                                    $pwd = array('name' => 'pwd', 'id' => 'pwd', 'value' => set_value('pwd'), 'autocomplete' => 'off', 'class' => 'form-control input-sm', 'placeholder' => 'password');
                                                    echo form_password($pwd);
                                                    ?>
                                                </div>          
                                                <?php echo form_error('pwd', '<span class="help-box text-danger"><strong class="small">', '</strong></span>'); ?>
                                            </div>
                                            <div class="form-actions mb1">  
                                                <button type="submit" name="submit" class="btn2 bg-emerald color-white btn-xs btn-block shadow center-block">SIGN IN <i class="fa fa-sign-in"></i></button> 
                                            </div>
                                        </form>
                                    </div>
                                </div><hr><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?php echo base_url('asset/js/jquery-2.1.4.min.js'); ?>"></script>
        <script src="<?php echo base_url('asset/js/jquery-ui.min.js'); ?>"></script>        
        <script src="<?php echo base_url('asset/js/bootstrap.min.js'); ?>"></script>
    </body>
</html>