<div class="container">
    <div class="row mt1">
        <div class="col-sm-9">
            <h4 class="ttl color-midnightblue border-midnightblue">INFO <span>KAMAR</span></h4>  
            <div class="well text-center">
                <div class="row">
                    <div class="col-sm-4">
                        <?php echo '<h2 class="color-alizarin" style="margin-top: 0px;margin-bottom:0px;"><strong>'.$t1.'</strong> <i class="fa fa-bed color-alizarin"></i></h2>';?> TERISI
                    </div>
                    <div class="col-sm-4">
                        <?php echo '<h2 class="color-sunflower" style="margin-top: 0px;margin-bottom:0px;"><strong>'.$t2.'</strong> <i class="fa fa-bed color-sunflower"></i></h2>';?> PERSIAPAN
                    </div>
                    <div class="col-sm-4">
                        <?php echo '<h2 class="color-turquoise" style="margin-top: 0px;margin-bottom:0px;"><strong>'.$t0.'</strong> <i class="fa fa-bed color-turquoise"></i></h2>';?>  TERSEDIA
                    </div>
                </div>
            </div>            
            <?php if (!empty($kmr)) { ?>
                <div class="table-responsive">
                    <table id="tbl3" class="table table-condensed table-striped" width="100%" cellspacing="0">
                        <thead>
                            <tr class="bg-midnightblue color-white">
                                <th class="col-sm-3">NAMA RUANGAN</th>
                                <th>KELAS</th>
                                <th>NO. KAMAR</th>
                                <th>FASILITAS</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kmr as $i => $r) { ?>
                                <tr>
                                    <td><?php echo $r->nama; ?></td>
                                    <td><?php echo $r->kelas; ?></td>
                                    <td><?php echo $r->nokamar; ?></td>
                                    <td><?php
                                        echo $r->tv == '1' ? '<i class="fa fa-check-square-o">&nbsp;TV</i>&nbsp;' : '';
                                        echo $r->telp == '1' ? '<i class="fa fa-check-square-o">&nbsp;Telepon</i>&nbsp;' : '';
                                        echo $r->kulkas == '1' ? '<i class="fa fa-check-square-o">&nbsp;Kulkas</i>&nbsp;' : '';
                                        echo $r->ac == '1' ? '<i class="fa fa-check-square-o">&nbsp;AC</i>&nbsp;' : '';
                                        echo $r->tb_oksigen == '1' ? '<i class="fa fa-check-square-o">&nbsp;Tabung Oksigen</i>&nbsp;' : '';
                                        echo $r->r_tunggu == '1' ? '<i class="fa fa-check-square-o">&nbsp;Ruang Tunggu</i>&nbsp;' : '';
                                        echo $r->k_mandi == '1' ? '<i class="fa fa-check-square-o">&nbsp;Kamar Mandi&nbsp;' : '';
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        if ($r->status_ == '1') {
                                            echo '<i class="fa fa-2x fa-bed color-alizarin"></i>';
                                        } else if ($r->status_ == '2') {
                                            echo '<i class="fa fa-2x fa-bed color-sunflower"></i>';
                                        } else {
                                            echo '<i class="fa fa-2x fa-bed color-turquoise""></i>';
                                        }
                                        ?>                                        
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody> 
                    </table>
                </div>
            <?php } ?>
        </div>
        <div class="col-sm-3">
            <?php $this->load->view('template_side'); ?>
        </div>
    </div>
</div>