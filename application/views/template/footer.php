<div class="cale_10"></div>

<div id="pied">
    <p>crobert - Tous droits gérés </p>
    <p>Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

<?php
//if(base_url() == "http://localhost/sig/")
    if(isset($_GET['debug']))
        $this->output->enable_profiler(TRUE);
?>