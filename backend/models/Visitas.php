<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "visitas".
 *
 * @property int $id
 * @property string $fecha
 * @property string $vendedor
 * @property string $valor_neto
 * @property string $valor_visita
 * @property string $observaciones
 * @property int $cliente_id
 *
 * @property Clientes $cliente
 */
class Visitas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'visitas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            ['valor_neto', 'required', 'message' => 'El campo es obligatorio'],
            [['valor_neto', 'valor_visita'], 'number'],
            ['valor_visita', 'required', 'message' => 'El campo es obligatorio'],
            [['cliente_id'], 'integer'],
            [['vendedor'], 'string', 'max' => 50],
            [['observaciones'], 'string', 'max' => 255],
            [['cliente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['cliente_id' => 'id']],
            ['cliente_id', 'required', 'message' => 'El campo es obligatorio']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha',
            'vendedor' => 'Vendedor',
            'valor_neto' => 'Valor Neto',
            'valor_visita' => 'Valor Visita',
            'observaciones' => 'Observaciones',
            'cliente_id' => 'Cliente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Clientes::className(), ['id' => 'cliente_id']);
    }
}
