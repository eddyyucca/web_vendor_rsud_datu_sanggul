<div class="row mb1">
    <div class="col-sm-12">
        <h4 class="ttl color-black border-midnightblue"><span>PENDAFTARAN RAWAT JALAN</span></h4>
        <?php
        $message = $this->session->flashdata('_msg');
        if ($message == '') {
            echo '';
        } else {
            echo '<div class="alert alert-info">' . $message . '</div>';
        }
        ?>
        <p class="mt1 mb1"><?php echo $greeting1; ?> <strong class="color-green"><?php echo $pasien->nama; ?></strong>.  
            <?php echo $greeting2; ?></p>
        <div class="alert alert-info mt2 mb1">
            <table class="table table-condensed mt1 mb1">
                <tbody>
                    <tr>
                        <td class="col-sm-2">No.Rekam Medis</td>
                        <td>:</td> <th><?php echo isset($pasien->idpasien) ? $pasien->idpasien : ''; ?></th>
                    </tr>
                    <tr>
                        <td class="col-sm-2">Nama</td><td>:</td>
                        <th>
                            <?php echo isset($pasien->nama) ? $pasien->nama : ''; ?>
                        </th>
                    </tr>
                    <tr>
                        <td class="col-sm-2">Alamat</td><td>:</td>
                        <td>
                            <?php
                            echo isset($pasien->alamat) ? $pasien->alamat : ' ';
                            echo isset($pasien->rt) && $pasien->rt != '' ? ('RT.' . $pasien->rt) : ' ';
                            echo isset($pasien->rw) && $pasien->rw != '' ? ('RW.' . $pasien->rt) : ' ';
                            echo isset($pasien->kelurahan) ? $pasien->kelurahan : ' ';
                            echo isset($pasien->kecamatan) ? $pasien->kecamatan : ' ';
                            echo isset($pasien->kabupaten) ? $pasien->kabupaten : ' ';
                            echo isset($pasien->kodepos) ? $pasien->kodepos : ' ';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-sm-2">Jenis Kelamin</td><td>:</td>
                        <td><?php echo isset($pasien->sex) ? $pasien->sex : ''; ?></td>
                    </tr>
                    <tr>
                        <td class="col-sm-2">Tempat & Tgl.Lahir</td><td>:</td>
                        <td>
                            <?php
                            echo isset($pasien->tlahir) ? $pasien->tlahir . ', &nbsp;' : ' ';
                            echo isset($pasien->tgllahir) ? date('d-m-Y', strtotime($pasien->tgllahir)) : ' ';
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-sm-2">Umur</td><td>:</td>
                        <td><?php echo isset($pasien->umur) ? $pasien->umur : ''; ?></td>
                    </tr>
                    <tr>
                        <td class="col-sm-2">Jenis Kelamin</td><td>:</td>
                        <td><?php echo isset($pasien->sex) ? $pasien->sex : ''; ?></td>
                    </tr>
                    <tr>
                        <td class="col-sm-2">Penanggung Jawab</td><td>:</td>
                        <td><?php echo isset($pasien->nm_penanggungjwb) ? $pasien->nm_penanggungjwb : ''; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <form class="form-horizontal" role="form" method="post" action="<?php echo $action; ?>" id="reg">
            <div class="form-group">
                <label class="col-sm-3">Pilih Poli Tujuan</label>
                <div class="col-sm-6">
                    <select data-placeholder="pilih" class="form-control wsearch" name="kdpoli" id="kdpoli">
                        <option value=""></option> 
                        <?php
                        foreach ($poli as $p) {
                            echo '<option value="' . $p->nama_poli . '"' . set_select('kdpoli', $p->nama_poli, isset($nama_poli) && ($p->nama_poli == $nama_poli) ? TRUE : FALSE) . '">' . $p->nama_poli . '</option>';
                        }
                        ?>
                    </select>
                    <?php echo form_error('kdpoli', '<div class="popover bottom"><div class="arrow"></div><div class="popover-content text-center"><strong class="text-danger">', '</strong></div></div>'); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3">Untuk Tgl.Pendaftaran</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                        <input type="text" class="form-control input-sm" id="tgldaftar" name="tgldaftar" autocomplete="off" value="<?php echo set_value('tgldaftar', isset($tgldaftar) ? $tgldaftar : ''); ?>" placeholder="yyyy-mm-dd">
                    </div>
                </div>
                <div class="col-sm-5"><?php echo form_error('tgldaftar', '<div class="popover right"><div class="arrow"></div><div class="popover-content text-right"><strong class="text-danger">', '</strong></div></div>'); ?></div>
            </div>
            <br>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-2">   
                    <button type="submit" name="submit" class="btn2 btn-sm bg-emerald color-white shadow col-sm-12">OK</button> 
                </div>
                <div class="col-sm-2"><a href="<?php echo base_url(); ?>" class="btn2 btn-sm bg-asbestos color-white shadow center-block  col-sm-12" role="button">Batal</a> </div>
            </div>
        </form>
    </div>
</div>