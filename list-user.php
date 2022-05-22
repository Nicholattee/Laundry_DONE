<?php
session_start();
# jika saat load halaman ini, pastikan telah login sbg user
if (!isset($_SESSION["user"])) {
    header("location:login.php");
}
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar user</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid mt-5">
        <div class="card bg-dark">
            <div class="card-header bg-dark mt-3">
                <h5 class=" text-center text-light">Data user</h5>
            </div>
            <div class="card-body">
                <!-- tombol daftar -->
                <a href="form-user.php">
                    <button class="btn btn-outline-info btn-block">
                        Tambahkan user
                    </button>
                </a>
                <hr>
                <!-- kotak pencarian data pelanggan -->
                <form action="list-user.php" method="get">
                    <input type="text" name="search"
                    class="form-control mb-3 btn-outline-info bg-dark text-light"
                    placeholder="Masukan Keyword Pencarian">
                </form>
                <ul class="list-group">
                    <?php
                    include("connection.php");
                    if (isset($_GET["search"])) {
                        # jika pd saat load halaman ini
                        # akan mengecek apakah ada data dgn method
                        # GET yg bernama search
                        $search = $_GET["search"];
                        $sql = "select * from user
                        where id_user like '%$search%'
                        or nama like '%$search%'
                        or username like '%$search%'
                        or role like '%$search%'";
                    } else {
                        $sql = "select * from user";
                    }
                    //eksekusi perintah sql
                    $query = mysqli_query($connect, $sql);
                    while($user = mysqli_fetch_array($query)){ ?>
                        <li class="list-group-item btn-outline-info bg-dark">
                        <div class="row">
                            <!-- bagian data user-->
                            <div class="col-lg-10 col-md-10">
                                <h5>Nama User : <?php echo $user["nama"];?></h5>
                                <h6>ID user : <?php echo $user["id_user"];?></h6>
                                <h6>Username : <?php echo $user["username"]?></h6>
                                <h6>Role : <?php echo $user["role"];?></h6>
                            </div>

                            <!-- bagian tombol pilihan-->
                            <div class="col-lg-2 col-md-2">
                                <a href="form-user.php?id_user=<?=$user["id_user"]?>">
                                    <button class="btn btn-block btn-info mb-2">
                                        Edit
                                    </button>
                                </a>
                                <a href="process-user.php?id_user=<?=$user["id_user"]?>">
                                    <button class="btn btn-block btn-danger"
                                    onclick="return confirm('Apakah anda yakin?')">
                                        Remove
                                    </button>
                                </a>
                            </div>
                        </div>
                        </li>
                    <?php
                    }
                    ?>
                    
                </ul>
            </div>
        </div>
    </div>
</body>
</html>