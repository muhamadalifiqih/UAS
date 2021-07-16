<?php
@session_start();
include 'koneksi.php';
$id = $_GET['no_id'];
$data = mysqli_query($conn, "select * from zakat where no_id='$id'");
while ($d = mysqli_fetch_array($data)) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HALAMAN EDIT DATA</title>
    </head>

    <body>
        <center>
            <div>
                <h2>Dear <?php echo $_SESSION['username']; ?></h2>
                <h2>Silahkan masukan data untuk di edit dibawah ini </h2>
            </div>
            <div class="zakatinput">



                <form action="" method="post">

                    <table cellspacing="0">
                        <tr>
                            <td>Jenis Zakat</td>
                            <td>:</td>
                            <td>
                                <select name="zakat" id="zakat">
                                    <option value="<?php $d['jenis_zakat'] ?>"><?php echo $d['jenis_zakat'] ?></option>
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
                            <td><input type="text" name="nominal" id="nominal" class="text-zakat" value="<?php echo $d['nominal']; ?>" required></td>
                        </tr>

                        <tr>
                            <td>Nama Lengkap</td>
                            <td>:</td>
                            <td><input type="text" name="nama" id="nama" class="text-zakat" value="<?php echo $d['nama_lengkap']; ?> " required></td>
                        </tr>

                        <tr>
                            <td>Nomor Telepon</td>
                            <td>:</td>
                            <td><input type="text" name="telepon" id="telepon" class="text-zakat" value="<?php echo $d['nomor_hp'] ?>"></td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><input type="text" name="email" id="email" class="text-zakat" value="<?php echo $d['email'] ?>"></td>
                        </tr>

                        <tr>
                            <td>Nama Bank</td>
                            <td>:</td>
                            <td><input type="text" name="bank" id="bank" class="text-zakat" value="<?php echo $d['nama_bank'] ?>" required></td>
                        </tr>

                        <tr>
                            <td>Nomor Rekening</td>
                            <td>:</td>
                            <td><input type="text" name="rekening" id="rekening" class="text-zakat" value="<?php echo $d['nomor_rekening'] ?>" required></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td><input type="submit" value="simpan" name="edit"></td>
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
            <?php } ?>

            <?php

            // menangkap data yang di kirim dari form
            $jenis_zakat = $_POST['zakat'];
            $nominal = $_POST['nominal'];
            $nama = $_POST['nama'];
            $nomor_hp = $_POST['telepon'];
            $email = $_POST['email'];
            $nm_bank = $_POST['bank'];
            $nmr_rekening = $_POST['rekening'];




            if (isset($_POST['edit'])) {

                $edit_data =  mysqli_query($conn, "UPDATE zakat set jenis_zakat='$jenis_zakat', 
                                                    nominal='$nominal',nama_lengkap='$nama',
                                                    nomor_hp='$nomor_hp', email='$email',
                                                    nama_bank='$nm_bank',nomor_rekening='$nmr_rekening' 
                                                    WHERE no_id='$id'");


                if ($edit_data) {
                    echo "edit data berhasil";
                    echo "<br>silahkan kembali ke data zakat untuk mengeceknya";
                } else {
                    mysqli_error($conn);
                }
            }



            ?>


            </div>
        </center>


    </body>

    </html>