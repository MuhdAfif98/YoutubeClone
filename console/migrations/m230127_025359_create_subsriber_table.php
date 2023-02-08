<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subsriber}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m230127_025359_create_subsriber_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subsriber}}', [
            'id' => $this->primaryKey(),
            'channel_id' => $this->integer(11),
            'user_id' => $this->integer(11),
            'created_at' => $this->integer(11),
        ]);

        // creates index for column `channel_id`
        $this->createIndex(
            '{{%idx-subsriber-channel_id}}',
            '{{%subsriber}}',
            'channel_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-subsriber-channel_id}}',
            '{{%subsriber}}',
            'channel_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-subsriber-user_id}}',
            '{{%subsriber}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-subsriber-user_id}}',
            '{{%subsriber}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-subsriber-channel_id}}',
            '{{%subsriber}}'
        );

        // drops index for column `channel_id`
        $this->dropIndex(
            '{{%idx-subsriber-channel_id}}',
            '{{%subsriber}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-subsriber-user_id}}',
            '{{%subsriber}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-subsriber-user_id}}',
            '{{%subsriber}}'
        );

        $this->dropTable('{{%subsriber}}');
    }
}
