<?php

use yii\db\Migration;

/**
 * Class m180606_010001_cv_datospersonales
 */
class m180606_010001_cv_datospersonales extends Migration
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

        $this->createTable('{{%cvpersonal}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            // Datos Personales
            'nombre' => $this->string(30)->notNull() ,
            'apaterno' => $this->string(30)->notNull(),
            'amaterno' => $this->string(30),
            'rfc' => $this->string(13),
            'curp' => $this->string(18),
            'fnac' => $this->date(),
            'estadocivil_id' => $this->integer(),
            'sexo' => $this->char(1),
            'tel_ofna' => $this->string(10),
            'tel_ofna_ext' => $this->string(10),
            'tel_movil' => $this->string(10),
            'tel_casa_lada' => $this->string(3),
            'tel_casa' => $this->string(10),
            'correo' => $this->string(30),
            // Datos de Domicilio
            'entfed_id' => $this->integer(),
            'municipio' => $this->string(100),
            'colonia' => $this->string(100),
            'cp' => $this->string(5),
            'calle' => $this->string(100),
            'numero' => $this->string(100),
            'entrecalle' => $this->string(100),
            // Datos de Registro
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),

        ], $tableOptions
        );
        $this->addForeignKey('cvpersonal_users', 'cvpersonal', 'user_id', 'user', 'id');

        $this->addForeignKey('cvpersonal_estadocivil','cvpersonal', 'estadocivil_id','cestadocivil', 'id' );

        $this->addForeignKey('cvpersonal_entfed','cvpersonal', 'entfed_id','centfeds', 'id' );

        $this->createTable('{{%cvnivelestudio}}', [
            'id' => $this->primaryKey(),
            'cvpersonal_id' => $this->integer(),
            'cnivelestudio_id' => $this->integer(),
            'cprofesion_id' => $this->integer(),
            'escuela' => $this->string(100),
            'certificado' => $this->char(1),
            'titulo' => $this->char(1),
            'cedula' => $this->char(1),
        ], $tableOptions);

        $this->addForeignKey('cvnivelestudio_personal','cvnivelestudio', 'cvpersonal_id','cvpersonal', 'id' );
        $this->addForeignKey('cvnivelestudio_nivelestudio','cvnivelestudio', 'cnivelestudio_id','cnivelestudios', 'id' );
        $this->addForeignKey('cvnivelestudio_profesion','cvnivelestudio', 'cprofesion_id','cprofesiones', 'id' );

        $this->createTable('{{%cvexperiencia}}', [
            'id' => $this->primaryKey(),
            'cvpersonal_id' => $this->integer(),
            'empresa' => $this->string(100),
            'puesto' => $this->string(100),
            'actividades' => $this->text(),
            'iniciopuesto' => $this->date(),
            'finpuesto' => $this->date(),
            'empleoactual' => $this->char(1),
        ], $tableOptions);
        $this->addForeignKey('cvexperiencia_personal','cvexperiencia', 'cvpersonal_id','cvpersonal', 'id' );

        $this->createTable('{{%cvcursos}}', [
            'id' => $this->primaryKey(),
            'cvpersonal_id' => $this->integer(),
            'curso' => $this->string(100),
            'escuela' => $this->string(100),
            'iniciocurso' => $this->date(),
            'fincurso' => $this->date(),
            'estado' => $this->char(1), // Iniciando - En Curso - Finalizado
        ], $tableOptions);
        $this->addForeignKey('cvcursos_personal','cvcursos', 'cvpersonal_id','cvpersonal', 'id' );

        $this->createTable('{{%cvidiomas}}', [
            'id' => $this->primaryKey(),
            'cvpersonal_id' => $this->integer(),
            'idiomas_id' => $this->integer(),
            'habla' => $this->integer(),
            'escribe' => $this->integer(),
            'lee' => $this->integer(),
        ], $tableOptions);
        $this->addForeignKey('cvidiomas_personal','cvidiomas', 'cvpersonal_id','cvpersonal', 'id' );
        $this->addForeignKey('cvidiomas_idiomas','cvidiomas', 'idiomas_id','cidiomas', 'id' );

        $this->createTable('{{%cvhabilidades}}', [
            'id' => $this->primaryKey(),
            'cvpersonal_id' => $this->integer(),
            'habilidad_id' => $this->integer(),
            'descripcion' => $this->text(),
        ], $tableOptions);
        $this->addForeignKey('cvhabilidades_personal','cvhabilidades', 'cvpersonal_id','cvpersonal', 'id' );
        $this->addForeignKey('cvhabilidades_habilidad','cvhabilidades', 'habilidad_id','chabilidades', 'id' );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('cvhabilidades');
        $this->dropTable('cvidiomas');
        $this->dropTable('cvcursos');
        $this->dropTable('cvexperiencia');
        $this->dropTable('cvnivelestudio');
        $this->dropTable('cvpersonal');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180606_010001_cv_datospersonales cannot be reverted.\n";

        return false;
    }
    */
}
