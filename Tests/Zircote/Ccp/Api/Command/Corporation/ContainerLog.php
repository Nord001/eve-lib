<?php 


class Tests_Zircote_Ccp_Api_Command_Corporation_ContainerLog 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-12-21 11:18:38</currentTime>
  <result>
    <rowset name="containerLog" key="logTime" columns="logTime,itemID,itemTypeID,actorID,actorName,flag,locationID,action,passwordType,typeID,quantity,oldConfiguration,newConfiguration">
      <row logTime="2008-12-21 08:10:00" itemID="2051471251" itemTypeID="17366" actorID="783037732" actorName="Halo Glory" flag="4" locationID="60011728" action="Set Name" passwordType="" typeID="" quantity="" oldConfiguration="" newConfiguration="" />
      <row logTime="2008-12-21 08:10:00" itemID="2051471251" itemTypeID="17366" actorID="783037732" actorName="Halo Glory" flag="4" locationID="60011728" action="Set Name" passwordType="" typeID="" quantity="" oldConfiguration="" newConfiguration="" />
      <row logTime="2008-12-21 08:09:00" itemID="2051471251" itemTypeID="17366" actorID="783037732" actorName="Halo Glory" flag="4" locationID="60011728" action="Set Password" passwordType="Config" typeID="" quantity="" oldConfiguration="" newConfiguration="" />
      <row logTime="2008-12-21 08:09:00" itemID="2051471251" itemTypeID="17366" actorID="783037732" actorName="Halo Glory" flag="4" locationID="60011728" action="Configure" passwordType="" typeID="" quantity="" oldConfiguration="0" newConfiguration="0" />
      <row logTime="2008-12-21 08:09:00" itemID="2051471251" itemTypeID="17366" actorID="783037732" actorName="Halo Glory" flag="4" locationID="60011728" action="Set Name" passwordType="" typeID="" quantity="" oldConfiguration="" newConfiguration="" />
      <row logTime="2008-12-21 08:08:00" itemID="2051471251" itemTypeID="17366" actorID="783037732" actorName="Halo Glory" flag="4" locationID="60011728" action="Assemble" passwordType="" typeID="" quantity="" oldConfiguration="" newConfiguration="" />
      <row logTime="2008-12-21 08:08:00" itemID="2051188581" itemTypeID="17366" actorID="783037732" actorName="Halo Glory" flag="4" locationID="60011728" action="Set Name" passwordType="" typeID="" quantity="" oldConfiguration="" newConfiguration="" />
      <row logTime="2008-12-21 08:08:00" itemID="2051187917" itemTypeID="17366" actorID="783037732" actorName="Halo Glory" flag="4" locationID="60011728" action="Set Name" passwordType="" typeID="" quantity="" oldConfiguration="" newConfiguration="" />
      <row logTime="2008-12-21 08:07:00" itemID="2051187917" itemTypeID="17366" actorID="783037732" actorName="Halo Glory" flag="4" locationID="60011728" action="Set Name" passwordType="" typeID="" quantity="" oldConfiguration="" newConfiguration="" />
      <row logTime="2008-12-21 08:06:00" itemID="2051187917" itemTypeID="17366" actorID="783037732" actorName="Halo Glory" flag="120" locationID="187407138" action="Set Name" passwordType="" typeID="" quantity="" oldConfiguration="" newConfiguration="" />
      <row logTime="2008-12-21 08:05:00" itemID="2051187917" itemTypeID="17366" actorID="783037732" actorName="Halo Glory" flag="4" locationID="60011728" action="Set Password" passwordType="Config" typeID="" quantity="" oldConfiguration="" newConfiguration="" />
      <row logTime="2008-12-21 08:04:00" itemID="2051187917" itemTypeID="17366" actorID="783037732" actorName="Halo Glory" flag="4" locationID="60011728" action="Assemble" passwordType="" typeID="" quantity="" oldConfiguration="" newConfiguration="" />
      <row logTime="2008-12-21 08:04:00" itemID="2051187917" itemTypeID="17366" actorID="783037732" actorName="Halo Glory" flag="4" locationID="60011728" action="Set Name" passwordType="" typeID="" quantity="" oldConfiguration="" newConfiguration="" />
      <row logTime="2008-12-21 08:04:00" itemID="2051187917" itemTypeID="17366" actorID="783037732" actorName="Halo Glory" flag="4" locationID="60011728" action="Set Name" passwordType="" typeID="" quantity="" oldConfiguration="" newConfiguration="" />
      <row logTime="2008-12-21 08:04:00" itemID="2051187917" itemTypeID="17366" actorID="783037732" actorName="Halo Glory" flag="4" locationID="60011728" action="Configure" passwordType="" typeID="" quantity="" oldConfiguration="0" newConfiguration="0" />
      <row logTime="2008-12-21 08:03:00" itemID="2051188581" itemTypeID="17366" actorID="783037732" actorName="Halo Glory" flag="4" locationID="60011728" action="Configure" passwordType="" typeID="" quantity="" oldConfiguration="0" newConfiguration="0" />
      <row logTime="2008-12-21 08:02:00" itemID="2051188581" itemTypeID="17366" actorID="783037732" actorName="Halo Glory" flag="4" locationID="60011728" action="Configure" passwordType="" typeID="" quantity="" oldConfiguration="4" newConfiguration="0" />
      <row logTime="2008-12-21 08:02:00" itemID="2051188581" itemTypeID="17366" actorID="783037732" actorName="Halo Glory" flag="4" locationID="60011728" action="Set Password" passwordType="Config" typeID="" quantity="" oldConfiguration="" newConfiguration="" />
      <row logTime="2008-12-21 08:02:00" itemID="2051188581" itemTypeID="17366" actorID="783037732" actorName="Halo Glory" flag="4" locationID="60011728" action="Set Password" passwordType="Config" typeID="" quantity="" oldConfiguration="" newConfiguration="" />
      <row logTime="2008-12-21 08:02:00" itemID="2051188581" itemTypeID="17366" actorID="783037732" actorName="Halo Glory" flag="4" locationID="60011728" action="Set Password" passwordType="Config" typeID="" quantity="" oldConfiguration="" newConfiguration="" />
      <row logTime="2008-12-21 08:01:00" itemID="2051188581" itemTypeID="17366" actorID="783037732" actorName="Halo Glory" flag="4" locationID="60011728" action="Configure" passwordType="" typeID="" quantity="" oldConfiguration="0" newConfiguration="4" />
      <row logTime="2008-12-21 08:00:00" itemID="2051188581" itemTypeID="17366" actorID="783037732" actorName="Halo Glory" flag="62" locationID="60011728" action="Assemble" passwordType="" typeID="" quantity="" oldConfiguration="" newConfiguration="" />
      <row logTime="2008-12-21 08:00:00" itemID="2051188581" itemTypeID="17366" actorID="783037732" actorName="Halo Glory" flag="62" locationID="60011728" action="Set Name" passwordType="" typeID="" quantity="" oldConfiguration="" newConfiguration="" />
    </rowset>
  </result>
  <cachedUntil>2008-12-21 14:18:38</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testContainerLog(){
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Corporation/ContainerLog.php';
 		$api = new Zircote_Ccp_Api;
 		$out = $api->setScope('Corp')
 			->ContainerLog();
// 		print_r($out->result);
 	}
}