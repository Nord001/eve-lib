<?php

/**
 * 
 * 
 * @author zircote
 *
 */
class Zircote_Ccp_Api_Result_Abstract {

	public $xml;
	public $result;
	
	public function __construct($xml = null){
		if($xml){
			$this->loadXML($xml);
		} 
	}
	
	public function loadXML($xml){
			$this->xml = $xml;
			;
			if(!$sXml = simplexml_load_string($this->xml)){
				require_once 'Zircote/Ccp/Api/Exception.php';
				throw new Zircote_Ccp_Api_Exception('failed to load valid XML EVE-API Endpoint may be down', 500);
				return;
			}else {
			}
			$result = $this->parse($sXml);
			if(key_exists('error',$result['eveapi'])){
				extract($result['eveapi']['error']);
				require_once 'Zircote/Ccp/Api/Exception.php';
				throw new Zircote_Ccp_Api_Exception($text, $code);
			}
			$this->result = $result['eveapi'];
	}
	
	public function parse(SimpleXMLElement $sXml){
		$result = array();
		switch ($sXml->getName()) {
			case 'rowset':
				$result = $this->rowset($sXml);
			break;
			
			case 'row':
				$result = $this->row($sXml);
			break;
			
			case 'error':
				$result = $this->error($sXml);
			break;
			
			default:
				$result[$sXml->getName()] = array();
				if($sXml->count()){
					foreach ($sXml as $xml) {
						$rs = $this->parse($xml);
						$result[$sXml->getName()] = array_merge($result[$sXml->getName()], $rs);
					}
				} else {
					$result[$sXml->getName()] = (string) $sXml;
				}
				if(count($attr = $this->attr($sXml))){
					foreach ($attr as $key => $value) {
						$result[$sXml->getName()][$key] = $value;
					}
				}
			break;
		}
		return $result;
	}

	public function error($sXml){
		$result = array($sXml->getName() => null);
		foreach ($sXml->attributes() as $name => $attr) {
			$result[$sXml->getName()][$name] = (string) $attr;
		}
		$result[$sXml->getName()]['text'] = (string) $sXml;
		return $result;
	}
	
	public function row($sXml){
		if($sXml->count()){
			$result = $this->attr($sXml);
			foreach ($sXml->children() as $child){
				$r = $this->parse($child);
				$result = array_merge($result, $r);
			}
		} else {
			$result = $this->attr($sXml);
		}
		return $result;
	}
	
	public function rowset($sXml){
		$result = array();
		$result['meta'] = $this->attr($sXml);
		$key_name = $result['meta']['name'];
		$index_key = key_exists('key', $result['meta']) ? $result['meta']['key'] : 0;
		$result[$key_name] = array();
		foreach ($sXml->children() as $child) {
			$ch = $this->parse($child);
			$idx = is_numeric($index_key) ? $index_key++ : $ch[$index_key];
			$result[$key_name][$idx] = $ch;
		}
		unset($result['meta']);
		return $result;
	}
	
	public function attr($sXml){
		$result = array();
		foreach ($sXml->attributes() as $name => $attr) {
			$result[(string) $name] = (string) $attr;
		}
		return $result;
	}
	
	public function __wakeup(){
		$this->loadXML($this->xml);
	}
}