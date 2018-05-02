<?php

use yii\db\Migration;

/**
 * Handles the creation of table `candidate`.
 */
class m180501_215027_create_candidate_table extends \console\migrations\AbstractMigration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%candidate}}', [
            'id' => $this->primaryKey(),
            'uid' => $this->bigInteger()->unsigned(),
            'uid_content' => $this->bigInteger()->notNull()->unsigned()->comment('vacancy uid field'),
            'fname' => $this->string(30),
            'iname' => $this->string(30),
            'oname' => $this->string(30),
            'email' => $this->string(30),
            'phone' => $this->string(30),
            'birthday' => $this->integer(),
        ], $this->tableOptions);

        $this->createIndex('{{%idx-candidate-uid}}','{{%candidate}}','uid');
        $this->createIndex('{{%idx-candidate-uid_content}}','{{%candidate}}','uid_content');

        $this->addForeignKey('fki-candidate-uid-bind_uids-id',
            '{{%candidate}}',
            'uid',
            '{{%bind_uids}}',
            'id',
            'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fki-candidate-uid-bind_uids-id', '{{%candidate}}');

        $this->dropIndex('{{%idx-candidate-uid}}','{{%candidate}}');
        $this->dropIndex('{{%idx-candidate-uid_content}}','{{%candidate}}');

        $this->dropTable('{{%candidate}}');
    }
}
