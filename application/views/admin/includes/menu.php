<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=base_url('admin')?>">Sistema Modelo</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php if ($this->session->userdata('LOGADO')) { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?= $this->session->userdata('nome_usuario'); ?> 
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a  href="<?= base_url('admin/acesso/configuracoes') ?>" >Configurações</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url('admin/acesso/logout') ?>" onclick="return confirm('Deseja realmente sair?')">Sair</a></li>
                        </ul>
                    </li>
                <?php } else { ?>
                    <li><a href="<?= base_url('admin/acesso/login') ?>">Entrar</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <div class="avatar">
                <img alt="avatar" src="<?= base_url('/dist/img/'.$this->session->userdata('imagem_usuario')) ?>" class="thumbnail img-circle"> 
            </div>

            <ul class="nav nav-sidebar">
                <li role="separator" class="divider"></li>
                <li><a href="<?= base_url('admin') ?>">Página Inicial <span class="sr-only">(current)</span></a></li>
                <li role="separator" class="divider"></li>
                <li><a href="<?= base_url('admin/noticias') ?>">Notícias</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="<?= base_url('admin/contatos') ?>">Contatos</a></li>
                <li role="separator" class="divider"></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
