<?php
/**
 * @var $c object
 */
?>
<!-- ----------------------------------------------- Fomulaire de nouveau memo ----------------------------------------------- -->

<form name="user_edit" id="user_edit" class="formular" enctype="multipart/form-data"
      action="<?php echo site_url('users/edit/'.$u->id); ?>" method="post" >

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
    <!--Champs invisibles pour l'utilisateurs-->

    <!--Champs à remplir par l'utilisateurs-->
    <label for="name">Nom</label><input name="name" id="name" value="<?php echo $u->name; ?>">
    <label for="username">Username</label><input name="username" id="username" value="<?php echo $u->username; ?>">
    <label for="email">Email</label><input name="email" id="email" value="<?php echo $u->email; ?>">
</form>
