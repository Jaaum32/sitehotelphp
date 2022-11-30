create database db_hotel;

use db_hotel;

CREATE TABLE tb_usuario (
  id int(11) NOT NULL, --AUTO_INCREMENT
  nome varchar(100) DEFAULT NULL,
  email varchar(100) DEFAULT NULL,
  senha varchar(255) DEFAULT NULL,
  telefone varchar(15) DEFAULT NULL,
  perfil varchar(255) DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE(email)
);

CREATE TABLE tb_acomodacao(
    id int(11) NOT NULL, --AUTO_INCREMENT
    qtd_casal int DEFAULT NULL,
    qtd_solt int DEFAULT NULL,
    qtd_ext int DEFAULT NULL,
    tipo VARCHAR(20) DEFAULT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE tb_tarifa (
    id int(11) NOT NULL, --AUTO_INCREMENT
    tipo VARCHAR(20) DEFAULT NULL,
    preco DECIMAL DEFAULT NULL
    PRIMARY KEY(id)
);

CREATE TABLE tb_reserva (
    id int(11) NOT NULL, --AUTO_INCREMENT
    user_id int(11) DEFAULT NULL,
    acom_id int(11) DEFAULT NULL,
    data_in date DEFAULT NULL,
    data_out date DEFAULT NULL,
    qtd_hospedes int DEFAULT NULL,
    preco DECIMAL DEFAULT NULL
    PRIMARY KEY(id),
);