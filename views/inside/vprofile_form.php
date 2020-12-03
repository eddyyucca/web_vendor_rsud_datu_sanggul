<div class="transparentbox" style="background: rgba(44, 62, 80, 0.5);">
    <div class="row mt1 mb1">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-10">
                    <h4 class="ttl text-right color-white border-clouds"> <span>PROFILE </span>RUMAH SAKIT</h4>                   
                </div>
                <div class="col-sm-2">
                    <a href="<?php echo base_url('inside/home'); ?>" class="btn bg-alizarin btn-sm col-sm-12 color-white" role="button"> back to <i class="fa fa-home"></i></a>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <ul class="nav nav-tabs text-uppercase mt1" role="tablist">
                <li><a class="color-white" href="<?php echo base_url('inside/profile'); ?>"><strong>List</strong></a></li>
                <li class="active"><a href=""><strong><?php echo $xxx; ?></strong></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="transparentbox bg-white" style="border-radius: 0px;">
                <div class="tab-content pad10">
                    <div class="tab-pane active" id="ctab">                        
                        <form class="form-horizontal" role="form" method="post" action="<?php echo $action; ?>" enctype="multipart/form-data">
                           <div class="form-group">
                                <label class="col-sm-2 control-label">Visi</label>
                                <div class="col-sm-10">
                                    <textarea id="visi" name="visi" class="form-control input-sm" rows="5"><?php echo set_value('visi', isset($visi) ? $visi : ''); ?></textarea>
                                    <?php echo form_error('visi', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Misi</label>
                                <div class="col-sm-10">
                                    <textarea id="misi" name="misi" class="form-control input-sm" rows="5"><?php echo set_value('misi', isset($misi) ? $misi : ''); ?></textarea>
                                    <?php echo form_error('misi', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Sejarah</label>
                                <div class="col-sm-10">
                                    <textarea id="sejarah" name="sejarah" class="form-control input-sm" rows="10"><?php echo set_value('sejarah', isset($sejarah) ? $sejarah : ''); ?></textarea>
                                    <?php echo form_error('sejarah', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Prestasi</label>
                                <div class="col-sm-10">
                                    <textarea id="prestasi" name="prestasi" class="form-control input-sm" rows="10"><?php echo set_value('prestasi', isset($prestasi) ? $prestasi : ''); ?></textarea>
                                    <?php echo form_error('prestasi', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Gambar</label>
                                <div class="col-sm-4">
                                    <input name="pic" value="<?php echo set_value('pic', isset($pic) ? $pic : ''); ?>"  type="text" hidden>
                                    <input type="file" id="filename" name="filename" value="<?php echo set_value('filename', isset($filename) ? $filename : ''); ?>">
                                    <?php echo form_error('filename', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                    <?php
                                    $err = $this->session->flashdata('err');
                                    echo $err == '' ? '' : $err;
                                    ?>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-inline">
                                        <li>
                                            <label><?php echo!empty($pic) ? '<img src="' . base_url() . 'asset/img/' . $pic . '" width="80px" height="75px">' : ''; ?>                                                 </label>
                                        </li>
                                        <li>
                                            <p><?php echo $chk == '' ? '' : $chk; ?></p>
                                            <?php echo form_error('app', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">      
                                    <div class="row">
                                        <div class="col-sm-12 text-right"><small class="color-alizarin">Tanda * harus diisi atau dipilih.</small></div>
                                        <div class="col-sm-2">
                                            <button type="submit" name="submit" class="btn2 btn-sm bg-peterriver btn-block color-clouds shadow">Simpan</button> 
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="<?php echo base_url('inside/profile'); ?>" class="btn2 btn-sm btn-block btn-default shadow" role="button">Batal</a> 
                                        </div>          
                                    </div>
                                </div>
                            </div>
                        </form>                 
                    </div>
                </div>
            </div>                    
        </div>
    </div>
</div>