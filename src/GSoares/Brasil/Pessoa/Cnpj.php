<?php
namespace GSoares\Brasil\Pessoa;

use \GSoares\Brasil\NumeroFormatavel;

/**
 * @package Brasil
 * @subpackage Pessoa
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class Cnpj extends Cnp implements NumeroFormatavel
{
	/*
	 * (non-PHPdoc) @see \GSoares\Brasil\Pessoa\Cnp::formata()
	 */
	public function formata()
	{
		return substr($this->cnp, 0, 2) . '.' . 
			   substr($this->cnp, 2, 3) . '.' .   
			   substr($this->cnp, 5, 3) . '/' .   
			   substr($this->cnp, 8, 4) . '-' .
			   substr($this->cnp, 12, 2);
	}
	
	/* (non-PHPdoc)
	 * @see \GSoares\Brasil\Pessoa\Cnp::valida()
	 */
	public function valida()
	{
		if (strlen($this->cnp) != 14 ||
			$this->cnp == 00000000000000 ||
			$this->cnp == 11111111111111 ||
			$this->cnp == 22222222222222 ||
			$this->cnp == 33333333333333 ||
			$this->cnp == 44444444444444 || 
			$this->cnp == 55555555555555 ||
			$this->cnp == 66666666666666 ||
			$this->cnp == 77777777777777 || 
			$this->cnp == 88888888888888 ||  
			$this->cnp == 99999999999999) {
 			throw new CnpInvalidoException('CNPJ ' . $this->cnp . ' inválido.');
		}

		$soma = 0;
		$soma += ($this->cnp[0] * 5);
		$soma += ($this->cnp[1] * 4);
		$soma += ($this->cnp[2] * 3);
		$soma += ($this->cnp[3] * 2);
		$soma += ($this->cnp[4] * 9);
		$soma += ($this->cnp[5] * 8);
		$soma += ($this->cnp[6] * 7);
		$soma += ($this->cnp[7] * 6);
		$soma += ($this->cnp[8] * 5);
		$soma += ($this->cnp[9] * 4);
		$soma += ($this->cnp[10] * 3);
		$soma += ($this->cnp[11] * 2);
		
		$d1 = $soma % 11;
		$d1 = $d1 < 2 ? 0 : 11 - $d1;
		
		$soma = 0;
		$soma += ($this->cnp[0] * 6);
		$soma += ($this->cnp[1] * 5);
		$soma += ($this->cnp[2] * 4);
		$soma += ($this->cnp[3] * 3);
		$soma += ($this->cnp[4] * 2);
		$soma += ($this->cnp[5] * 9);
		$soma += ($this->cnp[6] * 8);
		$soma += ($this->cnp[7] * 7);
		$soma += ($this->cnp[8] * 6);
		$soma += ($this->cnp[9] * 5);
		$soma += ($this->cnp[10] * 4);
		$soma += ($this->cnp[11] * 3);
		$soma += ($this->cnp[12] * 2);
		
		$d2 = $soma % 11;
		$d2 = $d2 < 2 ? 0 : 11 - $d2;
		
		if ($this->cnp[12] != $d1 && $this->cnp[13] != $d2) {
			throw new CnpInvalidoException('CNPJ ' . $this->cnp . ' inválido.');
		}
	}
}