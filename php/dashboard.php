<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: dashboard_login.php");
    exit;
}
$uname = $_SESSION["uname"];
?>
 
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard</title>
<link rel="icon" href="images/icon.ico">
 <!-- Bootstrap core CSS-->
 <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <!-- Custom fonts for this template-->
 <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


<style>
    #top{
    height: 130px; 
    background-color: aqua; 
    width: 100%;
    top: 0;
    padding-top: 10px;
    margin-bottom: 50px;
}
.btn{
    height: 40px;
    width: 200px;
    background-color: rgb(0, 81, 255);
    color: white;
    font-size: 20px;
    border: 0px;
}
.btn:hover{
    color: black;
}

.table{
    border: 2px solid black;
}
.hnf{
    background-color: rgb(201, 201, 201);
}
.b1{
    border: 1px solid rgb(139, 139, 139);
}
.b2{
    border: 1px solid black;
}
#logout{
    float: right;
    background-color:  rgb(0, 81, 255);
    color: white;
    border: 0px;
}
#logout:hover{
    color: black;
    border: 0px;
}
#username{
    float: right;
    background-color: red;
    color: white;
}
</style>

</head>

<body>

<div id="top">
    <span id="username"><?php
    echo $uname;
    ?></span><br>
    <button id="logout" onclick="document.location='logout.php'">LogOut</button>
<center>
    <h2>Trapo Tour Dashboard</h2>

<button onclick="message()" class="btn" id="m">Messages</button>
<button onclick="tourist()" class="btn" id="t">Tourists</button>
<button onclick="guides()" class="btn" id="g">Guides</button>
<button onclick="drivers()" class="btn" id="d">Drivers</button>
<button onclick="gbk()" class="btn" id="gbb">Guide Bookings</button>
<button onclick="dbk()" class="btn" id="dbb">Driver Bookings</button>

</center>
</div>



<!--Messages Tab-->
<div id="messages">
    <div>
        <table class="table" width="100%" cellspacing="0">
            <thead class="hnf">
                <tr>
                    <th class="b2">ID</th>
                    <th class="b2">Name</th>
                    <th class="b2">Email</th>
                    <th class="b2">Mobile</th>
                    <th class="b2">Message</th>
                </tr>
            </thead>
            <tfoot class="hnf">
                <tr>
                    <th class="b2">ID</th>
                    <th class="b2">Name</th>
                    <th class="b2">Email</th>
                    <th class="b2">Mobile</th>
                    <th class="b2">Message</th>
                </tr>
            </tfoot>
                <?php
                $servername = "localhost";
                $username = "sriarana_trapo";
                $password = "NSBMply20.1SE";
                $dbname = "sriarana_trapotour";
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                $sql = 'SELECT * from messages ORDER BY msgID DESC;';
                if (mysqli_query($conn, $sql)) {
                echo "";
                } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                $count=1;
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) { ?>
            <tbody>
                <tr>
                    <th class="b1">
                        <?php echo $row['msgID']; ?>
                    </th>
                    <td class="b1">
                        <?php echo $row['name']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['email']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['mobile']; ?>
                    </td>
                    <td style="text-align: left;"  class="b1">
                        <?php echo $row['message']; ?>
                    </td>
                </tr>
            </tbody>
            <?php
            $count++;
            }
            } else {
            echo '0 results';
            }
            ?>
        </table>
    </div>
</div>

<!--Tourist Tab-->
<div id="tourist">
    <div>
        <table class="table" width="100%" cellspacing="0">
            <thead class="hnf">
                <tr>
                    <th class="b2">ID</th>
                    <th class="b2">First Name</th>
                    <th class="b2">Last Name</th>
                    <th class="b2">Gender</th>
                    <th class="b2">Email</th>
                    <th class="b2">Mobile</th>
                    <th class="b2">Country</th>
                </tr>
            </thead>
            <tfoot class="hnf">
                <tr>
                    <th class="b2">ID</th>
                    <th class="b2">First Name</th>
                    <th class="b2">Last Name</th>
                    <th class="b2">Gender</th>
                    <th class="b2">Email</th>
                    <th class="b2">Mobile</th>
                    <th class="b2">Country</th>
                </tr>
            </tfoot>
                <?php
                $servername = "localhost";
                $username = "sriarana_trapo";
                $password = "NSBMply20.1SE";
                $dbname = "sriarana_trapotour";
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                $sql = 'SELECT * from tourists ORDER BY touristID DESC;';
                if (mysqli_query($conn, $sql)) {
                echo "";
                } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                $count=1;
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) { ?>
            <tbody>
                <tr>
                    <th class="b1">
                        <?php echo $row['touristID']; ?>
                    </th>
                    <td class="b1">
                        <?php echo $row['firstName']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['lastName']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['gender']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['email']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['mobile']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['country']; ?>
                    </td>
                </tr>
            </tbody>
            <?php
            $count++;
            }
            } else {
            echo '0 results';
            }
            ?>
        </table>
    </div>
