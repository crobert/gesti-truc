<?php
/**
 * @var $collections array
 * @var $collection int
 */
?>
<!-- ----------------------------------------------- New category form ----------------------------------------------- -->

<form name="category_add" id="category_add" class="formular" enctype="multipart/form-data"
      action="<?php echo site_url('categories/add/'.$collection); ?>" method="post">

    <div class="actions">
        <div class="bloc_g">
            <input class="btn btn-success" type="submit" value="Enregistrer"/>
            <?php //Get the source to know where to redirect
            $url = 'collections';
            if ($collection != "") {
                $url .= '/detail/' . $collection;
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
                   value="<?php echo set_value('description'); ?>">
        </div>
    </div>

    <div class="control-group">
        <label for="collection">Collection</label>
        <div class="controls">
            <input type="hidden" name="collection_id" id="collection_id" placeholder=""
                   value="<?php echo $collection; ?>">
            <?php foreach ($collections as $c) : ?>
                <?php if( $c->id == $collection) :?>
                    <?php echo $c->name ?>

                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="control-group">
        <label for="picture">Image</label>
        <div class="controls">
            <input type="file" name="picture" id="picture" placeholder="" value="<?php echo set_value('picture'); ?>" >
        </div>
    </div>

    <div class="control-group">
        <label for="parent_id">Parent</label>

        <div class="controls">
            <input type="text" name="parent_id" id="parent_id" placeholder=""
                   value="<?php echo set_value('parent_id'); ?>">
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