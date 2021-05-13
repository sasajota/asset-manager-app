<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "assignees".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $date_of_birth
 * @property string|null $assignee_status
 * @property string $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Assets[] $assets
 * @property Transfers[] $transfers
 */
class Assignee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assignees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'date_of_birth', 'created_at'], 'required'],
            [['date_of_birth', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['assignee_status'], 'string'],
            [['first_name', 'last_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'date_of_birth' => 'Date Of Birth',
            'assignee_status' => 'Assignee Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * Gets query for [[Assets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssets()
    {
        return $this->hasMany(Assets::className(), ['assignee_id' => 'id']);
    }

    /**
     * Gets query for [[Transfers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransfers()
    {
        return $this->hasMany(Transfers::className(), ['assignee_id' => 'id']);
    }
}
