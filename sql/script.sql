
CREATE  database company;


CREATE TABLE  grados (
    gra_id SERIAL NOT NULL,
    gra_nombre VARCHAR(50) NOT NULL,
    gra_sit SMALLINT DEFAULT 1,
    PRIMARY KEY (gra_id)
);


CREATE TABLE armas (
arma_id SERIAL NOT NULL,
arma_descripcion VARCHAR(50) NOT NULL,
arma_situacion SMALLINT DEFAULT 1,
PRIMARY KEY (arma_id)

);


CREATE TABLE programador(
pro_id SERIAL NOT NULL,
pro_grado INTEGER NOT NULL,------------
pro_arma INTEGER NOT NULL,
pro_nombre VARCHAR (50),---------
pro_apellido VARCHAR (50),-------------
pro_correo VARCHAR (50),---------
pro_dpi  VARCHAR (50) NOT NULL,
pro_situacion SMALLINT DEFAULT 1,
PRIMARY KEY (pro_id),
FOREIGN KEY (pro_grado) REFERENCES grados (gra_id),
FOREIGN key (pro_arma) REFERENCES armas (arma_id),
UNIQUE  (pro_dpi)

);

CREATE TABLE aplicacion(
apl_id SERIAL NOT NULL,
apl_nombre VARCHAR (50),
apl_estado SMALLINT DEFAULT 1,
PRIMARY KEY (apl_id)
);

CREATE TABLE asignacion(
asi_id SERIAL NOT NULL,
asi_programador INTEGER,
asi_aplicacion INTEGER,
asi_situacion SMALLINT DEFAULT 1,
PRIMARY KEY (asi_id),
FOREIGN KEY (asi_programador) REFERENCES programador (pro_id),
FOREIGN KEY (asi_aplicacion) REFERENCES aplicacion (apl_id)
);

Create table tareas (
    tar_id serial not null primary key,
    tar_app int not null,
    tar_descripcion varchar (50) not null,
    tar_fecha date not null,
    tar_estado char (1) DEFAULT '1',
    foreign key (tar_app) REFERENCES aplicaciones(apl_id)
);