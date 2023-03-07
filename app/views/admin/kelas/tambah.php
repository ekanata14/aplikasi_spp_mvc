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
                            <p class="mb-4">Tambah Kelas</p>

                            <!-- DataTables Example -->
                            <div class="col-6 card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Tambah Kelas</h6>
                                </div>
                                <div class="card-body">
                                    <form action="<?= B ?>/kelas/tambahKelasAct" method="POST">
                                        <div class="form-group">
                                            <label for="username">Nama Kelas</label>
                                            <input type="text" class="form-control" name="nama_kelas">
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="password">Kompetensi Keahlian</label>
                                            <select name="kompetensi_keahlian" id="kompetensiKehalian" class="form-control">
                                                <?php for($i = 0; $i < count($data['komka']); $i++): ?>
                                                    <option value="<?= $data['komka'][$i] ?>"><?= $data['komka'][$i] ?></option> 
                                                <?php endfor ?>
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
