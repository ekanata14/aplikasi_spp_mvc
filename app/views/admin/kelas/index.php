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
                            <h1 class="h3 mb-2 text-gray-800">Kelas</h1>
                            <p class="mb-4">Data Kelas</p>
                            <a href="<?= B ?>/kelas/tambahKelas" class="btn btn-primary mb-3">Tambah Kelas <i class="fas fa-plus"></i></a>
                            <?php Flasher::flash() ?>
                            <!-- DataTales Example -->
                            <div class="col-6 card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Kelas</th>
                                                    <th>Kompetensi Keahlian</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Kelas</th>
                                                    <th>Kompetensi Keahlian</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php $i = 1; ?>
                                                    <?php foreach($data['kelas'] as $res): ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= $res['nama_kelas'] ?></td>
                                                            <td><?= $res['kompetensi_keahlian'] ?></td>
                                                            <td>
                                                                <a href="<?= B ?>/kelas/editKelas/<?= $res['id_kelas'] ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                                                <form action="<?= B ?>/kelas/deleteKelasAct" method="POST" class="d-inline">
                                                                    <input type="hidden" name="id_kelas" value="<?= $res['id_kelas'] ?>">
                                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?');"><i class="fas fa-trash"></i></button>
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
