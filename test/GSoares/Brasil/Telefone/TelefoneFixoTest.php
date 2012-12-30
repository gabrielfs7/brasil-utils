<?php
use \GSoares\Brasil\Telefone\TelefoneInvalidoException;
use \GSoares\Brasil\Telefone\TelefoneFixo;

/**
 * TelefoneFixo test case.
 * 
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class TelefoneFixoTest extends PHPUnit_Framework_TestCase
{
	/**
	 * Tests TelefoneFixo->__construct()
	 * 
	 * @param string $telefone
	 * @dataProvider TelefoneFixoValidoProvider
	 */
	public function testTelefoneFixoValidoNaoLancaExcecao($telefone)
	{
		$telefone = new TelefoneFixo($telefone);
	}
	
	/**
	 * Tests TelefoneFixo->__construct()
	 * 
	 * @param string $telefone
	 * @dataProvider TelefoneFixoInvalidoProvider
	 * @expectedException GSoares\Brasil\Telefone\TelefoneInvalidoException
	 */
	public function testTelefoneFixoInvalidoLancaExcecao($telefone)
	{
		$telefone = new TelefoneFixo($telefone);
	}
	
	/**
	 * Tests Cnpj->formata()
	 */
	public function testObtemSomenteNumeros()
	{
		$telefone = new TelefoneFixo('(48) 3222-2222');
	
		$this->assertEquals($telefone->numero(), '4832222222');
	}
	
	/**
	 * Tests TelefoneFixo->formata()
	 */
	public function testObtemTelefoneFixoFormatado()
	{
		$telefone = new TelefoneFixo('4832222222');
		
		$this->assertEquals($telefone->formata(), '(48) 3222-2222');
	}

	/**
	 * @return string[]
	 */
	public function TelefoneFixoInvalidoProvider()
	{
		return array(
			array('(11) 6622-2222'),
			array('(11) 7622-2222'),
			array('(11) 8622-2222'),
			array('(11) 9622-2222'),
			array('(48) 1622-2222'),
			array('(00) 9922-2222'),
			array('(11) 552-2222'),
			array('115522222')
		);
	}
	
	/**
	 * @return string[]
	 */
	public function TelefoneFixoValidoProvider()
	{
		return array(
			array('(48) 3222-2222'),
			array('(11) 4222-2222'),
			array('11 5522.2222'),
			array('11-5522-2222')
		);
	}
}