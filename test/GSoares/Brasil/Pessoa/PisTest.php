<?php
use GSoares\Brasil\Pessoa\DocumentoInvalidoException;
use GSoares\Brasil\Pessoa\Pis;

/**
 * Pis test case.
 */
class PisTest extends PHPUnit_Framework_TestCase
{
	/**
	 * Tests Pis->__construct()
	 * 
	 * @param string $pis
	 * @dataProvider pisValidoProvider
	 */
	public function testPisValidoNaoDeveLancarExcecao($pis)
	{
		$pis = new Pis($pis);
	}
	
	/**
	 * Tests Pis->__construct()
	 * 
	 * @param string $pis
	 * @dataProvider pisInvalidoProvider
	 * @expectedException GSoares\Brasil\Pessoa\DocumentoInvalidoException
	 */
	public function testPisInvalidoDeveLancarExcecao($pis)
	{
		$pis = new Pis($pis);
	}

	/**
	 * Tests Pis->numero()
	 */
	public function testNumero()
	{
		$pis = new Pis('125.04389.16-9');
		
		$this->assertEquals($pis->numero(), '12504389169');
	}

	/**
	 * Tests Pis->formata()
	 */
	public function testFormata()
	{
		$pis = new Pis('12504389169');
		
		$this->assertEquals($pis, '125.04389.16-9');
	}
	
	/**
	 * @return string[]
	 */
	public function pisInvalidoProvider()
	{
		return array(
			array('122.08551.72-8'),
			array('AAA.AAAAA.AA-A'),
			array('000.00000.00-0'),
		);
	}
	
	/**
	 * @return string[]
	 */
	public function pisValidoProvider()
	{
		return array(
			array('125.04389.16-9'),
			array('12504389169')
		);
	}
}