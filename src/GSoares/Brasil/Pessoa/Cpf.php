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
			throw new DocumentoInvalidoException("CPF {$this->cnp} inválido.");
		}
	}

    /**
     * @return int
     */
    protected function getQuantidadeNumeros()
    {
        return 11;
    }
}