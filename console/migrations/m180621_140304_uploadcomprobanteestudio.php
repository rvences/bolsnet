<?php

use yii\db\Migration;

/**
 * Class m180621_140304_uploadcomprobanteestudio
 */
class m180621_140304_uploadcomprobanteestudio extends Migration
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

        $this->createTable('cvarchivos', [
            'id' => $this->primaryKey(),
            'cvpersonal_id' => $this->integer(),
            'path' => $this->string(),      // Ruta del archivo
            'filename' => $this->string(),  // Nombre del Archivo original
            'image' => $this->string()      // Nombrel del Archivo guardado
        ], $tableOptions);

        $this->addForeignKey('cvarchivos_personal', 'cvarchivos','cvpersonal_id', 'cvpersonal', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('cvarchivos_personal','cvarchivos');
        $this->dropTable('cvarchivos');

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180621_140304_uploadcomprobanteestudio cannot be reverted.\n";

        return false;
    }
    */
}
