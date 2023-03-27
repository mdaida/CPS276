<?php
require_once "Page.php";
require_once "Crud.php";
$page = new Page();
$crud = new Crud();
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>File Upload</title>
</head>
<body>
  <div class="container">
    <header>
      <h1>Home Page</h1>
      <?php echo $page->nav(); ?>
    <header>  
      <main>
      <div id="fileName"><?php echo $crud->getfile('fileName'); ?> </div>
</main>
</div>
</body>
</html>