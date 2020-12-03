<div class="row mb1">
    <div class="col-sm-12">
        <h4 class="ttl color-black border-midnightblue"><span>PENDAFTARAN RAWAT JALAN</span></h4>
        <?php
        $message = $this->session->flashdata('_msg');
        if ($message == '') {
            echo '';
        } else {
          echo '<div class="alert alert-info">'.$message.'</div>'  ;
        }
        ?>
        <p class="mt2 mb1">Silahkan Masukkan No.Kartu & Tanggal Lahir Andaaaaa</p>
        <div class="well mt2 mb1">
            <form class="form-horizontal mt1" role="form" method="post" action="<?php echo $action; ?>" id="fcard">                           
                <div class="form-group">
                    <label class="col-sm-3 control-label">NO. KARTU</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control input-sm" id="idkartu" name="idkartu" autocomplete="off" autofocus value="<?php echo set_value('idkartu', isset($idkartu) ? $idkartu : ''); ?>">
                    </div>
                    <div class="col-sm-5"><?php echo form_error('idkartu', '<div class="popover right"><div class="arrow"></div><div class="popover-content text-right"><strong class="text-danger">', '</strong></div></div>'); ?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">TANGGAL LAHIR NYA</label>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            <input type="text" class="form-control input-sm" id="tgllahir" name="tgllahir" autocomplete="off" value="<?php echo set_value('tgllahir', isset($tgllahir) ? $tgllahir : ''); ?>" placeholder="yyyy-mm-dd">
                        </div>
                    </div>
                    <div class="col-sm-5"><?php echo form_error('tgllahir', '<div class="popover right"><div class="arrow"></div><div class="popover-content text-right"><strong class="text-danger">', '</strong></div></div>'); ?></div>
                </div>
<!--                <div class="form-group">
                    <label class="col-sm-3 control-label">Untuk Tanggal Pendaftaran</label>
                    <div class="col-sm-4">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input type="text" class="form-control input-sm" id="tgldaftar" name="tgldaftar" autocomplete="off" value="<?php echo set_value('tgldaftar', isset($tgldaftar) ? $tgldaftar : ''); ?>" placeholder="yyyy-mm-dd">
                    </div>
                    <div class="col-sm-5"><?php echo form_error('tgldaftar', '<div class="popover right"><div class="arrow"></div><div class="popover-content text-right"><strong class="text-danger">', '</strong></div></div>'); ?></div>
                </div>    -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-2">   
                        <button type="submit" name="submit" class="btn2 btn-sm bg-emerald color-white shadow col-sm-12">OK</button> 
                    </div>
                    <div class="col-sm-2"><a href="<?php echo base_url(); ?>" class="btn2 btn-sm bg-asbestos color-white shadow center-block  col-sm-12" role="button">Batal</a> </div>
                </div>
            </form>
        </div>
    </div>
</div>