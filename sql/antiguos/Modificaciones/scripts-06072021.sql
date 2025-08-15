DROP TABLE bitacora_seguimiento

CREATE TABLE bitacora_seguimiento 
(
	id_seguimiento BIGINT NOT NULL AUTO_INCREMENT,
	id_cotizacion INT,
	titulo VARCHAR(50),
	mensaje VARCHAR(1000),
	fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	usuario_registro BIGINT,
	fecha_modificacion DATETIME,
	usuario_modificacion BIGINT,
	flag_historico BOOLEAN DEFAULT FALSE,
	PRIMARY KEY(id_seguimiento)
	/*CONSTRAINT FK_SeguimientoCotizacion FOREIGN KEY (id_cotizacion) REFERENCES cotizacion(COTIP_Codigo),
	CONSTRAINT FK_SeguimientoUsuario FOREIGN KEY (usuario_registro) REFERENCES users(id)*/
);

select * from bitacora_seguimiento;