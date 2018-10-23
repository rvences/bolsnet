<?php

use yii\db\Migration;

/**
 * Class m181022_192904_cespecializacion
 */
class m181022_192904_cespecializacion extends Migration
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

        $this->createTable('{{%cestudios_especializaciones}}', [
            'id' => $this->primaryKey(),
            'nivelestudios_id' => $this->integer(),
            'especializacion' => $this->string(100)->notNull() . " COMMENT 'Especializacion Estudio'",

        ], $tableOptions);

        $this->addForeignKey('cvpersonal_especializacion', 'cestudios_especializaciones', 'nivelestudios_id', 'cnivelestudios', 'id', 'CASCADE', 'CASCADE');

        $this->batchInsert('cestudios_especializaciones',
            array('nivelestudios_id', 'especializacion'),
            array(
                [5, 'Comercial 1'],
                [5, 'Comercial 2'],
                [5, 'Comercial 3'],
                [6, 'Tecnico 1'],
                [6, 'Tecnico 2'],
                [8, 'Posgrado 1'],
                [8, 'Posgrado 2'],
                [8, 'Posgrado 3'],
                [9, 'Maestría 1'],
                [9, 'Maestría 2'],
                [9, 'Maestría 3'],
                [10, 'Doctorado 1'],
                [10, 'Doctorado 2'],
                [10, 'Doctorado 3'],
                [11, 'Especialización 1'],
                [11, 'Especialización 2'],
                [11, 'Especialización 3'],


            )
        );

        $this->addColumn('cvnivelestudio', 'nivelestudios_id', $this->integer());
        $this->addColumn('cvnivelestudio', 'ffin', $this->date());

        $this->addForeignKey('nivelestudio_especializados', 'cvnivelestudio', 'nivelestudios_id', 'cestudios_especializaciones', 'id', 'CASCADE', 'CASCADE');



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('cestudios_especializaciones');
        //echo "m181022_192904_cespecializacion cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181022_192904_cespecializacion cannot be reverted.\n";

        return false;
    }
    */
}
