<div class="row">
    <div class="col-sm-12">
        <h4 class="ttl color-black border-midnightblue"><span>BERITA</span></h4>
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
            <div class="table-responsive">
                <table id="tbl2" class="table table-condensed" width="100%" cellspacing="0">
                    <thead>
                        <tr><th></th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($brt as $row) {
                            ?>
                            <tr>
                                <td>
                                    <div class="media">                                
                                        <?php
                                        echo $row->pic == '' ? '' : '<div class="media-left"><a href="' . base_url('berita/detail/' . $row->idsys) . '"><img src="' . base_url('asset/img/brt/' . $row->pic) . '" alt="' . $row->ttl . '" class="media-object"></a></div> ';
                                        echo '<div class="media-body">';
                                        echo '<small>' . day_id(date('Y-m-d', strtotime($row->dtn))) . ', ' . date_id(date('Y-m-d', strtotime($row->dtn))) . ' | ' . $row->u_ . ' | hints : ' . $row->hint . '</small>';
                                        echo '<p class="media-heading"><a href="' . base_url('berita/detail/' . $row->idsys) . '">' . $row->ttl . '</a></p>';
                                        $words = explode(" ", $row->ctn);
                                        echo '<p class="text-justify">' . implode(" ", array_splice($words, 0, 25)) . '....<a href="' . base_url('berita/detail/' . $row->idsys) . '"><small>selengkapnya...</small></a></p>';
                                        echo '</div>';
                                        ?>      
                                    </div>
                                </td>
                            </tr>                                
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php }
        ?> 
    </div>
</div>