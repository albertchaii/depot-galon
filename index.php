<?php
require 'function.php';
require 'cek.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>penjualan Sb-Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Joy's Water</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Data Base</div>

                            
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Penjualan Galon
                            </a>

                            <a class="nav-link" href="pengembalian.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Pinjaman Galon
                            </a>

                            </a>
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Penjualan Galon </h1>
                        
                 
            
            
                        <div class="card mb-4">
                            <div class="card-header">
                            <br>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                 Input data
                            </button>
                            <br>
                            <br>
                            <form method="post">

                                <div class="row ">
                                    <div class="col-lg-3">
                                        <input type="date" name="tgl_awal" class="form-control" size="10" required>

                                    </div>
                                    <div class="col-lg-3">
                                        <input type="date" name="tgl_akhir" class="form-control" size="10" required>

                                    </div>
                                    <div class="col-lg-3">
                                    
                                    <button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"></span>Search</button> <a href="index.php" type="button" class ="btn btn-success"><span class = "glyphicon glyphicon-refresh"> Refresh<span></a>
                            
                                    </div>
                                    

                                </div>

                                </form>
                                
                            </div>
                            <div class="card-body">



                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Alamat</th>
                                            <th>Jumlah Galon</th>
                                            <th>Aksi</th>
                                            
                                            
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                        <?php
                                        if(isset($_POST['tgl_awal']) && isset($_POST['tgl_akhir'])){
                                            $ambildatacustomer = mysqli_query($conn, "SELECT * FROM customer WHERE tanggal BETWEEN '".$_POST['tgl_awal']."' and '".$_POST['tgl_akhir']."'");
                                        } else{
                                            $ambildatacustomer = mysqli_query($conn, "select * from customer");
                                        }
                                        
                                        $no=1;
                                        while($data=mysqli_fetch_array($ambildatacustomer)){
                                            $nama = $data['nama'];
                                            $tanggal = $data['tanggal'];
                                            $alamat = $data['alamat'];
                                            $jumlah = $data['jumlah'];
                                            $idbarang = $data['idbarang'];
                                            
        
                                        ?>
                                            <tr>
        
                                                <td><?=$no++;?></td>
                                                <td><?=$nama;?></td>
                                                <td><?=$tanggal;?></td>
                                                <td><?=$alamat;?></td>
                                                <td><?=$jumlah;?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?=$idbarang;?>">
                                                        Edit
                                                    </button>
                                                    
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?=$idbarang;?>">
                                                        Delete
                                                    </button>
                                                </td>
                                                    
                                                </div>

                                                        <!-- edit Modal -->
                                                        <div class="modal fade" id="edit<?=$idbarang;?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit data</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post">

                                                        <div class="modal-body">
                                                        <input type="text" name="nama" value="<?=$nama;?>" class="form-control" required>
                                                        <br>
                                                        <input type="date" name="tanggal" value="<?=$tanggal;?>" class="form-control" required>
                                                        <br>
                                                        <input type="text" name="alamat" value="<?=$alamat?>" class="form-control" required>
                                                        <br>
                                                        <input type="number" name="jumlah" value="<?=$jumlah;?>" class="form-control" required>
                                                        <br>
                                                        <input type="hidden" name="idbarang" value="<?=$idbarang;?>">
                                                        <button type="submit" class="btn btn-primary" name="editdata">Update</button>

                                                        </form>

                                                        </div>

                                                        </div>
                                                        </div>
                                                </div>

                                                </div>

                                                        <!-- delete Modal -->
                                                        <div class="modal fade" id="delete<?=$idbarang;?>">
                                                        <div class="modal-dialog">
                                                        <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Hapus data</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post">

                                                        <div class="modal-body">
                                                        Apakah anda yakin menghapus data  <?=$nama;?>?
                                                        <input type="hidden" name="idbarang" value="<?=$idbarang;?>">
                                                        <br>
                                                        <br>
                                                        <button type="submit" class="btn btn-danger" name="hapusdata">Delete</button>

                                                        </form>

                                                        </div>

                                                        </div>
                                                        </div>
                                                </div>

                                                    
                                            </tr>  
                                               
                                        <?php
                                        };

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>

    </div>

            <!-- The Modal -->
            <div class="modal fade" id="myModal">
            <div class="modal-dialog">
            <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Masukan data</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <form method="post">

            <div class="modal-body">
            <input type="text" name="nama" placeholder="Nama Pembeli" class="form-control" required>
            <br>
            <input type="date" name="tanggal" placeholder="Tanggal" class="form-control" required>
            <br>
            <input type="text" name="alamat" placeholder="Alamat" class="form-control" required>
            <br>
            <input type="number" name="jumlah" placeholder="Jumlah Galon" class="form-control" required>
            <br>
            <input type="submit" class="btn btn-primary" name="proses"></input>

            </form>

            </div>

            </div>
        </div>
    </div>
</html>


