<?php
session_start();

if( !isset($_SESSION["id"]) ) {
    header('Location: login.php');
}
if( isset($_POST["loguit"]) ) {
    session_destroy();
    header('Location: login.php');
}
?>

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

    <link rel="stylesheet" href="css/beheer.css">

    <script src="js/print.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- No X-overflow and a print button border fix. -->
    <style>
        body {
            overflow-x: hidden;
        }

        .printbtn {
            border: none;
            outline: none;
        }
    </style>


    <title>LabelPrint Beheer</title>
    <link rel="icon" href="img/upload.png">
</head>
<body>

<div class="row">
    <div id="admin" class="col s12">
        <div class="card material-table">
            <div class="table-header">
                <span class="table-title">LabelPrint Beheer</span>
                <div class="actions">
                    <a href="beheer.php" class="search-toggle waves-effect btn-flat nopadding">
                        <img height="40" width="auto" src="img/refresh.png" class="refreshbtn">
                    </a>

                    <form action="" method="POST">
                        <button name="loguit" class="search-toggle waves-effect btn-flat nopadding">
                            <i class="material-icons">Uitloggen</i>
                        </button>
                    </form>

                </div>
            </div>
            <table id="datatable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Naam</th>
                    <th>Datum en tijd van toevoeging</th>
                    <th>Label</th>
                </tr>
                </thead>

                <tbody>

                    <?php
                    // this function gets all 'labels' from the database 'laprint' and prints them in a table
                    function getLabels()
                    {
                        $conn = new mysqli("localhost", "root", "", "laprint");
                        $sql = "SELECT * FROM labels ORDER BY id DESC";
                        $result = $conn->query($sql);

                        // if there are no labels in the database, print a message
                        if ($result->num_rows == 0) {
                            echo "
                                <tr>
                                    <td>-</td>
                                    <td>Geen labels om te printen.</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                        ";
                        } else {
                            while ($row = $result->fetch_assoc()) {
                                echo "
                                <tr>
                                    <td>$row[id]</td>
                                    <td>$row[customername]</td>
                                    <td>$row[creationdatetime]</td>
                                    <td>
                                        <button class='printbtn' onclick='
                                        var Url = `uploads/$row[label]`;
                                        console.log(Url);
                                        var printWindow = window.open(Url, `_blank`);
                                        printWindow.print();
                                        
                                        ' href='#'>
                                            <div style='height:50%;width:100%'>
                                                    $row[originallabelname]
                                            </div>
                                        </button>
                                    </td>
                                    
                                </tr>
                                ";
                            }
                        }
                        $conn->close();
                    }

                    getLabels();
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
</body>



</html>