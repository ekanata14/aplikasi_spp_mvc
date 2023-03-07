<?php require_once(__DIR__ . "/partials/topbar.php"); ?>

<div class="container">
    <div class="row col-12">
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800 text-center">History Transaksi</h1>
            <p class="mb-4 text-center">Data History Transaksi</p>
    
            <!-- DataTales Example -->
            <div class="col-12 card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data History Transaksi</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Bulan Bayar</th>
                                    <th>Tahun Bayar</th>
                                    <th>Siswa</th>
                                    <th>Petugas</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Bulan Bayar</th>
                                    <th>Tahun Bayar</th>
                                    <th>Siswa</th>
                                    <th>Petugas</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php $i = 1; ?>
                                    <?php foreach($data['history'] as $res): ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $res['tanggal_bayar']?></td>
                                            <td><?= $res['bulan_dibayar'] ?></td>
                                            <td><?= $res['tahun_dibayar'] ?></td>
                                            <td><?= $res['nama_siswa'] ?></td>
                                            <td><?= $res['nama_petugas'] ?></td>
                                            <td><?= $res['tahun_ajaran'] ?></td>
                                            <td class="bg-success text-white">Lunas</td>
                                        </tr>
                                    <?php $i++ ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once(__DIR__ . "/partials/modal.php"); ?>
