<?php
!(@dir(Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.views.site.login') . '.js'))) ? Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.views.site') . '/login.js') : null;
?>

<div class="card">
    <div class="card-header">
        Ingresar
    </div>
    <div class="card-body">
        <div class="row">
            <div class="offset-lg-2"></div>
            <div class="col-lg-8 col-12">
                <form id="frm-login">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="username">Usuario</label>
                                <input type="text" class="form-control" name="username" id="username">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-lg-12 text-right">
                <button class="btn btn-success" id="btn-login">Ingresar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript"
        src="<?php echo Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.views.site.login') . '.js') ?>">
</script>