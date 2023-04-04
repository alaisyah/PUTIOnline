<?php
include "../admin/conDB.php";
$keyword = $_GET["keycat"];

$setuju = $conn->query("SELECT * FROM laporan,mahasiswa,kategori,status_laporan where status_laporan.status='approve' and laporan.id_status=status_laporan.id_status and laporan.nim=mahasiswa.nim and laporan.id_kategori=kategori.id_kategori");
$tidak = $conn->query("SELECT * FROM laporan,mahasiswa,kategori,status_laporan where status_laporan.status='unapprove' and laporan.id_status=status_laporan.id_status and laporan.nim=mahasiswa.nim and laporan.id_kategori=kategori.id_kategori");
if ($keyword == "setuju") { ?>
    <?php while ($perlaporan = $setuju->fetch_assoc()) { ?>
        <div>
            <div class="laporan">
                <img src="../assets/img/laporan.png" alt="bukti_laporan" />
                <div class="detail_laporan">
                    <h4 class="pengusul">Pengusul: <span>Pengusul: <span><?php echo $perlaporan['nama']; ?></span></h3>
                            <h4 class="category">#<span><?php echo $perlaporan['nama_kategori']; ?></span></h4>
                            <p>
                                Usulan: <br />
                                <span><?php echo $perlaporan['keluhan'] ?>.</span>
                            </p>
                </div>
                <form action="" method="get" class="status">
                    <button type="submit" name="approve" class="approve">APPROVE</button>
            </div>
            <div class="form">
                <textarea placeholder="feedback anda disini..." name="feedback" id="feedback" cols="10" rows="1"><?php echo $perlaporan['feedback']; ?></textarea>
            </div>
            </form>
        </div>
        </div>
<?php }
} 

if ($keyword == "tidakSetuju") { ?>
    <?php while ($perlaporan = $tidak->fetch_assoc()) { ?>
        <div>
            <div class="laporan">
                <img src="../assets/img/laporan.png" alt="bukti_laporan" />
                <div class="detail_laporan">
                    <h4 class="pengusul">Pengusul: <span>Pengusul: <span><?php echo $perlaporan['nama']; ?></span></h3>
                            <h4 class="category">#<span><?php echo $perlaporan['nama_kategori']; ?></span></h4>
                            <p>
                                Usulan: <br />
                                <span><?php echo $perlaporan['keluhan'] ?>.</span>
                            </p>
                </div>
                <form action="" method="get" class="status">
                    <button type="submit" name="unapprove" class="delete">DELETE</button>
            </div>
            <div class="form">
                <textarea placeholder="feedback anda disini..." name="feedback" id="feedback" cols="10" rows="1"><?php echo $perlaporan['feedback']; ?></textarea>
            </div>
            </form>
        </div>
        </div>
<?php }
} ?>

