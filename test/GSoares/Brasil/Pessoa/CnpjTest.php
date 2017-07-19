<?php
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
	 * @dataProvider cnpjValidoProvider
	 */
	public function testCnpjValidoNaoLancaExcecao($cnpj)
	{
		new Cnpj($cnpj);
	}
	
	/**
	 * Tests Cnpj->__construct()
	 * 
	 * @param string $cnpj
	 * @dataProvider cnpjInvalidoProvider
	 * @expectedException GSoares\Brasil\Pessoa\DocumentoInvalidoException
	 */
	public function testCnpjInvalidoLancaExcecao($cnpj)
	{
		new Cnpj($cnpj);
	}
	
	/**
	 * Tests Cnpj->numero()
	 */
	public function testobtemSomenteNumeroCnpj()
	{
		$this->assertEquals((new Cnpj('27.687.164/0001-95'))->numero(), '27687164000195');
	}

	/**
	 * Tests Cnpj->formata()
	 */
	public function testObtemCnpjFormatado()
	{
		$this->assertEquals((new Cnpj('27687164000195'))->formata(), '27.687.164/0001-95');
	}

	/**
	 * @return string[]
	 */
	public function cnpjInvalidoProvider()
	{
		return [
			['99.655.333/1111-99'],
			['99655333111199'],
			['3377758501'],
			['99999999999999'],
			['12312312312332'],
			['11111111111111'],
			['00000000000000'],
		];
	}
	
	/**
	 * @return string[]
	 */
	public function cnpjValidoProvider()
	{
		return [
			['27.687.164/0001-95'],
			['27687164000195'],
			['27/687/164/0001-95'],
			['61.210.534/0001-37'],
            ['23.566.376/0001-63']
		];
	}
}