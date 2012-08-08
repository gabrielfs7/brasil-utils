<?php
use \GSoares\Brasil\Pessoa\CnpInvalidoException;
use \GSoares\Brasil\Pessoa\Cnpj;

/**
 * Cnpj test case.
 * 
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class CnpjTest extends PHPUnit_Framework_TestCase
{
	/**
	 * Tests Cnpj->__construct()
	 * 
	 * @param string $cnpj
	 * @dataProvider CnpjValidoProvider
	 */
	public function testCnpjValidoNaoLancaExcecao($cnpj)
	{
		$cnpj = new Cnpj($cnpj);
	}
	
	/**
	 * Tests Cnpj->__construct()
	 * 
	 * @param string $cnpj
	 * @dataProvider CnpjInvalidoProvider
	 * @expectedException GSoares\Brasil\Pessoa\CnpInvalidoException
	 */
	public function testCnpjInvalidoLancaExcecao($cnpj)
	{
		$cnpj = new Cnpj($cnpj);
	}
	
	/**
	 * Tests Cnpj->numero()
	 */
	public function testobtemSomenteNumeroCnpj()
	{
		$cnpj = new Cnpj('27.687.164/0001-95');
		
		$this->assertEquals($cnpj->numero(), '27687164000195');
	}
	
	/**
	 * Tests Cnpj->formata()
	 */
	public function testObtemCnpjFormatado()
	{
		$cnpj = new Cnpj('27687164000195');
		
		$this->assertEquals($cnpj->formata(), '27.687.164/0001-95');
	}

	/**
	 * @return string[]
	 */
	public function CnpjInvalidoProvider()
	{
		return array(
			array('99.655.333/1111-99'),
			array('99655333111199'),
			array('3377758501'),
			array('99999999999999')
		);
	}
	
	/**
	 * @return string[]
	 */
	public function CnpjValidoProvider()
	{
		return array(
			array('27.687.164/0001-95'),
			array('27687164000195'),
			array('27/687/164/0001-95')
		);
	}
}