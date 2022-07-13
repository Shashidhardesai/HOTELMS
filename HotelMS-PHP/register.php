<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){

$server = "localhost";
$username = "root";
$password = "";
$database = "hotelms";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
            //     echo "success";
            // }
            // else{
                die("Error". mysqli_connect_error());
            }

            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $email = $_POST["email"];
            $number = $_POST["number"];
            $room_type = $_POST["room_type"];
            $ID_type = $_POST["ID_type"];
            $ID_num = $_POST["ID_num"]; 
            $check_in = $_POST["check_in"];
            $check_out = $_POST["check_out"];
            $address = $_POST["address"]; 
            $gender = $_POST["gender"];

                $sql = "INSERT INTO `customer_request` (`fname`, `lname`, `email`, `number`, `room_type`, `ID_type`, `ID_num`, `check_in`, `check_out`, `address`, `gender`, `created_at`) VALUES ('$fname', '$lname', '$email', '$number', '$room_type', '$ID_type', '$ID_num', '$check_in', '$check_out', '$address', '$gender', CURRENT_TIMESTAMP)";
                $result = mysqli_query($conn, $sql);
                if ($result)
                {
                    header("location: register.php?error=Your Booking has placed....Enjoy Your Stay ('_') ('_') ('_')");  
                }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Room</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/register1.css">
</head>
<body>
    <div class="main">  
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">Hotel Management System</h2>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="index1.php">HOME</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="register.php">BOOK_ROOMS</a></li>
                    <li><a href="login.php">ADMIN</a></li>
                </ul>
            </div>
            <div class="search">
                <input class="srch" type="search" name="" placeholder="Type To text">
                <a href="#"> <button class="btn1">Search</button></a>
            </div>
        </div>
    </div>

    <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } 
    ?>

    <div class="container">
        <div class="title">Booking Room</div>
        <form action="register.php" method="post">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">First Name</span>
                    <input type="text" placeholder="Enter Your First name" name="fname" required>
                </div>
                <div class="input-box">
                    <span class="details">Last Name</span>
                    <input type="text" placeholder="Enter Your Last name" name="lname" required>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" placeholder="Enter Your Email" name="email" required>
                </div>
                <div class="input-box">
                    <span class="details">Phone number</span>
                    <input type="tel" placeholder="Enter Your Phone number" name="number" minlength="10" maxlength="10" required>
                </div>

                <div class="input-box">
                <span class="details">Room Type</span>
                <select class="form-select" name="room_type" aria-label="Default select example">
                    <option selected>Room Type With One Day Pay</option>
                    <option>Single (₹ 1000)</option>
                    <option>Double (₹ 1500)</option>
                    <option>Triple (₹ 2000)</option>
                    <option>Family (₹ 3000)</option>
                    <option>King Sized (₹ 5500)</option>
                    <option>Master Suite (₹ 6500)</option>
                    <option>Mini Suite (₹ 3600)</option>
                    <option>Connecting Rooms (₹ 8000)</option>
                    <option>Presidential Suite (₹ 21000)</option>
                    <option>Murphy Room (₹ 6900)</option>
                </select>
                </div>

                <div class="input-box">
                <span class="details">ID Type</span>
                <select class="form-select" name="ID_type" aria-label="Default select example">
                    <option selected>ID Type</option>
                    <option>National Identity Card</option>
                    <option>Voter ID Card</option>
                    <option>Pan Card</option>
                    <option>Driving License</option>
                </select>
                </div>
                <div class="input-box">
                    <span class="details">ID Details</span>
                    <input type="text" name="ID_num" placeholder="Enter Your ID Details" class="form-control" required>
                </div>
                <div class="input-box">
                    <span class="details">Address</span>
                    <input type="text" placeholder="Enter Your Address" name="address" required>
                </div>
                <div class="input-box">
                    <span class="details">Check in Date</span>
                    <input type="text" placeholder="DD/MM/YYYY" name="check_in" required>
                </div>
                <div class="input-box">
                    <span class="details">Check out Date</span>
                    <input type="text" placeholder="DD/MM/YYYY" name="check_out" required>
                </div>

            </div>
            <div class="gender-details">
                <input type="radio" name="gender" id="dot-1" value="male" required>
                <input type="radio" name="gender" id="dot-2" value="female" required>
                <input type="radio" name="gender" id="dot-3" value="none" required>
             <span class="gender-title">Gender</span>
             <div class="category">
                 <label for="dot-1">
                     <span class="dot one"></span>
                     <span class="gender">Male</span>
                 </label>
                 <label for="dot-2">
                    <span class="dot two"></span>
                    <span class="gender">Female</span>
                </label>
                <label for="dot-3">
                    <span class="dot three"></span>
                    <span class="gender">Prefer not to say</span>
                </label>
              </div>
             </div>
             <button class="btn">Confirm Booking</button>
            
        </form>
        
    </div>

</body>
</html>


