<?php
/*
Copyright (C) 2012 - Labros KENAK v.1.0 
Author: Labros Karoyntzos 

Labros KENAK v.1.0 from Labros Karountzos is free software: 
you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, version 3 of the License.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License version 3
along with this program.  If not, see http://www.gnu.org/licenses/gpl-3.0.html.

�� ����� �� ��� �������� Labros KENAK v.1.0. �� ��������� ��� ������ ���������
�������� ������������ info@chem-lab.gr www.chem-lab.gr
����� ������ ���������. �������� �� �� ������������� ��� ��������������� ��� ����
����� ��� ������ GNU General Public License ���� ������� ��� �� Free Software Foundation
���� ������ 3 ����� ��� ������.
�� ����� ������ ������ �� ��������� �� ���� ���� �� �������� � �������� ����� ���� �� �������.

***********************************************************************
tsak mods - ������ �������� - ��������� ��������� - ktsaki@tee.gr     *
                                                                      *
���������� ������ ����������                                          *
�������� ��� domika_kelyfos   (javascript function save_an)           *
                                                                      *
***********************************************************************
*/

	require_once("connection.php");

	$record=$_GET["record"];
	$t=explode("@",$record);
	
	$temp = mysql_query("SELECT COUNT(*) FROM domika_anoigmata WHERE name='".$t[0]."'", $connection);
	$total = mysql_fetch_row($temp);

	if ($total[0]==0) {
		mysql_query("INSERT INTO domika_anoigmata (name,rec) VALUES ('".$t[0]."','".$t[1]."') ", $connection);
	}else{
		$temp = mysql_query("SELECT * FROM domika_anoigmata WHERE name='".$t[0]."'", $connection);
		while($row = mysql_fetch_array($temp))
		{
			$aid=$row['id'];
			mysql_query("UPDATE domika_anoigmata SET rec = '".$t[1]."' WHERE id = ".$aid, $connection);
		}
	}

	
?>