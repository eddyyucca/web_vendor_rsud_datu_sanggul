<div class="row mt1">   
    <div class="col-sm-12 mb1 mt1" id="secondfoot">
        <a href="<?php echo base_url('pendaftaran'); ?>" class="color-white">
            <div class="box color-white bg-emerald shadow">
                <div class="icon icon-right color-emerald bg-white"><span><i class="fa fa-list"></i></span></div>
                <h5><strong>PENDAFTARAN RAWAT JALAN</strong></h5>
            </div>
        </a>
    </div>
    <div class="col-sm-12 mb1" id="secondfoot">
        <figure class="effect-milo">
            <?php echo '<img src="' . base_url() . 'asset/img/a.jpg">'; ?>
            <figcaption>
                <h3><a href="<?php echo base_url('infodokter'); ?>" class="color-black">info <span>dokter </span></a></h3>
                <a href="<?php echo base_url('infodokter'); ?>"></a>
            </figcaption>			
        </figure>
    </div>
    <div class="col-sm-12 mb1" id="secondfoot">
        <figure class="effect-milo">
            <?php echo '<img src="' . base_url() . 'asset/img/b.jpg">'; ?>
            <figcaption>
                <h3><a href="<?php echo base_url('infokamar'); ?>" class="color-black">info <span>kamar </span></a></h3>
                <a href="<?php echo base_url('infokamar'); ?>"></a>
            </figcaption>			
        </figure>
    </div>
    <div class="col-sm-12 mb1" id="secondfoot">
        <figure class="effect-milo">
            <?php echo '<img src="' . base_url() . 'asset/img/c.jpg">'; ?>
            <figcaption>
                <h3><a href="<?php echo base_url('infojadwal'); ?>" class="color-black">jadwal <span>poliklinik</span></a></h3>
                <a href="<?php echo base_url('infojadwal'); ?>"></a>
            </figcaption>			
        </figure>
    </div>
    <div class="col-sm-12 mb1">
        <?php
        if (empty($lk)) {
            echo '';
        } else {
            ?>
            <p class="ttl"><span>LINK</span>S</p>
            <div class="carousel slide" id="fade-carousel1" data-ride="carousel" data-interval="8000">
                <div class="carousel-inner">
                    <?php
                    foreach ($lk as $i => $r) {
                        if ($i == 0) {
                            ?>
                            <div class="item active">
                                <a href="<?php echo $r->url; ?>" target="_blank" >
                                    <img src="<?php echo base_url('asset/img/link/' . $r->pic) ?>" alt="<?php echo $r->dsc; ?>" class="img-thumbnail" style="height: 70px; width: 100%;"/> 
                                </a>
                            </div>
                        <?php } else {
                            ?>
                            <div class="item">
                                <a href="<?php echo $r->url; ?>" target="_blank" >
                                    <img src="<?php echo base_url('asset/img/link/' . $r->pic) ?>" alt="<?php echo $r->dsc; ?>" class="img-thumbnail" style="height: 70px; width: 100%;"/> 
                                </a>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <a data-slide="prev" href="#fade-carousel1" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                <a data-slide="next" href="#fade-carousel1" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
            </div>
        <?php } ?>
        
        <?php if (!empty($prm)) { ?>
            <div class="carousel slide" id="fade-carousel" data-ride="carousel" data-interval="8000">
                <div class="carousel-inner">
                    <?php foreach ($prm as $i => $r) { ?>
                        <div class="item <?php echo $i == 0 ? 'active' : ''; ?>">
                            <p class="ttl color-black border-midnightblue mt1">PROMOSI KESEHATAN <br><span>RUMAH SAKIT </span></p>
                            <img src="<?php echo base_url('asset/img/bnr/' . $r->pic) ?>" alt="RSUD Datu Sanggul" class="img-thumbnail center-block" style="max-height: 300px; width: 100%;" data-toggle="modal" data-target="#<?php echo $r->idsys; ?>"/> 
                        </div>
                        <div class="modal fade" id="<?php echo $r->idsys; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo $r->pic == '' ? '' : '<img src="' . base_url('asset/img/bnr/' . $r->pic) . '" alt="RSUD Datu Sanggul" class="img-responsive img-thumbnail center-block"> '; ?>                                                                           
                                    </div>
                                </div>
                            </div>
                        </div><?php
                    }
                    ?>
                    <a data-slide="prev" href="#fade-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                    <a data-slide="next" href="#fade-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>