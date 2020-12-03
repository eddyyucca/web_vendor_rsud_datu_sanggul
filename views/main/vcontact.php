<div class="row">
    <div class="col-sm-12">
        <h4 class="ttl color-black border-midnightblue">HUBUNGI <span>KAMI</span></h4>
        <table class="table table-condensed mt2">                                    
            <tr>
                <td class="col-sm-3"><strong>Alamat</strong></td><td>:</td><td><?php echo isset($rs->rsaddres) ? $rs->rsaddres : ' '; ?></td>
            </tr>
            <tr>
                <td><strong>Telepon</strong></td><td>:</td><td><?php echo isset($rs->rsphone) ? $rs->rsphone : ' '; ?></td>
            </tr>
            <tr>
                <td><strong>Fax</strong></td><td>:</td><td><?php echo isset($rs->rsfax) ? $rs->rsfax : ' '; ?></td>
            </tr>
            <tr>
                <td><strong>Email</strong></td><td>:</td><td><?php echo isset($rs->rsmail) ? $rs->rsmail : ' '; ?></td>
            </tr>
            <tr>
                <td><strong>Gawat Darurat</strong></td><td>:</td><td><?php echo isset($rs->rsphonegd) ? $rs->rsphonegd : ' '; ?></td>
            </tr>
            <tr>
                <td><strong>Call Center</strong></td><td>:</td><td><?php echo isset($rs->rscall) ? $rs->rscall : ' '; ?></td>
            </tr>
            <tr>
                <td><strong>Website</strong></td><td>:</td><td><a href="<?php echo base_url(); ?>" target="_blank"><?php echo base_url(); ?></a></td>
            </tr>
        </table>
        <?php echo $rs->rsembed == '' ? '' : '<div class="embed-responsive embed-responsive-16by9"><iframe src="' . $rs->rsembed . '" frameborder="0" style="border:0" allowfullscreen></iframe></div>'; ?>
    </div>
</div>