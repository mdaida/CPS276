<?php
session_start();
$isAdmin = $_SESSION['isAdmin'];
if(isset($_POST['name']))
{
    require_once '../classes/Pdo_methods.php';
  

    $sql="INSERT INTO contacts(con_name, con_address, con_city, con_state, con_email, con_DOB, con_contact, con_age)";
    extract($_POST);
   // $inputState="MI";
    $contact ="";

    if  (isset($inputState))
        $contact="inputState";
    else if(isset($emailUp))
        $contact="emailUp";
    else if(isset($text))
        $contact="text";
 
    
    $sql .= $values = " VALUES [:name, :address,:city,:inputState,:email,:birth,:contact, :age]";

    $bindings = array(
        array(':name',$name, 'str'),
        array(':address',$address, 'str'),
        array(':inputState',$inputState, 'str'),
        array(':email',$email, 'str'),
        array(':birth',$birth, 'str'),
        array(':contact',$address, 'str'),
        array(':age',$ageRange, 'str')

    );
    
    $pdo = new PdoMethods();
    $pdo->otherBinded($sql, $bindings);
//VALUES(10001, 'Matt Daida', '123 Someplace', 'Anywhere', 'MI', 'mdaida@test.com', '1999-02-23', 'textUpdates', '19-30');
die("stop");

}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Add Contact</title>
</head>
<body>
<form class="form-group" method="POST" action="addContact.php">
    <div class="container">
    <?php
        if($isAdmin){
            echo '<a href="pages/addContact.php">Add Contact</a>&nbsp;&nbsp;&nbsp;<a href="pages/deleteContacts.php">Delete Contact(s)</a>&nbsp;&nbsp;&nbsp;<a href="pages/addAdmin.php">Add Admin</a>&nbsp;&nbsp;&nbsp;<a href="pages/deleteAdmins.php">Delete Admin(s)</a>&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a>';
        }else {
            echo '<a href="pages/addContact.php">Add Contact</a>&nbsp;&nbsp;&nbsp;<a href="pages/deleteContacts.php">Delete Contact(s)</a>&nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a>';
        }
        ?>
        <h1>Add Contact</h1>
        <div class="mb-3">
            <label for="name">Name (letters only)</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Matt Daida">
         </div>
        <div class="mb-3">
            <label for="address">Address (just number and street)</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="123 Someplace">
         </div>
        <div class="mb-3">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Anywhere">
         </div>
        <div class="mb-3">
            <label for="state">State</label>
            <select id="inputState" name='inputState' class="form-control">
              <option>Alabama</option>
              <option>Arkansas</option>
              <option selected>Michigan</option>
              <option>Montana</option>
              <option>Oregon</option>
            </select>
          </div>
        <div class="mb-3">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="999.999.9999">
         </div>
        <div class="mb-3">
            <label for="email">Email Address</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="mdaida@test.com">
         </div>
        <div class="mb-3">
            <label for="birth">Date of Birth</label>
            <input type="date" class="form-control" id="birth" name="birth" placeholder="12/25/1999">
         </div>
         <div class="col-12">
            <label for="contact">Please check all contact types you would like (optional):</label>
         </div>
        <div class="form-check form-check-inline">
            <input class="contact-input" type="checkbox" value="newsletter" id="newsletter" name='newsletter'  />
            <label class="contact-label" for="newsletter">Newsletter</label>
         </div>
        <div class="form-check form-check-inline">
            <input class="contact-input" type="checkbox" value="emailUp" id="emailUp"  name='emailUp'/>
            <label class="contact-label" for="emailUp">Email Updates</label>
         </div>
        <div class="form-check form-check-inline">
            <input class="contact-input" type="checkbox" value="text" id="text"  name='text'/>
            <label class="contact-label" for="text">Text Updates</label>
         </div>
        <div class="col-12">
            <label for="contact">Please select an age range (you must select one):</label>
         </div>
        <div class="form-check form-check-inline">
            <input class="age-input" type="checkbox" value="0-18" id="0-18" name='ageRange'>
            <label class="age-label" for="0-18">0-18</label>
         </div>
        <div class="form-check form-check-inline">
            <input class="age-input" type="checkbox" value="19-30" id="19-30" name='ageRange'>
            <label class="age-label" for="19-30">19-30</label>
         </div>
        <div class="form-check form-check-inline">
            <input class="age-input" type="checkbox" value="31-50" id="31-50" name='ageRange'>
            <label class="age-label" for="31-50">31-50</label>
         </div>
        <div class="form-check form-check-inline">
            <input class="age-input" type="checkbox" value="51+" id="51+" name='ageRange'>
            <label class="age-label" for="51+">51+</label>
         </div>
        <div class="mb-3"> 
         <button type="submit" class="btn btn-primary">Submit</button>
         </div> 
    </div>
</form>
</body>
</html>