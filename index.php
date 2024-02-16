<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing</title>
</head>
<body>
    <h1>Halaman Landing</h1>
    <?php
        session_start();
        if(!isset($_SESSION['userid'])) {
    ?>
        <ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
        </ul>
    <?php
        }else{
    ?>    
        <p>Selamat Datang <b><?=$_SESSION['namalengkap']?></b></p>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="album.php">Album</a></li>
            <li><a href="foto.php">Foto</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    <?php
        }
    ?>

    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Foto</th>
            <th>Uploader</th>
            <th>Jumlah Like</th>
            <th>Aksi</th>
        </tr>

        <?php
            include "koneksi.php";
            $sql=mysqli_query($conn, "SELECT * FROM foto,user WHERE foto.userid=user.userid");
            while($data=mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td><?=$data['fotoid']?></td>
                <td><?=$data['judulfoto']?></td>
                <td><?=$data['deskrpsifoto']?></td>
                <td>
                    <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                </td>
                <td><?=$data['namalengkap']?></td>
                <td>
                   <?php
                    $fotoid=$data['fotoid'];
                    $sql2=mysqli_query($conn, "SELECT * FROM likefoto WHERE userid=$userid");
                    echo mysqli_num_rows($sql2);
                   ?>
                </td>
                <td>
                    <a href="like.php?fotoid<?=$data['fotoid']?>">Like</a>
                    <a href="komentar.php?fotoid<?=$data['fotoid']?>">Komentar</a>
                </td>
            </tr>
            <?php
            }
            ?>
    </table>
</body>
</html>