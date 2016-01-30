<?php
/**
 * @var $categories array
 * @var $category int
 */
?>
<!-- ----------------------------------------------- New item form ----------------------------------------------- -->

<form name="item_add" id="item_add" class="formular" enctype="multipart/form-data"
      action="<?php echo site_url('items/add/'); ?>" method="post" >

    <div class="actions">
        <div class="bloc_g">
            <input class="btn btn-success" type="submit" value="Enregistrer"/>
            <?php //Get the source to know where to redirect
            $url = 'categories';
            if ($category != "") {
                $url .= '/detail/' . $category;
            }
            ?>
            <a href="<?php echo site_url($url); ?>">
                <input class="btn btn-warning" type="button" value="Annuler" name="Submit"/>
            </a>
        </div>
        <div class="bloc_c">
        </div>
        <div class="bloc_d">&nbsp;
        </div>
    </div>
    <!--invisible fields-->

    <!--Fields to complete-->
    <div class="control-group">
        <label for="name">Nom</label>
        <div class="controls">
            <input type="text" name="name" id="name" placeholder="" value="<?php echo set_value('name'); ?>" required>
        </div>
    </div>

    <div class="control-group">
        <label for="description">Description</label>
        <div class="controls">
            <input type="text" name="description" id="description" placeholder=""
                   value="<?php echo set_value('description'); ?>" >
        </div>
    </div>

    <div class="control-group">
        <label for="category_id">Catégorie</label>
        <div class="controls">
            <select name="category_id" id="category_id" class="chzn-select w150">
                <?php foreach($categories as $c) : ?>
                    <option value="<?php echo $c->id; ?>"
                        <?php echo set_select('category_id', $c->id, $c->id==$category);?> ><?php echo $c->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label for="collectedDate">Date de collection</label>
        <div class="controls">
            <input type="text" name="collectedDate" id="collectedDate" placeholder="" value="<?php echo set_value('collectedDate'); ?>" required>
        </div>
    </div>

    <div class="control-group">
        <label for="date">Date</label>
        <div class="controls">
            <input type="text" name="date" id="date" placeholder="" value="<?php echo set_value('date'); ?>" >
        </div>
    </div>

    <div class="control-group">
        <label for="from">Reçu de</label>
        <div class="controls">
            <input type="text" name="from" id="from" placeholder="" value="<?php echo set_value('from'); ?>" >
        </div>
    </div>

    <div class="control-group">
        <label for="value">Valeur</label>
        <div class="controls">
            <input type="text" name="value" id="value" placeholder="" value="<?php echo set_value('value'); ?>" >
        </div>
    </div>

    <div class="control-group">
        <label for="picture">Image</label>
        <div class="controls">
            <input type="file" name="picture" id="picture" placeholder="" value="<?php echo set_value('picture'); ?>" >
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
            {
                no_results_text: "Aucun r&eacute;sultat ne correspond &agrave;",
                allow_single_deselect: true
            }
        );
    });
</script>