<?php 

require_once 'Zircote/Ccp/Api/Command/Abstract.php';

/**
 * @todo args: ids	 string	 Comma-separated list of character IDs to query
 * Enter description here ...
 * @author zircote
 *
 */
class Zircote_Ccp_Api_Command_Eve_CharacterName extends Zircote_Ccp_Api_Command_Abstract {
	public $path = '/eve/CharacterName.xml.aspx';

	protected $_command = 'CharacterName';
	
	public function _parseResponse($response){
		require_once 'Zircote/Ccp/Api/Result/Eve/CharacterName.php';
		$response = new Zircote_Ccp_Api_Result_Eve_CharacterName($response);
		return $response;
	}
	
	public function _getRequest(){
		return array();	
	}
	
	public function set_cache_key(){
		$this->_cache_key = md5($this->_command);
	}
}