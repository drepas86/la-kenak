<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2011 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2011 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.7.6, 2011-02-27
 */

 
 //Below there is the statement of modifications to this file and this file only from the PHPExcel Library distributed under the LGPL Lisence
 //which is being included in the distribution Labros Kenak v.1.0
 //This is mandatory by the lisence of PHPExcel. Also if a user wants a way of doing the exact same thing with another php excel library 
 //one can do this by changing the include_once("kenak_excel.php"); line inside the file apotelesmata_kenak.php. 
 //This is to check that a user having this distributed software can use another library other than PHPExcel.
 //This file is included in apotelesmata_kenak.php and in this file only. 
 //This file was modified in 15-January 2012 to get variables from a calculation and use PHPExcel to store them in an excel file 
 //Το αρχείο αυτό τροποποιήθηκε στις 15-Ιανουαρίου-2012 για να δέχεται τιμές από υπολογισμό και να αποθηκεύει ένα αρχείο excel σε OPENXML format
 //Εαν αλλάξετε την κατάληξη του αρχείου xlsx μετά από ένα υπολογισμό ΚΕΝΑΚ σε zip θα παρατηρήσετε και την μορφή του φακέλου. 
 
/* Λάθη */
error_reporting(E_ALL);

date_default_timezone_set('Europe/Athens');

/* αρχείο php excel. Επειδή αυτό το αρχείο δεν τρέχει από το φάκελο apotelesmata και περιλαμβάνεται στο kenak.php που βρίσκεται στη βάση "/" χρησιμοποιώ διαδρομή από τη βάση. */
require_once 'includes/PHPExcel.php';


// Νεο phpexcel
echo "<br/><br/>" . date('H:i:s') . " Δημιουργία αρχείου αδιαφανών από την PHPExcel\n";
$objPHPExcel = new PHPExcel();

//Αντίγραφο του πρώτου στυλ φύλλου σε ένα 2ο όπου θα προστεθούν μετά τα διαφανή.
$objWorkSheetBase = $objPHPExcel->getSheet();
$objWorkSheet1 = clone $objWorkSheetBase;
$objWorkSheet1->setTitle('Cloned Sheet');
$objPHPExcel->addSheet($objWorkSheet1);

