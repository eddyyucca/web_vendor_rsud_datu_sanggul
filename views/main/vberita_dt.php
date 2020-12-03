<div class="row mb1">
    <div class="col-sm-12">
        <?php
        if (empty($brt)) {
            echo '<div class="alert alert-info">Tidak ada artikel baru.</div>';
        } else {
            ?>   
            <?php
            if (empty($ctg)) {
                echo '';
            } else {
                ?>   
                <div class="alert alert-success">
                    <span class="label label-default"><a href="<?php echo base_url('berita'); ?>" class="color-white">semua</a></span>
                    <?php foreach ($ctg as $row) { ?>
                        <span class="label label-default"><a href="<?php echo base_url('berita/kategori/' . $row->idsys); ?>" class="color-white"><?php echo $row->kategori; ?></a></span>
                    <?php } ?>
                </div>
            <?php } ?>                    
            <h4 class="ttl color-black border-midnightblue"><span><?php echo $brt->ttl; ?></span></h4>
            <?php
            echo $brt->pic == '' ? '' : '<img src="' . base_url('asset/img/brt/' . $brt->pic) . '" alt="' . $brt->ttl . '" class="img-responsive shadow pull-left">';
            echo '<p class="text-justify">' . $brt->ctn . '</p>';
            ?>
            <hr>
            <div class="row">
                <div class="col-sm-6 col-xs-6">
                    <?php echo '<small>Kategori : ' . $brt->kategori . '</small>'; ?>
                </div>
                <div class="col-sm-6 col-xs-6 text-right">                                    
                    <?php
                    echo '<small>' . day_id(date('Y-m-d', strtotime($brt->dtn))) . ', ' . date_id(date('Y-m-d', strtotime($brt->dtn))) . ' | ' . date("H:i:s", strtotime($brt->dtn)) . ' | ' . $brt->u_ . ' | hints : ' . $hint . '</small>';
                    ?>
                </div>
            </div>
            <br>
        <?php } ?>
    </div>
    <div class="col-sm-12 text-right mb1">
        <a href="<?php echo base_url('berita'); ?>" class="btn2 btn-sm bg-emerald color-white shadow col-sm-2" role="button"><i class="fa fa-hand-o-left"></i> kembali</a>
    </div>
</div>