<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "lifehack".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $img
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Lifehack extends \yii\db\ActiveRecord
{
    public $imgFile;

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className()
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lifehack';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'img'], 'string', 'max' => 255],
            ['description', 'string']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'img' => 'Рисунок',
            'imgFile' => 'Рисунок',
            'description' => 'Описание',
            'created_at' => 'Время добавления',
            'updated_at' => 'Время обновления',
        ];
    }

    public function getImage()
    {
        return Yii::$app->params['staticDomain'] . '/lifehack/' . $this->img;
    }

    public function upload()
    {
        if ($this->imgFile === null) {
            return true;
        }

        $folderPath = Yii::getAlias('@static') . '/lifehack';

        if (!file_exists($folderPath) && !mkdir($folderPath, 0777, true) && !is_dir($folderPath)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $folderPath));
        }

        $imgPath = $folderPath . '/' . $this->imgFile->baseName . '.' . $this->imgFile->extension;

        if ($this->validate()) {
            return $this->imgFile->saveAs($imgPath);
        }

        return false;
    }
}
