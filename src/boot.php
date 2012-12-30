<?php
//Geral
require_once __DIR__ . '/GSoares/Brasil/NumeroFormatavel.php';

//Documentos
require_once __DIR__ . '/GSoares/Brasil/Pessoa/DocumentoInvalidoException.php';
require_once __DIR__ . '/GSoares/Brasil/Pessoa/Cnp.php';
require_once __DIR__ . '/GSoares/Brasil/Pessoa/Cnpj.php';
require_once __DIR__ . '/GSoares/Brasil/Pessoa/Cpf.php';
require_once __DIR__ . '/GSoares/Brasil/Pessoa/Rg.php';
require_once __DIR__ . '/GSoares/Brasil/Pessoa/Pis.php';

//Veículo
require_once __DIR__ . '/GSoares/Brasil/Veiculo/Placa.php';
require_once __DIR__ . '/GSoares/Brasil/Veiculo/PlacaInvalidaException.php';

//Telefone
require_once __DIR__ . '/GSoares/Brasil/Telefone/TelefoneInvalidoException.php';
require_once __DIR__ . '/GSoares/Brasil/Telefone/Telefone.php';
require_once __DIR__ . '/GSoares/Brasil/Telefone/Celular.php';
require_once __DIR__ . '/GSoares/Brasil/Telefone/TelefoneFixo.php';

//Endereço
require_once __DIR__ . '/GSoares/Brasil/Endereco/EnderecoInvalidoException.php';
require_once __DIR__ . '/GSoares/Brasil/Endereco/Uf.php';
require_once __DIR__ . '/GSoares/Brasil/Endereco/Cep.php';