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
    <title>Dashboard</title>

    <!-- CSS -->
    <link href="css/styles.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link href="https://unpkg.com/maplibre-gl/dist/maplibre-gl.css" rel="stylesheet" />
    <script src="https://unpkg.com/maplibre-gl/dist/maplibre-gl.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha384-cxOPjt7s7Iz04uaHJceBmS+qpjv2JkIHNVcuOrM+YHwZOmJGBXI00mdUXEq65HTH"
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
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
                            aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Tower Panel
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="index.php">Dashboard</a>
                                <a class="nav-link" href="toweractive.php">Active Tower</a>
                                <a class="nav-link" href="towerinactive.php">Inactive Tower</a>
                                <a class="nav-link" href="maintenance.php">Under Maintenance</a>
                            </nav>
                        </div>
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
                    <h1 class="mt-4">Inactive Tower</h1>

                    <div class="card mb-4">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Add New Data
                            </button>

                            <a href="export.php" class="btn btn-info">Export Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tower name</th>
                                            <th>Operator</th>
                                            <th>Link Address</th>
                                            <th>Latitiude</th>
                                            <th>Longitude</th>
                                            <th>Heigh</th>
                                            <th>Tower Type</th>
                                            <th>Installation Date</th>
                                            <th>Maintenance Date</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $showData = mysqli_query($conn, "SELECT * FROM tower WHERE status='Inactive'");
                                        while ($data = mysqli_fetch_array($showData)) {
                                            $id = $data["id"];
                                            $name = $data["tower_name"];
                                            $operator = $data["operator"];
                                            $latitude = $data["latitude"];
                                            $longitude = $data["longitude"];  // Perbaiki penamaan jika typo
                                            $address = $data["address"];
                                            $type = $data["tower_type"];
                                            $status = $data["status"];
                                            $height = $data["height"];
                                            $installation = $data["installation_date"];
                                            $maintenance = $data["maintenance_date"];
                                            ?>
                                            <tr>
                                                <td><?php echo $id; ?></td>
                                                <td><?php echo $name; ?></td>
                                                <td><?php echo $operator; ?></td>
                                                <td><a href="<?php echo $address; ?>"><?php echo $address; ?></a></td>
                                                <td><?php echo $latitude; ?></td>
                                                <td><?php echo $longitude; ?></td>
                                                <td><?php echo $height; ?></td>
                                                <td><?php echo $type; ?></td>
                                                <td><?php echo $installation; ?></td>
                                                <td><?php echo $maintenance; ?></td>
                                                <td><?php echo $status; ?></td>
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
                                                                    <label for="inputId" class="form-label">Tower ID</label>
                                                                    <input type="text" class="form-control"
                                                                        id="inputTowerId" name="id" required
                                                                        value="<?php echo $id; ?>">
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label for="inputName" class="form-label">Tower
                                                                        Name</label>
                                                                    <input type="text" class="form-control"
                                                                        id="inputTowerName" name="tower_name"
                                                                        value="<?php echo $name; ?>" required>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <label for="inputOperator"
                                                                        class="form-label">Operator</label>
                                                                    <br>
                                                                    <select id="inputOperator" class="form-select"
                                                                        name="operator" value="<?php echo $operator; ?>"
                                                                        required>
                                                                        <option selected>Choose...</option>
                                                                        <option>Operator A</option>
                                                                        <option>Operator B</option>
                                                                        <option>Operator C</option>
                                                                        <option>Operator D</option>
                                                                        <option>Operator E</option>
                                                                        <option>Operator F</option>
                                                                        <option>Operator G</option>
                                                                        <option>Operator H</option>
                                                                        <option>Operator I</option>
                                                                        <option>Operator J</option>
                                                                        <option>Operator K</option>
                                                                        <option>Operator L</option>
                                                                        <option>Operator M</option>
                                                                        <option>Operator N</option>
                                                                    </select>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label for="inputLatitude"
                                                                        class="form-label">Latitude</label>
                                                                    <input type="text" class="form-control"
                                                                        id="inputLatitude" name="latitude"
                                                                        value="<?php echo $latitude; ?>" required>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label for="inputLongitude"
                                                                        class="form-label">Longitude</label>
                                                                    <input type="text" class="form-control"
                                                                        id="inputLongitude" name="longitude"
                                                                        value="<?php echo $longitude; ?>" required>
                                                                </div>

                                                                <div class="col-12">
                                                                    <label for="inputAddress" class="form-label">Link
                                                                        Address</label>
                                                                    <input type="text" class="form-control"
                                                                        id="inputAddress" name="address"
                                                                        value="<?php echo $address; ?>" required>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label for="inputTyPE" class="form-label">Tower
                                                                        Type</label>
                                                                    <input type="text" class="form-control"
                                                                        id="inputTowerType" name="tower_type"
                                                                        value="<?php echo $type; ?>" required>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <label for="inputStatus"
                                                                        class="form-label">Status</label>
                                                                    <br>
                                                                    <select id="inputStatus" class="form-select"
                                                                        value="<?php echo $status; ?>" name="status"
                                                                        required>
                                                                        <option selected>Choose...</option>
                                                                        <option>Active</option>
                                                                        <option>Inactive</option>
                                                                        <option>Under Maintenance</option>
                                                                    </select>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <label for="inputHeight"
                                                                        class="form-label">Height</label>
                                                                    <input type="text" class="form-control" id="inputHeight"
                                                                        value="<?php echo $height; ?>" name="height"
                                                                        required>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <label for="inputDate" class="form-label">Installation
                                                                        Date</label>
                                                                    <input type="date" class="form-control"
                                                                        id="inputInstallationDate" name="installation_date"
                                                                        value="<?php echo $installation; ?>" required>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="inputDate" class="form-label">Maintenance
                                                                        Date</label>
                                                                    <input type="date" class="form-control"
                                                                        id="inputMaintenanceDate" name="maintenance_date"
                                                                        value="<?php echo $maintenance; ?>" required>
                                                                </div>

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
                                                                        id="applyBtn" name="update_btn">Update</button>
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
                                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                                <button type="submit" name="delete_btn"
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

                        <div class="col-md-2">
                            <label for="inputId" class="form-label">Tower ID</label>
                            <input type="text" class="form-control" id="inputTowerId" name="id" required>
                        </div>

                        <div class="col-md-6">
                            <label for="inputName" class="form-label">Tower Name</label>
                            <input type="text" class="form-control" id="inputTowerName" name="tower_name" required>
                        </div>

                        <div class="col-md-4">
                            <label for="inputOperator" class="form-label">Operator</label>
                            <br>
                            <select id="inputOperator" class="form-select" name="operator" required>
                                <option selected>Choose...</option>
                                <option>Operator A</option>
                                <option>Operator B</option>
                                <option>Operator C</option>
                                <option>Operator D</option>
                                <option>Operator E</option>
                                <option>Operator F</option>
                                <option>Operator G</option>
                                <option>Operator H</option>
                                <option>Operator I</option>
                                <option>Operator J</option>
                                <option>Operator K</option>
                                <option>Operator L</option>
                                <option>Operator M</option>
                                <option>Operator N</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="inputLatitude" class="form-label">Latitude</label>
                            <input type="text" class="form-control" id="inputLatitude" name="latitude" required>
                        </div>

                        <div class="col-md-6">
                            <label for="inputLongitude" class="form-label">Longitude</label>
                            <input type="text" class="form-control" id="inputLongitude" name="longitude" required>
                        </div>

                        <div class="col-md-12">
                            <label for="inputAddress" class="form-label">Link Address</label>
                            <input type="text" class="form-control" id="inputAddress"
                                placeholder="https://maps.google.com/?q=-7.79722,110.36880" name="address" required>
                        </div>


                        <div class="col-md-6">
                            <label for="inputTyPE" class="form-label">Tower Type</label>
                            <input type="text" class="form-control" id="inputTowerType" name="tower_type" required>
                        </div>

                        <div class="col-md-4">
                            <label for="inputStatus" class="form-label">Status</label>
                            <br>
                            <select id="inputStatus" class="form-select" name="status" required>
                                <option selected>Choose...</option>
                                <option>Active</option>
                                <option>Inactive</option>
                                <option>Under Maintenance</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label for="inputHeight" class="form-label">Height</label>
                            <input type="text" class="form-control" id="inputHeight" name="height" required>
                        </div>

                        <div class="col-md-6">
                            <label for="inputDate" class="form-label">Installation Date</label>
                            <input type="date" class="form-control" id="inputInstallationDate" name="installation_date"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label for="inputDate" class="form-label">Maintenance Date</label>
                            <input type="date" class="form-control" id="inputMaintenanceDate" name="maintenance_date"
                                required>
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
                            <button type="submit" class="btn btn-primary" id="applyBtn" name="add_btn">Add</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>