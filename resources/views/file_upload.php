<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Lab 8</title>
</head>
<body>
   <?php
   echo Form::open(array('url' => '/uploadfile', 'files' => 'true'));
   echo Form::file('image');
   echo Form::submit('Upload File');
   echo Form::close();
   ?>
</body></html>