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
                <div class="row">
                    <div class="col-lg-9 col-4">
                        <strong>PRODUCTO</strong>
                    </div>
                    <div class="col-lg-3 col-8">
                        <div class="row">
                            <div class="col-lg-6 col-4 text-right align-self-center">
                                <strong>Precio</strong>
                            </div>
                            <div class="col-lg-3 col-4 text-center">
                                <strong>Cant.</strong>
                            </div>
                            <div class="col-lg-3 col-4 align-self-center text-center">
                                <strong>Acc.</strong>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <hr>
                        </div>
                    </div>
                </div>
                <?php
                $tot = 0;
                if (isset($products) && count($products) > 0):
                    foreach ($products as $pro):
                        $tot += $pro['Pre_Pro'] * $pro['Cant']; ?>
                        <div class="row" divProd="<?php echo $pro['Id_Pro']; ?>">
                            <div class="col-lg-9 col-4">
                                <div class="row">
                                    <div class="col-lg-2 d-none d-sm-block">
                                        <img class="img-fluid" src="http://placehold.it/100x70">
                                    </div>
                                    <div class="col-lg-8 text-uppercase">
                                        <?php echo $pro['Nom_Pro']; ?><br>
                                        Marca<br>
                                        Modelo
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-8">
                                <div class="row">
                                    <div class="col-lg-6 col-4 text-right align-self-center">
                                        <span tag="nroPre" idProd="<?php echo $pro['Id_Pro']; ?>"><?php echo $pro['Pre_Pro']; ?></span>
                                    </div>
                                    <div class="col-lg-3 col-4 text-center">
                                        <input type="text" maxlength="1" tag="inpPro"
                                               idProd="<?php echo $pro['Id_Pro']; ?>" class="form-control input-sm"
                                               value="<?php echo $pro['Cant']; ?>">
                                    </div>
                                    <div class="col-lg-3 col-4 align-self-center text-center">
                                        <a href="#" class="text-dark" tag="lnk-del"
                                           idProd="<?php echo $pro['Id_Pro']; ?>"><i
                                                    class="fa fa-trash-o"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr divProd="<?php echo $pro['Id_Pro']; ?>">
                    <?php endforeach;
                else: ?>
                    <div class="row">
                        <div class="col-lg-12">
                            No se agregaron productos
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="card-footer">
                <div class="col-lg-12 align-self-center text-right">
                    Total <strong>$ <span id="tot"><?php echo $tot; ?></span></strong>
                </div>
            </div>
            <div class="card-footer">
                <div class="row text-center">
                    <div class="col-lg-12 text-right">
                        <button type="button" class="btn btn-success">
                            Terminar <i class="fa fa-check"></i>
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