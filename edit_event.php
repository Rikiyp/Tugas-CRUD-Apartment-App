<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="style.css">
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
            <li class="active">
                <a href="datatable.php">
                    <span>Data Table</span>
                </a>
            </li>
            <li>
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
    <div class="row">
        <div class="col-lg-6">
        </div>
    </div>
        <div class="header--wrapper">
            <div class ="header--title">
                <h2>Edit Data</h2>
            </div>
        </div>
        <div class="tabular--wrapper">
            <div class="table-container">
            <form method="post">
                <?php
                // Koneksi ke database
                $servername = "localhost";
                $username = "root";
                $password = "rikiyudi123";
                $database = "db_apart";

                $conn = mysqli_connect($servername, $username, $password, $database);

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
                    // Tangkap data dari formulir update
                    $edited_penyewa_name = $_POST['edited_penyewa_name'];
                    $edited_no_identitas = $_POST['edited_no_identitas'];
                    $edited_penyewa_alamat = $_POST['edited_penyewa_alamat'];
                    $edited_no_telepon = $_POST['edited_no_telepon'];
                    $edited_no_unit = $_POST['edited_no_unit'];
                    $edited_kategori = $_POST['edited_kategori'];
                    $edited_tanggal_mulai = $_POST['edited_tanggal_mulai'];
                    $edited_tanggal_selesai = $_POST['edited_tanggal_selesai'];
                    $edited_harga = $_POST['edited_harga'];
                    $edited_status = $_POST['edited_status'];
                    $edit_id = $_POST['edit_id'];
                
                    // Query SQL UPDATE untuk meng-update data acara
                    $sql_update = "UPDATE tb_penyewa SET nama_penyewa='$edited_penyewa_name', no_identitas='$edited_no_identitas', alamat='$edited_penyewa_alamat', no_telepon='$edited_no_telepon', no_unit='$edited_no_unit', kategori='$edited_kategori', tanggal_mulai='$edited_tanggal_mulai', tanggal_selesai='$edited_tanggal_selesai', harga='$edited_harga', status='$edited_status' WHERE id_penyewa='$edit_id'";
                
                    // Eksekusi query update
                    if (mysqli_query($conn, $sql_update)) {
                        header("Location: datatable.php");
                        exit();
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                }

                
                if (!$conn) {
                    die("Koneksi gagal: " . mysqli_connect_error());
                }

                // Tangkap ID acara dari URL
                if (isset($_POST['edit_id'])) {
                    $edit_id = $_POST['edit_id'];
                
                    // Query untuk mengambil detail acara berdasarkan ID
                    $sql = "SELECT * FROM tb_penyewa WHERE id_penyewa = $edit_id";
                    $result = mysqli_query($conn, $sql);
                
                    // Mengecek apakah ada data yang ditemukan
                    if (mysqli_num_rows($result) > 0) {
                        // Menampilkan data pada formulir untuk diedit
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <!-- Formulir untuk mengedit data acara -->
                        <form method="post">
                            <!-- Field untuk mengedit nama penyewa -->
                            <label for="edited_penyewa_name">Nama Penyewa:</label><br>
                            <input type="text" id="edited_penyewa_name" name="edited_penyewa_name" value="<?php echo $row['nama_penyewa']; ?>"><br>
                                                    
                            <!-- Field untuk mengedit nomor identitas -->
                            <label for="edited_no_identitas">Nomor Identitas:</label><br>
                            <input type="text" id="edited_no_identitas" name="edited_no_identitas" value="<?php echo $row['no_identitas']; ?>"><br>
                                                    
                            <!-- Field untuk mengedit alamat penyewa -->
                            <label for="edited_penyewa_alamat">Alamat:</label><br>
                            <input type="text" id="edited_penyewa_alamat" name="edited_penyewa_alamat" value="<?php echo $row['alamat']; ?>"><br>
                                                    
                            <!-- Field untuk mengedit nomor telepon -->
                            <label for="edited_no_telepon">Nomor Telepon:</label><br>
                            <input type="text" id="edited_no_telepon" name="edited_no_telepon" value="<?php echo $row['no_telepon']; ?>"><br>
                                                    
                            <!-- Field untuk mengedit nomor unit -->
                            <label for="edited_no_unit">Nomor Unit:</label><br>
                            <input type="text" id="edited_no_unit" name="edited_no_unit" value="<?php echo $row['no_unit']; ?>"><br>
                                                    
                            <!-- Field untuk mengedit kategori -->
                            <label for="edited_kategori">Kategori</label><br>
                            <select id="edited_kategori" name="edited_kategori" required>
                                <option value="1BR" <?php if($row['kategori'] == "1BR") echo "selected"; ?>>1BR</option>
                                <option value="2BR" <?php if($row['kategori'] == "2BR") echo "selected"; ?>>2BR</option>
                                <option value="3BR" <?php if($row['kategori'] == "3BR") echo "selected"; ?>>3BR</option>
                            </select><br>
                                                    
                            <!-- Field untuk mengedit tanggal mulai -->
                            <label for="edited_tanggal_mulai">Tanggal Mulai:</label><br>
                            <input type="date" id="edited_tanggal_mulai" name="edited_tanggal_mulai" value="<?php echo $row['tanggal_mulai']; ?>"><br>
                                                    
                            <!-- Field untuk mengedit tanggal selesai -->
                            <label for="edited_tanggal_selesai">Tanggal Selesai:</label><br>
                            <input type="date" id="edited_tanggal_selesai" name="edited_tanggal_selesai" value="<?php echo $row['tanggal_selesai']; ?>"><br>
                                                    
                            <!-- Field untuk mengedit harga -->
                            <label for="edited_harga">Harga:</label><br>
                            <input type="text" id="edited_harga" name="edited_harga" value="<?php echo $row['harga']; ?>"><br>
                                                    
                            <!-- Field untuk mengedit status -->
                            <label for="edited_status">Status:</label><br>
                            <select id="edited_status" name="edited_status" required>
                                <option value="Lunas" <?php if($row['status'] == "Lunas") echo "selected"; ?>>Lunas</option>
                                <option value="Belum Lunas" <?php if($row['status'] == "Belum Lunas") echo "selected"; ?>>Belum Lunas</option>
                            </select><br><br>
                                                    
                            <!-- Hidden field untuk menyimpan ID yang diedit -->
                            <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">
                                                    
                            <!-- Tombol "Update" untuk mengirimkan formulir -->
                            <button type="submit" name="update">Update</button>
                        </form>

                        <?php
                    } else {
                        echo "Tidak ada data yang ditemukan.";
                    }
                } else {
                    echo "ID acara tidak ditemukan.";
                }
                

                // Menutup koneksi
                mysqli_close($conn);
                ?>
            </form>
            </div>
        </div>
    </div>
    
    </body>
</html>