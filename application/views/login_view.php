<?php
/**
 *
 */
?>
<!-- ----------------------------------------------- Login form ----------------------------------------------- -->

<form name="login" id="login" class="formular" enctype="multipart/form-data"
      action="<?php echo site_url('login/'); ?>" method="post" >

    <div class="actions">
        <div class="bloc_g">&nbsp;
        </div>
        <div class="bloc_c">
            <input class="btn btn-success" type="submit" value="Connexion"/>
        </div>
        <div class="bloc_d">&nbsp;
        </div>
    </div>
    <!--invisible fields-->
    <?php echo form_error('username'); ?>
    <?php echo form_error('password'); ?>
    <!--Fields to complete-->
    <label for="username">Username</label><input name="username" id="username" value="">
    <label for="password">Password</label><input name="password" id="password" value="" type="password">
</form>
