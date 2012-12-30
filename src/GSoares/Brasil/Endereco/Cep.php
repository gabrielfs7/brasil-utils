<?php
namespace GSoares\Brasil\Endereco;

use \GSoares\Brasil\NumeroFormatavel;

/**
 * @package Brasil
 * @subpackage Endereco
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class Cep implements NumeroFormatavel
{
	/**
	 * @var int
	 */
	protected $cep;
	
	/**
	 * @param string $cep
	 * @param string $uf
	 */
	public function __construct($cep, $uf = null)
	{
		$this->cep = preg_replace('/[^0-9]/', '', $cep);
		$this->valida($uf);
	}
	
	/*
	 * (non-PHPdoc) @see \GSoares\Brasil\NumeroFormatavel::numero()
	 */
	public function numero()
	{
		return $this->cep;
	}
	
	/*
	 * (non-PHPdoc) @see \GSoares\Brasil\NumeroFormatavel::formata()
	 */
	public function formata()
	{
		return substr($this->cep, 0, 5) . '-' . substr($this->cep, 5, 3);
	}
	
	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->formata();
	}
	
	/**
	 * @param string $uf
	 * @throws InvalidCepException
	 */
	protected function valida($uf = null)
	{
		if (strlen($this->cep) !== 8) {
			throw new EnderecoInvalidoException(
				'O CEP ' . $this->cep . ' deve conter 8 números.'
			);
		}		
		
		if (substr($this->cep, 0, 3) < 10) {
			throw new EnderecoInvalidoException(
				'CEP ' . $this->cep . ' inválido.'
			);
		}		

		if ($uf !== null) {
			$this->validaUf($uf);
		}
	}
	
	/**
	 * @param string $uf
	 * @throws EnderecoInvalidoException
	 */
	protected function validaUf($uf)
	{
		$ufExiste = new Uf($uf);
		
		$cepIni = substr($this->cep, 0, 3);
		
		if ($uf == Uf::SP && $cepIni >= 10 && $cepIni <= 199) {
			return;
		}
		
		if ($uf == Uf::RJ && $cepIni >= 200 && $cepIni <= 289) {
			return;
		}
		
		if ($uf == Uf::ES && $cepIni >= 290 && $cepIni <= 299) {
			return;
		}
		
		if ($uf == Uf::MG && $cepIni >= 300 && $cepIni <= 399) {
			return;
		}
		
		if ($uf == Uf::BA && $cepIni >= 400 && $cepIni <= 489) {
			return;
		}
		
		if ($uf == Uf::SE && $cepIni >= 490 && $cepIni <= 499) {
			return;
		}
		
		if ($uf == Uf::PE && $cepIni >= 500 && $cepIni <= 569) {
			return;
		}
		
		if ($uf == Uf::AL && $cepIni >= 570 && $cepIni <= 579) {
			return;
		}
		
		if ($uf == Uf::PB && $cepIni >= 580 && $cepIni <= 589) {
			return;
		}
		
		if ($uf == Uf::RN && $cepIni >= 590 && $cepIni <= 599) {
			return;
		}
		
		if ($uf == Uf::CE && $cepIni >= 600 && $cepIni <= 639) {
			return;
		}
		
		if ($uf == Uf::PI && $cepIni >= 640 && $cepIni <= 649) {
			return;
		}
		
		if ($uf == Uf::MA && $cepIni >= 650 && $cepIni <= 659) {
			return;
		}
		
		if ($uf == Uf::PA && $cepIni >= 660 && $cepIni <= 688) {
			return;
		}
		
		if ($uf == Uf::AM && 
			(($cepIni >= 690 && $cepIni <= 692) || 
			($cepIni >= 694 && $cepIni <= 698))) {
			return;
		}
		
		if ($uf == Uf::AP && $cepIni = 689) {
			return;
		}
		
		if ($uf == Uf::RR && $cepIni = 693) {
			return;
		}
		
		if ($uf == Uf::AC && $cepIni = 699) {
			return;
		}
		
		if (in_array($uf, array(Uf::DF, Uf::GO)) && 
			$cepIni >= 700 && $cepIni <= 769) {
			return;
		}
		
		if ($uf == Uf::TO && $cepIni >= 770 && $cepIni <= 779) {
			return;
		}
		
		if ($uf == Uf::MT && $cepIni >= 780 && $cepIni <= 788) {
			return;
		}
		
		if ($uf == Uf::MS && $cepIni >= 790 && $cepIni <= 799) {
			return;
		}
		
		if ($uf == Uf::RO && $cepIni = 789) {
			return;
		}
		
		if ($uf == Uf::PR && $cepIni >= 800 && $cepIni <= 879) {
			return;
		}
		
		if ($uf == Uf::SC && $cepIni >= 880 && $cepIni <= 899) {
			return;
		}
		
		if ($uf == Uf::RS && $cepIni >= 900 && $cepIni <= 999) {
			return;
		}
		
		throw new EnderecoInvalidoException(
			'O CEP ' . $this->cep . ' não pertence ao estado ' . $uf . '.'
		);
	}
}