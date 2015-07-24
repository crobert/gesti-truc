<?php
/**
 * @var $c object
 */
?>
<!-- ----------------------------------------------- Update category form ----------------------------------------------- -->

<form name="category_edit" id="category_edit" class="formular" enctype="multipart/form-data"
      action="<?php echo site_url('categories/edit/'.$c->id); ?>" method="post" >

    <div class="actions">
        <div class="bloc_g">
            <a href="<?php echo site_url('categories'); ?>">
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
    <label for="collection_id">Collection</label><input name="collection_id" id="collection_id" value="<?php echo $c->collection_id; ?>">
    <label for="parent_id">Parent</label><input name="parent_id" id="parent_id" value="<?php echo $c->parent_id; ?>">
</form>
