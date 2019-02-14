<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page-header">Últimas Notícias</h1>  
            </div>
            <?php foreach ($noticias as $row): ?>
                <div class="col-sm-3">
                    <div class="caixa-noticia">
                        <div class="row">
                            <a href="<?= base_url('noticias/' . $row->slug_noticia) ?>">
                                <div class="col-sm-12">
                                    <img class="img-responsive" src="<?= base_url('imagens/noticias/' . $row->imagem_noticia) ?>"/>
                                </div>
                                <div class="col-sm-12">
                                    <h4 class="titulo_noticia"><?= $row->titulo_noticia; ?></h4>
                                    <h5><?= $row->subtitulo_noticia; ?></h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>   
</section>