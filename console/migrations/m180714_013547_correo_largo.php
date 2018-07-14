<?php

use yii\db\Migration;

/**
 * Class m180714_013547_correo_largo
 */
class m180714_013547_correo_largo extends Migration
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

        $this->alterColumn('cvpersonal', 'correo', $this->string(100));

        $this->update('centfeds', ['entidad'=> 'Ciudad de México'], 'entidad= "Ciudad de Mexico"');
        $this->update('centfeds', ['entidad'=> 'Yucatán'], 'entidad= "Yucatan"');
        $this->update('centfeds', ['entidad'=> 'Nuevo León'], 'entidad= "Nuevo Leon"');
        $this->update('centfeds', ['entidad'=> 'Querétaro'], 'entidad= "Queretaro"');
        $this->update('centfeds', ['entidad'=> 'Michoacán'], 'entidad= "Michoacan"');
        $this->update('centfeds', ['entidad'=> 'San Luis Potosí'], 'entidad= "San Luis Potosi"');
        $this->update('centfeds', ['entidad'=> 'Yucatán'], 'entidad= "Yucatan"');

        $this->update('cestadocivil', ['estadocivil'=> 'Soltera / Soltero'], 'estadocivil= "Soltero"');
        $this->update('cestadocivil', ['estadocivil'=> 'Casada / Casado'], 'estadocivil= "Casado"');
        $this->update('cestadocivil', ['estadocivil'=> 'Unión Libre'], 'estadocivil= "Union Libre"');
        $this->update('cestadocivil', ['estadocivil'=> 'Divorciada / Divorciado'], 'estadocivil= "Divorciado"');
        $this->update('cestadocivil', ['estadocivil'=> 'Viuda / Viudo'], 'estadocivil= "Viudo"');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180714_013547_correo_largo cannot be reverted.\n";

        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180714_013547_correo_largo cannot be reverted.\n";

        return false;
    }
    */
}
