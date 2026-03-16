<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%funcionario}}`.
 */
class m260316_000002_create_funcionario_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%funcionario}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(150)->notNull(),
            'cpf' => $this->string(11)->notNull()->unique(),
            'logradouro' => $this->string(150),
            'cep' => $this->string(8),
            'cidade' => $this->string(100),
            'estado' => $this->string(2),
            'numero' => $this->string(10),
            'complemento' => $this->string(100),
            'cargo_id' => $this->integer()->notNull(),
        ]);

        // Cria o índice para a coluna cargo_id
        $this->createIndex(
            'idx-funcionario-cargo_id',
            '{{%funcionario}}',
            'cargo_id'
        );

        // Adiciona a Foreign Key
        $this->addForeignKey(
            'fk-funcionario-cargo_id',
            '{{%funcionario}}',
            'cargo_id',
            '{{%cargo}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Remove a Foreign Key primeiro
        $this->dropForeignKey('fk-funcionario-cargo_id', '{{%funcionario}}');
        
        $this->dropTable('{{%funcionario}}');
    }
}