<?php
/**
 * @var $collections array
 * @var $collection int
 */
?>
<!-- ----------------------------------------------- New category form ----------------------------------------------- -->

<form name="category_add" id="category_add" class="formular" enctype="multipart/form-data"
      action="<?php echo site_url('categories/add/'); ?>" method="post" >

    <div class="actions">
        <div class="bloc_g">
            <a href="<?php echo site_url('categories'); ?>">
                <input class="btn btn-info" type="button" value="Annuler" name="Submit"/>
            </a>
            <input class="btn btn-success" type="submit" value="Enregistrer"/>
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
        <label for="collection_id">Collection</label>
        <div class="controls">
            <select name="collection_id" id="collection_id" class="chzn-select w150">
                <?php foreach($collections as $c) : ?>
                    <option value="<?php echo $c->id; ?>" <?php echo set_select('collection_id', $c->id, $c->id==$collection);?> ><?php echo $c->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label for="parent_id">Parent</label>
        <div class="controls">
            <input type="text" name="parent_id" id="parent_id" placeholder=""
                   value="<?php echo set_value('parent_id'); ?>" >
        </div>
    </div>

</form>

<script language="JavaScript" type="text/javascript">
    $(document).ready(function () {
        $(".chzn-select").chosen(
            {
                no_results_text: "Aucun r&eacute;sultat ne correspond &agrave;",
                allow_single_deselect: true
            }
        );
    });
</script>