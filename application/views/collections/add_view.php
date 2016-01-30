<?php
/**
 *
 */
?>
<!-- ----------------------------------------------- New collection form----------------------------------------------- -->

<form name="collection_add" id="collection_add" class="formular" enctype="multipart/form-data"
      action="<?php echo site_url('collections/add/'); ?>" method="post" >

    <div class="actions">
        <div class="bloc_g">
            <input class="btn btn-success" type="submit" value="Enregistrer"/>
            <a href="<?php echo site_url('collections'); ?>">
                <input class="btn btn-warning" type="button" value="Annuler" name="Submit"/>
            </a>
        </div>
        <div class="bloc_c">
        </div>
        <div class="bloc_d">&nbsp;
        </div>
    </div>
    <!--invisible fields-->

    <!--Fields to complete-->
    <?php echo validation_errors(); ?>

    <div class="control-group">
        <label for="name">Nom</label>
        <div class="controls">
            <input type="text" name="name" id="name" placeholder="" value="<?php echo set_value('name'); ?>" required>
        </div>
    </div>
    <div class="control-group">
        <label for="description">Description</label>
        <div class="controls">
            <input type="text" name="description" id="description" placeholder=""
                   value="<?php echo set_value('description'); ?>" >
        </div>
    </div>
    <div class="control-group">
        <label for="type">Type</label>
        <div class="controls">
            <input type="text" name="type" id="type" placeholder="" value="<?php echo set_value('type'); ?>" >
        </div>
    </div>
    <div class="control-group">
        <label for="picture">Image</label>
        <div class="controls">
            <input type="file" name="picture" id="picture" placeholder="" value="<?php echo set_value('picture'); ?>" >
        </div>
    </div>
</form>
