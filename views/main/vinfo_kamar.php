<div class="row mb1">
    <div class="col-sm-12">
        <h4 class="ttl color-black border-midnightblue">INFO <span>KAMAR</span></h4>  
        <div class="well text-center">
            <div class="row" id="kmr">
                <div class="col-sm-4 col-xs-4">
                    <?php echo '<h2 class="color-alizarin" style="margin-top: 0px;margin-bottom:0px;"><strong>' . $t1 . '</strong> <i class="fa fa-bed color-alizarin"></i></h2>'; ?> TERISI
                </div>
                <div class="col-sm-4 col-xs-4">
                    <?php echo '<h2 class="color-sunflower" style="margin-top: 0px;margin-bottom:0px;"><strong>' . $t2 . '</strong> <i class="fa fa-bed color-sunflower"></i></h2>'; ?> PERSIAPAN
                </div>
                <div class="col-sm-4 col-xs-4">
                    <?php echo '<h2 class="color-turquoise" style="margin-top: 0px;margin-bottom:0px;"><strong>' . $t0 . '</strong> <i class="fa fa-bed color-turquoise"></i></h2>'; ?>  TERSEDIA
                </div>
            </div>
        </div>            
        <?php if (!empty($kmr)) { ?>
            <div class="table-responsive">
                <table id="tbl2" class="table table-condensed table-striped" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($kmr as $i => $r) {
                            if ($r->status_ == '0') {
                                $color = 'color-turquoise';
                            } else if ($r->status_ == '1') {
                                $color = 'color-alizarin';
                            } else if ($r->status_ == '2') {
                                $color = 'color-sunflower';
                            }

                            $tv = $r->tv == '1' ? '<i class="fa fa-check-square-o">&nbsp;TV</i>&nbsp;' : '';
                            $tl = $r->telp == '1' ? '<i class="fa fa-check-square-o">&nbsp;Telepon</i>&nbsp;' : '';
                            $kl = $r->kulkas == '1' ? '<i class="fa fa-check-square-o">&nbsp;Kulkas</i>&nbsp;' : '';
                            $ac = $r->ac == '1' ? '<i class="fa fa-check-square-o">&nbsp;AC</i>&nbsp;' : '';
                            $ok = $r->tb_oksigen == '1' ? '<i class="fa fa-check-square-o">&nbsp;Tabung Oksigen</i>&nbsp;' : '';
                            $rt = $r->r_tunggu == '1' ? '<i class="fa fa-check-square-o">&nbsp;Ruang Tunggu</i>&nbsp;' : '';
                            $km = $r->k_mandi == '1' ? '<i class="fa fa-check-square-o">&nbsp;Kamar Mandi&nbsp;' : ''; 
                            $rat = number_format($r->rate,2);
                                    
                            if ($i == 0) {
                                echo '<tr><td>';
                                echo '<div class="col-xs-6 col-sm-6 pad5"><div class="media">'
                                . '<div class="media-body"><h5 class="media-heading"><strong><i class="fa fa-2x fa-bed fa-border ' . $color . '"></i> ' . $r->nama . '</strong></h5>'
                                . '<table class="table table-condensed small" style="margin-bottom:0px;background: none;">'
                                . '<tr><td class="col-sm-2">No.Kamar</td><td>:</td><td>' . $r->kdkmr . '</td></tr>'
                                . '<tr><td>Kelas</td><td>:</td><td>' . $r->kelas . '</td></tr>'
                                //. '<tr><td>Tarif</td><td>:</td><td>' . $rat . '</td></tr>'       
                                . '<tr><td>Fasilitas</td><td>:</td><td>' . $tv . $tl . $kl . $ac . $ok . $rt . $km . '</td></tr>'
                                . '</table></div></div></div>';
                            } else if ($i % 2 == 0) {
                                echo '</td></tr><tr><td>';
                                echo '<div class="col-xs-6 col-sm-6 pad5"><div class="media">'
                                . '<div class="media-body"><h5 class="media-heading"><strong><i class="fa fa-2x fa-bed fa-border ' . $color . '"></i> ' . $r->nama . '</strong></h5>'
                                . '<table class="table table-condensed small" style="margin-bottom:0px;background: none;">'
                                . '<tr><td class="col-sm-2">No.Kamar</td><td>:</td><td>' . $r->kdkmr . '</td></tr>'
                                . '<tr><td>Kelas</td><td>:</td><td>' . $r->kelas . '</td></tr>'
                                //. '<tr><td>Tarif</td><td>:</td><td>' . $rat . '</td></tr>'
                                . '<tr><td>Fasilitas</td><td>:</td><td>' . $tv . $tl . $kl . $ac . $ok . $rt . $km . '</td></tr>'
                                . '</table></div></div></div>';
                            } else {
                                echo '<div class="col-xs-6 col-sm-6 pad5"><div class="media">'
                                . '<div class="media-body"><h5 class="media-heading"><strong><i class="fa fa-2x fa-bed fa-border ' . $color . '"></i> ' . $r->nama . '</strong></h5>'
                                . '<table class="table table-condensed small" style="margin-bottom:0px;background: none;">'
                                . '<tr><td class="col-sm-2">No.Kamar</td><td>:</td><td>' . $r->kdkmr . '</td></tr>'
                                . '<tr><td>Kelas</td><td>:</td><td>' . $r->kelas . '</td></tr>'
                                //. '<tr><td>Tarif</td><td>:</td><td>' . $rat . '</td></tr>'
                                . '<tr><td>Fasilitas</td><td>:</td><td>' . $tv . $tl . $kl . $ac . $ok . $rt . $km . '</td></tr>'
                                . '</table></div></div></div>';
                            }
                        }
                        ?>
                    </tbody> 
                </table>
            </div>
        <?php } ?>
    </div>
</div>