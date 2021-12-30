<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include "configuration/config_include.php";
connect();
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=download_excel.xls");
$get_kelas = @$_GET['kelas'];
if (isset($_POST['export_xls'])) {

?>
  <table border="1">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Siswa</th>
        <th>NIS</th>
        <th>Jenis Kelamin</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>NIK</th>
        <th>Agama</th>
        <th>Alamat</th>
        <th>RT</th>
        <th>RW</th>
        <th>Dusun</th>
        <th>Kelurahan</th>
        <th>Kecamatan</th>
        <th>Kode POS</th>
        <th>Jenis Tinggal</th>
        <th>ALat Transportasi</th>
        <th>Telepon</th>
        <th>HP</th>
        <th>Email</th>
        <th>SKHUN</th>
        <th>Penerima KPS</th>
        <th>No KPS</th>
        <th>Nama Ayah Siswa</th>
        <th>Tahun Lahir Ayah</th>
        <th>Jenjang Pendidikan Ayah</th>
        <th>Pekerjaan Ayah</th>
        <th>Penghasilan Ayah</th>
        <th>NIK Ayah</th>
        <th>Nama Ibu Siswa</th>
        <th>Tahun Lahir Ibu</th>
        <th>Jenjang Pendidikan Ibu</th>
        <th>Pekerjaan Ibu</th>
        <th>Penghasilan Ibu</th>
        <th>NIK Ibu</th>
        <th>Nama Wali Siswa</th>
        <th>Tahun Lahir Wali</th>
        <th>Jenjang Pendidikan Wali</th>
        <th>Pekerjaan Wali</th>
        <th>Penghasilan Wali</th>
        <th>NIK Wali</th>
        <th>Rombel</th>
        <th>Tahun Ajaran</th>
        <th>No Peserta Ujian Nasional</th>
        <th>No Seri Ijasah</th>
        <th>Penerima KIP</th>
        <th>Nomor KIP</th>
        <th>Nomor KKS</th>
        <th>No Registrasi Akta Lahir</th>
        <th>Bank</th>
        <th>Nomor Rekening</th>
        <th>Atas Nama Bank</th>
        <th>Layak PIP</th>
        <th>Alasan Layak</th>
        <th>Kebutuhan Khusus</th>
        <th>Sekolah Asal</th>
        <th>#</th>
        <th>Koordinat Bujur</th>
        <th>Koordinat Lintang</th>
        <th>No KK</th>
        <th>Berat Badan</th>
        <th>Tinggi Badan</th>
        <th>Lingkar Kepala</th>
        <th>Jumlah Saudara Kandung</th>
        <th>Jarak Rumah Ke Sekolah (KM)</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT * FROM siswa 
      JOIN ayah_siswa
      ON siswa.id_siswa = ayah_siswa.id_siswa
      JOIN ibu_siswa 
      ON siswa.id_siswa = ibu_siswa.id_siswa
      JOIN rombel 
      ON rombel.id_rombel = siswa.id_rombel
      JOIN tahun_ajaran
      ON tahun_ajaran.id_tahun_ajaran = siswa.id_tahun_ajaran
      WHERE rombel.rombel = '$get_kelas'
      ORDER BY siswa.nama_siswa";
      $hasil = mysqli_query($conn, $sql);
      $arr = [];
      while ($fill = mysqli_fetch_assoc($hasil)) {

        $wali = "SELECT * FROM wali_siswa WHERE id_siswa = '$fill[id_siswa]'";
        $query_wali = mysqli_query($conn, $wali);
        $data_wali = mysqli_fetch_array($query_wali);
        if ($data_wali != null) {
          $fill['wali'] = $data_wali;
        }

        // array_push($arr, $fill);

        $pip = "SELECT * FROM pip WHERE id_siswa = '$fill[id_siswa]'";
        $query_pip = mysqli_query($conn, $pip);
        $data_pip = mysqli_fetch_array($query_pip);

        if ($data_pip != null) {
          $fill['pip'] = $data_pip;
        }

        // array_push($arr, $fill);

        $bank = "SELECT * FROM bank WHERE id_siswa = '$fill[id_siswa]'";
        $query_bank = mysqli_query($conn, $bank);
        $data_bank = mysqli_fetch_array($query_bank);

        if ($data_bank != null) {
          $fill['bank'] = $data_bank;
        }

        // array_push($arr, $fill);

        $kps = "SELECT * FROM kps WHERE id_siswa = '$fill[id_siswa]'";
        $query_kps = mysqli_query($conn, $kps);
        $data_kps = mysqli_fetch_array($query_kps);

        if ($data_kps != null) {
          $fill['kps'] = $data_kps;
        }

        array_push($arr, $fill);
      }

      $no_urut = 0;
      foreach ($arr as $item) {
        if ($item['jk'] == 'P') {
          $jk = 'Perempuan';
        } else if ($item['jk'] == 'L') {
          $jk = 'Laki Laki';
        }
        // echo is_null($item['bank']['bank']);
        if (isset($item['bank'])) {
          $nama_bank = $item['bank']['bank'];
        } else {
          $nama_bank = '';
        }
        if (isset($item['bank'])) {
          $norek_bank = $item['bank']['norek_bank'];
        } else {
          $norek_bank = '';
        }
        if (isset($item['bank'])) {
          $an_bank = $item['bank']['an_bank'];
        } else {
          $an_bank = '';
        }
        if (isset($item['wali'])) {
          $nama_wali = $item['wali']['nama_wali'];
        } else {
          $nama_wali = '';
        }
        if (isset($item['wali'])) {
          $tahun_lahir_wali = $item['wali']['tahun_lahir_wali'];
        } else {
          $tahun_lahir_wali = '';
        }
        if (isset($item['wali'])) {
          $pekerjaan_wali = $item['wali']['pekerjaan_wali'];
        } else {
          $pekerjaan_wali = '';
        }
        if (isset($item['wali'])) {
          $jenjang_pendidikan_wali = $item['wali']['jenjang_pendidikan_wali'];
        } else {
          $jenjang_pendidikan_wali = '';
        }
        if (isset($item['wali'])) {
          $penghasilan_wali = $item['wali']['penghasilan_wali'];
        } else {
          $penghasilan_wali = '';
        }
        if (isset($item['wali'])) {
          $nik_wali = $item['wali']['nik_wali'];
        } else {
          $nik_wali = '';
        }
        if (isset($item['kps'])) {
          $penerima_kps = $item['kps']['penerima_kps'];
        } else {
          $penerima_kps = '';
        }
        if (isset($item['kps'])) {
          $no_kps = $item['kps']['no_kps'];
        } else {
          $no_kps = '';
        }
        if (isset($item['pip'])) {
          $penerima_pip = $item['pip']['layak_pip'];
        } else {
          $penerima_pip = '';
        }
        if (isset($item['pip'])) {
          $alasan_layak_pip = $item['pip']['alasan_layak_pip'];
        } else {
          $alasan_layak_pip = '';
        }
      ?>
        <!-- <pre>
        <?php print_r($arr) ?>
      </pre> -->
        <tr>
          <td><?php echo ++$no_urut ?></td>
          <td><?php echo $item['nama_siswa']; ?></td>
          <td><?php echo $item['nis']; ?></td>
          <td><?php echo $jk; ?></td>
          <td><?php echo $item['tempat_lahir']; ?></td>
          <td><?php echo $item['tgl_lahir']; ?></td>
          <td><?php echo $item['nik']; ?></td>
          <td><?php echo $item['agama']; ?></td>
          <td><?php echo $item['alamat']; ?></td>
          <td><?php echo $item['rt']; ?></td>
          <td><?php echo $item['rw']; ?></td>
          <td><?php echo $item['dusun']; ?></td>
          <td><?php echo $item['kelurahan']; ?></td>
          <td><?php echo $item['kecamatan']; ?></td>
          <td><?php echo $item['kode_pos']; ?></td>
          <td><?php echo $item['jenis_tinggal']; ?></td>
          <td><?php echo $item['alat_transportasi']; ?></td>
          <td><?php echo $item['telepon']; ?></td>
          <td><?php echo $item['hp']; ?></td>
          <td><?php echo $item['email']; ?></td>
          <td><?php echo $item['skhun']; ?></td>
          <td><?php echo $penerima_kps; ?></td>
          <td><?php echo $no_kps; ?></td>
          <td><?php echo $item['nama_ayah']; ?></td>
          <td><?php echo $item['tahun_lahir_ayah']; ?></td>
          <td><?php echo $item['jenjang_pendidikan_ayah']; ?></td>
          <td><?php echo $item['pekerjaan_ayah']; ?></td>
          <td><?php echo $item['penghasilan_ayah']; ?></td>
          <td><?php echo $item['nik_ayah']; ?></td>
          <td><?php echo $item['nama_ibu']; ?></td>
          <td><?php echo $item['tahun_lahir_ibu']; ?></td>
          <td><?php echo $item['jenjang_pendidikan_ibu']; ?></td>
          <td><?php echo $item['pekerjaan_ibu']; ?></td>
          <td><?php echo $item['penghasilan_ibu']; ?></td>
          <td><?php echo $item['nik_ibu']; ?></td>
          <td><?php echo $nama_wali; ?></td>
          <td><?php echo $tahun_lahir_wali; ?></td>
          <td><?php echo $jenjang_pendidikan_wali; ?></td>
          <td><?php echo $pekerjaan_wali; ?></td>
          <td><?php echo $penghasilan_wali; ?></td>
          <td><?php echo $nik_wali; ?></td>
          <td><?php echo $item['rombel']; ?></td>
          <td><?php echo $item['tahun_ajaran']; ?></td>
          <td><?php echo $item['no_ujian_nasional']; ?></td>
          <td><?php echo $item['no_seri_ijasah']; ?></td>
          <td><?php echo $item['penerima_kip']; ?></td>
          <td><?php echo $item['nomor_kip']; ?></td>
          <td><?php echo $item['no_kks']; ?></td>
          <td><?php echo $item['no_regis_akta_lahir']; ?></td>
          <td><?php echo $nama_bank; ?></td>
          <td><?php echo $norek_bank; ?></td>
          <td><?php echo $an_bank; ?></td>
          <td><?php echo $penerima_pip; ?></td>
          <td><?php echo $alasan_layak_pip; ?></td>
          <td>Tidak ada</td>
          <td><?php echo $item['sekolah_asal']; ?></td>
          <td><?php echo $item['no_tabel_tdk']; ?></td>
          <td><?php echo $item['koordinat_bujur']; ?></td>
          <td><?php echo $item['koordinat_lintang']; ?></td>
          <td><?php echo $item['no_kk']; ?></td>
          <td><?php echo $item['berat_badan']; ?></td>
          <td><?php echo $item['tinggi_badan']; ?></td>
          <td><?php echo $item['lingkar_kepala']; ?></td>
          <td><?php echo $item['jml_saudara_kandung']; ?></td>
          <td><?php echo $item['jarak_ke_sekolah']; ?></td>

        </tr>
      <?php
      }
      ?>
    </tbody>

  </table>
<?php
}
?>