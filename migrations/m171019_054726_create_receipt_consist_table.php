<?php

use yii\db\Migration;

/**
 * Handles the creation of table `receipt_consist`.
 * Has foreign keys to the tables:
 *
 * - `receipt`
 * - `meal`
 */
class m171019_054726_create_receipt_consist_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('receipt_consist', [
            'id' => $this->primaryKey(),
            'receipt_id' => $this->integer()->notNull(),
            'meal_id' => $this->integer()->notNull(),
            'value' => $this->integer(),
            'value_desc' => $this->string(),
        ]);

        // creates index for column `receipt_id`
        $this->createIndex(
            'idx-receipt_consist-receipt_id',
            'receipt_consist',
            'receipt_id'
        );

        // add foreign key for table `receipt`
        $this->addForeignKey(
            'fk-receipt_consist-receipt_id',
            'receipt_consist',
            'receipt_id',
            'receipt',
            'id',
            'CASCADE'
        );

        // creates index for column `meal_id`
        $this->createIndex(
            'idx-receipt_consist-meal_id',
            'receipt_consist',
            'meal_id'
        );

        // add foreign key for table `meal`
        $this->addForeignKey(
            'fk-receipt_consist-meal_id',
            'receipt_consist',
            'meal_id',
            'meal',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `receipt`
        $this->dropForeignKey(
            'fk-receipt_consist-receipt_id',
            'receipt_consist'
        );

        // drops index for column `receipt_id`
        $this->dropIndex(
            'idx-receipt_consist-receipt_id',
            'receipt_consist'
        );

        // drops foreign key for table `meal`
        $this->dropForeignKey(
            'fk-receipt_consist-meal_id',
            'receipt_consist'
        );

        // drops index for column `meal_id`
        $this->dropIndex(
            'idx-receipt_consist-meal_id',
            'receipt_consist'
        );

        $this->dropTable('receipt_consist');
    }
}
