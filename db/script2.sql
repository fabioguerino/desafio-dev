USE	desafiobycoders;

INSERT INTO `usuarios` (`nome`, `login`, `senha`, `modulo`) VALUES
("Administrador", 'adm', 'b09c600fddc573f117449b3723f23d64', '');


ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nome`); 

