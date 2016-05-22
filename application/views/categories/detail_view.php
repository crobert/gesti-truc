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

            <a href="<?php echo site_url('items/add/'.$c->id); ?>">
                <input class="btn btn-info" type="button" value="Ajouter un item" name="Ajouter"/>
            </a>

            <a href="<?php echo site_url('categories/delete/' . $c->id); ?>">
                <input class="btn btn-danger" type="button" value="Supprimer" name="Supprimer"/>
            </a>
            <a href="<?php echo site_url('collections/detail/'.$c->collection_id); ?>">
                <input class="btn btn-warning" type="button" value="Retour" name="Retour"/>
            </a>
        </div>
        <div class="bloc_d">&nbsp;
        </div>
    </div>

<div class="control-group">
    <label for="name">Nom</label>
    <div class="controls">
        <?php echo $c->name; ?>
    </div>
</div>
<div class="control-group">
    <label for="description">Description</label>
    <div class="controls">
        <?php echo $c->description; ?>
    </div>
</div>

<?php foreach($items as $i){ ?>
    <div class="vignette">
        <a class="vignetteLink" href='<?php echo site_url('items/detail/'.$i->id);?>'>
            <?php if ($i->picture != '') : ?>
            <div class="vignette"
                 style="background: black url('<?php echo base_url('uploads/items/' . $i->picture); ?>') no-repeat center;">
                <?php else : ?>
                <div class="vignette">
                    <?php endif; ?>
                </div>
                <span class="titreVignette"><?php echo $i->name; ?></span>
        </a>
    </div>
<?php } ?>
