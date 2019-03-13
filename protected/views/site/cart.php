<?php
$products = Yii::app()->session['PROD'];
!(@dir(Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.views.site.cart') . '.js'))) ? Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.views.site') . '/cart.js') : null;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-info">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6 text-uppercase text-dark">
                        Mi Carrito
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?php
                $tot = 0;
                foreach ($products as $pro):
                    $tot += 5;
                    ?>
                    <div class="row" divProd="<?php echo $pro['Id_Pro']; ?>">
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-inline-block">
                                        <img class="img-fluid" src="http://placehold.it/100x70">
                                    </div>
                                    <div class="d-inline-block">
                                        <ul class="ul-product">
                                            <li><?php echo $pro['Nom_Pro']; ?></li>
                                            <li>Nombre producto</li>
                                            <li>Nombre producto</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="row">
                                <div class="col-lg-6 text-right align-self-center">
                                    25.00
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control input-sm" value="1">
                                </div>
                                <div class="col-lg-3 align-self-center">
                                    <a href="#" tag="lnk-del" idProd="<?php echo $pro['Id_Pro']; ?>"><i
                                                class="fa fa-trash-o"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr divProd="<?php echo $pro['Id_Pro']; ?>">
                <?php endforeach; ?>
            </div>
            <div class="card-footer">
                <div class="row text-center">
                    <div class="col-lg-9">
                        <h4 class="text-right">Total <strong>$ <?php echo $tot; ?></strong></h4>
                    </div>
                    <div class="col-lg-3">
                        <button type="button" class="btn btn-success btn-block">
                            Terminar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript"
        src="<?php echo Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.views.site.cart') . '.js') ?>">
</script>