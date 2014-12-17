<?php
namespace GSoares\Brasil\Endereco;

use \GSoares\Brasil\NumeroFormatavel;

/**
 * @package Brasil
 * @subpackage Endereco
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class Cep implements NumeroFormatavel
{
	/**
	 * @var int
	 */
	protected $cep;
	
	/**
	 * @param string $cep
	 * @param string $uf
	 */
	public function __construct($cep, $uf = null)
	{
		$this->cep = preg_replace('/[^0-9]/', '', $cep);
		$this->valida($uf);
	}
	
	/*
	 * (non-PHPdoc) @see \GSoares\Brasil\NumeroFormatavel::numero()
	 */
	public function numero()
	{
		return $this->cep;
	}
	
	/*
	 * (non-PHPdoc) @see \GSoares\Brasil\NumeroFormatavel::formata()
	 */
	public function formata()
	{
		return substr($this->cep, 0, 5) . '-' . substr($this->cep, 5, 3);
	}
	
	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->formata();
	}

    /**
     * @param string $uf
     * @return array
     * @throws EnderecoInvalidoException
     */
    public static function getIntervalosDeCepPorUf($uf)
    {
        $ufs = self::getIntervalosDeCep();

        if (isset($ufs[$uf])) {
            return $ufs[$uf];
        }

        throw new EnderecoInvalidoException('A uf ' . $uf . ' não existe.');
    }

    /**
     * @return array
     * @throws EnderecoInvalidoException
     */
    public static function getIntervalosDeCep()
    {
        return [
            UF::AC => [
                [69900000, 69999999]
            ],
            Uf::AL => [
                [57000000, 57999999]
            ],
            Uf::AM => [
                [69000000, 69299999],
                [69400000, 69899999]
            ],
            Uf::AP => [
                [68900000, 68999999]
            ],
            Uf::BA => [
                [40000000, 48999999]
            ],
            Uf::CE => [
                [60000000, 63999999]
            ],
            Uf::DF => [
                [70000000, 72799999],
                [73000000, 73699999]
            ],
            Uf::ES => [
                [29000000, 29999999]
            ],
            Uf::GO => [
                [72800000, 72999999],
                [73700000, 76799999]
            ],
            Uf::MA => [
                [65000000, 65999999]
            ],
            Uf::MG => [
                [30000000, 39999999]
            ],
            Uf::MS => [
                [79000000, 79999999]
            ],
            Uf::MT => [
                [78000000, 78899999]
            ],
            Uf::PA => [
                [66000000, 68899999]
            ],
            Uf::PB => [
                [58000000, 58999999]
            ],
            Uf::PE => [
                [50000000, 56999999]
            ],
            Uf::PI => [
                [64000000, 64999999]
            ],
            Uf::PR => [
                [80000000, 87999999]
            ],
            Uf::RJ => [
                [20000000, 28999999]
            ],
            Uf::RN => [
                [59000000, 59999999]
            ],
            Uf::RO => [
                [76800000, 76999999]
            ],
            Uf::RR => [
                [69300000, 69399999]
            ],
            Uf::RS => [
                [90000000, 99999999]
            ],
            Uf::SC => [
                [88000000, 89999999]
            ],
            Uf::SE => [
                [49000000, 49999999]
            ],
            Uf::SP => [
                ['01000000', 19999999]
            ],
            Uf::TO => [
                [77000000, 77999999]
            ]
        ];
    }

	/**
	 * @param string $uf
	 * @throws EnderecoInvalidoException
	 */
	protected function valida($uf = null)
	{
		if (strlen($this->cep) !== 8) {
			throw new EnderecoInvalidoException(
				'O CEP ' . $this->cep . ' deve conter 8 números.'
			);
		}		
		
		if (substr($this->cep, 0, 3) < 10) {
			throw new EnderecoInvalidoException(
				'CEP ' . $this->cep . ' inválido.'
			);
		}		

		if ($uf !== null) {
			$this->validaUf($uf);
		}
	}

	/**
	 * @param string $uf
	 * @throws EnderecoInvalidoException
	 */
	protected function validaUf($uf)
	{
        if (Uf::getUfPorCep($this->cep) !== $uf) {
            throw new EnderecoInvalidoException(
                'O CEP ' . $this->cep . ' não pertence ao estado ' . $uf . '.'
            );
        };
	}
}