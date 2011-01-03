<?php
/**
 * @license Copyright 2010 Robert Allen
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 * http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
require_once 'Zircote/Ccp/Api/Command/Abstract.php';
class Zircote_Ccp_Api_Command_Corp_MemberSecurity extends Zircote_Ccp_Api_Command_Abstract {
	
	public $path = '/corp/MemberSecurity.xml.aspx';

	protected $_command = 'MemberSecurity';
	
	public function _parseResponse($response){
		require_once 'Zircote/Ccp/Api/Result/Corp/MemberSecurity.php';
		$response = new Zircote_Ccp_Api_Result_Corp_MemberSecurity($response);
		return $response;
	}
	
	public function _getRequest(){
		$args = array(
			'path' => $this->path
		);
		$args = array_merge($args, $this->_api->_api);
		return $args;
	}
	
	public function set_cache_key(){
		$this->_cache_key = md5($this->_command . PATH_SEPARATOR . implode(PATH_SEPARATOR, $this->_api->_api));
	}
}