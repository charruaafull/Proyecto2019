<?php
!(@dir(Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.views.site.contact') . '.js'))) ? Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.views.site') . '/contact.js') : null;
?>

<div class="card">
    <div class="card-header">
        Contacto
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input class="form-control" name="name" id="name">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="surname">Apellido</label>
                            <input class="form-control" name="surname" id="surname">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group is-invalid">
                            <label for="mail">Mail</label>
                            <input class="form-control" name="mail" id="mail">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="subject">Asunto</label>
                            <input class="form-control" name="subject" id="subject">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="message">Mensaje</label>
                            <textarea class="form-control" name="message" id="message"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <button class="btn btn-block btn-success" id="btn-send">Enviar Mensaje</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h5>Sobre nosotros</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p>Tienda.com</p>
                        <p>Direccion 1234 - Rosario</p>
                        <p><i class="fa fa-phone" aria-hidden="true"></i> (341) 469 1234</p>
                        <p><i class="fa fa-whatsapp"></i> 3416852258</p>
                        <p><i class="fa fa-envelope" aria-hidden="true"></i> info@tienda.com</p>
                        <p>Horarios: Lunes a Viernes 8hs a 16hs</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript"
        src="<?php echo Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('application.views.site.contact') . '.js') ?>">
</script>