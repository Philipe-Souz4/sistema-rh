<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "funcionario".
 *
 * @property int $id
 * @property string $nome
 * @property string $cpf
 * @property string|null $logradouro
 * @property string|null $cep
 * @property string|null $cidade
 * @property string|null $estado
 * @property string|null $numero
 * @property string|null $complemento
 * @property int $cargo_id
 *
 * @property Cargo $cargo
 */
class Funcionario extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'funcionario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['logradouro', 'cep', 'cidade', 'estado', 'numero', 'complemento'], 'default', 'value' => null],
            [['nome', 'cpf', 'cargo_id'], 'required'],
            [['cargo_id'], 'default', 'value' => null],
            [['cargo_id'], 'integer'],
            [['nome', 'logradouro'], 'string', 'max' => 150],
            ['cpf', 'string', 'min' => 11, 'max' => 11],
            ['cpf', 'unique', 'message' => 'Este CPF já está cadastrado.'],
            ['cep', 'string', 'min' => 8, 'max' => 8],
            [['cidade', 'complemento'], 'string', 'max' => 100],
            [['estado'], 'string', 'max' => 2],
            [['cpf'], 'unique'],
            [['cargo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cargo::class, 'targetAttribute' => ['cargo_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'cpf' => 'CPF',
            'logradouro' => 'Logradouro',
            'cep' => 'CEP',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'numero' => 'Numero',
            'complemento' => 'Complemento',
            'cargo_id' => 'Cargo',
        ];
    }

    /**
     * Gets query for [[Cargo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCargo()
    {
        return $this->hasOne(Cargo::class, ['id' => 'cargo_id']);
    }

}
