<?php
namespace GSoares\Brasil\Pessoa;

use \GSoares\Brasil\NumeroFormatavel;

/**
 * @package Brasil
 * @subpackage Pessoa
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
abstract class Cnp implements NumeroFormatavel
{
	/**
	 * @var string
	 */
	protected $cnp;
	
	/**
	 * @param string $cnp
	 */
	public function __construct($cnp)
	{
		$this->cnp = preg_replace('/[^0-9]/', '', $cnp);
		
		if (!in_array(strlen($this->cnp), array(11, 14))) {
			throw new DocumentoInvalidoException(
				'CPF/CNPJ deve ter 11 ou 14 caracteres.'
			);
		}
		
		$this->valida();
	}
	
	/*
	 * (non-PHPdoc) @see \GSoares\Brasil\Pessoa\Cnp::numero()
	 */
	public function numero()
	{
		return $this->cnp;
	}
	
	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->formata();
	}
	
	protected abstract function valida();
}