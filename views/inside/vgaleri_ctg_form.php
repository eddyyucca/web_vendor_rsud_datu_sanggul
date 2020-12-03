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
                <li><a class="color-white" href=""><strong><?php echo $xxx;?></strong></a></li>
                <li class="active"><a class="color-white" href="<?php echo base_url('inside/galeri/kategori'); ?>"><strong>Kategori</strong></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="transparentbox bg-white" style="border-radius: 0px;">
                <div class="tab-content pad10">
                    <div class="tab-pane active" id="ctab">
                        <form class="form-horizontal" role="form" method="post" action="<?php echo $action; ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kategori <span class="small color-alizarin">*)</span></label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control input-sm" id="kategori" name="kategori" autocomplete="off" value="<?php echo set_value('kategori', isset($kategori) ? $kategori : ''); ?>">                                    
                                </div>                                        
                                <div class="col-sm-4">
                                    <?php echo form_error('kategori', '<div class="popover right"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-8">      
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <button type="submit" name="submit" class="btn2 btn-sm bg-belizehole btn-block color-clouds shadow">Simpan</button> 
                                        </div>
                                        <div class="col-sm-3">
                                            <a href="<?php echo base_url('inside/galeri/kategori'); ?>" class="btn2 bg-clouds btn-sm btn-block shadow" role="button">Batal</a> 
                                        </div>          
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">                        
                                <div class="col-sm-12 text-right"><small class="color-alizarin">Tanda * harus diisi atau dipilih.</small></div>
                            </div>
                        </form>                 
                    </div>
                </div>
            </div>                    
        </div>
    </div>
</div>