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

class Tests_Zircote_Ccp_Api_Result_Char_IndustryJobs
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-05-25 20:23:34</currentTime>
  <result>
    <rowset name="jobs" key="jobID" columns="jobID,assemblyLineID,containerID,
            installedItemID,installedItemLocationID,installedItemQuantity,
            installedItemProductivityLevel,installedItemMaterialLevel,
            installedItemLicensedProductionRunsRemaining,outputLocationID,
            installerID,runs,licensedProductionRuns,installedInSolarSystemID,
            containerLocationID,materialMultiplier,charMaterialMultiplier,
            timeMultiplier,charTimeMultiplier,installedItemTypeID,outputTypeID,
            containerTypeID,installedItemCopy,completed,completedSuccessfully,
            installedItemFlag,outputFlag,activityID,completedStatus,installTime,
            beginProductionTime,endProductionTime,pauseProductionTime">
      <row jobID="23264063" assemblyLineID="100518790" containerID="1386493620"
           installedItemID="1002502594" installedItemLocationID="199583646"
           installedItemQuantity="1" installedItemProductivityLevel="12"
           installedItemMaterialLevel="40" installedItemLicensedProductionRunsRemaining="-1"
           outputLocationID="1386493620" installerID="674831735" runs="6"
           licensedProductionRuns="15" installedInSolarSystemID="30005005"
           containerLocationID="30005005" materialMultiplier="1" charMaterialMultiplier="1"
           timeMultiplier="0.65" charTimeMultiplier="1.5" installedItemTypeID="971"
           outputTypeID="971" containerTypeID="28351" installedItemCopy="0" completed="0"
           completedSuccessfully="0" installedItemFlag="121" outputFlag="120" activityID="5"
           completedStatus="0" installTime="2008-05-23 00:38:00"
           beginProductionTime="2008-05-23 00:38:00" endProductionTime="2008-06-08 16:47:00"
           pauseProductionTime="0001-01-01 00:00:00" />
      <row jobID="23174942" assemblyLineID="100185892" containerID="1080588655"
           installedItemID="495277991" installedItemLocationID="199583646"
           installedItemQuantity="1" installedItemProductivityLevel="0"
           installedItemMaterialLevel="40" installedItemLicensedProductionRunsRemaining="-1"
           outputLocationID="1080588655" installerID="674831735" runs="18"
           licensedProductionRuns="0" installedInSolarSystemID="30005005"
           containerLocationID="30005005" materialMultiplier="1" charMaterialMultiplier="1"
           timeMultiplier="0.75" charTimeMultiplier="0.75" installedItemTypeID="979"
           outputTypeID="979" containerTypeID="16216" installedItemCopy="0" completed="0"
           completedSuccessfully="0" installedItemFlag="118" outputFlag="0" activityID="3"
           completedStatus="0" installTime="2008-05-21 00:26:00"
           beginProductionTime="2008-05-21 00:26:00" endProductionTime="2008-06-18 03:26:00"
           pauseProductionTime="2008-05-25 10:04:00" />
      <row jobID="22081247" assemblyLineID="100185897" containerID="1080588655"
           installedItemID="365564655" installedItemLocationID="199583646"
           installedItemQuantity="1" installedItemProductivityLevel="25"
           installedItemMaterialLevel="100" installedItemLicensedProductionRunsRemaining="1500"
           outputLocationID="1080588655" installerID="834605870" runs="1"
           licensedProductionRuns="10" installedInSolarSystemID="30005005"
           containerLocationID="30005005" materialMultiplier="-4" charMaterialMultiplier="1"
           timeMultiplier="-4" charTimeMultiplier="1" installedItemTypeID="2455"
           outputTypeID="2457" containerTypeID="16216" installedItemCopy="1" completed="1"
           completedSuccessfully="0" installedItemFlag="116" outputFlag="4" activityID="8"
           completedStatus="1" installTime="2008-04-27 08:55:00"
           beginProductionTime="2008-04-27 09:54:00" endProductionTime="2008-04-27 10:54:00"
           pauseProductionTime="0001-01-01 00:00:00" />
      <row jobID="14229974" assemblyLineID="105036" containerID="60013150"
           installedItemID="934765261" installedItemLocationID="983232683"
           installedItemQuantity="1" installedItemProductivityLevel="0"
           installedItemMaterialLevel="0" installedItemLicensedProductionRunsRemaining="1"
           outputLocationID="60013150" installerID="834605870" runs="1"
           licensedProductionRuns="0" installedInSolarSystemID="30000190"
           containerLocationID="30000190" materialMultiplier="1" charMaterialMultiplier="1"
           timeMultiplier="1" charTimeMultiplier="0.8" installedItemTypeID="17721"
           outputTypeID="17720" containerTypeID="3865" installedItemCopy="1" completed="1"
           completedSuccessfully="0" installedItemFlag="4" outputFlag="4" activityID="1"
           completedStatus="1" installTime="2007-11-06 05:18:00"
           beginProductionTime="2007-11-06 05:18:00" endProductionTime="2007-11-06 07:58:00"
           pauseProductionTime="0001-01-01 00:00:00" />
    </rowset>
  </result>
  <cachedUntil>2008-05-25 20:38:34</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAccountStatus(){
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Char/IndustryJobs.php';
 		$out = new Zircote_Ccp_Api_Result_Char_IndustryJobs($this->sharedFixture);
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('jobs', $out->result['result']);
		foreach (explode(',','jobID,assemblyLineID,containerID,'.
            'installedItemID,installedItemLocationID,installedItemQuantity,'.
            'installedItemProductivityLevel,installedItemMaterialLevel,'.
            'installedItemLicensedProductionRunsRemaining,outputLocationID,'.
            'installerID,runs,licensedProductionRuns,installedInSolarSystemID,'.
            'containerLocationID,materialMultiplier,charMaterialMultiplier,'.
            'timeMultiplier,charTimeMultiplier,installedItemTypeID,outputTypeID,'.
            'containerTypeID,installedItemCopy,completed,completedSuccessfully,'.
            'installedItemFlag,outputFlag,activityID,completedStatus,installTime,'.
            'beginProductionTime,endProductionTime,pauseProductionTime') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['jobs']['23264063']);
			$this->assertArrayHasKey($row, $out->result['result']['jobs']['23174942']);
			$this->assertArrayHasKey($row, $out->result['result']['jobs']['14229974']);
		}
 		$api = $out = null;
 	}
}