<?php
/**
 * @var $vue string
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Gesti'truc <?php if (isset ($titre_page)): ?><?php echo ": ".$titre_page; ?><?php endif; ?></title>

    <!--  Chargement des styles-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/styles.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/jquery-ui/jquery-ui.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/chosen/chosen.css'); ?>">


    <!--  Chargement du js-->
    <script type="text/javascript" src="<?php echo base_url('assets/jquery-2.1.3.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/jquery-2.1.3.min.map'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/chosen/chosen.jquery.min.js'); ?>"></script>

</head>

<!--  Mise en place des blocs principaux -->
<body>
<div id="menu">
    <?php $this->load->view('template/menu'); ?>
</div>

<div id="conteneur">


    <div id="page">
        <?php $this->load->view($vue); ?>

    </div>
</div>
<?php $this->load->view('template/footer'); ?>

</body>
</html>

<?php
if(isset($_GET['debug']))
    $this->output->enable_profiler(TRUE);
?>