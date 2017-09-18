<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
   <link href="css/common.css" rel="stylesheet" type="text/css"/>
   <link href="css/css1.css" rel="stylesheet" type="text/css"/>
</head>
<body>
      <div id="mailBox" class="marAuto wid960">
            <div class="mailHead">
              <img src="image/mail/1.jpg" alt="head"/>
            </div>
            <div class="marAuto wid960" id="mailList">
                <ul class="mail-Ul">
                    <?php require '../function/mail.func.php'; ?>
                </ul>
            </div>
      </div>
</body>
</html>