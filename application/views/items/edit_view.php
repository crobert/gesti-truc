<?php
/**
 * @var $categories array
 * @var $collection object
 * @var $i object
 */
?>
<!-- ----------------------------------------------- Update item form ----------------------------------------------- -->

<form name="item_edit" id="item_edit" class="formular" enctype="multipart/form-data"
      action="<?php echo site_url('items/edit/'.$i->id); ?>" method="post" >


    <div class="actions">
        <div class="bloc_g">
            <input class="btn btn-success" type="submit" value="Enregistrer"/>
            <a href="<?php echo site_url('items/detail/'.$i->id); ?>">
                <input class="btn btn-warning" type="button" value="Annuler" name="Submit"/>
            </a>
        </div>
        <div class="bloc_c">
        </div>
        <div class="bloc_d">&nbsp;
        </div>
    </div>

    <!--invisible fields-->
    <input type="hidden" name="category_id" id="category_id" value="<?php echo $i->category_id; ?>">
    <!--Fields to complete-->
    <div class="control-group">
        <label for="name">Nom</label>
        <div class="controls">
            <input type="text" name="name" id="name" placeholder="" value="<?php echo set_value('name', $i->name); ?>" required>
        </div>
    </div>

    <div class="control-group">
        <label for="description">Description</label>
        <div class="controls">
            <input type="text" name="description" id="description" placeholder=""
                   value="<?php echo set_value('description', $i->description); ?>" >
        </div>
    </div>


    <div class="control-group">
        <label for="collection">Collection</label>
        <div class="controls">
            <?php echo $collection->name ?>
        </div>
    </div>


    <div class="control-group">
        <label for="category">Catégorie</label>
        <div class="controls">
            <select name="category" id="category" class="chzn-select" disabled>
                <?php foreach($categories as $cat) : ?>
                    <option value="<?php echo $cat->id; ?>" <?php echo set_select('category_id', $cat->id, $cat->id==$i->category_id);?> ><?php echo $cat->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <?php $collectedDate = ($i->collectedDate != "0000-00-00")?$i->collectedDate:""; ?>
    <div class="control-group">
        <label for="collectedDate">Date de collection</label>
        <div class="controls">
            <input type="text" name="collectedDate" id="collectedDate" placeholder=""
                   value="<?php echo set_value('collectedDate',$collectedDate); ?>">
        </div>
    </div>

    <?php $date =  ($i->date != "0000-00-00")?$i->date:""; ?>
    <div class="control-group">
        <label for="date">Date</label>
        <div class="controls">
            <input type="text" name="date" id="date" placeholder="" value="<?php echo set_value('date',$date); ?>" >
        </div>
    </div>

    <div class="control-group">
        <label for="from">Reçu de</label>
        <div class="controls">
            <input type="text" name="from" id="from" placeholder="" value="<?php echo set_value('from', $i->from); ?>" >
        </div>
    </div>

    <div class="control-group">
        <label for="value">Valeur</label>
        <div class="controls">
            <input type="text" name="value" id="value" placeholder="" value="<?php echo set_value('value', $i->value); ?>" >
        </div>
    </div>

    <div class="control-group">
        <label for="picture">Image</label>
        <div class="controls">
            <input type="file" name="picture" id="picture" placeholder="" value="<?php echo set_value('picture'); ?>" >
            <?php if($i->picture != ''){ echo "<p>Image déjà existante : $i->picture</p>";} ?>
        </div>
    </div>

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