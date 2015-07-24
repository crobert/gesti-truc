<?php
/**
 * @var $tiersChoisi int
 * @var $tiers array
 * @var $departements array
 */
?>
<!-- ----------------------------------------------- Fomulaire de nouveau memo ----------------------------------------------- -->

<form name="collection_add" id="collection_add" class="formular" enctype="multipart/form-data"
      action="<?php echo site_url('collections/add/'); ?>" method="post" >

    <div class="actions">
        <div class="bloc_g">
            <a href="<?php echo site_url('collections'); ?>">
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
    <label for="name">Nom</label><input name="name" id="name" value="">
    <label for="description">Description</label><input name="description" id="description" value="">
    <label for="type">Type</label><input name="type" id="type" value="">
</form>