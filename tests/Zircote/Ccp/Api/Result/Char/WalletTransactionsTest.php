<?php 


/**
 * 
 * Enter description here ...
 * @author zircote
 * 
 * @example
 *
 * $api = new Zircote_Ccp_Api(AllTests::$config);
 * $out = $api->setScope('Char')
 * 		->WalletTransactions($beforeTransID);
 *
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
class Zircote_Ccp_Api_Result_Char_WalletTransactionsTest
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version="1.0" encoding="UTF-8"?>
<eveapi version="2">
   <currentTime>2010-01-08 20:31:52</currentTime>
   <result>
      <rowset name="transactions" key="transactionID" columns="transactionDateTime,transactionID,quantity,typeName,typeID,price,clientID,clientName,stationID,stationName,transactionType,transactionFor">
         <row  transactionDateTime="2010-02-07 03:34:00" transactionID="1309776438" quantity="1"
               typeName="Information Warfare" typeID="20495" price="34101.06"
               clientID="1034922339" clientName="Elthana" stationID="60003760"
               stationName="Jita IV - Moon 4 - Caldari Navy Assembly Plant"
               transactionType="buy" transactionFor="personal" />
         <row  transactionDateTime="2010-02-05 17:47:00" transactionID="1307711508" quantity="1"
               typeName="Wing Result" typeID="11574" price="1169939.97"
               clientID="1979235241" clientName="Daeja synn" stationID="60015027"
               stationName="Uitra VI - Moon 4 - State War Academy School"
               transactionType="buy" transactionFor="personal" />
         <row  transactionDateTime="2010-02-02 18:28:00" transactionID="1304203159" quantity="2"
               typeName="Skirmish Warfare" typeID="3349" price="13012.01"
               clientID="275581519" clientName="SPAIDERKA" stationID="60003760"
               stationName="Jita IV - Moon 4 - Caldari Navy Assembly Plant"
               transactionType="buy" transactionFor="personal" />
         <row  transactionDateTime="2010-02-02 06:56:00" transactionID="1303713416" quantity="1"
               typeName="Skirmish Warfare" typeID="3349" price="13012.01"
               clientID="686507146" clientName="Jin Sutai" stationID="60003760"
               stationName="Jita IV - Moon 4 - Caldari Navy Assembly Plant"
               transactionType="buy" transactionFor="personal" />
         <row  transactionDateTime="2010-02-02 01:03:00" transactionID="1303450901" quantity="2"
               typeName="Skirmish Warfare" typeID="3349" price="13012.01"
               clientID="1043005854" clientName="Flash EF" stationID="60003760"
               stationName="Jita IV - Moon 4 - Caldari Navy Assembly Plant"
               transactionType="buy" transactionFor="personal" />
         <row  transactionDateTime="2010-01-29 21:27:00" transactionID="1299019978" quantity="6"
               typeName="Heavy Missile Launcher II" typeID="2410" price="556001.01"
               clientID="838771896" clientName="Sax Man" stationID="60002362"
               stationName="Airaken IV - Moon 1 - Lai Dai Corporation Warehouse"
               transactionType="buy" transactionFor="personal" />
         <row  transactionDateTime="2010-01-29 15:45:00" transactionID="1298649939" quantity="1"
               typeName="Heavy Missile Launcher II" typeID="2410" price="556001.01"
               clientID="1703231064" clientName="Der Suchende" stationID="60004369"
               stationName="Ohmahailen V - Moon 7 - Corporate Police Force Assembly Plant"
               transactionType="buy" transactionFor="personal" />
         </rowset>
   </result>
   <cachedUntil>2010-01-08 20:46:47</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @group Zircote_Ccp_Api_Result_Char
 	 */
 	public function testAccountStatus(){
 		require_once 'Zircote/Ccp/Api/Result/Char/WalletTransactions.php';
 		$out = new Zircote_Ccp_Api_Result_Char_WalletTransactions($this->sharedFixture);
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('transactions', $out->result['result']);
		foreach (explode(',','transactionDateTime,transactionID,quantity,typeName,typeID,price,clientID,clientName,stationID,stationName,transactionType,transactionFor') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['transactions']['1309776438']);
			$this->assertArrayHasKey($row, $out->result['result']['transactions']['1307711508']);
			$this->assertArrayHasKey($row, $out->result['result']['transactions']['1304203159']);
			$this->assertArrayHasKey($row, $out->result['result']['transactions']['1298649939']);
		}
 		$api = $out = null;
 	}
}