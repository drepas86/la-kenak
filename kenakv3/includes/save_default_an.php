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
Tsak mods - ������ �������� - ��������� ��������� - ktsaki@tee.gr     *
                                                                      *
���������� ��������� ���������� �������                               *
�������� ��� domika_kelyfos   (javascript function save_default)      *
                                                                      *
***********************************************************************
*/

	require_once("connection.php");
	require_once("session.php");

	$record=$_GET["record"];
	$t=explode("|",$record);
	mysql_query("UPDATE kataskeyi_an_s SET plaisio = '".$t[0]."' WHERE user_id=".$_SESSION['user_id']." AND meleti_id=".$_SESSION['meleti_id']);
	mysql_query("UPDATE kataskeyi_an_s SET ukoyf = '".$t[1]."' WHERE user_id=".$_SESSION['user_id']." AND meleti_id=".$_SESSION['meleti_id']);
	mysql_query("UPDATE kataskeyi_an_s SET platos = '".$t[2]."' WHERE user_id=".$_SESSION['user_id']." AND meleti_id=".$_SESSION['meleti_id']);
	mysql_query("UPDATE kataskeyi_an_s SET pane = '".$t[3]."' WHERE user_id=".$_SESSION['user_id']." AND meleti_id=".$_SESSION['meleti_id']);
	mysql_query("UPDATE kataskeyi_an_s SET upane = '".$t[4]."' WHERE user_id=".$_SESSION['user_id']." AND meleti_id=".$_SESSION['meleti_id']);
	
	
?>