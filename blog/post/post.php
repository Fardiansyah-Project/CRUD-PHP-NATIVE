<?php include '../layouts/head.php' ?>
<body>
    <?php include('../layouts/navbar.php');
    ?>
    <?php
        include('../../config/conection.php');

        // Mengecek apakah ID ada di URL
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            echo "<div class='container'><div class='alert alert-danger mt-5'>ID tidak ditemukan di URL!</div></div>";
            exit;
        }

        // Mengambil ID dari URL
        $id = (int)$_GET['id']; // Memastikan ID adalah angka

        // Mengecek apakah koneksi berhasil
        if (!$conn) {
            die("Koneksi ke database gagal: " . mysqli_connect_error());
        }

        // Mengambil data dari database berdasarkan ID
        $query = "SELECT * FROM post WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {
            $post = mysqli_fetch_assoc($result);
        } else {
            echo "<div class='container'><div class='alert alert-danger mt-5'>Post tidak ditemukan!</div></div>";
            exit;
        }
    ?>
    <section class="py-5 mt-5" style="height: 400px;">
        <div class="container">
            <div class="card" style="width: 20rem;">
                <div class="card-header fw-semibold">
                    <?= htmlspecialchars($post['title']); ?>
                </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?= htmlspecialchars($post['description']); ?></li>
                        <li class="list-group-item text-secondary"><?= htmlspecialchars($post['date']); ?></li>
                    </ul>
                </div>
                <div class="mt-2">
                    <a href="../data.php" class="btn btn-primary btn-sm" style="width: 200px;">Kembali</a>
                </div>
            </div>
        </div>
    </section>
    <?php
    include('../layouts/footer.php');
    ?>
</body>
</html>