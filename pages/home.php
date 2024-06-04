<?php
    $barang = mysqli_query($conn, "SELECT * FROM tb_barang");
    $pinjam = mysqli_query($conn, "SELECT * FROM tb_pinjam");
    $anggota = mysqli_query($conn, "SELECT * FROM tb_anggota");


?>
<div class="main-content">
    <div class="home pt-3">
        <a href="index.php?page=barang" class="card-content " style="color: black">
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="106" fill="currentColor" class="" viewBox="0 0 16 16">
                    <path
                        d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z" />
                </svg>
                <p class="text pt-3"> Barang: <?= mysqli_num_rows($barang)?> </p>
            </div>
        </a>

        <a href="index.php?page=pinjam" class="card-content " style="color: black">
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="106" fill="currentColor" class="" viewBox="0 0 16 16">
                    <path
                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z" />
                    <path
                        d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z" />
                </svg>
                <p class="text pt-3"> Pinjam: <?= mysqli_num_rows($pinjam)?> </p>
            </div>
        </a>

        <a href="index.php?page=anggota" class="card-content " style="color: black">
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="106" fill="currentColor" class="" viewBox="0 0 16 16">
                    <path
                        d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                </svg>
                <p class="text pt-3"> Anggota: <?= mysqli_num_rows($anggota)?> </p>
            </div>
        </a>



        <div class="pinjam-panel p-3">
            <p style="font-size: 17pt; font-weight:bold">Barang Pinjam:</p>
            <table class="table pt-5">
                <thead>
                    <tr class="bg-secondary">
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Jenis</th>
                        <th scope="col" style="width: 400px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $q = "SELECT * FROM tb_pinjam WHERE status = 'belum'";
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
                    <tr>
                        <th><?= $i++?></th>
                        <td ><?= $namapinjam?></td>
                        <td ><?= $jumlahpinjam?></td>
                        <td ><?= $jenis?></td>

                        <td> <!-- CONFIRM BTN -->
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
                    <?php }?>
                </tbody>
            </table>


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