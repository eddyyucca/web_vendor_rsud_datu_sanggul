<div class="transparentbox" style="background: rgba(44, 62, 80, 0.5);">
    <div class="row mt1 mb1">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-10">
                    <h4 class="ttl text-right color-white border-clouds"> <span>KONFIGURASI </span>WEBSITE</h4>                    
                </div>
                <div class="col-sm-2">
                    <a href="<?php echo base_url('inside/home'); ?>" class="btn bg-alizarin btn-sm col-sm-12 color-white" role="button"> back to <i class="fa fa-home"></i></a>                                        
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <ul class="nav nav-tabs text-uppercase mt1" role="tablist">
                <li><a class="color-white" href="<?php echo base_url('inside/webconf'); ?>"><strong>Data</strong></a></li>
                <li class="active"><a href=""><strong><?php echo $xxx; ?></strong></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="transparentbox bg-white" style="border-radius: 0px;">
                <div class="tab-content pad10">
                    <div class="tab-pane active" id="ctab">                        
                        <form class="form-horizontal" role="form" method="post" action="<?php echo $action; ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama RS <span class="small color-alizarin">*)</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-sm" id="rsname" name="rsname" autocomplete="off" value="<?php echo set_value('rsname', isset($rsname) ? $rsname : ''); ?>">
                                    <?php echo form_error('rsname', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                </div>  
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Alamat <span class="small color-alizarin">*)</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-sm" id="rsaddres" name="rsaddres" autocomplete="off" value="<?php echo set_value('rsaddres', isset($rsaddres) ? $rsaddres : ''); ?>">
                                    <?php echo form_error('rsaddres', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                </div>                                        
                            </div>     
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tipe / Jenis RS <span class="small color-alizarin">*)</span></label>
                                <div class="col-sm-5">
                                    <select data-placeholder="pilih" class="form-control wsearch" name="jnsrs" id="jnsrs">
                                        <option value=""></option> 
                                        <?php
                                        foreach ($jns as $p) {
                                            echo '<option value="' . $p->jenisrs.'__'.$p->uraian . '"' . set_select('jnsrs', $p->jenisrs.'__'.$p->uraian, isset($jnsrs) && ($p->jenisrs.'__'.$p->uraian) == $jnsrs ? TRUE : FALSE) . '">' . $p->jenisrs.' - '.$p->uraian . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error('jnsrs', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                </div>                                
                                <label class="col-sm-1 control-label">Akronim<span class="small color-alizarin">*)</span></label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control input-sm" id="rsakronim" name="rsakronim" autocomplete="off" value="<?php echo set_value('rsakronim', isset($rsakronim) ? $rsakronim : ''); ?>">
                                    <?php echo form_error('rsakronim', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                </div>
                            </div>                       
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kapubaten / Kota <span class="small color-alizarin">*)</span></label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control input-sm" id="rsregion" name="rsregion" autocomplete="off" value="<?php echo set_value('rsregion', isset($rsregion) ? $rsregion : ''); ?>">
                                    <?php echo form_error('rsregion', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                </div>    
                                <label class="col-sm-offset-1 col-sm-2 control-label">Email </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control input-sm" id="rsmail" name="rsmail" autocomplete="off" value="<?php echo set_value('rsmail', isset($rsmail) ? $rsmail : ''); ?>">
                                    <?php echo form_error('rsmail', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                </div>  
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Telepon <span class="small color-alizarin">*)</span></label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control input-sm" id="rsphone" name="rsphone" autocomplete="off" value="<?php echo set_value('rsphone', isset($rsphone) ? $rsphone : ''); ?>">
                                    <?php echo form_error('rsphone', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                </div>   
                                <label class="col-sm-offset-1 col-sm-2 control-label">Telepon IGD <span class="small color-alizarin">*)</span></label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control input-sm" id="rsphonegd" name="rsphonegd" autocomplete="off" value="<?php echo set_value('rsphonegd', isset($rsphonegd) ? $rsphonegd : ''); ?>">
                                    <?php echo form_error('rsphonegd', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Fax <span class="small color-alizarin">*)</span></label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control input-sm" id="rsfax" name="rsfax" autocomplete="off" value="<?php echo set_value('rsfax', isset($rsfax) ? $rsfax : ''); ?>">
                                    <?php echo form_error('rsfax', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                </div>  
                                <label class="col-sm-offset-1 col-sm-2 control-label">Call Center <span class="small color-alizarin">*)</span></label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control input-sm" id="rscall" name="rscall" autocomplete="off" value="<?php echo set_value('rscall', isset($rscall) ? $rscall : ''); ?>">
                                    <?php echo form_error('rscall', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                </div>  
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">SMS Center </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control input-sm" id="rssms" name="rssms" autocomplete="off" value="<?php echo set_value('rssms', isset($rssms) ? $rssms : ''); ?>">
                                    <?php echo form_error('rssms', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                </div>  
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Peta Lokasi (embed url) </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-sm" id="rsembed" name="rsembed" autocomplete="off" value="<?php echo set_value('rsembed', isset($rsembed) ? $rsembed : ''); ?>">
                                    <?php echo form_error('rsembed', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                </div>                                        
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Logo <span class="small color-alizarin">*)</span></label>
                                <div class="col-sm-4">
                                    <input name="rslogo1" value="<?php echo set_value('rslogo1', isset($rslogo1) ? $rslogo1 : ''); ?>"  type="text" hidden>
                                    <input type="file" id="rslogo1_" name="rslogo1_" value="<?php echo set_value('rslogo1_', isset($rslogo1_) ? $rslogo1_ : ''); ?>">
                                    <?php echo form_error('rslogo1_', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                    <?php
                                    $err1 = $this->session->flashdata('rslogo1_');
                                    echo $err1 == '' ? '' : $err1;
                                    ?>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-inline">
                                        <li>
                                            <label><?php echo!empty($rslogo1) ? '<img src="' . base_url() . 'asset/img/' . $rslogo1 . '" height="75px">' : ''; ?></label>
                                        </li>
                                        <li>
                                            <?php echo form_error('app1', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Main Background (jpg maks. 1MB) </label>
                                <div class="col-sm-4">
                                    <input type="file" id="bg" name="bg" value="<?php echo set_value('bg', isset($bg) ? $bg : ''); ?>">
                                    <?php echo form_error('bg', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>                                    
                                    <?php
                                    $err = $this->session->flashdata('bg');
                                    echo $err == '' ? '' : $err;
                                    ?>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-inline">
                                        <li>
                                            <label><?php echo '<img src="' . base_url() . 'asset/img/bg.jpg" height="75px">'; ?></label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Footer Background (jpg maks. 1MB) </label>
                                <div class="col-sm-4">
                                    <input type="file" id="ft" name="ft" value="<?php echo set_value('ft', isset($ft) ? $ft : ''); ?>">
                                    <?php echo form_error('ft', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>                                    
                                    <?php
                                    $err = $this->session->flashdata('ft');
                                    echo $err == '' ? '' : $err;
                                    ?>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-inline">
                                        <li>
                                            <label><?php echo '<img src="' . base_url() . 'asset/img/ft.jpg" height="75px">'; ?></label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-8">      
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <button type="submit" name="submit" class="btn2 btn-sm bg-emerald btn-block color-clouds shadow">Simpan</button> 
                                        </div>
                                        <div class="col-sm-3">
                                            <a href="<?php echo base_url('inside/webconf'); ?>" class="btn2 bg-clouds btn-sm btn-block shadow" role="button">Batal</a> 
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