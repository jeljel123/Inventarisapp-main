<?php
?>
<div class="main-content">
    <div class="title">Anggota</div>
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
                    <th>DMS</th>
                    <th>Alamat </th>
                    <th>Hp</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $q = "SELECT * FROM tb_anggota";
                    $result = mysqli_query($conn, $q);
                    $datas = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    $i=1;
                    foreach($datas as $r){
                        $idAnggota = $r['id_anggota'];
                        $nama = $r['nama'];
                        $dms = $r['dms'];
                        $alamat = $r['alamat'];
                        $hp = $r['hp'];
                        $foto = $r['foto'];
                    ?>

                <tr class="trows">
                <td><?= $i++?></td>

                    <td><?= $nama?></td>
                    <td><?= $dms?></td>
                    <td><?= $alamat?></td>
                    <td><?= $hp?></td>

                    <td><img src="uploads/img/<?= $foto?>" alt="" style="width:150px; height: 100px"></td>


                    <td>
                        <!-- EDIT BTN -->
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#edit<?= $idAnggota?>">
                            <i class="m-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-pencil " viewBox="0 0 16 16">
                                    <path
                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                </svg></i>EDIT
                        </button>
                        <!-- DELETE BTN -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#DELETE<?= $idAnggota?>">
                            <i class="m-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                    <path
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                </svg></i>HAPUS
                        </button>
                    </td>
                </tr>

                <div class="modal fade" id="edit<?= $idAnggota?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form action="functions/anggota.php" method="post" enctype="multipart/form-data">
                                <div class="modal-body ">
                                <input type="text" value="<?= $idAnggota?>" name="id" style="display: none">

                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="<?= $nama?>">

                                    <label for="" class="mt-3">DMS</label>
                                    <input type="text" class="form-control" name="dms" value="<?= $dms?>">

                                    <label for="" class="mt-3">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" value="<?= $alamat?>">

                                    <label for="" class="mt-3">Hp</label>
                                    <input type="text" class="form-control" name="hp" value="<?= $hp?>">

                                    <p for="" class="mt-3">Foto</p>
                                    <img src="uploads/img/<?= $foto?>" alt="" style="width:150px; height: 100px">
                                    <input type="file" class="form-control mt-3" name="file">
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
                <div class="modal fade" id="DELETE<?= $idAnggota?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-4" id="exampleModalLabel">Hapus: <?= $nama?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form action="functions/anggota.php" method="post">
                                <input type="text" value="<?= $idAnggota?>" name="id" style="display: none">

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

            <form action="functions/anggota.php" method="post" enctype="multipart/form-data">
                <div class="modal-body ">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama" >

                    <label for="" class="mt-3">DMS</label>
                    <input type="text" class="form-control" name="dms" >

                    <label for="" class="mt-3">Alamat</label>
                    <input type="text" class="form-control" name="alamat">

                    <label for="" class="mt-3">Hp</label>
                    <input type="text" class="form-control" name="hp">
                    
                    <label for="" class="mt-3">Foto</label>
                    <img src="" alt="">
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