<?php
namespace GSoares\Brasil\Telefone;

use \GSoares\Brasil\NumeroFormatavel;

/**
 * @package Brasil
 * @subpackage Telefone
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
class TelefoneFixo extends Telefone implements NumeroFormatavel
{
	/* (non-PHPdoc)
	 * @see \GSoares\Brasil\Telefone\NumeroTelefone::valida()
	 */
	protected function valida()
	{
		if (strlen($this->numeroTelefone) !== 10) {
			throw new TelefoneInvalidoException(
				'O telefone ' . $this->numeroTelefone . 
				' deve possuir 10 números.'
			);
		}
		
		if (!in_array(substr($this->numeroTelefone, 2, 1), array(2, 3, 4, 5))) {
			throw new TelefoneInvalidoException(
				'Telefone ' . $this->numeroTelefone . ' inválido.'
			);
		}
	}
	
	/* (non-PHPdoc)
	 * @see \GSoares\Brasil\Telefone\Telefone::formata()
	*/
	public function formata()
	{
		return '(' . substr($this->numeroTelefone, 0, 2) . 
			   ') ' . substr($this->numeroTelefone, 2, 4) . 
			   '-' . substr($this->numeroTelefone, 6, 4);
	}
}