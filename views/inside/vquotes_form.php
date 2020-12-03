<div class="transparentbox" style="background: rgba(44, 62, 80, 0.5);">
    <div class="row mt1 mb1">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-10">
                    <h4 class="ttl text-right color-white border-clouds"> <span>RUNNING </span>TEXT</h4>                    
                </div>
                <div class="col-sm-2">
                    <a href="<?php echo base_url('inside/home'); ?>" class="btn bg-alizarin btn-sm col-sm-12 color-white" role="button"> back to <i class="fa fa-home"></i></a>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <ul class="nav nav-tabs text-uppercase mt1" role="tablist">
                <li><a class="color-white" href="<?php echo base_url('inside/banner'); ?>"><strong>List</strong></a></li>
                <li class="active"><a href=""><strong><?php echo $xxx; ?></strong></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="transparentbox bg-white" style="border-radius: 0px;">
                <div class="tab-content pad10">
                    <div class="tab-pane active" id="ctab">
                        <form class="form-horizontal" role="form" method="post" action="<?php echo $action; ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Text  <span class="small color-alizarin">*)</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-sm" id="quotes" name="quotes" autocomplete="off" value="<?php echo set_value('quotes', isset($quotes) ? $quotes : ''); ?>">
                                    <?php echo form_error('quotes', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                </div>                                        
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">No. urut</label>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control input-sm" id="odr" name="odr" autocomplete="off" value="<?php echo set_value('odr', isset($odr) ? $odr : ''); ?>">                                    
                                </div>                                        
                                <div class="col-sm-5">
                                    <?php echo form_error('odr', '<div class="popover right"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Publish <span class="small color-alizarin">*)</span></label>
                                <div class="col-sm-10">
                                    <label class="radio-inline">
                                        <input type="radio" id="hide" name="hide" value="0" <?php echo set_radio('hide', '0', isset($hide) && $hide == '0' ? TRUE : FALSE); ?>>Ya
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" id="hide" name="hide" value="1" <?php echo set_radio('hide', '1', isset($hide) && $hide == '1' ? TRUE : FALSE); ?>>Tidak
                                    </label>  
                                    <label class="radio-inline">
                                        <?php echo form_error('hide', '<div class="popover right"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                    </label>
                                </div>
                            </div>         
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-8">      
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <button type="submit" name="submit" class="btn2 btn-sm bg-belizehole btn-block color-clouds shadow">Simpan</button> 
                                        </div>
                                        <div class="col-sm-3">
                                            <a href="<?php echo base_url('inside/quotes'); ?>" class="btn2 bg-clouds btn-sm btn-block shadow" role="button">Batal</a> 
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