// Set properties
echo "<br/>" . date('H:i:s') . " Set properties\n";
$objPHPExcel->getProperties()->setCreator("kenak")
							 ->setLastModifiedBy("kenak")
							 ->setTitle("Office 2007 XLSX kenak Document")
							 ->setSubject("Office 2007 XLSX kenak Document")
							 ->setDescription("kenak document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("kenak result file");


// Προσθήκη δεδομένων. Εδώ λείπουν οι μασίφ πόρτες οι οποίες βρίσκονται στο 2ο φύλλο
echo "<br/>" . date('H:i:s') . " Προστέθηκαν τα δεδομένα\n";

$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Περιγραφή');
$objPHPExcel->getActiveSheet()->setCellValue('C1', 'γ(deg)');
$objPHPExcel->getActiveSheet()->setCellValue('D1', 'β(deg)');
$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Εμβαδόν (m2)');
$objPHPExcel->getActiveSheet()->setCellValue('F1', 'U (W/m2K)');
$objPHPExcel->getActiveSheet()->setCellValue('G1', 'a(-)');
$objPHPExcel->getActiveSheet()->setCellValue('H1', 'ε(-)');
$objPHPExcel->getActiveSheet()->setCellValue('I1', 'F_hor_h (-)');
$objPHPExcel->getActiveSheet()->setCellValue('J1', 'F_hor_c (-)');
$objPHPExcel->getActiveSheet()->setCellValue('K1', 'F_ov_h (-)');
$objPHPExcel->getActiveSheet()->setCellValue('L1', 'F_ov_c (-)');
$objPHPExcel->getActiveSheet()->setCellValue('M1', 'F_fin_h (-)');
$objPHPExcel->getActiveSheet()->setCellValue('N1', 'F_fin_c (-)');

for ($i = 1; $i <= $t_boreia; $i++) {
$b_keli_excel_toixos = "B".($i+1);
$c_keli_excel_toixos = "C".($i+1);
$d_keli_excel_toixos = "D".($i+1);
$e_keli_excel_toixos = "E".($i+1);
$f_keli_excel_toixos = "F".($i+1);
$timi_b_keli_excel_toixos = "ΤΟΙΧΟΣ Τ-Β".$i;
$timi_c_keli_excel_toixos = "0";
$timi_d_keli_excel_toixos = "90";
$timi_e_keli_excel_toixos = ${"epifaneia_dromikoy_b".$i};
$timi_f_keli_excel_toixos = ${"u_b".$i};
$b_keli_excel_dokos = "B".($i+$t_boreia+1);
$c_keli_excel_dokos = "C".($i+$t_boreia+1);
$d_keli_excel_dokos = "D".($i+$t_boreia+1);
$e_keli_excel_dokos = "E".($i+$t_boreia+1);
$f_keli_excel_dokos = "F".($i+$t_boreia+1);
$timi_b_keli_excel_dokos = "ΔΟΚΟΣ-ΥΠΟΣΤΥΛΩΜΑ-Τ-Β".$i;
$timi_c_keli_excel_dokos = "0";
$timi_d_keli_excel_dokos = "90";
$timi_e_keli_excel_dokos = ${"epifaneia_dokos_b".$i}+${"epifaneia_ypost_b".$i};
$timi_f_keli_excel_dokos = ${"u_dok_b".$i};
$b_keli_excel_syr = "B".($i+$t_boreia*2+1);
$c_keli_excel_syr = "C".($i+$t_boreia*2+1);
$d_keli_excel_syr = "D".($i+$t_boreia*2+1);
$e_keli_excel_syr = "E".($i+$t_boreia*2+1);
$f_keli_excel_syr = "F".($i+$t_boreia*2+1);
$timi_b_keli_excel_syr = "ΤΟΙΧΟΣ-ΣΥΡΟΜΕΝΩΝ-Τ-Β".$i;
$timi_c_keli_excel_syr = "0";
$timi_d_keli_excel_syr = "90";
$timi_e_keli_excel_syr = ${"epifaneia_toixoy_syr_b".$i};
$timi_f_keli_excel_syr = ${"u_syr_b".$i};
$objPHPExcel->getActiveSheet()->setCellValue($b_keli_excel_toixos, $timi_b_keli_excel_toixos);
$objPHPExcel->getActiveSheet()->setCellValue($c_keli_excel_toixos, $timi_c_keli_excel_toixos);
$objPHPExcel->getActiveSheet()->setCellValue($d_keli_excel_toixos, $timi_d_keli_excel_toixos);
$objPHPExcel->getActiveSheet()->setCellValue($e_keli_excel_toixos, $timi_e_keli_excel_toixos);
$objPHPExcel->getActiveSheet()->setCellValue($f_keli_excel_toixos, $timi_f_keli_excel_toixos);
$objPHPExcel->getActiveSheet()->setCellValue($b_keli_excel_dokos, $timi_b_keli_excel_dokos);
$objPHPExcel->getActiveSheet()->setCellValue($c_keli_excel_dokos, $timi_c_keli_excel_dokos);
$objPHPExcel->getActiveSheet()->setCellValue($d_keli_excel_dokos, $timi_d_keli_excel_dokos);
$objPHPExcel->getActiveSheet()->setCellValue($e_keli_excel_dokos, $timi_e_keli_excel_dokos);
$objPHPExcel->getActiveSheet()->setCellValue($f_keli_excel_dokos, $timi_f_keli_excel_dokos);
$objPHPExcel->getActiveSheet()->setCellValue($b_keli_excel_syr, $timi_b_keli_excel_syr);
$objPHPExcel->getActiveSheet()->setCellValue($c_keli_excel_syr, $timi_c_keli_excel_syr);
$objPHPExcel->getActiveSheet()->setCellValue($d_keli_excel_syr, $timi_d_keli_excel_syr);
$objPHPExcel->getActiveSheet()->setCellValue($e_keli_excel_syr, $timi_e_keli_excel_syr);
$objPHPExcel->getActiveSheet()->setCellValue($f_keli_excel_syr, $timi_f_keli_excel_syr);
}

for ($i = 1; $i <= $t_anatolika; $i++) {
$b_keli_excel_toixos = "B".($i+$t_boreia*3+1);
$c_keli_excel_toixos = "C".($i+$t_boreia*3+1);
$d_keli_excel_toixos = "D".($i+$t_boreia*3+1);
$e_keli_excel_toixos = "E".($i+$t_boreia*3+1);
$f_keli_excel_toixos = "F".($i+$t_boreia*3+1);
$timi_b_keli_excel_toixos = "ΤΟΙΧΟΣ Τ-A".$i;
$timi_c_keli_excel_toixos = "90";
$timi_d_keli_excel_toixos = "90";
$timi_e_keli_excel_toixos = ${"epifaneia_dromikoy_a".$i};
$timi_f_keli_excel_toixos = ${"u_a".$i};
$b_keli_excel_dokos = "B".($i+$t_boreia*3+$t_anatolika+1);
$c_keli_excel_dokos = "C".($i+$t_boreia*3+$t_anatolika+1);
$d_keli_excel_dokos = "D".($i+$t_boreia*3+$t_anatolika+1);
$e_keli_excel_dokos = "E".($i+$t_boreia*3+$t_anatolika+1);
$f_keli_excel_dokos = "F".($i+$t_boreia*3+$t_anatolika+1);
$timi_b_keli_excel_dokos = "ΔΟΚΟΣ-ΥΠΟΣΤΥΛΩΜΑ-Τ-A".$i;
$timi_c_keli_excel_dokos = "90";
$timi_d_keli_excel_dokos = "90";
$timi_e_keli_excel_dokos = ${"epifaneia_dokos_a".$i}+${"epifaneia_ypost_a".$i};
$timi_f_keli_excel_dokos = ${"u_dok_a".$i};
$b_keli_excel_syr = "B".($i+$t_boreia*3+$t_anatolika*2+1);
$c_keli_excel_syr = "C".($i+$t_boreia*3+$t_anatolika*2+1);
$d_keli_excel_syr = "D".($i+$t_boreia*3+$t_anatolika*2+1);
$e_keli_excel_syr = "E".($i+$t_boreia*3+$t_anatolika*2+1);
$f_keli_excel_syr = "F".($i+$t_boreia*3+$t_anatolika*2+1);
$timi_b_keli_excel_syr = "ΤΟΙΧΟΣ ΣΥΡΟΜΕΝΩΝ Τ-A".$i;
$timi_c_keli_excel_syr = "90";
$timi_d_keli_excel_syr = "90";
$timi_e_keli_excel_syr = ${"epifaneia_toixoy_syr_a".$i};
$timi_f_keli_excel_syr = ${"u_syr_a".$i};
$objPHPExcel->getActiveSheet()->setCellValue($b_keli_excel_toixos, $timi_b_keli_excel_toixos);
$objPHPExcel->getActiveSheet()->setCellValue($c_keli_excel_toixos, $timi_c_keli_excel_toixos);
$objPHPExcel->getActiveSheet()->setCellValue($d_keli_excel_toixos, $timi_d_keli_excel_toixos);
$objPHPExcel->getActiveSheet()->setCellValue($e_keli_excel_toixos, $timi_e_keli_excel_toixos);
$objPHPExcel->getActiveSheet()->setCellValue($f_keli_excel_toixos, $timi_f_keli_excel_toixos);
$objPHPExcel->getActiveSheet()->setCellValue($b_keli_excel_dokos, $timi_b_keli_excel_dokos);
$objPHPExcel->getActiveSheet()->setCellValue($c_keli_excel_dokos, $timi_c_keli_excel_dokos);
$objPHPExcel->getActiveSheet()->setCellValue($d_keli_excel_dokos, $timi_d_keli_excel_dokos);
$objPHPExcel->getActiveSheet()->setCellValue($e_keli_excel_dokos, $timi_e_keli_excel_dokos);
$objPHPExcel->getActiveSheet()->setCellValue($f_keli_excel_dokos, $timi_f_keli_excel_dokos);
$objPHPExcel->getActiveSheet()->setCellValue($b_keli_excel_syr, $timi_b_keli_excel_syr);
$objPHPExcel->getActiveSheet()->setCellValue($c_keli_excel_syr, $timi_c_keli_excel_syr);
$objPHPExcel->getActiveSheet()->setCellValue($d_keli_excel_syr, $timi_d_keli_excel_syr);
$objPHPExcel->getActiveSheet()->setCellValue($e_keli_excel_syr, $timi_e_keli_excel_syr);
$objPHPExcel->getActiveSheet()->setCellValue($f_keli_excel_syr, $timi_f_keli_excel_syr);
}

for ($i = 1; $i <= $t_notia; $i++) {
$b_keli_excel_toixos = "B".($i+$t_boreia*3+$t_anatolika*3+1);
$c_keli_excel_toixos = "C".($i+$t_boreia*3+$t_anatolika*3+1);
$d_keli_excel_toixos = "D".($i+$t_boreia*3+$t_anatolika*3+1);
$e_keli_excel_toixos = "E".($i+$t_boreia*3+$t_anatolika*3+1);
$f_keli_excel_toixos = "F".($i+$t_boreia*3+$t_anatolika*3+1);
$timi_b_keli_excel_toixos = "ΤΟΙΧΟΣ Τ-N".$i;
$timi_c_keli_excel_toixos = "180";
$timi_d_keli_excel_toixos = "90";
$timi_e_keli_excel_toixos = ${"epifaneia_dromikoy_n".$i};
$timi_f_keli_excel_toixos = ${"u_n".$i};
$b_keli_excel_dokos = "B".($i+$t_boreia*3+$t_anatolika*3+$t_notia+1);
$c_keli_excel_dokos = "C".($i+$t_boreia*3+$t_anatolika*3+$t_notia+1);
$d_keli_excel_dokos = "D".($i+$t_boreia*3+$t_anatolika*3+$t_notia+1);
$e_keli_excel_dokos = "E".($i+$t_boreia*3+$t_anatolika*3+$t_notia+1);
$f_keli_excel_dokos = "F".($i+$t_boreia*3+$t_anatolika*3+$t_notia+1);
$timi_b_keli_excel_dokos = "ΔΟΚΟΣ-ΥΠΟΣΤΥΛΩΜΑ-Τ-N".$i;
$timi_c_keli_excel_dokos = "180";
$timi_d_keli_excel_dokos = "90";
$timi_e_keli_excel_dokos = ${"epifaneia_dokos_n".$i}+${"epifaneia_ypost_n".$i};
$timi_f_keli_excel_dokos = ${"u_dok_n".$i};
$b_keli_excel_syr = "B".($i+$t_boreia*3+$t_anatolika*3+$t_notia*2+1);
$c_keli_excel_syr = "C".($i+$t_boreia*3+$t_anatolika*3+$t_notia*2+1);
$d_keli_excel_syr = "D".($i+$t_boreia*3+$t_anatolika*3+$t_notia*2+1);
$e_keli_excel_syr = "E".($i+$t_boreia*3+$t_anatolika*3+$t_notia*2+1);
$f_keli_excel_syr = "F".($i+$t_boreia*3+$t_anatolika*3+$t_notia*2+1);
$timi_b_keli_excel_syr = "ΤΟΙΧΟΣ ΣΥΡΟΜΕΝΩΝ Τ-N".$i;
$timi_c_keli_excel_syr = "180";
$timi_d_keli_excel_syr = "90";
$timi_e_keli_excel_syr = ${"epifaneia_toixoy_syr_n".$i};
$timi_f_keli_excel_syr = ${"u_syr_n".$i};
$objPHPExcel->getActiveSheet()->setCellValue($b_keli_excel_toixos, $timi_b_keli_excel_toixos);
$objPHPExcel->getActiveSheet()->setCellValue($c_keli_excel_toixos, $timi_c_keli_excel_toixos);
$objPHPExcel->getActiveSheet()->setCellValue($d_keli_excel_toixos, $timi_d_keli_excel_toixos);
$objPHPExcel->getActiveSheet()->setCellValue($e_keli_excel_toixos, $timi_e_keli_excel_toixos);
$objPHPExcel->getActiveSheet()->setCellValue($f_keli_excel_toixos, $timi_f_keli_excel_toixos);
$objPHPExcel->getActiveSheet()->setCellValue($b_keli_excel_dokos, $timi_b_keli_excel_dokos);
$objPHPExcel->getActiveSheet()->setCellValue($c_keli_excel_dokos, $timi_c_keli_excel_dokos);
$objPHPExcel->getActiveSheet()->setCellValue($d_keli_excel_dokos, $timi_d_keli_excel_dokos);
$objPHPExcel->getActiveSheet()->setCellValue($e_keli_excel_dokos, $timi_e_keli_excel_dokos);
$objPHPExcel->getActiveSheet()->setCellValue($f_keli_excel_dokos, $timi_f_keli_excel_dokos);
$objPHPExcel->getActiveSheet()->setCellValue($b_keli_excel_syr, $timi_b_keli_excel_syr);
$objPHPExcel->getActiveSheet()->setCellValue($c_keli_excel_syr, $timi_c_keli_excel_syr);
$objPHPExcel->getActiveSheet()->setCellValue($d_keli_excel_syr, $timi_d_keli_excel_syr);
$objPHPExcel->getActiveSheet()->setCellValue($e_keli_excel_syr, $timi_e_keli_excel_syr);
$objPHPExcel->getActiveSheet()->setCellValue($f_keli_excel_syr, $timi_f_keli_excel_syr);
}

for ($i = 1; $i <= $t_dytika; $i++) {
$b_keli_excel_toixos = "B".($i+$t_boreia*3+$t_anatolika*3+$t_notia*3+1);
$c_keli_excel_toixos = "C".($i+$t_boreia*3+$t_anatolika*3+$t_notia*3+1);
$d_keli_excel_toixos = "D".($i+$t_boreia*3+$t_anatolika*3+$t_notia*3+1);
$e_keli_excel_toixos = "E".($i+$t_boreia*3+$t_anatolika*3+$t_notia*3+1);
$f_keli_excel_toixos = "F".($i+$t_boreia*3+$t_anatolika*3+$t_notia*3+1);
$timi_b_keli_excel_toixos = "ΤΟΙΧΟΣ Τ-Δ".$i;
$timi_c_keli_excel_toixos = "270";
$timi_d_keli_excel_toixos = "90";
$timi_e_keli_excel_toixos = ${"epifaneia_dromikoy_d".$i};
$timi_f_keli_excel_toixos = ${"u_d".$i};
$b_keli_excel_dokos = "B".($i+$t_boreia*3+$t_anatolika*3+$t_notia*3+$t_dytika+1);
$c_keli_excel_dokos = "C".($i+$t_boreia*3+$t_anatolika*3+$t_notia*3+$t_dytika+1);
$d_keli_excel_dokos = "D".($i+$t_boreia*3+$t_anatolika*3+$t_notia*3+$t_dytika+1);
$e_keli_excel_dokos = "E".($i+$t_boreia*3+$t_anatolika*3+$t_notia*3+$t_dytika+1);
$f_keli_excel_dokos = "F".($i+$t_boreia*3+$t_anatolika*3+$t_notia*3+$t_dytika+1);
$timi_b_keli_excel_dokos = "ΔΟΚΟΣ-ΥΠΟΣΤΥΛΩΜΑ-Τ-Δ".$i;
$timi_c_keli_excel_dokos = "270";
$timi_d_keli_excel_dokos = "90";
$timi_e_keli_excel_dokos = ${"epifaneia_dokos_d".$i}+${"epifaneia_ypost_d".$i};
$timi_f_keli_excel_dokos = ${"u_dok_d".$i};
$b_keli_excel_syr = "B".($i+$t_boreia*3+$t_anatolika*3+$t_notia*3+$t_dytika*2+1);
$c_keli_excel_syr = "C".($i+$t_boreia*3+$t_anatolika*3+$t_notia*3+$t_dytika*2+1);
$d_keli_excel_syr = "D".($i+$t_boreia*3+$t_anatolika*3+$t_notia*3+$t_dytika*2+1);
$e_keli_excel_syr = "E".($i+$t_boreia*3+$t_anatolika*3+$t_notia*3+$t_dytika*2+1);
$f_keli_excel_syr = "F".($i+$t_boreia*3+$t_anatolika*3+$t_notia*3+$t_dytika*2+1);
$timi_b_keli_excel_syr = "ΤΟΙΧΟΣ ΣΥΡΟΜΕΝΩΝ Τ-Δ".$i;
$timi_c_keli_excel_syr = "270";
$timi_d_keli_excel_syr = "90";
$timi_e_keli_excel_syr = ${"epifaneia_toixoy_syr_d".$i};
$timi_f_keli_excel_syr = ${"u_syr_d".$i};
$objPHPExcel->getActiveSheet()->setCellValue($b_keli_excel_toixos, $timi_b_keli_excel_toixos);
$objPHPExcel->getActiveSheet()->setCellValue($c_keli_excel_toixos, $timi_c_keli_excel_toixos);
$objPHPExcel->getActiveSheet()->setCellValue($d_keli_excel_toixos, $timi_d_keli_excel_toixos);
$objPHPExcel->getActiveSheet()->setCellValue($e_keli_excel_toixos, $timi_e_keli_excel_toixos);
$objPHPExcel->getActiveSheet()->setCellValue($f_keli_excel_toixos, $timi_f_keli_excel_toixos);
$objPHPExcel->getActiveSheet()->setCellValue($b_keli_excel_dokos, $timi_b_keli_excel_dokos);
$objPHPExcel->getActiveSheet()->setCellValue($c_keli_excel_dokos, $timi_c_keli_excel_dokos);
$objPHPExcel->getActiveSheet()->setCellValue($d_keli_excel_dokos, $timi_d_keli_excel_dokos);
$objPHPExcel->getActiveSheet()->setCellValue($e_keli_excel_dokos, $timi_e_keli_excel_dokos);
$objPHPExcel->getActiveSheet()->setCellValue($f_keli_excel_dokos, $timi_f_keli_excel_dokos);
$objPHPExcel->getActiveSheet()->setCellValue($b_keli_excel_syr, $timi_b_keli_excel_syr);
$objPHPExcel->getActiveSheet()->setCellValue($c_keli_excel_syr, $timi_c_keli_excel_syr);
$objPHPExcel->getActiveSheet()->setCellValue($d_keli_excel_syr, $timi_d_keli_excel_syr);
$objPHPExcel->getActiveSheet()->setCellValue($e_keli_excel_syr, $timi_e_keli_excel_syr);
$objPHPExcel->getActiveSheet()->setCellValue($f_keli_excel_syr, $timi_f_keli_excel_syr);
}


// Αλλαγή ονόματος του φύλλου 1
echo "<br/>" . date('H:i:s') . " Άλλαξε το όνομα του φύλου σε ΤΕΕ-ΑΔΙΑΦΑΝΗ\n";
$objPHPExcel->getActiveSheet()->setTitle('TEE-ADIAFANI');



//Ενεργό το 2ο φύλλο
$objPHPExcel->setActiveSheetIndex(1);

//τίτλοι
$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Περιγραφή');
$objPHPExcel->getActiveSheet()->setCellValue('C1', 'γ(deg)');
$objPHPExcel->getActiveSheet()->setCellValue('D1', 'β(deg)');
$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Εμβαδόν (m2)');
$objPHPExcel->getActiveSheet()->setCellValue('F1', 'U (W/m2K)');
$objPHPExcel->getActiveSheet()->setCellValue('G1', 'a(-)');
$objPHPExcel->getActiveSheet()->setCellValue('H1', 'ε(-)');
$objPHPExcel->getActiveSheet()->setCellValue('I1', 'F_hor_h (-)');
$objPHPExcel->getActiveSheet()->setCellValue('J1', 'F_hor_c (-)');
$objPHPExcel->getActiveSheet()->setCellValue('K1', 'F_ov_h (-)');
$objPHPExcel->getActiveSheet()->setCellValue('L1', 'F_ov_c (-)');
$objPHPExcel->getActiveSheet()->setCellValue('M1', 'F_fin_h (-)');
$objPHPExcel->getActiveSheet()->setCellValue('N1', 'F_fin_c (-)');

//ανοιγματα Β
for ($i = 1; $i <= $t_boreia; $i++) { // για κάθε βόρειο τοίχο
	for ($j = 1; $j <= $anoig_t_boreia; $j++) { //και για κάθε άνοιγμα σε κάθε βόρειο τοίχο
	$z=$anoig_t_boreia*($i-1)+$j+1;
	$keli_b_anoig = "B".$z;
	$keli_c_anoig = "C".$z;
	$keli_d_anoig = "D".$z;
	$keli_e_anoig = "E".$z;
	$keli_f_anoig = "F".$z;
	$keli_p_anoig = "P".$z;
	$timi_b_anoig =  "Άνοιγμα Τ-Β" . $i . "-" . $j;
	$timi_c_anoig =  "0";
	$timi_d_anoig =  "90";
	if (${"drop_syr_b".$i.$j} == 1) {
	$timi_e_anoig = ${"epifaneia_masif_b".$i.$j};
	$timi_p_anoig = "ΜΑΣΙΦ";
	}
	else{
	$timi_e_anoig = ${"epifaneia_anoigmatos_b".$i.$j};
	$timi_p_anoig = "ΔΙΑΦΑΝΕΣ";
	}
	$timi_f_anoig =  ${"u_anoig_b".$i.$j};
	$objPHPExcel->getActiveSheet()->setCellValue($keli_b_anoig, $timi_b_anoig);
	$objPHPExcel->getActiveSheet()->setCellValue($keli_c_anoig, $timi_c_anoig);
	$objPHPExcel->getActiveSheet()->setCellValue($keli_d_anoig, $timi_d_anoig);
	$objPHPExcel->getActiveSheet()->setCellValue($keli_e_anoig, $timi_e_anoig);
	$objPHPExcel->getActiveSheet()->setCellValue($keli_f_anoig, $timi_f_anoig);
	$objPHPExcel->getActiveSheet()->setCellValue($keli_p_anoig, $timi_p_anoig);
	}
}
//ανοιγματα Α
for ($i = 1; $i <= $t_anatolika; $i++) { // για κάθε βόρειο τοίχο
	for ($j = 1; $j <= $anoig_t_anatolika; $j++) { //και για κάθε άνοιγμα σε κάθε βόρειο τοίχο
	$z= $t_boreia*$anoig_t_boreia + $anoig_t_anatolika*($i-1)+$j+1;
	$keli_b_anoig = "B".$z;
	$keli_c_anoig = "C".$z;
	$keli_d_anoig = "D".$z;
	$keli_e_anoig = "E".$z;
	$keli_f_anoig = "F".$z;
	$keli_p_anoig = "P".$z;
	$timi_b_anoig =  "Άνοιγμα Τ-Α" . $i . "-" . $j;
	$timi_c_anoig =  "90";
	$timi_d_anoig =  "90";
	if (${"drop_syr_a".$i.$j} == 1) {
	$timi_e_anoig = ${"epifaneia_masif_a".$i.$j};
	$timi_p_anoig = "ΜΑΣΙΦ";
	}
	else{
	$timi_e_anoig =  ${"epifaneia_anoigmatos_a".$i.$j};
	$timi_p_anoig = "ΔΙΑΦΑΝΕΣ";
	}
	$timi_f_anoig =  ${"u_anoig_a".$i.$j};
	$objPHPExcel->getActiveSheet()->setCellValue($keli_b_anoig, $timi_b_anoig);
	$objPHPExcel->getActiveSheet()->setCellValue($keli_c_anoig, $timi_c_anoig);
	$objPHPExcel->getActiveSheet()->setCellValue($keli_d_anoig, $timi_d_anoig);
	$objPHPExcel->getActiveSheet()->setCellValue($keli_e_anoig, $timi_e_anoig);
	$objPHPExcel->getActiveSheet()->setCellValue($keli_f_anoig, $timi_f_anoig);
	$objPHPExcel->getActiveSheet()->setCellValue($keli_p_anoig, $timi_p_anoig);
	}
}
//ανοιγματα N
for ($i = 1; $i <= $t_notia; $i++) { // για κάθε βόρειο τοίχο
	for ($j = 1; $j <= $anoig_t_notia; $j++) { //και για κάθε άνοιγμα σε κάθε βόρειο τοίχο
	$z= $t_boreia*$anoig_t_boreia + $t_anatolika*$anoig_t_anatolika + $anoig_t_notia*($i-1)+$j+1;
	$keli_b_anoig = "B".$z;
	$keli_c_anoig = "C".$z;
	$keli_d_anoig = "D".$z;
	$keli_e_anoig = "E".$z;
	$keli_f_anoig = "F".$z;
	$keli_p_anoig = "P".$z;
	$timi_b_anoig =  "Άνοιγμα Τ-N" . $i . "-" . $j;
	$timi_c_anoig =  "180";
	$timi_d_anoig =  "90";
	if (${"drop_syr_n".$i.$j} == 1) {
	$timi_e_anoig = ${"epifaneia_masif_n".$i.$j};
	$timi_p_anoig = "ΜΑΣΙΦ";
	}
	else{
	$timi_e_anoig =  ${"epifaneia_anoigmatos_n".$i.$j};
	$timi_p_anoig = "ΔΙΑΦΑΝΕΣ";
	}
	$timi_f_anoig =  ${"u_anoig_n".$i.$j};
	$objPHPExcel->getActiveSheet()->setCellValue($keli_b_anoig, $timi_b_anoig);
	$objPHPExcel->getActiveSheet()->setCellValue($keli_c_anoig, $timi_c_anoig);
	$objPHPExcel->getActiveSheet()->setCellValue($keli_d_anoig, $timi_d_anoig);
	$objPHPExcel->getActiveSheet()->setCellValue($keli_e_anoig, $timi_e_anoig);
	$objPHPExcel->getActiveSheet()->setCellValue($keli_f_anoig, $timi_f_anoig);
	$objPHPExcel->getActiveSheet()->setCellValue($keli_p_anoig, $timi_p_anoig);
	}
}
//ανοιγματα D
for ($i = 1; $i <= $t_dytika; $i++) { // για κάθε βόρειο τοίχο
	for ($j = 1; $j <= $anoig_t_dytika; $j++) { //και για κάθε άνοιγμα σε κάθε βόρειο τοίχο
	$z= $t_boreia*$anoig_t_boreia + $t_anatolika*$anoig_t_anatolika + $t_notia*$anoig_t_notia +$anoig_t_dytika*($i-1)+$j+1;
	$keli_b_anoig = "B".$z;
	$keli_c_anoig = "C".$z;
	$keli_d_anoig = "D".$z;
	$keli_e_anoig = "E".$z;
	$keli_f_anoig = "F".$z;
	$keli_p_anoig = "P".$z;
	$timi_b_anoig =  "Άνοιγμα Τ-Δ" . $i . "-" . $j;
	$timi_c_anoig =  "270";
	$timi_d_anoig =  "90";
	if (${"drop_syr_d".$i.$j} == 1) {
	$timi_e_anoig = ${"epifaneia_masif_d".$i.$j};
	$timi_p_anoig = "ΜΑΣΙΦ";
	}
	else{
	$timi_e_anoig =  ${"epifaneia_anoigmatos_d".$i.$j};
	$timi_p_anoig = "ΔΙΑΦΑΝΕΣ";
	}
	$timi_f_anoig =  ${"u_anoig_d".$i.$j};
	$objPHPExcel->getActiveSheet()->setCellValue($keli_b_anoig, $timi_b_anoig);
	$objPHPExcel->getActiveSheet()->setCellValue($keli_c_anoig, $timi_c_anoig);
	$objPHPExcel->getActiveSheet()->setCellValue($keli_d_anoig, $timi_d_anoig);
	$objPHPExcel->getActiveSheet()->setCellValue($keli_e_anoig, $timi_e_anoig);
	$objPHPExcel->getActiveSheet()->setCellValue($keli_f_anoig, $timi_f_anoig);
	$objPHPExcel->getActiveSheet()->setCellValue($keli_p_anoig, $timi_p_anoig);
	}
}

//Αλλαγή ονόματος του 2ου φύλλου
$objPHPExcel->getActiveSheet()->setTitle('DIAFANI');

// Οταν ανοίγω το excel να ανοίγει το 1ο φύλλο
$objPHPExcel->setActiveSheetIndex(0);


// Save Excel 2007
echo "<br/>" . date('H:i:s') . " Σώθηκε το αρχείο σε Excel2007 format\n";
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save(str_replace('.php', '.xlsx', __FILE__));


// Χρήση μνήμης
echo "<br/>" . date('H:i:s') . " Μέγιστη χρήση μνήμης: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MB\r\n";

// Ολοκλήρωση
echo "<br/>" . date('H:i:s') . " Το αρχείο kenak_excel.xlsx εγγράφηκε επιτυχώς.\r\n" . "<br/><a href=\"apotelesmata/kenak_excel.xlsx\">Κατεβάστε το αρχείο αδιαφανών</a>";
