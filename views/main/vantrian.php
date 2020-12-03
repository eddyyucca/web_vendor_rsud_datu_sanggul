<div class="row mb1">
    <div class="col-sm-12">
        <h4 class="ttl color-black border-midnightblue"><span>PENDAFTARAN RAWAT JALAN</span></h4>
        <?php
        $message = $this->session->flashdata('_msg');
        if ($message == '') {
            echo '';
        } else {
            echo '<div class="alert alert-info">' . $message . '</div>';
        }
        ?>
        <div class="well">
            <div class="row">
                <div class="col-sm-5">
                    <div class="panel panel-default shadow" id="print-area">
                        <div class="panel-body">
                            <p style="margin-bottom: 5px;text-align: center;"><strong>RSUD DATU SANGGUL - RANTAU</strong></p>
                            <div style="border-bottom: 1px dotted rgba(127, 140, 141,0.8);"></div>      
                            <table class="table table-condensed" style="margin-bottom: 10px; font-size: 0.9em;">
                                <tbody>
                                    <tr>
                                        <td>Tanggal Daftar</td><td>:</td><td><?php echo $tglreg; ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. RM</td><td>:</td><td><?php echo $idpasien; ?></td> 
                                    </tr>
                                    <tr>
                                        <td>Nama Pasien</td><td>:</td><td><?php echo $nama; ?></td> 
                                    </tr>
                                    <tr>
                                        <td>Poli tujuan :</td><td>:</td><td><strong><?php echo $poli; ?></strong></td> 
                                    </tr>
                                    <tr>
                                        <td>Nomor Antrian Anda</td><td>:</td><td><h1 style="margin-top:0px;margin-bottom:0px;font-size: 40px; text-align: center"><strong id="nomor"><?php echo $noantri; ?></strong></h1></td> 
                                    </tr>
                                </tbody>
                            </table>
                           <p style="text-align: center">Pasien lanjut ke <strong>LOKET PENDAFTARAN</strong><br>
                                Silahkan datang ke RSUD Datu Sanggul perkiraan jam 
                                <?php
                                $no = substr($noantri, 1) * 2;
                                $date = date_create('07:58:00');
                                $dates = date_add($date, date_interval_create_from_date_string($no . ' minutes'));
                                echo '<strong>' . date_format($dates, 'H:i') . ' WITA</strong>';
                                ?>
                            </p>                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-offset-1 col-sm-6">
                    <div class="popover top">
                        <div class="arrow"></div>
                        <div class="popover-content">
                            <ul>
                                <li>Simpan atau screenshoot halaman ini sebagai bukti nomor antrian Anda.</li>
                                <li>Mohon perlihatkan foto/pdf nomor antrian kepada petugas loket saat nomor Anda dipanggil.</li>
                            </ul>
                        </div>
                    </div><br>                                   
<!--                    <div class="text-center"><a id="print" class="btn2 btn-sm bg-emerald color-white shadow" role="button">&nbsp;<i class="fa fa-print"></i>&nbsp; PRINT&nbsp;&nbsp;</a>  </div>-->
                    <div class="text-center">
                        <?php 
                        $param = $tglreg.'__'.$noantri.'__'.$idpasien.'__'.$nama.'__'.$poli;
                        ?>
                        <a class="btn2 btn-sm bg-emerald color-white shadow" href="<?php echo base_url('pendaftaran/save/'.$param);?>" target="blank_">&nbsp;<i class="fa fa-save"></i>&nbsp; SIMPAN&nbsp;&nbsp;</a>  
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
<!--<textarea id="printing-css" style="display:none;"><link href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>" rel="stylesheet"></textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
        <script src="<?php echo base_url('asset/js/jquery-2.1.4.min.js'); ?>"></script>  
        <script src="<?php echo base_url('asset/js/bootstrap.min.js'); ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var time = new Date().getTime();
                var base_url = document.getElementById("my").href;
                $(document.body).bind("mousemove keypress", function () {
                    time = new Date().getTime();
                });
                setInterval(function () {
                    if (new Date().getTime() - time >= 120000) {
                        window.location.assign(base_url);
                    }
                }, 120000);

                function pr() {
                    var a = document.getElementById('printing-css').value;
                    var b = document.getElementById("print-area").innerHTML;
                    var myContent = '<!DOCTYPE html>' + '<html><head>' + a + '</head><body>' + b + '</body></html>';
                    window.frames["print_frame"].document.body.innerHTML = myContent;
                    window.frames["print_frame"].window.focus();
                    window.frames["print_frame"].window.print();
                }
                $('#print1').click(function (e) {
                    e.preventDefault();
                    pr();
               });

            });
        </script>-->
