<?php
namespace GSoares\Brasil\Telefone;

use \GSoares\Brasil\NumeroFormatavel;

/**
 * @package Brasil
 * @subpackage Telefone
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
abstract class Telefone implements NumeroFormatavel
{
	/**
	 * @var string
	 */
	protected $numeroTelefone;
	
	/**
	 * @param string $number
	 */
	public function __construct($number)
	{
		$this->setNumero($number);
		$this->valida();
	}
	
	/**
	 * @return string
	 */
	public function DDD()
	{
		return substr($this->numeroTelefone, 0, 2);
	}
	
	/* (non-PHPdoc)
	 * @see \GSoares\Brasil\Telefone\Telefone::numero()
	 */
	public function numero()
	{
		return $this->numeroTelefone;
	}
	
	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->formata();
	}
	
	/**
	 * @param string $number
	 */
	protected function setNumero($NumeroTelefone)
	{
		$number =  preg_replace('/[^0-9]/', '', $NumeroTelefone);
		
		if (!in_array(strlen($number), array(10, 11))) {
			throw new TelefoneInvalidoException(
				'O fone ' . $NumeroTelefone . ' deve possuir 10 ou 11 números.'
			);
		}
		
		$this->numeroTelefone = $number;
		
		if (!in_array($this->DDD(), $this->DDDsValidos())) {
			throw new TelefoneInvalidoException(
				'DDD ' . $this->DDD() . ' não existe.'
			);
		}
	}
	
	
	/**
	 * @return int[] 
	 */
	protected function DDDsValidos()
	{
		return array(48, 49, 11);
	}
	
	/**
	 * validas de Telefone number 
	 */
	abstract protected function valida();
}