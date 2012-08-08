<?php
namespace GSoares\Brasil;

/**
 * @package Brasil
 * @author Gabriel Felipe Soares <gabrielfs7@gmail.com>
 */
interface NumeroFormatavel
{
	/**
	 * Returns non-formatted value
	 * 
	 * @return string
	 */
	public function numero();

	/**
	 * Returns the formatted number
	 * 
	 * @return string
	 */
	public function formata();
}