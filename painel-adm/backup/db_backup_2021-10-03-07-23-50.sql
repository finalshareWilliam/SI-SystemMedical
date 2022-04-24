DROP TABLE IF EXISTS atendimentos;

CREATE TABLE `atendimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(60) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO atendimentos VALUES("1","Consulta Pediatra","160.00");
INSERT INTO atendimentos VALUES("2","Consulta Ortopedista","180.00");
INSERT INTO atendimentos VALUES("3","Exame de Sangue","60.00");
INSERT INTO atendimentos VALUES("4","Cirúrgia Estética","2800.00");


DROP TABLE IF EXISTS cargos;

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO cargos VALUES("1","Medico");
INSERT INTO cargos VALUES("2","Farmaceutico");
INSERT INTO cargos VALUES("3","Faxineira");
INSERT INTO cargos VALUES("4","Tesoureiro");
INSERT INTO cargos VALUES("5","Enfermeira");
INSERT INTO cargos VALUES("6","Balconista");
INSERT INTO cargos VALUES("7","Caixa");
INSERT INTO cargos VALUES("8","Recepcionista");


DROP TABLE IF EXISTS consultas;

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `paciente` int(11) NOT NULL,
  `tipo_atendimento` int(11) NOT NULL,
  `medico` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `pgto_confirmado` varchar(5) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `atestado` int(11) DEFAULT NULL,
  `prescricao` varchar(10) DEFAULT NULL,
  `receita` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

INSERT INTO consultas VALUES("54","2021-10-03","17:00:00","10","4","1","2800.00","Não",NULL,NULL,NULL,NULL);
INSERT INTO consultas VALUES("55","2021-10-03","16:30:00","11","4","1","2800.00","Não",NULL,NULL,NULL,NULL);


DROP TABLE IF EXISTS especializacoes;

CREATE TABLE `especializacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO especializacoes VALUES("1","Pediatra");
INSERT INTO especializacoes VALUES("2","Ortopedista");


DROP TABLE IF EXISTS funcionarios;

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

INSERT INTO funcionarios VALUES("1","Patrick Silva","000.000.000-10","(55) 55555-5555","patrick@hotmail.com","Medico");
INSERT INTO funcionarios VALUES("2","Paula Campos","000.000.000-20","(66) 66666-6666","paula@hotmail.com","Medico");
INSERT INTO funcionarios VALUES("6","Marta Campos","555.555.555-56","(66) 66666-6666","marta@hotmail.com","Enfermeira");
INSERT INTO funcionarios VALUES("8","Marcos Silva","111.111.111-11","(66) 66666-6666","marcos@hotmail.com","Recepcionista");
INSERT INTO funcionarios VALUES("11","Gomes Silva","444.444.444-44","(44) 44444-4444","gomes@hotmail.com","Recepcionista");
INSERT INTO funcionarios VALUES("14","Pedro Silva","584.555.555-55","(78) 55555-5555","pedro@hotmail.com","Medico");
INSERT INTO funcionarios VALUES("15","teste1","111.111.111-11","(22) 22222-2222","teste1@gmail.com","Recepcionista");


DROP TABLE IF EXISTS horarios;

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `horario` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

INSERT INTO horarios VALUES("1","07:00:00");
INSERT INTO horarios VALUES("2","07:30:00");
INSERT INTO horarios VALUES("3","08:00:00");
INSERT INTO horarios VALUES("4","08:30:00");
INSERT INTO horarios VALUES("5","09:00:00");
INSERT INTO horarios VALUES("6","09:30:00");
INSERT INTO horarios VALUES("7","10:00:00");
INSERT INTO horarios VALUES("8","10:30:00");
INSERT INTO horarios VALUES("9","11:00:00");
INSERT INTO horarios VALUES("10","11:30:00");
INSERT INTO horarios VALUES("11","13:00:00");
INSERT INTO horarios VALUES("12","13:30:00");
INSERT INTO horarios VALUES("13","14:00:00");
INSERT INTO horarios VALUES("14","14:30:00");
INSERT INTO horarios VALUES("15","15:00:00");
INSERT INTO horarios VALUES("16","15:30:00");
INSERT INTO horarios VALUES("17","16:00:00");
INSERT INTO horarios VALUES("18","16:30:00");
INSERT INTO horarios VALUES("19","17:00:00");


