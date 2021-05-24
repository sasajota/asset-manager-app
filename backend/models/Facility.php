<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "facilities".
 *
 * @property int $id
 * @property string $facility_name
 * @property string $introduction_date
 * @property float|null $location_lat
 * @property float|null $location_lon
 * @property string|null $fac_address
 * @property string|null $details
 * @property string|null $facility_status
 * @property string $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Asset[] $assets
 * @property Transfer[] $transfers
 */
class Facility extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'facilities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['facility_name', 'introduction_date', 'created_at'], 'required'],
            [['introduction_date', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['location_lat', 'location_lon'], 'number'],
            [['details', 'facility_status'], 'string'],
            [['facility_name'], 'string', 'max' => 255],
            [['fac_address'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'facility_name' => 'Naziv',
            'introduction_date' => 'Datum uvođenja',
            'location_lat' => 'Geografska širina',
            'location_lon' => 'Geografska dužina',
            'fac_address' => 'Adresa',
            'details' => 'Detalji',
            'facility_status' => 'Status',
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
        return $this->hasMany(Asset::className(), ['facility_id' => 'id']);
    }

    /**
     * Gets query for [[Transfers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransfers()
    {
        return $this->hasMany(Transfer::className(), ['facility_id' => 'id']);
    }

    public function getAllActive()
    {
        $db = Yii::$app->db;
        $sql = "SELECT
                    id,
                    facility_name 
                FROM
                    facilities
                WHERE
                    facility_status = 'ACTIVE'";

        $results = $db->createCommand($sql)->queryAll();

        $facilities = [];
        foreach ($results as $r) {
            $facilities[$r['id']] = $r['facility_name'];
        }

        return ($facilities);
    }

}
