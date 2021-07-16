<?php
include 'koneksi.php';



if (isset($_GET['no_id'])) {
    $delete = mysqli_query($conn, "DELETE FROM zakat where no_id='" . $_GET['no_id'] . "' ");

    $select = mysqli_query($conn, "SELECT * FROM zakat ");
    if (mysqli_num_rows($select) == 0) {
        mysqli_query($conn, "ALTER TABLE zakat AUTO_INCREMENT = 1");
    } elseif (mysqli_num_rows($select) > 0) {
        $reorderautoIncreement1 = mysqli_query($conn, "ALTER TABLE zakat DROP no_id");
        $reorderautoIncreement2 = mysqli_query($conn, "ALTER TABLE zakat ADD no_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST");
    }

    header('location:index.php');
}
