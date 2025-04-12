<?php
require 'functions.php';
require 'check.php';
?>

<html>

<head>
    <title>Stock Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="container">
        <h2>Cellular Tower Data</h2>
        <h4>(Asset)</h4>
        <div class="data-tables datatable-dark">

            <!-- Masukkan table nya disini, dimulai dari tag TABLE -->
            <table class="table table-bordered" id="mauexport" width="100%" cellspacing="0">
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

                    </tr>
                </thead>

                <tbody>
                    <?php
                    $showData = mysqli_query($conn, "SELECT * FROM tower WHERE status='Under Maintenance'");
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
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>

            </table>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#mauexport').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel',
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',  // Atur orientasi ke landscape
                        pageSize: 'A4',  // Pilih ukuran halaman
                        title: 'Tower Data Report',
                        exportOptions: {
                            columns: ':visible'  // Sesuaikan untuk menampilkan semua kolom yang diinginkan
                        }
                    },
                    {
                        extend: 'print',
                        orientation: 'landscape',  // Tambahkan orientasi untuk tombol print
                        autoPrint: true,
                        exportOptions: {
                            columns: ':visible'
                        }
                    }
                ]
            });
        });


    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



</body>

</html>