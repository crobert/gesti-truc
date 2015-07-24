<?php
/**
 * @var $categories array
 */
?>
<a href="<?php echo site_url('categories/add'); ?>">Ajouter</a>
<br/>
<br/>
<?php foreach($categories as $c){
    echo $c->id." ".$c->name."<a href='".site_url('categories/edit/'.$c->id)."'>Edit</a><br>";
}
