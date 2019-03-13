<div class="container-fluid header">
    <div class="row">
        <div class="col-lg-12 bg-top bg-grey">
            <div class="container text-black text-user-header text-right">
                <div class="row">
                    <div class="col-lg-6 col-6 text-left">
                        Tienda.com
                    </div>
                    <div class="col-lg-6 col-6 text-right">
                        Bienvenido: Usuario <i class="fa fa-user"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-8 top-logo">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo.png" class="img-fluid">
                    </div>
                    <div class="col-lg-6 col-4 text-right align-self-center">
                        <a class="text-dark" href="cart">Carrito (<span id="cantCart"><?php echo count($_SESSION['PROD']); ?></span>) <i class="fa fa-shopping-cart"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container-fluid bg-grey">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12 bg-menu">
                                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                        <a class="navbar-brand" href="#"></a>
                                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                                data-target="#navbarSupportedContent"
                                                aria-controls="navbarSupportedContent" aria-expanded="false"
                                                aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <ul class="navbar-nav mr-auto">
                                                <li class="nav-item">
                                                    <a class="nav-link" name="inicio" href="./">Inicio</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" name="carrito" href="cart">Carrito de Compras</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" name="contacto" href="contacto">Contacto</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>