<?php
//Geral
require_once 'GSoares\Brasil\NumeroFormatavel.php';

//Documentos
require_once 'GSoares\Brasil\Pessoa\DocumentoInvalidoException.php';
require_once 'GSoares\Brasil\Pessoa\Cnp.php';
require_once 'GSoares\Brasil\Pessoa\Cnpj.php';
require_once 'GSoares\Brasil\Pessoa\Cpf.php';
require_once 'GSoares\Brasil\Pessoa\Rg.php';
require_once 'GSoares\Brasil\Pessoa\Pis.php';

//Telefone
require_once 'GSoares\Brasil\Telefone\TelefoneInvalidoException.php';
require_once 'GSoares\Brasil\Telefone\Telefone.php';
require_once 'GSoares\Brasil\Telefone\Celular.php';
require_once 'GSoares\Brasil\Telefone\TelefoneFixo.php';

//Endereço
require_once 'GSoares\Brasil\Endereco\EnderecoInvalidoException.php';
require_once 'GSoares\Brasil\Endereco\Uf.php';
require_once 'GSoares\Brasil\Endereco\Cep.php';