<?php

namespace common\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName() {
        return 'product';
    }
    
    public function rules() {
        return [
            [['name', 'price'], 'required'],
            [['name'], 'string'],
            [['price'], 'double'],
            [['image_id'], 'integer']
        ];
    }
    
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'price' => 'Цена'
        ];
    }
    
    public function getImage() {
        return $this->hasOne(Image::class, ['id' => 'image_id']);
    }
}