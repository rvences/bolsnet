<?php

use yii\db\Migration;

/**
 * Class m180615_000537_add_role
 */
class m180615_000537_add_role extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'role', $this->string(20));


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180615_000537_add_role cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180615_000537_add_role cannot be reverted.\n";

        return false;
    }
    */
}
