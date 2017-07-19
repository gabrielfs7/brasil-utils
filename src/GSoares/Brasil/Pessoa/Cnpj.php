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
        if (!$this->possuiNumeroValido($this->cnp)) {
            throw new DocumentoInvalidoException("CNPJ [$this->cnp] é inválido.");
        }
	}

    /**
     * @param $cnpj
     * @return bool
     */
    private function possuiNumeroValido($cnpj)
    {
        if (strlen($cnpj) != 14) {
            return false;
        }

        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj[$i] * $j;

            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto)) {
            return false;
        }

        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    }

    /**
     * @return int
     */
    protected function getQuantidadeNumeros()
    {
        return 14;
    }
}