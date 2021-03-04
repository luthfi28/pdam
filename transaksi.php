<?php require 'header.php' ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <?php require 'sidebar.php'; ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Transaksi Perorang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Transaksi Perorang</li>
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

                <form action="" method="post">
                  <div class="form-group">
                    <label>ID Pelanggan:</label>

                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-users"></i></span>
                      </div>
                      <input name="id" type="text" class="form-control" data-inputmask='"mask": "99999999"' required data-mask>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Tagihan(Rp) :</label>

                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
                      </div>
                      <input name="tagihan"  type="number" class="form-control" disabled required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Bayar (Rp):</label>

                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
                      </div>
                      <input name="bayar" type="number" class="form-control" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Tanggal Pembayaran:</label>

                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input name="tanggal" type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" required data-mask>
                    </div>
                  </div>

                  <button class="btn btn-primary float-right ml-2" type="submit">Submit</button>
                  <button class="btn btn-danger float-right mr-2" type="submit">Cancel</button>
                </form>

              </div>
            </div>
      </div>
    </section>
  </div>

  <?php require 'footer.php' ?>

  <script>
    $(function () {
      $('[data-mask]').inputmask()
    })
  </script>

</body>
</html>