<?php
/**
 * @var $collections array
 */
?>
<a href="<?php echo site_url('collections/add'); ?>">
    <input class="btn btn-info" type="button" value="Ajouter une collection" name="Ajouter"/>
</a>
<br/>
<br/>

<?php foreach ($collections as $c) { ?>
    <div class="vignette">
        <a class="vignetteLink" href='<?php echo site_url('collections/detail/' . $c->id); ?>'>
            <?php if ($c->picture != '') : ?>
            <div class="vignette"
                 style="background: url('<?php echo base_url('uploads/collections/' . $c->picture); ?>')">
            <?php else : ?>
                <div class="vignette">
            <?php endif; ?>
                </div>
            <span class="titreVignette"><?php echo $c->name; ?></span>
        </a>
    </div>
<?php } ?>
