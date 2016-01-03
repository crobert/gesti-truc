<?php
/**
 * @var $c object
 * @var $categories array
 */
?>
<!-- ----------------------------------------------- Details of a  collection ----------------------------------------------- -->

    <div class="actions">
        <div class="bloc_g">
            <a href='<?php echo site_url('collections/edit/'.$c->id);?>'>
                <input class="btn btn-info" type="button" value="Modifier" name="Submit"/>
            </a>
            <a href="<?php echo site_url('collections'); ?>">
                <input class="btn btn-info" type="button" value="Retour" name="Submit"/>
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
                 style="background: url('<?php echo base_url('uploads/categories/' . $c->picture); ?>')">
                <?php else : ?>
                <div class="vignette">
                    <?php endif; ?>
                </div>
                <span class="titreVignette"><?php echo $c->name; ?></span>
        </a>
    </div>
<?php } ?>

