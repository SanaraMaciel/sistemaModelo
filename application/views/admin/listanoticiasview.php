<h1 class="page-header">Notícias</h1>
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
    <table class="table table-striped" id="dataTable"> 
        <thead> 
            <tr> 
                <th>#</th> 
                <th>Título</th> 
                <th>Subtítulo</th>
                <th>Tipo</th>
                <th>
                    <div class="pull-right">
                        <a href="<?= base_url('admin/noticias/cadastro') ?>" class="btn btn-info">Nova notícia</a>   
                    </div>
                </th>
            </tr> 
        </thead> 
        <tbody> 
            <?php foreach ($noticias as $row): ?>
                <tr> 
                    <th scope="row"><?= $row->cod_noticia; ?></th> 
                    <td><?= $row->titulo_noticia; ?></td> 
                    <td><?= $row->subtitulo_noticia; ?></td> 
                    <td><?= $row->nome_tipo; ?></td> 
                    <td>
                        <div class="pull-right">
                         <a href="<?= base_url('usu/paginainicial/noticias/' . $row->slug_noticia) ?>" class="btn btn-default btn-block" target="_blank">Ver Notícia</a>
                         <a href="<?= base_url('admin/noticias/atualizacao/' . $row->cod_noticia) ?>" class="btn btn-default btn-block">Atualizar</a>
                         <a href="<?= base_url('admin/noticias/deletar/' . $row->cod_noticia) ?>" class="btn btn-danger btn-block"  onclick="return confirm('Deseja realmente apagar a notícia?')">Deletar</a>
                        </div>
                    </td>
                </tr> 
            <?php endforeach; ?>

        </tbody> 
    </table> 
</div>
