<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "municipios".
 *
 * @property int $id
 * @property string $nombre_municipio
 * @property int $departamento_id
 *
 * @property Clientes[] $clientes
 * @property Departamentos $departamento
 */
class Municipios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'municipios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nombre_municipio', 'departamento_id'], 'required'],
            [['id', 'departamento_id'], 'integer'],
            [['nombre_municipio'], 'string', 'max' => 50],
            [['id'], 'unique'],
            [['departamento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Departamentos::className(), 'targetAttribute' => ['departamento_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre_municipio' => 'Nombre Municipio',
            'departamento_id' => 'Departamento ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Clientes::className(), ['municipio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamento()
    {
        return $this->hasOne(Departamentos::className(), ['id' => 'departamento_id']);
    }
}
