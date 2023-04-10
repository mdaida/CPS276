<?php
require_once 'classes/dateTime.php';
$pdo = new PdoMethods();

if (isset($_POST['getNotes'])) {
  $note = new Note($pdo);
  $note->displayNotes();
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Display Note</title>
</head>
<body>
  <h1>Display Note</h1>
  <a href="addNote.php">Add Note</a>
  <form class="form-group" method="POST" action="displayNote.php">
    <div class="mb-3">
        <label for="begDate" >Begining Date</label>
        <input type="date" class="form-control" id="begDate" name="begDate"/>
    </div>
    <div class="mb-3">
        <label for="endDate" >Ending Date</label>
        <input type="date" class="form-control" id="endDate" name="endDate"/>
    </div>
    <div class="col-12">
        <input type="submit" class="btn btn-primary" name="submit" value="Get Notes"/>
    </div>
    </form>
    <table>
    <?php
      if (isset($_POST['getNotes'])) {
      $note = new Note($pdo);
      $note->displayNotes();
      }
    ?>
</body>
</html>