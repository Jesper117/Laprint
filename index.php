<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <link rel="stylesheet" href="css/upload1.css">

    <title>LabelPrint</title>
    <link rel="icon" href="img/upload.png">
</head>
<body>



<form action="upload.php" method="POST" enctype="multipart/form-data">
    <!--<div class="text-center">
        <label class="infotext nameinputinfo">Voer uw naam in.</label> <br>
        <input type="text" name="customername" id="customername" class="nameinput" maxlength="25">
    </div>-->

    <div class="wrapper">

        <div class="file-upload">
            <input type="file" name="uploadfile" id="uploadfile" onchange="this.form.submit();" />
            <img class="uploadimg" width="300" height="300" src="img/uploadimg.png">
        </div>
    </div>
</form>

<div class="text-center">
    <label class="infotext credits">LabelPrint is gemaakt door Jesper.</label> <br>

    <a target="_blank" href="https://github.com/Jesper117">
        <img width="40" height="auto" src="img/github.png">
    </a>
</div>

<br>
<br>

<a href="login.php">
    <img  class="center-block aalogo" width="200" height="auto" src="img/aacomputerslogo.jpg">
</a>

</body>
</html>