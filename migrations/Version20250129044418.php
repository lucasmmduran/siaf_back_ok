<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250129044418 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE conf_entidades (id INT AUTO_INCREMENT NOT NULL, cod_entidad VARCHAR(100) NOT NULL, entidad VARCHAR(180) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conf_roles (id INT AUTO_INCREMENT NOT NULL, cod_rol VARCHAR(50) NOT NULL, rol VARCHAR(80) NOT NULL, descripcion VARCHAR(250) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE persona (id INT AUTO_INCREMENT NOT NULL, tipo_persona VARCHAR(2) NOT NULL, tipo_documento VARCHAR(3) NOT NULL, nro_documento VARCHAR(15) NOT NULL, nombre VARCHAR(45) NOT NULL, apellido VARCHAR(45) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pla_conf_plan_conceptos (id INT AUTO_INCREMENT NOT NULL, pla_conf_planes_id INT NOT NULL, cod_plan_concepto VARCHAR(6) NOT NULL, plan_concepto VARCHAR(45) NOT NULL, fecha_vigencia_desde DATETIME NOT NULL, fecha_vigencia_hasta DATETIME DEFAULT NULL, INDEX IDX_212E257D341470E5 (pla_conf_planes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pla_conf_plan_objetos_gasto (id INT AUTO_INCREMENT NOT NULL, pla_conf_tipo_plan_id INT NOT NULL, siaf_objetos_gasto_id INT NOT NULL, fecha_vigencia_desde DATETIME NOT NULL, fecha_vigencia_hasta DATETIME DEFAULT NULL, INDEX IDX_71C57A74A90D98E2 (pla_conf_tipo_plan_id), INDEX IDX_71C57A74D4BDE734 (siaf_objetos_gasto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pla_conf_plan_objetos_gasto_res (id INT AUTO_INCREMENT NOT NULL, pla_conf_tipo_planes_id INT NOT NULL, siaf_objetos_gasto_id INT NOT NULL, nivel_planificacion LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', lista_objetos_gasto VARCHAR(120) NOT NULL, fecha_vigencia_desde DATETIME DEFAULT NULL, fecha_vigencia_hasta DATETIME NOT NULL, INDEX IDX_186D7B5ED1AE59E8 (pla_conf_tipo_planes_id), INDEX IDX_186D7B5ED4BDE734 (siaf_objetos_gasto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pla_conf_plan_unidades (id INT AUTO_INCREMENT NOT NULL, siaf_unidades_id INT NOT NULL, pla_conf_tipo_planes_id INT NOT NULL, fecha_vigencia_desde DATETIME NOT NULL, fecha_vigencia_hasta DATETIME DEFAULT NULL, INDEX IDX_F5A8847534B4022F (siaf_unidades_id), INDEX IDX_F5A88475D1AE59E8 (pla_conf_tipo_planes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pla_conf_planes (id INT AUTO_INCREMENT NOT NULL, pla_conf_tipo_plan_id INT DEFAULT NULL, cod_plan VARCHAR(5) NOT NULL, plan VARCHAR(60) NOT NULL, fecha_vigencia_desde DATETIME NOT NULL, fecha_vigencia_hasta DATETIME DEFAULT NULL, abr_tipo_plan VARCHAR(20) NOT NULL, descripcion VARCHAR(250) NOT NULL, INDEX IDX_13FA9ADCA90D98E2 (pla_conf_tipo_plan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pla_conf_tipo_planes (id INT AUTO_INCREMENT NOT NULL, cod_tipo_plan VARCHAR(3) NOT NULL, tipo_plan VARCHAR(60) NOT NULL, fecha_vigencia_desde DATETIME NOT NULL, fecha_vigencia_hasta DATETIME DEFAULT NULL, abr_tipo_plan VARCHAR(20) NOT NULL, descripcion VARCHAR(250) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pla_conf_unidades_programatica (id INT AUTO_INCREMENT NOT NULL, siaf_unidades_id INT NOT NULL, siaf_aperturas_programaticas_id INT NOT NULL, fecha_vigencia_desde DATETIME NOT NULL, fecha_vigencia_hasta DATETIME DEFAULT NULL, INDEX IDX_5D83144E34B4022F (siaf_unidades_id), INDEX IDX_5D83144E222903D5 (siaf_aperturas_programaticas_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pla_planes_cabecera (id INT AUTO_INCREMENT NOT NULL, pla_conf_planes_id INT NOT NULL, siaf_aperturas_programaticas_id INT DEFAULT NULL, siaf_ejercicios_id INT NOT NULL, siaf_unidades_id INT NOT NULL, fecha_ingreso DATETIME NOT NULL, fecha_ult_actualizacion DATETIME NOT NULL, nro_plan INT NOT NULL, identificacion_plan VARCHAR(20) NOT NULL, version INT NOT NULL, INDEX IDX_EF18B5CA341470E5 (pla_conf_planes_id), INDEX IDX_EF18B5CA222903D5 (siaf_aperturas_programaticas_id), INDEX IDX_EF18B5CA1655D8F4 (siaf_ejercicios_id), INDEX IDX_EF18B5CA34B4022F (siaf_unidades_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pla_planes_partidas (id INT AUTO_INCREMENT NOT NULL, pla_planes_procesos_id INT NOT NULL, siaf_fuentes_financiamiento_id INT NOT NULL, siaf_aperturas_programaticas_id INT NOT NULL, siaf_objetos_gasto_id INT NOT NULL, compromiso_mes1 NUMERIC(18, 2) DEFAULT NULL, compromiso_orig_mes1 NUMERIC(18, 2) DEFAULT NULL, importe_no_programado_orig NUMERIC(18, 2) DEFAULT NULL, importe_no_programado NUMERIC(18, 2) DEFAULT NULL, compromiso_mes2 NUMERIC(18, 2) DEFAULT NULL, compromiso_orig_mes2 NUMERIC(18, 2) DEFAULT NULL, compromiso_mes3 NUMERIC(18, 2) DEFAULT NULL, compromiso_orig_mes3 NUMERIC(18, 2) DEFAULT NULL, compromiso_mes4 NUMERIC(18, 2) DEFAULT NULL, compromiso_orig_mes4 NUMERIC(18, 2) DEFAULT NULL, compromiso_mes5 NUMERIC(18, 2) DEFAULT NULL, compromiso_orig_mes5 NUMERIC(18, 2) DEFAULT NULL, compromiso_mes6 NUMERIC(18, 2) DEFAULT NULL, compromiso_orig_mes6 NUMERIC(18, 2) DEFAULT NULL, compromiso_mes7 NUMERIC(18, 2) DEFAULT NULL, compromiso_orig_mes7 NUMERIC(18, 2) DEFAULT NULL, compromiso_mes8 NUMERIC(18, 2) DEFAULT NULL, compromiso_orig_mes8 NUMERIC(18, 2) DEFAULT NULL, compromiso_mes9 NUMERIC(18, 2) DEFAULT NULL, compromiso_orig_mes9 NUMERIC(18, 2) DEFAULT NULL, compromiso_mes10 NUMERIC(18, 2) DEFAULT NULL, compromiso_orig_mes10 NUMERIC(18, 2) DEFAULT NULL, compromiso_mes11 NUMERIC(18, 2) DEFAULT NULL, compromiso_orig_mes11 NUMERIC(18, 2) DEFAULT NULL, compromiso_mes12 NUMERIC(18, 2) DEFAULT NULL, compromiso_orig_mes12 NUMERIC(18, 2) DEFAULT NULL, devengado_mes1 NUMERIC(18, 2) DEFAULT NULL, devengado_orig_mes1 NUMERIC(18, 2) DEFAULT NULL, devengado_mes2 NUMERIC(18, 2) DEFAULT NULL, devengado_orig_mes2 NUMERIC(18, 2) DEFAULT NULL, devengado_mes3 NUMERIC(18, 2) DEFAULT NULL, devengado_orig_mes3 NUMERIC(18, 2) DEFAULT NULL, devengado_mes4 NUMERIC(18, 2) DEFAULT NULL, devengado_orig_mes4 NUMERIC(18, 2) DEFAULT NULL, devengado_mes5 NUMERIC(18, 2) DEFAULT NULL, devengado_orig_mes5 NUMERIC(18, 2) DEFAULT NULL, devengado_mes6 NUMERIC(18, 2) DEFAULT NULL, devengado_orig_mes6 NUMERIC(18, 2) DEFAULT NULL, devengado_mes7 NUMERIC(18, 2) DEFAULT NULL, devengado_orig_me7 NUMERIC(18, 2) DEFAULT NULL, devengado_mes8 NUMERIC(18, 2) DEFAULT NULL, devengado_orig_me8 NUMERIC(18, 2) DEFAULT NULL, devengado_mes9 NUMERIC(18, 2) DEFAULT NULL, devengado_orig_me9 NUMERIC(18, 2) DEFAULT NULL, devengado_mes10 NUMERIC(18, 2) DEFAULT NULL, devengado_orig_me10 NUMERIC(18, 2) DEFAULT NULL, devengado_mes11 NUMERIC(18, 2) DEFAULT NULL, devengado_orig_me11 NUMERIC(18, 2) DEFAULT NULL, devengado_mes12 NUMERIC(18, 2) DEFAULT NULL, devengado_orig_me12 NUMERIC(18, 2) DEFAULT NULL, sub_clase INT DEFAULT NULL, INDEX IDX_BF53852268357A88 (pla_planes_procesos_id), INDEX IDX_BF53852249AA8D2D (siaf_fuentes_financiamiento_id), INDEX IDX_BF538522222903D5 (siaf_aperturas_programaticas_id), INDEX IDX_BF538522D4BDE734 (siaf_objetos_gasto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pla_planes_procesos (id INT AUTO_INCREMENT NOT NULL, pla_planes_cabecera_id INT NOT NULL, pla_conf_tipo_planes_id INT NOT NULL, siaf_moneda_id INT NOT NULL, nro_linea INT NOT NULL, descripcion VARCHAR(180) NOT NULL, nombre VARCHAR(60) NOT NULL, identificacion VARCHAR(45) DEFAULT NULL, es_plurianual TINYINT(1) NOT NULL, es_moneda_extranjera TINYINT(1) NOT NULL, esta_presupuestado TINYINT(1) NOT NULL, tipo_tasa LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', tasa_conversion NUMERIC(18, 6) NOT NULL, importe_total NUMERIC(18, 2) NOT NULL, importe_total_orig NUMERIC(18, 2) NOT NULL, importe_ejercicio NUMERIC(18, 2) NOT NULL, importe_ejercicio_orig NUMERIC(18, 2) NOT NULL, importe_anterior_orig NUMERIC(18, 2) NOT NULL, importe_proximo_ejercicio_orig NUMERIC(18, 2) NOT NULL, expediente_impulso VARCHAR(45) DEFAULT NULL, tipo_registro LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', referencia_linea_proceso VARCHAR(45) NOT NULL, INDEX IDX_49D17E6570A714E2 (pla_planes_cabecera_id), INDEX IDX_49D17E65D1AE59E8 (pla_conf_tipo_planes_id), INDEX IDX_49D17E65DC25BE4A (siaf_moneda_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE siaf_aperturas_programaticas (id INT AUTO_INCREMENT NOT NULL, siaf_finalidad_funcion_id INT DEFAULT NULL, siaf_servicios_id INT NOT NULL, siaf_ejercicios_id INT NOT NULL, siaf_categorias_programaticas_id INT DEFAULT NULL, siaf_apertura_programatica_padre_id INT DEFAULT NULL, cod_apertura_programatica VARCHAR(14) NOT NULL, apertura_programatica VARCHAR(100) DEFAULT NULL, INDEX IDX_BB027480C8EBA48 (siaf_finalidad_funcion_id), INDEX IDX_BB027480196099F1 (siaf_servicios_id), INDEX IDX_BB0274801655D8F4 (siaf_ejercicios_id), INDEX IDX_BB02748014FE202F (siaf_categorias_programaticas_id), INDEX IDX_BB02748024CB1614 (siaf_apertura_programatica_padre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE siaf_categorias_programaticas (id INT AUTO_INCREMENT NOT NULL, cod_categoria_programatica VARCHAR(3) NOT NULL, categoria_programatica VARCHAR(120) NOT NULL, fecha_vigencia_desde DATETIME NOT NULL, fecha_vigencia_hasta DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE siaf_ejercicios (id INT AUTO_INCREMENT NOT NULL, activo_planificacion SMALLINT NOT NULL, activo_formulacion SMALLINT NOT NULL, activo_ejecucion SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE siaf_estados_comprobantes (id INT AUTO_INCREMENT NOT NULL, siaf_tipos_comprobantes_id INT DEFAULT NULL, estado VARCHAR(45) NOT NULL, desc_estado VARCHAR(180) NOT NULL, INDEX IDX_92E70DB6316CEB2B (siaf_tipos_comprobantes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE siaf_finalidad_funcion (id INT AUTO_INCREMENT NOT NULL, siaf_ejercicios_id INT NOT NULL, id_padre_id INT DEFAULT NULL, cod_finalidad_funcion VARCHAR(3) NOT NULL, finalidad_funcion VARCHAR(80) NOT NULL, nivel INT NOT NULL, INDEX IDX_3202B6281655D8F4 (siaf_ejercicios_id), INDEX IDX_3202B62831E700CD (id_padre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE siaf_fuentes_financiamiento (id INT AUTO_INCREMENT NOT NULL, siaf_ejercicios_id INT NOT NULL, id_padre_id INT DEFAULT NULL, cod_fuente_financiamiento VARCHAR(2) NOT NULL, fuente_financiamiento VARCHAR(180) NOT NULL, nivel INT NOT NULL, INDEX IDX_BE2BFF1B1655D8F4 (siaf_ejercicios_id), INDEX IDX_BE2BFF1B31E700CD (id_padre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE siaf_instituciones (id INT AUTO_INCREMENT NOT NULL, siaf_ejercicios_id INT NOT NULL, id_padre_id INT DEFAULT NULL, cod_institucion VARCHAR(9) NOT NULL, institucion VARCHAR(180) NOT NULL, nivel INT NOT NULL, INDEX IDX_8CF158A21655D8F4 (siaf_ejercicios_id), INDEX IDX_8CF158A231E700CD (id_padre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE siaf_moneda (id INT AUTO_INCREMENT NOT NULL, cod_moneda VARCHAR(4) NOT NULL, moneda VARCHAR(45) NOT NULL, signo VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE siaf_objetos_gasto (id INT AUTO_INCREMENT NOT NULL, siaf_ejercicios_id INT NOT NULL, id_padre_id INT DEFAULT NULL, abr_objeto_gasto VARCHAR(45) NOT NULL, nivel INT NOT NULL, tipo LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', objeto_gasto VARCHAR(80) NOT NULL, cod_objeto_gasto VARCHAR(9) NOT NULL, INDEX IDX_543626FF1655D8F4 (siaf_ejercicios_id), INDEX IDX_543626FF31E700CD (id_padre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE siaf_organigrama (id INT AUTO_INCREMENT NOT NULL, id_padre_id INT DEFAULT NULL, cod_unidad_organizacional VARCHAR(10) NOT NULL, unidad_organizacional VARCHAR(120) NOT NULL, abr_unidad_organizacional VARCHAR(20) NOT NULL, fecha_vigencia_desde DATETIME NOT NULL, fecha_vigencia_hasta DATETIME DEFAULT NULL, INDEX IDX_770484D331E700CD (id_padre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE siaf_parametros (id INT AUTO_INCREMENT NOT NULL, cod_parametro VARCHAR(25) NOT NULL, tipo_valor LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', parametro VARCHAR(45) NOT NULL, uso_parametro VARCHAR(45) NOT NULL, valor_num NUMERIC(24, 6) DEFAULT NULL, valor_char VARCHAR(200) DEFAULT NULL, valor_fecha DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE siaf_sectores_institucionales (id INT AUTO_INCREMENT NOT NULL, siaf_ejercicios_id INT DEFAULT NULL, id_padre_id INT DEFAULT NULL, cod_sector_institucional VARCHAR(50) DEFAULT NULL, sector_institucional VARCHAR(180) DEFAULT NULL, nivel INT DEFAULT NULL, INDEX IDX_648A7BD31655D8F4 (siaf_ejercicios_id), INDEX IDX_648A7BD331E700CD (id_padre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE siaf_servicios (id INT AUTO_INCREMENT NOT NULL, siaf_ejercicios_id INT NOT NULL, cod_servicio VARCHAR(10) NOT NULL, servicio VARCHAR(120) DEFAULT NULL, abr_servicio VARCHAR(15) NOT NULL, INDEX IDX_AB2D0AB71655D8F4 (siaf_ejercicios_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE siaf_tipos_comprobantes (id INT AUTO_INCREMENT NOT NULL, cod_tipo_comprobantes VARCHAR(5) NOT NULL, tipo_comporbante VARCHAR(45) NOT NULL, desc_tipo_comprobante VARCHAR(180) NOT NULL, fecha_vigencia_desde DATETIME NOT NULL, fecha_vigencia_hasta DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE siaf_unidades (id INT AUTO_INCREMENT NOT NULL, siaf_organigrama_id INT NOT NULL, siaf_servicios_id INT NOT NULL, id_padre_id INT DEFAULT NULL, cod_unidad VARCHAR(10) NOT NULL, unidad VARCHAR(45) NOT NULL, abr_unidad VARCHAR(15) NOT NULL, fecha_vigencia_desde DATETIME NOT NULL, fecha_vigencia_hasta DATETIME DEFAULT NULL, INDEX IDX_3C4BD894B10CD778 (siaf_organigrama_id), INDEX IDX_3C4BD894196099F1 (siaf_servicios_id), INDEX IDX_3C4BD89431E700CD (id_padre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wfl_estados_entidad (id INT AUTO_INCREMENT NOT NULL, conf_entidad_id INT NOT NULL, estado VARCHAR(50) NOT NULL, descripcion VARCHAR(200) NOT NULL, es_final SMALLINT NOT NULL, INDEX IDX_D22E97CD9CD4DDF (conf_entidad_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wfl_transicion_estados (id INT AUTO_INCREMENT NOT NULL, conf_entidad_id INT DEFAULT NULL, cod_transicion VARCHAR(80) NOT NULL, transicion VARCHAR(80) NOT NULL, descripcion VARCHAR(250) NOT NULL, wfl_estado_inicial_id INT DEFAULT NULL, wfl_estado_final_id INT DEFAULT NULL, tipo_trancision LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', conf_rol_id INT NOT NULL, INDEX IDX_F43883F09CD4DDF (conf_entidad_id), INDEX IDX_F43883F07E309DAD (wfl_estado_inicial_id), INDEX IDX_F43883F094F0ACE1 (wfl_estado_final_id), INDEX IDX_F43883F0609D6CB3 (conf_rol_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE pla_conf_plan_conceptos ADD CONSTRAINT FK_212E257D341470E5 FOREIGN KEY (pla_conf_planes_id) REFERENCES pla_conf_planes (id)');
        $this->addSql('ALTER TABLE pla_conf_plan_objetos_gasto ADD CONSTRAINT FK_71C57A74A90D98E2 FOREIGN KEY (pla_conf_tipo_plan_id) REFERENCES pla_conf_tipo_planes (id)');
        $this->addSql('ALTER TABLE pla_conf_plan_objetos_gasto ADD CONSTRAINT FK_71C57A74D4BDE734 FOREIGN KEY (siaf_objetos_gasto_id) REFERENCES siaf_objetos_gasto (id)');
        $this->addSql('ALTER TABLE pla_conf_plan_objetos_gasto_res ADD CONSTRAINT FK_186D7B5ED1AE59E8 FOREIGN KEY (pla_conf_tipo_planes_id) REFERENCES pla_conf_tipo_planes (id)');
        $this->addSql('ALTER TABLE pla_conf_plan_objetos_gasto_res ADD CONSTRAINT FK_186D7B5ED4BDE734 FOREIGN KEY (siaf_objetos_gasto_id) REFERENCES siaf_objetos_gasto (id)');
        $this->addSql('ALTER TABLE pla_conf_plan_unidades ADD CONSTRAINT FK_F5A8847534B4022F FOREIGN KEY (siaf_unidades_id) REFERENCES siaf_unidades (id)');
        $this->addSql('ALTER TABLE pla_conf_plan_unidades ADD CONSTRAINT FK_F5A88475D1AE59E8 FOREIGN KEY (pla_conf_tipo_planes_id) REFERENCES pla_conf_tipo_planes (id)');
        $this->addSql('ALTER TABLE pla_conf_planes ADD CONSTRAINT FK_13FA9ADCA90D98E2 FOREIGN KEY (pla_conf_tipo_plan_id) REFERENCES pla_conf_tipo_planes (id)');
        $this->addSql('ALTER TABLE pla_conf_unidades_programatica ADD CONSTRAINT FK_5D83144E34B4022F FOREIGN KEY (siaf_unidades_id) REFERENCES siaf_unidades (id)');
        $this->addSql('ALTER TABLE pla_conf_unidades_programatica ADD CONSTRAINT FK_5D83144E222903D5 FOREIGN KEY (siaf_aperturas_programaticas_id) REFERENCES siaf_aperturas_programaticas (id)');
        $this->addSql('ALTER TABLE pla_planes_cabecera ADD CONSTRAINT FK_EF18B5CA341470E5 FOREIGN KEY (pla_conf_planes_id) REFERENCES pla_conf_planes (id)');
        $this->addSql('ALTER TABLE pla_planes_cabecera ADD CONSTRAINT FK_EF18B5CA222903D5 FOREIGN KEY (siaf_aperturas_programaticas_id) REFERENCES siaf_aperturas_programaticas (id)');
        $this->addSql('ALTER TABLE pla_planes_cabecera ADD CONSTRAINT FK_EF18B5CA1655D8F4 FOREIGN KEY (siaf_ejercicios_id) REFERENCES siaf_ejercicios (id)');
        $this->addSql('ALTER TABLE pla_planes_cabecera ADD CONSTRAINT FK_EF18B5CA34B4022F FOREIGN KEY (siaf_unidades_id) REFERENCES siaf_unidades (id)');
        $this->addSql('ALTER TABLE pla_planes_partidas ADD CONSTRAINT FK_BF53852268357A88 FOREIGN KEY (pla_planes_procesos_id) REFERENCES pla_planes_procesos (id)');
        $this->addSql('ALTER TABLE pla_planes_partidas ADD CONSTRAINT FK_BF53852249AA8D2D FOREIGN KEY (siaf_fuentes_financiamiento_id) REFERENCES siaf_fuentes_financiamiento (id)');
        $this->addSql('ALTER TABLE pla_planes_partidas ADD CONSTRAINT FK_BF538522222903D5 FOREIGN KEY (siaf_aperturas_programaticas_id) REFERENCES siaf_aperturas_programaticas (id)');
        $this->addSql('ALTER TABLE pla_planes_partidas ADD CONSTRAINT FK_BF538522D4BDE734 FOREIGN KEY (siaf_objetos_gasto_id) REFERENCES siaf_objetos_gasto (id)');
        $this->addSql('ALTER TABLE pla_planes_procesos ADD CONSTRAINT FK_49D17E6570A714E2 FOREIGN KEY (pla_planes_cabecera_id) REFERENCES pla_planes_cabecera (id)');
        $this->addSql('ALTER TABLE pla_planes_procesos ADD CONSTRAINT FK_49D17E65D1AE59E8 FOREIGN KEY (pla_conf_tipo_planes_id) REFERENCES pla_conf_tipo_planes (id)');
        $this->addSql('ALTER TABLE pla_planes_procesos ADD CONSTRAINT FK_49D17E65DC25BE4A FOREIGN KEY (siaf_moneda_id) REFERENCES siaf_moneda (id)');
        $this->addSql('ALTER TABLE siaf_aperturas_programaticas ADD CONSTRAINT FK_BB027480C8EBA48 FOREIGN KEY (siaf_finalidad_funcion_id) REFERENCES siaf_finalidad_funcion (id)');
        $this->addSql('ALTER TABLE siaf_aperturas_programaticas ADD CONSTRAINT FK_BB027480196099F1 FOREIGN KEY (siaf_servicios_id) REFERENCES siaf_servicios (id)');
        $this->addSql('ALTER TABLE siaf_aperturas_programaticas ADD CONSTRAINT FK_BB0274801655D8F4 FOREIGN KEY (siaf_ejercicios_id) REFERENCES siaf_ejercicios (id)');
        $this->addSql('ALTER TABLE siaf_aperturas_programaticas ADD CONSTRAINT FK_BB02748014FE202F FOREIGN KEY (siaf_categorias_programaticas_id) REFERENCES siaf_categorias_programaticas (id)');
        $this->addSql('ALTER TABLE siaf_aperturas_programaticas ADD CONSTRAINT FK_BB02748024CB1614 FOREIGN KEY (siaf_apertura_programatica_padre_id) REFERENCES siaf_aperturas_programaticas (id)');
        $this->addSql('ALTER TABLE siaf_estados_comprobantes ADD CONSTRAINT FK_92E70DB6316CEB2B FOREIGN KEY (siaf_tipos_comprobantes_id) REFERENCES siaf_tipos_comprobantes (id)');
        $this->addSql('ALTER TABLE siaf_finalidad_funcion ADD CONSTRAINT FK_3202B6281655D8F4 FOREIGN KEY (siaf_ejercicios_id) REFERENCES siaf_ejercicios (id)');
        $this->addSql('ALTER TABLE siaf_finalidad_funcion ADD CONSTRAINT FK_3202B62831E700CD FOREIGN KEY (id_padre_id) REFERENCES siaf_finalidad_funcion (id)');
        $this->addSql('ALTER TABLE siaf_fuentes_financiamiento ADD CONSTRAINT FK_BE2BFF1B1655D8F4 FOREIGN KEY (siaf_ejercicios_id) REFERENCES siaf_ejercicios (id)');
        $this->addSql('ALTER TABLE siaf_fuentes_financiamiento ADD CONSTRAINT FK_BE2BFF1B31E700CD FOREIGN KEY (id_padre_id) REFERENCES siaf_fuentes_financiamiento (id)');
        $this->addSql('ALTER TABLE siaf_instituciones ADD CONSTRAINT FK_8CF158A21655D8F4 FOREIGN KEY (siaf_ejercicios_id) REFERENCES siaf_ejercicios (id)');
        $this->addSql('ALTER TABLE siaf_instituciones ADD CONSTRAINT FK_8CF158A231E700CD FOREIGN KEY (id_padre_id) REFERENCES siaf_instituciones (id)');
        $this->addSql('ALTER TABLE siaf_objetos_gasto ADD CONSTRAINT FK_543626FF1655D8F4 FOREIGN KEY (siaf_ejercicios_id) REFERENCES siaf_ejercicios (id)');
        $this->addSql('ALTER TABLE siaf_objetos_gasto ADD CONSTRAINT FK_543626FF31E700CD FOREIGN KEY (id_padre_id) REFERENCES siaf_objetos_gasto (id)');
        $this->addSql('ALTER TABLE siaf_organigrama ADD CONSTRAINT FK_770484D331E700CD FOREIGN KEY (id_padre_id) REFERENCES siaf_organigrama (id)');
        $this->addSql('ALTER TABLE siaf_sectores_institucionales ADD CONSTRAINT FK_648A7BD31655D8F4 FOREIGN KEY (siaf_ejercicios_id) REFERENCES siaf_ejercicios (id)');
        $this->addSql('ALTER TABLE siaf_sectores_institucionales ADD CONSTRAINT FK_648A7BD331E700CD FOREIGN KEY (id_padre_id) REFERENCES siaf_sectores_institucionales (id)');
        $this->addSql('ALTER TABLE siaf_servicios ADD CONSTRAINT FK_AB2D0AB71655D8F4 FOREIGN KEY (siaf_ejercicios_id) REFERENCES siaf_ejercicios (id)');
        $this->addSql('ALTER TABLE siaf_unidades ADD CONSTRAINT FK_3C4BD894B10CD778 FOREIGN KEY (siaf_organigrama_id) REFERENCES siaf_organigrama (id)');
        $this->addSql('ALTER TABLE siaf_unidades ADD CONSTRAINT FK_3C4BD894196099F1 FOREIGN KEY (siaf_servicios_id) REFERENCES siaf_servicios (id)');
        $this->addSql('ALTER TABLE siaf_unidades ADD CONSTRAINT FK_3C4BD89431E700CD FOREIGN KEY (id_padre_id) REFERENCES siaf_unidades (id)');
        $this->addSql('ALTER TABLE wfl_estados_entidad ADD CONSTRAINT FK_D22E97CD9CD4DDF FOREIGN KEY (conf_entidad_id) REFERENCES conf_entidades (id)');
        $this->addSql('ALTER TABLE wfl_transicion_estados ADD CONSTRAINT FK_F43883F09CD4DDF FOREIGN KEY (conf_entidad_id) REFERENCES conf_entidades (id)');
        $this->addSql('ALTER TABLE wfl_transicion_estados ADD CONSTRAINT FK_F43883F07E309DAD FOREIGN KEY (wfl_estado_inicial_id) REFERENCES wfl_estados_entidad (id)');
        $this->addSql('ALTER TABLE wfl_transicion_estados ADD CONSTRAINT FK_F43883F094F0ACE1 FOREIGN KEY (wfl_estado_final_id) REFERENCES wfl_estados_entidad (id)');
        $this->addSql('ALTER TABLE wfl_transicion_estados ADD CONSTRAINT FK_F43883F0609D6CB3 FOREIGN KEY (conf_rol_id) REFERENCES conf_roles (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pla_conf_plan_conceptos DROP FOREIGN KEY FK_212E257D341470E5');
        $this->addSql('ALTER TABLE pla_conf_plan_objetos_gasto DROP FOREIGN KEY FK_71C57A74A90D98E2');
        $this->addSql('ALTER TABLE pla_conf_plan_objetos_gasto DROP FOREIGN KEY FK_71C57A74D4BDE734');
        $this->addSql('ALTER TABLE pla_conf_plan_objetos_gasto_res DROP FOREIGN KEY FK_186D7B5ED1AE59E8');
        $this->addSql('ALTER TABLE pla_conf_plan_objetos_gasto_res DROP FOREIGN KEY FK_186D7B5ED4BDE734');
        $this->addSql('ALTER TABLE pla_conf_plan_unidades DROP FOREIGN KEY FK_F5A8847534B4022F');
        $this->addSql('ALTER TABLE pla_conf_plan_unidades DROP FOREIGN KEY FK_F5A88475D1AE59E8');
        $this->addSql('ALTER TABLE pla_conf_planes DROP FOREIGN KEY FK_13FA9ADCA90D98E2');
        $this->addSql('ALTER TABLE pla_conf_unidades_programatica DROP FOREIGN KEY FK_5D83144E34B4022F');
        $this->addSql('ALTER TABLE pla_conf_unidades_programatica DROP FOREIGN KEY FK_5D83144E222903D5');
        $this->addSql('ALTER TABLE pla_planes_cabecera DROP FOREIGN KEY FK_EF18B5CA341470E5');
        $this->addSql('ALTER TABLE pla_planes_cabecera DROP FOREIGN KEY FK_EF18B5CA222903D5');
        $this->addSql('ALTER TABLE pla_planes_cabecera DROP FOREIGN KEY FK_EF18B5CA1655D8F4');
        $this->addSql('ALTER TABLE pla_planes_cabecera DROP FOREIGN KEY FK_EF18B5CA34B4022F');
        $this->addSql('ALTER TABLE pla_planes_partidas DROP FOREIGN KEY FK_BF53852268357A88');
        $this->addSql('ALTER TABLE pla_planes_partidas DROP FOREIGN KEY FK_BF53852249AA8D2D');
        $this->addSql('ALTER TABLE pla_planes_partidas DROP FOREIGN KEY FK_BF538522222903D5');
        $this->addSql('ALTER TABLE pla_planes_partidas DROP FOREIGN KEY FK_BF538522D4BDE734');
        $this->addSql('ALTER TABLE pla_planes_procesos DROP FOREIGN KEY FK_49D17E6570A714E2');
        $this->addSql('ALTER TABLE pla_planes_procesos DROP FOREIGN KEY FK_49D17E65D1AE59E8');
        $this->addSql('ALTER TABLE pla_planes_procesos DROP FOREIGN KEY FK_49D17E65DC25BE4A');
        $this->addSql('ALTER TABLE siaf_aperturas_programaticas DROP FOREIGN KEY FK_BB027480C8EBA48');
        $this->addSql('ALTER TABLE siaf_aperturas_programaticas DROP FOREIGN KEY FK_BB027480196099F1');
        $this->addSql('ALTER TABLE siaf_aperturas_programaticas DROP FOREIGN KEY FK_BB0274801655D8F4');
        $this->addSql('ALTER TABLE siaf_aperturas_programaticas DROP FOREIGN KEY FK_BB02748014FE202F');
        $this->addSql('ALTER TABLE siaf_aperturas_programaticas DROP FOREIGN KEY FK_BB02748024CB1614');
        $this->addSql('ALTER TABLE siaf_estados_comprobantes DROP FOREIGN KEY FK_92E70DB6316CEB2B');
        $this->addSql('ALTER TABLE siaf_finalidad_funcion DROP FOREIGN KEY FK_3202B6281655D8F4');
        $this->addSql('ALTER TABLE siaf_finalidad_funcion DROP FOREIGN KEY FK_3202B62831E700CD');
        $this->addSql('ALTER TABLE siaf_fuentes_financiamiento DROP FOREIGN KEY FK_BE2BFF1B1655D8F4');
        $this->addSql('ALTER TABLE siaf_fuentes_financiamiento DROP FOREIGN KEY FK_BE2BFF1B31E700CD');
        $this->addSql('ALTER TABLE siaf_instituciones DROP FOREIGN KEY FK_8CF158A21655D8F4');
        $this->addSql('ALTER TABLE siaf_instituciones DROP FOREIGN KEY FK_8CF158A231E700CD');
        $this->addSql('ALTER TABLE siaf_objetos_gasto DROP FOREIGN KEY FK_543626FF1655D8F4');
        $this->addSql('ALTER TABLE siaf_objetos_gasto DROP FOREIGN KEY FK_543626FF31E700CD');
        $this->addSql('ALTER TABLE siaf_organigrama DROP FOREIGN KEY FK_770484D331E700CD');
        $this->addSql('ALTER TABLE siaf_sectores_institucionales DROP FOREIGN KEY FK_648A7BD31655D8F4');
        $this->addSql('ALTER TABLE siaf_sectores_institucionales DROP FOREIGN KEY FK_648A7BD331E700CD');
        $this->addSql('ALTER TABLE siaf_servicios DROP FOREIGN KEY FK_AB2D0AB71655D8F4');
        $this->addSql('ALTER TABLE siaf_unidades DROP FOREIGN KEY FK_3C4BD894B10CD778');
        $this->addSql('ALTER TABLE siaf_unidades DROP FOREIGN KEY FK_3C4BD894196099F1');
        $this->addSql('ALTER TABLE siaf_unidades DROP FOREIGN KEY FK_3C4BD89431E700CD');
        $this->addSql('ALTER TABLE wfl_estados_entidad DROP FOREIGN KEY FK_D22E97CD9CD4DDF');
        $this->addSql('ALTER TABLE wfl_transicion_estados DROP FOREIGN KEY FK_F43883F09CD4DDF');
        $this->addSql('ALTER TABLE wfl_transicion_estados DROP FOREIGN KEY FK_F43883F07E309DAD');
        $this->addSql('ALTER TABLE wfl_transicion_estados DROP FOREIGN KEY FK_F43883F094F0ACE1');
        $this->addSql('ALTER TABLE wfl_transicion_estados DROP FOREIGN KEY FK_F43883F0609D6CB3');
        $this->addSql('DROP TABLE conf_entidades');
        $this->addSql('DROP TABLE conf_roles');
        $this->addSql('DROP TABLE persona');
        $this->addSql('DROP TABLE pla_conf_plan_conceptos');
        $this->addSql('DROP TABLE pla_conf_plan_objetos_gasto');
        $this->addSql('DROP TABLE pla_conf_plan_objetos_gasto_res');
        $this->addSql('DROP TABLE pla_conf_plan_unidades');
        $this->addSql('DROP TABLE pla_conf_planes');
        $this->addSql('DROP TABLE pla_conf_tipo_planes');
        $this->addSql('DROP TABLE pla_conf_unidades_programatica');
        $this->addSql('DROP TABLE pla_planes_cabecera');
        $this->addSql('DROP TABLE pla_planes_partidas');
        $this->addSql('DROP TABLE pla_planes_procesos');
        $this->addSql('DROP TABLE siaf_aperturas_programaticas');
        $this->addSql('DROP TABLE siaf_categorias_programaticas');
        $this->addSql('DROP TABLE siaf_ejercicios');
        $this->addSql('DROP TABLE siaf_estados_comprobantes');
        $this->addSql('DROP TABLE siaf_finalidad_funcion');
        $this->addSql('DROP TABLE siaf_fuentes_financiamiento');
        $this->addSql('DROP TABLE siaf_instituciones');
        $this->addSql('DROP TABLE siaf_moneda');
        $this->addSql('DROP TABLE siaf_objetos_gasto');
        $this->addSql('DROP TABLE siaf_organigrama');
        $this->addSql('DROP TABLE siaf_parametros');
        $this->addSql('DROP TABLE siaf_sectores_institucionales');
        $this->addSql('DROP TABLE siaf_servicios');
        $this->addSql('DROP TABLE siaf_tipos_comprobantes');
        $this->addSql('DROP TABLE siaf_unidades');
        $this->addSql('DROP TABLE wfl_estados_entidad');
        $this->addSql('DROP TABLE wfl_transicion_estados');
    }
}
