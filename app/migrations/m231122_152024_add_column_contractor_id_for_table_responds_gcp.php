<?php

namespace app\migrations;

use yii\db\Migration;

/**
 * Class m231122_152024_add_column_contractor_id_for_table_responds_gcp
 */
class m231122_152024_add_column_contractor_id_for_table_responds_gcp extends Migration
{
    /**
     * {@inheritDoc}
     */
    public function up()
    {
        $this->addColumn('responds_gcp', 'contractor_id', $this->integer(11));
    }

    /**
     * @return bool
     */
    public function down(): bool
    {
        return false;
    }
}
