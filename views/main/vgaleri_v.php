<div class="container">
    <div class="row mt1">
        <div class="col-sm-9">
            <h4 class="ttl color-black border-midnightblue">GALE<span>RI</span></h4>
            <?php
            if (empty($glr)) {
                echo '';
            } else {
                ?>                    
                <table id="tbl4" class="table table-responsive table-condensed" width="100%" cellspacing="0">
                    <thead>
                        <tr><th></th></tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($glr as $i => $r) {
                            if ($i == 0) {
                                echo '<tr><td>';
                                echo '<div class="col-sm-6">'
                                . '<div class="thumbnail shadow">'
                                . '<div class="embed-responsive embed-responsive-16by9">'
                                . '<video id="video_' . $r->idsys . '"  class="video-js vjs-default-skin vjs-big-play-centered embed-responsive-item" controls
                                               preload="auto" width="auto" height="auto" poster="" data-setup="{}">'
                                . '<source src="' . base_url('asset/img/vid/' . $r->filename) . '" type="video/mp4" />'
                                . '<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>'
                                . '</video></div>';
                                echo '<div class="caption text-center"><strong>' . $r->ttl . '</strong>'
                                . '</div></div></div>';
                            } else if ($i % 2 == 0) {
                                echo '</td></tr><tr><td>';
                                echo '<div class="col-sm-6">'
                                . '<div class="thumbnail shadow">'
                                . '<div class="embed-responsive embed-responsive-16by9">'
                                . '<video id="video_' . $r->idsys . '"  class="video-js vjs-default-skin vjs-big-play-centered embed-responsive-item" controls
                                               preload="auto" width="auto" height="auto" poster="" data-setup="{}">'
                                . '<source src="' . base_url('asset/img/vid/' . $r->filename) . '" type="video/mp4" />'
                                . '<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>'
                                . '</video></div>';
                                echo '<div class="caption text-center"><strong>' . $r->ttl . '</strong>'
                                . '</div></div></div>';
                            } else {
                                echo '<div class="col-sm-6">'
                                . '<div class="thumbnail shadow">'
                                . '<div class="embed-responsive embed-responsive-16by9">'
                                . '<video id="video_' . $r->idsys . '"  class="video-js vjs-default-skin vjs-big-play-centered embed-responsive-item" controls
                                               preload="auto" width="auto" height="auto" poster="" data-setup="{}">'
                                . '<source src="' . base_url('asset/img/vid/' . $r->filename) . '" type="video/mp4" />'
                                . '<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>'
                                . '</video></div>';
                                echo '<div class="caption text-center"><strong>' . $r->ttl . '</strong>'
                                . '</div></div></div>';
                            }
                            ?>
                        <?php }
                        ?>
                    </tbody>
                </table>
            <?php }
            ?>              
        </div>
        <div class="col-sm-3">      
            <div class="row mt1">
                <div class="col-sm-12">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="<?php echo base_url('galeri'); ?>" class="color-midnightblue"><strong>FOTO</strong></a></li>
                        <li class="list-group-item bg-clouds"><a href="<?php echo base_url('galeri/video'); ?>" class="color-midnightblue"><strong>VIDEO</strong></a></li>
                    </ul>
                </div>
            </div>
            <?php $this->load->view('template_side'); ?>
        </div>
    </div>
</div>