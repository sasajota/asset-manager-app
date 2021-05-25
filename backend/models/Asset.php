<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "assets".
 *
 * @property int $id
 * @property string $asset_name
 * @property string $introduction_date
 * @property float|null $asset_value
 * @property int $assignee_id
 * @property int $facility_id
 * @property string|null $asset_status
 * @property string $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Assignees $assignee
 * @property Facilities $facility
 * @property Transfers[] $transfers
 */
class Asset extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'assets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['asset_name', 'introduction_date', 'assignee_id', 'facility_id', 'created_at'], 'required'],
            [['introduction_date', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['asset_value'], 'number'],
            [['assignee_id', 'facility_id'], 'integer'],
            [['asset_status'], 'string'],
            [['asset_name'], 'string', 'max' => 255],
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
            'asset_name' => 'Naziv',
            'introduction_date' => 'Datum uvođenja',
            'asset_value' => 'Vrijednost',
            'assignee_id' => 'Zaduženi korisnik',
            'facility_id' => 'Lokacija',
            'asset_status' => 'Status',
            'created_at' => 'Datum kreiranja',
            'updated_at' => 'Datum izmjene',
            'deleted_at' => 'Datum brisanja',
        ];
    }

    /**
     * Gets query for [[Assignee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAssignee()
    {
        return $this->hasOne(Assignees::className(), ['id' => 'assignee_id']);
    }

    /**
     * Gets query for [[Facility]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFacility()
    {
        return $this->hasOne(Facilities::className(), ['id' => 'facility_id']);
    }

    /**
     * Gets query for [[Transfers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransfers()
    {
        return $this->hasMany(Transfers::className(), ['asset_id' => 'id']);
    }

    public function getAllActive()
    {
        $db = Yii::$app->db;
        $sql = "SELECT
                    id,
                    asset_name
                FROM
                    assets
                WHERE
                    asset_status = 'ACTIVE'";

        $results = $db->createCommand($sql)->queryAll();

        $assets = [];
        foreach ($results as $r) {
            $assets[$r['id']] = $r['asset_name'];
        }

        return ($assets);
    }
}
