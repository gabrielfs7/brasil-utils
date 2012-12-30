<?php
use \GSoares\Brasil\Endereco\Uf;
use \GSoares\Brasil\Veiculo\Placa;
use \GSoares\Brasil\Veiculo\PlacaInvalidaException;

/**
 * Placa test case.
 *
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class PlacaTest extends PHPUnit_Framework_TestCase
{
	/**
	 * Tests Placa->__construct()
	 * @dataProvider placaCorretaProvider
	 */
	public function testSetaAPlacaSeForCorreta($placa, Uf $uf)
	{
		$objPlaca = new Placa($placa, $uf);
	}
	
	/**
	 * Tests Placa->__construct()
	 * @dataProvider placaIncorretaProvider
	 * @expectedException \GSoares\Brasil\Veiculo\PlacaInvalidaException
	 */
	public function testLancaExcecaoSePlacaForIncorreta($placa, Uf $uf)
	{
		$objPlaca = new Placa($placa, $uf);
	}
	
	/**
	 * Tests Placa->letras()
	 */
	public function testSeRetornaLetrasDaPlaca()
	{
		$objPlaca = new Placa('LWR-1234', new Uf(Uf::SC));
		
		$this->assertEquals('LWR', $objPlaca->letras());
	}
	
	/**
	 * Tests Placa->numeros()
	 */
	public function testSeRetornaNumerosDaPlaca()
	{
		$objPlaca = new Placa('LWR-1234', new Uf(Uf::SC));
		
		$this->assertEquals('1234', $objPlaca->numeros());
	}
	
	/**
	 * Tests Placa->__toString()
	 */
	public function testSeFormataPlaca()
	{
		$objPlaca = new Placa('LWR1234', new Uf(Uf::SC));
		
		$this->assertEquals('LWR-1234', $objPlaca->formata());
	}
	
	/**
	 * Tests Placa->__toString()
	 */
	public function test__toString()
	{
		$objPlaca = new Placa('LWR1234', new Uf(Uf::SC));
		
		$this->assertEquals('LWR-1234', $objPlaca->__toString());
	}
	
	/**
	 * @return array  
	 */
	public function placaCorretaProvider()
	{
		return array(
			array('MZN-1234', new Uf(Uf::AC)),
			array('MUA-1234', new Uf(Uf::AL)),
			array('JWF-1234', new Uf(Uf::AM)),
			array('NEI-1234', new Uf(Uf::AP)),
			array('JKS-1234', new Uf(Uf::BA)),
			array('HTX-1234', new Uf(Uf::CE)),
			array('JDP-1234', new Uf(Uf::DF)),
			array('MOX-1234', new Uf(Uf::ES)),
			array('KAV-1234', new Uf(Uf::GO)),
			array('HOL-1234', new Uf(Uf::MA)),
			array('GKJ-1234', new Uf(Uf::MG)),
			array('HQF-1234', new Uf(Uf::MS)),
			array('JXZ-1234', new Uf(Uf::MT)),
			array('JTA-1234', new Uf(Uf::PA)),
			array('MMN-1234', new Uf(Uf::PB)),
			array('KFD-1234', new Uf(Uf::PE)),
			array('LVF-1234', new Uf(Uf::PI)),
			array('AAA-1234', new Uf(Uf::PR)),
			array('KMF-1234', new Uf(Uf::RJ)),
			array('MXH-1234', new Uf(Uf::RN)),
			array('NBB-1234', new Uf(Uf::RO)),
			array('NAH-1234', new Uf(Uf::RR)),
			array('IAQ-1234', new Uf(Uf::RS)),
			array('LWR-1234', new Uf(Uf::SC)),
			array('HZB-1234', new Uf(Uf::SE)),
			array('BFA-1234', new Uf(Uf::SP)),
			array('MVL-1234', new Uf(Uf::TO)),
			array('NAG-4321', new Uf(Uf::AC)),
			array('MVK-4321', new Uf(Uf::AL)),
			array('JXY-4321', new Uf(Uf::AM)),
			array('NFB-4321', new Uf(Uf::AP)),
			array('JSZ-4321', new Uf(Uf::BA)),
			array('HZA-4321', new Uf(Uf::CE)),
			array('JKR-4321', new Uf(Uf::DF)),
			array('MTZ-4321', new Uf(Uf::ES)),
			array('KFC-4321', new Uf(Uf::GO)),
			array('HQE-4321', new Uf(Uf::MA)),
			array('HOK-4321', new Uf(Uf::MG)),
			array('HTW-4321', new Uf(Uf::MS)),
			array('KAU-4321', new Uf(Uf::MT)),
			array('JWE-4321', new Uf(Uf::PA)),
			array('MOW-4321', new Uf(Uf::PB)),
			array('KME-4321', new Uf(Uf::PE)),
			array('LWQ-4321', new Uf(Uf::PI)),
			array('BEZ-4321', new Uf(Uf::PR)),
			array('LVE-4321', new Uf(Uf::RJ)),
			array('MZM-0000', new Uf(Uf::RN)),
			array('NEH-0123', new Uf(Uf::RO)),
			array('NBA-4321', new Uf(Uf::RR)),
			array('JDO-4321', new Uf(Uf::RS)),
			array('MMM-4321', new Uf(Uf::SC)),
			array('IAP-9999', new Uf(Uf::SE)),
			array('GKI-4321', new Uf(Uf::SP)),
			array('MXG-4321', new Uf(Uf::TO)),
			array('MXG4321', new Uf(Uf::TO))
		);
	}
	
	/**
	 * @return array  
	 */
	public function placaIncorretaProvider()
	{
		return array(
			array('MZN-1234', new Uf(Uf::AL)),
			array('MUA-1234', new Uf(Uf::AC)),
			array('234-1234', new Uf(Uf::AM)),
			array('A23-1234', new Uf(Uf::AP)),
			array('A23-AAAA', new Uf(Uf::AP)),
			array('AAA-AAAA', new Uf(Uf::AP)),
			array('AAA-AAAA', new Uf(Uf::AP))
		);
	}
}