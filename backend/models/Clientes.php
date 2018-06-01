<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $id
 * @property string $nit
 * @property string $nombres
 * @property string $direccion
 * @property string $cupo
 * @property string $saldo
 * @property string $pais
 * @property int $municipio_id
 * @property int $departamento_id
 *
 * @property Municipios $municipio
 * @property Departamentos $departamento
 * @property Visitas[] $visitas
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['cupo', 'required', 'message' => 'Campo requerido'],
            ['cupo', 'number', 'message' => 'El campo debe de ser mayor a 1'],
            ['saldo', 'required', 'message' => 'Campo requerido'],
            ['saldo', 'number', 'message' => 'El campo debe de ser mayor a 1'],
            [['municipio_id', 'departamento_id'], 'integer'],
            ['nit', 'required', 'message' => 'Campo requerido'],
            ['nit', 'string', 'max' => 50],
            ['nombres', 'string', 'max' => 250],
            ['nombres', 'required', 'message' => 'Campo requerido'],
            ['direccion', 'string', 'max' => 255],
            ['direccion', 'required', 'message' => 'Campo requerido'],
            [['pais'], 'string', 'max' => 20],
            ['municipio_id', 'exist', 'skipOnError' => true, 'targetClass' => Municipios::className(), 'targetAttribute' => ['municipio_id' => 'id']],
            ['municipio_id', 'required', 'message' => 'Campo requerido'],
            ['departamento_id', 'exist', 'skipOnError' => true, 'targetClass' => Departamentos::className(), 'targetAttribute' => ['departamento_id' => 'id']],
            ['departamento_id', 'required', 'message' => 'Campo requerido']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nit' => 'Nit',
            'nombres' => 'Nombres',
            'direccion' => 'Direccion',
            'cupo' => 'Cupo',
            'saldo' => 'Saldo',
            'pais' => 'Pais',
            'municipio_id' => 'Municipio ID',
            'departamento_id' => 'Departamento ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipio()
    {
        return $this->hasOne(Municipios::className(), ['id' => 'municipio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamento()
    {
        return $this->hasOne(Departamentos::className(), ['id' => 'departamento_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisitas()
    {
        return $this->hasMany(Visitas::className(), ['cliente_id' => 'id']);
    }
}
