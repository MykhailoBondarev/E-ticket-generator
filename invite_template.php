<?php
// Including all required classes
require_once('barcode_generator/class/BCGFontFile.php');
require_once('barcode_generator/class/BCGColor.php');
require_once('barcode_generator/class/BCGDrawing.php');
require_once __DIR__ . '/htmltopdf_generator/vendor/autoload.php';

// Including the barcode technology
require_once('barcode_generator/class/BCGcode128.barcode.php');


$activity_name=$_POST['activity_name'];
$event_date = date('d.m.Y /H:i/', strtotime($_POST['event_date']));
$event_city=$_POST['event_city'];
$event_address=$_POST['event_address'];
$event_img_file=$_FILES['uploadfile'];
$uploaddir = './files/';
$pdf_folder = $_SERVER['DOCUMENT_ROOT'].'/files/e-tickets/';
$event_sector=$_POST['event_sector'];
$event_row=$_POST['event_row'];
$event_place=$_POST['event_place'];
$is_invite=$_POST['isInvite'];
$price=$_POST['Price'];
$barcode=$_POST['barcode_text'];    
$url = 'files/e-tickets/';
// Don't forget to sanitize user inputs

function PDFFileName($sector,$row,$place) {
   if (!isset($row) || $row == '') {
    $row = '_';
   } 
   if (!isset($place) || $place == '') {
    $place = '_';
   }
   return 'ticket_'.$sector.'_'.$row.'_'.$place.'_'.rand(100000000,999999999).'.pdf'; 
}

function IsInvite($invite_note, $price) {
    if (strtolower($price) == 'invite' || isset($invite_note) || $invite_note != '') {
        $isInvitetext = 'True';
    }  else {
        $isInvitetext = 'False';
    }

    return $isInvitetext;
}

function generate_barcode($barcode_text) {
    $barcode_text = isset($barcode_text) ? $barcode_text : '111100001111'; 
    $barcodeImg;
    // Loading Font
    $fontPath = $_SERVER['DOCUMENT_ROOT'].'/barcode_generator/font/Myriad_Pro_Regular.ttf';
    $font = new BCGFontFile($fontPath, 12);
    // The arguments are R, G, B for color.
    $color_black = new BCGColor(0, 0, 0);
    $color_white = new BCGColor(255, 255, 255);

    $drawException = null;
    try {
        $code = new BCGcode128();
        $code->setScale(2); // Resolution
        $code->setThickness(28); // Thickness
        $code->setForegroundColor($color_black); // Color of bars
        $code->setBackgroundColor($color_white); // Color of spaces
        $code->setFont($font); // Font (or 0)
        $code->parse($barcode_text); // Text
    } catch(Exception $exception) {
        $drawException = $exception;
    }

    /* Here is the list of the arguments
    1 - Filename (empty : display on screen)
    2 - Background color */
    $drawing = new BCGDrawing('', $color_white);
    if($drawException) {
        $drawing->drawException($drawException);
    } else {
        $drawing->setFilename($_SERVER['DOCUMENT_ROOT'].'/pic/barcode.png');
        $drawing->setBarcode($code);
        $drawing->draw();
    }

    // Header that says it is an image (remove it if you save the barcode to a file)
    // header('Content-Type: image/png');
    // header('Content-Disposition: inline; filename="barcode.png"');
     $drawing->finish(BCGDrawing::IMG_FORMAT_PNG); // Draw (or save) the image into PNG format.
}

function generatePDF($html, $file_path) {
    $mpdf = new \Mpdf\Mpdf([
    'format' => 'A4-P',
    ]);
    $mpdf->SetFont('myriadproregular');
    $mpdf->SetDisplayMode('fullwidth','default');
    $mpdf->SetTitle('E-ticket'); 
    $mpdf->WriteHTML($html);
    $mpdf->Output($file_path);
}

