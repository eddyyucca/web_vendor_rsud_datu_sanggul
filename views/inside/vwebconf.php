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
                <li class="active"><a href="<?php echo base_url('inside/webconf'); ?>"><strong>Data</strong></a></li>
            </ul>

            <!-- Tab panes -->
            <div class="transparentbox bg-white" style="border-radius: 0px;">
                <div class="tab-content pad10">
                    <div class="tab-pane active" id="ctab">
                        <?php
                        $message = $this->session->flashdata('message');
                        echo $message == '' ? '' : $message;
                        if (empty($wrs)) {
                            echo '';
                        } else {
                            foreach ($wrs as $row) {
                                echo '<a href="' . base_url('inside/webconf/edit/' . $row->idsys) . '" class="btn btn-xs btn-warning pull-right"> edit <i class="fa fa-pencil"></i></a><br>';
                                ?>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <table class="table table-condensed">
                                            <tr>
                                                <th class="col-sm-2">Akronim</th><td>:</td><td><?php echo $row->rsakronim; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">Nama RS</th><td>:</td><td><?php echo $row->rsname; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">Tipe RS</th><td>:</td><td><?php echo $row->rstype . ' - ' . $row->rstype2; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">Kapubaten / Kota</th><td>:</td><td><?php echo $row->rsregion; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">Alamat</th><td>:</td><td><?php echo $row->rsaddres; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">Telepon</th><td>:</td><td><?php echo $row->rsphone; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">Telepon IGD</th><td>:</td><td><?php echo $row->rsphonegd; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">Fax</th><td>:</td><td><?php echo $row->rsfax; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">Call Center</th><td>:</td><td><?php echo $row->rscall; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">SMS Center</th><td>:</td><td><?php echo $row->rssms; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">Email</th><td>:</td><td><?php echo $row->rsmail; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">Peta Lokasi (embedcode)</th><td>:</td><td><?php echo $row->rsembed == '' ? '' : '<div class="embed-responsive embed-responsive-16by9"><iframe src="' . $row->rsembed . '" frameborder="0" style="border:0" allowfullscreen></iframe></div>'; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-sm-4">
                                        <table class="table table-condensed">
                                            <tr>
                                                <th class="col-sm-2">Logo Kabupaten</th><td>:</td><td><?php echo!empty($row->rslogo1) ? '<img src="' . base_url() . 'asset/img/' . $row->rslogo1 . '" class="img-responsive" style="max-width:150px;">' : ''; ?> </td>
                                            </tr>                                       
                                        </table>
                                    </div>
                                    <div class="col-sm-12">
                                        <table class="table table-condensed">
                                            <tr>
                                                <th class="col-sm-2">Main Background</th><td>:</td><td><?php echo '<img src="' . base_url() . 'asset/img/bg.jpg' . '" class="img-responsive" style="max-width:80%;">'; ?> </td>
                                            </tr>
                                            <tr>
                                                <th class="col-sm-2">Footer Background</th><td>:</td><td><?php echo '<img src="' . base_url() . 'asset/img/ft.jpg' . '" class="img-responsive" style="max-width:80%;">'; ?> </td>
                                            </tr>
                                        </table>
                                    </div>
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