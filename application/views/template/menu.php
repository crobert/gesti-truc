<?php
/**
 * @var $menu string
 */
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url('collections'); ?>">Gesti'truc</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li <?php echo ($menu=='users')?"class='active'":"";?>><a href="<?php echo site_url('users'); ?>">Users</a></li>
                <?php foreach($this->session->userdata('breadcrumbs') as $bc):?>
                <li><a href="<?php echo site_url($bc['link']); ?>"><?php echo $bc['value']; ?></a></li>
                <?php endforeach; ?>
                 </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<!--<li <?php //echo ($menu=='collections')?"class='active'":"";?>><a href="<?php //echo site_url('collections'); ?>">Collections</a></li>
<li <?php //echo ($menu=='categories')?"class='active'":"";?>><a href="<?php //echo site_url('categories'); ?>">Categories</a></li>
     -->