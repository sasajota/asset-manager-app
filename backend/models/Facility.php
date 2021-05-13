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
            'facility_name' => 'Facility Name',
            'introduction_date' => 'Introduction Date',
            'location_lat' => 'Location Lat',
            'location_lon' => 'Location Lon',
            'fac_address' => 'Fac Address',
            'details' => 'Details',
            'facility_status' => 'Facility Status',
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

}
