<h1 class="page-header">Atualização de notícias</h1>
<form action="<?= base_url('admin/noticias/salvar_update') ?>"  method="post" enctype="multipart/form-data">
    <input type="hidden" name="codigo" value="<?= $noticia[0]->cod_noticia ?>">
    <div class="row form-group">
        <div class="col-sm-5">
            <label for="exampleInputEmail1">Título</label>
            <input type="text" class="form-control" placeholder="Título" value="<?= $noticia[0]->titulo_noticia; ?>" name="titulo">
        </div>
        <div class="col-sm-7">
            <label for="exampleInputEmail1">Subtítulo</label>
            <input type="text" class="form-control" placeholder="Subtítulo" value="<?= $noticia[0]->subtitulo_noticia; ?>" name="subtitulo">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-8">
            <label for="exampleInputEmail1">Conteúdo</label>
            <textarea class="form-control" rows="9" name="conteudo"><?= $noticia[0]->conteudo_noticia; ?></textarea>
        </div>
        <div class="col-sm-4">
            <label for="exampleInputEmail1">Slug</label>
            <input type="text" class="form-control" placeholder="slug-da-noticia" name="slug" value="<?= $noticia[0]->slug_noticia; ?>">
        </div>
        <div class="col-sm-4">
            <label for="exampleInputEmail1">Data</label>
            <input type="text" class="form-control" placeholder="__/__/____" value="<?= date('d/m/Y', strtotime($noticia[0]->data_noticia)); ?>" name="data">
        </div>

        <div class="col-sm-4">
            <label for="exampleInputEmail1">Tipo</label>
            <select class="form-control" name="tipo">
                <?php foreach ($tipos as $row): ?>
                    <option value="<?= $row->cod_tipo ?>" <?= $row->cod_tipo == $noticia[0]->tipos_cod_tipo ? ' selected' : '' ?>><?= $row->nome_tipo ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-sm-4">
            <label for="exampleInputFile">Imagem da notícia</label>
            <input type="file" id="exampleInputFile" name="imagem">
        </div>
    </div>
    <button type="submit" class="btn btn-default">Enviar</button>
    <button type="reset" class="btn btn-default" onclick="return confirm('Deseja realmente limpar o formulário?')">Limpar</button>
</form>
