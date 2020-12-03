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
                            <div class="col-sm-12">
                                <table class="table table-condensed">
                                    <tr>
                                        <td><?php echo 'Visi : <br> '.$row->visi; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo 'Misi : <br> '.$row->misi; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo 'Sejarah : <br> '.$row->sejarah; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo 'Prestasi : <br> '.$row->prestasi; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                            <?php }
                        } ?>

                        <?php
                        if (empty($dt)) {
                            echo '';
                        } else {
                            foreach ($dt as $row) {
                                echo '<a href="' . base_url('inside/profile/edit/' . $row->nokoders) . '" class="btn btn-xs btn-warning pull-right"> edit <i class="fa fa-pencil"></i></a><br>';
                                ?>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <table class="table table-condensed">
                                            <tr>
                                                <td class="col-sm-3"><strong>No.Kode RS</strong></td><td>:</td><td><?php echo $row->nokoders; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tanggal Registrasi</strong></td><td>:</td><td><?php echo $row->tglreg == NULL ? '' : date_id($row->tglreg); ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nama RS</strong></td><td>:</td><td><?php echo $row->namars; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Jenis RS</strong></td><td>:</td><td><?php echo $row->jenisrs; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Kepemilikan</strong></td><td>:</td><td><?php echo $row->kepemilikan_rs; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Kelas RS</strong></td><td>:</td><td><?php echo $row->kelasrs; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Direktur</strong></td><td>:</td><td><?php echo $row->nip_dir . ' ' . $row->nama_dir; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Penyelenggara</strong></td><td>:</td><td><?php echo $row->nama_penyelengara; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Status Penyelenggara</strong></td><td>:</td><td><?php echo $row->status_pey_swasta; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-sm-5">
                                        <table class="table table-condensed">                                                
                                            <tr>
                                                <td class="col-sm-3"><strong>Akreditasi RS</strong></td><td>:</td><td><?php echo $row->akreditasirs; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Pertahapan</strong></td><td>:</td><td><?php echo $row->ak_pertahapan; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tgl. Akreditasi</strong></td><td>:</td><td><?php echo $row->ak_tgl == NULL ? '' : date_id($row->ak_tgl); ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Status Akreditasi</strong></td><td>:</td><td><?php echo $row->ak_status; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <table class="table table-condensed">
                                            <tr>
                                                <td colspan="3" class="text-center text-primary" style="background: rgba(255,255,255,0.5);"><strong>Alamat Rumah Sakit</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-3"><strong>Alamat</strong></td><td>:</td><td><?php echo $row->alamat; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Kota</strong></td><td>:</td><td><?php echo $row->kota; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Kodepos</strong></td><td>:</td><td><?php echo $row->kodepos; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Telepon</strong></td><td>:</td><td><?php echo $row->telp; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Fax</strong></td><td>:</td><td><?php echo $row->fax; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Email</strong></td><td>:</td><td><?php echo $row->email; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Telp. Humas</strong></td><td>:</td><td><?php echo $row->telp_humas; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Website</strong></td><td>:</td><td><?php echo $row->website; ?></td>
                                            </tr>
                                        </table>                                            
                                    </div>
                                    <div class="col-sm-5">
                                        <table class="table table-condensed">
                                            <tr>
                                                <td colspan="3" class="text-center text-primary" style="background: rgba(255,255,255,0.5);"><strong>Luas Kawasan Rumah Sakit</strong></td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-3"><strong>Luas Tanah</strong></td><td>:</td><td><?php echo $row->luas_tanah; ?> M<sup>2</sup></td>
                                            </tr>                                                
                                            <tr>
                                                <td><strong>Luas Bangunan</strong></td><td>:</td><td><?php echo $row->luas_bgn; ?> M<sup>2</sup></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-center text-primary" style="background: rgba(255,255,255,0.5);"><strong>Dok. Legalitas Penetapan Rumah Sakit</strong></td>
                                            </tr>
                                            <tr>
                                                <td><strong>No. Izin</strong></td><td>:</td><td><?php echo $row->no_ijin; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tanggal</strong></td><td>:</td><td><?php echo $row->tgl_ijin == NULL ? '' : date_id($row->tgl_ijin); ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Oleh</strong></td><td>:</td><td><?php echo $row->oleh_ijin; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Sifat</strong></td><td>:</td><td><?php echo $row->sifat_ijin; ?></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Masa Berlaku s/d tahun</strong></td><td>:</td><td><?php echo $row->masa_berlaku_th; ?></td>
                                            </tr>
                                        </table>
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