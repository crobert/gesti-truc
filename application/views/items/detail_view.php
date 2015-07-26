<?php
/**
 * @var $i object
 */
?>
<!-- ----------------------------------------------- Details of an item ----------------------------------------------- -->

    <div class="actions">
        <div class="bloc_g">
            <a href='<?php echo site_url('items/edit/'.$i->id);?>'>
                <input class="btn btn-info" type="button" value="Modifier" name="Submit"/>
            </a>
            <a href="<?php echo site_url('items'); ?>">
                <input class="btn btn-info" type="button" value="Retour" name="Submit"/>
            </a>

            <a href="<?php echo site_url('items/add/'.$i->id); ?>">
                <input class="btn btn-info" type="button" value="Ajouter un item" name="Submit"/>
            </a>
        </div>
        <div class="bloc_d">&nbsp;
        </div>
    </div>

    <label for="name">Nom</label><?php echo $i->name; ?><br>
    <label for="description">Description</label><?php echo $i->description; ?><br>


