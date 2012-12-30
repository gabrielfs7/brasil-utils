<?php
namespace GSoares\Brasil\Telefone;

use \GSoares\Brasil\NumeroFormatavel;

/**
 * Esta classe permite a validação e formatação de telefone celular: 
 * - Validação de DDD
 * - Validação de celular com 9 digitos segundo a nova regulamentação da ANATEL
 * 
 * @package Brasil
 * @subpackage Telefone
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class Celular extends Telefone implements NumeroFormatavel
{
	/* (non-PHPdoc)
	 * @see \GSoares\Brasil\Telefone\NumeroTelefone::valida()
	 */
	protected function valida()
	{
		if (!in_array(substr($this->numeroTelefone, 2, 1), array(6, 7, 8, 9))) {
			throw new TelefoneInvalidoException(
				'Celular ' . $this->numeroTelefone . ' inválido.'
			);
		}
		
		if (in_array($this->DDD(), $this->DDDs11Numeros())) {
			if (strlen($this->numeroTelefone) !== 11) {
				throw new TelefoneInvalidoException(
					'O DDD ' . $this->DDD() . 
					' obriga celular com 11 números.'
				);
			}
			
			if (substr($this->numeroTelefone, 2, 1) != 9) {
				throw new TelefoneInvalidoException(
					'O celular ' . $this->numeroTelefone . 
					'deve começar com 9.'
				);
			}
		}
		
		if (!in_array($this->DDD(), $this->DDDs11Numeros()) && 
			strlen($this->numeroTelefone) !== 10) {
			throw new TelefoneInvalidoException(
				'O DDD ' . $this->DDD() . 
				' obriga celular com 10 números.'
			);
		}
	}
	
	/* (non-PHPdoc)
	 * @see \GSoares\Brasil\Telefone\Telefone::formata()
	*/
	public function formata()
	{
		$x = strlen($this->numeroTelefone) == 11 ? 1 : 0;
	
		return '(' . substr($this->numeroTelefone, 0, 2) . 
			   ') ' . substr($this->numeroTelefone, 2, 4 + $x) . 
			   '-' . substr($this->numeroTelefone, 6 + $x, 4);
	}
	
	/**
	 * Retorna os DDDs que obrigam celular com um número adicional.
	 * 
	 * @return int[]
	 */
	protected function DDDs11Numeros()
	{
		return array(11);
	}
}