<?php
/**
 *
 */
?>
<!-- ----------------------------------------------- New user form ----------------------------------------------- -->

<form name="user_add" id="user_add" class="formular" enctype="multipart/form-data"
      action="<?php echo site_url('users/add/'); ?>" method="post" >

    <div class="actions">
        <div class="bloc_g">
            <a href="<?php echo site_url('users'); ?>">
                <input class="btn btn-info" type="button" value="Annuler" name="Submit"/>
            </a>
        </div>
        <div class="bloc_c">
            <input class="btn btn-success" type="submit" value="Enregistrer"/>
        </div>
        <div class="bloc_d">&nbsp;
        </div>
    </div>
    <!--invisible fields-->

    <!--Fields to complete-->
    <label for="name">Nom</label><input name="name" id="name" value="">
    <label for="username">Username</label><input name="username" id="username" value="">
    <label for="email">Email</label><input name="email" id="email" value="">
</form>
