<!DOCTYPE html>
<html>
<head>
  <title>DATA PESANAN</title>
  <style>
    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
      background-color: rgb(177, 163, 163);
    }

    .container table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
      
    }

    .container table th,
    .container table td {
      padding: 10px;
      text-align: left;
      border: 5px solid #ccc;
      background-color: #f2f2f2;
    }

    .container table th {
      background-color: rgb(94, 224, 181);
    }

    .container .success-message {
      padding: 10px 20px;
      background-color: green;
      color: white;
      border: none;
      border-radius: 4px;
    }

    .container .data-label {
      font-weight: bold;
    }

    .container .data-value {
      margin-left: 10px;
    }
  </style>
</head>
<body>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $nomor_hp = $_POST["nomor_hp"];
    $alamat = $_POST["alamat"];
    $nama_barang = $_POST["nama_barang"];
    $jumlah = $_POST["jumlah"];

    // Simpan data ke dalam file teks
    $file = fopen("data.txt", "a"); // "a" untuk mode append, artinya menambahkan data ke file yang sudah ada
    fwrite($file, "Nama: " . $nama . "\n");
    fwrite($file, "Email: " . $email . "\n");
    fwrite($file, "Nomor HP: " . $nomor_hp . "\n");
    fwrite($file, "Alamat Pengiriman: " . $alamat . "\n");
    fwrite($file, "Nama Barang: " . $nama_barang . "\n");
    fwrite($file, "Jumlah Barang: " . $jumlah . "\n");
    fwrite($file, "------------------------------\n");
    fclose($file);

    echo '<div class="container">';
    echo '<p class="success-message">PESANAN ANDA BERHASIL DI KIRIM.</p>';
    echo '<p>Pesanan Anda Akan Segera Kami Proses.</p>';
    echo '<p>Terima kasih telah mengirim pesanan:</p>';
    echo '<table>';
    echo '<tr><th class="data-label">Nama:</th><td class="data-value">' . $nama . '</td></tr>';
    echo '<tr><th class="data-label">Email:</th><td class="data-value">' . $email . '</td></tr>';
    echo '<tr><th class="data-label">Nomor HP:</th><td class="data-value">' . $nomor_hp . '</td></tr>';
    echo '<tr><th class="data-label">Alamat Pengiriman:</th><td class="data-value">' . $alamat. '</td></tr>';
    echo '<tr><th class="data-label">Nama Barang:</th><td class="data-value">' . $nama_barang . '</td></tr>';
    echo '<tr><th class="data-label">Jumlah Barang:</th><td class="data-value">' . $jumlah . '</td></tr>';
    echo '</table>';
    echo '</div>';
  }
  ?>
</body>
</html>
