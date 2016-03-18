<?php
/**
 * @var $users array
 */
?>

<div class="actions">
        <div class="bloc_g">
            <a href='<?php echo site_url('users/add/'); ?>'>
                <input class="btn btn-info" type="button" value="Ajouter" name="Ajouter"/>
            </a>
        </div>
        <div class="bloc_d">&nbsp;
        </div>
    </div>

<?php foreach($users as $u){
    echo $u->name."<a href='".site_url('users/edit/'.$u->id)."'>Edit</a><br>";

}
