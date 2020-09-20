<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="d-flex justify-content-begin mt-3">
                    <h3 class="h3 mb-0 text-gray-800 mr-3"><?= $title?></h3>
                </div>
            </div>
            <div class="table-responsive">
                <table border=1>
                    <tr>
                        <th>Pengajar</th>
                        <th>Program</th>
                        <th>Tempat</th>
                        <th>Waktu</th>
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
                    <?php foreach ($kelas as $i => $kelas) :?>
                        <?php
                            $no = 0;
                        foreach ($kelas['peserta'] as $data) :?>
                            <tr>
                                <td><?= ucwords(strtolower($kelas['kelas']['nama_kpq']))?></td>
                                <td><?= ucwords(strtolower($kelas['kelas']['program']))?></td>
                                <td><?= ucwords(strtolower($kelas['kelas']['tempat']))?></td>
                                <td><?= ucwords(strtolower($kelas['kelas']['hari'] . " " . $kelas['kelas']['jam']))?></td>
                                <td><?= ucwords(strtolower(++$no))?></td>
                                <td><?= date("d-m-Y", strtotime($data['peserta']['tgl_masuk']))?></td>
                                <td><?= ucwords(strtolower($data['peserta']['nama_peserta']))?></td>
                                <td><?= ucwords(strtolower($data['peserta']['t4_lahir']))?></td>
                                <td><?= $data['peserta']['tgl_lahir']?></td>
                                <td><?= ucwords(strtolower($data['peserta']['jk']))?></td>
                                <td><?= $data['peserta']['pendidikan']?></td>
                                <td><?= $data['peserta']['status_nikah']?></td>
                                <td>'<?= $data['peserta']['no_hp']?></td>
                                <td><?= ucwords(strtolower($data['alamat']['alamat']))?></td>
                                <td><?= ucwords(strtolower($data['alamat']['provinsi']))?></td>
                                <td><?= ucwords(strtolower($data['alamat']['kab_kota']))?></td>
                                <td><?= ucwords(strtolower($data['alamat']['kec']))?></td>
                                <td><?= ucwords(strtolower($data['alamat']['kel']))?></td>
                                <td><?= $data['alamat']['kd_pos']?></td>
                                <td><?= $data['alamat']['no_telp']?></td>
                                <td><?= $data['pekerjaan']['pekerjaan']?></td>
                                <td><?= ucwords(strtolower($data['ortu']['nama_ayah']))?></td>
                                <td><?= ucwords(strtolower($data['ortu']['nama_ibu']))?></td>
                            </tr>
                        <?php endforeach;?>
                    <?php endforeach;?>
                </table>
            </div>
        </div>
    </div>
</div>