<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="8000">
    <ol class="carousel-indicators">
        <?php
        if (!empty($bnr)) {
            echo '<li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
            foreach ($bnr as $i => $row) {
                echo '<li data-target="#myCarousel" data-slide-to="' . ($i + 1) . '"></li>';
            }
        }
        ?>
    </ol>
    <div class="carousel-inner">
        <div class="item active">
            <img src="<?php echo base_url('asset/img/bnr/def.jpg') ?>" class="fill" alt="">
            <div class="carousel-caption">
                <div class="row logo text-uppercase">
                    <div class="col-sm-2 col-xs-12">
                        <?php echo isset($rs->rslogo1) ? '<img src="' . base_url('asset/img/' . $rs->rslogo1) . '" data-animation="animated bounceInDown" class="center-block">' : ' '; ?>
                    </div>
                    <div class="col-sm-10 col-xs-12">
                        <p data-animation="animated lightSpeedIn" style="margin-bottom: 0;" class="color-white"><?php echo isset($rs->rstype2) ? $rs->rstype2 : ' '; ?></p>  
                        <h1 data-animation="animated bounceInDown" class="color-white"><span data-letter="<?php echo isset($rs->rsname) ? $rs->rsname : ' '; ?>"><?php echo isset($rs->rsname) ? $rs->rsname : ' '; ?></span></h1>
                        <p data-animation="animated lightSpeedIn" class="color-white"><?php echo isset($rs->rsregion) ? $rs->rsregion : ' '; ?></p>  
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (!empty($bnr)) {
            foreach ($bnr as $i => $row) {
                echo '<div class="item">';
                echo isset($row->pic) ? '<img src="' . base_url('asset/img/bnr/' . $row->pic) . '" class="fill" alt="" >' : '';
                if ($row->ttl != '' || $row->dsc != '') {
                    echo '<div class="carousel-caption"><div class="row"><div class="col-sm-7 cap">'
                    . '<h4 data-animation="animated zoomInLeft"><strong>' . $row->ttl . '</strong></h4>'
                    . '<p data-animation="animated zoomInLeft">' . $row->dsc . '</p> ';
                    echo '</div></div></div>';
                }
                echo '</div>';
            }
        }
        ?>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-9">
            <div class="row mt2">
                <div class="col-sm-4">
                    <div class="box color-pomegranate bg-white border-pomegranate">
                        <div class="icon icon-top color-pomegranate bg-white"><span><i class="fa fa-ambulance"></i></span></div>
                        <h5><strong>GAWAT DARURAT</strong>&nbsp;&nbsp; <?php echo isset($rs->rsphonegd) ? $rs->rsphonegd : ' '; ?></h5>
                    </div>
                </div> 
                <div class="col-sm-4">
                    <div class="box color-pomegranate bg-white border-pomegranate">
                        <div class="icon icon-top color-pomegranate bg-white"><span><i class="fa fa-volume-control-phone"></i></span></div>
                        <h5 ><strong>CALL CENTER</strong>&nbsp;&nbsp;  <?php echo isset($rs->rscall) ? $rs->rscall : ' '; ?></h5>
                    </div>
                </div>  
                <div class="col-sm-4">
                    <div class="box color-pomegranate bg-white border-pomegranate">
                        <div class="icon icon-top color-pomegranate bg-white"><span><i class="fa fa-envelope-open-o"></i></span></div>
                        <h5><strong>SMS CENTER</strong>&nbsp;&nbsp;  <?php echo isset($rs->rssms) ? $rs->rssms : ' '; ?></h5>
                    </div>
                </div>  
            </div>
            <div class="row mt1">
                <div class="col-sm-7 pad5" id="berita">
                    <h4 class="ttl color-black border-midnightblue"> BE<span>RITA</span></h4>
                    <?php
                    if (empty($brt)) {
                        echo '<div class="alert alert-info">Tidak ada data.</div>';
                    } else {
                        ?>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#new" aria-controls="new" role="tab" data-toggle="tab">Terbaru</a></li>
                            <li role="presentation"><a href="#pop" aria-controls="pop" role="tab" data-toggle="tab">Populer</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active mt1" id="new">
                                <?php foreach ($brt as $row) {
                                    ?>
                                    <div class="media text-justify">                                
                                        <?php
                                        echo $row->pic == '' ? '' : '<div class="media-left"><a href="' . base_url('berita/detail/' . $row->idsys) . '"><img src="' . base_url('asset/img/brt/' . $row->pic) . '" alt="" class="media-object"></a></div> ';
                                        echo '<div class="media-body">';
                                        echo '<p class="media-heading"><a href="' . base_url('berita/detail/' . $row->idsys) . '">' . $row->ttl . '</a> ' .
                                        '<small>' . day_id($row->dtn) . ', ' . date_id($row->dtn) . ' | ' . $row->u_ . ' | hints : ' . $row->hint . '</small></p>';
                                        $words = explode(" ", $row->ctn);
                                        echo implode(" ", array_splice($words, 0, 12)) . '....<a href="' . base_url('berita/detail/' . $row->idsys) . '"><small>selengkapnya...</small></a>';
                                        echo '</div>';
                                        ?>      
                                    </div><hr>
                                <?php }
                                ?>
                            </div>
                            <div role="tabpanel" class="tab-pane mt1" id="pop">
                                <?php foreach ($pop as $row) {
                                    ?>
                                    <div class="media text-justify">                                
                                        <?php
                                        echo $row->pic == '' ? '' : '<div class="media-left"><a href="' . base_url('berita/detail/' . $row->idsys) . '"><img src="' . base_url('asset/img/brt/' . $row->pic) . '" alt="" class="media-object"></a></div> ';
                                        echo '<div class="media-body">';
                                        echo '<small>' . day_id($row->dtn) . ', ' . date_id($row->dtn) . ' | ' . $row->u_ . ' | hints : ' . $row->hint . '</small>';
                                        echo '<p class="media-heading"><a href="' . base_url('berita/detail/' . $row->idsys) . '">' . $row->ttl . '</a></p>';
                                        $words = explode(" ", $row->ctn);
                                        echo implode(" ", array_splice($words, 0, 12)) . '....<a href="' . base_url('berita/detail/' . $row->idsys) . '"><small>selengkapnya...</small></a>';
                                        echo '</div>';
                                        ?>      
                                    </div><hr>
                                <?php }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?> 
                    <div class="text-right"><a href="<?php echo base_url('berita'); ?>" class="label bg-emerald color-white">selengkapnya</a></div>
                </div>
                <div class="col-sm-5 pad5">
                    <div class="alert color-black border-silver">
                        <h5 class="color-black text-center"><strong>PENGUMUMAN</strong></h5>   
                        <?php
                        if (empty($umm)) {
                            echo '<p>belum ada pengumuman baru.</p>';
                        } else {
                            echo '<table class="table table-condensed">';
                            foreach ($umm as $row) {
                                echo '<tr><td>';
                                echo '<p class="text-uppercase"><strong><a href="" data-toggle="modal" data-target="#' . $row->idsys . '">' . $row->ttl . '</a></strong></p>';
                                $words = explode(" ", $row->ctn);
                                echo '<p class="text-justify">' . implode(" ", array_splice($words, 0, 15)) . '<a href="" data-toggle="modal" data-target="#' . $row->idsys . '"><small> [...]</small></a></p>';
                                echo '</td></tr>';
                                ?>
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
                                                        <button type="button" class="btn2 btn-sm bg-emerald color-white pull-right shadow" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            echo '</table>';
                        }
                        ?>
                        <div class="text-right"><a href="<?php echo base_url('pengumuman'); ?>" class="label bg-emerald color-white">selengkapnya</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <?php $this->load->view('template_side'); ?>
        </div>
    </div>
</div>