function ticketTemplateCache() {
    ob_start();
    include './templates/karabas_old_template.php';
    $ticket_content = ob_get_contents();
    ob_get_clean();    
    return $ticket_content;       
}    

        if ($event_img_file['name']!='' || $event_img_file['size']!=0) {
            if ($event_img_file['type']=='image/jpeg' || $event_img_file['type']=='image/png') {                
                $uploadfile = $uploaddir.$event_img_file['name'];
                copy($_FILES['uploadfile']['tmp_name'], $uploadfile);
                $event_img_link=$uploadfile;
            }
            else {
                echo 'Wrong image type!';
                exit;
            }
        }
        elseif ($_POST['event_img_link']!='') {
            $event_img_link=$_POST['event_img_link'];
        }        
        else {
            if (!isset($activity_name)) {
                $activity_name='Undefined event';
            }
            if (!isset($event_address)) {
                $event_address='Undefined address';
            }
            if (!isset($event_sector)) {
                $event_sector='Undefined sector';
            }
            if (!isset($event_city)) {
                $event_city='Undefined city';
            }
            if (!isset($event_img_link)) {
                $event_img_link='/pic/default_img.jpg';
            }
            if (!isset($event_row)) {
                $event_row='';
            }
            if (!isset($event_place)) {
                $event_place='';
            }
        }

    if ($_POST['mode']=='single-mode') {               
        generate_barcode($barcode);
        $isInviteText = IsInvite($is_invite, $price);
        ob_start();
        include './templates/karabas_old_template.php';
        $ticket_content = ob_get_contents();
        ob_get_clean();  
        $pdf_file_name = PDFFileName($event_sector,$event_row,$event_place);  
        generatePDF($ticket_content, $url.$pdf_file_name);
        include './templates/karabas_old_template.php';
        echo '<div class="print-bar" style="z-index: 10; position: fixed; top: 0; background-color: #ecdc2c; padding: 7px 0; width: 100%; text-align: center; font-weight: bold; font-family: sans-serif; font-size: 20px;"><a style="text-decoration: none; padding: 7px 0;" href="'.$url.$pdf_file_name.'" download="'.$pdf_file_name.'">Завантажити: '.$pdf_file_name.'</a></div>';

    } elseif ($_POST['mode']=='multi-mode') {

        $ticketlistfile = $uploaddir.$_FILES['ticketlistfile']['name'];
        copy($_FILES['ticketlistfile']['tmp_name'], $ticketlistfile);
        $csv_file = fopen($ticketlistfile, 'r');   
        while (($data[] = fgetcsv($csv_file, 0, ";")) !== FALSE) { 
            $rows_num = count($data);
            $rows = $data;                                       
        }
        echo "<p>Прочитано $rows_num квитків</p>";       
        fclose($csv_file);
        unlink($ticketlistfile);        
        include './templates/resultpage.php';

        foreach ($rows as $row) {
            $event_sector=$row[0];
            $event_row=$row[1];
            $event_place=$row[2];
            $price=$row[3];
            $barcode=$row[4];
            $isInviteText = IsInvite($is_invite, $price);
            generate_barcode($barcode);
            ob_start();
            include './templates/karabas_old_template.php';
            $ticket_content = ob_get_contents();
            ob_get_clean();
            $pdf_file_name = PDFFileName($event_sector, $event_row, $event_place);    
            generatePDF($ticket_content, $url.$pdf_file_name);           
            $pdf_tickets_files_names[] = $pdf_file_name;
        }
        $error = '';
        if(extension_loaded('zip')) {    // Checking ZIP extension is available
                if(isset($pdf_tickets_files_names[0]) and count($pdf_tickets_files_names) > 0){    // Checking files are selected
                    $zip = new ZipArchive();            
                    $full_zip_name = $pdf_folder.'tickets_'.time().".zip";
                    $zip_name = 'tickets_'.time().".zip";          
                    if($zip->open($full_zip_name, ZIPARCHIVE::CREATE)!==TRUE){       
                        $error .=  "Сталася помилка при формуванні ZIP архіву / Sorry ZIP creation failed at this time<br/>";
                    }
                    foreach($pdf_tickets_files_names as $file_name){               
                        $zip->addFile($pdf_folder.$file_name, $file_name);                          
                    }
                    $zip->close();
                    foreach($pdf_tickets_files_names as $file_name){   
                        unlink($pdf_folder.$file_name);
                    }
                    if(file_exists($full_zip_name)){
                        echo '<div style="margin: 0 auto; text-align: center; padding: 12%;"><a style="display: block; text-decoration: none; padding: 7px 0; font-size: 25px; font-weight: bold;" href="'.$url.$zip_name.'" download="'.$zip_name.'"><img style="max-width: 220px; width: 100%;" src="./pic/archive.png" /><p>'.$zip_name.'</p></a></div>';
                    }
                    
                } else {
                    $error .= "Файли для архування не вибрано / Please select file to zip <br/>";
                }
        } else {
            $error .= "Встановіть ZIP розширення / You don`t have ZIP extension<br/>";
        }  

    } else {
        echo '<p style="z-index: 100; position: fixed; top: 50%; text-align: center; font-family: sans-serif; font-size: 30px; width: 100%; background-color: red; color: white;">Оберіть режим генерації квитків!</p>';
    }
?>