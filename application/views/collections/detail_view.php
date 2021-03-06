<?php
/**
 * @var $c object
 * @var $categories array
 */
?>
<!-- ----------------------------------------------- Details of a  collection ----------------------------------------------- -->

<h2 class="titrePage"   >Catégories de <?php echo $c->name; ?> <a title="nouvelle catégorie" href="<?php echo site_url('categories/add/'.$c->id); ?>"><i class="glyphicon glyphicon-plus"></i></a></h2>
<table id="categorieTable">
    <?php foreach ($categories as $c) { ?>
        <tr>
            <td>
                <div>
                    <span class="listeTitle" id="title<?php echo $c->id; ?>">
                        <?php echo $c->name; ?>
                    </span>
                    <span>
                        <a title="voir" href='<?php echo site_url('categories/detail/'.$c->id);?>'><i class="glyphicon glyphicon-eye-open"></i></a>&nbsp;
                        <a title="modifier" href='<?php echo site_url('categories/edit/'.$c->id);?>'><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;
                        <a title="supprimer" href='<?php echo site_url('categories/delete/'.$c->id);?>'><i class="glyphicon glyphicon-remove"></i></a>
                    </span>
                </div>

                <div class="listeBloc" id="bloc<?php echo $c->id; ?>">
                    <a class="vignetteLink" href='<?php echo site_url('categories/detail/' . $c->id); ?>'>
                        <?php if ($c->picture != '') : ?>
                            <div class="vignette"
                                 style="background: black url('<?php echo base_url('uploads/categories/' . $c->picture); ?>') no-repeat center;">
                            </div>
                        <?php else : ?>
                            <div class="vignette">
                            </div>
                        <?php endif; ?>
                    </a>

                    <div class="detail">
                        <label for="description">Description</label>
                        <p><?php echo $c->description; ?></p>
                    </div>
                </div>
            </td>
        </tr>
    <?php } ?>
</table>


<script language="JavaScript" type="text/javascript">
    $(document).ready(function () {
        $('.listeTitle').on("click", function(){
            var titleId = this.id;
            var blocId = titleId.replace('title', 'bloc');
            var allCollections = $('.listeBloc');
            var blocElement = $('#'+blocId);
            allCollections.hide();
            blocElement.show();
            //maybe hide the element if already visible
        });
    });
</script>
