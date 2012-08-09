<?php
namespace GSoares\Brasil\Pessoa;

use \GSoares\Brasil\NumeroFormatavel;

/**
 * Esta classe permite a validação e formatação do PIS/PASEP.
 *
 * @package Brasil
 * @subpackage Telefone
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class Pis implements NumeroFormatavel
{
	/**
	 *
	 * @var string
	 */
	protected $pis;

	/**
	 *
	 * @param string $pis        	
	 */
	public function __construct($pis)
	{
		$this->setPis($pis);
	}
	
	/*
	 * (non-PHPdoc) @see \GSoares\Brasil\NumeroFormatavel::numero()
	 */
	public function numero()
	{
		return $this->pis;
	}
	
	/*
	 * (non-PHPdoc) @see \GSoares\Brasil\NumeroFormatavel::formata()
	 */
	public function formata()
	{
		return substr($this->pis, 0, 3) . '.' .
			   substr($this->pis, 3, 5) . '.' .
			   substr($this->pis, 8, 2) . '-' .
			   substr($this->pis, 10, 1);
	}

	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->formata();
	}
	
	/**
	 * @param string $pis
	 * @throws DocumentoInvalidoException
	 */
	protected function setPis($pis)
	{
		$pis = preg_replace('/[^0-9]/', '', $pis);
		$pis = str_pad($pis, 11, '0', STR_PAD_LEFT);
		
		if (strlen($pis) == 11 && intval($pis) !== 0) {
			for ($digito = 0, $p = 3, $c = 0; $c < 10; $c++) {
				$digito += $pis[$c] * $p;
				$p  = ($p < 3) ? 9 : --$p;
			}
		
			$digito = ((10 * $digito) % 11) % 10;
		
			if ($pis[$c] == $digito) {
				return;
			}
		}
		
		throw new DocumentoInvalidoException('PIS ' . $pis . ' inválido.');
	}
}