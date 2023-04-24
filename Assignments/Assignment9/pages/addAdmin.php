<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Add Contact</title>
</head>
<body>
<form class="form-group" method="POST" action="addAdmin.php">
    <div class="container">
        <a href="addContacts.php">Add Contact</a>&nbsp;&nbsp;&nbsp;<a href="deleteContacts.php">Delete Contact(s)</a>&nbsp;&nbsp;&nbsp;<a href="addAdmin.php">Add Admin</a>&nbsp;&nbsp;&nbsp;<a href="deleteAdmins.php">Delete Admins</a>&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a>
        <h1>Add Contact</h1>
        <div class="mb-3">
            <label for="name">Name (letters only)</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Matt Daida">
         </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="mdaida@test.com"> 
         </div>
        <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="hello">
         </div>
         <div class="mb-3">
            <label for="Status">State</label>
            <select id="inputState" class="form-control">
              <option selected>Staff</option>
              <option>Admin</option>
            </select>
          </div>
        <div class="mb-3"> 
            <button type="submit" class="btn btn-primary">Submit</button>
         </div> 
</form>
</body>
</html>