<?php

namespace common\models;

use trntv\filekit\behaviors\UploadBehavior;
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
    const NEW_ORDER = 0;
    const IN_PROCESS_ORDER = 1;
    const SUCCESS_ORDER = 2;
    const ERROR_ORDER = 3;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'questions';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'file' => [
                'class' => UploadBehavior::class,
                'attribute' => 'file',
                'pathAttribute' => 'file_path',
                'baseUrlAttribute' => 'file_base_url'
            ]
        ];
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
            [['file'], 'safe'],
        ];
    }

    /**
     * @return array
     */
    public static function statusData()
    {
        return [
            self::NEW_ORDER => Yii::t('common', 'New'),
            self::IN_PROCESS_ORDER => Yii::t('common', 'In Process'),
            self::SUCCESS_ORDER => Yii::t('common', 'Success'),
            self::ERROR_ORDER => Yii::t('common', 'Error')
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'firstname' => Yii::t('common', 'Firstname'),
            'lastname' => Yii::t('common', 'Lastname'),
            'file' => Yii::t('common', 'File'),
            'file_path' => Yii::t('common', 'File Path'),
            'file_base_url' => Yii::t('common', 'File Base Url'),
            'status' => Yii::t('common', 'Status'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }
}
