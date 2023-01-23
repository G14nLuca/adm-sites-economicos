<div>
    <div class="page-inner" style="margin-bottom: 0;">
        <div class="page-header">
            <h4 class="page-title">Editar seção "Sobre"</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Editar Conteúdo</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Seção "Sobre"</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body" style="background-color: #dcdede;">
                        <form action="/about/save" method="POST" id="edit-form" enctype="multipart/form-data">
                            <div class="row">

                                <div class="col-md-6 col-lg-4">
                                    @csrf
                                    <div class="form-group my-2">
                                        <label for="nomeInput">Nome da seção</label>
                                        <input type="text" class="form-control" id="nomeInput" placeholder="Digite o nome da seção aqui" name="nome" value="{{$fields->nome}}">
                                    </div>

                                    <div class="form-group my-2">
                                        <label for="tituloInput">Título da seção</label>
                                        <input type="text" class="form-control" id="tituloInput" placeholder="Digite seu título aqui" name="titulo" value="{{$fields->titulo}}">
                                    </div>

                                    <div class="form-group my-2">
                                        <label for="subtituloInput">Subtítulo</label>
                                        <input type="text" class="form-control" id="subtituloInput" placeholder="Adicione aqui um complemento aos títulos" name="subtitulo" value="{{$fields->subtitulo}}">
                                    </div>

                                    <div class="form-group my-2">
                                        <label for="textoPrincipalInput">Texto principal</label>
                                        <input type="text" class="form-control" id="textoPrincipalInput" placeholder="Insira aqui aquilo que julgar mais importante" name="textoPrincipal" value="{{$fields->textoPrincipal}}">
                                    </div>

                                    <div class="form-group my-2">
                                        <label for="imgPrincipalInput">Imagem Principal</label>
                                        <input type="file" class="form-control-file" id="imgPrincipalInput" name="imgPrincipal">
                                    </div>

                                </div>

                                <div class="col-md-6 col-lg-4 mx-auto">
                                    <div class="form-group my-2">
                                        <label for="textoBotaoInput">Texto do botão principal</label>
                                        <input type="text" class="form-control" id="textoBotaoInput" placeholder='Algo do tipo "Saiba mais" e "Confira agora"' name="textoBotao" value="{{$fields->textoBotao}}">
                                    </div>

                                    <div class="form-group my-2">
                                        <label for="linkBotaoInput">Link do botão principal</label>
                                        <input type="text" class="form-control" id="linkBotaoInput" placeholder="Para que outro site você deseja levar seu cliente?" name="linkBotao" value="{{$fields->linkBotao}}">
                                    </div>

                                    <div class="form-group my-2">
                                        <label class="form-label">Cor de fundo do card</label>
                                        <div class="row gutters-xs">
                                            <div class="col-auto">
                                                <label class="colorinput">
                                                    <input name="corBotao" type="radio" value="bg-dark" class="colorinput-input">
                                                    <span class="colorinput-color bg-dark"></span>
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="colorinput">
                                                    <input name="corBotao" type="radio" value="bg-primary" class="colorinput-input">
                                                    <span class="colorinput-color bg-primary"></span>
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="colorinput">
                                                    <input name="corBotao" type="radio" value="bg-secondary" class="colorinput-input">
                                                    <span class="colorinput-color bg-secondary"></span>
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="colorinput">
                                                    <input name="corBotao" type="radio" value="bg-info" class="colorinput-input">
                                                    <span class="colorinput-color bg-info"></span>
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="colorinput">
                                                    <input name="corBotao" type="radio" value="bg-success" class="colorinput-input">
                                                    <span class="colorinput-color bg-success"></span>
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="colorinput">
                                                    <input name="corBotao" type="radio" value="bg-danger" class="colorinput-input">
                                                    <span class="colorinput-color bg-danger"></span>
                                                </label>
                                            </div>
                                            <div class="col-auto">
                                                <label class="colorinput">
                                                    <input name="corBotao" type="radio" value="bg-warning" class="colorinput-input">
                                                    <span class="colorinput-color bg-warning"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group my-2">
                                        <label for="textoCardInput">Texto do card principal</label>
                                        <input type="text" class="form-control" id="textoCardInput" placeholder="Pense como se fosse uma legenda" name="textoCard" value="{{$fields->textoCard}}">
                                    </div>

                                    <div class="form-group my-2">
                                        <label for="imgCardInput">Imagem do card principal</label>
                                        <input type="file" class="form-control-file" id="imgCardInput" name="imgCard">
                                    </div>

                                </div>
                            </div>
                        </form>

                        <div class="form-group d-flex justify-content-end mt-3">
                            <input class="btn btn-success mx-1" type="submit" value="Salvar" form="edit-form"></input>
                            <a href="/" class="btn btn-danger mx-1" form="edit-form">Cancelar</a>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>