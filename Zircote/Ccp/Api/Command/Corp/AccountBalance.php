<?php

require_once 'Zircote/Ccp/Api/Command/Abstract.php';
class Zircote_Ccp_Api_Command_Corp_AccountBalance extends Zircote_Ccp_Api_Command_Abstract {
	
	public $path = '/corp/AccountBalance.xml.aspx';

	protected $_command = 'AccountBalance';
	
	public function _parseResponse($response){
		require_once 'Zircote/Ccp/Api/Result/Corp/AccountBalance.php';
		$response = new Zircote_Ccp_Api_Result_Corp_AccountBalance($response);
		return $response;
	}
	
	public function _getRequest(){
		return array_merge($this->_api->api, array('path' => $this->path));
	}
	
	public function set_cache_key(){
		$this->_cache_key = md5($this->_command . PATH_SEPARATOR . implode(PATH_SEPARATOR, $this->_api->api));
	}
}