DROP TABLE IF EXISTS lab;

CREATE TABLE `lab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

INSERT INTO lab VALUES("36","lab1","111.111.111-11","(12) 31231-2312","lab@gmail.com");


DROP TABLE IF EXISTS labexame;

CREATE TABLE `labexame` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(60) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO labexame VALUES("2","teste 2","2000.00");


DROP TABLE IF EXISTS medicos;

CREATE TABLE `medicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `especialidade` int(11) NOT NULL,
  `crm` varchar(20) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `turno` varchar(15) NOT NULL,
  `consultorio` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO medicos VALUES("1","Patrick Silva","2","MG012345","000.000.000-10","(55) 55555-5555","patrick@hotmail.com","Tarde","102");
INSERT INTO medicos VALUES("2","Paula Campos","1","MG012346","000.000.000-20","(66) 66666-6666","paula@hotmail.com","Manhã","101");
INSERT INTO medicos VALUES("3","Pedro Silva","2","45454545545","584.555.555-55","(78) 55555-5555","pedro@hotmail.com","Manhã",NULL);


DROP TABLE IF EXISTS pacientes;

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(35) NOT NULL,
  `data_nasc` date NOT NULL,
  `idade` int(11) NOT NULL,
  `civil` varchar(15) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `obs` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO pacientes VALUES("10","teste agora","123.131.231-31","123132131231","(13) 21312-3123","1321313","2002-02-13","19","Solteiro","Masculino","asdasd",NULL);
INSERT INTO pacientes VALUES("11","aaa","123.235.666-66","1231231313","(12) 31231-2312","312312313","1988-02-12","33","Solteiro","Feminino","ave",NULL);


DROP TABLE IF EXISTS recepcionistas;

CREATE TABLE `recepcionistas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `turno` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO recepcionistas VALUES("1","Gomes Silva","444.444.444-44","(44) 44444-4444","gomes@hotmail.com","Manhã");
INSERT INTO recepcionistas VALUES("2","teste1","111.111.111-11","(22) 22222-2222","teste1@gmail.com","Manhã");


DROP TABLE IF EXISTS responsaveis;

CREATE TABLE `responsaveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paciente` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `data_nasc` date NOT NULL,
  `cpf` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO responsaveis VALUES("1","3","Marta Souza","2021-05-25","444.444.444-44");
INSERT INTO responsaveis VALUES("2","2","Patricia Santos","2021-05-05","656.566.666-66");


DROP TABLE IF EXISTS triagens;

CREATE TABLE `triagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paciente` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `obs` longtext NOT NULL,
  `urgencia` varchar(50) NOT NULL,
  `finalizada` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

INSERT INTO triagens VALUES("17","11","2021-10-03","15:01:43","fudeu","Altíssima","Não");


DROP TABLE IF EXISTS usuarios;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `senha_original` varchar(25) NOT NULL,
  `nivel` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;

INSERT INTO usuarios VALUES("11","Hugo Vasconcelos","contato@hugocursos.com.br","202cb962ac59075b964b07152d234b70","123","admin");
INSERT INTO usuarios VALUES("55","Patrick Silva","patrick@hotmail.com","202cb962ac59075b964b07152d234b70","123","Medico");
INSERT INTO usuarios VALUES("56","Paula Campos","paula@hotmail.com","202cb962ac59075b964b07152d234b70","123","Medico");
INSERT INTO usuarios VALUES("59","Gomes Silva","gomes@hotmail.com","202cb962ac59075b964b07152d234b70","123","Recepcionista");
INSERT INTO usuarios VALUES("100","WS Lab","laboratorio@lab.com","202cb962ac59075b964b07152d234b70","123","Laboratorio");
INSERT INTO usuarios VALUES("101","teste1","teste1@gmail.com","adbc91a43e988a3b5b745b8529a90b61","11111111111","Recepcionista");
INSERT INTO usuarios VALUES("110","William","william@paciente.com","202cb962ac59075b964b07152d234b70","123","Paciente");


