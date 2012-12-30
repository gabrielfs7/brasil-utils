<?php
namespace GSoares\Brasil\Pessoa;

use \GSoares\Brasil\NumeroFormatavel;

/**
 * @package Brasil
 * @subpackage Pessoa
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class Cpf extends Cnp implements NumeroFormatavel
{
	/*
	 * (non-PHPdoc) @see \GSoares\Brasil\Pessoa\Cnp::formata()
	 */
	public function formata()
	{
		return substr($this->cnp, 0, 3) . '.' . 
			   substr($this->cnp, 3, 3) . '.' .   
			   substr($this->cnp, 6, 3) . '-' .   
			   substr($this->cnp, 9, 2);
	}
	
	/* (non-PHPdoc)
	 * @see \GSoares\Brasil\Pessoa\Cnp::valida()
	 */
	protected function valida()
	{
		if (strlen($this->cnp) != 11 ||
			$this->cnp == 00000000000 ||
			$this->cnp == 11111111111 ||
			$this->cnp == 22222222222 ||
			$this->cnp == 33333333333 ||
			$this->cnp == 44444444444 || 
			$this->cnp == 55555555555 ||
			$this->cnp == 66666666666 ||
			$this->cnp == 77777777777 || 
			$this->cnp == 88888888888 ||  
			$this->cnp == 99999999999) {
 			throw new DocumentoInvalidoException('CPF ' . $this->cnp . ' inválido.');
		}
		
		$soma = 0;
		
		for ($i = 0; $i < 9; $i++) {   
		   $soma += (($i+1) * $this->cnp[$i]);
		}
		
		$d1 = ($soma % 11);
		
		if ($d1 == 10) {
		   $d1 = 0;
		}
		
		$soma = 0;
		
		for ($i = 9, $j = 0; $i > 0; $i--, $j++) {
		   $soma += ($i * $this->cnp[$j]);
		}
		
		$d2 = ($soma % 11);
		
		if ($d2 == 10) {
		   $d2 = 0;
		}
		
		if ($d1 != $this->cnp[9] && $d2 != $this->cnp[10]) {
			throw new DocumentoInvalidoException('CPF ' . $this->cnp . ' inválido.');
		}
	}
}