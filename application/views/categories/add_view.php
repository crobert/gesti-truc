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
    <label for="collection_id">Collection</label>
    <select name="collection_id" id="collection_id" class="chzn-select">
        <?php foreach($collections as $c) : ?>
            <option value="<?php echo $c->id; ?>" <?php echo set_select('collection_id', $c->id, $c->id==$collection);?> ><?php echo $c->name; ?></option>
        <?php endforeach; ?>
    </select>
    <label for="parent_id">Parent</label><input name="parent_id" id="parent_id" value="">

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