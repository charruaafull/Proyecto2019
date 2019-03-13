<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="es">
    <meta name="viewport" content="width=device-width, user-scalable=no">

    <!--Agrego CSS-->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css">
    <!-- -->

    <!--Agrego JS-->
    <script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/function.js"></script>
    <!-- -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<?php require Yii::getPathOfAlias('application.views.layouts.header') . '.php'; ?>
<div id="page">
    <div class="container">
        <?php echo $content; ?>
    </div>
</div>
<?php require Yii::getPathOfAlias('application.views.layouts.footer') . '.php'; ?>

</body>
</html>

