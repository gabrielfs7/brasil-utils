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
     * Tests Cpf->_toString()
     */
    public function testMetodoToStringRetornaStringFormatada()
    {
        $cpf = new Cpf('31376875519');
        $this->assertEquals($cpf, '313.768.755-19');
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
            array('155.224.602-70'),
            array('096.928.714-36'),
            array('336.545.434-99'),
            array('154.791.423-80'),
            array('045.222.735-68'),
            array('104.928.286-87'),
            array('377.303.386-96'),
            array('72712836928'),
            array('41962220800'),
            array('12852452103'),
            array('34186634785'),
            array('66516764743'),
            array('86277635697'),
            array('25637277664'),
            array('47059851178'),
            array('93412831409'),
            array('16667390222'),
            array('29225285450'),
            array('04654741526'),
            array('88208811874'),
            array('83274984019'),
            array('91552646033'),
            array('28774589890'),
            array('71861837941'),
            array('13324774705'),
            array('73312739659'),
            array('98888457640'),
            array('16111735314'),
            array('48717623782'),
            array('07923874492'),
            array('37752301060'),
            array('50212779443')
		);
	}
}