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
            'first_name' => 'Ime',
            'last_name' => 'Prezime',
            'date_of_birth' => 'Datum rođenja',
            'assignee_status' => 'Status',
            'created_at' => 'Datum kreiranja',
            'updated_at' => 'Datum izmjene',
            'deleted_at' => 'Datum brisanja',
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

    public function getAllActive()
    {
        $db = Yii::$app->db;
        $sql = "SELECT
                    id,
                    CONCAT(first_name, ' ', last_name) as assignee_name 
                FROM
                    assignees
                WHERE
                    assignee_status = 'ACTIVE'";

        $results = $db->createCommand($sql)->queryAll();

        $assignees = [];
        foreach ($results as $r) {
            $assignees[$r['id']] = $r['assignee_name'];
        }

        return ($assignees);
    }
}
