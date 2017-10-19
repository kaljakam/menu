<?php

use yii\db\Migration;

/**
 * Handles the creation of table `food`.
 */
class m171019_054147_create_food_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('food', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'protein' => $this->integer(),
            'fat' => $this->integer(),
            'carbonhidrate' => $this->integer(),
            'kcal' => $this->integer(),
            'digestibility' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('food');
    }
}
