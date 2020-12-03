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
                <li class="active"><a href="<?php echo base_url('inside/profile'); ?>"><strong>List</strong></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="transparentbox bg-white" style="border-radius: 0px;">
                <div class="tab-content pad10">
                    <div class="tab-pane active" id="ctab">
                        <?php
                        $message = $this->session->flashdata('message');
                        echo $message == '' ? '' : $message;
                        if (empty($pr)) {
                            echo '';
                        } else {
                            foreach ($pr as $row) {
                                echo '<a href="' . base_url('inside/profile/edit/' . $row->idsys) . '" class="btn btn-xs btn-warning pull-right"> edit <i class="fa fa-pencil"></i></a><br>';
                                ?>
                                <div class="row">
                                    <div class="col-sm-9">
                                        <table class="table table-condensed">
                                            <tr>
                                                <td><?php echo '<p class="color-belizehole">Visi : </p> ' . $row->visi; ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo '<p class="color-belizehole">Misi : </p> ' . $row->misi; ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo '<p class="color-belizehole">Sejarah : </p> ' . $row->sejarah; ?></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo '<p class="color-belizehole">Prestasi : </p> ' . $row->prestasi; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-sm-3">
                                        <?php echo !empty($row->pic) ? '<img src="' . base_url() . 'asset/img/' . $row->pic . '" class="center-block img-responsive">' : ''; ?> 
                                    </div>
                                </div>
                            <?php
                            }
                        }
                        ?>                  
                    </div>
                </div>
            </div>                    
        </div>
    </div>
</div>