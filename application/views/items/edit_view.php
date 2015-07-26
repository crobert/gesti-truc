<?php
/**
 * @var $categories array
 * @var $i object
 */
?>
<!-- ----------------------------------------------- Update item form ----------------------------------------------- -->

<form name="item_edit" id="item_edit" class="formular" enctype="multipart/form-data"
      action="<?php echo site_url('items/edit/'.$i->id); ?>" method="post" >

    <div class="actions">
        <div class="bloc_g">
            <a href="<?php echo site_url('items'); ?>">
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
    <input type="hidden" name="category_id" id="category_id" value="<?php echo $i->category_id; ?>">
    <!--Fields to complete-->
    <label for="name">Nom</label><input name="name" id="name" value="<?php echo $i->name; ?>">
    <label for="description">Description</label><input name="description" id="description" value="<?php echo $i->description; ?>">
    <label for="category">Catégorie</label>
    <select name="category" id="category" class="chzn-select" disabled>
        <?php foreach($categories as $cat) : ?>
            <option value="<?php echo $cat->id; ?>" <?php echo set_select('category_id', $cat->id, $cat->id==$i->category_id);?> ><?php echo $cat->name; ?></option>
        <?php endforeach; ?>
    </select>
</form>
