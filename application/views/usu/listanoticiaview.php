<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <h1 class="page-header"><?= $noticia[0]->titulo_noticia; ?></h1>  
            </div>
            <div class="col-sm-4">
                <img class="img-responsive" src="<?=base_url('imagens/noticias/'.$noticia[0]->imagem_noticia)?>"/>
            </div>
            <div class="col-sm-8">
                <h3><?= $noticia[0]->subtitulo_noticia; ?> <br><small>Em <?= date('d/m/Y', strtotime($noticia[0]->data_noticia)); ?></small></h3>
                <p>
                    <?= nl2br($noticia[0]->conteudo_noticia); ?>
                </p>
            </div>
        </div>
    </div>
</section>