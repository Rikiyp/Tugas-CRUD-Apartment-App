<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Data Table Apartment</title>
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
        <div class="header--wrapper">
            <div class ="header--title">
                <h2>Data Penyewa</h2>
            </div>
            <div class="user--info">
                <div class="search--box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search">
                </div>
                <img src="./image/img.jpg" alt=""/>
            </div>            
        </div>
        <div class="tabular--wrapper">
            <h3 class="main--title">Data Penyewa</h3>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Penyewa</th>
                            <th>No. Identitas</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>No. Unit</th>
                            <th>Kategori</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Harga</th>
                            <th>Status Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                        <tbody>
                        <?php
                            // Koneksi ke database
                            $servername = "localhost";
                            $username = "root";
                            $password = "rikiyudi123";
                            $database = "db_apart";

                            $conn = mysqli_connect($servername, $username, $password, $database);

                            if (!$conn) {
                                die("Koneksi gagal: " . mysqli_connect_error());
                            }

                            // Query untuk mengambil data
                            $sql = "SELECT * FROM tb_penyewa";
                            $result = mysqli_query($conn, $sql);

                            // Mengecek apakah ada data yang ditemukan
                            if (mysqli_num_rows($result) > 0) {
                                // Menampilkan data ke dalam tabel
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['id_penyewa'] . "</td>";
                                    echo "<td>" . $row['nama_penyewa'] . "</td>";
                                    echo "<td>" . $row['no_identitas'] . "</td>";
                                    echo "<td>" . $row['alamat'] . "</td>";
                                    echo "<td>" . $row['no_telepon'] . "</td>";
                                    echo "<td>" . $row['no_unit'] . "</td>";
                                    echo "<td>" . $row['kategori'] . "</td>";
                                    echo "<td>" . $row['tanggal_mulai'] . "</td>";
                                    echo "<td>" . $row['tanggal_selesai'] . "</td>";
                                    echo "<td>" . $row['harga'] . "</td>";
                                    echo "<td>" . $row['status'] . "</td>";
                                    echo "<td>
                                        <form method='post'action='edit_event.php'>
                                            <input type='hidden' name='delete_id' value='" . $row['id_penyewa'] . "'>
                                            <button type='submit' name='delete'>Hapus</button>
                                            <input type='hidden' name='edit_id' value='" . $row['id_penyewa'] . "'>
                                            <button style='color:green;' type='submit' name='edit'>Edit</button>
    
                                        </form>
                                    </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
                            }
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                // Memeriksa apakah tombol delete ditekan
                                if (isset($_POST["delete"])) {
                                    // Mengambil ID yang akan dihapus dari permintaan
                                    $id_to_delete = $_POST["delete_id"];
                                    
                                    // Query untuk menghapus data berdasarkan ID
                                    $sql_delete = "DELETE FROM tb_penyewa WHERE id_penyewa = $id_to_delete";
                            
                                    // Menjalankan query
                                    if (mysqli_query($conn, $sql_delete)) {
                                        echo "Data berhasil dihapus.";
                                    } else {
                                        echo "Error: " . mysqli_error($conn);
                                    }
                                }
                            }

                            // Menutup koneksi
                            mysqli_close($conn);
                        ?>

                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
