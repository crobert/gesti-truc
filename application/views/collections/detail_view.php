<?php
/**
 * @var $c object
 */
?>
<!-- ----------------------------------------------- Update collection form ----------------------------------------------- -->

    <div class="actions">
        <div class="bloc_g">
            <a href='<?php echo site_url('collections/edit/'.$c->id);?>'>
                <input class="btn btn-info" type="button" value="Modifier" name="Submit"/>
            </a>
            <a href="<?php echo site_url('collections'); ?>">
                <input class="btn btn-info" type="button" value="Retour" name="Submit"/>
            </a>
        </div>
        <div class="bloc_d">&nbsp;
        </div>
    </div>
    <!--invisible fields-->

    <!--Fields to complete-->
    <label for="name">Nom</label><?php echo $c->name; ?><br>
    <label for="description">Description</label><?php echo $c->description; ?><br>
    <label for="type">Type</label><?php echo $c->type; ?><br>

