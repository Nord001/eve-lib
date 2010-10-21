<?php

require_once 'Zircote/Ccp/Api/Command/Abstract.php';
class Zircote_Ccp_Api_Command_Corp_StarbaseDetail extends Zircote_Ccp_Api_Command_Abstract {
	
	public $path = '/corp/StarbaseDetail.xml.aspx';

	protected $_command = 'StarbaseDetail';
	
	public function _parseResponse($response){
		require_once 'Zircote/Ccp/Api/Result/Corp/StarbaseDetail.php';
		$response = new Zircote_Ccp_Api_Result_Corp_StarbaseDetail($response);
		return $response;
	}
	
	public function _getRequest(){
		$args = array(
			'path' => $this->path,
			'itemID' => $this->_args[0]
		);
		$args = array_merge($args, $this->_api->_api);
		return $args;
	}
	
	public function set_cache_key(){
		$this->_cache_key = md5($this->_command . PATH_SEPARATOR . implode(PATH_SEPARATOR, $this->_getRequest()));
	}
}