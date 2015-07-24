<?php
/**
 * @var $collections array
 */
?>
<a href="<?php echo site_url('collections/add'); ?>">Ajouter</a>
<br/>
<br/>
<?php foreach($collections as $c){
    echo $c->id." ".$c->name."<a href='".site_url('collections/edit/'.$c->id)."'>Edit</a><br>";
}