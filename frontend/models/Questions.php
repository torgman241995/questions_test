<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "questions".
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string|null $file
 * @property string|null $file_path
 * @property string|null $file_base_url
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Questions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'questions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['firstname', 'lastname'], 'string', 'max' => 40],
            [['file', 'file_path', 'file_base_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('frontend', 'ID'),
            'firstname' => Yii::t('frontend', 'Firstname'),
            'lastname' => Yii::t('frontend', 'Lastname'),
            'file' => Yii::t('frontend', 'File'),
            'file_path' => Yii::t('frontend', 'File Path'),
            'file_base_url' => Yii::t('frontend', 'File Base Url'),
            'status' => Yii::t('frontend', 'Status'),
            'created_at' => Yii::t('frontend', 'Created At'),
            'updated_at' => Yii::t('frontend', 'Updated At'),
        ];
    }
}
