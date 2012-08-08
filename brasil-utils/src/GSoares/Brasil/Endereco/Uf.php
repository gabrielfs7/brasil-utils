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
	 * @param string $uf
	 * @return boolean
	 */
	public static function existe($uf)
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