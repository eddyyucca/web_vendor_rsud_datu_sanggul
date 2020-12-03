<div class="row mb1">
    <div class="col-sm-12">
        <h4 class="ttl color-black border-midnightblue">LAYA<span>NAN</span></h4>
        <?php
        if (empty($lyn)) {
            echo '';
        } else {
            ?> 
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <?php foreach ($lyn as $i => $row) { ?>
                    <div class = "panel panel-default">
                        <div class = "panel-heading" role = "tab" id = "h<?php echo isset($row->idsys) ? $row->idsys : ''; ?>">
                            <h4 class = "panel-title text-uppercase">
                                <a role = "button" data-toggle = "collapse" data-parent = "#accordion" href = "#c<?php echo isset($row->idsys) ? $row->idsys : ''; ?>" aria-expanded = "true" aria-controls = "collapse<?php echo isset($row->idsys) ? $row->idsys : ''; ?>">
                                    <strong><?php echo isset($row->ttl) ? $row->ttl : ''; ?></strong>
                                </a>
                                <a role = "button" data-toggle = "collapse" data-parent = "#accordion" href = "#c<?php echo isset($row->idsys) ? $row->idsys : ''; ?>" aria-expanded = "true" aria-controls = "collapse<?php echo isset($row->idsys) ? $row->idsys : ''; ?>">
                                    <i class="pull-right fa fa-caret-down"></i>
                                </a>

                            </h4>
                        </div>
                        <div id = "c<?php echo isset($row->idsys) ? $row->idsys : ''; ?>" class = "panel-collapse collapse <?php echo $i == 0 ? 'in' : ''; ?>" role = "tabpanel" aria-labelledby = "h<?php echo isset($row->idsys) ? $row->idsys : ''; ?>">
                            <div class = "panel-body brt">
                                <?php echo $row->pic == '' ? '' : '<img src="' . base_url('asset/img/lyn/' . $row->pic) . '" alt="" class="img-responsive shadow pull-left" data-toggle="modal" data-target="#' . $row->idsys . '">'; ?>
                                <?php echo isset($row->dsc) ? '<p class="text-justify">' . nl2br($row->dsc) . '</p>' : ''; ?>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="<?php echo $row->idsys; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <?php echo '<img src="' . base_url('asset/img/lyn/' . $row->pic) . '" alt="RSUD H.BADARUDDIN" class="img-responsive center-block">'; ?>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        <?php } ?>
    </div>
</div>