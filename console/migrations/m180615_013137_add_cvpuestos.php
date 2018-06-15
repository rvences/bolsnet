<?php

use yii\db\Migration;

/**
 * Class m180615_013137_add_cvpuestos
 */
class m180615_013137_add_cvpuestos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }


        $this->createTable('{{%cvpuestos}}', [
            'id' => $this->primaryKey(),
            'cvpersonal_id' => $this->integer(),
            'puestos_id' => $this->integer(),
        ], $tableOptions);
        $this->addForeignKey('cvpuestos_personal','cvpuestos', 'cvpersonal_id','cvpersonal', 'id' );
        $this->addForeignKey('cvpuestos_cpuestos','cvpuestos', 'puestos_id','cpuestos', 'id' );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180615_013137_add_cvpuestos cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180615_013137_add_cvpuestos cannot be reverted.\n";

        return false;
    }
    */
}
