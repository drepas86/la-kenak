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
���������� ������� ��������� ��� ����                                 *
�������� ��� domika_kelyfos   (function savewall)                     *
                                                                      *
***********************************************************************
*/

	require_once("connection.php");

	$paxh=$_GET["paxh"];
	$wid=$_GET["wid"];
	$fid=$_GET["fid"];
	$u=$_GET["u"];
	$str=$_GET["strwseis"];
	if ($wid>0) $sql = "UPDATE domika_toixoi SET paxh = '$paxh' WHERE id = $wid ";
	if ($fid>0) $sql = "UPDATE domika_floors SET paxh = '$paxh' WHERE id = $fid ";
	mysql_query($sql, $connection);
	if ($wid>0) $sql = "UPDATE domika_toixoi SET strwseis = '$str' WHERE id = $wid ";
	if ($fid>0) $sql = "UPDATE domika_floors SET strwseis = '$str' WHERE id = $fid ";
	mysql_query($sql, $connection);
	if ($wid>0) $sql = "UPDATE domika_toixoi SET u = $u WHERE id = $wid ";
	if ($fid>0) $sql = "UPDATE domika_floors SET u = $u WHERE id = $fid ";
	mysql_query($sql, $connection);
	
?>