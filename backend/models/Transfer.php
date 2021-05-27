<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "transfers".
 *
 * @property int $id
 * @property int $asset_id
 * @property int $assignee_id
 * @property int $facility_id
 * @property string|null $transfer_status
 * @property string $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Assets $asset
 * @property Assignees $assignee
 * @property Facilities $facility
 */
class Transfer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transfers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['asset_id', 'assignee_id', 'facility_id', 'created_at'], 'required'],
            [['asset_id', 'assignee_id', 'facility_id'], 'integer'],
            [['transfer_status'], 'string'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['asset_id'], 'exist', 'skipOnError' => true, 'targetClass' => Asset::className(), 'targetAttribute' => ['asset_id' => 'id']],
            [['assignee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Assignee::className(), 'targetAttribute' => ['assignee_id' => 'id']],
            [['facility_id'], 'exist', 'skipOnError' => true, 'targetClass' => Facility::className(), 'targetAttribute' => ['facility_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'asset_id' => 'Osnovno sredstvo',
            'assignee_id' => 'Zaduženi',
            'facility_id' => 'Lokacija',
            'transfer_status' => 'Status transfera',
            'created_at' => 'Datum kreiranja',
            'updated_at' => 'Datum izmjene',
            'deleted_at' => 'Datum brisanja',
        ];
    }

    /**
     * Gets query for [[Asset]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAsset()
    {
        return $this->hasOne(Asset::className(), ['id' => 'asset_id']);
    }

    /**
     * Gets query for [[Assignee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssignee()
    {
        return $this->hasOne(Assignee::className(), ['id' => 'assignee_id']);
    }

    /**
     * Gets query for [[Facility]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFacility()
    {
        return $this->hasOne(Facility::className(), ['id' => 'facility_id']);
    }
}
