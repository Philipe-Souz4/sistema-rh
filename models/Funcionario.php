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
     * Retorna o CPF com a máscara 000.000.000-00
     * @return string
     */
    public function getFormattedCpf()
    {
        // Remove qualquer caractere que não seja número
        $cpf = preg_replace('/[^0-9]/', '', $this->cpf);

        if (strlen($cpf) === 11) {
            return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "$1.$2.$3-$4", $cpf);
        }

        return $this->cpf; // Retorna o valor original se não tiver 11 dígitos
    }


    /**
     * Retorna o CEP com a máscara 00000-000
     * @return string
     */
    public function getFormattedCep()
    {
        // Remove caracteres não numéricos para garantir a formatação
        $cep = preg_replace('/[^0-9]/', '', $this->cep);

        if (strlen($cep) === 8) {
            return preg_replace("/(\d{5})(\d{3})/", "$1-$2", $cep);
        }

        return $this->cep; // Retorna o original caso não tenha 8 dígitos
    }


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
            [['cpf', 'cep'], 'filter', 'filter' => function ($value) {
                return preg_replace('/[^0-9]/', '', $value);
            }],
            ['cpf', 'string', 'min' => 11, 'max' => 11, 'enableClientValidation' => false],
            ['cpf', 'unique', 'message' => 'Este CPF já está cadastrado.'],
            ['cep', 'filter', 'filter' => function ($value) {
                return preg_replace('/[^0-9]/', '', $value);
            }],
            ['cep', 'string', 'min' => 8, 'max' => 8, 'enableClientValidation' => false],
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
