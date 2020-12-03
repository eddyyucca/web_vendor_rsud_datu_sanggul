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
                            <p style="margin-bottom: 5px;text-align: center;"><strong>RSUD H.BADARUDDIN TANJUNG</strong></p>
                            <div style="border-bottom: 1px dotted rgba(127, 140, 141,0.8);"></div>      
                            <table class="table table-condensed" style="margin-bottom: 10px; font-size: 0.9em;">
                                <tbody>
                                    <tr>
                                        <td>Tanggal</td><td>:</td><td><?php echo $tglreg; ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. RM</td><td>:</td><td><?php echo $idpasien; ?></td> 
                                    </tr>
                                    <tr>
                                        <td>Nama</td><td>:</td><td><?php echo $nama; ?></td> 
                                    </tr>
                                    <tr>
                                        <td>Poli tujuan :</td><td>:</td><td><strong><?php echo $poli; ?></strong></td> 
                                    </tr>
                                    <tr>
                                        <td>Nomor Antrian Anda</td><td>:</td><td><h1 style="margin-top:0px;margin-bottom:0px;font-size: 60px; text-align: center"><strong id="nomor"><?php echo $noantri; ?></strong></h1></td> 
                                    </tr>
                                </tbody>
                            </table>
                            <p style="text-align: center">Pasien lanjut ke <strong>LOKET PENDAFTARAN</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-offset-1 col-sm-6">
                    <div class="popover top">
                        <div class="arrow"></div>
                        <div class="popover-content">
                            <ul>
                                <li>Pilih <strong>PRINT</strong> untuk mencetak antrian</li>
                                <li>Silahkan menunggu antrian Anda.</li>
                            </ul>
                        </div>
                    </div><br>                                   
                    <div class="text-center"><a id="print" class="btn2 btn-sm bg-emerald color-white shadow" role="button">&nbsp;<i class="fa fa-print"></i>&nbsp; PRINT&nbsp;&nbsp;</a>  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<textarea id="printing-css" style="display:none;"><link href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>" rel="stylesheet"></textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>