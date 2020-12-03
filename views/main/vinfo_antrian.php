<div class="row mb1">
    <div class="col-sm-12">
        <h4 class="ttl color-black border-midnightblue">INFO <span>ANTRIAN PELAYANAN RAWAT JALAN</span></h4>
        <div class="row">
            <div class="col-sm-4 col-xs-6">
              <div class="small-box bg-yellow">
                 <div class="inner">
                     <?php if (!empty($call_[0]['queueNo'])) { ?>
                                <h3><?php echo $call_[0]['queueNo']; ?> </h3>                                
                           <?php } ?>
                     <?php if (empty($call_[0]['queueNo'])) { ?>
                                <h3><?php echo '000'; ?> </h3>                                
                           <?php } ?>
                    <h4>Nomor sedang dipanggil</h4>
                    <p>No.berikutnya mempersiapkan</p>                 
                 </div>
                 <div class="icon">
                      <i class="ion ion-person-add"></i>
                 </div>
                                <a class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
                  
              </div>  
            </div>
            <div class="col-sm-4 col-xs-6">
              <div class="small-box bg-green">
                 <div class="inner">
                     <?php if (!empty($proc[0]['queueNo'])){ ?>                     
                                <h3><?php echo $proc[0]['queueNo']; ?></h3>
                     <?php } ?>
                     <?php if (empty($proc[0]['queueNo'])) { ?>
                                <h3><?php echo '000'; ?> </h3>                                
                           <?php } ?>                                
                    <h4>Nomor sedang dilayani</h4>
                    <p>Melayani sepenuh hati</p>                 
                 </div>
                <div class="icon">
                   <i class="ion ion-person-add"></i>                   
                </div>
                                <a class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
              </div>  
            </div>
            <div class="col-sm-4 col-xs-6">
              <div class="small-box bg-red">
                 <div class="inner">
                    <?php if (!empty($end_[0]['queueNo'])){ ?>
                     <h3><?php echo $end_[0]['queueNo']; ?> </h3> 
                     <?php } ?>                                                 
                     <?php if (empty($end_[0]['queueNo'])) { ?>
                                <h3><?php echo '000'; ?> </h3>                                
                           <?php } ?>
                     <h4>Nomor terakhir selesai</h4>
                    <p>Kepuasan anda harapan kami</p>                 
                 </div>
                <div class="icon">
                   <i class="ion ion-ios7-alarm-outline"></i>
                </div>
                                <a class="small-box-footer">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>
              </div>  
            </div>

        </div>    
        <?php if (!empty($end_[0]['queueNo'])){ ?>
            <div class="table-responsive">
                 <table id="tbl3" class="table table-condensed table-striped" width="100%" cellspacing="0">
                     <thead>
                         <tr class="bg-midnightblue color-white">
                             <th>NOMOR ANTRIAN SELESAI</th>
                             <th>NAMA PELAYANAN</th>                             
                             <th class="text-center">STATUS</th>
                         </tr>
                     </thead>    
                     <tbody>
                         <?php foreach ($end_ as $i=>$items) {?> 
                            <tr>
                                <td><?php echo $end_[$i]['queueNo']; ?></td>
                                <td><?php echo $end_[$i]['serviceName']; ?></td>
                                <td class="text-center">
                                   <?php echo '<div class="label bg-greensea"><i class="fa fa-check-square-o"></i>&nbsp;Selesai&nbsp;</div>&nbsp;'; 
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