<!DOCTYPE html>
<html lang="en">
<?php include './layouts/head.php' ?>
<body>
    <?php 
        include('./layouts/navbar.php'); 
        include('../config/conection.php');

        // Mengambil seluruh data dari tabel post berdsarkan id terakhir
        // $query = "SELECT * FROM post ORDER BY id DESC";
        // Mengambil seluruh data dari tabel post
        $query = "SELECT * FROM post"; 
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_error($conn));
        }

        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <section class="py-5 mt-5" style="height: 400px;">
        <div class="container">
            <div class="row g-4">
                <?php if (count($posts) > 0): ?>
                    <?php foreach ($posts as $post): ?>
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title fw-semibold"><?= htmlspecialchars($post['title']); ?></h5>
                                    <p class="card-text"><?= htmlspecialchars($post['description']); ?></p>
                                </div>
                                <div class="card-footer text-muted">
                                    Tanggal
                                    <?= htmlspecialchars($post['date']); ?>
                                     <!-- <?= htmlspecialchars(count($post)); ?> -->
                                       <!--Fungsi ketika kita ingin menampilkan seluruh data  -->
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <div class="alert alert-warning text-center">Tidak ada data yang ditemukan.</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php include('./layouts/footer.php'); ?>
</body>
</html>
