<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="d-flex justify-content-begin mt-3">
                    <h3 class="h3 mb-0 text-gray-800 mr-3"><?= $title?></h3>
                </div>
            </div>
            <div class="table-responsive">
                <?php foreach ($kelas as $i => $kelas) :?>
                    <table border=1>
                        <tr>
                            <td colspan=2><strong>Pengajar</strong></td>
                            <td colspan="17"><?= $kelas['kelas']['nama_kpq']?></td>
                        </tr>
                        <tr>
                            <td colspan=2><strong>Program</strong></td>
                            <td colspan="17"><?= $kelas['kelas']['program']?></td>
                        </tr>
                        <tr>
                            <td colspan=2><strong>Tempat</strong></td>
                            <td colspan="17"><?= $kelas['kelas']['tempat']?></td>
                        </tr>
                        <tr>
                            <td colspan=2><strong>Waktu</strong></td>
                            <td colspan="17"><?= $kelas['kelas']['hari'] . " " . $kelas['kelas']['jam']?></td>
                        </tr>
                    <!-- </table>
                    <table class="table text-dark" style="font-size: 12px" border=1>
                        <thead class="thead-light"> -->
                            <tr>
                                <th>No</th>
                                <th>Tgl Daftar</th>
                                <th>Nama Peserta</th>
                                <th>Tempat Lahir</th>
                                <th>Tgl Lahir</th>
                                <th>JK</th>
                                <th>Pendidikan</th>
                                <th>Status</th>
                                <th>No. Handphone</th>
                                <th>Alamat</th>
                                <th>Provinsi</th>
                                <th>Kabupaten</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                <th>Kd Pos</th>
                                <th>No. Telp</th>
                                <th>Pekerjaan</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                            </tr>
                        <!-- </thead>
                        <tbody> -->
                            <?php 
                                $no = 0;
                            foreach ($kelas['peserta'] as $data) :?>
                                <tr>
                                    <td><?= ++$no?></td>
                                    <td><?= date("d-m-Y", strtotime($data['peserta']['tgl_masuk']))?></td>
                                    <td><?= $data['peserta']['nama_peserta']?></td>
                                    <td><?= $data['peserta']['t4_lahir']?></td>
                                    <td><?= $data['peserta']['tgl_lahir']?></td>
                                    <td><?= $data['peserta']['jk']?></td>
                                    <td><?= $data['peserta']['pendidikan']?></td>
                                    <td><?= $data['peserta']['status_nikah']?></td>
                                    <td>'<?= $data['peserta']['no_hp']?></td>
                                    <td><?= $data['alamat']['alamat']?></td>
                                    <td><?= $data['alamat']['provinsi']?></td>
                                    <td><?= $data['alamat']['kab_kota']?></td>
                                    <td><?= $data['alamat']['kec']?></td>
                                    <td><?= $data['alamat']['kel']?></td>
                                    <td><?= $data['alamat']['kd_pos']?></td>
                                    <td><?= $data['alamat']['no_telp']?></td>
                                    <td><?= $data['pekerjaan']['pekerjaan']?></td>
                                    <td><?= $data['ortu']['nama_ayah']?></td>
                                    <td><?= $data['ortu']['nama_ibu']?></td>
                                </tr>
                            <?php endforeach;?>
                        <!-- </tbody> -->
                    </table>
                    <br><br>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>