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
*/

//������� ������������ ����� ��� ���� �����
function check_required_fields($required_array) {
	$field_errors = array();
	foreach($required_array as $fieldname) {
		if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]) && $_POST[$fieldname] != 0)) { 
			$field_errors[] = $fieldname; 
		}
	}
	return $field_errors;
}

//������� ��� �� ������� ������ ���������� ���� ����� ��� �������� ��� ���� �����
function check_max_field_lengths($field_length_array) {
	$field_errors = array();
	foreach($field_length_array as $fieldname => $maxlength ) {
		if (strlen(trim(mysql_prep($_POST[$fieldname]))) > $maxlength) { $field_errors[] = $fieldname; }
	}
	return $field_errors;
}

//���� ��� �����
function display_errors($error_array) {
	echo "<p class=\"errors\">";
	echo "������������ �� �������� �����:<br />";
	foreach($error_array as $error) {
		echo " - " . $error . "<br />";
	}
	echo "</p>";
}

?>