<?php

use yii\db\Migration;

/**
 * Class m180620_210149_registro_captura
 */
class m180620_210149_registro_captura extends Migration
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

        $this->createTable('{{%ctipoatencion}}', [
            'id' => $this->primaryKey(),
            'tipoatencion' => $this->string(20)->notNull() . " COMMENT 'Tipo de Atención' ",

        ], $tableOptions
        );

        $this->batchInsert('ctipoatencion',
            array('tipoatencion'),
            array(
                ['Presencial'],
                ['Telefónica'],
            )
        );

        $this->createTable('{{%ctipoasesoria}}', [
            'id' => $this->primaryKey(),
            'tipoasesoria' => $this->string(20)->notNull() . " COMMENT 'Tipo de Asesoría' ",

        ], $tableOptions
        );

        $this->batchInsert('ctipoasesoria',
            array('tipoasesoria'),
            array(
                ['Psicológica'],
                ['Jurídica'],
                ['Trabajo Social'],
                ['Promotora'],
            )
        );

        // select FROM_UNIXTIME(created_at) from cedula;
        $this->createTable('cedula', [
            'id' => $this->primaryKey(),
            'foliocae' => $this->string(15),
            'foliovictima' => $this->string(15),
            'folioevento' => $this->string(15),
            'tipoatencion_id' => $this->integer(),
            'tipoasesoria_id' => $this->integer(),
            'demanda' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('FK_cedula_tipoatencion', 'cedula', 'tipoatencion_id', 'ctipoatencion', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedula_tipoasesoria', 'cedula', 'tipoasesoria_id', 'ctipoasesoria', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedula_user', 'cedula', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_cedula_user2', 'cedula', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');




        # 11.	Estado civil: soltera, casada, unión libre, viuda, divorciada, no especificado.
        $this->createTable('{{%cestadoscivil}}', [
            'id' => $this->primaryKey(),
            'estadocivil' => $this->string(20)->notNull() . " COMMENT 'Estado Civil' ",

        ], $tableOptions
        );

        $this->batchInsert('cestadoscivil',
            array('estadocivil'),
            array(
                ['Soltera'],
                ['Concubinato'],
                ['Separada'],
                ['Casada'],
                ['Union Libre'],
                ['Divorciada'],
                ['Viuda'],
                ['Amasiato'],
            )
        );

        $this->createTable('{{%cagresor}}', [
            'id' => $this->primaryKey(),
            'agresor' => $this->string(20)->notNull() . " COMMENT 'Agresor' ",

        ], $tableOptions
        );

        $this->batchInsert('cagresor',
            array('agresor'),
            array(
                ['Pareja'],
                ['Novio(a)'],
                ['Desconocido'],
                ['Conocido'],
                ['Familiar'],
            )
        );

        $this->createTable('generalesusuaria', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(),
            'nombre' => $this->string(50),
            'apellido' => $this->string(50),
            'fnac' => $this->date(),
            'lugarnac' => $this->string(30),
            'estadocivil_id' => $this->integer(),
            'agresor_id' => $this->integer(),
            'relacion_agresor' => $this->string(20),
            'violencia_pareja' => $this->char(1),
            'domicilio' => $this->string(100),
            'colonia' => $this->string(100),
            'cpostal' => $this->string(100),
            'telefono' => $this->string(10),
            'celular' => $this->string(10),
            'municipio' => $this->string(50),
            'comunidad' => $this->string(100),
            'nohijos' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('FK_generalesusuaria_user', 'generalesusuaria', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_generalesusuaria_user2', 'generalesusuaria', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');

        $this->addForeignKey('FK_generalesusuaria_cedula', 'generalesusuaria', 'cedula_id', 'cedula', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_generalesusuaria_cagresor', 'generalesusuaria', 'agresor_id', 'cagresor', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_generalesusuaria_cestadocivil', 'generalesusuaria', 'estadocivil_id', 'cestadoscivil', 'id', 'RESTRICT', 'CASCADE');

        $this->createTable('generaleshijos', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(),
            'nombre' => $this->string(50),
            'escolaridad' => $this->string(30),
            'edad' => $this->integer(),
            'conquienvive' => $this->string(50),
            'servicio' => $this->char(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('FK_generaleshijos_user', 'generaleshijos', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_generaleshijos_user2', 'generaleshijos', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_generaleshijos_cedula', 'generaleshijos', 'cedula_id', 'cedula', 'id', 'CASCADE', 'CASCADE');


        $this->createTable('generalesallegados', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(),
            'nombre' => $this->string(50),
            'vinculo' => $this->string(30),
            'edad' => $this->integer(),
            'servicio' => $this->char(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('FK_generalesallegados_user', 'generalesallegados', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_generalesallegados_user2', 'generalesallegados', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_generalesallegados_cedula', 'generalesallegados', 'cedula_id', 'cedula', 'id', 'CASCADE', 'CASCADE');



        $this->createTable('{{%cocupaciones}}', [
            'id' => $this->primaryKey(),
            'ocupacion' => $this->string(20)->notNull() . " COMMENT 'Ocupación' ",

        ], $tableOptions
        );

        $this->batchInsert('cocupaciones',
            array('ocupacion'),
            array(
                ['Labores del Hogar'],
                ['Labores de Oficio'],
                ['Estudiante'],
                ['Empleada'],
                ['Comerciante'],
                ['Campesina'],
            )
        );

        $this->createTable('{{%ctipospercepciones}}', [
            'id' => $this->primaryKey(),
            'tipopercepcion' => $this->string(20)->notNull() . " COMMENT 'Percepcion' ",

        ], $tableOptions
        );

        $this->batchInsert('ctipospercepciones',
            array('tipopercepcion'),
            array(
                ['Comisión'],
                ['Salario'],
                ['Beca'],
                ['Honorarios'],
            )
        );

        $this->createTable('{{%cnivelestudios}}', [
            'id' => $this->primaryKey(),
            'nivelestudio' => $this->string(20)->notNull() . " COMMENT 'Nivel de Estudio' ",

        ], $tableOptions
        );

        $this->batchInsert('cnivelestudios',
            array('nivelestudio'),
            array(
                ['Analfabeta'],
                ['Primaria'],
                ['Secundaria'],
                ['Bachillerato'],
                ['Técnica'],
                ['Licenciatura'],
                ['Posgrado'],
                ['Maestría'],
                ['Doctorado'],
            )
        );

        $this->createTable('{{%cestadoestudios}}', [
            'id' => $this->primaryKey(),
            'estadoestudio' => $this->string(20)->notNull() . " COMMENT 'Estatus de Estudio' ",

        ], $tableOptions
        );

        $this->batchInsert('cestadoestudios',
            array('estadoestudio'),
            array(
                ['Terminado'],
                ['Inconcluso'],
            )
        );

        $this->createTable('estratosocial', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(),
            'ocupacion_id' => $this->integer(),
            'tipopercepcion_id' => $this->integer(),
            'ingresomensual' =>$this->integer(),
            'conquienvive' => $this->string(50),
            'redapoyo' => $this->string(50),
            'religion' => $this->string(50),
            'idioma' => $this->string(50),
            'programasocial' => $this->char(1),
            'cualprogramasocial' => $this->string(50),
            'nivelestudio_id' => $this->integer(),
            'estadoestudio_id' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('FK_estratosocial_user', 'estratosocial', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_estratosocial_user2', 'estratosocial', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');

        $this->addForeignKey('FK_estratosocial_cedula', 'estratosocial', 'cedula_id', 'cedula', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_estratosocial_ocupaciones', 'estratosocial', 'ocupacion_id', 'cocupaciones', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_estratosocial_tipopercepciones', 'estratosocial', 'tipopercepcion_id', 'ctipospercepciones', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_estratosocial_nivelestudio', 'estratosocial', 'nivelestudio_id', 'cnivelestudios', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_estratosocial_estadoestudio', 'estratosocial', 'estadoestudio_id', 'cestadoestudios', 'id', 'RESTRICT', 'CASCADE');

        $this->createTable('{{%cfrecuenciasocial}}', [
            'id' => $this->primaryKey(),
            'frecuenciasocial' => $this->string(20)->notNull() . " COMMENT 'Frecuencia' ",

        ], $tableOptions
        );

        $this->batchInsert('cfrecuenciasocial',
            array('frecuenciasocial'),
            array(
                ['Diario'],
                ['Una vez por semana'],
                ['Dos veces por semana'],
                ['Dos veces al mes'],
                ['Cada ocasión'],
                ['Solo en fiestas'],
            )
        );

        $this->createTable('salud', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(),
            'medicamentocontrolado' => $this->char(1),
            'bebidaalcoholica' => $this->char(1),
            'estupefaciente'  => $this->char(1),
            'frecuenciasocial_id' => $this->integer(),
            'serviciomedico' => $this->char(1),
            'queserviciomedico' => $this->string(50),
            'padeceenfermedad' => $this->char(1),
            'quepadeceenfermedad' => $this->string(50),
            'padecediscapacidad' => $this->char(1),
            'quepadecediscapacidad' => $this->string(50),
            'embarazada' => $this->char(1),
            'embarazadameses' => $this->integer(),
            'riesgoembarazo' => $this->string(50),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('FK_salud_user', 'salud', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_salud_user2', 'salud', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');

        $this->addForeignKey('FK_salud_cedula', 'salud', 'cedula_id', 'cedula', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_salud_frecuenciasocial', 'salud', 'frecuenciasocial_id', 'cfrecuenciasocial', 'id', 'RESTRICT', 'CASCADE');






        # 42.	Sintomatología emocional: baja autoestima, ansiedad, estrés, depresión, trastornos del sueño, dependencia emocional, afectación emocional, miedo, trastorno de alimentación. Sentimientos de indefinición, persecución, sumisión, falta de habilidades sociales, somatizaciones, perplejidad, bloqueo cognitivo, descontrol, vergüenza, agotamiento psíquico, sentimientos de culpa.
        $this->createTable('{{%csintomatologiasemocionales}}', [
            'id' => $this->primaryKey(),
            'sintomatologiaemocional' => $this->string(40)->notNull() . " COMMENT 'Sintomatología Emocional' ",

        ], $tableOptions
        );

        $this->batchInsert('csintomatologiasemocionales',
            array('sintomatologiaemocional'),
            array(
                ['Baja Autoestima'],
                ['Ansiedad'],
                ['Estrés'],
                ['Depresión'],
                ['Trastorno del Sueño'],
                ['Dependencia Emocional'],
                ['Afectación Emocional'],
                ['Miedo'],
                ['Trastorno de Alimentación'],
                ['Sentimientos de Indefinición'],
                ['Persecución'],
                ['Sumisión'],
                ['Falta de Habilidades Sociales'],
                ['Somatizaciones'],
                ['Perplejidad'],
                ['Bloqueo Cognitivo'],
                ['Descontrol'],
                ['Verguenza'],
                ['Agotamiento Psíquico'],
                ['Sentimiento de Culpa'],
            )
        );

        # 43.	Sintomatología física: cefalea, dolor crónico en general, cervicalgia, mareo, molestias gastrointestinales, molestias pélvicas.
        $this->createTable('{{%csintomatologiasfisicas}}', [
            'id' => $this->primaryKey(),
            'sintomatologiafisica' => $this->string(40)->notNull() . " COMMENT 'Sintomatología Física' ",

        ], $tableOptions
        );

        $this->batchInsert('csintomatologiasfisicas',
            array('sintomatologiafisica'),
            array(
                ['Cefalea'],
                ['Dolor Crónico en General'],
                ['Cervicalgia'],
                ['Mareo'],
                ['Molestias Gastrointestinales'],
                ['Molestias Pélvicas'],
            )
        );

        # 44.	Creencias: justificación de agresiones, creencia real de lo que dice el otro, creencias tradicionales roles de género, resignación, fatalismo, voluntad poco firme de superación.
        $this->createTable('{{%ccreencias}}', [
            'id' => $this->primaryKey(),
            'creencia' => $this->string(50)->notNull() . " COMMENT 'Creencia' ",

        ], $tableOptions
        );

        $this->batchInsert('ccreencias',
            array('creencia'),
            array(
                ['Justificación de agresiones'],
                ['Creencia real de lo que dice el otro'],
                ['Creencias tradicionales roles de género'],
                ['Resignación'],
                ['Fatalismo'],
                ['Voluntad poco firme de superación'],
            )
        );

        $this->createTable('{{%cfactorespsicologicos}}', [
            'id' => $this->primaryKey(),
            'factorpsicologico' => $this->string(40)->notNull() . " COMMENT 'Factor Psicologico' ",

        ], $tableOptions
        );

        # 45.	Factores psicosociales: hijos, su propia familia no la apoya, no trabaja, no tiene un lugar donde vivir, revictimización, intentos de suicidio, tratamiento psiquiátrico, otro.
        $this->batchInsert('cfactorespsicologicos',
            array('factorpsicologico'),
            array(
                ['Hijos'],
                ['Su propia familia no la apoya'],
                ['No trabaja'],
                ['No tiene un lugar dode vivir'],
                ['Revictimización'],
                ['Intentos de suicidio'],
                ['Tratamiento psiquiátrico'],
                ['Otro'],
            )
        );

        #46.	Relación de pareja: roles de pareja desiguales, ambivalencia afectiva en el agresor, falta de libertad, autonomía, ciclo de la violencia, tiempo de convivencia, agresiones previas a la denuncia, adaptación psicológica.
        $this->createTable('{{%crelacionesparejas}}', [
            'id' => $this->primaryKey(),
            'relacionpareja' => $this->string(50)->notNull() . " COMMENT 'Relación de Pareja' ",

        ], $tableOptions
        );

        $this->batchInsert('crelacionesparejas',
            array('relacionpareja'),
            array(
                ['Roles de pareja desiguales'],
                ['Ambivalencia afectiva en el agresor'],
                ['Falta de libertad'],
                ['Autonomía'],
                ['Ciclo de la violencia'],
                ['Tiempo de convivencia'],
                ['Agresiones previas a la denuncia'],
                ['Adaptación psicológica'],

            )
        );

        #47.	Relaciones sociales: aislamiento, desadaptación social, desadaptación laboral, círculo relacional.
        $this->createTable('{{%crelacionessociales}}', [
            'id' => $this->primaryKey(),
            'relacionsocial' => $this->string(30)->notNull() . " COMMENT 'Relación Social' ",

        ], $tableOptions
        );

        $this->batchInsert('crelacionessociales',
            array('relacionsocial'),
            array(
                ['Aislamiento'],
                ['Desadaptación Social'],
                ['Desadaptación Laboral'],
                ['Círculo relacional'],
            )
        );

        #49.	Relato: creíble, coherente, con afectación emocional, con lagunas, relato sobre la relación de pareja, resistencia a mencionar aspectos negativos, riqueza de detalles.
        $this->createTable('{{%crelatos}}', [
            'id' => $this->primaryKey(),
            'relato' => $this->string(50)->notNull() . " COMMENT 'Relato' ",

        ], $tableOptions
        );

        $this->batchInsert('crelatos',
            array('relato'),
            array(
                ['Credibilidad del relato'],
                ['Coherente'],
                ['Con afectación emocional'],
                ['Con lagunas'],
                ['Discurso sobre la relación de pareja'],
                ['Resistencia a mencionar aspectos negativos'],
                ['Riqueza de detalles'],
            )
        );


        $this->createTable('herramientapsicologica', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(),
            'sintomatologiaemocional_id' => $this->integer(),
            'sintomatologiafisica_id' => $this->integer(),
            'creencia_id' => $this->integer(),
            'factorpsicologico_id' => $this->integer(),
            'relacionpareja_id' => $this->integer(),
            'relacionsocial_id' => $this->integer(),
            'tratamiento' => $this->char(1),
            'relato_id' => $this->integer(),
            'procesoevaluacion' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('FK_herramientapsicologica_user', 'herramientapsicologica', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_herramientapsicologica_user2', 'herramientapsicologica', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_herramientapsicologica_cedula', 'herramientapsicologica', 'cedula_id', 'cedula', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_herramientapsicologica_sintomatologiaemocional', 'herramientapsicologica', 'sintomatologiaemocional_id', 'csintomatologiasemocionales', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_herramientapsicologica_sintomatologiafisica', 'herramientapsicologica', 'sintomatologiafisica_id', 'csintomatologiasfisicas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_herramientapsicologica_creencia', 'herramientapsicologica', 'creencia_id', 'ccreencias', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_herramientapsicologica_factorpsicologico', 'herramientapsicologica', 'factorpsicologico_id', 'cfactorespsicologicos', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_herramientapsicologica_relacionpareja', 'herramientapsicologica', 'relacionpareja_id', 'crelacionesparejas', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_herramientapsicologica_relacionsocial', 'herramientapsicologica', 'relacionsocial_id', 'crelacionessociales', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_herramientapsicologica_relato', 'herramientapsicologica', 'relato_id', 'crelatos', 'id', 'RESTRICT', 'CASCADE');

        #50.	Tipo de demanda/denuncia en la que encuadra su problemática: penal, civil, laboral, mercantil, otro (especifique).
        $this->createTable('{{%ctiposdemandas}}', [
            'id' => $this->primaryKey(),
            'tipodemanda' => $this->string(20)->notNull() . " COMMENT 'Tipo Demanda' ",

        ], $tableOptions
        );
        $this->batchInsert('ctiposdemandas',
            array('tipodemanda'),
            array(
                ['Penal'],
                ['Civil'],
                ['Laboral'],
                ['Mercantil'],
                ['Otro'],
            )
        );

        $this->createTable('herramientajuridica', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(),
            'tipodemanda_id' => $this->integer(),
            'relatohechos' => $this->text(),
            'situacionlegal' => $this->text(),
            'procedimientolegal' => $this->text(),
            'alcances' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('FK_herramientajuridica_user', 'herramientajuridica', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_herramientajuridica_user2', 'herramientajuridica', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');

        $this->addForeignKey('FK_herramientajuridica_cedula', 'herramientajuridica', 'cedula_id', 'cedula', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_herramientajuridica_tipodemanda', 'herramientajuridica', 'tipodemanda_id', 'ctiposdemandas', 'id', 'RESTRICT', 'CASCADE');

        #56.	Instituciones:
        $this->createTable('{{%cinstituciones}}', [
            'id' => $this->primaryKey(),
            'institucion' => $this->string(60)->notNull() . " COMMENT 'Institución' ",

        ], $tableOptions
        );

        $this->batchInsert('cinstituciones',
            array('institucion'),
            array(
                ['DIF Estatal'],
                ['DIF Municipal'],
                ['Instituto Veracruzano de las Mujeres'],
                ['Instituto Municipal de las Mujeres de Xalapa'],
                ['Policía Federal'],
                ['Secretaría de Seguridad Pública Estatal'],
                ['ISSSTE'],
                ['Ambulancias'],
                ['CRISVER'],
                ['Centros de Salud'],
                ['Secretaría de Salud'],
                ['Canalización Jurídica Civil'],
                ['Canalización Jurídica Penal'],
                ['Canalización Jurídica Laboral'],
                ['Canalización Violencia Institucional'],
                ['Canalización Jurídica Violencia Obstétrica'],
                ['Canalización Jurídicos por delitos de Servidores Públicos'],
                ['Albergues Xalapa'],
                ['H. Ayuntamiento'],
                ['Canalización Defensa de Derechos Humanos'],
                ['Canalización Violencia Escolar'],
            )
        );


        $this->createTable('herramientasocial', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(),
            'situacion' => $this->text(),
            'tipogestion' => $this->text(),
            'procedimiento' => $this->text(),
            'institucion_id' => $this->integer(),
            'oficio' => $this->string(10),
            'fecha' => $this->date(),
            'observaciones' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('FK_herramientasocial_user', 'herramientasocial', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_herramientasocial_user2', 'herramientasocial', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');

        $this->addForeignKey('FK_herramientasocial_cedula', 'herramientasocial', 'cedula_id', 'cedula', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_herramientasocial_institucion', 'herramientasocial', 'institucion_id', 'cinstituciones', 'id', 'RESTRICT', 'CASCADE');


        $this->createTable('{{%cindicadoresriesgo}}', [
            'id' => $this->primaryKey(),
            'indicadorriesgo' => $this->string()->notNull() . " COMMENT 'Indicador de Riesgo' ",

        ], $tableOptions
        );
        $this->batchInsert('cindicadoresriesgo',
            array('indicadorriesgo'),
            array(
                ['Ataques previos con riesgo mortal'],
                ['Amenazas de muerte a la victima'],
                ['El agresor irrespeta las medidas de protección'],
                ['El agresor es convicto o exconvicto por delitos contra las personas'],
                ['El agresor tiene una acusación o condena previa por delitos contra la integridad fisica o sexual de las personas'],
                ['Intento o amenaza de suicidio de parte del agresor'],
                ['La víctima considera que el agresor es capaz de matarla'],
                ['La víctima está aislada o retenida por el agresor contra su propia voluntad o lo ha estado previamente'],
                ['Abuso sexual del agresor contra los hijos u otras personas menores de edad de la familia cercana, asi como tentativa de realizarlo'],
                ['El agresor pertenece a una institución policial, fuerzas armadas o procuración de justicia'],
                ['Hay abuso fisico contra los hijo/jas o la víctima y/o hijos/jas han sido amenazados o heridos con arma de fuego o blanca'],
                ['La víctima es recientemente separada, ha anunciado que piensa separarse, ha puesto una denuncia penal o han solicitado medidas de protección'],
                ['Abuso de alcohol o drogas por parte del agresor'],
                ['Aumento de la frecuencia y gravedad de la violencia'],
                ['La víctima ha recibido atención en salud como consecuencia de la agresiones o ha recibido atención psiquiátrica'],
                ['El agresor tiene antecedentes psiquiátricos'],
                ['El agresor es una persona que tiene conocimiento en el uso, acceso, trabaja o porta armas de fuego'],
                ['Resistencia violenta a la intervención policial o a la de otras figuras de autoridad'],
                ['Acoso, control o amedrentamiento sistemático de la víctima'],
                ['Que haya matado mascotas'],
            )
        );

        $this->createTable('{{%ctiposeguimientos}}', [
            'id' => $this->primaryKey(),
            'tiposeguimiento' => $this->string(20)->notNull() . " COMMENT 'Tipo Seguimiento' ",

        ], $tableOptions
        );
        $this->batchInsert('ctiposeguimientos',
            array('tiposeguimiento'),
            array(
                ['Psicológico'],
                ['Jurídico'],
                ['Trabajo Social'],
                ['Promotora'],
            )
        );

        # 23.	Tipo de violencia: psicológica, física, sexual, patrimonial, económica, obstétrica.
        $this->createTable('{{%ctiposviolencias}}', [
            'id' => $this->primaryKey(),
            'tipoviolencia' => $this->string(20)->notNull() . " COMMENT 'Persona Originó la Violencia' ",

        ], $tableOptions
        );

        $this->batchInsert('ctiposviolencias',
            array('tipoviolencia'),
            array(
                ['Psicologica'],
                ['Física'],
                ['Económica'],
                ['Sexual'],
                ['Patrimonial'],
                ['Obstétrica'],
            )
        );

        #24.	Modalidades de la violencia: violencia de género, violencia familiar, violencia laboral, violencia escolar, violencia en la comunidad, violencia institucional, política y violencia feminicida.
        $this->createTable('{{%cmodalidadesviolencia}}', [
            'id' => $this->primaryKey(),
            'modalidadviolencia' => $this->string(30)->notNull() . " COMMENT 'Modalidades Violenta' ",

        ], $tableOptions
        );

        $this->batchInsert('cmodalidadesviolencia',
            array('modalidadviolencia'),
            array(
                ['Familiar / Familiar equiparada'],
                ['Laboral'],
                ['Institucional'],
                ['Comunitaria'],
                ['Escolar'],
                ['Feminicida'],
                ['De Género'],
                ['Política'],
            )
        );

        # 21.	Lugar donde se generó el hecho violento: casa, calle, trabajo, escuela, otro, ¿dónde?
        $this->createTable('{{%clugaresviolencia}}', [
            'id' => $this->primaryKey(),
            'lugarviolencia' => $this->string(15)->notNull() . " COMMENT 'Lugar de Violencia' ",

        ], $tableOptions
        );

        $this->batchInsert('clugaresviolencia',
            array('lugarviolencia'),
            array(
                ['Hogar'],
                ['Vía Pública'],
                ['Trabajo'],
                ['Escuela'],
                ['Otro'],
            )
        );

        $this->createTable('situacionviolencia', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(),
            'indicadorriesgo_id' => $this->integer(),
            'tiposeguimiento_id' => $this->integer(),
            'tipoviolencia_id' => $this->integer(),
            'modalidadviolencia_id' => $this->integer(),
            'lugarviolencia_id' => $this->integer(),
            'lugarviolencia' => $this->string(50),
            'sufriolesion' => $this->char(1),
            'lesiondonde' => $this->string(50),
            'hospitalizado' => $this->char(1),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('FK_situacionviolencia_user', 'situacionviolencia', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_situacionviolencia_user2', 'situacionviolencia', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');

        $this->addForeignKey('FK_situacionviolencia_cedula', 'situacionviolencia', 'cedula_id', 'cedula', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_situacionviolencia_indicadorriesgo', 'situacionviolencia', 'indicadorriesgo_id', 'cindicadoresriesgo', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_situacionviolencia_tiposeguimiento', 'situacionviolencia', 'tiposeguimiento_id', 'ctiposeguimientos', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_situacionviolencia_tipoviolencia', 'situacionviolencia', 'tipoviolencia_id', 'ctiposviolencias', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_situacionviolencia_modalidadviolencia', 'situacionviolencia', 'modalidadviolencia_id', 'cmodalidadesviolencia', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_situacionviolencia_lugarviolencia', 'situacionviolencia', 'lugarviolencia_id', 'clugaresviolencia', 'id', 'RESTRICT', 'CASCADE');

        $this->createTable('saludagresor', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(),
            'serviciomedico' => $this->char(1),
            'queserviciomedico' => $this->string(50),
            'padeceenfermedad' => $this->char(1),
            'quepadeceenfermedad' => $this->string(50),
            'padecediscapacidad' => $this->char(1),
            'quepadecediscapacidad' => $this->string(50),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('FK_saludagresor_user', 'saludagresor', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_saludagresor_user2', 'saludagresor', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');

        $this->addForeignKey('FK_saludagresor_cedula', 'saludagresor', 'cedula_id', 'cedula', 'id', 'CASCADE', 'CASCADE');

        # 10.	Sexo: Mujer, hombre y no especificado.
        $this->createTable('{{%csexos}}', [
            'id' => $this->primaryKey(),
            'sexo' => $this->string(20)->notNull() . " COMMENT 'Sexo' ",

        ], $tableOptions
        );

        $this->batchInsert('csexos',
            array('sexo'),
            array(
                ['No Especificado'],
                ['Mujer'],
                ['Hombre'],
            )
        );

        $this->createTable('generalesagresor', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(),
            'nombre' => $this->string(50),
            'apellido' => $this->string(50),
            'sexo_id' => $this->integer(),
            'alias' => $this->string(30),
            'fnac' => $this->date(),
            'estadocivil_id' => $this->integer(),
            'domicilio' => $this->string(100),
            'colonia' => $this->string(100),
            'cpostal' => $this->string(100),
            'telefono' => $this->string(10),
            'celular' => $this->string(10),
            'municipio' => $this->string(50),
            'comunidad' => $this->string(100),
            'idioma' => $this->string(50),
            'religion' => $this->string(50),
            'arma' => $this->char(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('FK_generalesagresor_user', 'generalesagresor', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_generalesagresor_user2', 'generalesagresor', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');

        $this->addForeignKey('FK_generalesagresor_cedula', 'generalesagresor', 'cedula_id', 'cedula', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_generalesagresor_cestadocivil', 'generalesagresor', 'estadocivil_id', 'cestadoscivil', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_generalesagresor_csexos', 'generalesagresor', 'sexo_id', 'csexos', 'id', 'RESTRICT', 'CASCADE');

        $this->createTable('estratosocialagresor', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(),
            'ocupacion_id' => $this->integer(),
            'tipopercepcion_id' => $this->integer(),
            'ingresomensual' =>$this->integer(),
            'nivelestudio_id' => $this->integer(),
            'estadoestudio_id' => $this->integer(),
            'servidorpublico' => $this->char(1),
            'servidorpublicocargo' => $this->string(50),
            'servidorpublicioinstitucion' => $this->string(50),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('FK_estratosocialagresor_user', 'estratosocialagresor', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_estratosocialagresor_user2', 'estratosocialagresor', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');

        $this->addForeignKey('FK_estratosocialagresor_cedula', 'estratosocialagresor', 'cedula_id', 'cedula', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_estratosocialagresor_ocupaciones', 'estratosocialagresor', 'ocupacion_id', 'cocupaciones', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_estratosocialagresor_tipopercepciones', 'estratosocialagresor', 'tipopercepcion_id', 'ctipospercepciones', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_estratosocialagresor_nivelestudio', 'estratosocialagresor', 'nivelestudio_id', 'cnivelestudios', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_estratosocialagresor_estadoestudio', 'estratosocialagresor', 'estadoestudio_id', 'cestadoestudios', 'id', 'RESTRICT', 'CASCADE');

        $this->createTable('conductaagresor', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(),
            'bebidaalcoholica' => $this->char(1),
            'estupefaciente'  => $this->char(1),
            'frecuenciasocial_id' => $this->integer(),
            'medicamentocontrolado' => $this->char(1),
            'agredidaefectoalcohol' => $this->char(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('FK_conductaagresor_user', 'conductaagresor', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_conductaagresor_user2', 'conductaagresor', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');

        $this->addForeignKey('FK_conductaagresor_cedula', 'conductaagresor', 'cedula_id', 'cedula', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_conductaagresor_frecuenciasocial', 'conductaagresor', 'frecuenciasocial_id', 'cfrecuenciasocial', 'id', 'RESTRICT', 'CASCADE');

        $this->createTable('controlinterno', [
            'id' => $this->primaryKey(),
            'cedula_id' => $this->integer(),
            'requiereproteccion' => $this->char(1),
            'delitofuerofederal'  => $this->char(1),
            'informousuaria' => $this->char(1),
            'solicitaproteccion' => $this->char(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('FK_controlinterno_user', 'controlinterno', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('FK_controlinterno_user2', 'controlinterno', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');

        $this->addForeignKey('FK_controlinterno_usuaria', 'controlinterno', 'cedula_id', 'cedula', 'id', 'CASCADE', 'CASCADE');






        /*
        # 13.	Número telefónico, casa, celular, trabajo, caseta telefónica.
        $this->createTable('{{%ctipotels}}', [
            'id' => $this->primaryKey(),
            'tipotel' => $this->string(25)->notNull() . " COMMENT 'Tipo de teléfono' ",

        ], $tableOptions
        );

        $this->batchInsert('ctipotels',
            array('tipotel'),
            array(
                ['Casa'],
                ['Celular'],
                ['Fijo'],
                ['Caseta Telefónica']
            )
        );

        # 13.	Número telefónico, casa, celular, trabajo, caseta telefónica.
        $this->createTable('{{%cestatusestudios}}', [
            'id' => $this->primaryKey(),
            'estatusestudio' => $this->string(20)->notNull() . " COMMENT 'Estado de Estudio' ",

        ], $tableOptions
        );



        #18.	Actividad: empleada, ama de casa, desempleada, estudiante, jubilada, otro, ¿cuál?


        #19.	Definir si es llamada de emergencia o hecho pasado.
        $this->createTable('{{%ctipollamadas}}', [
            'id' => $this->primaryKey(),
            'tipollamada' => $this->string(20)->notNull() . " COMMENT 'Tipo de Llamada' ",

        ], $tableOptions
        );

        $this->batchInsert('ctipollamadas',
            array('tipollamada'),
            array(
                ['Emergencia'],
                ['Hecho Pasado'],
            )
        );

        # 20.	Grado de mortalidad: alto, medio, bajo.
        $this->createTable('{{%cmortalidades}}', [
            'id' => $this->primaryKey(),
            'mortalidad' => $this->string(10)->notNull() . " COMMENT 'Mortalidad' ",

        ], $tableOptions
        );

        $this->batchInsert('cmortalidades',
            array('mortalidad'),
            array(
                ['Alto'],
                ['Medio'],
                ['Bajo'],
            )
        );



        #22.	Persona que origina la violencia: esposo, pareja, padre, madre, otro, ¿quién?
        $this->createTable('{{%corigenesviolencias}}', [
            'id' => $this->primaryKey(),
            'origenviolencia' => $this->string(10)->notNull() . " COMMENT 'Persona Originó la Violencia' ",

        ], $tableOptions
        );

        $this->batchInsert('corigenesviolencias',
            array('origenviolencia'),
            array(
                ['Esposo'],
                ['Pareja'],
                ['Padre'],
                ['Madre'],
                ['Otro'],
            )
        );





        # 28.	Tipo de percepción: comisión, salario, beca, honorarios, otro.







        */

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180620_210149_registro_captura cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180620_210149_registro_captura cannot be reverted.\n";

        return false;
    }
    */
}
