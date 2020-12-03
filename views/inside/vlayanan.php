<div class="transparentbox" style="background: rgba(44, 62, 80, 0.5);">
    <div class="row mt1 mb1">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-10">
                    <h4 class="ttl text-right color-white border-clouds"> <span>LAYAN</span>AN</h4>                    
                </div>
                <div class="col-sm-2">
                    <a href="<?php echo base_url('inside/home'); ?>" class="btn bg-alizarin btn-sm col-sm-12 color-white" role="button"> back to <i class="fa fa-home"></i></a>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <ul class="nav nav-tabs text-uppercase mt1" role="tablist">
                <li class="active"><a href="<?php echo base_url('inside/layanan'); ?>"><strong>List</strong></a></li>
                <li><a class="color-white" href="<?php echo base_url('inside/layanan/add'); ?>"><strong><?php echo $xxx; ?></strong></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="transparentbox bg-white" style="border-radius: 0px;">
                <div class="tab-content pad10">
                    <div class="tab-pane active" id="ctab">
                        <?php
                        $message = $this->session->flashdata('message');
                        echo $message == '' ? '' : $message;
                        if (empty($lyn)) {
                            echo '';
                        } else {
                            ?>    
                            <div class="table-responsive mt1">
                                <table id="tbl5" class="table table-condensed" width="100%" cellspacing="0">
                                    <thead>
                                        <tr><th>Layanan</th><th>No. Urut</th><th>Publish</th><th></th><th></th></tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($lyn as $row) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <div class="media">                                
                                                        <?php
                                                        echo $row->pic == '' ? '' : '<div class="media-left"><a href="" data-toggle="modal" data-target="#' . $row->idsys . '"><img src="' . base_url('asset/img/lyn/' . $row->pic) . '" alt="" class="media-object"></a></div> ';
                                                        echo '<div class="media-body">';
                                                        echo '<p class="media-heading text-uppercase"><a href="" data-toggle="modal" data-target="#' . $row->idsys . '">' . $row->ttl . '</a></p>';
                                                        $words = explode(" ", $row->dsc);
                                                        echo '<p>' . implode(" ", array_splice($words, 0, 10)) . '....</p>';
                                                        echo '</div>';
                                                        ?>      
                                                    </div>
                                                </td>
                                                <td><?php echo $row->odr; ?></td>
                                                <td><?php echo $row->hide == '0' ? '<span class="label label-info">Ya</span>' : '<span class="label label-success">Tidak</span>' ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('inside/layanan/edit/' . $row->idsys); ?>" class="btn btn-xs btn-warning"> edit <i class="fa fa-pencil"></i></a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url('inside/layanan/delete/' . $row->idsys); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin akan menghapus layanan <?php echo $row->ttl; ?> ?')"> delete <i class="fa fa-trash-o"></i></a>                                                    
                                                </td>
                                            </tr>
                                        <div class="modal fade" id="<?php echo $row->idsys; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title text-primary" id="myModalLabel"><?php echo $row->ttl; ?></h4>
                                                    </div>
                                                    <div class="modal-body brt">
                                                        <?php echo $row->pic == '' ? '' : '<img src="' . base_url('asset/img/lyn/' . $row->pic) . '" alt="" class="img-responsive shadow pull-left">'; ?>
                                                        <?php echo isset($row->dsc) ? '<p class="text-justify">' . nl2br($row->dsc) . '</p>' : ''; ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="row">
                                                            <div class="col-sm-10 text-left">
                                                                <?php echo '<small class="text-left text-info">' . day_id(date('Y-m-d'), strtotime($row->dpost)) . ', ' . date_id(date('Y-m-d'), strtotime($row->dpost)) . ' | ' . $row->u_ . '</small>'; ?>                                                        
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <button type="button" class="btn2 btn-sm bg-belizehole btn-block color-clouds shadow" data-dismiss="modal">Close</button>        
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
            </div>                    
        </div>
    </div>
</div>