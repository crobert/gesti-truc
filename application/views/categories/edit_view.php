<?php
/**
 * @var $collections array
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
            <input class="btn btn-success" type="submit" value="Enregistrer"/>
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
            <select name="collection" id="collection" class="chzn-select" disabled>
                <?php foreach($collections as $col) : ?>
                    <option value="<?php echo $col->id; ?>" <?php echo set_select('collection_id', $col->id, $col->id==$c->collection_id);?> ><?php echo $col->name; ?></option>
                <?php endforeach; ?>
            </select>
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
