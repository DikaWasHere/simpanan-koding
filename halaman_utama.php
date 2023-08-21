<!DOCTYPE html>
<html>
<head>
    <title>Halaman Utama Tiket Bioskop</title>
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
        
        .movie-description {
            font-size: 14px;
            color: #333333;
            margin-bottom: 10px;
        }
        
        .movie-image {
            text-align: center;
            margin-bottom: 10px;
        }
        
        .movie-image img {
            max-width: 100px;
        }
        
        .movie-link {
            display: block;
            text-align: center;
            margin-top: 10px;
        }
        
        .movie-link a {
            color: #ffffff;
            background-color: #333333;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
        }
        
        .movie-link a:hover {
            background-color: #666666;
        }
        
        .ticket-form {
            margin-top: 10px;
            text-align: center;
        }
        
        .ticket-form input[type="number"] {
            width: 50px;
            padding: 5px;
        }
        
        .ticket-form input[type="submit"] {
            color: #ffffff;
            background-color: #333333;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .ticket-form input[type="submit"]:hover {
            background-color: #666666;
        }
        
        .member-checkbox {
            margin-top: 10px;
            text-align: center;
        }
    </style>
    
</head>
<body>
    <h1>Tiket Bioskop</h1>
    
    <?php
    // Daftar film
    $movies = [
        [
            'title' => 'Avengers: Endgame',
            'info' => 'Genre: Action, Adventure, Sci-Fi | Rating: 8.4/10',
            'description' => 'After the devastating events of Avengers: Infinity War, the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos\' actions and restore balance to the universe.',
            'image' => 'gambar/avenger.jpg',
            'link' => 'end.php?movie=1',
            'price' => 100000,
            'discounted_price' => 35000,

            'trailer' => 'akhir.php?movie=1',
            'is_member_discount' => false
            
        ],
        [
            'title' => 'Spider-Man: Far From Home',
            'info' => 'Genre: Action, Adventure, Sci-Fi | Rating: 7.5/10',
            'description' => 'Following the events of Avengers: Endgame, Spider-Man must step up to take on new threats in a world that has changed forever.',
            'image' => 'gambar/spiderman.jpg',
            'link' => 'end.php?movie=2',
            'price' => 50000,
            'discounted_price' => 31500,

            'trailer' => 'akhir.php?movie=2',
            'is_member_discount' => false
        ],
        [
            'title' => 'Black Widow',
            'info' => 'Genre: Action, Adventure, Sci-Fi | Rating: 6.8/10',
            'description' => 'Natasha Romanoff confronts the darker parts of her ledger when a dangerous conspiracy with ties to her past arises. Pursued by a force that will stop at nothing to bring her down, Natasha must deal with her history as a spy and the broken relationships left in her wake.',
            'image' => 'gambar/black.jpg',

            'link' => 'end.php?movie=3',

            'price' => 55000,
            'discounted_price' => 38500,
            'trailer' => 'akhir.php?movie=3',
            'is_member_discount' => true
        ],
        
    ];
    
    // Menampilkan daftar film
    foreach ($movies as $index => $movie) {
        
        echo '<div class="movie-card">';
        echo '<h2 class="movie-title">' . $movie['title'] . '</h2>';
        echo '<p class="movie-info">' . $movie['info'] . '</p>';
        echo '<a href="akhir.php">trailer</a>';
        echo '<div class="movie-image"><img src="' . $movie['image'] . '" alt="' . $movie['title'] . '"></div>';
        echo '<p class="movie-description">' . $movie['description'] . '</p>';
        
        echo '<labe action="' . $movie['link'] . '" method="post">';

        // Menampilkan formulir pembelian tiket
        echo '<form class="ticket-form" action="' . $movie['link'] . '" method="post">';
        echo '<label for="quantity-' . $index . '">Jumlah Tiket:</label>';
        echo '<input type="number" name="quantity" id="quantity-' . $index . '" min="1" value="1">';
        
        // Menampilkan opsi member
        if ($movie['is_member_discount']) {
            echo '<div class="member-checkbox">';
            echo '<input type="checkbox" name="is_member" id="is-member-' . $index . '">';
            echo '<label for="is-member-' . $index . '">Anggota Member</label>';
            echo '</div>';
        }
       
        echo '<input type="submit" value="Beli Tiket">';
        echo '</form>';
        
        echo '</div>';
    }
    
    echo "<script> 
            alert('anda akan membeli tiket');
            
        </script>
    ";
    ?>
    
</body>
</html>
