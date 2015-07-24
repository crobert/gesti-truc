<?php
/**
 * @var $collections array
 */
?>
<a href="<?php echo site_url('collections/add'); ?>">Ajouter</a>
<br/>
<br/>

<?php foreach($collections as $c){ ?>
    <a class="vignetteLink" href='<?php echo site_url('collections/edit/'.$c->id);?>'>
        <div class="vignette">
            <?php echo $c->name;  ?>
        </div>
    </a>
<?php } ?>
