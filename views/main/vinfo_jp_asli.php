<div class="row mb1">
    <div class="col-sm-12">
        <h4 class="ttl color-black border-midnightblue"><span>JADWAL</span> PELAYANAN <span>POLIKLINIK</span></h4>
        <?php if (!empty($jdw)) { ?>
            <div class="table-responsive">
                <table id="tbl4" class="table table-condensed table-striped" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-midnightblue color-white">
                            <th>NO</th>
                            <th>HARI</th>
                            <th>POLIKLINIKk</th>
                            <th>DOKTER</th>
                            <th>WAKTU PRAKTEK</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jdw as $i => $r) { ?>
                            <tr>
                                <td><?php echo $i + 1; ?></td>  
                                <td><?php echo $r->hari; ?></td> 
                                <td><?php echo $r->poli; ?></td>
                                <td><?php echo $r->dokter; ?></td> 
                                <td><?php echo $r->jmulai . ' - ' . $r->jend . ' WITA'; ?></td>  
                            </tr>
                        <?php } ?>
                    </tbody> 
                </table>
            </div>
        <?php } ?>  
    </div>
</div>