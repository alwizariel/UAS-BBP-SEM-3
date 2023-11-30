<?php
    include 'koneksi.php';
    session_start();

    $query = "SELECT * FROM tb_siswa";
    $sql = mysqli_query($conn,$query);
    $no =0;
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!--Bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js" ></script>

    <!--Font Awesome-->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
  
    <!--Data Tables-->
    <link rel="stylesheet" type="text.css" href="datatables/datatables.css">
    <script type="text/javascript" src="datatables/datatables.js"></script>

<title>belajar_crud</title>
</head>

<script type="text/javascript">
    $(document).ready(function(){
      $('#dt').DataTable();
});
</script>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            CRUD - BS5
          </a>
        </div>
      </nav> 
      <!--judul-->
      <div class="container">
        <h1 class="mt-3">Data Siswa</h1>
      <figure>
        <blockquote class="blockquote">
          <p>berisi data yang telah disimpan di database</p>
        </blockquote>
        <figcaption class="blockquote-footer">
          CRUD <cite title="Source Title">Create update dan delete</cite>
        </figcaption>
      </figure>
      <a href="kelola.php" type="button" class="btn btn-primary mb-3">
        <i class="fa fa-plus"></i>
        tambah data
      </a>

      <?php
        if(isset($_SESSION['eksekusi'])):
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          <?php
             echo $_SESSION['eksekusi'];
          ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      <?php
      session_destroy();
        endif;
      ?>
      

      <div class="table-responsive">
         <table id="dt" class="table align-middle cell-border stripe hover order-column row-border">
            <thead>
                <tr>
                <th><center>No.1</center></th>
                <th>nisn</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Foto Siswa</th>
                <th>alamat</th>
                <th>aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php
                while($result = mysqli_fetch_assoc($sql)){
            ?>
              <tr>
              <td><center>
                <?php echo  ++$no; ?>.
              </center></td>
              <td>
                <?php echo$result['nisn']; ?>
              </td>
              <td>
                <?php echo$result['nama_siswa']; ?>
              </td>
              <td>
              <?php echo$result['jenis_kelamin']; ?>
              </td>
              <td>
                <img src="img/<?php echo$result['foto_siswa']; ?>" style="width: 100px;">
              </td>
              <td>
              <?php echo$result['alamat']; ?>
              </td>
              <td>
                    <a href="kelola.php? ubah=<?php echo$result['id_siswa']; ?>" type="button" class="btn btn-success btn-sm ">
                       <i class="fa fa-pencil"></i>
                        ubah
                    </a>
                    <a href="proses.php?hapus=<?php echo$result['id_siswa']; ?>"type="button" class="btn btn-danger btn-sm" onClick="return confirm('apakah anda yakin akan menghapus???')">
                            <i class="fa fa-trash"></i>
                            Hapus
                    </a>
                </td>
                </tr>
                <?php
                  }
                ?>
                </tbody>
             </table>
         </div>
      </div>
      <div> class="mb-10" </div>
</body>
</html>