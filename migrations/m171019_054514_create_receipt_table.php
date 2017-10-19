<?php

use yii\db\Migration;

/**
 * Handles the creation of table `receipt`.
 */
class m171019_054514_create_receipt_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('receipt', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'descr' => $this->string(),
            'receipt' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('receipt');
    }
}
