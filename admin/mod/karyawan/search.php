<?php
// Koneksi
$conn = mysqli_connect("localhost", "root", "");

if (!$conn) {
    echo "Koneksi gagal" . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cari Data</title>
</head>
<body>
    <h1>Data Pegawai</h1>
    
    <form method="get" action=""></form>
        <label for="cari">Cari Pegawai</label>
        <input type="text" name="cari">
    </form>

    <table border="1">
        <thead>
            <tr>
                <td>No.</td>
                <td>ID Pengguna</td>
                <td>Nama</td>
                <td>Email</td>
                <td>Jabatan</td>
                <td>Shift</td>
                <td>Lokasi</td>
            </tr>
        </thead>
        <tbody>

        <?php
        $no = 1;
        // Tampilkan data tb_employees
        $query = mysqli_query($conn, "SELECT * FROM tb_employees");

        if (isset($_GET['cari'])) {
            $query = mysqli_query($conn, "SELECT * FROM tb_employees WHERE employees_name LIKE '%".
                $_GET['cari']."%'");
        }

        $query = mysqli_query($conn, "SELECT * FROM tb_employees");
        while($dt = mysqli_fetch_assoc($query)) {
        ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= $dt['employees_code']; ?></td>
            <td><?= $dt['employees_name']; ?></td>
            <td><?= $dt['employees_email']; ?></td>
            <td><?= $dt['position_id']; ?></td>
            <td><?= $dt['shif_id']; ?></td>
            <td><?= $dt['building_id']; ?></td>
        </tr>

        <?php
        }
        ?>
        </tbody>
    </table> 
</body>
</html>