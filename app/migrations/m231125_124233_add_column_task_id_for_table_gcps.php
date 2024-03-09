<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Class m231125_124233_add_column_task_id_for_table_gcps
 */
class m231125_124233_add_column_task_id_for_table_gcps extends Migration
{
    /**
     * {@inheritDoc}
     */
    public function up()
    {
        $this->addColumn('gcps', 'task_id', $this->integer(11));
    }

    /**
     * @return bool
     */
    public function down(): bool
    {
        return false;
    }
}