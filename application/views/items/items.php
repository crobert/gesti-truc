<?php
/**
 * @var $items array
 */
?>
<a href="<?php echo site_url('items/add'); ?>">Ajouter</a>
<br/>
<br/>
<?php foreach($items as $i){
    echo $i->id." ".$i->name."<a href='".site_url('items/edit/'.$i->id)."'>Edit</a><br>";
}
