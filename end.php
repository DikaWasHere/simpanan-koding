<!DOCTYPE html>
<html>
<head>
    <title>Informasi Tiket Bioskop</title>
    <style>
        /* Gaya CSS untuk tampilan halaman */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
            color: #333333;
        }
        
        .movie-card {
            background-color: #ffffff;
            border-radius: 4px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        
        .movie-title {
            font-size: 20px;
            font-weight: bold;
            margin: 0 0 10px;
        }
        
        .movie-info {
            font-size: 14px;
            color: #777777;
            margin-bottom: 10px;
        }
        
        .movie-details {
            font-size: 14px;
            color: #333333;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Informasi Tiket Bioskop</h1>
    
    <?php
    // Daftar tayangan
    $screenings = [
        [
            'id' => 1,
            'title' => 'Avengers: Endgame',
            'price' => 100000,
            'day' => 'Senin',
            'date' => '1 Juli 2023',
            'discount' => '30%',
            'showtime' => '18:00'
        ],
        [
            'id' => 2,
            'title' => 'Spider-Man: Far From Home',
            'price' => 30000,
            'day' => 'Selasa',
            'date' => '2 Juli 2023',
            'discount' => '30%',
            'showtime' => '17:30'
        ],
        // Tambahkan tayangan lainnya sesuai kebutuhan
    ];
    
    // Mendapatkan ID tiket dari parameter URL
    $selectedMovieId = isset($_GET['movie']) ? intval($_GET['movie']) : null;
    
    // Mendapatkan jumlah tiket dari formulir pembelian
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
    
    // Menampilkan informasi tiket yang dipilih dan menyimpan ke file teks
    $file = fopen('informasi_tiket.txt', 'w'); // Membuka file teks dalam mode menulis ('w')
    
    foreach ($screenings as $screening) {
        if ($screening['id'] === $selectedMovieId) {
            echo '<div class="movie-card">';
            echo '<h2 class="movie-title">' . $screening['title'] . '</h2>';
            echo '<p class="movie-info">Harga Tiket: Rp ' . $screening['price'] . '</p>';
            echo '<p class="movie-details">Hari: ' . $screening['day'] . '</p>';
            echo '<p class="movie-details">Tanggal: ' . $screening['date'] . '</p>';
            echo '<p class="movie-details">Diskon: ' . $screening['discount'] . '</p>';
            echo '<p class="movie-details">Jam Tayang: ' . $screening['showtime'] . '</p>';
            
            // Menghitung harga setelah diskon dengan mengalikan jumlah tiket
            $discountPercentage = intval($screening['discount']);
            $priceAfterDiscount = ($screening['price'] * $quantity) - (($screening['price'] * $quantity) * $discountPercentage / 100);
            echo '<p class="movie-details">Harga Setelah Diskon: Rp ' . $priceAfterDiscount . '</p>';
            
            // Menampilkan jumlah tiket yang ditentukan sebelumnya
            echo '<p class="movie-details">Jumlah Tiket: ' . $quantity . '</p>';
            
            echo '</div>';
            
            // Menyimpan informasi tiket ke file teks
            fwrite($file, "Title: " . $screening['title'] . "\n");
            fwrite($file, "Harga Tiket: Rp " . $screening['price'] . "\n");
            fwrite($file, "Diskon: " . $screening['discount'] . "\n");
            fwrite($file, "Harga Setelah Diskon: Rp " . $priceAfterDiscount . "\n");
            fwrite($file, "Hari: " . $screening['day'] . "\n");
            fwrite($file, "Tanggal: " . $screening['date'] . "\n");
            fwrite($file, "Jam Tayang: " . $screening['showtime'] . "\n");
            fwrite($file, "Jumlah Tiket: " . $quantity . "\n");
            fwrite($file, "------------------------------------\n");
            
            // Berhenti setelah menemukan tiket yang dipilih
            break;
        }
    }
    
    fclose($file); // Menutup file teks
    ?>
</body>
</html>
