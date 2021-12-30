<!DOCTYPE html>
<html>

<head>
  <title>Mari Belajar Coding</title>
  <?php
  //  phpinfo();
  // include "configuration/config_etc.php";
  include "configuration/config_include.php";
  // etc();
  encryption();
  session();
  connect();
  head();
  body();
  timing();
  ?>
</head>

<body>

  <table>

    <form method="post" enctype="multipart/form-data">
      <tr>
        <td>Pilih File</td>
        <td><input name="filemhsw" type="file" required="required"></td>
      </tr>
      <tr>
        <td></td>
        <td><input name="upload" type="submit" value="Import"></td>
      </tr>
    </form>
  </table>
  <?php
  if (isset($_POST['upload'])) {

    require('spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
    require('spreadsheet-reader-master/SpreadsheetReader.php');

    //upload data excel kedalam folder uploads
    $target_dir = "uploads/" . basename($_FILES['filemhsw']['name']);

    move_uploaded_file($_FILES['filemhsw']['tmp_name'], $target_dir);

    $Reader = new SpreadsheetReader($target_dir);
    //   foreach ($Reader as $Row)
    // 	{
    // 		print_r($Row);
    // 	}
    foreach ($Reader as $Key => $Row) {
      //   var_dump($Row);
      // import data excel mulai baris ke-2 (karena ada header pada baris 1)
      if ($Key < 1) continue;
      $query = mysqli_query($conn, "INSERT INTO testing(nim,nama,alamat,jurusan) VALUES ('" . $Row[0] . "', '" . $Row[1] . "','" . $Row[2] . "','" . $Row[3] . "')");
    }
    if ($query) {
      echo "Import data berhasil";
    } else {
      echo mysqli_error($conn);
    }
  }
  ?>
  <h2>Data Mahasiswa</h2>
  <table border="1">
    <tr>
      <th>No</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Jurusan</th>
    </tr>
    <?php
    $no = 1;
    $data = mysqli_query($conn, "select * from testing");
    //   var_dump($data);
    while ($d = mysqli_fetch_assoc($data)) {
    ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= mysqli_real_escape_string($conn, $d['nim']); ?></td>
        <td><?= mysqli_real_escape_string($conn, $d['nama']);; ?></td>
        <td><?= mysqli_real_escape_string($conn, $d['alamat']); ?></td>
        <td><?= mysqli_real_escape_string($conn, $d['jurusan']); ?></td>
      </tr>
    <?php
    }
    ?>
  </table>
</body>

</html>