<?php
namespace GSoares\Brasil\Endereco;

/**
 * @package Brasil
 * @subpackage Endereco
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class Uf
{
	/**
	 * @var string
	 */
	const SP = 'SP';
	
	/**
	 * @var string
	 */
	const RJ = 'RJ';
	
	/**
	 * @var string
	 */
	const ES = 'ES';
	
	/**
	 * @var string
	 */
	const MG = 'MG';
	
	/**
	 * @var string
	 */
	const BA = 'BA';
	
	/**
	 * @var string
	 */
	const SE = 'SE';
	
	/**
	 * @var string
	 */
	const PE = 'PE';
	
	/**
	 * @var string
	 */
	const AL = 'AL';
	
	/**
	 * @var string
	 */
	const PB = 'PB';
	
	/**
	 * @var string
	 */
	const RN = 'RN';
	
	/**
	 * @var string
	 */
	const CE = 'CE';
	
	/**
	 * @var string
	 */
	const PI = 'PI';
	
	/**
	 * @var string
	 */
	const MA = 'MA';
	
	/**
	 * @var string
	 */
	const PA = 'PA';
	
	/**
	 * @var string
	 */
	const AM = 'AM';
	
	/**
	 * @var string
	 */
	const AP = 'AP';
	
	/**
	 * @var string
	 */
	const RR = 'RR';
	
	/**
	 * @var string
	 */
	const AC = 'AC';
	
	/**
	 * @var string
	 */
	const DF = 'DF';
	
	/**
	 * @var string
	 */
	const GO = 'GO';
	
	/**
	 * @var string
	 */
	const TO = 'TO';
	
	/**
	 * @var string
	 */
	const MT = 'MT';
	
	/**
	 * @var string
	 */
	const MS = 'MS';
	
	/**
	 * @var string
	 */
	const RO = 'RO';
	
	/**
	 * @var string
	 */
	const PR = 'PR';
	
	/**
	 * @var string
	 */
	const SC = 'SC';
	
	/**
	 * @var string
	 */
	const RS = 'RS';
	
	/**
	 * @var string
	 */
	protected $uf;
	
	/**
	 * @param string $uf
     * @throws EnderecoInvalidoException
	 */
	public function __construct($uf)
	{
		if (!$this->existe($uf)) {
			throw new EnderecoInvalidoException('A UF ' . $uf . ' não existe');
		}
		
		$this->uf = $uf;
	}
	
	/**
	 * @return string
	 */
	public function getUf()
	{
		return $this->uf;
	}

    /**
     * @param $cep
     * @return string
     * @throws EnderecoInvalidoException
     */
    public static function getUfPorCep($cep)
    {
        foreach (Cep::getIntervalosDeCep() as $uf => $intervalos) {
            foreach ($intervalos as $ceps) {
                $prefixoCep = substr($cep, 0, 3);
                $prefixoInicial = substr($ceps[0], 0, 3);
                $prefixoFinal = substr($ceps[1], 0, 3);

                if ($prefixoCep >= $prefixoInicial && $prefixoCep <= $prefixoFinal) {
                    return $uf;
                }
            }
        }

        throw new EnderecoInvalidoException('O CEP ' . $cep . ' não pertence a nenhum estado.');
    }

	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->uf;
	}
	
	/**
	 * @param string $uf
	 * @return boolean
	 */
	protected function existe($uf)
	{
		$ufs = array(
			self::SP,
			self::RJ,
			self::ES,
			self::MG,
			self::BA,
			self::SE,
			self::PE,
			self::AL,
			self::PB,
			self::RN,
			self::CE,
			self::PI,
			self::MA,
			self::PA,
			self::AM,
			self::AP,
			self::RR,
			self::AC,
			self::DF,
			self::GO,
			self::TO,
			self::MT,
			self::MS,
			self::RO,
			self::PR,
			self::SC,
			self::RS
		);
		
		return in_array($uf, $ufs);
	}
}