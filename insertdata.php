<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Insert Data</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li>
                <a href="index.php">
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="datatable.php">
                    <span>Data Table</span>
                </a>
            </li>
            <li  class="active">
                <a href="insertdata.php">
                    <span>Tambah Data</span>
                </a>
            </li>
            <li class="logout">
                <a href="#">
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="main--content">
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!-- Elemen formulir untuk Nama Penyewa -->
            <label for="nama">Nama Penyewa:</label>
            <input type="text" id="nama" name="nama" required>

            <!-- Elemen formulir untuk No. Identitas -->
            <label for="ttl">No. Identitas:</label>
            <input type="text" id="ttl" name="ttl" required>

            <!-- Elemen formulir untuk Alamat -->
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>

            <!-- Elemen formulir untuk No. Telepon -->
            <label for="telepon">No. Telepon:</label>
            <input type="text" id="telepon" name="telepon" required>

            <!-- Elemen formulir untuk No. Unit -->
            <label for="unit">No. Unit:</label>
            <input type="text" id="unit" name="unit" required>
            
            <!-- Elemen formulir untuk Kategori -->
            <label for="kategori">Kategori</label>
            <select class="form-select" id="kategori" name="kategori" aria-label="Default select example" required>
                <option value="1BR" selected>1BR</option>
                <option value="2BR">2BR</option>
                <option value="3BR">3BR</option>
            </select>

            <!-- Elemen formulir untuk Tanggal Mulai -->
            <label for="tanggal_mulai">Tanggal Mulai:</label>
            <input type="date" id="tanggal_mulai" name="tanggal_mulai" required>

            <!-- Elemen formulir untuk Tanggal Selesai -->
            <label for="tanggal_selesai">Tanggal Selesai:</label>
            <input type="date" id="tanggal_selesai" name="tanggal_selesai" required>

            <!-- Elemen formulir untuk Harga -->
            <label for="harga">Harga:</label>
            <input type="text" id="harga" name="harga" required>

            <!-- Elemen formulir untuk Status Pembayaran -->
            <label for="status">Status Pembayaran</label>
            <select class="form-select" id="status" name="status" aria-label="Default select example" required>
                <option value="Lunas" selected>Lunas</option>
                <option value="Belum Lunas">Belum Lunas</option>
            </select>

            <!-- Tombol Submit -->
            <button type="submit">Tambah Data</button>
        </form>
    </div>

    <?php
        // koneksi.php
        $servername = "localhost";
        $username = "root";
        $password = "rikiyudi123";
        $database = "db_apart";

        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama_penyewa = $_POST["nama"];
            $no_identitas = $_POST["ttl"];
            $alamat = $_POST["alamat"];
            $no_telepon = $_POST["telepon"];
            $no_unit = $_POST["unit"];
            $kategori = $_POST["kategori"];
            $tanggal_mulai = $_POST["tanggal_mulai"];
            $tanggal_selesai = $_POST["tanggal_selesai"];
            $harga = $_POST["harga"];
            $status = $_POST["status"];

            $sql = "INSERT INTO tb_penyewa (nama_penyewa, no_identitas, alamat, no_telepon, no_unit, kategori, tanggal_mulai, tanggal_selesai, harga, status) 
                    VALUES ('$nama_penyewa', '$no_identitas', '$alamat', '$no_telepon', '$no_unit', '$kategori', '$tanggal_mulai', '$tanggal_selesai', '$harga', '$status')";

            if (mysqli_query($conn, $sql)) {
                echo "Data berhasil ditambahkan.";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

        mysqli_close($conn);
    ?>
</body>
</html>
