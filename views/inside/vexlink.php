<div class="transparentbox" style="background: rgba(44, 62, 80, 0.5);">
    <div class="row mt1 mb1">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-10">
                    <h4 class="ttl text-right color-white border-clouds"> EXTERNAL <span>LINK</span></h4>                    
                </div>
                <div class="col-sm-2">
                    <a href="<?php echo base_url('inside/home'); ?>" class="btn bg-alizarin btn-sm col-sm-12 color-white" role="button"> back to <i class="fa fa-home"></i></a>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <ul class="nav nav-tabs text-uppercase mt1" role="tablist">
                <li class="active"><a href="<?php echo base_url('inside/exlink'); ?>"><strong>List</strong></a></li>
                <li><a class="color-white" href="<?php echo base_url('inside/exlink/add'); ?>"><strong><?php echo $xxx;?></strong></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="transparentbox bg-white" style="border-radius: 0px;">
                <div class="tab-content pad10">
                    <div class="tab-pane active" id="ctab">
                        <?php
                        $message = $this->session->flashdata('message');
                        echo $message == '' ? '' : $message;
                        if (empty($exl)) {
                            echo '';
                        } else {
                            ?>    
                            <div class="table-responsive mt1">
                                <table id="tbl5" class="table table-condensed" width="100%" cellspacing="0">
                                    <thead>
                                        <tr><th>URL</th><th>Keterangan</th><th>Gambar</th><th>Publish</th><th></th><th></th></tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($exl as $row) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row->url; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->dsc; ?>
                                                </td>
                                                <td>
                                                    <img src="<?php echo base_url('asset/img/link/' . $row->pic); ?>" class="img-responsive" height="90" width="250" >
                                                </td>
                                                <td><?php echo $row->hide == '0' ? '<span class="label label-info">Ya</span>' : '<span class="label label-success">Tidak</span>' ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('inside/exlink/edit/' . $row->idsys); ?>" class="btn btn-xs btn-warning"> edit <i class="fa fa-pencil"></i></a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url('inside/exlink/delete/' . $row->idsys); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin akan menghapus link <?php echo $row->url; ?> ?')"> delete <i class="fa fa-trash-o"></i></a>                                                    
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