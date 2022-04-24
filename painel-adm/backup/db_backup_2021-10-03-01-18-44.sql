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


DROP TABLE IF EXISTS chamadas;

CREATE TABLE `chamadas` (
  `id` int(11) NOT NULL,
  `paciente` varchar(40) NOT NULL,
  `consultorio` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO chamadas VALUES("1","Hugo Vasconcelos","102","Aguardando");


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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

INSERT INTO consultas VALUES("15","2021-05-24","10:00:00","2","2","1","180.00","Não",NULL,NULL,NULL,NULL);
INSERT INTO consultas VALUES("16","2021-05-25","11:30:00","1","1","1","160.00","Não",NULL,NULL,NULL,NULL);
INSERT INTO consultas VALUES("18","2021-05-25","15:00:00","1","4","1","2800.00","Sim","Aguardando",NULL,NULL,NULL);
INSERT INTO consultas VALUES("19","2021-05-25","14:00:00","2","4","1","2800.00","Não",NULL,NULL,NULL,NULL);
INSERT INTO consultas VALUES("20","2021-05-25","07:00:00","1","4","1","2800.00","Sim","Aguardando",NULL,NULL,NULL);
INSERT INTO consultas VALUES("21","2021-05-25","09:30:00","2","4","2","2800.00","Não",NULL,NULL,NULL,NULL);
INSERT INTO consultas VALUES("49","2021-10-03","23:00:00","8","4","1","2800.00","Não",NULL,NULL,NULL,NULL);


DROP TABLE IF EXISTS contas_pagar;

CREATE TABLE `contas_pagar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(40) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `vencimento` date NOT NULL,
  `pagamento` date DEFAULT NULL,
  `pago` varchar(5) NOT NULL,
  `funcionario` varchar(20) NOT NULL,
  `foto` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO contas_pagar VALUES("1","Luz","850.00","2020-03-25","2020-03-25","Sim","999.999.999-93","sem-foto.png");
INSERT INTO contas_pagar VALUES("2","Ãgua","650.00","2020-03-25",NULL,"NÃ£o","999.999.999-93","conta2.jpg");
INSERT INTO contas_pagar VALUES("3","Compra de RemÃ©dios","50.00","2020-03-25",NULL,"NÃ£o","444.444.444-44","sem-foto.png");
INSERT INTO contas_pagar VALUES("4","Compra de RemÃ©dios","3.00","2020-03-25",NULL,"NÃ£o","444.444.444-44","sem-foto.png");
INSERT INTO contas_pagar VALUES("5","Compra de Cadeiras","40.00","2020-03-23","2020-03-25","Sim","999.999.999-93","sem-foto.png");
INSERT INTO contas_pagar VALUES("7","Compra de Materiais","80.55","2020-03-25",NULL,"NÃ£o","999.999.999-93","sem-foto.png");
INSERT INTO contas_pagar VALUES("9","Conta de Telefone","20.99","2020-03-25","2020-03-25","Sim","999.999.999-93","sem-foto.png");
INSERT INTO contas_pagar VALUES("10","Compra de RemÃ©dios","10.00","2020-03-25",NULL,"NÃ£o","444.444.444-44","sem-foto.png");
INSERT INTO contas_pagar VALUES("11","Compra de RemÃ©dios","4.98","2020-03-25","2020-03-25","Sim","999.999.999-93","sem-foto.png");
INSERT INTO contas_pagar VALUES("12","Luz","650.00","2020-03-26",NULL,"NÃ£o","999.999.999-93","sem-foto.png");
INSERT INTO contas_pagar VALUES("13","Pagamento Eletrecista","230.00","2020-03-26",NULL,"NÃ£o","999.999.999-93","sem-foto.png");
INSERT INTO contas_pagar VALUES("14","Conta de Luz","600.00","2021-05-25","2021-05-25","Sim","999.999.999-93","pix-itau.jpeg");


DROP TABLE IF EXISTS contas_receber;

CREATE TABLE `contas_receber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `vencimento` date NOT NULL,
  `data_baixa` date DEFAULT NULL,
  `forma_pgto` varchar(25) DEFAULT NULL,
  `tipo_pgto` varchar(30) DEFAULT NULL,
  `tesoureiro` varchar(30) DEFAULT NULL,
  `id_consulta` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

INSERT INTO contas_receber VALUES("1","4","2800.00","2020-03-25",NULL,NULL,NULL,NULL,"1");
INSERT INTO contas_receber VALUES("2","2","180.00","2020-03-25","2020-03-25","Dinheiro","A Vista","999.999.999-93","2");
INSERT INTO contas_receber VALUES("3","1","160.00","2020-03-25",NULL,NULL,NULL,NULL,"3");
INSERT INTO contas_receber VALUES("4","1","160.00","2020-03-25","2020-03-25","Dinheiro","A Vista","999.999.999-93","4");
INSERT INTO contas_receber VALUES("5","3","60.00","2020-03-25","2020-03-25","Dinheiro","A Vista","999.999.999-93","5");
INSERT INTO contas_receber VALUES("6","4","2800.00","2020-03-26","2020-03-26","Dinheiro","A Vista","999.999.999-93","6");
INSERT INTO contas_receber VALUES("7","1","160.00","2020-03-26",NULL,NULL,NULL,NULL,"7");
INSERT INTO contas_receber VALUES("8","4","2800.00","2020-03-26","2020-03-26","Dinheiro","A Vista","999.999.999-93","8");
INSERT INTO contas_receber VALUES("9","4","2800.00","2020-03-26","2020-03-26","Dinheiro","A Vista","999.999.999-93","9");
INSERT INTO contas_receber VALUES("10","1","160.00","2020-03-26","2020-03-26","Dinheiro","A Vista","999.999.999-93","10");
INSERT INTO contas_receber VALUES("11","3","60.00","2020-03-26","2020-03-26","Dinheiro","A Vista","999.999.999-93","11");
INSERT INTO contas_receber VALUES("13","2","180.00","2021-05-24",NULL,NULL,NULL,NULL,"13");
INSERT INTO contas_receber VALUES("14","2","180.00","2021-05-25",NULL,NULL,NULL,NULL,"14");
INSERT INTO contas_receber VALUES("15","2","180.00","2021-05-24",NULL,NULL,NULL,NULL,"15");
INSERT INTO contas_receber VALUES("16","1","160.00","2021-05-25",NULL,NULL,NULL,NULL,"16");
INSERT INTO contas_receber VALUES("17","4","2800.00","2021-05-25","2021-05-26","Dinheiro",NULL,"999.999.999-93","17");
INSERT INTO contas_receber VALUES("18","4","2800.00","2021-05-25","2021-05-26","Dinheiro",NULL,"999.999.999-93","18");
INSERT INTO contas_receber VALUES("19","4","2800.00","2021-05-25",NULL,NULL,NULL,NULL,"19");
INSERT INTO contas_receber VALUES("20","4","2800.00","2021-05-25","2021-05-26","Dinheiro",NULL,"999.999.999-93","20");
INSERT INTO contas_receber VALUES("21","4","2800.00","2021-05-25",NULL,NULL,NULL,NULL,"21");
INSERT INTO contas_receber VALUES("22","2","180.00","2021-05-25","2021-05-26","Dinheiro",NULL,"999.999.999-93","22");
INSERT INTO contas_receber VALUES("23","4","2800.00","2021-05-25",NULL,NULL,NULL,NULL,"23");
INSERT INTO contas_receber VALUES("24","3","60.00","2021-05-25",NULL,NULL,NULL,NULL,"24");
INSERT INTO contas_receber VALUES("25","3","60.00","2021-05-25","2021-05-26","Dinheiro",NULL,"999.999.999-93","25");
INSERT INTO contas_receber VALUES("26","3","60.00","2021-05-24",NULL,NULL,NULL,NULL,"26");
INSERT INTO contas_receber VALUES("27","4","2800.00","2021-05-25",NULL,NULL,NULL,NULL,"27");
INSERT INTO contas_receber VALUES("28","4","2800.00","2021-05-25","2021-05-26","Dinheiro",NULL,"999.999.999-93","28");
INSERT INTO contas_receber VALUES("29","2","180.00","2021-05-26",NULL,NULL,NULL,NULL,"29");
INSERT INTO contas_receber VALUES("30","1","160.00","2021-05-26",NULL,NULL,NULL,NULL,"30");
INSERT INTO contas_receber VALUES("31","1","160.00","2021-05-26",NULL,NULL,NULL,NULL,"31");
INSERT INTO contas_receber VALUES("32","3","60.00","2021-05-26","2021-05-26","Dinheiro",NULL,"999.999.999-93","32");
INSERT INTO contas_receber VALUES("33","3","60.00","2021-05-26","2021-05-26","Dinheiro",NULL,"999.999.999-93","33");
INSERT INTO contas_receber VALUES("34","3","60.00","2021-05-26","2021-05-26","Dinheiro",NULL,"999.999.999-93","34");
INSERT INTO contas_receber VALUES("35","3","60.00","2021-05-26","2021-05-26","Dinheiro",NULL,"999.999.999-93","35");
INSERT INTO contas_receber VALUES("36","3","60.00","2021-05-26","2021-05-26","Dinheiro",NULL,"999.999.999-93","36");
INSERT INTO contas_receber VALUES("37","4","2800.00","2021-05-26",NULL,NULL,NULL,NULL,"37");
INSERT INTO contas_receber VALUES("38","4","2800.00","2021-05-26","2021-05-26","Dinheiro",NULL,"999.999.999-93","38");
INSERT INTO contas_receber VALUES("39","4","2800.00","2021-05-26","2021-05-26","Dinheiro",NULL,"999.999.999-93","39");
INSERT INTO contas_receber VALUES("40","1","160.00","2021-05-26","2021-05-26","Dinheiro",NULL,"999.999.999-93","40");
INSERT INTO contas_receber VALUES("41","4","2800.00","2021-05-26","2021-05-26","Dinheiro",NULL,"999.999.999-93","41");
INSERT INTO contas_receber VALUES("42","4","2800.00","2021-05-26",NULL,NULL,NULL,NULL,"42");
INSERT INTO contas_receber VALUES("43","1","160.00","2021-05-26","2021-05-26","Dinheiro",NULL,"999.999.999-93","43");
INSERT INTO contas_receber VALUES("44","1","160.00","2021-05-26","2021-05-26","Dinheiro",NULL,"999.999.999-93","44");
INSERT INTO contas_receber VALUES("45","4","2800.00","2021-05-26","2021-05-26","Dinheiro",NULL,"999.999.999-93","45");
INSERT INTO contas_receber VALUES("46","4","2800.00","2021-10-03",NULL,NULL,NULL,NULL,"46");
INSERT INTO contas_receber VALUES("47","4","2800.00","2021-10-03",NULL,NULL,NULL,NULL,"47");
INSERT INTO contas_receber VALUES("48","1","160.00","2021-10-03",NULL,NULL,NULL,NULL,"48");
INSERT INTO contas_receber VALUES("49","4","2800.00","2021-10-03",NULL,NULL,NULL,NULL,"49");


DROP TABLE IF EXISTS entradas_remedios;

CREATE TABLE `entradas_remedios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `remedio` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `fornecedor` int(11) NOT NULL,
  `farmaceutico` varchar(20) NOT NULL,
  `nome_remedio` varchar(100) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO entradas_remedios VALUES("1","3","25","2.00","1","444.444.444-44","Aspirina Comprimido","2020-03-25");
INSERT INTO entradas_remedios VALUES("2","2","3","1.00","1","444.444.444-44","Dipirona Comprimido","2020-03-25");
INSERT INTO entradas_remedios VALUES("3","3","5","2.00","1","444.444.444-44","Aspirina Comprimido","2020-03-25");
INSERT INTO entradas_remedios VALUES("4","3","2","2.49","1","444.444.444-44","Aspirina Comprimido","2020-03-25");


DROP TABLE IF EXISTS especializacoes;

CREATE TABLE `especializacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO especializacoes VALUES("1","Pediatra");
INSERT INTO especializacoes VALUES("2","Ortopedista");


DROP TABLE IF EXISTS fornecedores;

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `remedios` varchar(350) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO fornecedores VALUES("1","Pablo Silva","(66) 66666-6666","pablo@hotmail.com","RemÃ©dios em geral");


DROP TABLE IF EXISTS funcionarios;

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO funcionarios VALUES("1","Patrick Silva","000.000.000-10","(55) 55555-5555","patrick@hotmail.com","Medico");
INSERT INTO funcionarios VALUES("2","Paula Campos","000.000.000-20","(66) 66666-6666","paula@hotmail.com","Medico");
INSERT INTO funcionarios VALUES("6","Marta Campos","555.555.555-56","(66) 66666-6666","marta@hotmail.com","Enfermeira");
INSERT INTO funcionarios VALUES("8","Marcos Silva","111.111.111-11","(66) 66666-6666","marcos@hotmail.com","Recepcionista");
INSERT INTO funcionarios VALUES("11","Gomes Silva","444.444.444-44","(44) 44444-4444","gomes@hotmail.com","Recepcionista");
INSERT INTO funcionarios VALUES("14","Pedro Silva","584.555.555-55","(78) 55555-5555","pedro@hotmail.com","Medico");


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


DROP TABLE IF EXISTS movimentacoes;

CREATE TABLE `movimentacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(15) NOT NULL,
  `movimento` varchar(30) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tesoureiro` varchar(20) NOT NULL,
  `data` date NOT NULL,
  `id_movimento` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

INSERT INTO movimentacoes VALUES("1","Entrada","Consulta","60.00","999.999.999-93","2020-03-25","5");
INSERT INTO movimentacoes VALUES("2","Entrada","Consulta","160.00","999.999.999-93","2020-03-25","4");
INSERT INTO movimentacoes VALUES("3","Entrada","Consulta","180.00","999.999.999-93","2020-03-25","2");
INSERT INTO movimentacoes VALUES("4","SaÃ­da","Pagamento Conta","850.00","999.999.999-93","2020-03-25","1");
INSERT INTO movimentacoes VALUES("5","SaÃ­da","Pagamento Conta","40.00","999.999.999-93","2020-03-25","5");
INSERT INTO movimentacoes VALUES("6","SaÃ­da","Pagamento Conta","20.99","999.999.999-93","2020-03-25","9");
INSERT INTO movimentacoes VALUES("7","SaÃ­da","Pagamento Conta","4.98","999.999.999-93","2020-03-25","11");
INSERT INTO movimentacoes VALUES("8","SaÃ­da","Pgto FuncionÃ¡rio","900.00","999.999.999-93","2020-03-26","1");
INSERT INTO movimentacoes VALUES("10","SaÃ­da","Pgto FuncionÃ¡rio","20.55","999.999.999-93","2020-03-26","3");
INSERT INTO movimentacoes VALUES("11","Entrada","Consulta","2800.00","999.999.999-93","2020-03-26","9");
INSERT INTO movimentacoes VALUES("12","Entrada","Consulta","60.00","999.999.999-93","2020-03-26","11");
INSERT INTO movimentacoes VALUES("13","Entrada","Consulta","160.00","999.999.999-93","2020-03-26","10");
INSERT INTO movimentacoes VALUES("14","Entrada","Consulta","2800.00","999.999.999-93","2020-03-26","8");
INSERT INTO movimentacoes VALUES("15","Entrada","Consulta","2800.00","999.999.999-93","2020-03-26","6");
INSERT INTO movimentacoes VALUES("16","Saída","Pgto Funcionário","1150.00","999.999.999-93","2021-05-25","4");
INSERT INTO movimentacoes VALUES("17","Saída","Pagamento Conta","600.00","999.999.999-93","2021-05-25","14");
INSERT INTO movimentacoes VALUES("18","Entrada","Consulta","2800.00","999.999.999-93","2021-05-26","28");
INSERT INTO movimentacoes VALUES("19","Entrada","Consulta","60.00","999.999.999-93","2021-05-26","36");
INSERT INTO movimentacoes VALUES("20","Entrada","Consulta","60.00","999.999.999-93","2021-05-26","34");
INSERT INTO movimentacoes VALUES("21","Entrada","Consulta","60.00","999.999.999-93","2021-05-26","35");
INSERT INTO movimentacoes VALUES("22","Entrada","Consulta","60.00","999.999.999-93","2021-05-26","33");
INSERT INTO movimentacoes VALUES("23","Entrada","Consulta","60.00","999.999.999-93","2021-05-26","32");
INSERT INTO movimentacoes VALUES("24","Entrada","Consulta","60.00","999.999.999-93","2021-05-26","25");
INSERT INTO movimentacoes VALUES("25","Entrada","Consulta","180.00","999.999.999-93","2021-05-26","22");
INSERT INTO movimentacoes VALUES("26","Entrada","Consulta","2800.00","999.999.999-93","2021-05-26","20");
INSERT INTO movimentacoes VALUES("27","Entrada","Consulta","2800.00","999.999.999-93","2021-05-26","18");
INSERT INTO movimentacoes VALUES("28","Entrada","Consulta","2800.00","999.999.999-93","2021-05-26","17");
INSERT INTO movimentacoes VALUES("29","Entrada","Consulta","2800.00","999.999.999-93","2021-05-26","41");
INSERT INTO movimentacoes VALUES("30","Entrada","Consulta","160.00","999.999.999-93","2021-05-26","40");
INSERT INTO movimentacoes VALUES("31","Entrada","Consulta","2800.00","999.999.999-93","2021-05-26","39");
INSERT INTO movimentacoes VALUES("32","Entrada","Consulta","2800.00","999.999.999-93","2021-05-26","45");
INSERT INTO movimentacoes VALUES("33","Entrada","Consulta","160.00","999.999.999-93","2021-05-26","44");
INSERT INTO movimentacoes VALUES("34","Entrada","Consulta","160.00","999.999.999-93","2021-05-26","43");
INSERT INTO movimentacoes VALUES("35","Entrada","Consulta","2800.00","999.999.999-93","2021-05-26","38");


DROP TABLE IF EXISTS pac;

CREATE TABLE `pac` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO pac VALUES("4","William Souza","438.699.338-01","(11) 11111-1111","w@gmail.com");


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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO pacientes VALUES("7","William","999.999.999-99","123123123","(12) 31312-3131","william@gmail.com","1995-02-13","26","Solteiro","Masculino","avenida3A",NULL);
INSERT INTO pacientes VALUES("8","Souza","888.888.888-88","123132131231","(12) 31231-2312","wi@gmail.com","1995-12-02","25","Solteiro","Masculino","avenida5",NULL);
INSERT INTO pacientes VALUES("9","teste domingo","123.123.100-00","12313123123123","(23) 12312-3121",NULL,"1976-02-13","45","Solteiro","Masculino","avenida 10",NULL);


DROP TABLE IF EXISTS pagamentos;

CREATE TABLE `pagamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `funcionario` varchar(35) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tesoureiro` varchar(35) NOT NULL,
  `data` date NOT NULL,
  `nome_funcionario` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO pagamentos VALUES("1","444.444.444-44","900.00","999.999.999-93","2020-03-26","Gabriel Silva");
INSERT INTO pagamentos VALUES("3","555.555.555-56","20.55","999.999.999-93","2020-03-26","Marta Campos");
INSERT INTO pagamentos VALUES("4","555.555.555-56","1150.00","999.999.999-93","2021-05-25","Marta Campos");


DROP TABLE IF EXISTS prescricao;

CREATE TABLE `prescricao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_consulta` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `remedio` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO prescricao VALUES("1","5","1","Soro na veia xxxxxxx");
INSERT INTO prescricao VALUES("2","5","2","RemÃ©dio x ");
INSERT INTO prescricao VALUES("3","32","1","sddfsfdf");
INSERT INTO prescricao VALUES("4","32","2","fdfdsfsd");


DROP TABLE IF EXISTS receitas;

CREATE TABLE `receitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_consulta` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `remedio` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO receitas VALUES("1","5","1","Dipirona Liquida 3 vezes");
INSERT INTO receitas VALUES("2","5","2","Soro na veira com xxxx");
INSERT INTO receitas VALUES("3","32","1","XXXX");
INSERT INTO receitas VALUES("4","32","2","SSSSS");
INSERT INTO receitas VALUES("5","39","1","Remedio 1");
INSERT INTO receitas VALUES("6","39","2","Remedio 2");


DROP TABLE IF EXISTS recepcionistas;

CREATE TABLE `recepcionistas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `turno` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO recepcionistas VALUES("1","Gomes Silva","444.444.444-44","(44) 44444-4444","gomes@hotmail.com","Manhã");


DROP TABLE IF EXISTS remedios;

CREATE TABLE `remedios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `estoque` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO remedios VALUES("1","Dipirona LÃ­quida","200 ML",NULL);
INSERT INTO remedios VALUES("2","Dipirona Comprimido","Cartela com 20","3");
INSERT INTO remedios VALUES("3","Aspirina Comprimido","Cartela com 20","30");


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


DROP TABLE IF EXISTS saidas_remedios;

CREATE TABLE `saidas_remedios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `remedio` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `funcionario` int(11) NOT NULL,
  `farmaceutico` varchar(20) NOT NULL,
  `nome_remedio` varchar(100) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO saidas_remedios VALUES("1","3","2","6","444.444.444-44","Aspirina Comprimido","2020-03-25");


DROP TABLE IF EXISTS tesoureiros;

CREATE TABLE `tesoureiros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `turno` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO tesoureiros VALUES("1","Allan Machado","666.666.666-66","(55) 55555-5555","alan@hotmail.com","ManhÃ£");
INSERT INTO tesoureiros VALUES("2","Diego Campos","999.999.999-93","(99) 99999-9999","tesoureiro@hotmail.com","ManhÃ£");


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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

INSERT INTO triagens VALUES("14","7","2021-10-03","03:57:22","Urgente mt","Altíssima","Não");
INSERT INTO triagens VALUES("15","8","2021-10-03","04:01:12","doente","Altíssima","Não");
INSERT INTO triagens VALUES("16","9","2021-10-03","12:46:48","aaa","Média","Não");


DROP TABLE IF EXISTS usuarios;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `senha_original` varchar(25) NOT NULL,
  `nivel` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

INSERT INTO usuarios VALUES("11","Hugo Vasconcelos","contato@hugocursos.com.br","202cb962ac59075b964b07152d234b70","123","admin");
INSERT INTO usuarios VALUES("55","Patrick Silva","patrick@hotmail.com","202cb962ac59075b964b07152d234b70","123","Medico");
INSERT INTO usuarios VALUES("56","Paula Campos","paula@hotmail.com","202cb962ac59075b964b07152d234b70","123","Medico");
INSERT INTO usuarios VALUES("59","Gomes Silva","gomes@hotmail.com","202cb962ac59075b964b07152d234b70","123","Recepcionista");
INSERT INTO usuarios VALUES("68","Administrador","contatoadm@hotmail.com","202cb962ac59075b964b07152d234b70","123","admin");
INSERT INTO usuarios VALUES("69","Pedro Silva","pedro@hotmail.com","db3630b7ef1be795f1fecd4e0fad1088","58455555555","Médico");
INSERT INTO usuarios VALUES("70","william","wil@gmail.com","202cb962ac59075b964b07152d234b70","123","admin");