</div>

<!--Guides Tab-->
<div id="guides">
    <div>
        <table class="table" width="100%" cellspacing="0">
            <thead class="hnf">
                <tr>
                    <th class="b2">ID</th>
                    <th class="b2">First Name</th>
                    <th class="b2">Last Name</th>
                    <th class="b2">Gender</th>
                    <th class="b2">Email</th>
                    <th class="b2">Mobile</th>
                    <th class="b2">City</th>
                    <th class="b2">Active</th>
                </tr>
            </thead>
            <tfoot class="hnf">
                <tr>
                    <th class="b2">ID</th>
                    <th class="b2">First Name</th>
                    <th class="b2">Last Name</th>
                    <th class="b2">Gender</th>
                    <th class="b2">Email</th>
                    <th class="b2">Mobile</th>
                    <th class="b2">City</th>
                    <th class="b2">Active</th>
                </tr>
            </tfoot>
                <?php
                $servername = "localhost";
                $username = "sriarana_trapo";
                $password = "NSBMply20.1SE";
                $dbname = "sriarana_trapotour";
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                $sql = 'SELECT * from guides ORDER BY guideID DESC;';
                if (mysqli_query($conn, $sql)) {
                echo "";
                } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                $count=1;
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) { ?>
            <tbody>
                <tr>
                    <th class="b1">
                        <?php echo $row['guideID']; ?>
                    </th>
                    <td class="b1">
                        <?php echo $row['firstName']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['lastName']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['gender']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['email']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['mobile']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['city']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['active']; ?>
                    </td>
                </tr>
            </tbody>
            <?php
            $count++;
            }
            } else {
            echo '0 results';
            }
            ?>
        </table>
    </div>
</div>

<!--Drivers Tab-->
<div id="drivers">
    <div>
        <table class="table" width="100%" cellspacing="0">
            <thead class="hnf">
                <tr>
                    <th class="b2">ID</th>
                    <th class="b2">First Name</th>
                    <th class="b2">Last Name</th>
                    <th class="b2">Gender</th>
                    <th class="b2">Email</th>
                    <th class="b2">Mobile</th>
                    <th class="b2">City</th>
                    <th class="b2">Active</th>
                </tr>
            </thead>
            <tfoot class="hnf">
                <tr>
                    <th class="b2">ID</th>
                    <th class="b2">First Name</th>
                    <th class="b2">Last Name</th>
                    <th class="b2">Gender</th>
                    <th class="b2">Email</th>
                    <th class="b2">Mobile</th>
                    <th class="b2">City</th>
                    <th class="b2">Active</th>
                </tr>
            </tfoot>
                <?php
                $servername = "localhost";
                $username = "sriarana_trapo";
                $password = "NSBMply20.1SE";
                $dbname = "sriarana_trapotour";
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                $sql = 'SELECT * from drivers ORDER BY driverID DESC;';
                if (mysqli_query($conn, $sql)) {
                echo "";
                } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                $count=1;
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) { ?>
            <tbody>
                <tr>
                    <th class="b1">
                        <?php echo $row['driverID']; ?>
                    </th>
                    <td class="b1">
                        <?php echo $row['firstName']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['lastName']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['gender']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['email']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['mobile']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['city']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['active']; ?>
                    </td>
                </tr>
            </tbody>
            <?php
            $count++;
            }
            } else {
            echo '0 results';
            }
            ?>
        </table>
    </div>
</div>

<!--Guide Bookings-->
<div id="gb">
    <div>
        <table class="table" width="100%" cellspacing="0">
            <thead class="hnf">
                <tr>
                    <th class="b2">G-Booking</th>
                    <th class="b2">Tourist ID</th>
                    <th class="b2">Guide ID</th>
                    <th class="b2">Date</th>
                    <th class="b2">City</th>
                    <th class="b2">Conform</th>
                </tr>
            </thead>
            <tfoot class="hnf">
                <tr>
                    <th class="b2">G-Booking</th>
                    <th class="b2">Tourist ID</th>
                    <th class="b2">Guide ID</th>
                    <th class="b2">Date</th>
                    <th class="b2">City</th>
                    <th class="b2">Conform</th>
                </tr>
            </tfoot>
                <?php
                $servername = "localhost";
                $username = "sriarana_trapo";
                $password = "NSBMply20.1SE";
                $dbname = "sriarana_trapotour";
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                $sql = 'SELECT * from gbookings ORDER BY gbID DESC;';
                if (mysqli_query($conn, $sql)) {
                echo "";
                } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                $count=1;
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) { ?>
            <tbody>
                <tr>
                    <th class="b1">
                        <?php echo $row['gbID']; ?>
                    </th>
                    <td class="b1">
                        <?php echo $row['touristID']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['guideID']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['date']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['city']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['conform']; ?>
                    </td>
                </tr>
            </tbody>
            <?php
            $count++;
            }
            } else {
            echo '0 results';
            }
            ?>
        </table>
    </div>
