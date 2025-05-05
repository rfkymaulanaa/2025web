<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.html");
}
include "koneksi.php";

$query = "SELECT m.*, p.nama namaProdi FROM mahasiswa m JOIN prodi p ON m.id_prodi = p.id ";
$data = ambildata($query);


include "template/header.php";
include "template/sidebar.php";
?>


<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Data Mahasiswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="thead-light text-center align-middle">
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Prodi</th>
                                        <th>No Telp</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Email </th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $value) : ?>
                                        <tr class="align-middle">
                                            <td>
                                                <?= $key + 1 ?>
                                            </td>
                                            <td>
                                                <?= $value["nim"] ?>
                                            </td>
                                            <td>
                                                <?= $value["nama"] ?>
                                            </td>
                                            <td>
                                                <?= $value["namaProdi"] ?>
                                            </td>
                                            <td>
                                                <?= $value["telp"] ?>
                                            </td>
                                            <td>
                                                <?= $value["tanggalLahir"] ?>
                                            </td>
                                            <td>
                                                <?= $value["email"] ?>
                                            </td>
                                            <td>
                                                <a href="editmahasiswa.php?nim=<?= $value['nim'] ?>" class="btn btn-warning mb-2 mt-2">Edit</a>


                                                <a href="deletemahasiswa.php?nim=<?= $value['nim'] ?>"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger mb-2 mt-2">Delete</a>


                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <!-- /.col -->
            </div>
            <!-- /.row (main row) -->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>



<?php include "template/footer.php"; ?>