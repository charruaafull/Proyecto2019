<?php
!(@dir(Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.views.site.viewProducts') . '.js'))) ? Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.views.site') . '/viewProducts.js') : null;
?>


    <div class="col-lg-12 text-center text-uppercase text-dark">
    <strong><?php echo $nomCat; ?></strong>
</div>
<div class="row">
    <?php
    if (isset($listProducts) && count($listProducts) > 0):
    $totPag = $totProducts / 9;
    foreach ($listProducts as $Lp): ?>
        <div class="col-lg-4 col-md-4 col-12">
            <div class="thumbnail">
                <h5 class="text-center"><span class="badge badge-info"><?php echo $Lp['Nom_Lin']; ?></span></h5>
                <img src="http://placehold.it/650x450&text=Galaxy S5" class="img-fluid">
                <div class="caption">
                    <div class="row">
                        <div class="col-md-8 col-xs-6 name-product">
                            <?php echo $Lp['Nom_Pro']; ?>
                        </div>
                        <div class="col-md-4 col-xs-6 price text-right">
                            $649.99
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-block btn-info">Ver más</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-block btn-success">Agregar <i
                                        class="fa fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="row">
    <div class="col-lg-12 text-center">
        <nav>
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $totPag; $i++): ?>
                    <li class="page-item <?php echo ($i == $nroPag) ? 'active' : ''; ?>"><a nroCat="<?php echo $nroCat; ?>" nomCat="<?php echo $nomCat; ?>" nroPag="<?php echo $i; ?>" class="page-link" href="#"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
</div>
<?php endif; ?>

<script type="text/javascript"
        src="<?php echo Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.views.site.viewProducts') . '.js') ?>">
</script>
