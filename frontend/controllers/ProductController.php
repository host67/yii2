<?php
namespace frontend\controllers;
 
use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use common\models\Product;


class ProductController extends Controller
{

    public function actionIndex(){
        
        $query = Product::find();
         
        $products = Product::find()->all();
        
        $pagination = new Pagination([
            'defaultPageSize' => 2,
            'totalCount' => $query->count(),
        ]);
        
        $products = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'products' => $products,
            'pagination' => $pagination,
        ]);
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