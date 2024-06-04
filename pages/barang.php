<?php

$list = isset($_GET['list']) ? $_GET['list'] : 1;

?>
<div class="main-content">
    <div class="title">Barang</div>
    <div class="subtitle">Lorem ipsum dolor, sit amet consectetur adipisicing elit. At ducimus, omnis blanditiis,
        aliquam modi eum exercitationem corrupti atque rerum quam mollitia quasi, eaque magnam qui fuga laboriosam
        pariatur nulla? Ducimus.
        <br>
        <button class="btn btn-outline-primary mt-3 py-2 px-3" data-bs-toggle="modal" data-bs-target="#tambah">
            <svg xmlns="http://www.w3.org/2000/svg" width="23" fill="currentColor" class="" viewBox="0 0 16 16">
                <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z" />
            </svg> Tambah
        </button>
        <button class="btn btn-outline-primary mt-3 py-2 px-3" data-bs-toggle="dropdown">
            <svg xmlns="http://www.w3.org/2000/svg" width="23" fill="currentColor" class="" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2m0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
            </svg> List
        </button>
        <a href="index.php?page=rekap" class="btn btn-outline-primary mt-3 py-2 px-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="23" fill="currentColor" class="" viewBox="0 0 16 16">
                <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z" />
            </svg> Download
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?page=barang&list=1">List 1</a></li>
            <li><a class="dropdown-item" href="index.php?page=barang&list=2">List 2</a></li>
            <li><a class="dropdown-item" href="index.php?page=barang&list=3">List 3</a></li>
        </ul>
    </div>
    <div class="tables">
        <table id="myTable" class="row-border hover compact " width=" 100%">
            <thead>
                <tr>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;">No.</th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Nama</th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;">jenis</th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Jumlah</th>
                    <th colspan="2" class="text-center">Kondisi</th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Foto</th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Aksi</th>
                </tr>
                <tr>
                    <th class="text-center">Baik</th>
                    <th class="text-center">Buruk</th>

                </tr>
            </thead>
            <tbody>
                <?php

                $q = "SELECT * FROM tb_barang";
                $result = mysqli_query($conn, $q);
                $datas = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $i = 1;
                foreach ($datas as $r) {
                    if (isset($_GET['list']) && $_GET['list'] != '') {
                        $list = $_GET['list'];
                        $jumlahBarang = $r['list' . $list];
                        $baik = $r['baik' . $list];
                        $buruk = $r['buruk' . $list];
                    } else {
                        $list = 1;
                        $jumlahBarang = $r['list1'];
                        $baik = $r['baik1'];
                        $buruk = $r['buruk1'];
                    }


                    $idBarang = $r['id_barang'];
                    $namaBarang = $r['nm_barang'];
                    $jenis = $r['jenis'];
                    $foto = $r['foto'];
                ?>

                    <tr class="trows">
                        <td><?= $i++ ?></td>

                        <td><?= $namaBarang ?></td>
                        <td><?= $jenis ?></td>
                        <td><?= ($jumlahBarang == '') ? '-' : $jumlahBarang ?></td>
                        <td><?= ($baik == '') ? '-' : $baik ?></td>
                        <td><?= ($buruk == '') ? '-' : $buruk ?></td>
                        <td><img src="uploads/img/<?= $foto ?>" alt="" style="width:150px; height: 100px"></td>

                        <td>
                            <!-- EDIT BTN -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $idBarang ?>">
                                <i class="m-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil " viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                    </svg></i>EDIT
                            </button>
                            <!-- DELETE BTN -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DELETE<?= $idBarang ?>">
                                <i class="m-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg></i>HAPUS
                            </button>
                        </td>
                    </tr>

                    <!-- MODAL EDIT -->
                    <div class="modal fade" id="edit<?= $idBarang ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="functions/barang.php" method="post" enctype="multipart/form-data">
                                    <div class="modal-body ">
                                        <input type="text" class="form-control d-none" value="<?= $idBarang ?>" name="id">
                                        <input type="text" class="form-control" name="list" value="<?= $list ?>">

                                        <label for="">Nama</label>
                                        <input type="text" class="form-control" value="<?= $namaBarang ?>" name="nama">

                                        <label for="" class="mt-3">Jumlah</label>
                                        <input type="number" class="form-control" value="<?= $jumlahBarang ?>" name="jumlah">
                                        <label for="" class="mt-3">Jenis</label>
                                        <input type="text" class="form-control" value="<?= $jenis ?>" name="jenis">

                                        <div class="row">
                                            <div class="col">
                                                <label for="" class="mt-3">Baik</label>
                                                <input type="text" class="form-control" name="baik" id="baik" value="<?= $baik ?>">
                                            </div>
                                            <div class="col">
                                                <label for="" class="mt-3">Buruk</label>
                                                <input type="text" class="form-control" name="buruk" id="buruk" value="<?= $buruk ?>">
                                            </div>
                                        </div>

                                        <label for="" class="mt-3">Foto</label>
                                        <input type="file" class="form-control" value="<?= $idBarang ?>" name="file">

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary" name="edit">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL DELETE -->
                    <div class="modal fade" id="DELETE<?= $idBarang ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-4" id="exampleModalLabel">Hapus: <?= $namaBarang ?></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>

                                </div>

                                <form action="functions/barang.php" method="post">
                                    <input type="text" value="<?= $idBarang ?>" name="id" style="display: none">

                                    <div class="modal-body">
                                        <h1 class="fs-5">Anda Yakin Ingin Menghapus?</h1>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                        <button type="submit" class="btn btn-primary" name="hapus">Iya</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                <?php

                } ?>
                <!-- Bootstrap JavaScript -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

            </tbody>
        </table>

    </div>
</div>

<!-- MODAL TAMBAH -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="functions/barang.php" method="post" enctype="multipart/form-data">
                <div class="modal-body ">
                    <input type="text" class="form-control d-none" name="list" value="<?= $list ?>">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama">
                    <label for="" class="mt-3">Jumlah</label>
                    <input type="text" class="form-control" name="jumlah" id="jumlah">
                    <label for="" class="mt-3">Jenis</label>
                    <input type="text" class="form-control" name="jenis" id="jenis">

                    <div class="row">
                        <div class="col">
                            <label for="" class="mt-3">Baik</label>
                            <input type="text" class="form-control" name="baik" id="baik">
                        </div>
                        <div class="col">
                            <label for="" class="mt-3">Buruk</label>
                            <input type="text" class="form-control" name="buruk" id="buruk">
                        </div>
                    </div>

                    <label for="" class="mt-3">Foto</label>
                    <input type="file" class="form-control" name="file">
                    <!-- <label for="keterangan" class="mt-3">keterangan</label> -->
                    <!-- <input type="text" class="form-control" name="keterangan"> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" name="tambah" id="tambah">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>