<?php @session_start() ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            text-align: center;
        }
    </style>
    <title>Data Zakat</title>
</head>

<body>
    <h2>selamat datang! <?php echo $_SESSION['username']; ?></h2>
    <h2>Data Zakat</h2>
    <?php
    $timestamp = date('Y-m-d G:i:s');
    $dbdate = "per $timestamp";
    $dbspace = "===================================================================";
    echo "<h2>DATA ZAKAT <BR> $dbdate</h2>"
    ?>
    <center>

        <a href="form-input.php" style="padding:0.5rem 0.5rem; text-decoration: none; background-color:green; color:blanchedalmond; ">Tambah Data</a><br><br>
        <a href="cetak.php" target="_BLANK" style="padding:0.5rem 0.5rem; text-decoration: none; background-color:green; color:blanchedalmond; ">Cetak Data</a><br><br>
        <table border="1" cellspacing="0" width="80%">
            <tr style="text-align: center; font-weight:bold; background-color:tomato;">
                <td>No</td>
                <td>Jenis Zakat</td>
                <td>Nominal</td>
                <td>Nama Lengkap</td>
                <td>Nomor HP</td>
                <td>email</td>
                <td>Nama Bank</td>
                <td>Nomor Rekening</td>
                <td>Opsi</td>
            </tr>
            <?php
            include("koneksi.php");

            $no = 1;
            $select = mysqli_query($conn, "SELECT * FROM zakat ");
            if (mysqli_num_rows($select) > 0) {


                while ($hasil = mysqli_fetch_array($select)) {


            ?>

                    <tr style="text-align: center; background-color:blanchedalmond;">
                        <td><?php echo $hasil['no_id'] ?></td>
                        <td><?php echo $hasil['jenis_zakat'] ?></td>
                        <td><?php echo $hasil['nominal'] ?></td>
                        <td><?php echo $hasil['nama_lengkap'] ?> </td>
                        <td><?php echo $hasil['nomor_hp'] ?> </td>
                        <td><?php echo $hasil['email'] ?></td>
                        <td><?php echo $hasil['nama_bank'] ?> </td>
                        <td><?php echo $hasil['nomor_rekening'] ?> </td>
                        <td style="background-color:brown;">
                            <a href="form-edit.php?no_id=<?php echo $hasil['no_id'] ?>">EDIT</a> ||
                            <a href="delete.php?no_id=<?php echo $hasil['no_id'] ?>">HAPUS </a>
                        </td>
                    </tr>

                <?php }
            } else { ?>
                <tr>
                    <td colspan="9" align="center">DATA KOSONG</td>
                </tr>
            <?php } ?>
        </table>
        <br><br><a href="logout.php" style="padding:0.5rem 0.5rem; text-decoration: none; background-color:RED; color:blanchedalmond; ">Logout</a>
    </center>

</body>

</html>