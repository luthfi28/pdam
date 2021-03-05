<?php

    require 'koneksi.php';

    if(isset($_POST['pengguna'])){
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $level = $_POST['level'];

        $sql = "INSERT INTO pengguna VALUES (null, '$nama', '$username', '$password', '$level')";

        if ($conn->query($sql) === TRUE) {
            header('Location: ?pesan=berhasil');
        } else {
            header('Location: ?pesan=gagal');
        }

        $conn->close();
    }

?>

<?php require 'header.php' ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php require 'navbar.php'; ?>
  <?php require 'sidebar.php'; ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pengguna</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pengguna</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form</h3>
              </div>
              <div class="card-body">

                <?php 
                    if(isset($_GET['pesan'])){
                        if($_GET['pesan'] == "berhasil")
                            echo "
                                <div class='alert alert-success' role='alert'>
                                    Pengguna Baru Telah Ditambahkan!
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>
                            ";
                        else if($_GET['pesan'] == "gagal")
                            echo "
                                <div class='alert alert-danger' role='alert'>
                                    Gagal Menambah Pengguna Baru!
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>
                            ";
                    }
                ?>

                <form action="" method="post">
                  <div class="form-group">
                    <label>Nama:</label>

                    <div class="input-group">
                      <input name="nama" type="text" class="form-control" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Username :</label>

                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                      </div>
                      <input name="username"  type="text" class="form-control" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Password:</label>

                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                      </div>
                      <input name="password" type="password" class="form-control" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Level:</label>

                    <div class="input-group">
                      <select name="level" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                      </select>
                    </div>
                  </div>

                  <button class="btn btn-primary float-right ml-2" name="pengguna" type="submit">Submit</button>
                  <button class="btn btn-secondary float-right mr-2" type="reset">Reset</button>
                </form>

              </div>
            </div>
          </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Data Pengguna</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th style="width: 10%;"></th>
                                    <th style="width: 15%;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $sql = "SELECT * FROM pengguna";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            $id = $row['id'];
                                            $nama = $row['nama'];
                                            $username = $row['username'];
                                            $level = $row['level'];
                                            echo "
                                            <tr>
                                                <td>$no</td>
                                                <td>$nama</td>
                                                <td>$username</td>
                                                <td>$level</td>
                                                <td>
                                                    <a href='#' class='btn btn-warning'>
                                                        <i class='fas fa-pencil-alt'></i>
                                                        Edit
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href='#' class='btn btn-danger' onclick='hapus($id)'>
                                                        <i class='fas fa-trash-alt'></i>
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            ";

                                            $no++;
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

      </div>

    </section>
  </div>

  <?php require 'footer.php' ?>
  <script>
    $(document).ready(function() {
        $('#table').DataTable();
    } );

    function hapus(id){
      alert(id);
    }
  </script>

</body>
</html>