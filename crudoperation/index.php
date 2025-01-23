<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
  <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon">
  <title>PHP CRUD Operations</title>
</head>

<body>
  <div class="container">
    <div class="py-4">
      <a href="./create.php" class="btn btn-secondary">
        <i class="bi bi-plus-circle-fill"></i> Add 
      </a>
    </div>


    <table class="table table-bordered table-striped align-middle">
      <thead>
        <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Password</th>
          <th>confirm</th>
          <th>phone</th>
          <th>Address</th>
          <th>email</th>
          <th>Gender</th>
          <th>hobby</th>
          <th>country</th>
          <th>profileimage</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php

        require_once "config.php";


        $sql = "SELECT * FROM employees";

        if ($result = mysqli_query($link, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $count = 1;
            foreach ($rows as $row) { ?>
              <tr>
                <td><?= $count++; ?></td>
                <td><?= $row["first_name"]; ?></td>
                <td><?= $row["last_name"]; ?></td>
                <td><?= $row["password"]; ?></td>
                <td><?= $row["confirm_password"]; ?></td>
                <td><?= $row["phone"]; ?></td>
                <td><?= $row["address"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["gender"]; ?></td>
                <td><?= $row["hobby"]; ?></td>
                <td><?= $row["country"]; ?></td>
                <td><img src="images/<?php  echo $row['profile_image'];?>" width="80" height="80"></td>
                <td>
                  <a href="./update.php?id=<?= $row["id"]; ?>" class="btn btn-primary btn-sm">
                    <i class="bi bi-pencil-square"></i>
                  </a>&nbsp;
                  <a href="./delete.php?id=<?= $row["id"]; ?>" class="btn btn-danger btn-sm">
                    <i class="bi bi-trash-fill"></i>
                  </a>
                </td>
              </tr>
            <?php
            }
          
            mysqli_free_result($result);
          } else { ?>
            <tr>
              <td class="text-center text-danger fw-bold" colspan="13">** No records were found **</td>
            </tr>
        <?php
          }
        }
      //conn check
        mysqli_close($link);
        ?>
      </tbody>
    </table>
  </div>

  <script>
    const delBtnEl = document.querySelectorAll(".btn-danger");
    delBtnEl.forEach(function(delBtn) {
      delBtn.addEventListener("click", function(e) {
        const message = confirm("Are you sure you want to delete this record?");
        if (message == false) {
          e.preventDefault();
        }
      });
    });
  </script>
</body>

</html>