<?php

use yii\db\Migration;

/**
 * Class m180521_183912_recluta_empresas
 */
class m180521_183912_recluta_empresas extends Migration
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

        $this->createTable('{{%empresas}}', [
            'id' => $this->primaryKey(),
            'empresa' => $this->string(100)->notNull() . " COMMENT 'Empresa o Dependencia' ",
            'nombre' => $this->string(100)->notNull(),
            'rfc' => $this->string(13),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'status' => $this->smallInteger() . " COMMENT 'Si la empresa se puede utilizar o no' ",

        ], $tableOptions
        );

        $this->insert('empresas', [
            'empresa' => 'Gobierno del Estado',
            'nombre' => 'Xalapa',
            'status' => 1
        ]);

        $this->createTable('{{%reclutadores}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(100)->notNull() ,
            'apaterno' => $this->string(100),
            'amaterno' => $this->string(100),
            'puesto' => $this->string(60),
            'telefono' => $this->string(20),
            'ext_telefono' => $this->integer(),
            'email' => $this->string(100),
            'user_id' => $this->integer() . " COMMENT 'Identificador del usuario' ",
            'empresas_id' => $this->integer(),

            'rfc' => $this->string(13),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
            'status' => $this->smallInteger() . " COMMENT 'Si el reclutador esta activo' ",

        ], $tableOptions
        );

        $this->addForeignKey('reclutadores_user', 'reclutadores', 'user_id', 'user', 'id', 'cascade', 'cascade');
        $this->addForeignKey('reclutadores_empresa', 'reclutadores', 'empresas_id', 'empresas', 'id', 'cascade', 'cascade');

        $this->createTable('{{%ofertas_laborales}}', [
            'id' => $this->primaryKey(),
            'actividades' => $this->text(),
            'conocimientos' => $this->text(),
            'infoadicional' => $this->text(),
            'edad_minima' => $this->integer(),
            'edad_maxima' => $this->integer(),
            'sueldo' => $this->integer(),
            'experiencia' => $this->integer(),
            'no_vacantes' => $this->integer(),
            'sexo' => $this->char(10),
            'vigencia' => $this->date(),
            //'vigencia' => $this->integer(). " COMMENT ' Dias que va a estar activa la oferta laboral ' ",

            'puesto_id' => $this->integer(),
            'estadocivil_id' => $this->integer(),
            'horario_id' => $this->integer(),
            'tcontratacion_id' => $this->integer(),
            'profesion_id' => $this->integer(),
            'nivelestudio_id' => $this->integer(),
            'empresa_id' => $this->integer(),

            'estadovacante_id' => $this->integer(),

            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),

        ], $tableOptions
        );

        $this->addForeignKey('oferta_puesto','ofertas_laborales','puesto_id','cpuestos','id','cascade','cascade');
        $this->addForeignKey('oferta_estadovacante','ofertas_laborales','estadovacante_id','cestadovacante','id','cascade','cascade');
        $this->addForeignKey('oferta_estadocivil','ofertas_laborales','estadocivil_id','cestadocivil','id','cascade','cascade');
        $this->addForeignKey('oferta_horario','ofertas_laborales','horario_id','chorario','id','cascade','cascade');
        $this->addForeignKey('oferta_tcontratacion','ofertas_laborales','tcontratacion_id','ctcontratacion','id','cascade','cascade');
        $this->addForeignKey('oferta_profesion','ofertas_laborales','profesion_id','cprofesiones','id','cascade','cascade');
        $this->addForeignKey('oferta_nivelestudio','ofertas_laborales','nivelestudio_id','cnivelestudios','id','cascade','cascade');
        $this->addForeignKey('oferta_empresa','ofertas_laborales','empresa_id','empresas','id','cascade','cascade');



    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180521_183912_recluta_empresas cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180521_183912_recluta_empresas cannot be reverted.\n";

        return false;
    }
    */
}
