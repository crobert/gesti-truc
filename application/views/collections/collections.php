<?php
/**
 * @var $collections array
 */
?>
<a href="<?php echo site_url('collections/add'); ?>">Ajouter</a>
<br/>
<br/>

<?php foreach ($collections as $c) { ?>
    <a class="vignetteLink" href='<?php echo site_url('collections/detail/' . $c->id); ?>'>
        <?php if ($c->picture != '') : ?>
            <div class="vignette" style="background: url('<?php echo base_url('uploads/collections/' . $c->picture); ?>')">
        <?php else : ?>
            <div class="vignette">
        <?php endif; ?>

                <?php echo $c->name; ?>
            </div>
    </a>
<?php } ?>
