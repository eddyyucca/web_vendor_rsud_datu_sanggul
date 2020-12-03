<div class="transparentbox" style="background: rgba(44, 62, 80, 0.5);">
    <div class="row mt1 mb1">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-10">
                    <h4 class="ttl text-right color-white border-clouds"> GALE<span>RI</span></h4>                    
                </div>
                <div class="col-sm-2">
                    <a href="<?php echo base_url('inside/home'); ?>" class="btn bg-alizarin btn-sm col-sm-12 color-white" role="button"> back to <i class="fa fa-home"></i></a>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <ul class="nav nav-tabs text-uppercase mt1" role="tablist">
                <li><a class="color-white" href="<?php echo base_url('inside/galeri'); ?>"><strong>List</strong></a></li>
                <li><a class="color-white" href="<?php echo base_url('inside/galeri/add'); ?>"><strong><?php echo $xxx;?></strong></a></li>
                <li class="active"><a class="color-white" href="<?php echo base_url('inside/galeri/kategori'); ?>"><strong>Kategori</strong></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="transparentbox bg-white" style="border-radius: 0px;">
                <div class="tab-content pad10">
                    <div class="tab-pane active" id="ctab">
                        <a class="btn2 bg-belizehole color-clouds pull-right shadow" href="<?php echo base_url('inside/galeri/kategori_add');?>"><i class="fa fa-plus"></i> Tambah Kategori</a>
                        <br><br>
                        <?php
                        $message = $this->session->flashdata('message');
                        echo $message == '' ? '' : $message;
                        if (empty($ctg)) {
                            echo '';
                        } else {
                            ?>    
                            <div class="table-responsive mt1">
                                <table id="tbl5" class="table table-condensed" width="100%" cellspacing="0">
                                    <thead>
                                        <tr><th>Album</th><th></th><th></th></tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ctg as $row) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row->kategori; ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url('inside/galeri/kategori_edit/' . $row->idsys); ?>" class="btn btn-xs btn-warning"> edit <i class="fa fa-pencil"></i></a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url('inside/galeri/kategori_delete/' . $row->idsys); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin akan menghapus kategori <?php echo $row->kategori; ?> ?')"> delete <i class="fa fa-trash-o"></i></a>                                                    
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
            </div>                    
        </div>
    </div>
</div>