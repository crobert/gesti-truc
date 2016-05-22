<?php
/**
 * @var $i object
 */
?>
<!-- ----------------------------------------------- Details of an item ----------------------------------------------- -->

<h1 class="titrePage"><?php echo $i->name; ?></h1>

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
    </div>
    <div class="bloc_d">&nbsp;
    </div>
</div>


<?php if ($i->description != "") : ?>
<div class="control-group">
    <label for="description">Description</label>

    <div class="controls">
        <?php echo $i->description; ?>
    </div>
</div>
<?php endif; ?>

<?php if ($i->collectedDate != "0000-00-00") : ?>
<div class="control-group">
    <label for="collectedDate">Date de collection</label>
    <div class="controls">
       <?php echo $i->collectedDate; ?>
    </div>
</div>
<?php endif; ?>

<?php if ($i->date != "0000-00-00") : ?>
<div class="control-group">
    <label for="date">Date</label>
    <div class="controls">
        <?php echo $i->date; ?>
    </div>
</div>
<?php endif; ?>

<?php if ($i->from != "") : ?>
<div class="control-group">
    <label for="from">Reçu de</label>
    <div class="controls">
        <?php echo $i->from; ?>
    </div>
</div>
<?php endif; ?>

<?php if ($i->value != "0.00") : ?>
<div class="control-group">
    <label for="value">Valeur</label>
    <div class="controls">
        <?php echo $i->value; ?>
    </div>
</div>
<?php endif; ?>