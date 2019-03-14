<?php
!(@dir(Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.views.site.index') . '.js'))) ? Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.views.site') . '/index.js') : null;
?>

<div class="row">
    <div class="col-lg-3">
        <div class="row">
            <div class="col-lg-12 text-center text-uppercase text-dark">
                <strong>Categorías</strong>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-group">
                    <?php foreach ($categories as $cat): ?>
                        <li tag="lnk-cat" nroCat="<?php echo $cat['Id_Lin']; ?>"
                            class="list-group-item list-group-item-action cursor-pointer">
                            <?php echo $cat['Nom_Lin']; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <br>
        <div class="row	d-none d-sm-block">
            <div class="col-lg-12">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/vertical-banner.jpg" class="img-fluid">
            </div>
        </div>
        <br>
    </div>
    <div class="col-lg-9">
        <!--Preload-->
        <div id="div-preload" class="row" style="display: none;padding-top: 30px;">
            <div class="col-lg-12 text-center">
                <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!--Fin preload-->
        <div id="content-products">
            <div class="row">
                <div class="col-lg-12 text-center text-uppercase text-dark">
                    <strong>Productos Destacados</strong>
                </div>
                <?php foreach ($listProducts as $Lp): ?>
                    <div class="col-lg-4 col-md-4 col-6">
                        <div class="thumbnail">
                            <h5 class="text-center"><span class="badge badge-info"><?php echo $Lp['Nom_Lin']; ?></span>
                            </h5>
                            <div class="col-lg-12 col-12 text-center name-product">
                                <?php echo $Lp['Nom_Pro']; ?>
                            </div>
                            <img src="http://placehold.it/650x450&text=Galaxy S5" class="img-fluid">
                            <div class="caption">
                                <div class="row">
                                    <div class="col-lg-12 col-12 price text-center">
                                        <div class="badge badge-warning">$ <?php echo $Lp['Pre_Pro']; ?></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-6 text-right">
                                        <button class="btn btn-info" tag="lnk-det" idProd="<?php echo $Lp['Id_Pro']; ?>"><span
                                                    class="d-none d-sm-inline-block">Detalle</span> <i
                                                    class="fa fa-binoculars"></i></button>
                                    </div>
                                    <div class="col-md-6 col-6 text-left">
                                        <button tag="lnk-add" idProd="<?php echo $Lp['Id_Pro']; ?>"
                                                class="btn btn-success"><span
                                                    class="d-none d-sm-inline-block">Comprar</span> <i
                                                    class="fa fa-shopping-cart"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="mdl-product">
    <div class="modal-dialog">
        <div class="modal-content" id="body-product">



        </div>
    </div>
</div>

<script type="text/javascript"
        src="<?php echo Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.views.site.index') . '.js') ?>">
</script>