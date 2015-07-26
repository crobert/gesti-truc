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

    <!--Fields to complete-->
    <label for="name">Nom</label><input name="name" id="name" value="">
    <label for="description">Description</label><input name="description" id="description" value="">
    <label for="category_id">Catégorie</label>
    <select name="category_id" id="category_id" class="chzn-select">
        <?php foreach($categories as $c) : ?>
            <option value="<?php echo $c->id; ?>" <?php echo set_select('category_id', $c->id, $c->id==$category);?> ><?php echo $c->name; ?></option>
        <?php endforeach; ?>
    </select>

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