</div>

<!--Driver Bookings-->
<div id="db">
    <div>
        <table class="table" width="100%" cellspacing="0">
            <thead class="hnf">
                <tr>
                    <th class="b2">D-Booking</th>
                    <th class="b2">Tourist ID</th>
                    <th class="b2">Driver ID</th>
                    <th class="b2">Date</th>
                    <th class="b2">From</th>
                    <th class="b2">To</th>
                    <th class="b2">Conform</th>
                </tr>
            </thead>
            <tfoot class="hnf">
                <tr>
                    <th class="b2">D-Booking</th>
                    <th class="b2">Tourist ID</th>
                    <th class="b2">Driver ID</th>
                    <th class="b2">Date</th>
                    <th class="b2">From</th>
                    <th class="b2">To</th>
                    <th class="b2">Conform</th>
                </tr>
            </tfoot>
                <?php
                $servername = "localhost";
                $username = "sriarana_trapo";
                $password = "NSBMply20.1SE";
                $dbname = "sriarana_trapotour";
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                $sql = 'SELECT * from dbookings ORDER BY dbID DESC;';
                if (mysqli_query($conn, $sql)) {
                echo "";
                } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                $count=1;
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) { ?>
            <tbody>
                <tr>
                    <th class="b1">
                        <?php echo $row['dbID']; ?>
                    </th>
                    <td class="b1">
                        <?php echo $row['touristID']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['driverID']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['date']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['fromWhere']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['toWhere']; ?>
                    </td>
                    <td class="b1">
                        <?php echo $row['conform']; ?>
                    </td>
                </tr>
            </tbody>
            <?php
            $count++;
            }
            } else {
            echo '0 results';
            }
            ?>
        </table>
    </div>
</div>

<script>

var m = document.getElementById("messages");
m.style.display = "none";
var t = document.getElementById("tourist");
t.style.display = "none";
var g = document.getElementById("guides");
g.style.display = "none";
var d = document.getElementById("drivers");
d.style.display = "none";
var gb = document.getElementById("gb");
gb.style.display = "none";
var db = document.getElementById("db");
db.style.display = "none";

function resetColor(){
    document.getElementById("m").style.backgroundColor="rgb(0, 81, 255)";
    document.getElementById("t").style.backgroundColor="rgb(0, 81, 255)";
    document.getElementById("g").style.backgroundColor="rgb(0, 81, 255)";
    document.getElementById("d").style.backgroundColor="rgb(0, 81, 255)";
    document.getElementById("gbb").style.backgroundColor="rgb(0, 81, 255)";
    document.getElementById("dbb").style.backgroundColor="rgb(0, 81, 255)"; 
}
function message() {
    resetColor();
    m.style.display = "block";
    t.style.display = "none";
    g.style.display = "none";
    d.style.display = "none";
    gb.style.display = "none";
    db.style.display = "none";
    document.getElementById("m").style.backgroundColor="rgb(213, 123, 255)";
}
function tourist() {
    resetColor();
    m.style.display = "none";
    t.style.display = "block";
    g.style.display = "none";
    d.style.display = "none";
    gb.style.display = "none";
    db.style.display = "none";
    document.getElementById("t").style.backgroundColor="rgb(213, 123, 255)";
}
function guides() {
    resetColor();
    m.style.display = "none";
    t.style.display = "none";
    g.style.display = "block";
    d.style.display = "none";
    gb.style.display = "none";
    db.style.display = "none";
    document.getElementById("g").style.backgroundColor="rgb(213, 123, 255)";
}
function drivers() {
    resetColor();
    m.style.display = "none";
    t.style.display = "none";
    g.style.display = "none";
    d.style.display = "block";
    gb.style.display = "none";
    db.style.display = "none";
    document.getElementById("d").style.backgroundColor="rgb(213, 123, 255)";
}
function gbk() {
    resetColor();
    m.style.display = "none";
    t.style.display = "none";
    g.style.display = "none";
    d.style.display = "none";
    gb.style.display = "block";
    db.style.display = "none";
    document.getElementById("gbb").style.backgroundColor="rgb(213, 123, 255)";
}
function dbk() {
    resetColor();
    m.style.display = "none";
    t.style.display = "none";
    g.style.display = "none";
    d.style.display = "none";
    gb.style.display = "none";
    db.style.display = "block";
    document.getElementById("dbb").style.backgroundColor="rgb(213, 123, 255)";
}

</script>

</body>
</html>

