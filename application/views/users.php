<?php
/**
 * @var $users array
 */
?>
<a href="<?php echo site_url('users/add'); ?>">Ajouter</a>
<br/>
<br/>
<?php foreach($users as $u){
    echo $u->name."<a href='".site_url('users/edit/'.$u->id)."'>Edit</a><br>";

}