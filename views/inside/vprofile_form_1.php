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
                            <div class="row">
                                <div class="col-sm-7">
                                    <table class="table table-condensed">
                                        <tr>
                                            <td class="col-sm-3"><strong>No.Kode RS<span class="small color-alizarin">*)</span></strong></td><td>:</td>
                                            <td>
                                                <input type="text" class="form-control input-sm" id="nokoders" name="nokoders" autocomplete="off" value="<?php echo set_value('nokoders', isset($nokoders) ? $nokoders : ''); ?>">
                                                <?php echo form_error('nokoders', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-right"><strong class="text-danger">', '</strong></div></div>'); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Registrasi<span class="small color-alizarin">*)</span></strong></td><td>:</td>
                                            <td>
                                                <div class="input-group col-sm-4">
                                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                    <input type="text" class="form-control input-sm" id="tglreg" name="tglreg" autocomplete="off" value="<?php echo set_value('tglreg', isset($tglreg) ? $tglreg : ''); ?>">
                                                </div>
                                                <?php echo form_error('tglreg', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-right"><strong class="text-danger">', '</strong></div></div>'); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama RS<span class="small color-alizarin">*)</span></strong></td><td>:</td>
                                            <td>
                                                <input type="text" class="form-control input-sm" id="namars" name="namars" autocomplete="off" value="<?php echo set_value('namars', isset($namars) ? $namars : ''); ?>">
                                                <?php echo form_error('namars', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-right"><strong class="text-danger">', '</strong></div></div>'); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Jenis RS<span class="small color-alizarin">*)</span></strong></td><td>:</td>
                                            <td>
                                                <select data-placeholder="pilih kategori" class="form-control input-sm wsearch" name="jenisrs" id="jenisrs">
                                                    <option value=""></option> 
                                                    <?php
                                                    foreach ($jns as $p) {
                                                        echo '<option value="' . $p->jenisrs . '"' . set_select('jenisrs', $p->jenisrs, isset($jenisrs) && $p->jenisrs == $jenisrs ? TRUE : FALSE) . '">' . $p->jenisrs . ' - ' . $p->uraian . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <?php echo form_error('jenisrs', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-right"><strong class="text-danger">', '</strong></div></div>'); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kepemilikan</strong></td><td>:</td>
                                            <td>
                                                <select data-placeholder="" class="form-control input-sm nsearch" name="kepemilikan_rs" id="kepemilikan_rs">
                                                    <option value=""></option> 
                                                    <option value="Kemkes/Pemprop/Pemkab/Kota/dll" <?php echo set_select('kepemilikan_rs', 'Kemkes/Pemprop/Pemkab/Kota/dll', isset($kepemilikan_rs) && 'Kemkes/Pemprop/Pemkab/Kota/dll' == $kepemilikan_rs ? TRUE : FALSE); ?>>Kemkes/Pemprop/Pemkab/Kota/dll</option>
                                                    <option value="TNI/Polri" <?php echo set_select('kepemilikan_rs', 'TNI/Polri', isset($kepemilikan_rs) && 'TNI/Polri' == $kepemilikan_rs ? TRUE : FALSE); ?>>TNI/Polri</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kelas RS<span class="small color-alizarin">*)</span></strong></td><td>:</td>
                                            <td>
                                                <select data-placeholder="" class="form-control input-sm nsearch" name="kelasrs" id="kelasrs">
                                                    <option value=""></option> 
                                                    <option value="A" <?php echo set_select('kelasrs', 'A', isset($kelasrs) && 'A' == $kelasrs ? TRUE : FALSE); ?>>A</option>
                                                    <option value="B" <?php echo set_select('kelasrs', 'B', isset($kelasrs) && 'B' == $kelasrs ? TRUE : FALSE); ?>>B</option>
                                                    <option value="C" <?php echo set_select('kelasrs', 'C', isset($kelasrs) && 'C' == $kelasrs ? TRUE : FALSE); ?>>C</option>
                                                    <option value="D" <?php echo set_select('kelasrs', 'D', isset($kelasrs) && 'D' == $kelasrs ? TRUE : FALSE); ?>>D</option>
                                                    <option value="1" <?php echo set_select('kelasrs', '1', isset($kelasrs) && '1' == $kelasrs ? TRUE : FALSE); ?>>1</option>
                                                    <option value="2" <?php echo set_select('kelasrs', '2', isset($kelasrs) && '2' == $kelasrs ? TRUE : FALSE); ?>>2</option>
                                                    <option value="3" <?php echo set_select('kelasrs', '3', isset($kelasrs) && '3' == $kelasrs ? TRUE : FALSE); ?>>3</option>
                                                    <option value="4" <?php echo set_select('kelasrs', '4', isset($kelasrs) && '4' == $kelasrs ? TRUE : FALSE); ?>>4</option>
                                                    <option value="tanpa kelas" <?php echo set_select('kelasrs', 'tanpa kelas', isset($kelasrs) && 'tanpa kelas' == $kelasrs ? TRUE : FALSE); ?>>tanpa kelas</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>NIP Direktur</strong></td><td>:</td>
                                            <td><input type="text" class="form-control input-sm" id="nip_dir" name="nip_dir" autocomplete="off" value="<?php echo set_value('nip_dir', isset($nip_dir) ? $nip_dir : ''); ?>"></td>
                                        </tr>

                                        <tr>
                                            <td><strong>Nama Direktur</strong></td><td>:</td>
                                            <td><input type="text" class="form-control input-sm" id="nama_dir" name="nama_dir" autocomplete="off" value="<?php echo set_value('nama_dir', isset($nama_dir) ? $nama_dir : ''); ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Penyelenggara</strong></td><td>:</td>
                                            <td><input type="text" class="form-control input-sm" id="nama_penyelengara" name="nama_penyelengara" autocomplete="off" value="<?php echo set_value('nama_penyelengara', isset($nama_penyelengara) ? $nama_penyelengara : ''); ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status Penyelenggara</strong></td><td>:</td>
                                            <td>
                                                <select data-placeholder="" class="form-control input-sm nsearch" name="status_pey_swasta" id="status_pey_swasta">
                                                    <option value=""></option> 
                                                    <option value="Islam" <?php echo set_select('status_pey_swasta', 'Islam', isset($status_pey_swasta) && 'Islam' == $status_pey_swasta ? TRUE : FALSE); ?>>Islam</option>
                                                    <option value="Khatolik" <?php echo set_select('status_pey_swasta', 'Khatolik', isset($status_pey_swasta) && 'Khatolik' == $status_pey_swasta ? TRUE : FALSE); ?>>Khatolik</option>
                                                    <option value="Protestan" <?php echo set_select('status_pey_swasta', 'Protestan', isset($status_pey_swasta) && 'Protestan' == $status_pey_swasta ? TRUE : FALSE); ?>>Protestan</option>
                                                    <option value="Hindu" <?php echo set_select('status_pey_swasta', 'Hindu', isset($status_pey_swasta) && 'Hindu' == $status_pey_swasta ? TRUE : FALSE); ?>>Hindu</option>
                                                    <option value="Budha" <?php echo set_select('status_pey_swasta', 'Budha', isset($status_pey_swasta) && 'Budha' == $status_pey_swasta ? TRUE : FALSE); ?>>Budha</option>
                                                    <option value="Organisasi Sosial" <?php echo set_select('status_pey_swasta', 'Organisasi Sosial', isset($status_pey_swasta) && 'Organisasi Sosial' == $status_pey_swasta ? TRUE : FALSE); ?>>Organisasi Sosial</option>
                                                    <option value="Perusahaan" <?php echo set_select('status_pey_swasta', 'Perusahaan', isset($status_pey_swasta) && 'Perusahaan' == $status_pey_swasta ? TRUE : FALSE); ?>>Perusahaan</option>
                                                    <option value="Perorangan" <?php echo set_select('status_pey_swasta', 'Perorangan', isset($status_pey_swasta) && 'Perorangan' == $status_pey_swasta ? TRUE : FALSE); ?>>Perorangan</option>
                                                </select>                                                
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-sm-5">
                                    <table class="table table-condensed">                                                
                                        <tr>
                                            <td class="col-sm-3"><strong>Akreditasi RS</strong></td><td>:</td>
                                            <td>
                                                <select data-placeholder="" class="form-control input-sm nsearch" name="akreditasirs" id="akreditasirs">
                                                    <option value=""></option> 
                                                    <option value="Sudah" <?php echo set_select('akreditasirs', 'Sudah', isset($akreditasirs) && 'Sudah' == $akreditasirs ? TRUE : FALSE); ?>>Sudah</option>
                                                    <option value="Belum" <?php echo set_select('akreditasirs', 'Belum', isset($akreditasirs) && 'Belum' == $akreditasirs ? TRUE : FALSE); ?>>Belum</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Pertahapan</strong></td><td>:</td>
                                            <td>
                                                <select data-placeholder="" class="form-control input-sm nsearch" name="ak_pertahapan" id="ak_pertahapan">
                                                    <option value=""></option> 
                                                    <option value="5 Pelayanan" <?php echo set_select('ak_pertahapan', '5 Pelayanan', isset($ak_pertahapan) && '5 Pelayanan' == $ak_pertahapan ? TRUE : FALSE); ?>>5 Pelayanan</option>
                                                    <option value="12 Pelayanan" <?php echo set_select('ak_pertahapan', '12 Pelayanan', isset($ak_pertahapan) && '12 Pelayanan' == $ak_pertahapan ? TRUE : FALSE); ?>>12 Pelayanan</option>
                                                    <option value="16 Pelayanan" <?php echo set_select('ak_pertahapan', '16 Pelayanan', isset($ak_pertahapan) && '16 Pelayanan' == $ak_pertahapan ? TRUE : FALSE); ?>>16 Pelayanan</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tgl. Akreditasi</strong></td><td>:</td>
                                            <td>
                                                <div class="input-group col-sm-5">
                                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                    <input type="text" class="form-control input-sm" id="ak_tgl" name="ak_tgl" autocomplete="off" value="<?php echo set_value('ak_tgl', isset($ak_tgl) ? $ak_tgl : ''); ?>">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status Akreditasi</strong></td><td>:</td>
                                            <td>
                                                <select data-placeholder="" class="form-control input-sm nsearch" name="ak_status" id="ak_status">
                                                    <option value=""></option> 
                                                    <option value="Penuh" <?php echo set_select('ak_status', 'Penuh', isset($ak_status) && 'Penuh' == $ak_status ? TRUE : FALSE); ?>>Penuh</option>
                                                    <option value="Bersyarat" <?php echo set_select('ak_status', 'Bersyarat', isset($ak_status) && 'Bersyarat' == $ak_status ? TRUE : FALSE); ?>>Bersyarat</option>
                                                    <option value="Gagal" <?php echo set_select('ak_status', 'Gagal', isset($ak_status) && 'Gagal' == $ak_status ? TRUE : FALSE); ?>>Gagal</option>
                                                </select>
                                            </td>
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
                                            <td class="col-sm-3"><strong>Alamat</strong></td><td>:</td>
                                            <td><input type="text" class="form-control input-sm" id="alamat" name="alamat" autocomplete="off" value="<?php echo set_value('alamat', isset($alamat) ? $alamat : ''); ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kota</strong></td><td>:</td>
                                            <td><input type="text" class="form-control input-sm" id="kota" name="kota" disabled autocomplete="off" value="<?php echo set_value('kota', isset($kota) ? $kota : ''); ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Kodepos</strong></td><td>:</td>
                                            <td>
                                                <select data-placeholder="pilih kodepos" class="form-control input-sm wsearch" name="kdps" id="kdps">
                                                    <option value=""></option> 
                                                    <?php
                                                    foreach ($kdp as $p) {
                                                        echo '<option value="' . $p->kodepos . ';;' . $p->kabupaten . '"' . set_select('kdps', $p->kodepos . ';;' . $p->kabupaten, isset($kdps) && $p->kodepos . ';;' . $p->kabupaten == $kdps ? TRUE : FALSE) . '">' . $p->kodepos . ' | ' . $p->kelurahan . ' | ' . $p->kecamatan . ' | ' . $p->kabupaten . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Telepon</strong></td><td>:</td>
                                            <td><input type="text" class="form-control input-sm" id="telp" name="telp" autocomplete="off" value="<?php echo set_value('telp', isset($telp) ? $telp : ''); ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Fax</strong></td><td>:</td>
                                            <td><input type="text" class="form-control input-sm" id="fax" name="fax" autocomplete="off" value="<?php echo set_value('fax', isset($fax) ? $fax : ''); ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email</strong></td><td>:</td>
                                            <td><input type="text" class="form-control input-sm" id="email" name="email" autocomplete="off" value="<?php echo set_value('email', isset($email) ? $email : ''); ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Telp. Humas</strong></td><td>:</td>
                                            <td><input type="text" class="form-control input-sm" id="telp_humas" name="telp_humas" autocomplete="off" value="<?php echo set_value('telp_humas', isset($telp_humas) ? $telp_humas : ''); ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Website</strong></td><td>:</td>
                                            <td><input type="text" class="form-control input-sm" id="website" name="website" autocomplete="off" value="<?php echo set_value('website', isset($website) ? $website : ''); ?>"></td>
                                        </tr>
                                    </table>                                            
                                </div>
                                <div class="col-sm-5">
                                    <table class="table table-condensed">
                                        <tr>
                                            <td colspan="3" class="text-center text-primary" style="background: rgba(255,255,255,0.5);"><strong>Luas Kawasan Rumah Sakit</strong></td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-3"><strong>Luas Tanah</strong></td><td>:</td>
                                            <td><input type="text" class="form-control input-sm" id="luas_tanah" name="luas_tanah" autocomplete="off" value="<?php echo set_value('luas_tanah', isset($luas_tanah) ? $luas_tanah : ''); ?>"></td>
                                        </tr>                                                
                                        <tr>
                                            <td><strong>Luas Bangunan</strong></td><td>:</td>
                                            <td><input type="text" class="form-control input-sm" id="luas_bgn" name="luas_bgn" autocomplete="off" value="<?php echo set_value('luas_bgn', isset($luas_bgn) ? $luas_bgn : ''); ?>"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-center text-primary" style="background: rgba(255,255,255,0.5);"><strong>Dok. Legalitas Penetapan Rumah Sakit</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>No. Izin</strong></td><td>:</td>
                                            <td><input type="text" class="form-control input-sm" id="no_ijin" name="no_ijin" autocomplete="off" value="<?php echo set_value('no_ijin', isset($no_ijin) ? $no_ijin : ''); ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal</strong></td><td>:</td>
                                            <td>
                                                <div class="input-group col-sm-5">
                                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                    <input type="text" class="form-control input-sm" id="tgl_ijin" name="tgl_ijin" autocomplete="off" value="<?php echo set_value('tgl_ijin', isset($tgl_ijin) ? $tgl_ijin : ''); ?>">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Oleh</strong></td><td>:</td>
                                            <td><input type="text" class="form-control input-sm" id="oleh_ijin" name="oleh_ijin" autocomplete="off" value="<?php echo set_value('oleh_ijin', isset($oleh_ijin) ? $oleh_ijin : ''); ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Sifat</strong></td><td>:</td>
                                            <td><input type="text" class="form-control input-sm" id="sifat_ijin" name="sifat_ijin" autocomplete="off" value="<?php echo set_value('sifat_ijin', isset($sifat_ijin) ? $sifat_ijin : ''); ?>"></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Masa Berlaku s/d tahun</strong></td><td>:</td>
                                            <td><input type="text" class="form-control input-sm" id="masa_berlaku_th" name="masa_berlaku_th" autocomplete="off" value="<?php echo set_value('masa_berlaku_th', isset($masa_berlaku_th) ? $masa_berlaku_th : ''); ?>"></td>
                                        </tr>
                                    </table>
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