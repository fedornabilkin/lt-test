<?php

use console\migrations\AbstractMigration;

/**
 * Handles the creation of table `vacancy`.
 */
class m180411_171819_create_vacancy_table extends AbstractMigration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vacancy}}', [
            'id' => $this->primaryKey()->unsigned(),
            'uid' => $this->bigInteger()->unsigned(),
            'uid_content' => $this->integer()->unsigned(),
            'customer_id' => $this->integer()->unsigned(),
            'title' => $this->string()->notNull(),
            'content' => $this->text(),
            'age_min' => $this->smallInteger(2)->defaultValue(18)->unsigned(),
            'age_max' => $this->smallInteger(2)->defaultValue(64)->unsigned(),
            'phones' => $this->string()->notNull(),
            'address' => $this->text(),
            'salary_min' => $this->integer()->unsigned(),
            'salary_max' => $this->integer()->unsigned(),
        ], $this->tableOptions);


        $this->createIndex('{{%idx-vacancy-uid}}','{{%vacancy}}','uid');

        $this->addForeignKey('fki-vacancy-uid-bind_uids-id',
            '{{%vacancy}}',
            'uid',
            '{{%bind_uids}}',
            'id',
            'CASCADE');

        $this->addForeignKey('fki-vacancy-customer_id-customer-id',
            '{{%vacancy}}',
            'customer_id',
            '{{%customer}}',
            'id',
            'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fki-vacancy-uid-bind_uids-id', '{{%vacancy}}');
        $this->dropForeignKey('fki-vacancy-customer_id-customer-id', '{{%vacancy}}');

        $this->dropIndex('{{%idx-vacancy-uid}}','{{%vacancy}}');

        $this->dropTable('{{%vacancy}}');
    }
}
