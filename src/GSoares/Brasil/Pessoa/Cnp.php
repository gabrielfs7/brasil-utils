<?php
namespace GSoares\Brasil\Pessoa;

use \GSoares\Brasil\NumeroFormatavel;

/**
 * @package Brasil
 * @subpackage Pessoa
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
abstract class Cnp implements NumeroFormatavel
{
	/**
	 * @var string
	 */
	protected $cnp;
	
	/**
	 * @param string $cnp
	 */
	public function __construct($cnp)
	{
		$this->cnp = preg_replace('/[^0-9]/', '', $cnp);

        $this->validaNumerosConhecidos();
		$this->valida();
	}
	
	/*
	 * (non-PHPdoc) @see \GSoares\Brasil\Pessoa\Cnp::numero()
	 */
	public function numero()
	{
		return $this->cnp;
	}
	
	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->formata();
	}

    /**
     * @throws DocumentoInvalidoException
     */
    private function validaNumerosConhecidos()
    {
        if (strlen($this->cnp) !== $this->getQuantidadeNumeros()) {
            throw new DocumentoInvalidoException("CPF/CNPJ {$this->cnp} deve ter 11 ou 14 caracteres.");
        }

        $regex = "/^" . $this->cnp[0] . "{" . $this->getQuantidadeNumeros() . "}$/";

        if (strlen($this->cnp) != $this->getQuantidadeNumeros() || preg_match($regex, $this->cnp)) {
            throw new DocumentoInvalidoException(sprintf('%s %s inválido.', get_class($this), $this->cnp));
        }
    }

    /**
     * @throws DocumentoInvalidoException
     */
    protected abstract function valida();

    /**
     * @return int
     */
    protected abstract function getQuantidadeNumeros();
}