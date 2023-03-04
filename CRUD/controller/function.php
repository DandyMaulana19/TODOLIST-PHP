<?php
include 'connection.php';

function query($query)
{
  global $connect;
  $result = mysqli_query($connect, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function add($data){
    global $connect;
    $task = htmlspecialchars($data['task']);
    $date = htmlspecialchars($data['date']);
    mysqli_query($connect, "INSERT INTO crud VALUES('', '$task', '$date')");
    return mysqli_affected_rows($connect);
}

function update($data){
  global $connect;
  $id = $data["id"];
  $task = htmlspecialchars($data["task"]);
  $date = htmlspecialchars($data["date"]);

  $query = "UPDATE crud SET task = '$task', date = '$date' WHERE id = $id";
  mysqli_query($connect, $query);
  return mysqli_affected_rows($connect);
}

function delete($id)
{
  global $connect;
  $query = "DELETE FROM crud WHERE id = $id";
  mysqli_query($connect, $query);
  return mysqli_affected_rows($connect);
}
?>