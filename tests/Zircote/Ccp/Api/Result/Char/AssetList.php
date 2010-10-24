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

class Tests_Zircote_Ccp_Api_Result_Char_AssetList
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="1">
  <currentTime>2007-12-01 17:55:07</currentTime>
  <result>
    <rowset name="assets" key="itemID" columns="itemID,locationID,typeID,quantity,flag,singleton">
      <row itemID="150354641" locationID="30000380" typeID="11019" quantity="1" flag="0" singleton="1">
        <rowset name="contents" key="itemID" columns="itemID,typeID,quantity,flag,singleton">
          <row itemID="150354709" typeID="16275" quantity="200000" flag="5" singleton="0" />
          <row itemID="150354710" typeID="16272" quantity="150000" flag="5" singleton="0" />
          <row itemID="150354711" typeID="16273" quantity="150000" flag="5" singleton="0" />
          <row itemID="150354712" typeID="24597" quantity="1000" flag="5" singleton="0" />
          <row itemID="150354713" typeID="24596" quantity="1000" flag="5" singleton="0" />
          <row itemID="150354714" typeID="24595" quantity="1000" flag="5" singleton="0" />
          <row itemID="150354715" typeID="24594" quantity="1000" flag="5" singleton="0" />
          <row itemID="150354716" typeID="24593" quantity="1000" flag="5" singleton="0" />
          <row itemID="150354717" typeID="24592" quantity="1000" flag="5" singleton="0" />
          <row itemID="150354718" typeID="16274" quantity="450000" flag="5" singleton="0" />
          <row itemID="150354719" typeID="9848" quantity="1000" flag="5" singleton="0" />
          <row itemID="150354720" typeID="9832" quantity="8000" flag="5" singleton="0" />
          <row itemID="150354721" typeID="3689" quantity="5000" flag="5" singleton="0" />
          <row itemID="150354722" typeID="3683" quantity="25000" flag="5" singleton="0" />
          <row itemID="150354723" typeID="44" quantity="4000" flag="5" singleton="0" />
        </rowset>
      </row>
      <row itemID="150354706" locationID="30001984" typeID="11019" quantity="1" flag="0" singleton="1">
        <rowset name="contents" key="itemID" columns="itemID,typeID,quantity,flag,singleton">
          <row itemID="150354741" typeID="24593" quantity="400" flag="5" singleton="0" />
          <row itemID="150354742" typeID="24592" quantity="400" flag="5" singleton="0" />
          <row itemID="150354755" typeID="16275" quantity="199000" flag="5" singleton="0" />
          <row itemID="150354837" typeID="24597" quantity="400" flag="5" singleton="0" />
          <row itemID="150354838" typeID="24596" quantity="400" flag="5" singleton="0" />
          <row itemID="150354839" typeID="24595" quantity="400" flag="5" singleton="0" />
          <row itemID="150354840" typeID="24594" quantity="400" flag="5" singleton="0" />
          <row itemID="150356329" typeID="14343" quantity="1" flag="5" singleton="0" />
        </rowset>
      </row>
      <row itemID="150212056" locationID="60001078" typeID="25851" quantity="10" flag="4" singleton="0" />
      <row itemID="150212057" locationID="60001078" typeID="20424" quantity="20" flag="4" singleton="0" />
      <row itemID="150212058" locationID="60001078" typeID="20421" quantity="20" flag="4" singleton="0" />
      <row itemID="150357641" locationID="30001984" typeID="23" quantity="1" flag="0" singleton="1">
        <rowset name="contents" key="itemID" columns="itemID,typeID,quantity,flag,singleton">
          <row itemID="150357740" typeID="16275" quantity="9166" flag="0" singleton="0" />
        </rowset>
      </row>
      <row itemID="150212062" locationID="60001078" typeID="944" quantity="1" flag="4" singleton="1" />
      <row itemID="150212063" locationID="60001078" typeID="597" quantity="1" flag="4" singleton="0" />
    </rowset>
  </result>
  <cachedUntil>2007-12-02 16:55:07</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAccountStatus(){
 		require_once 'Zircote/Ccp/Api/Result/Char/AssetList.php';
 		$out = new Zircote_Ccp_Api_Result_Char_AssetList($this->sharedFixture);
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('result', $out->result);
		$this->assertArrayHasKey('assets', $out->result['result']);
		foreach (explode(',','itemID,locationID,typeID,quantity,flag,singleton') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['assets']['150354641']);
			$this->assertArrayHasKey($row, $out->result['result']['assets']['150354706']);
		}
 		$api = $out = null;
 	}
}