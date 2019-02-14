<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="page-header">Últimas Notícias</h1>  
                    </div>
                    <?php foreach ($noticias as $row): ?>
                        <div class="col-sm-4">
                            <div class="caixa-noticia">
                                <div class="row">
                                    <a href="<?= base_url('usu/paginainicial/noticias/' . $row->slug_noticia) ?>">
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
                <a class="btn btn-default" href="<?=base_url('noticias')?>">Mais notícias...</a>
            </div>   
            <div class="col-sm-6">

                <h1 class="page-header">Sobre Nós</h1>  

                 <p>
                    O Laboratório de Tecnologias de Software e Computação Aplicada à Educação - LabSoft - fundado em 2012, está associado, predominantemente, ao Curso de Ciência da Computação. Foi criado, inicialmente, para servir como um espaço de diálogo, reflexão e investigação entre professores e estudantes interessados em desenvolver projetos de pesquisa na área de Engenharia de Software e Computação Aplicada à Educação.
                </p>
                <p>Atualmente conta com um espaço físico amplo, que recebe alunos em Iniciação Científica, Trabalhos de Conclusão de Curso, Estágio, Intercâmbio, dentre outros. Os resultados apresentados em conferências e periódicos relevantes da área de computação demonstram o fortalecimento deste grupo/laboratório. E, ao logo de todo o período letivo, todo o conhecimento adquirido nele é revertido à comunidade acadêmica do Sul de Minas, através do oferecimento de palestras e treinamentos específicos na área de software e sistemas educacionais.
                </p>
            </div>
        </div>
    </div>
</section>