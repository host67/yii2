<?php

namespace common\models;

use yii\db\ActiveRecord;

class Image extends ActiveRecord
{
    public static function tableName() {
        return 'image';
    }
    
    public function rules() {
        return [
            [['url'], 'string'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'url' => 'URL'
        ];
    }
    
    public function getProduct() {
        return $this->hasOne(Product::class, ['id' => 'id']);
    }
}