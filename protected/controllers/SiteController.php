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
                    'DeleteProductCart',
                    'ChangeCantidad',
                    'Register',
                    'ValidaRegistro',
                    'Login',
                    'AjaxValidaLogin',
                    'Logout',
                    'ViewProduct'
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

    public function actionLogin()
    {
        $this->pageTitle = 'Tienda de Productos - Login';
        $this->render('login');
    }

    public function actionRegister()
    {
        $this->pageTitle = 'Tienda de Productos - Registrate';
        $this->render('register');
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
            $pag = (Yii::app()->request->getParam('pag')) ? Yii::app()->request->getParam('pag') : 1;
            $listProducts = Consultas::getProductos($cat, $pag);
            $totProducts = Consultas::getTotalProductos($cat);
            $res = $this->renderPartial('viewProducts', array('listProducts' => $listProducts, 'totProducts' => $totProducts, 'nomCat' => $nomCat, 'nroCat' => $cat, 'nroPag' => $pag), true);
            echo CJSON::encode($res);
        endif;
    }


    public function actionViewProduct()
    {
        if (Yii::app()->request->getParam('idProd')):
            $id = Yii::app()->request->getParam('idProd');
            $pro = Consultas::getProducto($id);
            $res = $this->renderPartial('viewProduct', array('pro' => $pro), true);
            echo CJSON::encode($res);
        endif;
    }

    public function actionCart()
    {
        if (!isset(Yii::app()->session['USU'])):
            $this->redirect('login');
        endif;
        $this->pageTitle = 'Carrito de Compras - Tienda de Productos';
        $this->render('cart');
    }

    public function actionAddProduct()
    {
        if (!isset(Yii::app()->session['USU'])):
            echo CJSON::encode(false);
            Yii::app()->end();
        endif;
        if (Yii::app()->request->getParam('idProd')):
            $idProd = Yii::app()->request->getParam('idProd');
            $product = Consultas::getProducto($idProd);
            $_SESSION['PROD'][$idProd] = $product;
            $_SESSION['PROD'][$idProd]['Cant'] = 1;
            $totCart = count($_SESSION['PROD']);
            echo CJSON::encode($totCart);
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

    public function actionChangeCantidad()
    {
        if (Yii::app()->request->getParam('idProd') && Yii::app()->request->getParam('cant')):
            $idProd = Yii::app()->request->getParam('idProd');
            $cant = Yii::app()->request->getParam('cant');
            $_SESSION['PROD'][$idProd]['Cant'] = $cant;
        endif;
    }


    public function actionValidaRegistro()
    {
        $model = new frm_registro();

        $model->username = (Yii::app()->request->getParam('username')) ? Yii::app()->request->getParam('username') : '';
        $model->name = (Yii::app()->request->getParam('name')) ? Yii::app()->request->getParam('name') : '';
        $model->surname = (Yii::app()->request->getParam('surname')) ? Yii::app()->request->getParam('surname') : '';
        $model->email = (Yii::app()->request->getParam('email')) ? Yii::app()->request->getParam('email') : '';
        $model->password = (Yii::app()->request->getParam('password')) ? Yii::app()->request->getParam('password') : '';

        if ($model->validate()):
            $res = array(
                'error' => false,
            );
            Consultas::nuevoUsuario($model->username, $model->name, $model->surname, $model->email, $model->password);
        else:
            $res = array(
                'error' => true,
                'info' => $model->errors,
            );
        endif;
        echo CJSON::encode($res);
    }

    public function actionAjaxValidaLogin()
    {
        $model = new Login_Mdl();

        $model->username = Yii::app()->request->getParam('username');
        $model->password = Yii::app()->request->getParam('password');

        if ($model->validate()):
            $res = array(
                'error' => false,
            );
        else:
            $res = array(
                'error' => true,
                'info' => $model->errors,
            );
        endif;

        echo CJSON::encode($res);
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}
