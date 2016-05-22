<?php
/**
 * @var $c object
 * @var $categories array
 */
?>
<!-- ----------------------------------------------- Details of a  collection ----------------------------------------------- -->
<h1 class="titrePage"><?php echo $c->name; ?></h1>

<div class="actions">
    <div class="bloc_g">
        <a href='<?php echo site_url('collections/edit/'.$c->id);?>'>
            <input class="btn btn-info" type="button" value="Modifier" name="Modifier"/>
        </a>
        <a href="<?php echo site_url('categories/add/'.$c->id); ?>">
            <input class="btn btn-info" type="button" value="Ajouter une catégorie" name="Ajouter"/>
        </a>
        <a href="<?php echo site_url('collections/delete/' . $c->id); ?>">
            <input class="btn btn-danger" type="button" value="Supprimer" name="Supprimer"/>
        </a>
        <a href="<?php echo site_url('collections'); ?>">
            <input class="btn btn-warning" type="button" value="Retour" name="Submit"/>
        </a>
    </div>
    <div class="bloc_d">&nbsp;
    </div>
</div>

<div class="control-group">
    <label for="description">Description</label>
    <div class="controls">
        <?php echo $c->description; ?>
    </div>
</div>
<div class="control-group">
    <label for="type">Type</label>
    <div class="controls">
        <?php echo $c->type; ?>
    </div>
</div>



<?php foreach ($categories as $c) { ?>
    <div class="vignette">
        <a class="vignetteLink" href='<?php echo site_url('categories/detail/'.$c->id);?>'>
            <?php if ($c->picture != '') : ?>
            <div class="vignette"
                 style="background: black url('<?php echo base_url('uploads/categories/' . $c->picture); ?>') no-repeat center;">
                <?php else : ?>
                <div class="vignette">
                    <?php endif; ?>
                </div>
                <span class="titreVignette"><?php echo $c->name; ?></span>
        </a>
    </div>
<?php } ?>

