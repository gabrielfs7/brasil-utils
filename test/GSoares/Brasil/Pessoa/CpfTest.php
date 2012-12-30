<?php
use \GSoares\Brasil\Pessoa\DocumentoInvalidoException;
use \GSoares\Brasil\Pessoa\Cpf;

/**
 * Cpf test case.
 * 
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class CpfTest extends PHPUnit_Framework_TestCase
{
	/**
	 * Tests Cpf->__construct()
	 * 
	 * @param string $cpf
	 * @dataProvider CpfValidoProvider
	 */
	public function testCpfValidoNaoLancaExcecao($cpf)
	{
		$cpf = new Cpf($cpf);
	}
	
	/**
	 * Tests Cpf->__construct()
	 * 
	 * @param string $cpf
	 * @dataProvider CpfInvalidoProvider
	 * @expectedException GSoares\Brasil\Pessoa\DocumentoInvalidoException
	 */
	public function testCpfInvalidoLancaExcecao($cpf)
	{
		$cpf = new Cpf($cpf);
	}
	
	/**
	 * Tests Cnpj->numero()
	 */
	public function testObtemSomenteNumeros()
	{
		$cpf = new Cpf('313.768.755-19');
	
		$this->assertEquals($cpf->numero(), '31376875519');
	}
	
	/**
	 * Tests Cpf->formata()
	 */
	public function testObtemCpfFormatado()
	{
		$cpf = new Cpf('31376875519');
		
		$this->assertEquals($cpf->formata(), '313.768.755-19');
	}

	/**
	 * @return string[]
	 */
	public function CpfInvalidoProvider()
	{
		return array(
			array('777.999.788-99'),
			array('77799978899'),
			array('99999999999'),
			array('313768755'),
		);
	}
	
	/**
	 * @return string[]
	 */
	public function CpfValidoProvider()
	{
		return array(
			array('313.768.755-19'),
			array('31376875519'),
			array('313.768.755/19'),
		);
	}
}