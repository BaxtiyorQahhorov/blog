<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $name
 * @property string $text
 * @property int $author_id
 * @property int $category_id
 * @property int $views
 * @property string $date
 * @property int $created_at
 * @property int $updated_at
 * @property string $created_date_time
 * @property string $updated_date_time
 *
 * @property User $author
 * @property Category $category
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    public function behaviors()
    {
        return [
            [
               'class' => TimestampBehavior::class,
                'createdAtAttribute'=>'created_at',
                'updatedAtAttribute'=>'updated_at',
            ],
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute'=>'created_date_time',
                'updatedAtAttribute'=>'updated_date_time',
                'value' => date('Y-m-d H:i:s')
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['author_id', 'category_id', 'views'], 'integer'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['name','text','category_id'],'required'],
            [['name','text'],'unique'],
            [['date'],'default','value'=>date('Y-m-d')],
           // [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'text' => 'Text',
            'author_id' => 'Author ID',
            'category_id' => 'Category ID',
            'views' => 'Views',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

}
