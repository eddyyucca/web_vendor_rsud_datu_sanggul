<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--<iframe src="http://rsud.tapinkab.go.id" style="height: 100%;width: 100%; border:none; overflow: hidden; "></iframe>-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="Website Resmi RSUD Datu Sanggul Rantau">
        <meta name="author" content="PT. Data Mustika Abadi www.datadigital.co.id">
        <meta name="keywords" content="RSUDDS, Rumah Sakit Umum Daerah, RSUD Datu Sanggul, Rantau, Tapin, RSUD, Kabupaten Tapin, Kalimantan Selatan, Datu Sanggul, Kesehatan, Pelayanan, Dokter, Maburai, Murung Pudak" />
        <meta content='Indonesia' name='geo.placename'/>
        <base href="<?php echo base_url($nav); ?>" id="my">
        <title><?php echo isset($rs->rsakronim) ? $rs->rsakronim : ' '; ?></title>

        <link rel="shortcut icon" href="<?php echo base_url('asset/img/icon.ico'); ?>"> 
        <link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('asset/css/font-awesome.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('asset/css/dataTables.bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('asset/css/datepicker3.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('asset/css/select2.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('asset/css/style.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('asset/css/color.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('asset/css/animate.min.css'); ?>"> 
<!--        <link rel="stylesheet" href="<?php echo base_url('asset/css/AdminLTE.css'); ?>">-->
        <link rel="stylesheet" href="<?php echo base_url('asset/css/ionicons.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('asset/css/ionicons.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('asset/css/font-awesome.min.css'); ?>">     

        <link href="https://fonts.googleapis.com/css?family=Asul:400,700" rel="stylesheet"> 

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->        
    </head>
<!--    <FRAMESET border=0 rows="100%,*" frameborder="no" marginleft=0 margintop=0 marginright=0 marginbottom=0>
    <frame src="http://dmads.ddns.net link" scrolling=auto frameborder="no" border=0 noresize>
    <frame topmargin="0" marginwidth=0 scrolling=no marginheight=0 frameborder="no" border=0 noresize>
    </FRAMESET>    -->
    <body> 
<!--        <iframe src="http://rsud.tapinkab.go.id" style="height: 100%;width: 100%; border: none; overflow: hidden; "></iframe>-->
        <?php $this->load->view('template_nav'); ?>
        <?php if ($main !== 'vhome') { ?>
            <div class="<?php echo $rs->rscolor; ?>">
                <div class="container pad40">
                    <?php $this->load->view('template_quo'); ?>
                </div>
            </div>
            <div class="bg2">
                <div class="container">
                    <div class="color-black mt1 mb1">
                        <blockquote>
                            <?php if (!empty($qts)) { ?>
                                <div class="carousel slide" data-ride="carousel" data-interval="8000" id="quote-carousel">
                                    <ol class="carousel-indicators">
                                        <?php
                                        foreach ($qts as $i => $row) {
                                            echo $i == 0 ? '<li data-target="#quote-carousel" data-slide-to="' . ($i + 1) . '" class="active"></li>' : '<li data-target="#quote-carousel" data-slide-to="' . ($i + 1) . '"></li>';
                                        }
                                        ?>
                                    </ol>
                                    <div class="carousel-inner">  
                                        <?php
                                        foreach ($qts as $i => $row) {
                                            echo $i == 0 ? '<div class="item active"><em>' . $row->quotes . '</em></div>' : '<div class="item">' .
                                                    '<em>' . $row->quotes . '</em></div>';
                                        }
                                        ?>
                                    </div>
                                </div>  
                            <?php } ?>  
                        </blockquote> 
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="row mt2">
                            <div class="col-sm-4">
                                <div class="box color-pomegranate bg-white border-pomegranate">
                                    <div class="icon icon-top color-pomegranate bg-white"><span><i class="fa fa-ambulance"></i></span></div>
                                    <h5><strong>GAWAT DARURAT</strong>&nbsp;&nbsp; <?php echo isset($rs->rsphonegd) ? $rs->rsphonegd : ' '; ?></h5>
                                </div>
                            </div> 
                            <div class="col-sm-4">
                                <div class="box color-pomegranate bg-white border-pomegranate">
                                    <div class="icon icon-top color-pomegranate bg-white"><span><i class="fa fa-volume-control-phone"></i></span></div>
                                    <h5 ><strong>CALL CENTER</strong>&nbsp;&nbsp;  <?php echo isset($rs->rscall) ? $rs->rscall : ' '; ?></h5>
                                </div>
                            </div>  
                            <div class="col-sm-4">
                                <div class="box color-pomegranate bg-white border-pomegranate">
                                    <div class="icon icon-top color-pomegranate bg-white"><span><i class="fa fa-envelope-open-o"></i></span></div>
                                    <h5><strong>SMS CENTER</strong>&nbsp;&nbsp;  <?php echo isset($rs->rssms) ? $rs->rssms : ' '; ?></h5>
                                </div>
                            </div>  
                        </div>
                        <?php $this->load->view('main/' . $main); ?>
                    </div>
                    <div class="col-sm-3">
                        <?php $this->load->view('template_side'); ?>
                    </div>
                </div>
            </div>        
            <?php
        } else {
            $this->load->view('main/' . $main);
        }
        ?>
        <footer class="footer">
            <div class="container">
                <div class="row mt2">
                    <div class="col-sm-5">
                        <p class="ttl"><?php echo isset($rs->rstype) ? $rs->rstype : ' '; ?> <span><?php echo isset($rs->rsname) ? $rs->rsname : ' '; ?></span></p>
                        <p><?php echo isset($rs->rsaddress) ? $rs->rsaddress : '' ?></p>
                        <p><?php echo isset($rs->rsphone) ? '<i class="fa fa-phone-square"></i> ' . $rs->rsphone : ' '; ?> &nbsp;&nbsp; <?php echo isset($rs->rsfax) ? '<i class="fa fa-fax"></i> ' . $rs->rsfax : ' '; ?></p>
                        <p><?php echo isset($rs->rsmail) ? '<i class="fa fa-envelope"></i> ' . $rs->rsmail : ' '; ?></p>
                        <p><?php echo isset($rs->rssms) ? '<i class="fa fa-envelope-o"></i> ' . $rs->rssms : ' '; ?></p>
                    </div>
                    <div class="col-sm-4">
                        <div class="box color-white bg-none border-yellow">
                            <h5><strong>WAKTU KUNJUNGAN BESUK</strong></h5>    
                            <table class="table table-condensed small">
                                <tr>
                                    <td>PAGI</td><td>:</td><td>11.00 – 13.00 WITA</td>
                                </tr>
                                <tr>                   
                                    <td>MALAM</td><td>:</td><td>16.30 – 20.00 WITA</td>
                                </tr>
                                <tr>
                                    <td colspan="3">HARI MINGGU & LIBUR</td>
                                </tr>
                                <tr>
                                    <td>PAGI</td><td>:</td><td>10.00 – 14.00 WITA</td>
                                </tr>
                                <tr>                   
                                    <td>MALAM</td><td>:</td><td>16.30 – 20.00 WITA</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-3" id="footright">
                        <p class="ttl"><span>SITE</span> MAPS</p>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6"><ul class="list-unstyled small">
                                    <?php
                                    $menu = array('home' => 'Home',
                                        'profile' => 'Profile',
                                        'layanan' => 'Layanan',
                                        'berita' => 'Berita',
                                        'contact' => 'Hubungi Kami');
                                    foreach ($menu as $k => $m) {
                                        ?>
                                        <li class="<?php echo ($nav == $k ? 'active' : '') ?>"><a href="<?php echo base_url($k); ?>"><?php echo $m; ?></a></li>
                                    <?php } ?> 
                                </ul>                                
                            </div>
                            <div class="col-xs-6 col-sm-6">
                                <ul class="list-unstyled small">
                                    <?php
                                    $menu = array(
                                        'infodokter' => 'Info Dokter',
                                        'infodokter' => 'Info Kamar',
                                        'infojadwal' => 'Jadwal Poliklinik',
                                        'pengumuman' => 'Pengumuman',
                                        'galeri' => 'Galeri',
                                        'pendaftaran' => 'Pendaftaran Rawat Jalan');
                                    foreach ($menu as $k => $m) {
                                        ?>
                                        <li class="<?php echo ($nav == $k ? 'active' : '') ?>"><a href="<?php echo base_url($k); ?>"><?php echo $m; ?></a></li>
                                    <?php } ?> 
                                </ul>                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <p class="color-clouds" id="footright" style="margin-bottom: 0;font-size: 0.7em;">&COPY; SIMRS - iHOS 2018 by <a href="http://datadigital.co.id/" class="color-white">datadigital.co.id</a>. All Rights Reserved.</p>
                        <p class="color-clouds" id="footright" style="margin-bottom: 0;font-size: 0.8em;">Support by <a href="http://mediacenter.tapinkab.go.id/" class="color-white"> Diskominfo - Kab.Tapin</p>
                    </div>
                </div>
            </div>
        </footer>
        <script src="<?php echo base_url('asset/js/jquery-2.1.4.min.js'); ?>"></script> 
        <script src="<?php echo base_url('asset/js/jquery.easing.1.3.js'); ?>"></script>
        <script src="<?php echo base_url('asset/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('asset/js/jquery.dataTables.min.js'); ?>"></script>
        <script src="<?php echo base_url('asset/js/dataTables.bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('asset/js/bootstrap-datepicker.js'); ?>"></script>
        <script src="<?php echo base_url('asset/js/bootstrap-datepicker.id.js'); ?>"></script>
        <script src="<?php echo base_url('asset/js/select2.min.js'); ?>"></script>
        <script src="<?php echo base_url('asset/js/my.js'); ?>"></script>

        <script>
            $(document).ready(function () {
                //                var time = new Date().getTime();
                //                var base_url = document.getElementById("my").href;
                //                $(document.body).bind("mousemove keypress", function () {
                //                    time = new Date().getTime();
                //                });
                //                setInterval(function () {
                //                    if (new Date().getTime() - time >= 120000) {
                //                        window.location.assign(base_url);
                //                    }
                //                }, 60000);

                $('#tgllahir').datepicker({
                    format: "yyyy-mm-dd", weekStart: 1, language: "id", todayHighlight: true
                });
                $('#tgldaftar').datepicker({
                    format: "yyyy-mm-dd", weekStart: 1, language: "id", todayHighlight: true
                });

                $('.wsearch').select2({
                    theme: "classic", allowClear: true
                });

            });
        </script>
    </body>
</html>