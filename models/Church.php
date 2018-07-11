<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "church".
 *
 * @property int $id_church รหัสคริสตจักร
 * @property string $church_name ชื่อคริสตจักร
 * @property int $id_pak รหัสคริสตจักรภาค
 * @property string $church_date วันที่เพิ่มรายการ
 *
 * @property Pak $pak
 * @property Member[] $members
 */
class Church extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'church';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['church_name', 'id_pak'], 'required'],
            [['id_pak'], 'integer'],
            [['church_date'], 'safe'],
            [['church_name'], 'string', 'max' => 225],
            [['id_pak'], 'exist', 'skipOnError' => true, 'targetClass' => Pak::className(), 'targetAttribute' => ['id_pak' => 'id_pak']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_church' => 'รหัสคริสตจักร',
            'church_name' => 'ชื่อคริสตจักร',
            'id_pak' => 'รหัสคริสตจักรภาค',
            'church_date' => 'วันที่เพิ่มรายการ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPak()
    {
        return $this->hasOne(Pak::className(), ['id_pak' => 'id_pak']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMembers()
    {
        return $this->hasMany(Member::className(), ['id_church' => 'id_church']);
    }
}
