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
                            <p class="mb-4">Data Siswa</p>
                            <a href="<?= B ?>/siswa/tambahSiswa" class="btn btn-primary mb-3">Tambah Siswa <i class="fas fa-plus"></i></a>
                            <?php Flasher::flash() ?>

                            <!-- DataTales Example -->
                            <div class="col-12 card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NISN</th>
                                                    <th>NIS</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>Telepon</th>
                                                    <th>Kelas</th>
                                                    <th>Pengguna Id</th>
                                                    <th>Tahun Ajaran</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NISN</th>
                                                    <th>NIS</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>Telepon</th>
                                                    <th>Kelas</th>
                                                    <th>Pengguna Id</th>
                                                    <th>Tahun Ajaran</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                    <?php foreach($data['siswa'] as $res): ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= $res['nisn'] ?></td>
                                                            <td><?= $res['nis'] ?></td>
                                                            <td><?= $res['nama_siswa'] ?></td>
                                                            <td><?= $res['alamat'] ?></td>
                                                            <td><?= $res['telepon'] ?></td>
                                                            <td><?= $res['kelas_id'] ?></td>
                                                            <td><?= $res['pengguna_id'] ?></td>
                                                            <td><?= $res['pembayaran_id'] ?></td>
                                                            <td>
                                                                <a href="<?= B ?>/siswa/editSiswa/<?= $res['id_siswa'] ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                                                <form action="<?= B ?>/siswa/deleteSiswaAct" method="POST" class="d-inline">
                                                                    <input type="hidden" name="id_pengguna" value="<?= $res['pengguna_id'] ?>">
                                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Menghapus siswa akan menghapus seluruh transaksi, yakin?');"><i class="fas fa-trash"></i></button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    <?php $i++ ?>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
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
