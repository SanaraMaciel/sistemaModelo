<h1 class="page-header">Contatos</h1>
<?php if (isset($alert)) { ?>
    <div class="alert alert-<?php
    $a = explode('-', isset($alert) ? $alert : '');
    echo $a[0];
    ?>">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php
        $a = explode('-', isset($alert) ? $alert : '');
        echo $a[1];
        ?>
    </div>
<?php } ?>
<div class="bs-example" data-example-id="striped-table"> 
    <h1 class="text-center">
        Implementação futura!
        
    </h1>
</div>