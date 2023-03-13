<?php
require_once 'directories.php';
$output = '';
if (isset($_POST['submit'])) {
    $directories = new Directories();
    $folderName = isset($_POST['folderName']) ? $_POST['folderName'] : '';
    $fileContent = $_POST['fileContent'];
    $result = $directories->createDirectory($folderName, $fileContent);
    if ($result === true) {
        $output = "<a href='directories/$folderName/readme.txt'>Path where file is located</a>";
    } else {
        $output = "<div class='alert alert-danger' role='alert'>$result</div>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>File and Directory Assignment</title>
</head>
<body>
  <div class="container">
    <h1>File and Directory Assignment</h1>
    <div id="description" class="form-text">
        Enter a folder name and the contents of a file. Folder names should contain alpha numerical charcters only.
    </div>
    <br>
    <div id="status" class="form-text">
    <div id="result" class="form-text">
        <?php echo $output ?>
    </div>
    <form method="POST">
        <div class="mb-3">
            <label for="inputFolder" class="form-label">Folder Name</label>
            <input type="text" class="form-control" id="inputFolder" aria-describedby="folderName" name="inputFolder">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">File Content</label>
            <textarea style="height: 200px;" class="form-control" id="fileContent" name="fileContent" name="fileContent"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
  </div>
</body>
</html>