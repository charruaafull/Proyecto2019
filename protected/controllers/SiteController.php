<?php

class SiteController extends Controller
{

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        //metodo usado por el filtro 'accessControl'
        return array(
            //TODOS TIENEN ACCESO A LA ACCION LOGIN, ERROR
            array('allow',
                'actions' => array(
                    'Index',
                    'Contacto',
                    'ViewProducts',
                    'Cart',
                    'AddProduct',
                    'DeleteProductCart'
                ),
                'users' => array('*'),
            ),
            //TODAS LAS ACCIONES CON ACCESO PARA TODOS LOS USUARIOS LOGGEADOS //
            array('allow',
                'actions' => array(),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array(
                    '',
                ),
                'expression' => "1=1", // Yii::app()->session['USU']['Per_Usu']==1
            ),
            //NEGAMOS TODOS LOS USUARIOS
            array('deny',
                'users' => array('*'),
            ),
        );
    }


    public function actionIndex()
    {
        $this->pageTitle = 'Tienda de Productos';
        $listProducts = Consultas::getProductos();
        $categories = Consultas::getCategorias();
        $this->render('index', array('listProducts' => $listProducts, 'categories' => $categories));
    }

    public function actionContacto()
    {
        $this->pageTitle = 'Contacto - Tienda de Productos';
        $this->render('contact');
    }

    public function actionViewProducts()
    {
        if (Yii::app()->request->getParam('cat')):
            $cat = Yii::app()->request->getParam('cat');
            $nomCat = trim(Yii::app()->request->getParam('nomCat'));
            $listProducts = Consultas::getProductos($cat);
            $res = $this->renderPartial('viewProducts', array('listProducts' => $listProducts, 'nomCat' => $nomCat), true);
            echo CJSON::encode($res);
        endif;
    }

    public function actionCart()
    {
        $this->pageTitle = 'Carrito de Compras - Tienda de Productos';
        $this->render('cart');
    }

    public function actionAddProduct()
    {
        if (Yii::app()->request->getParam('idProd')):
            $idProd = Yii::app()->request->getParam('idProd');
            $product = Consultas::getProducto($idProd);
            $_SESSION['PROD'][$idProd] = $product;
            echo CJSON::encode(true);
        endif;
    }

    public function actionDeleteProductCart()
    {
        if (Yii::app()->request->getParam('idProd')):
            $idProd = Yii::app()->request->getParam('idProd');
            unset($_SESSION['PROD'][$idProd]);
            echo CJSON::encode(true);
        endif;
    }


    /*public function actionAjaxValidaRegistro()
    {
        $model = new frm_registro();

        $model->nom = (Yii::app()->request->getParam('reg-nom')) ? Yii::app()->request->getParam('reg-nom') : '';
        $model->equ = (Yii::app()->request->getParam('reg-equ')) ? Yii::app()->request->getParam('reg-equ') : '';
        $model->psw = (Yii::app()->request->getParam('reg-psw')) ? Yii::app()->request->getParam('reg-psw') : '';
        $model->cps = (Yii::app()->request->getParam('reg-cps')) ? Yii::app()->request->getParam('reg-cps') : '';
        $model->eml = (Yii::app()->request->getParam('reg-eml')) ? Yii::app()->request->getParam('reg-eml') : '';

        if ($model->validate()):
            $res = array(
                'error' => false,
            );
            Consultas_Lgc::nuevoUsuario($model->nom, $model->psw, $model->equ, $model->eml, 1);
        else:
            $res = array(
                'error' => true,
                'info' => $model->errors,
            );
        endif;
        echo CJSON::encode($res);
    }*/

}
