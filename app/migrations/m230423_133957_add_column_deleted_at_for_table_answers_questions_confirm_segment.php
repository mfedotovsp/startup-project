<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Class m230423_133957_add_column_deleted_at_for_table_answers_questions_confirm_segment
 */
class m230423_133957_add_column_deleted_at_for_table_answers_questions_confirm_segment extends Migration
{
    /**
     * {@inheritDoc}
     */
    public function up()
    {
        $this->addColumn('answers_questions_confirm_segment', 'deleted_at', $this->integer(11));
    }

    /**
     * @return bool
     */
    public function down(): bool
    {
        return false;
    }
}
