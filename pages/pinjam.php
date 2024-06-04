<?php
?>
<div class="main-content">
    <div class="title">Pinjam</div>
    <div class="subtitle">Lorem ipsum dolor, sit amet consectetur adipisicing elit. At ducimus, omnis blanditiis,
        aliquam modi eum exercitationem corrupti atque rerum quam mollitia quasi, eaque magnam qui fuga laboriosam
        pariatur nulla? Ducimus.
        <br>
        <button class="btn btn-outline-primary mt-3 py-2 px-3" data-bs-toggle="modal" data-bs-target="#tambah">
            <svg xmlns="http://www.w3.org/2000/svg" width="23" fill="currentColor" class="" viewBox="0 0 16 16">
                <path
                    d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z" />
            </svg> Tambah
        </button>
    </div>
    <div class="tables">
        <table id="myTable" class="row-border hover compact" width=" 100%">
            <thead>
                <tr>
                <th>No. </th>

                    <th>Nama </th>
                    <th>Jumlah </th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Keluar</th>
                    <th>Status </th>
                    <th>Jenis </th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $q = "SELECT * FROM tb_pinjam";
                    $result = mysqli_query($conn, $q);
                    $datas = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    $i=1;
                    foreach($datas as $r){
                    $idpinjam = $r['id_pinjam'];
                    $namapinjam = $r['nm_pinjam'];
                    $jumlahpinjam = $r['jml_pinjam'];
                    $surat = $r['surat'];
                    $tanggalMasuk = $r['tanggal_masuk'];
                    $tanggalKeluar = $r['tanggal_keluar'];
                    $status = $r['status'];
                    $jenis = $r['jenis'];
                    ?>

                <tr class="trows">
                <td><?= $i++?></td>

                    <td><?= $namapinjam?></td>
                    <td><?= $jumlahpinjam?></td>
                    <td><?= $tanggalMasuk?></td>
                    <td><?= ($tanggalKeluar == '') ? '-' : $tanggalKeluar?></td>
                    <td><?= $status?></td>
                    <td><?= $jenis?></td>


                    <td>
                        <!-- EDIT BTN -->
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#edit<?= $idpinjam?>">
                            <i class="m-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-pencil " viewBox="0 0 16 16">
                                    <path
                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                </svg></i>EDIT
                        </button>
                        <!-- DELETE BTN -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#DELETE<?= $idpinjam?>">
                            <i class="m-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                    <path
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                </svg></i>HAPUS
                        </button>

                        <!-- CONFIRM BTN -->
                        <button type="button" class="btn btn-primary <?= ($status == 'sudah') ? "d-none":""?>" data-bs-toggle="modal"
                            data-bs-target="#confirm<?= $idpinjam?>">
                            <i class="m-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                    <path
                                        d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                </svg>
                            </i>Konfirmasi Pengembalian
                        </button>


                        <a href="uploads/files/<?= $surat?>" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-printer" viewBox="0 0 16 16">
                                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                <path
                                    d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
                            </svg>
                            Print SK</a>

                    </td>
                </tr>

                <!-- MODAL EDIT -->
                <div class="modal fade" id="edit<?= $idpinjam?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form action="functions/pinjam.php" method="post" enctype="multipart/form-data">
                                <div class="modal-body ">
                                    <input type="text" class="d-none" name="id" value="<?= $idpinjam?>">

                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="<?= $namapinjam?>">

                                    <label for="" class="mt-3">Jumlah</label>
                                    <input type="number" class="form-control" name="jumlah" value="<?= $jumlahpinjam?>">

                                    <div class="row">
                                        <div class="col">
                                            <label for="" class="mt-3">Tanggal Masuk</label>
                                            <input type="date" class="form-control" name="tanggal"
                                                value="<?= $tanggalMasuk?>">

                                        </div>
                                        <div class="col">
                                            <label for="" class="mt-3">Jenis</label>
                                            <select name="jenis" id="" class="form-select">
                                                <option value="masuk">Masuk</option>
                                                <option value="keluar">Keluar</option>
                                            </select>
                                        </div>

                                        <div class="col">
                                            <label for="" class="mt-3">Status</label>
                                            <select name="status" id="" class="form-select">
                                                <option value="belum">Belum</option>
                                                <option value="sudah">Sudah</option>
                                            </select>
                                        </div>
                                    </div>

                                    <label for="" class="mt-3">Surat</label>
                                    <input type="file" class="form-control" name="file">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary" name="edit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- MODAL DELETE -->
                <div class="modal fade" id="DELETE<?= $idpinjam?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-4" id="exampleModalLabel">Hapus: <?= $namapinjam?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form action="functions/pinjam.php" method="post">
                                <input type="text" value="<?= $idpinjam?>" name="id" style="display: none">

                                <div class="modal-body">
                                    <h1 class="fs-5">Anda Yakin Ingin Menghapus?</h1>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-primary" name="hapus">Iya</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <!-- MODAL CONFIRM -->
                <div class="modal fade" id="confirm<?= $idpinjam?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-4" id="exampleModalLabel">Konfirmasi Pengembalian<h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                            </div>

                            <form action="functions/pinjam.php" method="post">
                                <input type="text" value="<?= $idpinjam?>" name="id" style="display: none">

                                <div class="modal-body">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-primary" name="konfirmasi">Iya</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <?php
        
                        }?>
            </tbody>
        </table>

    </div>
</div>

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="functions/pinjam.php" method="post" enctype="multipart/form-data">
                <div class="modal-body ">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama">

                    <label for="" class="mt-3">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah">


                    <div class="row">
                        <div class="col">
                            <label for="" class="mt-3">Tanggal Masuk</label>
                            <input type="date" class="form-control" name="tanggal">

                        </div>
                        <div class="col">
                            <label for="" class="mt-3">Jenis</label>
                            <select name="jenis" id="" class="form-select">
                                <option value="masuk">Masuk</option>
                                <option value="keluar">Keluar</option>
                            </select>
                        </div>
                    </div>

                    <label for="" class="mt-3">Surat</label>
                    <input type="file" class="form-control" name="file">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>