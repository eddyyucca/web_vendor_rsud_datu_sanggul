<div class="row">
    <div class="col-sm-12">
        <h4 class="ttl color-black border-midnightblue"><span>PROFILE </span>RUMAH SAKIT</h4>
        <?php echo (isset($pr->pic) && $pr->pic != NULL) ? '<img src="' . base_url('asset/img/' . $pr->pic) . '" alt="" style="height:200px; width:100%;" class="img-responsive shadow mb1 center-block" >' : ' '; ?>
    </div>
    <div class="col-sm-12">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
            <li role="presentation"><a href="#visi" aria-controls="visi" role="tab" data-toggle="tab">Visi</a></li>
            <li role="presentation"><a href="#misi" aria-controls="misi" role="tab" data-toggle="tab">Misi</a></li>
            <li role="presentation"><a href="#prestasi" aria-controls="settings" role="tab" data-toggle="tab">Prestasi</a></li>
            <li role="presentation"><a href="#sejarah" aria-controls="settings" role="tab" data-toggle="tab">Sejarah</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active mt1" id="profile">
                <?php
                if (empty($dt)) {
                    echo '<div class="alert alert-info"><i class="fa fa-danger"></i>Tidak ada data.</div>';
                } else {
                    foreach ($dt as $row) {
                        ?>
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
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
                                        <td><strong>Kelas RS</strong></td><td>:</td><td colspan="2"><?php echo $row->kelasrs; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Direktur</strong></td><td>:</td><td colspan="2"><?php echo $row->nip_dir . ' ' . $row->nama_dir; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Penyelenggara</strong></td><td>:</td><td colspan="2"><?php echo $row->nama_penyelengara; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status Penyelenggara</strong></td><td>:</td><td colspan="2"><?php echo $row->status_pey_swasta; ?></td>
                                    </tr>                                               
                                    <tr>
                                        <td><strong>Akreditasi RS</strong></td><td>:</td><td colspan="2"><?php echo $row->akreditasirs; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Pertahapan</strong></td><td>:</td><td colspan="2"><?php echo $row->ak_pertahapan; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tgl. Akreditasi</strong></td><td>:</td><td colspan="2"><?php echo $row->ak_tgl == NULL ? '' : date_id($row->ak_tgl); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status Akreditasi</strong></td><td>:</td><td colspan="2"><?php echo $row->ak_status; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-uppercase color-alizarin" style="background: rgba(255,255,255,0.5);"><strong>Alamat Rumah Sakit</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Alamat</strong></td><td>:</td><td colspan="2"><?php echo $row->alamat; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Kota</strong></td><td>:</td><td colspan="2"><?php echo $row->kota; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Kodepos</strong></td><td>:</td><td colspan="2"><?php echo $row->kodepos; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Telepon</strong></td><td>:</td><td colspan="2"><?php echo $row->telp; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Fax</strong></td><td>:</td><td colspan="2"><?php echo $row->fax; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email</strong></td><td>:</td><td colspan="2"><?php echo $row->email; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Telp. Humas</strong></td><td>:</td><td colspan="2"><?php echo $row->telp_humas; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Website</strong></td><td>:</td><td colspan="2"><?php echo $row->website; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-uppercase color-alizarin" style="background: rgba(255,255,255,0.5);"><strong>Luas Kawasan Rumah Sakit</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Luas Tanah</strong></td><td>:</td><td colspan="2"><?php echo $row->luas_tanah; ?> M<sup>2</sup></td>
                                    </tr>                                                
                                    <tr>
                                        <td><strong>Luas Bangunan</strong></td><td>:</td><td colspan="2"><?php echo $row->luas_bgn; ?> M<sup>2</sup></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-uppercase color-alizarin" style="background: rgba(255,255,255,0.5);"><strong>Dok. Legalitas Penetapan Rumah Sakit</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>No. Izin</strong></td><td>:</td><td colspan="2"><?php echo $row->no_ijin; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tanggal</strong></td><td>:</td><td colspan="2"><?php echo $row->tgl_ijin == NULL ? '' : date_id($row->tgl_ijin); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Oleh</strong></td><td>:</td><td colspan="2"><?php echo $row->oleh_ijin; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Sifat</strong></td><td>:</td><td colspan="2"><?php echo $row->sifat_ijin; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Masa Berlaku s/d tahun</strong></td><td>:</td><td colspan="2"><?php echo $row->masa_berlaku_th; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?> 
            </div>
            <div role="tabpanel" class="tab-pane mt1" id="visi">
                <?php echo $pr->visi; ?><br><hr>
            </div>
            <div role="tabpanel" class="tab-pane mt1" id="misi">
                <?php echo $pr->misi; ?><br><hr>
            </div>
            <div role="tabpanel" class="tab-pane mt1" id="prestasi">
                <?php echo $pr->prestasi; ?><br><hr>
            </div>
            <div role="tabpanel" class="tab-pane mt1" id="sejarah">
                <?php echo $pr->sejarah; ?><br><hr>                            
            </div>
        </div>
    </div>
</div>