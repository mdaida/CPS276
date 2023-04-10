<?php
require_once 'Pdo_methods.php';

class Note {
    private $pdo;
   
    public function __construct($pdo) {
    $this->pdo = $pdo;
  }
  
  public function addNote() {
    if (isset($_POST['submit'])) {
      $dateTime = $_POST['dateTime'];
      $note = $_POST['note'];
      
      if (empty($dateTime) || empty($note)) {
        echo "<p>Please enter a date, time, and note.</p>";
      } else {

        $timestamp = strtotime($dateTime);
        
        $stmt = $this->pdo->prepare("INSERT INTO notes (timestamp, note) VALUES (?, ?)");
        $stmt->bind_param("is", $timestamp, $note);
        if ($stmt->execute()) {
          echo "<p>Note added successfully.</p>";
        } else {
          echo "Error: " . $stmt->error;
        }
      }
    }
  }
  
  public function displayNotes() {
    if (isset($_POST['getNotes'])) {
      $begDate = $_POST['begDate'];
      $endDate = $_POST['endDate'];
      
      if (empty($begDate) || empty($endDate)) {
        echo "<p>Please select a beginning and ending date.</p>";
      } else {
        $begTimestamp = strtotime($begDate);
        $endTimestamp = strtotime($endDate);
        
        $stmt = $this->pdo->prepare("SELECT * FROM notes WHERE timestamp BETWEEN ? AND ? ORDER BY timestamp DESC");
        $stmt->bind_param("ii", $begTimestamp, $endTimestamp);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if (mysqli_num_rows($result) > 0) {
          echo "<table>";
          echo "<tr><th>Date/Time</th><th>Note</th></tr>";
          while ($row = mysqli_fetch_assoc($result)) {
            $dateTime = date('m/d/Y h:i A', $row['timestamp']);
            $note = $row['note'];
            echo "<tr><td>$dateTime</td><td>$note</td></tr>";
          }
          echo "</table>";
        } else {
          echo "<p>No notes found for selected date range.</p>";
        }
      }
    }
  }
}

$pdo = new Pdomethods;
$note = new Note($pdo);
$note->addNote();
$note->displayNotes();
?>