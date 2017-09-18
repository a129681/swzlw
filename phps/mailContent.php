<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
  <link href="css/common.css" rel="stylesheet" type="text/css"/>
  <link href="css/css1.css" rel="stylesheet" type="text/css"/>
</head>
<body>
      <div id="mailCont" class="marAuto wid960">

          <p class="mail-conWarp">
            <?php
              define("IN_TG",true);
              require '../tools/sqlHleper.class.php';
              if($mail_id=$_GET['mailC'])
              {
                  $mailArr=$mysqli->getDataRow("select * from sw_mail WHERE mail_id='$mail_id'",'Array');
                  $mysqli->query("update sw_mail set m_status='1' WHERE mail_id='$mail_id'");
                  echo $mailArr['m_content'];
              }
            ?>
          </p>
      </div>
</body>
</html>