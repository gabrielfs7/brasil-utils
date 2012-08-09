<?php
namespace GSoares\Brasil\Pessoa;

use \GSoares\Brasil\NumeroFormatavel;

/**
 * Atenção: Não existe um padrão para formatação do RG. A formatação bem como o
 * digito verificador variam de acordo com o estado. Esta classe apenas valida 
 * a quantidade de caracteres e se os mesmos são permitidos.
 * 
 * @package Brasil
 * @subpackage Pessoa
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class Rg implements NumeroFormatavel
{
	/**
	 * @var string
	 */
	protected $rg;
	
	/**
	 * @var string
	 */
	protected $numeroRg;
	
	/**
	 * @param string $rg
	 */
	public function __construct($rg)
	{
		$this->setRg($rg);
	}
	
	/*
	 * (non-PHPdoc) @see \GSoares\Brasil\NumeroFormatavel::numero()
	 */
	public function numero()
	{
		return $this->numeroRg;
	}
	
	/*
	 * (non-PHPdoc) @see \GSoares\Brasil\NumeroFormatavel::formata()
	 */
	public function formata()
	{
		return $this->rg;
	}
	
	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->formata();
	}
	
	/**
	 * @param string $rg
	 * @throws DocumentoInvalidoException
	 */
	protected function setRg($rg)
	{
		$numero = preg_replace('/[^0-9]/', '', $rg);
		$rgLimpo = preg_replace('/[^0-9-a-zA-Z\.-]/', '', $rg);
		
		if (strlen($numero) < 7 || strlen($numero) > 9) {
			throw new DocumentoInvalidoException('Rg ' . $rg . ' inválido.');
		}
		
		if (strlen($rg) > 15) {
			throw new DocumentoInvalidoException('Rg ' . $rg . ' inválido.');
		}
		
		if (preg_match('/[a-zA-Z]{3,}/', $rgLimpo)) {
			throw new DocumentoInvalidoException('Rg ' . $rg . ' inválido.');
		}
		
		$this->rg = $rgLimpo;
		$this->numeroRg = $numero;
	}
}