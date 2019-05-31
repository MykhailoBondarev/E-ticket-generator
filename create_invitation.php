<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Creating Invite E-ticket</title>
</head>
<style>
    form
    {
        margin: 0 auto;
        max-width: 800px;
        width: 100%;
        border: 3px dashed #007768c7;

    }

    form div
    {
        margin: 10px;
    }

    button
    {
        padding: 5px 20px;
        display: block;
        margin: 10px auto;
    }

    input
    {
        width: 50%;
    }

    input.sml
    {
        width: 20%;
    }

    input.date-picker
    {
        width: 22%;
    }

    input.file-picker
    {
        width: 30%;
        background-color: #0320;
    }

    input.xsml
    {
        width: 5%;
    }

    .isInvite {
      width: 20px;
    }

    .Price-field {
      width: 80px;
    }

    .isInvite:checked ~ .Price-field {
      display: none;
    }

    button, input.file-picker{
        border: 2px solid #0303;
        border-radius: 2px;
    }

    button:hover
    {
        background-color: #676967a8;
    }

    .delimiter {
        height: 10px;
    }

    form > label {
        cursor: pointer;
        padding: 7px 23px;
        margin: 0 23px;
        -webkit-box-shadow: 0px 14px 4px -13px rgba(0,0,0,0.5);
        -moz-box-shadow: 0px 14px 4px -13px rgba(0,0,0,0.5);
        box-shadow: 0px 14px 4px -13px rgba(0,0,0,0.5);
    }

    input[type="radio"] {
        display: none;
        position: absolute;
    }

    .single-content,
    .multi-content {
        display: none;
    }

    input[type="radio"]:checked+label {
        font-weight: bold;
        -webkit-box-shadow: 0px 10px 4px -7px rgba(0,0,0,0.7);
        -moz-box-shadow: 0px 10px 4px -7px rgba(0,0,0,0.7);
        box-shadow: 0px 10px 4px -7px rgba(0,0,0,0.7);     
    }

    input[value="single-mode"]:checked ~ div.single-content,
    input[value="multi-mode"]:checked ~ div.multi-content {
        display: block;
    }
    .example {
        text-underline-position: under;
        color: #fb2603;
        background: #7fbd1d45;
        font-weight: bold;
    }
</style>
<body>
    <form method="post" action="invite_template" enctype='multipart/form-data'>
        <div class="delimiter"></div>
        <input id="single-mode" type="radio" name="mode" value="single-mode" placeholder="" checked>     
        <label for="single-mode">По одному</label>        
        <input id="multi-mode" type="radio" name="mode" value="multi-mode" placeholder="">  
        <label for="multi-mode">Файлом</label>
        <div class="delimiter"></div>
        <div>
            <label for="activity_name">Назва заходу:</label>
            <input type="text" name="activity_name" required>
        </div>
        <div>
            <label for="event_date">Дата, час заходу:</label>
            <input type="datetime-local" name="event_date" class="date-picker" required>
        </div>
<!--         <div>
            <label for="event_address">Місто:</label>
            <input type="text" name="event_city" class="sml">
        </div> -->
        <div>
            <label for="event_address">Адреса проведення:</label>
            <input type="text" name="event_address" required>
        </div>
        <div class="single-content">
            <div>
                <label for="event_sector">Сектор:</label>
                <input type="text" name="event_sector" class="sml">
            </div>
            <div>
                <label for="event_row">Ряд:</label>
                <input type="text" name="event_row" class="xsml">
            </div>
            <div>
                <label for="event_place">Місце:</label>
                <input type="text" name="event_place" class="xsml">
            </div>
            <div>
              <label for="isInvite">Запрошення?</label>
              <input class="isInvite" type="checkbox" name="isInvite" checked value="true">
              <label class="Price-field" for="Price">Ціна квитка:</label>
              <input class="Price-field" type="text" name="Price">
            </div>
        </div>
        <div>
            <label for="event_img_link">Aфіша заходу:</label>
            <input type="text" name="event_img_link" placeholder="введіть url або оберіть файл для завантаження ---->">
            <input type="file" name=uploadfile accept=".jpg, .jpeg, .png" class="file-picker">
        </div>
        <div class="single-content">
            <div>
                <label for="event_img_link">Штрихкод:</label>
                <input type="text" name="barcode_text" class="sml">
            </div>
        </div>
        <div class="multi-content">
            <div>
                <label for="event_img_link">Оберіть список квитків:</label>
                <input type="file" name="ticketlistfile" accept=".csv" class="file-picker">
                <a class="example" href="files/example.csv" download="example.csv">Приклад CSV файлу</a>            
            </div>
        </div>
        <button action="submit">OK</button>
    </form>
</body>
</html>
