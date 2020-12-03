<div class="row mb1">
    <div class="col-sm-12">
        <h4 class="ttl color-black border-midnightblue">INFO <span>ATAS PEMBUATAN RACIKAN OBAT</span></h4>
        <?php if (!empty($dok)) { ?>
            <div class="table-responsive">
                <table id="tbl3" class="table table-condensed table-striped" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-midnightblue color-white">
                            <th>NO.KARTU</th>
                            <th>NAMA LENGKAP PASIEN</th>
                            <th>TEMPAT PENERIMAAN RESEP</th>
                            <th>TGL.RESEP</th>                            
                            <th>STATUS RESEP</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dok as $i => $r) { ?>
                            <tr>
                                <td><?php echo $r->idpasien; ?></td>
                                <td><?php echo $r->nama; ?></td>
                                <td><?php echo $r->desgudang; ?></td>                                
                                <td><?php echo date('d-m-Y',strtotime($r->tglresep)); ?></td>                                
                                <td class="text-center">
                                    <?php   
                                      if ($r->fgStatus == '0'){
                                         echo '<div class="label bg-greensea"><i class="fa fa-check-square-o"></i>&nbsp;Persiapan&nbsp;</div>&nbsp;';
                                      } elseif ($r->fgStatus == '1'){
                                          echo '<div class="label bg-greensea"><i class="fa fa-check-square-o"></i>&nbsp;Dikerjakan&nbsp;</div>&nbsp;';
                                      } else {
                                          echo '<div class="label bg-greensea"><i class="fa fa-check-square-o"></i>&nbsp;Selesai&nbsp;</div>&nbsp;';
                                      }
//                                    echo $r->fgStatus == '0' ? '<div class="label bg-greensea"><i class="fa fa-check-square-o"></i>&nbsp;Persiapan&nbsp;</div>&nbsp;<div class="label bg-silver"><i class="fa fa-check-square-o"></i>&nbsp;Diproses&nbsp;</div>' : '<div class="label bg-silver"><i class="fa fa-check-square-o"></i>&nbsp;Persiapan&nbsp;</div>&nbsp;<div class="label label-danger"><i class="fa fa-check-square-o"></i>&nbsp;Diproses&nbsp;</div>';
                                    ?>                                        
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody> 
                </table>
            </div>
        <?php } ?>
    </div>
</div>