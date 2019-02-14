<h1 class="page-header">Cadastro de notícias</h1>
<form action="<?= base_url('admin/noticias/salvar') ?>"  method="post" enctype="multipart/form-data">
    <div class="row form-group">
        <div class="col-sm-5">
            <label for="exampleInputEmail1">Título</label>
            <input type="text" class="form-control" placeholder="Título" name="titulo">
        </div>
        <div class="col-sm-7">
            <label for="exampleInputEmail1">Subtítulo</label>
            <input type="text" class="form-control" placeholder="Subtítulo" name="subtitulo">
        </div>
    </div>
    <div class="row form-group">
        <div class="col-sm-8">
            <label for="exampleInputEmail1">Conteúdo</label>
            <textarea class="form-control" rows="9" name="conteudo"></textarea>
        </div>
        <div class="col-sm-4">
            <label for="exampleInputEmail1">Slug</label>
            <input type="text" class="form-control" placeholder="slug-da-noticia" name="slug">
        </div>
        <div class="col-sm-4">
            <label for="exampleInputEmail1">Data</label>
            <input type="text" class="form-control" placeholder="__/__/____" name="data">
        </div>

        <div class="col-sm-4">
            <label for="exampleInputEmail1">Tipo</label>
            <select class="form-control" name="tipo">
                <?php foreach ($tipos as $row): ?>
                    <option value="<?= $row->cod_tipo ?>"><?= $row->nome_tipo ?></option>
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