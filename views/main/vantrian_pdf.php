<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Queue</title>
        <link href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <style>
            @media print {
                @page {
                    margin: 3% 0; /* imprtant to logo margin */
                    sheet-size: 90mm 100mm; /* imprtant to set paper size */
                }
            }
        </style>
    </head>
    <body onload="window.print();">
        <div class="container">
            <div class="panel panel-default shadow"  style="margin-top: 3em;">
                <div class="panel-body">
                    <p style="margin-bottom: 5px;text-align: center;"><strong>RSUD DATU SANGGUL - RANTAU</strong></p>
                    <div style="border-bottom: 1px dotted rgba(127, 140, 141,0.8);"></div>      
                    <table class="table table-condensed" style="margin: 1em 0; font-size: 12px;">
                        <tbody>
                            <tr>
                                <td>Tanggal Daftar</td><td>:</td><td><?php echo date_id($tglreg); ?></td>
                            </tr>
                            <tr>
                                <td>No. RM</td><td>:</td><td><?php echo $idpasien; ?></td> 
                            </tr>
                            <tr>
                                <td>Nama Pasien</td><td>:</td><td><?php echo $nama; ?></td> 
                            </tr>
                            <tr>
                                <td>Poli tujuan</td><td>:</td><td><strong><?php echo $poli; ?></strong></td> 
                            </tr>
                            <tr>
                                <td>Nomor Antrian</td><td>:</td>
                                <td>
                                    <h1 style="margin-top:0px;margin-bottom:0px;font-size: 40px;">
                                        <strong id="nomor"><?php echo $noantri; ?></strong>
                                    </h1>
                                </td> 
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
                        ?></p>
                    <p class="text-center"><small>Mohon perlihatkan foto/pdf nomor antrian kepada petugas loket saat nomor Anda dipanggil.</small></p>
                </div>
            </div>
        </div>
    </body>
</html>