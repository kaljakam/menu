<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_info`.
 * Has foreign keys to the tables:
 *
 * - `user`
 */
class m171019_053837_create_user_info_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_info', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'weight' => $this->float(),
            'height' => $this->float(),
            'age' => $this->integer(),
            'activity_level' => $this->integer(),
            'heart_rate' => $this->integer(),
            'waist' => $this->float(),
            'hips' => $this->float(),
            'elbow_width' => $this->float(),
            'sigil' => $this->float(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-user_info-user_id',
            'user_info',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user_info-user_id',
            'user_info',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-user_info-user_id',
            'user_info'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-user_info-user_id',
            'user_info'
        );

        $this->dropTable('user_info');
    }
}
