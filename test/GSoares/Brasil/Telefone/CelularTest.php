<?php
use \GSoares\Brasil\Telefone\TelefoneInvalidoException;
use \GSoares\Brasil\Telefone\Celular;

/**
 * Celular test case.
 * 
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class CelularTest extends PHPUnit_Framework_TestCase
{
	/**
	 * Tests Celular->__construct()
	 * 
	 * @param string $telefone
	 * @dataProvider celularValidoProvider
	 */
	public function testTelefoneValidoNaoLancaExcecao($telefone)
	{
		$telefone = new Celular($telefone);
	}
	
	/**
	 * Tests Celular->__construct()
	 * 
	 * @param string $telefone
	 * @dataProvider celularInvalidoProvider
	 * @expectedException GSoares\Brasil\Telefone\TelefoneInvalidoException
	 */
	public function testTelefoneInvalidoLancaExcecao($telefone)
	{
		$telefone = new Celular($telefone);
	}
	
	/**
	 * Tests Cnpj->numero()
	 */
	public function testObtemSomenteNumeros()
	{
		$telefone = new Celular('(48) 9999-9999');
	
		$this->assertEquals($telefone->numero(), '4899999999');
	}
	
	/**
	 * Tests Celular->formata()
	 */
	public function testObtemTelefoneFormatado()
	{
		$telefone = new Celular('4899999999');
		
		$this->assertEquals($telefone->formata(), '(48) 9999-9999');
	}

	/**
	 * @return string[]
	 */
	public function celularInvalidoProvider()
	{
		return array(
			array('(11) 8888-8888'),
			array('(11) 88888-8888'),
			array('(48) 5555-8888'),
			array('(48) 4555-8888'),
			array('(48) 3555-8888'),
			array('(48) 2555-8888'),
			array('(48) 1555-8888'),
			array('(00) 9555-8888'),
			array('(48) 98888-8888'),
			array('489999999')
		);
	}
	
	/**
	 * @return string[]
	 */
	public function celularValidoProvider()
	{
		return array(
			array('(11) 98888-8888'),
			array('11988888888'),
			array('4888888888'),
			array('4868888888'),
			array('4878888888')
		);
	}
}