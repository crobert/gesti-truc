<?php
/**
 * @var $c object
 * @var $items array
 */
?>
<!-- ----------------------------------------------- Details of a category ----------------------------------------------- -->

<h2>&Eacute;léments de <?php echo $c->name; ?> <a title="nouvel élément" href="<?php echo site_url('categories/add/'.$c->id); ?>">+</a></h2>

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

<br>