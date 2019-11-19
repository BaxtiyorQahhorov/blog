<?php
namespace app\models;


use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return "product";
    }
    public  function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'unique'],
            [['name'], 'string'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Product Name'
        ];
    }

    public function getCategories()
    {
        return $this->hasOne(Product::class, ['id'=>'category_id']);

    }
    public function getVariations()
    {
        return $this->hasMany(Variation::class, ['product_id' =>'id']);

    }


}