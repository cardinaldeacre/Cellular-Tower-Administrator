<?php
session_start();

$servername = "localhost"; // Nama host database
$username = "root";        // Username database (sesuaikan)
$password = "";            // Password database (sesuaikan)
$dbname = "tower_admin";  // Nama database yang digunakan
// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// tambah baru
if (isset($_POST["add_btn"])) {
    $twid = $_POST["id"];
    $twrname = $_POST["tower_name"];
    $twoperator = $_POST["operator"];
    $twlatitude = $_POST["latitude"];
    $twlongitude = $_POST["longitude"];
    $twaddress = $_POST["address"];
    $twtype = $_POST["tower_type"];
    $twstatus = $_POST["status"];
    $twheight = $_POST["height"];
    $twinstallation = $_POST["installation_date"];
    $twmaintenance = $_POST["maintenance_date"];

    $addtable = mysqli_query($conn, "INSERT INTO tower 
    (id, tower_name, operator, latitude, longitude, address, height,
     tower_type, installation_date, maintenance_date, status) VALUES
     ('$twid', '$twrname', '$twoperator', '$twlatitude', '$twlongitude', '$twaddress', '$twheight', '$twtype', '$twinstallation', '$twmaintenance', '$twstatus' )");

    if ($addtable) {
        header('location:index.php');
    } else {
        echo 'fail';
        header('location:index.php');
    }
}

// Update
if (isset($_POST['update_btn'])) {
    $uid = $_POST["id"];
    $uname = $_POST["tower_name"];
    $uoperator = $_POST["operator"];
    $ulatitude = $_POST["latitude"];
    $ulongitude = $_POST["longitude"];
    $uaddress = $_POST["address"];
    $utype = $_POST["tower_type"];
    $ustatus = $_POST["status"];
    $uheight = $_POST["height"];
    $uinstallation = $_POST["installation_date"];
    $umaintenance = $_POST["maintenance_date"];

    $update = mysqli_query($conn, "UPDATE tower SET 
        tower_name='$uname',
        operator='$uoperator', 
        latitude='$ulatitude', 
        longitude='$ulongitude', 
        address='$uaddress',
        height='$uheight', 
        tower_type='$utype', 
        installation_date='$uinstallation', 
        maintenance_date='$umaintenance',
        status='$ustatus' 
        WHERE id='$uid'");

    if ($update) {
        header('Location: index.php');
        exit;
    } else {
        echo 'Failed to update data: ' . mysqli_error($conn);
        header('location:index.php');
    }
}

// Delete 
if (isset($_POST['delete_btn'])) {
    $did = $_POST['id'];
    $delete = mysqli_query($conn, "DELETE FROM tower WHERE id='$did'");

    if ($delete) {
        header('Location: index.php');
        exit;
    } else {
        echo 'Failed to delete data: ' . mysqli_error($conn);
    }
}

if (isset($_POST['add_admin'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $queryinsert = mysqli_query($conn, "INSERT INTO login 
    (email_address, password) VALUES ('$email', '$pass')");
    if ($queryinsert) {
        header("location:admin.php");
    } else {
        echo 'Failed to add data: ' . mysqli_error($conn);
        header('location:admin.php');
    }
}

if (isset($_POST['update_admin'])) {
    $uemail = $_POST['newemail'];
    $upass = $_POST['newpassword'];
    $uid = $_POST['iduser'];

    // Query yang benar menggunakan koma untuk memisahkan kolom
    $queryupdate = mysqli_query($conn, "UPDATE login SET 
    email_address = '$uemail', 
    password = '$upass' 
    WHERE iduser = '$uid'");

    if ($queryupdate) {
        header("location:admin.php");
    } else {
        echo 'Failed to update data: ' . mysqli_error($conn);
        header('location:admin.php');
    }
}

if (isset($_POST['delete_admin'])) {
    $dnid = $_POST['idn'];
    $deleteAdmin = mysqli_query($conn, "DELETE FROM login WHERE iduser='$dnid'");

    if ($deleteAdmin) {
        header('Location: admin.php');
        exit;
    } else {
        echo 'Failed to delete data: ' . mysqli_error($conn);
    }
}



?>