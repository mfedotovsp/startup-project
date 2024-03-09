<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Class m230104_102739_create_table_message_development
 */
class m230104_102739_create_table_message_development extends Migration
{
    /**
     * {@inheritDoc}
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'ENGINE=InnoDB CHARSET=utf8';
        }

        $this->createTable('message_development', [
            'id' => $this->primaryKey(11)->unsigned(),
            'conversation_id' => $this->integer(11)->notNull(),
            'sender_id' => $this->integer(11)->notNull(),
            'adressee_id' => $this->integer(11)->notNull(),
            'description' => $this->text(),
            'status' => $this->integer(11)->notNull(),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
        ], $tableOptions);
    }

    /**
     * @return bool
     */
    public function down(): bool
    {
        return false;
    }
}