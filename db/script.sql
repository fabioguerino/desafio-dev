CREATE DATABASE IF NOT EXISTS
		desafiobycoders;
USE	desafiobycoders;	

CREATE TABLE `movimentacoesfinanceiras` (
  `id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `data` date NOT NULL,
  `valor` float NOT NULL,
  `cpf` text NOT NULL,
  `cartao` text NOT NULL,
  `hora` time NOT NULL,
  `donoLoja` text NOT NULL,
  `nomeLoja` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `movimentacoesfinanceiras` (`id`, `tipo`, `data`, `valor`, `cpf`, `cartao`, `hora`, `donoLoja`, `nomeLoja`) VALUES
(172, 3, '2019-03-01', 142, '09620676017', '4753****3153', '15:34:53', 'JOÃO MACEDO  ', ' BAR DO JOÃO       \r\n'),
(173, 5, '2019-03-01', 132, '55641815063', '3123****7687', '14:56:07', 'MARIA JOSEFINA', 'LOJA DO Ó - MATRIZ\r\n');

CREATE TABLE `tiposoperacoes` (
  `tipo` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `natureza` text NOT NULL,
  `sinal` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tiposoperacoes` (`tipo`, `descricao`, `natureza`, `sinal`) VALUES
(1, 'Débito', 'Entrada', '+'),
(2, 'Boleto', 'Saída', '-'),
(3, 'Financiamento', 'Saída', '-'),
(4, 'Crédito', 'Entrada', '+'),
(5, 'Recebimento Empréstimo', 'Entrada', '+'),
(6, 'Vendas', 'Entrada', '+'),
(7, 'Recebimento TED', 'Entrada', '+'),
(8, 'Recebimento DOC', 'Entrada', '+'),
(9, 'Aluguel', 'Saída', '-');

CREATE TABLE `usuarios` (
  `nome` text NOT NULL,
  `login` text NOT NULL,
  `senha` text NOT NULL,
  `modulo` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `usuarios` (`nome`, `login`, `senha`, `modulo`) VALUES
("Administrador", 'adm', 'b09c600fddc573f117449b3723f23d64', '');

ALTER TABLE `movimentacoesfinanceiras`
  ADD PRIMARY KEY (`id`);
  
ALTER TABLE `tiposoperacoes`
  ADD PRIMARY KEY (`tipo`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`); 

ALTER TABLE `movimentacoesfinanceiras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;