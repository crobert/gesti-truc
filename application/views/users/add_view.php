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
            <input class="btn btn-success" type="submit" value="Enregistrer"/>
            <a href="<?php echo site_url('users'); ?>">
                <input class="btn btn-warning" type="button" value="Annuler" name="Submit"/>
            </a>
        </div>
        <div class="bloc_c">&nbsp;
        </div>
        <div class="bloc_d">&nbsp;
        </div>
    </div>
    <!--invisible fields-->

    <!--Fields to complete-->

    <div class="control-group">
        <label for="name">Nom</label>
        <div class="controls">
            <input type="text" name="name" id="name" placeholder="" value="<?php echo set_value('name'); ?>" required>
        </div>
    </div>

    <div class="control-group">
        <label for="username">Username</label>
        <div class="controls">
            <input type="text" name="username" id="username" placeholder="" value="<?php echo set_value('username'); ?>" required>
        </div>
    </div>

    <div class="control-group">
        <label for="email">Email</label>
        <div class="controls">
            <input type="text" name="email" id="email" placeholder="" value="<?php echo set_value('email'); ?>" required>
        </div>
    </div>

</form>
