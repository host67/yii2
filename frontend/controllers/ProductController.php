<?php
namespace frontend\controllers;
 
use Yii;
use yii\web\Controller;
use common\models\Product;


class ProductController extends Controller
{

    public function actionIndex(){
        $products = Product::find()->all();
        return $this->render('index', compact('products'));
    }

    public function actionCreate($name, $price){
        $newProduct = new Product();
        $newProduct->name = $name;
        $newProduct->price = $price;
        $newProduct->save();
        return Yii::$app->response->redirect(['product/index']);
    }

    public function actionRead($id){
        $readProduct = Product::findOne($id);
        $products = Product::find()->all();
        return $this->render('index', ['products' => $products, 'readProduct' => $readProduct]);
    }

    public function actionUpdate($id, $name, $price){
        $updProduct = Product::findOne($id);
        $updProduct->name = $name;
        $updProduct->price = $price;
        $updProduct->save();
        return Yii::$app->response->redirect(['product/index']);
    }

    public function actionDelete($id){
        $delProduct = Product::findOne($id);
        $delProduct->delete(); 
        return Yii::$app->response->redirect(['product/index']);
    }
    
}