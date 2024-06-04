<?php
?>
<div class="main-content">
    <div class="title">Dipinjam</div>
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
        <tr class="py-3">
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Surat Peminjaman</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
                $data = viewData("SELECT * FROM tb_dipinjam");
                while($r = mysqli_fetch_array($data)){
                $idBarang = $r['id_dipinjam'];
                $namaBarang = $r['nm_dipinjam'];
                $jumlahBarang = $r['jml_dipinjam'];
                $suratDipinjam = $r['surat_dipinjam'];
                ?>

        <tr class="trows">
            <td><?= $namaBarang?></td>
            <td><?= $jumlahBarang?></td>
            <td><a href="./assets/surat_keterangan/<?= $suratPinjam?>" class="btn">Lihat SK</a></td>

            <td>
                <!-- EDIT BTN -->
                <button type="button" class="btn edit" data-bs-toggle="modal" data-bs-target="#EDIT<?= $idBarang?>">
                    EDIT
                </button>
                <!-- DELETE BTN -->
                <button type="button" class="btn del" data-bs-toggle="modal" data-bs-target="#DELETE<?= $idBarang?>">
                    DELETE
                </button>
            </td>
        </tr>

        <!-- MODAL EDIT -->
        <div class="modal fade" id="EDIT<?= $idBarang?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit: <?= $namaBarang?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="fungsi/editData.php" method="post" enctype="multipart/form-data">
                    <input type="text" value="<?= $idBarang?>" name="id" style="display: none">

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="username" class="py-2">Nama Barang</label>
                                <input type="text" class="form-control" id="username" name="namaBarang" value="<?= $namaBarang?>"
                                    style="background-color: var(--primary-color); color: var(--forth-color)" required>
                            </div>

                            <div class="form-group">
                                <label for="username" class="py-2">Jumlah Barang</label>
                                <input type="number" class="form-control" id="username" name="jmlBarang" value="<?= $jumlahBarang?>"
                                    style="background-color: var(--primary-color); color: var(--forth-color)" required>
                            </div>

                            <div class="form-group mt-3">
                                <a href="./assets/surat_keterangan/<?= $suratDipinjam?>" class="btn btn-primary">Lihat SK</a>
                            </div>

                            <div class="form-group mb-3 py-3">
                                <label for="images" class="drop-container " id="dropcontainer">
                                    <span class="drop-title">Drop files here</span>
                                    or
                                    <input type="file" id="images" accept="application/pdf" name="file" >
                                </label>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" name="editData<?= $PAGE?>">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- MODAL DELETE -->
        <div class="modal fade" id="DELETE<?= $idBarang?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-4" id="exampleModalLabel">Hapus: <?= $namaBarang?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="fungsi/delData.php" method="post">
                        <input type="text" value="<?= $idBarang?>" name="id" style="display: none">

                        <div class="modal-body">
                            <h1 class="fs-5">Anda Yakin Ingin Menghapus?</h1>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-primary" name="delData<?= $PAGE?>">Iya</button>
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

            <form action="fungsi/editData.php" method="post">
                <div class="modal-body ">
                    <label for="">Nama</label>
                    <input type="text" class="form-control">

                    <label for="" class="mt-3">Jumlah</label>
                    <input type="text" class="form-control">

                    <label for="" class="mt-3">Foto</label>
                    <input type="file" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>