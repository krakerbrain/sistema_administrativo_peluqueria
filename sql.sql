
CREATE TABLE servicios
(
    idservicios SERIAL,
    nombre_servicio VARCHAR(50),
    costo_servicio INTEGER,
    PRIMARY KEY (idservicios)
);
CREATE TABLE clientes
(
    idcliente SERIAL,
    id_servicio INTEGER,
    nombre_cliente VARCHAR(100),
    ultimo_servicio DATE,
    PRIMARY KEY (idcliente),
    INDEX (id_servicio),
    FOREIGN KEY (id_servicio) REFERENCES servicios (idservicios) 
)

CREATE productos
(
    idproducto integer NOT NULL DEFAULT nextval('productos_idproducto_seq'::regclass),
    nombre_producto character varying(100) COLLATE pg_catalog."default",
    costo_producto integer,
    peso_neto integer,
    unidad_medida character varying(2) COLLATE pg_catalog."default",
    CONSTRAINT productos_pkey PRIMARY KEY (idproducto)
)
