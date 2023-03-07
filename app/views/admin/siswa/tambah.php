<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require_once(__DIR__ . "/../partials/sidebar.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php require_once(__DIR__ . "/../partials/topbar.php"); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?= $data['title'] ?></h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <?php require_once(__DIR__ . "/../partials/card.php"); ?>

                    <!-- Content Row -->

                    <div class="row">
                        <div class="container-fluid">
                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800">Siswa</h1>
                            <p class="mb-4">Tambah Siswa</p>

                            <!-- DataTables Example -->
                            <div class="col-6 card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Tambah Siswa</h6>
                                </div>
                                <div class="card-body">
                                    <form action="<?= B ?>/siswa/tambahSiswaAct" method="POST">
                                        <input type="hidden" name="role" value="2">
                                        <div class="form-group">
                                            <label for="nisn">NISN</label>
                                            <input type="text" class="form-control" name="nisn">
                                        </div>
                                        <div class="form-group">
                                            <label for="nis">NIS</label>
                                            <input type="text" class="form-control" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_siswa">Nama Siswa</label>
                                            <input type="text" class="form-control" name="nama_siswa">
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" name="alamat">
                                        </div>
                                        <div class="form-group">
                                            <label for="telepon">Telepon</label>
                                            <input type="text" class="form-control" name="telepon">
                                        </div>
                                        <div class="form-group">
                                            <label for="telepon">Kelas</label>
                                            <select name="kelas_id" id="kelasId" class="form-control">
                                                <?php foreach($data['kelas'] as $res): ?>
                                                    <option value="<?= $res['id_kelas'] ?>"><?= $res['nama_kelas'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="telepon">Tahun Ajaran</label>
                                            <select name="pembayaran_id" id="pembayaranId" class="form-control">
                                                <?php foreach($data['tahun_ajaran'] as $res): ?>
                                                    <option value="<?= $res['id_pembayaran'] ?>"><?= $res['tahun_ajaran'] ?></option>
                                                <?php endforeach ?>
                                            </select>

                                        </div>
                                        <button type="submit" class="btn btn-primary float-right">Tambah</button>
                                    </form>
                                </div>
                            </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
                            
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php require_once(__DIR__ . "/../partials/footer.php"); ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php require_once(__DIR__ . "/../partials/modal.php"); ?>
