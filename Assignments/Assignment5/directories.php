<?php
class Directories {
    public function createDirectory($directoryName, $fileContent) {
        if (file_exists("directories/$directoryName")) {
            echo "A directory already exists with that name.";
        } 
        else {

            if (!mkdir("directories/$directoryName", 0777, true)) {
                echo "Failed to create directory.";
                return;
            }
            
            $file = fopen("directories/$directoryName/readme.txt", "w");
            if (!$file) {
                echo "Failed to create file.";
                return;
            }

            fwrite($file, $fileContent);
            fclose($file);
            
            echo "Success! The directory and file have been created.";
            echo "<br>";
            echo "<a href='directories/$directoryName/readme.txt'>Path where file is located</a>";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $directories = new Directories();
    $directories->createDirectory($_POST["inputFolder"], $_POST["fileContent"]);
}

?>