<?php
session_start();

//membuat koneksi ke database
 $conn = mysqli_connect("localhost","root","","depotgalon");

 //insert data baru

 if(isset($_POST['proses'])){
  $nama = $_POST['nama'];
  $tanggal = $_POST['tanggal'];
  $alamat = $_POST['alamat'];
  $jumlah = $_POST['jumlah'];

  $addtotable = mysqli_query($conn,"insert into customer (nama, tanggal, alamat, jumlah) values('$nama','$tanggal','$alamat','$jumlah') ");
  if($addtotable){
    header('location:index.php');
  } else{
    echo 'Gagal';
    header('location:index.php');
  }
 }

 //menambah pengembalian
 if(isset($_POST['addnew'])){
    $nama_beli = $_POST['nama_beli'];
    $tanggal_beli = $_POST['tanggal_beli'];
    $alamat_beli = $_POST['alamat_beli'];
    $keterangan = $_POST['keterangan'];

    $addtomasuk = mysqli_query($conn,"insert into pengembalian (nama_beli, tanggal_beli, alamat_beli, keterangan) values('$nama_beli','$tanggal_beli','$alamat_beli','$keterangan')");
    if($addtomasuk){
      header('location:pengembalian.php');
    } else{
      echo 'Gagal';
      header('location:pengembalian.php');
    }
  }
  

  //update data penjualan (index.php)
  if(isset($_POST['editdata'])){
    $idbarang = $_POST['idbarang'];
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $alamat = $_POST['alamat'];
    $jumlah = $_POST['jumlah'];

    $update = mysqli_query($conn, "update customer set nama='$nama', tanggal='$tanggal', alamat='$alamat', jumlah='$jumlah' where idbarang = '$idbarang'");
    if($update){
      header('location:index.php');
    }else{
      echo 'Gagal';
      header('location:index.php');
    }
    }

  //menghapus barang dari data pejualan index.php
  if(isset($_POST['hapusdata'])){
    $idbarang = $_POST['idbarang'];

    $hapus = mysqli_query($conn, "delete from customer where idbarang = '$idbarang'");
    if($hapus){
      header('location:index.php');
    }else{
      echo 'Gagal';
      header('location:index.php');
    }
  }
  
  //menghapus barang dari data pejualan index.php
  if(isset($_POST['deletedata'])){
    $idbarang = $_POST['idbarang'];

    $hapus = mysqli_query($conn, "delete from pengembalian where idbarang = '$idbarang'");
    if($hapus){
      header('location:pengembalian.php');
    }else{
      echo 'Gagal';
      header('location:pengembalian.php');
    }
  }
  

  //update data pengembalian
  if(isset($_POST['updatedata'])){
    $idbarang = $_POST['idbarang'];
    $nama_beli = $_POST['nama_beli'];
    $tanggal_beli = $_POST['tanggal_beli'];
    $alamat_beli = $_POST['alamat_beli'];
    $keterangan = $_POST['keterangan'];

    $edit = mysqli_query($conn, "update pengembalian set nama_beli='$nama_beli', tanggal_beli='$tanggal_beli', alamat_beli='$alamat_beli', keterangan='$keterangan' where idbarang = '$idbarang'");
    if($edit){
      header('location:pengembalian.php');
    }else{
      echo 'Gagal';
      header('location:pengembalian.php');
    }
  }

  

?>