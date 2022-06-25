<?php
    // this function gets the number of labels from the database and adds one
    function getNumberOfLabels() {
        $db = new PDO('mysql:host=localhost;dbname=laprint', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $db->prepare("SELECT * FROM labels");
        $stmt->execute();
        $result = $stmt->fetchAll();
        $numberOfLabels = count($result);
        $numberOfLabels++;
        return $numberOfLabels;
    }

    // this function returns the current datetime compatible with the database
    function getCurrentDateTime() {
        $date = new DateTime();
        $date->setTimezone(new DateTimeZone('Europe/Amsterdam'));
        return $date->format('Y-m-d H:i:s');
    }

    function insertLabel($id, $customername, $labelname, $originallabelname) {
        $currentdatetime = getCurrentDateTime();

        $db = new PDO('mysql:host=localhost;dbname=laprint', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $db->prepare("INSERT INTO labels (id, customername, creationdatetime, label, originallabelname) VALUES (:id, :customername, :creationdatetime, :label, :originallabelname)");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':customername', $customername);
        $stmt->bindParam(':creationdatetime', $currentdatetime);
        $stmt->bindParam(':label', $labelname);
        $stmt->bindParam(':originallabelname', $originallabelname);
        $stmt->execute();
    }

    // this takes the incoming file and renames it to a random name and moves it to the uploads folder
    if(isset($_FILES['uploadfile'])) {
        $file = $_FILES['uploadfile'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array(
            'jpg',
            'jpeg',
            'png',
            'pdf',
            'doc',
            'docx'
        );
        if(in_array($fileActualExt, $allowed)) {
            if($fileError === 0) {
                if($fileSize < 100000000) {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);

                    insertLabel(getNumberOfLabels(), $_POST["customername"], $fileNameNew, $fileName);

                    header("Location: index.php");
                } else {
                    echo "Je bestand is te groot.";
                }
            } else {
                echo "Er is iets fout gegaan.";
            }
        } else {
            echo "Je hebt geen geldig bestand gekozen.";
        }
    }
?>