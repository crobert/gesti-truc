<?php
/**
 * @var $collections array
 * @var $collection object
 * @var $c object
 */
?>
<!-- ----------------------------------------------- Update category form ----------------------------------------------- -->

<form name="category_edit" id="category_edit" class="formular" enctype="multipart/form-data"
      action="<?php echo site_url('categories/edit/'.$c->id); ?>" method="post" >

    <div class="actions">
        <div class="bloc_g">
            <input class="btn btn-success" type="submit" value="Enregistrer"/>
            <a href="<?php echo site_url('categories/detail/'.$c->id); ?>">
                <input class="btn btn-warning" type="button" value="Annuler" name="Submit"/>
            </a>
        </div>
        <div class="bloc_c">
        </div>
        <div class="bloc_d">&nbsp;
        </div>
    </div>
    <!--invisible fields-->
    <input type="hidden" name="collection_id" id="collection_id" value="<?php echo $c->collection_id; ?>">
    <!--Fields to complete-->
    <div class="control-group">
        <label for="name">Nom</label>
        <div class="controls">
            <input type="text" name="name" id="name" placeholder="" value="<?php echo set_value('name',$c->name); ?>" required>
        </div>
    </div>

    <div class="control-group">
        <label for="description">Description</label>
        <div class="controls">
            <input type="text" name="description" id="description" placeholder=""
                   value="<?php echo set_value('description',$c->description); ?>" >
        </div>
    </div>

    <div class="control-group">
        <label for="collection">Collection</label>
        <div class="controls">
            <?php echo $collection->name ?>
        </div>
    </div>

    <div class="control-group">
        <label for="picture">Image</label>
        <div class="controls">
            <input type="file" name="picture" id="picture" placeholder="" value="<?php echo set_value('picture'); ?>" >
            <?php if($c->picture != ''){ echo "<p>Image déjà existante : $c->picture</p>";} ?>
        </div>
    </div>

    <div class="control-group">
        <label for="parent_id">Parent</label>
        <div class="controls">
            <input type="text" name="parent_id" id="parent_id" placeholder=""
                   value="<?php echo set_value('parent_id',$c->parent_id); ?>" >
        </div>
    </div>

</form>
