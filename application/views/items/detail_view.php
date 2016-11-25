<?php
/**
 * @var $i object
 */
?>
<!-- ----------------------------------------------- Details of an item ----------------------------------------------- -->
<h2 class="titrePage"><?php echo $i->name; ?>
    <a title="modifier" href='<?php echo site_url('items/edit/'.$i->id);?>'><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;
    <a title="supprimer" href='<?php echo site_url('items/delete/'.$i->id);?>'><i class="glyphicon glyphicon-remove"></i></a>
</h2>

<?php if ($i->picture != '') : ?>
    <img src="<?php echo base_url('uploads/items/' . $i->picture); ?>">
<?php endif; ?>

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