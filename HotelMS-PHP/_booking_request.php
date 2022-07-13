<?php  

// INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, 'But Books', 'Please buy books from Store', current_timestamp());
$insert = false;
$update = false;
$delete = false;
// Connect to the Database 
$servername = "localhost";
$username = "root";
$password = "";
$database = "hotelms";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `customer_request` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if (isset( $_POST['snoEdit'])){
  // Update the record
    $sno = $_POST["snoEdit"];
    $status = $_POST["statusEdit"];

  // Sql query to be executed
  $sql = "UPDATE `customer_request` SET `status` = '$status' WHERE `customer_request`.`sno` = $sno";
  $result = mysqli_query($conn, $sql);
  if($result){
    $update = true;
}
else{
    echo "We could not update the record successfully";
}
}
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="css/book_req.css">


  <title>Booking Request</title>

</head>

<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">

            <a class="navbar-brand" href="index.php?dashboard"><span>Hotel </span>Management System</a>
            <a class="navbar-brand" href="_booking_request.php?dashboard"><span>Booking </span>Request</a><br>
            <a class="navbar-brand" href="logout.php"><i class="fa fa-power-off" style="color:red;"></i><span>Logout </span></a>
        </div>
    </div><!-- /.container-fluid -->
</nav>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit this Request</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="_booking_request.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="title">Booking Status</label>
              <input type="text" class="form-control" id="statusEdit" name="statusEdit" aria-describedby="emailHelp">
            </div>
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
  if($delete){
    echo "The Booking Requested Has Deleted Successfully ---> ". mysqli_error($conn);

  }
  ?>
  <?php
  if($update){
    echo "The Booking Requested Updated Successfully ---> ". mysqli_error($conn);

  }
  ?>

  <div class="container my-4">


    <table class="table" id="myTable">
      <thead>
        <tr class="table1">
          <th scope="col">S.No</th>
          <th scope="col">Fname</th>
          <th scope="col">Lname</th>
          <th scope="col">Email</th>
          <th scope="col">Number</th>
          <th scope="col">Room_type</th>
          <th scope="col">ID_type</th>
          <th scope="col">ID_num</th>
          <th scope="col">Address</th>
          <th scope="col">Check_in</th>
          <th scope="col">Check_out</th>
          <th scope="col">Gender</th>
          <th scope="col">Status</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `customer_request`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['fname'] . "</td>
            <td>". $row['lname'] . "</td>
            <td>". $row['email'] . "</td>
            <td>". $row['number'] . "</td>
            <td>". $row['room_type'] . "</td>
            <td>". $row['ID_type'] . "</td>
            <td>". $row['ID_num'] . "</td>
            <td>". $row['address'] . "</td>
            <td>". $row['check_in'] . "</td>
            <td>". $row['check_out'] . "</td>
            <td>". $row['gender'] . "</td>
            <td>". $row['status'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button>  </td>
          </tr>";
        } 
          ?>


      </tbody>
    </table>
  </div>
  <hr>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>
  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        status = tr.getElementsByTagName("td")[11].innerText;

        console.log(status);

        statusEdit.value = status;
        snoEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this Booking Request!")) {
          console.log("yes");
          window.location = `_booking_request.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>
</body>

</html>


<!-- edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        fname = tr.getElementsByTagName("td")[0].innerText;
        lname = tr.getElementsByTagName("td")[1].innerText;
        email = tr.getElementsByTagName("td")[2].innerText;
        number = tr.getElementsByTagName("td")[3].innerText;
        room_type = tr.getElementsByTagName("td")[4].innerText;
        ID_type = tr.getElementsByTagName("td")[5].innerText;
        ID_num = tr.getElementsByTagName("td")[6].innerText;
        address = tr.getElementsByTagName("td")[7].innerText;
        check_in = tr.getElementsByTagName("td")[8].innerText;
        check_out = tr.getElementsByTagName("td")[9].innerText;
        gender = tr.getElementsByTagName("td")[10].innerText;
        status = tr.getElementsByTagName("td")[11].innerText;

        console.log(fname, lname, email, number ,room_type, ID_type, ID_num, address, check_in, check_out, gender, status);
        fnameEdit.value = fname;
        lnameEdit.value = lname;
        emailEdit.value = email;
        numberEdit.value = number;
        room_typeEdit.value = room_type;
        ID_typeEdit.value = ID_type;
        ID_numEdit.value = ID_num;
        addressEdit.value = address;
        check_inEdit.value = check_in;
        check_outEdit.value = check_out;
        genderEdit.value = gender;
        statusEdit.value = status;
        snoEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    }) -->