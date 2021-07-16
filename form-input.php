<?php @session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INPUT DATA</title>
</head>

<body>
    <center>
        <div>
            <h2>Dear <?php echo $_SESSION['username']; ?></h2>
            <h2>Silahkan masukan data dibawah ini </h2>
        </div>
        <div class="zakatinput">

            <form action="" method="post">

                <table cellspacing="0">
                    <tr>
                        <td>Jenis Zakat</td>
                        <td>:</td>
                        <td>
                            <select name="zakat" id="zakat">
                                <option value="Zakat Fitrah">Zakat Fitrah</option>
                                <option value="Zakat Maal">Zakat Maal</option>
                                <option value="Zakat Ternak">Zakat Ternak</option>
                                <option value="Zakat Emas">Zakat Emas</option>
                                <option value="Zakat Perdagangan">Zakat Perdagangan</option>
                            </select>

                        </td>
                    </tr>

                    <tr>
                        <td>Nominal</td>
                        <td>:</td>
                        <td><input type="text" name="nominal" id="nominal" class="text-zakat" placeholder="jumlah zakat" required></td>
                    </tr>

                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td><input type="text" name="nama" id="nama" class="text-zakat" placeholder="nama pemberi zakat" required></td>
                    </tr>

                    <tr>
                        <td>Nomor Telepon</td>
                        <td>:</td>
                        <td><input type="text" name="telepon" id="telepon" class="text-zakat" placeholder="nomor HP pemberi zakat"></td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><input type="text" name="email" id="email" class="text-zakat" placeholder="email pemberi"></td>
                    </tr>
                    <tr>
                        <td>Nama Bank</td>
                        <td>:</td>
                        <td><input type="text" name="bank" id="bank" class="text-zakat" placeholder="nama bank pemberi zakat" required></td>
                    </tr>
                    <tr>
                        <td>Nomor Rekening</td>
                        <td>:</td>
                        <td><input type="text" name="rekening" id="rekening" class="text-zakat" placeholder="nomor rekening pemberi zakat" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input type="submit" value="simpan" name="simpan"></td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <td><a href="index.php" style="padding:0.5rem 0.5rem; text-decoration: none; background-color:green; color:blanchedalmond; ">Data Zakat</a></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><br><br><a href="logout.php" style="padding:0.5rem 0.5rem; text-decoration: none; background-color:RED; color:blanchedalmond; ">Logout</a></td>
                    </tr>
                </table>
            </form>
            <?php
            include 'koneksi.php';
            if (isset($_POST['simpan'])) {
                $insert = mysqli_query(
                    $conn,
                    "INSERT INTO zakat (jenis_zakat,nominal,nama_lengkap,nomor_hp,email, nama_bank, nomor_rekening) VALUES (
                    '" . $_POST['zakat'] . "' , '" . $_POST['nominal'] . "' , 
                    '" . $_POST['nama'] . "'  , '" . $_POST['telepon'] . "' , 
                    '" . $_POST['email'] . "' , '" . $_POST['bank'] . "'    , 
                    '" . $_POST['rekening'] . "')");
                if ($insert) {
                    echo "input data berhasil";
                } else {
                    mysqli_error($conn);
                }
            }
            ?>
        </div>
    </center>
</body>
</html>