<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pak".
 *
 * @property int $id_pak รหัสคริสตจักรภาค
 * @property string $pak_name ชื่อคริสตจักรภาค
 * @property string $pak_date วันที่เพิ่มรายการ
 *
 * @property Church[] $churches
 */
class Pak extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pak';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pak_name'], 'required'],
            [['pak_date'], 'safe'],
            [['pak_name'], 'string', 'max' => 225],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pak' => 'รหัสคริสตจักรภาค',
            'pak_name' => 'ชื่อคริสตจักรภาค',
            'pak_date' => 'วันที่เพิ่มรายการ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChurches()
    {
        return $this->hasMany(Church::className(), ['id_pak' => 'id_pak']);
    }
}
