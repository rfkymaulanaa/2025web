<?php
session_start();


include "koneksi.php";
cekLogin();

$query = "SELECT * FROM prodi";
$data = ambildata($query);

$querymahasiswa = "SELECT * FROM mahasiswa WHERE nim = '$_GET[nim]'";
$dataMahasiswa = ambildata($querymahasiswa);

include "template/header.php";
include "template/sidebar.php";
?>

<main class="app-main">

    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Edit Mahasiswa</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="index.php">Edit Mahasiswa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>

    <div class="card card-warning card-outline mb-4 mt-4 mx-4">
        <!--begin::Header-->
        <div class="card-header">
            <div class="card-title">Edit Mahasiswa</div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <form action="tambahaksimahasiswa.php" method="POST">
            <!--begin::Body-->
            <div class="card-body">
                <div class="row mb-3">
                    <label for="nim" class="col-sm-2 col-form-label">Nim</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nim" name="nim" required value="<?= $dataMahasiswa[0]["nim"] ?>" readonly />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="nim" name="nim" required value="<?= $dataMahasiswa[0]["password"] ?>" readonly />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" required value="<?= $dataMahasiswa[0]["nama"] ?>" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" required value="<?= $dataMahasiswa[0]["tanggalLahir"] ?>" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="telp" class="col-sm-2 col-form-label">No Telp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="telp" name="telp" required value="<?= $dataMahasiswa[0]["telp"] ?>" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" required value="<?= $dataMahasiswa[0]["email"] ?>" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="id_prodi" class="col-sm-2 col-form-label">Prodi</label>
                    <div class="col-sm-10">
                        <select name="id_prodi" id="">
                            <?php foreach ($data as $d) : ?>
                                <option value=<?php echo $d['id']; ?>

                                    <?=

                                    $d['id'] == $dataMahasiswa[0]["id_prodi"] ?
                                        "selected" : "";

                                    ?>>

                                    <?php echo $d['nama']; ?>

                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="foto" class="col-sm-2 col-form-label">Upload Foto</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="foto" name="foto" required value="<?= $dataMahasiswa[0]["foto"] ?>" />
                        </div>
                    </div>
                </div>

            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer">
                <button type="submit" value="Simpan" class="btn btn-warning">Simpan</button>
                <a href="index.php" class="btn btn-danger float-end">Kembali</a>
            </div>
            <!--end::Footer-->
        </form>
        <!--end::Form-->
    </div>
</main>

<!-- <body>

    <h1>Edit Data Mahasiswa </h1>

    <form action="editaksimahasiswa.php" method="post">
        <table>
        <tr>
            
        <td >NIM </td>
        <td>
            <input style="margin-bottom: 5px;" type="text" id="nim" name="nim" required value="<?= $dataMahasiswa[0]["nim"] ?>" readonly>
        
        </td>
        </tr>

        <tr>
            
        <td >Nama </td>
        <td>
            <input style="margin-bottom: 5px;" type="text" id="nama" name="nama" required value="<?= $dataMahasiswa[0]["nama"] ?>">
        </td>
        </tr>
        
        <tr>
        
        <td >Tanggal Lahir </td>
        <td>
            <input  style="margin-bottom: 5px;" type="date" id="tanggalLahir" name="tanggalLahir" required value="<?= $dataMahasiswa[0]["tanggalLahir"] ?>">
        </td>
        </tr>

        <tr>
            
        <td >No Telp </td>
        <td>
            <input style="margin-bottom: 5px;" type="text" id="telp" name="telp" required value="<?= $dataMahasiswa[0]["telp"] ?>">
        </td>
        </tr>

        <tr>
            
        <td >Email </td>
        <td >
            <input style="margin-bottom: 5px;" type="email" id="email" name="email" required value="<?= $dataMahasiswa[0]["email"] ?>">
        </td>
        </tr>

        <tr style="margin-bottom: 5px;">
            
        <td >Prodi </td>
        <td>
            <select name="id_prodi" id="" >
           
            </select>
            
        </td>
        </tr>



        <tr>
            <td>
        <button style="margin-top: 10px;" type="submit" value="Simpan" > Simpan </button>
        </td>
        </tr>

        <tr>
            <td>
            <a href="index.php" style="margin-top: 5px;" >Kembali</a>
        </td>
        </tr>

        </table>
    </form>
</body> -->

<?php include "template/footer.php"; ?>