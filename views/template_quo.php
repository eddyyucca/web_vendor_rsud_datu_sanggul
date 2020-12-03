<div class="row mt1 mb1">
    <div class="col-sm-12">
        <div class="row logo text-uppercase mt1" id="logo">
            <div class="col-sm-2 col-xs-12">
                <?php echo isset($rs->rslogo1) ? '<img src="' . base_url('asset/img/' . $rs->rslogo1) . '" alt="" data-animation="animated bounceInDown" class="center-block">' : ' '; ?>
            </div>
            <div class="col-sm-10 col-xs-12">
                <p data-animation="animated lightSpeedIn" style="margin-bottom: 0;" class="color-white"><?php echo isset($rs->rstype2) ? $rs->rstype2 : ' '; ?></p>  
                <h1 data-animation="animated bounceInDown" class="color-white"><span data-letter="<?php echo isset($rs->rsname) ? $rs->rsname : ' '; ?>"><?php echo isset($rs->rsname) ? $rs->rsname : ' '; ?></span></h1>
                <p data-animation="animated lightSpeedIn" class="color-white"><?php echo isset($rs->rsregion) ? $rs->rsregion : ' '; ?></p>                  
            </div>
        </div>
    </div>
</div>