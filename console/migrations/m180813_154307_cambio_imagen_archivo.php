<?php

use yii\db\Migration;

/**
 * Class m180813_154307_cambio_imagen_archivo
 */
class m180813_154307_cambio_imagen_archivo extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('cvarchivos', 'image', 'archivo');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180813_154307_cambio_imagen_archivo cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180813_154307_cambio_imagen_archivo cannot be reverted.\n";

        return false;
    }
    */
}
