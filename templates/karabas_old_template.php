<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Document</title>   
</head>
<body>
</style>
<style media="all">

    @font-face { 
        font-family: 'MyriadProRegular'; 
        src: url("./fonts/MyriadPro-Regular.ttf"); 
    } 

    body {
        margin: 0;
        font-size: 20px;
        font-family: 'MyriadProRegular';
    }

    .mainTicket
    {
        /*max-width: 900px;*/
        max-width: 210mm;
        padding: 50px 0 0 0;
        margin: 50px auto;        
        font-size: 100%;               
    }

    div { overflow: hidden; }
    div.head { width: 100%; border-bottom: 1px solid black; /*padding-bottom: 10px; */margin-bottom: 10px; }
    div.logo { width: 45%; float: left; }
    div.bottomlogo { width: 20%; float: left; }
    img.logoimg { width: 45%; }
    div.bottomlogo > img { width: 100%; max-height: none; }
    div.main_h { text-align: right; text-transform: uppercase; font-size: 14px; padding-top: 7px; }
    div.hid { font-family: 'MyriadProRegular'; text-align: right; font-size: 10pt; }
    div.Holder { float: right; width: 45%; }
    div.activity_name { font-size: 21px; padding-bottom: 5px; } 
    .left { float: left; }
    .right { float: right; }
    .right-inline {text-align: right; }
    div.rules { width: 50%; }
    div.place, .place_location { font-size: 16px; padding-bottom: 0px; }
    .place_location > div { margin-right: 20px; }
    /*div.place { padding-bottom: 5px; }*/
    div.place_address, .place_price, .place_owner, .place_passport { font-size: 16px; padding-bottom: 3px; }
    div.control { font-size: 16px; }
    ul { padding-left: 20px; margin-bottom: 2px;  margin-top: 5px;}
    li { list-style-type: decimal; font-size: 10px; padding-bottom: 2px; }
    .forbidden_img { width: 100%; }
    div.h_bold { font-size: 17px; font-weight: 600; }
    div.impor { font-size: 18px; float: left; width: 100%; margin-top: 0px; margin-bottom: 5px; }
    div.happyy { text-transform: uppercase; padding-left: 20px; font-size: 16px; }
    div.forbidden_h { font-size: 20px;  text-align: center; }
    div.forbidden_inf { font-size: 9.4px; color: #3c3b3b; text-align: center; border-bottom: 4px dotted #4e4d4d; padding-bottom: 10px; margin-bottom: 5px; margin-top: 0px; letter-spacing: 0; width: 100%; }
    div.bonus[bonus="0"]{display:none;}

    .bottom_inf  div { float: left; }

    .bottom_inf div.control { width: 35%; }
    .bottom_inf div.small_inf { width: 43%; padding-left: 10px; }
    .bottom_inf div.tn { width: 20%; text-align: center; }
    div.small_inf div.activity_name { font-size: 15px; white-space: pre-line; float: none;}
    div.small_inf div.place, div.small_inf .place_location { font-size: 11px; float: none; /*padding-bottom: 3px;*/ }
    div.small_inf div.place_address, div.small_inf .place_price, div.small_inf .place_owner, div.small_inf .place_passport { font-size: 12px; padding-bottom: 0px; }
/*    div.small_inf .place_location { padding-top: 5px; padding-bottom: 5px; }*/
    div.small_inf div.activity_name { padding-bottom: 3px; white-space: pre-line; }
    .scanner-img { width: 100%;  max-width: 100px; /*width: 80%;*/ } 
    div.phoneNo { color: #31063c; font-size: 20px; letter-spacing: 1px; }
    div.to { font-size: 12px; color: #31063c; text-align: right; text-transform: uppercase; letter-spacing: 3px; }
    div.tno { font-size: 12pt; }
    .event-image { width: 30%; text-align: right; position: relative; height: 273px; /* height: 320px;*/}
    .poster_img {/*max-width: 210px;*/ max-width: 180px; width: 100%; position: absolute; z-index:1; right: 0;}
    .information_holder { width: 50%; position: relative; }
    .rules_holder, .forbidden, .bottom_inf, .footer { width: 100%; }
    .rules_holder { padding-top: 10px; }
    .small_inf > .activity_name { height: auto; }
    .control img {
        max-width: 170px;
        width: 100%;
        padding-right: 10px;
    }

    .InviteTrue, .InviteFalse {
        display:none;
    }
    span.Invite<?php echo $isInviteText; ?> {
        display: inline;
    }
    div.Invite<?php echo $isInviteText; ?> {
        display: block;
    }

div.capitals{
    text-transform: uppercase;
    font-size: 12px;
}

    @media print {
    .print-bar {
        display: none;
    }
    .mainTicket {
        zoom: 85%;
        max-width: 950px; 
        margin: 0px; 
        font-size: 100%;
        padding: 0;
    }
/*    ul { padding-left: 20px; margin-bottom: 5px;  margin-top: 30px;}
    li { list-style-type: decimal; font-size: 14px; padding-bottom: 5px; }*/
}

</style>
<div class="mainTicket">

    <div class="head">
        <div class="logo"><img src="/pic/karabas_logo.png" class="logoimg" /></div>
        <div class="right Holder">
            <div class="main_h">
            <span class="InviteBoolUA InviteTrue">Запрошення</span>
            <span class="InviteBoolUA InviteFalse">Квиток</span>
            <span>/</span>
            <span class="InviteBoolEN InviteTrue">Invitation</span>
            <span class="InviteBoolEN InviteFalse">E-ticket</span></div>

        </div>
    </div>
    <div class="info">
        <div class="left information_holder">
            <div class="activity_name"><?php print_r($activity_name); ?></div>
            <div class="place" style="padding-bottom: 2px;"><?php echo $event_date.' '.$event_city;  ?></div>
            <div class="place"><?php echo $event_address ?></div>
            <div class="place_location"><table style="margin-left: -2px; font-family: MyriadProRegular; font-size: 14px;"><tr><td>Сектор/Sector: <?php echo $event_sector; ?></td></tr>
                <tr>
                    <?php
                        if ($event_row!='' || $event_place!='') {
                            echo '<td>Ряд/Row: '.$event_row.'</td>';
                            echo '<td>Місце/Place: '.$event_place.'</td>';
                        }
                     ?>
                </tr>
            </table>
            </div>
            <div class="place_price InviteFalse" style="margin-top: 3px;">Ціна <?php echo $price; ?> грн.</div>
            <div class="place_price InviteTrue" style="margin-top: 3px;">Запрошення не для продажу</div>
            <div class="control"><span>Контроль / Control</span><div>
                <img src="/pic/barcode.png" alt="">
            </div>
            </div>
        </div>
       <div class="event-image right-inline right"><img class="poster_img" src="<?php echo $event_img_link; ?>"/></div>
    </div>
    <div class="rules_holder">
        <div class="rules left">
            <div class="h_bold">Правила:</div>
            <ul>
                <li>Цей електронний квиток надає право відвідування заходу.</li>
                <li>Електронний квиток заборонено копіювати та передавати копії третім особам. Унікальний ідентифікатор (штрих-код), який міститься на цьому електронному квитку, гарантує вам право на одноразове відвідування заходу. Пред’явлення третіми особами електронного квитка з ідентичним ідентификатором позбавляє вас права на відвідування заходу.</li>
                <li>У разі виникнення будь-яких проблем, таких як неможливість прочитати ідентифікатор (штрих-код), фізичне пошкодження цього електронного квитка або в інших випадках, необхідно звернутися в спеціалізований пункт обміну або в каси, перелік яких є на сайті <a href="https://karabas.com" title="Перейти на сайт">karabas.com</a>.</li>
                <li>Перевірка електронних квитків та прохід на захід здійснюється у відповідності з правилами, що встановлені організаторами або адміністраціей залу. Для проходження процедури ідентифікації електронного квитка та з метою перевірки права використання цього електронного квитка рекомендовано мати при собі документ, що підтверджує особу.</li>
                <li>Вартість цього електронного квитка може бути повернена лише у разі відміни, заміни або переноса заходу на умовах, встановлених офертой. Вартість сервісного або інших додаткових сборів, що взимається при продажу електронного квитка, поверненню не підлягає.</li>
                <li>З умовами оферти ви можете ознайомитися на сайті <a href="https://karabas.com" title="Перейти на сайт">karabas.com</a>. Ці правила не є офертою.</li>
            </ul>
        </div>
        <div class="rules right">
            <div class="h_bold">Rules:</div>
            <ul>
                <li>Your electronic ticket permits admission to the event.</li>
                <li>It is not permitted to copy the electronic tickets, or give a copy to third parties. A unique identifying code (bar-code) is printed on the electronic ticket, and guarantees your admission for one single entry to the event. If you pass your electronic ticket and unique identifying code to third parties, your own admission to the event will be forfeited.</li>
                <li>If you encounter any kind of difficulties - for example, your unique identifying code is unreadable, or your electronic ticket becomes physically damaged, or other similar incidents - you should contact one of the special ticket-return locations or ticket-desks indicated on our website at <a href="https://karabas.com" title="Перейти на сайт">karabas.com</a>.</li>
                <li>Checking your electronic ticket and admission to the event take place in accordance with the conditions laid down by the organisers or venue administration. While your electronic ticket is being scanned we recommend you keep an ID document to hand, and keep it while the validity of your ticket is confirmed.</li>
                <li>The price of your electronic ticket can be refunded only in case the event is cancelled, changed or postponed, according to the advertised conditions. The costs of service fees or other handling charges connected with the issue of your ticket cannot be refunded.</li>
                <li>You can read the full conditions of this offer on our site at <a href="https://karabas.com" title="Перейти на сайт">karabas.com</a>. The document you are reading does not constitute these conditions.</li>
            </ul>
        </div>
    </div>
    <div class="forbidden">
        <!-- <div class="forbidden_h capitals">Приємного відпочинку</div> -->
        <div class="forbidden_h">Категорично заборонено приносити на захід / Forbidden:</div>
        <img src="/pic/forbidden.png" alt="" class="forbidden_img" />
        <div class="forbidden_inf">Усі вище зазначені речі будуть вилучатися службою безпеки. Адміністрація залишає за собою право проводити особистий огляд відвідувачів з метою гарантування безпеки заходу.</div>
    </div>
    <div class="bottom_inf">
        <div class="control"><span>Контроль / Control</span>
            <img src="/pic/barcode.png" alt="">
       </div>
        <div class="small_inf">
            <div class="activity_name"><?php echo $activity_name; ?></div>
            <div class="place" style="padding-bottom: 0px;"><?php echo $event_date; ?></div>
            <div class="place"><?php $event_address; ?></div>
            <div class="place_location"><div class="">Сектор/Sector: <?php echo $event_sector; ?></div><div class="left">Ряд / Row: <?php echo $event_row; ?></div><div class="left">Місце / Place: <?php echo $event_place; ?></div></div>
            <div class="place_price InviteFalse">Ціна <?php echo $price; ?> грн.</div>
            <div class="place_price InviteTrue">Запрошення не для продажу</div>
        </div>
        <div class="tn">
            <img class="scanner-img" src="/pic/eticket_scanner.png" />
        </div>
    </div>
    <div class="footer">
        <div class="bottomlogo">
            <img src="/pic/karabas_logo.png"/>
        </div>
        <div class="footerInf right right-inline">
            <div class="phoneNo"> 380 44 590 55 55</div>
            <div class="to">Замовлення квитків</div>
        </div>
    </div>
</div>
</body>
</html> 