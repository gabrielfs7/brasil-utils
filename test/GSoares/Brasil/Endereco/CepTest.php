<?php
use \GSoares\Brasil\Endereco\Cep;
use \GSoares\Brasil\Endereco\EnderecoInvalidoException;
use \GSoares\Brasil\Endereco\Uf;

/**
 * Cep test case.
 * 
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class CepTest extends PHPUnit_Framework_TestCase
{
	/**
	 * Tests Cep->__construct()
	 */
	public function test__construct()
	{
		$cep = new Cep('01012345');
		
		$this->assertEquals($cep, '01012-345');
	}
	
	/**
	 * Tests Cep->__construct()
	 * 
	 * @param string $cep
	 * @param string $uf
	 * @dataProvider cepValidoProvider
	 */
	public function testCepValidoNaoLancaExcecao($cep, $uf)
	{
		$cep = new Cep($cep, $uf);
	}
	
	/**
	 * Tests Cep->__construct()
	 * 
	 * @param string $cep
	 * @param string $uf
	 * @dataProvider cepInvalidoProvider
	 * @expectedException GSoares\Brasil\Endereco\EnderecoInvalidoException
	 */
	public function testCepInvalidoLancaExcecao($cep, $uf)
	{
		$cep = new Cep($cep, $uf);
	}
	
	/**
	 * Tests Cep->numero()
	 */
	public function testNumeroCep()
	{
		$cep = new Cep('01012-345');
		
		$this->assertEquals($cep->numero(), '01012345');
	}

	/**
	 * Tests Cep->formata()
	 */
	public function testCepFormatado()
	{
		$cep = new Cep('01012345');
		
		$this->assertEquals($cep->formata(), '01012-345');
	}
	
	/**
	 * @return multitype:multitype:string  
	 */
	public function cepInvalidoProvider()
	{
		return array(
			array('99912345', Uf::SP),
			array('9991234', null),
			array('00988888', null)
		);
	}
	/**
	 * @return multitype:multitype:string  
	 */
	public function cepValidoProvider()
	{
		return array(
			array('01012345', Uf::SP),
			array('19912345', Uf::SP),
		                      
			array('20012345', Uf::RJ),
			array('28912345', Uf::RJ),
		                      
			array('29012345', Uf::ES),
			array('29912345', Uf::ES),
		                      
			array('30012345', Uf::MG),
			array('39912345', Uf::MG),
		                      
			array('40012345', Uf::BA),
			array('48912345', Uf::BA),
		                      
			array('49012345', Uf::SE),
			array('49912345', Uf::SE),
		                      
			array('50012345', Uf::PE),
			array('56912345', Uf::PE),
		                      
			array('57012345', Uf::AL),
			array('57912345', Uf::AL),
		                      
			array('58012345', Uf::PB),
			array('58912345', Uf::PB),
		                      
			array('59012345', Uf::RN),
			array('59912345', Uf::RN),
		                      
			array('60012345', Uf::CE),
			array('63912345', Uf::CE),
		                      
			array('64012345', Uf::PI),
			array('64912345', Uf::PI),
		                      
			array('65012345', Uf::MA),
			array('65912345', Uf::MA),
		                      
			array('66012345', Uf::PA),
			array('68812345', Uf::PA),
		
			array('69012345', Uf::AM),
			array('69212345', Uf::AM),
			array('69412345', Uf::AM),
			array('69812345', Uf::AM),
		
			array('68912345', Uf::AP),
		
			array('69312345', Uf::RR),
		
			array('69912345', Uf::AC),
		
			array('70000000', Uf::DF),
			array('72799999', Uf::DF),

			array('76799999', Uf::GO),
			array('72800000', Uf::GO),

			array('77012345', Uf::TO),
			array('77912345', Uf::TO),
		
			array('78012345', Uf::MT),
			array('78812345', Uf::MT),
		
			array('79012345', Uf::MS),
			array('79912345', Uf::MS),
		
			array('76812345', Uf::RO),
		
			array('80012345', Uf::PR),
			array('87912345', Uf::PR),
		
			array('88012345', Uf::SC),
			array('89912345', Uf::SC),
		
			array('90012345', Uf::RS),
			array('99912345', Uf::RS),
		);
	}
}