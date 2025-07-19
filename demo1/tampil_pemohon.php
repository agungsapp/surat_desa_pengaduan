<?php include '../koneksi/konek1.php';?>
<?php
	$tampil_nik = "SELECT * FROM data_user WHERE nik=$_SESSION[nik]";
	$query = mysqli_query($konek1,$tampil_nik);
	$data = mysqli_fetch_array($query,MYSQLI_BOTH);
	$nik = $data['nik'];
    $nama = $data['nama'];
    $tempat = $data['tempat_lahir'];
    $tanggal = $data['tanggal_lahir'];
    $format = date('d-m-Y',strtotime($tanggal));
    $jekel = $data['jekel'];
    $alamat = $data['alamat'];
    $telepon = $data['telepon'];
    $agama = $data['agama'];
    $pekerjaan = $data['pekerjaan'];
    $nm_ayah = $data['nm_ayah'];
    $nm_ibu = $data['nm_ibu'];
    $pk_ayah = $data['pk_ayah'];
    $pk_ibu = $data['pk_ibu'];
    $kawin = $data['kawin'];

?>
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">BIODATA ANDA</h4>
                            <a href="?halaman=ubah_pemohon&nik=<?=$nik;?>" class="btn btn-sm btn-warning btn-round ml-auto">
                                <i class="fa fa-edit"></i>
                                    Ubah Biodata
                            </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <td>:</td>
                                <td><?= $nik;?></td>
                            </tr>
                            <tr>
                                <th>NAMA</th>
                                <td>:</td>
                                <td><?= $nama;?></td>
                            </tr>
                            <tr>
                                <th>TTL</th>
                                <td>:</td>
                                <td><?= $tempat.', '.$format;?></td>
                            </tr>

                            <tr>
                                <th>JENIS KELAMIN</th>
                                <td>:</td>
                                <td><?= $jekel;?></td>
                            </tr>
                            <tr>
                                <th>AGAMA</th>
                                <td>:</td>
                                <td><?= $agama;?></td>
                            </tr>
                            <tr>
                                <th>ALAMAT</th>
                                <td>:</td>
                                <td><?= $alamat;?></td>
                            </tr>
                            <tr>
                                <th>TELEPON</th>
                                <td>:</td>
                                <td><?= $telepon;?></td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <td>:</td>
                                <td><?= $pekerjaan;?></td>
                            </tr>
                            <tr>
                                <th>STATUS PERKAWINAN</th>
                                <td>:</td>
                                <td><?= $kawin;?></td>
                            </tr>
                            <tr>
                                <th>NAMA AYAH</th>
                                <td>:</td>
                                <td><?= $nm_ayah;?></td>
                            </tr>
                            <th>NAMA IBU</th>
                                <td>:</td>
                                <td><?= $nm_ibu;?></td>
                            </tr>
                            <th>PEKERJAAN AYAH</th>
                                <td>:</td>
                                <td><?= $pk_ayah;?></td>
                            </tr>
                            <th>PEKERJAAN IBU</th>
                                <td>:</td>
                                <td><?= $pk_ibu;?></td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>    
    </div>
</div>