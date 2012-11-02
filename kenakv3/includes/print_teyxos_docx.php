<?php
/**
*  Example of use of HTML to docx converter
*/

// Load the files we need:
require_once 'PHPWord.php';
require_once 'htmltodocx/simplehtmldom/simple_html_dom.php';
require_once 'htmltodocx/htmlconverter/h2d_htmlconverter.php';
require_once 'htmltodocx/example_files/styles.inc';

require_once("connection.php");
require_once("session.php");

$strSQL = "SELECT * FROM teyxos_f WHERE user_id=".$_SESSION['user_id']." AND meleti_id=".$_SESSION['meleti_id']. " ORDER BY kefalaio";
$objQuery = mysql_query($strSQL, $connection) or die ("Error Query [".$strSQL."]");
echo "1";
// HTML fragment we want to parse:
//$html = file_get_contents('example_files/example_html.html');
while($objResult[] = mysql_fetch_array($objQuery));
for ($i=0;$i<=7;$i++){
$html.=$objResult[$i]["text"]; 

} 
 
 
// New Word Document
$phpword_object = new PHPWord();
$section = $phpword_object->createSection();

// HTML Dom object:
$html_dom = new simple_html_dom();
$html_dom->load('<html><body>' . $html . '</body></html>');
// Note, we needed to nest the html in a couple of dummy elements

// Create the dom array of elements which we are going to work on:
$html_dom_array = $html_dom->find('html',0)->children();

// Provide some initial settings:
$initial_state = array(
      'current_style' => array('size' => '11'),
      'style_sheet' => h2d_styles(), // This is the "style sheet" in styles.inc
      'parents' => array(0 => 'body'), // Our parent is body
      'list_depth' => 0, // This is the current depth of any current list
      'context' => 'section', // Possible values - section, footer or header
      'base_root' => 'http://localhost/', // Required for link elements
      'base_path' => '/', // Required for link elements
      'pseudo_list' => TRUE, // NOTE: Word lists not yet supported (TRUE is the only option at present)
      'pseudo_list_indicator_font_name' => 'Wingdings', // Bullet indicator font
      'pseudo_list_indicator_font_size' => '7', // Bullet indicator size
      'pseudo_list_indicator_character' => 'l ', // Gives a circle bullet point with wingdings
      );    

// Convert the HTML and put it into the PHPWord object
h2d_insert_html($section, $html_dom_array[0]->nodes, $initial_state);

// Save File
$h2d_file_uri = tempnam('', 'htd');
$objWriter = PHPWord_IOFactory::createWriter($phpword_object, 'Word2007');
$objWriter->save($h2d_file_uri);

// Download the file:
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=teyxos.docx');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: ' . filesize($h2d_file_uri));
ob_clean();
flush();
$status = readfile($h2d_file_uri);
unlink($h2d_file_uri);
exit;