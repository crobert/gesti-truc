<?php
/**
 * @var $i object
 */
?>
<!-- ----------------------------------------------- Details of an item ----------------------------------------------- -->

<div class="actions">
    <div class="bloc_g">
        <a href='<?php echo site_url('items/edit/' . $i->id); ?>'>
            <input class="btn btn-info" type="button" value="Modifier" name="Submit"/>
        </a>
        <a href="<?php echo site_url('items/delete/' . $i->id); ?>">
            <input class="btn btn-danger" type="button" value="Supprimer" name="Supprimer"/>
        </a>
        <a href="<?php echo site_url('categories/detail/' . $i->category_id); ?>">
            <input class="btn btn-warning" type="button" value="Retour" name="Retour"/>
        </a>
        <!--
            <a href="<?php //echo site_url('items/add/' . $i->id); ?>">
                <input class="btn btn-info" type="button" value="Ajouter un item" name="Submit"/>
            </a>
            -->
    </div>
    <div class="bloc_d">&nbsp;
    </div>
</div>


<div class="control-group">
    <label for="name">Nom</label>

    <div class="controls">
        <?php echo $i->name; ?>
    </div>
</div>

<div class="control-group">
    <label for="description">Description</label>

    <div class="controls">
        <?php echo $i->description; ?>
    </div>
</div>

