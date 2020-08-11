DROP SCHEMA IF EXISTS `Asistencia`;
CREATE SCHEMA `Asistencia` DEFAULT CHARACTER SET utf8;
USE Asistencia;

CREATE TABLE Usuarios(
	id_usuario VARCHAR(4) PRIMARY KEY NOT NULL,
	nombre VARCHAR(50) NOT NULL,
	apellido VARCHAR(50) NOT NULL,
	correo VARCHAR(50) NOT NULL,
	tipo VARCHAR(3) NOT NULL
);

CREATE TABLE Profesores(
	id_profesor VARCHAR(4) NOT NULL REFERENCES Usuarios,
	PRIMARY KEY(id_profesor)
);

ALTER TABLE Profesores ADD CONSTRAINT `fk_profesor_usuario` FOREIGN KEY(id_profesor) 
REFERENCES Usuarios(id_usuario);

CREATE TABLE Estudiantes(
	id_estudiante VARCHAR(4) NOT NULL REFERENCES Usuarios,
	PRIMARY KEY(id_estudiante)
);

ALTER TABLE Estudiantes ADD CONSTRAINT `fk_estudiante_usuario` FOREIGN KEY(id_estudiante) 
REFERENCES Usuarios(id_usuario);

CREATE TABLE Cursos(
	id_curso VARCHAR(4) PRIMARY KEY NOT NULL,
	nombre VARCHAR(50) NOT NULL,
	codigo VARCHAR(50) NOT NULL
);

CREATE TABLE Secciones(
	id_seccion VARCHAR(4) PRIMARY KEY NOT NULL,
	aula VARCHAR(4) NOT NULL,
	hora TIME NOT NULL,
	id_curso VARCHAR(4) NOT NULL,
	id_profesor VARCHAR(4) NOT NULL,

	INDEX `idx_curso`(id_curso),
	CONSTRAINT `fk_seccion_curso`
    	FOREIGN KEY(id_curso)
    	REFERENCES Cursos(id_curso) ON UPDATE CASCADE ON DELETE RESTRICT,

	INDEX `idx_profesor`(id_profesor),
	CONSTRAINT `fk_seccion_profesor`
    	FOREIGN KEY(id_profesor)
    	REFERENCES Profesores(id_profesor) ON UPDATE CASCADE ON DELETE RESTRICT
);


CREATE TABLE Asistencias(
	id_asistencia VARCHAR(4) PRIMARY KEY NOT NULL,
	fecha DATE NOT NULL,
	asistencia TINYINT UNSIGNED NOT NULL,
	id_estudiante VARCHAR(4) NOT NULL,
	
	INDEX `idx_estudiante`(id_estudiante),
	CONSTRAINT `fk_seccion_estudiante`
    	FOREIGN KEY(id_estudiante)
    	REFERENCES Estudiantes(id_estudiante) ON UPDATE CASCADE ON DELETE RESTRICT
);

CREATE TABLE Historiales(
	id_historial VARCHAR(4) PRIMARY KEY NOT NULL,
	fecha DATE NOT NULL
);

CREATE TABLE Secciones_Asistencias(
	id_seccion VARCHAR(4) NOT NULL,
	id_asistencia VARCHAR(4) NOT NULL,
	
	INDEX `idx_seccion`(id_seccion),
	CONSTRAINT `fk_sa_seccion`
    	FOREIGN KEY(id_seccion)
    	REFERENCES Secciones(id_seccion) ON UPDATE CASCADE ON DELETE RESTRICT,

	INDEX `idx_asistencia`(id_asistencia),
	CONSTRAINT `fk_sa_asistencia`
    	FOREIGN KEY(id_asistencia)
    	REFERENCES Asistencias(id_asistencia) ON UPDATE CASCADE ON DELETE RESTRICT
);

ALTER TABLE Secciones_Asistencias ADD PRIMARY KEY(id_seccion, id_asistencia);

CREATE TABLE Secciones_Estudiantes(
	id_seccion VARCHAR(4) NOT NULL,
	id_estudiante VARCHAR(4) NOT NULL,
	
	INDEX `idx_seccion`(id_seccion),
	CONSTRAINT `fk_se_seccion`
    	FOREIGN KEY(id_seccion)
    	REFERENCES Secciones(id_seccion) ON UPDATE CASCADE ON DELETE RESTRICT,

	INDEX `idx_estudiante`(id_estudiante),
	CONSTRAINT `fk_se_estudiante`
    	FOREIGN KEY(id_estudiante)
    	REFERENCES Estudiantes(id_estudiante) ON UPDATE CASCADE ON DELETE RESTRICT
);

ALTER TABLE Secciones_Estudiantes ADD PRIMARY KEY(id_seccion, id_estudiante);

CREATE TABLE Historiales_Asistencias(
	id_historial VARCHAR(4) NOT NULL,
	id_asistencia VARCHAR(4) NOT NULL,
	
	INDEX `idx_historial`(id_historial),
	CONSTRAINT `fk_ha_historial`
    	FOREIGN KEY(id_historial)
    	REFERENCES Historiales(id_historial) ON UPDATE CASCADE ON DELETE RESTRICT,

	INDEX `idx_asistencia`(id_asistencia),
	CONSTRAINT `fk_ha_asistencia`
    	FOREIGN KEY(id_asistencia)
    	REFERENCES Asistencias(id_asistencia) ON UPDATE CASCADE ON DELETE RESTRICT
);

ALTER TABLE Historiales_Asistencias ADD PRIMARY KEY(id_historial, id_asistencia);




