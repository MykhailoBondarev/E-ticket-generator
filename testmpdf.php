<?php
$html = '<style>table {text-align: center;font-size: 20pt;width: 100%;}</style><table_ border="1"><tr_><td_>Пример 1</td_><td_>Пример 2</td_><td_>Пример 3</td_><td_>Пример 4</td_></tr_>
<tr_><td_>Пример 5</td_><td_>Пример 6</td_><td_>Пример 7</td_><td_><a_ href="http://mpdf.bpm1.com/" title="mPDF">mPDF</a_></td_></tr_></table_>';

require_once __DIR__ . '/htmltopdf_generator/vendor/autoload.php';

//$mpdf = new \Mpdf\Mpdf('utf-8', 'A4', '8', '', 10, 10, 7, 7, 10, 10); /*задаем формат, отступы и.т.д.*/
// $mpdf->charset_in = 'cp1251'; /*не забываем про русский*/

// // $stylesheet = file_get_contents('style.css'); /*подключаем css*/
// $mpdf->WriteHTML($stylesheet, 1);

// $mpdf->list_indent_first_level = 0; 
// $mpdf->WriteHTML($html, 2); /*формируем pdf*/
// $mpdf->Output('mpdf.pdf', 'I');
$event_place = 1;
$event_row = 32;
$event_sector = 'FUN 4 FREE';
$event_img_link='/pic/default_img.jpg';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('files/mpdf.pdf');

$mpdf = new \Mpdf\Mpdf();

ob_start();
include './templates/karabas_old_template.php';
$html_file = ob_get_contents();
ob_get_clean();

$mpdf->WriteHTML($html_file);
$mpdf->Output('files/template.pdf');



$dir = $_SERVER['DOCUMENT_ROOT'].'/files/';
$url = '/files/';

if (is_dir($dir)) {
	foreach (glob($dir.'*.pdf') as $filename) {
    	echo '<a href="'.$url.basename($filename).'">'.basename($filename).'</a>' . "<br>";
	}
}

?>