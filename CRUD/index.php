<?php
require 'controller/function.php';
// Get Todo
$cruds = query("SELECT * FROM crud ");
// Add Todo
if (isset($_POST['submit'])) {
  if (add($_POST) > 0) {
    echo "<script>
      document.location.href = 'index.php';
    </script>";
  } else {
    echo "<script>
      alert('Data gagal ditambahkan');
      document.location.href = 'index.php';
    </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="bg-info">
            <div class="container pt-3">
                <h1 class="mt-3 text-center text-white">TODO LIST</h1>
                <div class="py-3 justify-content-center">
                        <form action="" method="POST" class="row justify-content-center" name="submit">
                            <input type="text" class="border-0 form-control-sm ms-3 col-5" placeholder="New Task" name="task" id="task">
                            <input type="date" class="border-0 form-control-sm ms-3 col-auto" name="date" id="date">
                            <button type="submit" class="btn btn-primary ms-3 col-auto" name="submit" id="submit">Add Task</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="table-data mx-5 mt-3 align-middle">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>    
                        <th scope="col ">Task</th>
                        <th scope="col">Date</th>
                        <th scope="col" width="150px" class="col text-center">Button</th>
                    </tr>
                <?php $i=1;?>
                <?php foreach($cruds as $crud):?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $crud["Task"];?></td>
                    <td><?php echo $crud["Date"];?></td>
                    <td class="d-flex flex-col">
                        <a href="edit.php?id=<?= $crud["id"];?>" class="btn btn-success">Update<a>
                        <a href="delete.php?id=<?= $crud["id"];?>" class="btn btn-danger">Delete<a>
                    </td>   
                </tr>
                <?php $i++;?>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>