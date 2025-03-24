<?php include './layouts/head.php' ?>

<body>
    <?php
    include './layouts/navbar.php';
    ?>
    <?php
    include '../config/conection.php'
    ?>
    <?php
    $title = "Total Seluruh Data";
    $description = "Jumlah keseluruhan sebanyak";
    $date = date('d-m-Y');
    $result = "SELECT * FROM post";
    $query  = mysqli_query($conn, $result);
    $counts = mysqli_fetch_all($query, MYSQLI_ASSOC);
    ?>
    <div class="mt-4 py-5" style="height: 400px">
        <div class="container">
            <h2 class="mb-3">Dashboard</h2>
            <div class="row g-4">
                <?php if (count($counts) > 0): ?>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold"><?= htmlspecialchars($title); ?></h5>
                                <p class="card-text"><?= htmlspecialchars($description); ?> <?= htmlspecialchars(count($counts)); ?> data</p>
                            </div>
                            <div class="card-footer text-muted">
                                <!-- Tanggal <?= htmlspecialchars($date); ?> -->
                                <a href="data.php" class="btn btn-secondary btn-sm">Info lebih lanjut >></a>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-12">
                        <div class="alert alert-warning text-center">Tidak ada data yang ditemukan.</div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="container d-flex justify-content-center align-item-end">
            <img src="./img/11145.jpg" alt="" width="640px" height="400px">
        </div>
    </div>
</body>

</html>