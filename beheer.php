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

    <title>LabelPrint</title>
    <link rel="icon" href="img/upload.png">
</head>
<body>

<div class="row">
    <div id="admin" class="col s12">
        <div class="card material-table">
            <div class="table-header">
                <span class="table-title">LabelPrint Beheer</span>
                <div class="actions">
                    <a href="index.php" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">Naar LabelPrint</i></a>
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
                <tr>

                    <td>1</td>
                    <td>Jesper Minks</td>
                    <td>25-06-2022</td>
                    <td>
                        <a href="http://example.com">
                            <div style="height:50%;width:100%">
                                Label.pdf
                            </div>
                        </a>
                    </td>

                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>



</html>