-- DROP TABLE usuario;

CREATE TABLE usuario (
  usuario_id int NOT NULL AUTO_INCREMENT,
  usuario varchar(30) NOT NULL,
  correo varchar(30) NOT NULL,
  pass varchar(20) NOT NULL,
  tipo varchar(15) NOT NULL,
  PRIMARY KEY (usuario_id)
);
