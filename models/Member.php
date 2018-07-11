<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property int $id_member รหัสข้อมูล
 * @property string $member_code รหัสสมาชิก
 * @property string $member_name ชื่อ
 * @property string $member_lastname นามสกุล
 * @property string $member_tel เบอร์โทรศัพท์
 * @property int $id_church ชื่อคริสตจักร
 * @property int $id_user ผู้บันทึกรายการ
 * @property string $member_date วันที่เพิ่มรายการ
 *
 * @property Church $church
 * @property User $user
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'member';
    }

    public $userone;
    public $username;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_code', 'member_name', 'member_lastname', 'id_church', 'id_user'], 'required'],
            [['id_church', 'id_user'], 'integer'],
            [['member_date'], 'safe'],
            [['member_code'], 'string', 'max' => 7],
            [['member_name', 'member_lastname'], 'string', 'max' => 225],
            [['member_tel'], 'string', 'max' => 10],
            [['id_church'], 'exist', 'skipOnError' => true, 'targetClass' => Church::className(), 'targetAttribute' => ['id_church' => 'id_church']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_member' => 'รหัสข้อมูล',
            'member_code' => 'รหัสสมาชิก',
            'member_name' => 'ชื่อ',
            'member_lastname' => 'นามสกุล',
            'member_tel' => 'เบอร์โทรศัพท์',
            'id_church' => 'ชื่อคริสตจักร',
            'id_user' => 'ผู้บันทึกรายการ',
            'userone' => 'ผู้บันทึกรายการ',
            'username' => 'ผู้บันทึกรายการ',
            'member_date' => 'วันที่เพิ่มรายการ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChurch()
    {
        return $this->hasOne(Church::className(), ['id_church' => 'id_church']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
