<?php
require_once 'classes/dateTime.php';
$pdo = new PdoMethods();
$note = new Note($pdo);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Add Note</title>
</head>
<body>
  <h1>Add Note</h1>
  <a href="displayNote.php">Display Notes</a>
  <form class="form-group" method="POST" action="addNote.php">
    <div class="mb-3">
      <label for="datetime" >Date and Time</label>
      <input type="datetime-local" class="form-control" id="datetime" name="datetime"/>
    </div>
    <div class="mb-3">
      <label for="note" >Note</label>
      <textarea class="form-control" style="height: 200px" id="note" name="note"></textarea>
    </div>
    <div class="col-12">
      <input type="submit" class="btn btn-primary" name="submit" value="Add Note"/>
    </div>
</form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$note->checkSubmit($_POST);
}
?>