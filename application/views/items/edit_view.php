<?php
/**
 * @var $categories array
 * @var $i object
 */
?>
<!-- ----------------------------------------------- Update item form ----------------------------------------------- -->

<form name="item_edit" id="item_edit" class="formular" enctype="multipart/form-data"
      action="<?php echo site_url('items/edit/'.$i->id); ?>" method="post" >

    <div class="actions">
        <div class="bloc_g">
            <a href="<?php echo site_url('items'); ?>">
                <input class="btn btn-info" type="button" value="Annuler" name="Submit"/>
            </a>
        </div>
        <div class="bloc_c">
            <input class="btn btn-success" type="submit" value="Enregistrer"/>
        </div>
        <div class="bloc_d">&nbsp;
        </div>
    </div>
    <!--invisible fields-->
    <input type="hidden" name="category_id" id="category_id" value="<?php echo $i->category_id; ?>">
    <!--Fields to complete-->
    <label for="name">Nom</label><input name="name" id="name" value="<?php echo $i->name; ?>">
    <label for="description">Description</label><input name="description" id="description" value="<?php echo $i->description; ?>">
    <label for="category">Catégorie</label>
    <select name="category" id="category" class="chzn-select" disabled>
        <?php foreach($categories as $cat) : ?>
            <option value="<?php echo $cat->id; ?>" <?php echo set_select('category_id', $cat->id, $cat->id==$i->category_id);?> ><?php echo $cat->name; ?></option>
        <?php endforeach; ?>
    </select>
    <label for="collectedDate">Date de collection</label><input name="collectedDate" id="collectedDate" value="<?php echo ($i->collectedDate != "0000-00-00")?$i->collectedDate:""; ?>">
    <label for="date">Date</label><input name="date" id="date" value="<?php echo ($i->date != "0000-00-00")?$i->date:""; ?>">
    <label for="from">Reçu de</label><input name="from" id="from" value="<?php echo $i->from; ?>">
    <label for="value">Valeur</label><input name="value" id="value" value="<?php echo $i->value; ?>">
    <label for="picture">Image</label><input name="picture" id="picture" value="<?php echo $i->picture; ?>">
</form>

<script language="JavaScript" type="text/javascript">
    $(document).ready(function () {
        $('#date').datepicker({
            dateFormat: 'dd-mm-yy'
        });
        $('#collectedDate').datepicker({
            dateFormat: 'dd-mm-yy'
        });
        $(".chzn-select").chosen(
            {no_results_text: "Aucun r&eacute;sultat ne correspond &agrave;",
                allow_single_deselect: true}
        );
    });
</script>