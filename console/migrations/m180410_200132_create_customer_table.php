<?php

use console\migrations\AbstractMigration;

/**
 * Handles the creation of table `customer`.
 */
class m180410_200132_create_customer_table extends AbstractMigration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%customer}}', [
            'id' => $this->primaryKey()->unsigned(),
            'uid' => $this->bigInteger()->unsigned(),
            'user_id' => $this->integer(),
            'title' => $this->string()->notNull(),
            'phones' => $this->string()->notNull(),
            'address' => $this->text(),
            'email' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
        ], $this->tableOptions);


        $this->createIndex('{{%idx-customer-uid}}','{{%customer}}','uid');

        $this->addForeignKey('fki-customer-uid-bind_uids-id',
            '{{%customer}}',
            'uid',
            '{{%bind_uids}}',
            'id',
            'CASCADE');

        $this->addForeignKey('fki-customer-user_id-user-id',
            '{{%customer}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fki-customer-uid-bind_uids-id', '{{%customer}}');
        $this->dropForeignKey('fki-customer-user_id-user-id', '{{%customer}}');

        $this->dropIndex('{{%idx-customer-uid}}','{{%customer}}');

        $this->dropTable('{{%customer}}');
    }
}
