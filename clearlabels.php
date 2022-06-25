<?php
    if(isset($_POST['deletetable'])) {
        $db = new PDO('mysql:host=localhost;dbname=laprint', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $db->prepare("DELETE FROM labels");
        $stmt->execute();

        // this deletes all files in the uploads folder
        $files = glob('uploads/*');
        foreach($files as $file) {
            if(is_file($file))
                unlink($file);
        }

        header("Location: beheer.php");
    }
?>