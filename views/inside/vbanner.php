<div class="transparentbox" style="background: rgba(44, 62, 80, 0.5);">
    <div class="row mt1 mb1">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-10">
                    <h4 class="ttl text-right color-white border-clouds"> BAN<span>NER</span></h4>                    
                </div>
                <div class="col-sm-2">
                    <a href="<?php echo base_url('inside/home'); ?>" class="btn bg-alizarin btn-sm col-sm-12 color-white" role="button"> back to <i class="fa fa-home"></i></a>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <ul class="nav nav-tabs text-uppercase mt1" role="tablist">
                <li class="active"><a href="<?php echo base_url('inside/banner'); ?>"><strong>List</strong></a></li>
                <li><a class="color-white" href="<?php echo base_url('inside/banner/add'); ?>"><strong><?php echo $xxx;?></strong></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="transparentbox bg-white" style="border-radius: 0px;">
                <div class="tab-content pad10">
                    <div class="tab-pane active" id="ctab">
                        <?php
                        $message = $this->session->flashdata('message');
                        echo $message == '' ? '' : $message;
                        if (empty($ban)) {
                            echo '';
                        } else {
                            ?>    
                            <div class="table-responsive mt1">
                                <table id="tbl5" class="table table-condensed" width="100%" cellspacing="0">
                                    <thead>
                                        <tr><th></th><th>No. Urut</th><th>Gambar</th><th>Publish</th><th></th><th></th></tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($ban as $row) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row->ttl .'<br><small>'.$row->dsc.'</small>'; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row->odr; ?>
                                                </td>
                                                <td>
                                                    <img src="<?php echo base_url('asset/img/bnr/' . $row->pic); ?>" class="img-responsive" height="90" width="250" data-toggle="modal" data-target="#<?php echo $row->idsys; ?>">
                                                </td>
                                                <td><?php echo $row->hide == '0' ? '<span class="label label-info">Ya</span>' : '<span class="label label-success">Tidak</span>' ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('inside/banner/edit/' . $row->idsys); ?>" class="btn btn-xs btn-warning"> edit <i class="fa fa-pencil"></i></a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url('inside/banner/delete/' . $row->idsys); ?>" class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin akan menghapus banner <?php echo $row->ttl; ?> ?')"> delete <i class="fa fa-trash-o"></i></a>                                                    
                                                </td>
                                            </tr>
                                        <div class="modal fade" id="<?php echo $row->idsys; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">                                                         
                                                        <p>Judul Utama :</p>
                                                        <p><?php echo $row->ttl; ?></p>
                                                        <p>Deskripsi lain :</p>
                                                        <p><?php echo $row->dsc; ?></p>
                                                        <?php echo $row->pic == '' ? '' : '<img src="' . base_url('asset/img/bnr/' . $row->pic) . '" alt="" class="img-responsive img-thumbnail center-block"> '; ?>                                                                           
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