-- Script DDL: db_sistema_web
CREATE DATABASE IF NOT EXISTS db_sistema_web
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE db_sistema_web;

CREATE TABLE IF NOT EXISTS estudiantes (
  id             INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nombres        VARCHAR(80)  NOT NULL,
  apellidos      VARCHAR(80)  NOT NULL,
  correo         VARCHAR(120) NOT NULL,
  telefono       VARCHAR(15)  NOT NULL,
  carrera        VARCHAR(100) NOT NULL,
  fecha_creacion TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY uq_estudiantes_correo (correo)
) ENGINE=InnoDB;
