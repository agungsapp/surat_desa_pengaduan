<?php include '../koneksi/konek2.php';
?>
<div class="col-12 col-lg-12 mx-auto">
    <div class="card radius-15">
        <div class="card-header text-center">
            <h3 class="mt-4 font-weight-bold">Laporan Masyarakat Desa Bogorejo</h3>
        </div>
        <div class="card-body p-md-5">
            <a href="?halaman=tambahpengaduan" class="btn btn-primary btn-sm mb-3">+ Tambah Laporan</a>
                <div class="table-responsive">

            
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                            <th scope="row"><?php echo $pengaduan['tgl_pengaduan']; ?></th>
                            <td>
                                <img src="foto/<?php echo $pengaduan['foto']; ?>" alt="" class="img-fluid">
                            </td>
                            <td>
                                <button disabled class="btn btn-sm btn-<?php if($pengaduan['status'] == '0'){ echo 'secondary'; } 
                                            if($pengaduan['status'] == 'proses'){ echo 'warning'; }
                                            if($pengaduan['status'] == 'selesai'){ echo 'success'; } 
                                            if($pengaduan['status'] == 'batal'){ echo 'danger'; }?>">
                                        
                                        
                                        <?php if($pengaduan['status'] == '0'){ echo 'Belum Dikonformasi'; } 
                                            if($pengaduan['status'] == 'proses'){ echo 'Diproses'; }
                                            if($pengaduan['status'] == 'selesai'){ echo 'Selesai'; }
                                            if($pengaduan['status'] == 'batal'){ echo 'Batal / Ditolak';} ?>
                                </button>
                            </td>
                            <td>
                                <?php 
                                if($pengaduan['status'] == '0') {
                                   
                                ?>
                                <a href="?halaman=editpengaduan&id_pengaduan=<?php echo $pengaduan['id_pengaduan']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a onclick="return confirm('Yakin hapus data ini?')"  href="?halaman=hapuspengaduan&id_pengaduan=<?php echo $pengaduan['id_pengaduan']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                                <?php
                                 }  else {
                                ?>
                                <a href="?halaman=detailpengaduan&id_pengaduan=<?php echo $pengaduan['id_pengaduan']; ?>" class="btn btn-sm btn-primary">Lihat Detail</a>
                            </td>
                            </tr>

                        </tbody>
                    </table>
                        
                                <h4 class="text-center mt-5">Belum ada laporan</h4>
                    <?php } ?>

                </div>
        </div>     
</div>