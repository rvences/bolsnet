<?php

use yii\db\Migration;

/**
 * Class m180518_222308_catalogos
 */
class m180518_222308_catalogos extends Migration
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
        # CATALOGO DEL TIPO DE CUENTA

        $this->createTable('{{%cnivelestudios}}', [
            'id' => $this->primaryKey(),
            'nivelestudio' => $this->string(100)->notNull() . " COMMENT 'Nivel de Estudio' ",

        ], $tableOptions
        );

        $this->batchInsert('cnivelestudios',
            array('nivelestudio'),
            array(
                ['Ninguno'],
                ['Primaria'],
                ['Secundaria'],
                ['Preparatoria / Bachillerato'],
                ['Carrera Comercial'],
                ['Técnica / Carrera Corta'],
                ['Profesional / Universitario'],
                ['Posgrado / Diplomado'],
                ['Maestria'],
                ['Doctorado'],
                ['Especializacion']
            )
        );

        $this->createTable('{{%cprofesiones}}', [
            'id' => $this->primaryKey(),
            'profesion' => $this->string(100)->notNull() . " COMMENT 'Profesiones' ",

        ], $tableOptions
        );

        $this->batchInsert('cprofesiones',
            array('profesion'),
            array(
                ['Arte y Diseño'],
                ['Arquitectura'],
                ['Arquitectura de Paisajes'],
                ['Desarrollo y Gestión Interculturales'],
                ['Diseño de la Comunicación Gráfica'],
                ['Diseño Gráfico'],
                ['Diseño Gráfico y Comunicación Visual'],
                ['Diseño Industrial'],
                ['Planeación Territorial'],
            )
        );

        $this->createTable('{{%cpuestos}}', [
            'id' => $this->primaryKey(),
            'puesto' => $this->string(100)->notNull() . " COMMENT 'Puestos' ",

        ], $tableOptions
        );

        $this->batchInsert('cpuestos',
            array('puesto'),
            array(
                ['Abogado'],
                ['Actor'],
                ['Actuario'],
                ['Administrador'],
                ['Administrador de Eventos'],
                ['Afanador'],
                ['Albañil'],
            )
        );


        $this->createTable('{{%careaslaborales}}', [
            'id' => $this->primaryKey(),
            'arealaboral' => $this->string(100)->notNull() . " COMMENT 'Areas Laborales' ",

        ], $tableOptions
        );

        $this->batchInsert('careaslaborales',
            array('arealaboral'),
            array(
                ['Atención Salud'],
                ['Secretaria Ejecutiva'],
                ['Informatica'],
                ['Limpia Pública'],
            )
        );

        $this->createTable('{{%centfeds}}', [
            'id' => $this->primaryKey(),
            'entidad' => $this->string(100)->notNull() . " COMMENT 'Entidad Federativa' ",

        ], $tableOptions
        );

        $this->batchInsert('centfeds',
            array('entidad'),
            array(
                ['Aguascalientes'],
                ['Baja California'],
                ['Baja California Sur'],
                ['Campeche'],
                ['Coahuila'],
                ['Colima'],
                ['Chiapas'],
                ['Chihuahua'],
                ['Ciudad de Mexico'],
                ['Durango'],
                ['Guanajuato'],
                ['Guerrero'],
                ['Hidalgo'],
                ['Jalisco'],
                ['Estado de México'],
                ['Michoacan'],
                ['Morelos'],
                ['Nayarit'],
                ['Nuevo Leon'],
                ['Oaxaca'],
                ['Puebla'],
                ['Queretaro'],
                ['Quintana Roo'],
                ['San Luis Potosi'],
                ['Sinaloa'],
                ['Sonora'],
                ['Tabasco'],
                ['Tamaulipas'],
                ['Tlaxcala'],
                ['Veracruz'],
                ['Yucatan'],
                ['Zacatecas'],
            )
        );

        $this->createTable('{{%cmunicipios}}', [
            'id' => $this->primaryKey(),
            'entfed_id' => $this->integer()->notNull(),
            'municipio' => $this->string(100)->notNull() . " COMMENT 'Municipio' ",

        ], $tableOptions
        );
        $this->addForeignKey('municipios_entidad', 'cmunicipios', 'entfed_id', 'centfeds', 'id', 'CASCADE', 'CASCADE');


        $this->createTable('{{%cdiscapacidades}}', [
            'id' => $this->primaryKey(),
            'discapacidad' => $this->string(100)->notNull() . " COMMENT 'Discapacidad' ",

        ], $tableOptions
        );

        $this->batchInsert('cdiscapacidades',
            array('discapacidad'),
            array(
                ['Auditiva'],
                ['Cardiaca'],
                ['Congenitas'],
                ['Debida a VIH / SIDA'],
            )
        );

        $this->createTable('{{%chabilidades}}', [
            'id' => $this->primaryKey(),
            'habilidad' => $this->string(100)->notNull() . " COMMENT 'Habilidades' ",

        ], $tableOptions
        );

        $this->batchInsert('chabilidades',
            array('habilidad'),
            array(
                ['Analisis'],
                ['Actitud de Servicio'],
                ['Aseo'],
                ['Creatividad'],
            )
        );

        $this->createTable('{{%chorario}}', [
            'id' => $this->primaryKey(),
            'horario' => $this->string(100)->notNull() . " COMMENT 'Horario Laboral' ",

        ], $tableOptions
        );

        $this->batchInsert('chorario',
            array('horario'),
            array(
                ['Matutino'],
                ['Vespertino'],
                ['Nocturno'],
                ['Mixto'],
            )
        );

        $this->createTable('{{%cidiomas}}', [
            'id' => $this->primaryKey(),
            'idioma' => $this->string(100)->notNull() . " COMMENT 'Idiomas' ",

        ], $tableOptions
        );

        $this->batchInsert('cidiomas',
            array('idioma'),
            array(
                ['Chino Mandarín'],
                ['Español'],
                ['Inglés'],
                ['Árabe'],
                ['Alemán'],
                ['Francés'],
                ['Portugués'],
                ['Hindi'],
                ['Ruso'],
                ['Italiano'],
                ['Coreano'],
                ['Náhuatl'],
                ['Totonaca'],
                ['Huasteco'],
                ['Popoluca'],
                ['Mixe'],
                ['Zoque'],
                ['Chinanteco'],
                ['Zapoteco'],
                ['Mazateco'],
                ['Mixteco'],
                ['Otomí'],
                ['Tepehua'],
                ['Álgica'],
                ['Yuto-nahua'],
                ['Cochimí-yumana'],
                ['Seri'],
                ['Oto-mangue'],
                ['Maya'],
                ['Totonaco-tepehua'],
                ['Tarasca'],
                ['Mixe-zoque'],
                ['Chontal de Oaxaca'],
                ['Huave'],
            )
        );

        $this->createTable('{{%cestadocivil}}', [
            'id' => $this->primaryKey(),
            'estadocivil' => $this->string(100)->notNull() . " COMMENT 'Estado Civil' ",

        ], $tableOptions
        );

        $this->batchInsert('cestadocivil',
            array('estadocivil'),
            array(
                ['Soltero'],
                ['Casado'],
                ['Union Libre'],
                ['Divorciado'],
                ['Viudo'],
            )
        );

        $this->createTable('{{%cestadovacante}}', [
            'id' => $this->primaryKey(),
            'estadovacante' => $this->string(100)->notNull() . " COMMENT 'Estado de la Vacante' ",

        ], $tableOptions
        );

        $this->batchInsert('cestadovacante',
            array('estadovacante'),
            array(
                ['Activa'],
                ['En Proceso de Seleccion'],
                ['Inactiva'],
            )
        );


        $this->createTable('{{%ctcontratacion}}', [
            'id' => $this->primaryKey(),
            'tcontratacion' => $this->string(100)->notNull() . " COMMENT 'Tipo de Contratacion' ",

        ], $tableOptions
        );

        $this->batchInsert('ctcontratacion',
            array('tcontratacion'),
            array(
                ['De formacion / Servicio Social'],
                ['Por tiempo completo'],
                ['Eventual'],
                ['Nomina'],
                ['Obra / Servicio / Proyecto'],
                ['Parcial'],
                ['Por Honorarios'],
                ['Por medio tiempo'],
                ['Practicas'],
                ['Temporal'],
            )
        );






    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180518_222308_catalogos cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180518_222308_catalogos cannot be reverted.\n";

        return false;
    }
    */
}
