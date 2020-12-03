<div class="row mb1">
    <div class="col-sm-12">
        <h4 class="ttl color-black border-midnightblue">INFO <span>DOKTER</span></h4>
        <?php if (!empty($dok)) { ?>
            <div class="table-responsive">
                <table id="tbl3" class="table table-condensed table-striped" width="100%" cellspacing="0">
                    <thead>
                        <tr class="bg-midnightblue color-white">
                            <th>NAMA DOKTER</th>
                            <th>POLI</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dok as $i => $r) { ?>
                            <tr>
                                <td><?php echo $r->nama; ?></td>
                                <td><?php echo $r->poli; ?></td>
                                <td class="text-center">
                                    <?php
                                    echo $r->fgada == '1' ? '<div class="label bg-greensea"><i class="fa fa-check-square-o"></i>&nbsp;ADA&nbsp;</div>&nbsp;<div class="label bg-silver"><i class="fa fa-remove"></i>&nbsp;OFF&nbsp;</div>' : '<div class="label bg-silver"><i class="fa fa-check-square-o"></i>&nbsp;ADA&nbsp;</div>&nbsp;<div class="label label-danger"><i class="fa fa-remove"></i>&nbsp;OFF&nbsp;</div>';
                                    ?>                                        
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody> 
                </table>
            </div>
        <?php } ?>
    </div>
</div>