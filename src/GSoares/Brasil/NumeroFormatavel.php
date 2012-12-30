<?php
namespace GSoares\Brasil;

/**
 * @package Brasil
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
interface NumeroFormatavel
{
	/**
	 * Retorna o valor sem formatação
	 * 
	 * @return string
	 */
	public function numero();

	/**
	 * Retorna o valor formatado
	 * 
	 * @return string
	 */
	public function formata();
}