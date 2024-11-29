<?php

function hitung_umur($tanggal_lahir)
{
  $tgl_lahir = new DateTime($tanggal_lahir);
  $hari_ini = new DateTime();
  $umur = $hari_ini->diff($tgl_lahir);
  return $umur->y;
}


function gaji_pekerjaan($pekerjaan)
{
  $gaji = 0;
  switch ($pekerjaan) {
    case 'Formen':
      $gaji = 10000000;
      break;
    case 'Leader':
      $gaji = 8000000;
      break;
    case 'Operator Produksi':
      $gaji = 5000000;
      break;
    default:
      $gaji = 0;
  }
  return $gaji;
}


if (isset($_POST['submiit'])) {

  $nama = $_POST['nama'];
  $tanggal_lahir = $_POST['tanggal_lahir'];
  $pekerjaan = $_POST['pekerjaan'];

  $umur = hitung_umur($tanggal_lahir);
  $gaji = gaji_pekerjaan($pekerjaan);
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Input Pengguna</title>
</head>

<body>
  <div class="container">
    <h2>Form Input Data Tugas PHP</h2>
    <form action="Index.php" method="POST">
      <label for="nama">Nama: </label>
      <input type="text" id="nama" name="nama" required><br><br>
      <label for="tanggal_lahir">Tanggal Lahir: </label>
      <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br><br>
      <label for="pekerjaan">Pekerjaan: </label>
      <select id="pekerjaan" name="pekerjaan" required>
        <option value="Formen">Formen</option>
        <option value="Leader">Leader</option>
        <option value="Operator Produksi">Operator Produksi</option>
      </select><br><br>
      <button type="submit" name="submiit">Submit</button>
    </form>

    <?php
    if (isset($_POST['submiit'])) {
      echo "<h3>Output Tugas PHP</h3>";
      echo "<p>Nama: $nama</p>";
      echo "<p>Umur: $umur tahun</p>";
      echo "<p>Pekerjaan: $pekerjaan</p>";
      echo "<p>Gaji: Rp " . number_format($gaji, 0, ',', '.') . "</p>";
    }
    ?>
  </div>
</body>

</html>