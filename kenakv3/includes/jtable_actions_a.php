<?php
/* 
jTable 1.5.1
http://www.jtable.org
---------------------------------------------------------------------------
Copyright (C) 2011-2012 by Halil İbrahim Kalkan (http://www.halilibrahimkalkan.com)
Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

try
{
	//Open database connection

	include('connection.php');
	require_once("session.php");

	$pinakas=$_GET["table"];
	$dig=explode("|",$_GET["dig"]);

	//Getting records (listAction)
	if($_GET["action"] == "list")
	{
		//Get record count
		$result = mysql_query("SELECT COUNT(*) AS RecordCount FROM ".$pinakas." WHERE user_id=".$_SESSION['user_id'].";");
		$row = mysql_fetch_array($result);
		$recordCount = $row['RecordCount'];

		//Get records from database
		$result = mysql_query("SELECT * FROM ".$pinakas." WHERE user_id=".$_SESSION['user_id']." LIMIT " . $_GET["jtStartIndex"] . "," . $_GET["jtPageSize"] . ";");
		
		//Add all records to an array
		$rows = array();
		while($row = mysql_fetch_array($result))
		{
			for($f=1;$f<mysql_num_fields($result);$f++){
				if (mysql_field_type($result, $f)!=='string' && mysql_field_type($result, $f)!=='char'){
				$row[mysql_field_name($result, $f)]=number_format($row[mysql_field_name($result, $f)],$dig[$f],".",",");
				}
			}
		    $rows[] = $row;
		}

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['TotalRecordCount'] = $recordCount;
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
	}
	
	
	//Creating a new record (createAction)
	else if($_GET["action"] == "create")
	{
		//Insert record into database
		$result = mysql_query("SELECT * FROM ".$pinakas." WHERE user_id='".$_SESSION['user_id'].";");
		$query_names="";
		for ($f=1;$f<mysql_num_fields($result);$f++){
			$query_names.= mysql_field_name($result, $f);
			if ($f<mysql_num_fields($result)-1) $query_names.=",";
		}
		$query_values="";
		for ($f=1;$f<mysql_num_fields($result);$f++){
			if (mysql_field_type($result, $f)=='string' || mysql_field_type($result, $f)=='char')$query_values.="'";
			$fn=mysql_field_name($result, $f);
			$fn=$_POST["$fn"];
			if (mysql_field_type($result, $f)!=='string' && mysql_field_type($result, $f)!=='char')$fn=floatval($fn);
			if ($f==1){$fn=$_SESSION['user_id'];}
			$query_values .= $fn;
			if (mysql_field_type($result, $f)=='string' || mysql_field_type($result, $f)=='char')$query_values.="'";
			if ($f<mysql_num_fields($result)-1) $query_values.=",";
		}
		$result = mysql_query("INSERT INTO ".$pinakas."(".$query_names.") VALUES(".$query_values."); ");
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM ".$pinakas." WHERE id = LAST_INSERT_ID();");
		$row = mysql_fetch_array($result);

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $row;
		print json_encode($jTableResult);
	}
	//Updating a record (updateAction)
	else if($_GET["action"] == "update")
	{
		$result = mysql_query("SELECT * FROM ".$pinakas." WHERE user_id='".$_SESSION['user_id']."' AND meleti_id=".$_SESSION['meleti_id'].";");
		$query_update="";
		for ($f=1;$f<mysql_num_fields($result);$f++){
			$fn=mysql_field_name($result, $f);
			$query_update .= $fn."=";
			if (mysql_field_type($result, $f)=='string' || mysql_field_type($result, $f)=='char')$query_update.="'";
			$fn=$_POST["$fn"];
			if ($f==1){$fn=$_SESSION['user_id'];}
			$query_update .= $fn;
			if (mysql_field_type($result, $f)=='string' || mysql_field_type($result, $f)=='char')$query_update.="'";
			if ($f<mysql_num_fields($result)-1) $query_update.=",";
		}
		//Update record in database
		$result = mysql_query("UPDATE ".$pinakas." SET ".$query_update." WHERE id = " . $_POST["id"] . ";");
		
		/*
		$handle = fopen('jtable_log.txt','w+');
		fwrite($handle,"<br/>" . "UPDATE ".$pinakas." SET ".$query_update." WHERE id = " . $_POST["id"] . ";");
		*/
		
		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysql_query("DELETE FROM ".$pinakas." WHERE id = " . $_POST["id"] . ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	//Close database connection
	mysql_close($connection);

}
catch(Exception $ex)
{
    //Return error message
	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Message'] = $ex->getMessage();
	print json_encode($jTableResult);
}
	
?>