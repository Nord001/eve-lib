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
require_once 'EveLib/EveCentral/Api/Result/Abstract.php';

class EveLib_EveCentral_Api_Result_Evemon extends EveLib_EveCentral_Api_Result_Abstract {

	
	public function parse(SimpleXMLElement $sXml){
		$result = array();
		$result[$sXml->getName()] = array();
			foreach ($sXml as $xml) {
				$result[$sXml->getName()][(string)$xml->name] = (string)$xml->price;
			}
		return $result;
	}
}