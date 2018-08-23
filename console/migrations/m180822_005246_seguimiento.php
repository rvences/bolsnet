<?php

use yii\db\Migration;

/**
 * Class m180822_005246_seguimiento
 */
class m180822_005246_seguimiento extends Migration
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


        $this->createTable('{{%cseguimiento}}', [
            'id' => $this->primaryKey(),
            'seguimiento' => $this->string(100),
        ], $tableOptions);


        $this->addColumn('cvpersonal', 'seguimiento_id', 'integer');
        $this->addForeignKey('cvpersonal_seguimiento','cvpersonal', 'seguimiento_id','cseguimiento', 'id', 'CASCADE', 'CASCADE' );


        $this->batchInsert('cseguimiento',
            array('seguimiento'),
            array(
                ['No contesto'],
                ['Ya tiene trabajo']

            )
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180822_005246_seguimiento cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180822_005246_seguimiento cannot be reverted.\n";

        return false;
    }
    */
}
