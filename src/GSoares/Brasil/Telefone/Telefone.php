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
		return array(11, 12, 13, 14, 15, 16, 17, 18, 19, 21, 22, 24, 27, 28, 31, 
					32, 33, 34, 35, 37, 38, 41, 42, 43, 44, 45, 46, 47, 48, 49, 
					51, 53, 54, 55, 61, 62, 63, 64, 65, 66, 67, 68, 69, 71, 73, 
					74, 75, 77, 79, 81, 82, 83, 84, 85, 86, 87, 88, 89, 91, 92, 
					93, 94, 95, 96, 97, 98, 99); 
	}
	
	/**
	 * validas de Telefone number 
	 */
	abstract protected function valida();
}