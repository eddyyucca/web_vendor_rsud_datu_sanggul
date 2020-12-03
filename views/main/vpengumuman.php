<div class="row mb1">
    <div class="col-sm-12">
        <h4 class="ttl color-black border-midnightblue"><span>PENGUMUMAN</span></h4>
        <?php
        if (empty($umm)) {
            echo '<div class="alert alert-info">Tidak ada pengumuman baru.</div>';
        } else {
            ?>                    
            <table id="tbl2" class="table table-responsive table-condensed" width="100%" cellspacing="0">
                <thead>
                    <tr><th></th></tr>
                </thead>
                <tbody>
                    <?php foreach ($umm as $row) {
                        ?>
                        <tr>
                            <td>
                                <div class="media">                                
                                    <?php
                                    echo '<div class="media-body">';
                                    echo '<small>' . day_id(date('Y-m-d'), strtotime($row->dpost)) . ', ' . date_id(date('Y-m-d'), strtotime($row->dpost)) . ' | ' . $row->u_ . '</small>';
                                    echo '<p class="media-heading"><a href="" data-toggle="modal" data-target="#' . $row->idsys . '">' . $row->ttl . '</a></p>';
                                    $words = explode(" ", $row->ctn);
                                    echo '<p class="text-justify">' . implode(" ", array_splice($words, 0, 25)) . '....<a href="" data-toggle="modal" data-target="#' . $row->idsys . '"><small>selengkapnya...</small></a></p>';
                                    echo '</div>';
                                    ?>      
                                </div>
                            </td>
                        </tr> 
                    <div class="modal fade" id="<?php echo $row->idsys ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title text-primary" id="myModalLabel"><strong><?php echo $row->ttl; ?></strong></h4>
                                </div>
                                <div class="modal-body">
                                    <p><?php echo nl2br($row->ctn); ?></p>
                                    <?php
                                    $ext = $row->pic == '' ? '' : substr($row->pic, strpos($row->pic, ".") + 1);
                                    $ispic = array("jpg", "jpeg", "png", "gif");
                                    if (in_array($ext, $ispic)) {
                                        echo '<img src="' . base_url('asset/img/brt/' . $row->pic) . '" alt="" class="img-responsive img-thumbnail center-block"> ';
                                    } else {
                                        echo '<a href="' . base_url('asset/img/brt/' . $row->pic) . '" target="blank_">' . $row->pic . '</a>';
                                    }
                                    ?>
                                </div>
                                <div class="modal-footer">
                                    <div class="row">
                                        <div class="col-sm-6 text-left">
                                            <small><?php echo date_id($row->dpost); ?></small>
                                        </div>
                                        <div class="col-sm-6">                                                            
                                            <button type="button" class="btn2 btn-sm bg-belizehole color-white pull-right shadow" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
                ?>
                </tbody>
            </table>
        <?php }
        ?>         
    </div>
</div>