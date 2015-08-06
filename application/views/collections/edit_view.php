<?php
/**
 * @var $c object
 */
?>
<!-- ----------------------------------------------- Update collection form ----------------------------------------------- -->

<form name="collection_edit" id="collection_edit" class="formular" enctype="multipart/form-data"
      action="<?php echo site_url('collections/edit/'.$c->id); ?>" method="post" >

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
    <!--invisible fields-->

    <!--Fields to complete-->
    <label for="name">Nom</label><input name="name" id="name" value="<?php echo $c->name; ?>">
    <label for="description">Description</label><input name="description" id="description" value="<?php echo $c->description; ?>">
    <label for="type">Type</label><input name="type" id="type" value="<?php echo $c->type; ?>">
    <?php if($c->picture != ''){ echo "<p>Image déjà existante : $c->picture</p>";} ?>
    <label for="picture">Image</label><input type="file" name="picture" id="picture">
</form>
