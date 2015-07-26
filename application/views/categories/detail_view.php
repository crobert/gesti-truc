<?php
/**
 * @var $c object
 * @var $items array
 */
?>
<!-- ----------------------------------------------- Details of a category ----------------------------------------------- -->

    <div class="actions">
        <div class="bloc_g">
            <a href='<?php echo site_url('categories/edit/'.$c->id);?>'>
                <input class="btn btn-info" type="button" value="Modifier" name="Submit"/>
            </a>
            <a href="<?php echo site_url('collections'); ?>">
                <input class="btn btn-info" type="button" value="Retour" name="Submit"/>
            </a>

            <a href="<?php echo site_url('items/add/'.$c->id); ?>">
                <input class="btn btn-info" type="button" value="Ajouter un item" name="Submit"/>
            </a>
        </div>
        <div class="bloc_d">&nbsp;
        </div>
    </div>

    <label for="name">Nom</label><?php echo $c->name; ?><br>
    <label for="description">Description</label><?php echo $c->description; ?><br>

<h1>Items</h1>
<?php foreach($items as $i){ ?>
    <a class="vignetteLink" href='<?php echo site_url('items/detail/'.$i->id);?>'>
        <div class="vignette">
            <?php echo $i->name;  ?>
        </div>
    </a>
<?php } ?>

