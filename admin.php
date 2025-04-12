<?php
require 'functions.php';
require 'check.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Dashboard untuk manajemen data menara">
    <meta name="author" content="Acre">
    <title>Admin Manager</title>

    <!-- CSS -->
    <link href="css/styles.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link href="https://unpkg.com/maplibre-gl/dist/maplibre-gl.css" rel="stylesheet" />
    <script src="https://unpkg.com/maplibre-gl/dist/maplibre-gl.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha384-XQoYMqMTK8LvAX6X1+Zt1DXHOz3ljM3kz3fG1GgIkbE0EnZ3bH9klsP9e0pHnQQ9"
        crossorigin="anonymous"></script>
</head>


<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Cellular Tower Admin</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="toweractive.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Active Tower
                        </a>
                        <a class="nav-link" href="towerinactive.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Inactive Tower
                        </a>
                        <a class="nav-link" href="maintenance.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Under Maintenance
                        </a>
                        <a class="nav-link" href="admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Admin Manager
                        </a>
                        <a class="nav-link" href="logout.php">

                            Log Out
                        </a>

                    </div>
                </div>

            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Dashboard</h1>

                    <div class="card mb-4">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Add New Administrator
                            </button>

                            <a href="export.php" class="btn btn-info">Export Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Email Admin</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $showDataAdmin = mysqli_query($conn, "SELECT * FROM login");
                                        $i = 1;
                                        while ($data = mysqli_fetch_array($showDataAdmin)) {
                                            $id = $data["iduser"];
                                            $email = $data["email_address"];
                                            ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $email; ?></td>

                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#edit<?php echo $id; ?>">
                                                        Edit
                                                    </button>
                                                    <input type="hidden" name="idmaudihapus" value="<?php echo $id; ?>">
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#delete<?php echo $id; ?>">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="edit<?php echo $id; ?>">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Data</h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <form id="formSubmit" class="row g-3" method="POST" action="">

                                                                <div class="col-md-2">
                                                                    <input type="hidden" class="form-control"
                                                                        value="<?php echo $id; ?>" name="iduser">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="inputId" class="form-label">Email
                                                                        Admin</label>
                                                                    <input type="email" class="form-control" name="newemail"
                                                                        required value="<?php echo $email; ?>">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="inputName" class="form-label">New Password
                                                                    </label>
                                                                    <input type="password" class="form-control"
                                                                        id="inputPassword" name="newpassword">
                                                                </div>
                                                                <br>
                                                                <div class="col-12">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            id="gridCheck" required>
                                                                        <label class="form-check-label" for="gridCheck">
                                                                            Double Checked
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <button type="submit" class="btn btn-primary"
                                                                        id="applyBtn" name="update_admin">Update</button>
                                                                </div>


                                                            </form>
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="delete<?php echo $id; ?>">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Data</h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this data?
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <!-- Tambahkan form untuk menghapus data -->
                                                            <form method="POST" action="">
                                                                <input type="hidden" name="idn" value="<?php echo $id; ?>">
                                                                <button type="submit" name="delete_admin"
                                                                    class="btn btn-danger">Delete</button>
                                                            </form>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <?php
                                        }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add New Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="formSubmit" class="row g-3" method="POST" action="">

                        <div class="col-md-6">
                            <label for="inputId" class="form-label">Admin Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>

                        <div class="col-md-6">
                            <label for="inputName" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>



                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck" required>
                                <label class="form-check-label" for="gridCheck">
                                    Double Checked
                                </label>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" id="applyBtn" name="add_admin">Add</button>
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>