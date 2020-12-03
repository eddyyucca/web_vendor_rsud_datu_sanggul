<div class="row">
    <div class="col-sm-12">
        <h4 class="ttl color-black border-midnightblue">GALE<span>RI</span></h4>
        <?php
        if (empty($ctg)) {
            echo '';
        } else {
            ?>      
            <div class="alert alert-success">
                <span class="label label-default"><a href="<?php echo base_url('galeri'); ?>" class="color-white">semua</a></span>
                <?php foreach ($ctg as $row) { ?>
                    <span class="label label-default"><a href="<?php echo base_url('galeri/kategori/' . $row->idsys); ?>" class="color-white"><?php echo $row->kategori; ?></a></span>
                <?php } ?>
            </div>
        <?php } ?>
        <?php
        if (empty($glr)) {
            echo '';
        } else {
            ?>                    
            <div class="table-responsive">
                <table id="tbl2" class="table table-condensed" width="100%" cellspacing="0">
                    <thead>
                        <tr><th></th></tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($glr as $i => $row) {
                            if ($i == 0) {
                                echo '<tr><td>';
                                echo '<div class="col-sm-3 col-xs-6 pad5">'
                                . '<div class="thumbnail shadow" data-toggle="modal" data-target="#' . $row->idsys . '">'
                                . '<img src="' . base_url('asset/img/glr/' . $row->filename) . '" alt="' . $row->ttl . '" class="">';
                                $words = explode(" ", $row->ttl);
                                echo '<div class="caption text-center"><strong>' . implode(" ", array_splice($words, 0, 7)) . '..</strong>'
                                . '</div></div></div>';
                            } else if ($i % 4 == 0) {
                                echo '</td></tr><tr><td>';
                                echo '<div class="col-sm-3 col-xs-6 pad5">'
                                . '<div class="thumbnail shadow" data-toggle="modal" data-target="#' . $row->idsys . '">'
                                . '<img src="' . base_url('asset/img/glr/' . $row->filename) . '" alt="' . $row->ttl . '" class="">';
                                $words = explode(" ", $row->ttl);
                                echo '<div class="caption text-center"><strong>' . implode(" ", array_splice($words, 0, 7)) . '..</strong>'
                                . '</div></div></div>';
                            } else {
                                echo '<div class="col-sm-3 col-xs-6 pad5">'
                                . '<div class="thumbnail shadow" data-toggle="modal" data-target="#' . $row->idsys . '">'
                                . '<img src="' . base_url('asset/img/glr/' . $row->filename) . '" alt="' . $row->ttl . '" class="">';
                                $words = explode(" ", $row->ttl);
                                echo '<div class="caption text-center"><strong>' . implode(" ", array_splice($words, 0, 7)) . '..</strong>'
                                . '</div></div></div>';
                            }
                            ?>
                            <!-- Modal -->
                        <div class="modal fade" id="<?php echo $row->idsys ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title text-primary" id="myModalLabel"><?php echo $row->ttl; ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <img src="<?php echo base_url('asset/img/glr/' . $row->filename); ?>" alt="<?php echo $row->ttl; ?>" class="img-responsive img-thumbnail center-block">
                                        <br>
                                        <p><?php echo nl2br($row->dsc); ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="row">
                                            <div class="col-sm-6 text-left">
                                                <small><?php echo date_id($row->dtaken); ?></small>
                                            </div>
                                            <div class="col-sm-6">                                                            
                                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
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
            </div>
        <?php }
        ?> 
    </div>
</div>