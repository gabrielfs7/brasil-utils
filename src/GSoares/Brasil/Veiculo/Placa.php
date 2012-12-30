<?php
namespace GSoares\Brasil\Veiculo;

use \GSoares\Brasil\Endereco\Uf;
use \GSoares\Brasil\NumeroFormatavel;

/**
 * Classe base para validação de placas de carros. A validação pode ser feita 
 * apenas respeitando a máscara ou validando também se a placa pertence a um 
 * estado específico. Lembrando que é possível que eu possa comprar letras
 * personalidas para um carro, ou seja, com sequencias diferentes das da UF.
 * 
 * @package Brasil
 * @subpackage Veiculo
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class Placa
{
	/**
	 * @var string
	 */
	protected $placa;
	
	/**
	 * @param string $placa
	 * @param \GSoares\Brasil\Endereco\Uf Opcional, apenas se quiser validar se a placa pertece ao estado
	 * @throws \GSoares\Brasil\Veiculo\PlacaInvalidaException
	 */
	public function __construct($placa, Uf $uf = null)
	{
		$placa = preg_replace('/[^A-Z0-9]/', '', strtoupper($placa));
		
		if (!preg_match('/^[A-Z]{3}[0-9]{4}/', $placa)) {
			throw new PlacaInvalidaException(
				'Placa ' . $placa . ' do veículo é inválida'		
			);
		}
		
		if ($uf !== null) {
			$this->validaPlacaPorUf($placa, $uf);
		}
		
		$this->placa = $placa;
	}
	
	/**
	 * @return string
	 */
	public function formata()
	{
		return $this->letras() . '-' . $this->numeros();
	}
	
	/**
	 * @return string
	 */
	public function letras()
	{
		return substr($this->placa, 0, 3);
	}
	
	/**
	 * @return int
	 */
	public function numeros()
	{
		return intval(substr($this->placa, 3, 4));
	}
	
	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->formata();
	}
	
	/**
	 * @param string $placa
	 * @param Uf $uf
	 * @throws \GSoares\Brasil\Veiculo\PlacaInvalidaException
	 */
	protected function validaPlacaPorUf($placa, Uf $uf)
	{
		$limite = $this->limitePorEstado($uf);
		$letras = substr($placa, 0, 3);
		
		for ($i = 0; $i < 3; $i++) {
			if (!in_array($letras[$i], range($limite[0][$i], $limite[1][$i]))) {
				throw new PlacaInvalidaException(
					'As letras ' . $this->letras() . 
					' da placa ' . $placa . 
					' do veículo não pertendecem ao estado ' . $uf->getUf()
				);
			}
		}
	}
	
	/**
	 * @param Uf $uf
	 * @return string[]
	 */
	protected function limitePorEstado(Uf $uf)
	{
		$limites = $this->limitesEstados();
		
		return $limites[$uf->getUf()]; 
	}
	
	/**
	 * @return string[]  
	 */
	protected function limitesEstados()
	{
		return array(
			Uf::AC => array('MZN', 'NAG'),
			Uf::AL => array('MUA', 'MVK'),
			Uf::AM => array('JWF', 'JXY'),
			Uf::AP => array('NEI', 'NFB'),
			Uf::BA => array('JKS', 'JSZ'),
			Uf::CE => array('HTX', 'HZA'),
			Uf::DF => array('JDP', 'JKR'),
			Uf::ES => array('MOX', 'MTZ'),
			Uf::GO => array('KAV', 'KFC'),
			Uf::MA => array('HOL', 'HQE'),
			Uf::MG => array('GKJ', 'HOK'),
			Uf::MS => array('HQF', 'HTW'),
			Uf::MT => array('JXZ', 'KAU'),
			Uf::PA => array('JTA', 'JWE'),
			Uf::PB => array('MMN', 'MOW'),
			Uf::PE => array('KFD', 'KME'),
			Uf::PI => array('LVF', 'LWQ'),
			Uf::PR => array('AAA', 'BEZ'),
			Uf::RJ => array('KMF', 'LVE'),
			Uf::RN => array('MXH', 'MZM'),
			Uf::RO => array('NBB', 'NEH'),
			Uf::RR => array('NAH', 'NBA'),
			Uf::RS => array('IAQ', 'JDO'),
			Uf::SC => array('LWR', 'MMM'),
			Uf::SE => array('HZB', 'IAP'),
			Uf::SP => array('BFA', 'GKI'),
			Uf::TO => array('MVL', 'MXG')
		);
	}
}