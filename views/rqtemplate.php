<div class="row col-md-8 col-sm-8 col-xs-12">
    <div class="text-justify">
       <p class="title">Sign In Member</p>
    </div> 
    <?php
    $message = $this->session->flashdata('message');
    echo $message == '' ? '' : $message;
    ?>      
    <div class="col-sm-12">    
        <?php echo $msg; ?>        
        <div class="panel panel-default">
            <div class="panel-body">
                <form action="<?php echo $action; ?>" id="signin-form" class="form-horizontal form" method="post">  
                    <fieldset class="control-label">                                
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="un">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="un" name="un" value="<?php echo set_value('un', isset($un) ? $un : ''); ?>" autocomplete="off">
                                <?php echo form_error('un', '<span class="help-block pull-left"><strong class="text-danger">', '</strong></span>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="pwd">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="pwd" name="pwd" value="<?php echo set_value('pwd', isset($pwd) ? $pwd : ''); ?>" autocomplete="off">
                                <?php echo form_error('pwd', '<span class="help-block pull-left"><strong class="text-danger">', '</strong></span>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-6 col-md-6 bottom-right">
                                <button type="submit" name="submit" class="btn btn-warning btn-sm" value="submit"><strong>sign in</strong></button>
                            </div>
                        </div>
                    </fieldset>
                </form>    
            </div>
            <div class="panel-footer" style="padding: 0;"><a href="<?php echo base_url(); ?>" class="btn btn-link" role="button"><span class="glyphicon glyphicon-hand-left"></span> Batal</a></div>
        </div>
    </div>
</div> 