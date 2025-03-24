<?php include './layouts/head.php' ?>
<body>
    <!-- Navbar -->
    <?php include './layouts/navbar.php'; ?>
    <?php
    include '../config/conection.php';
    $title = "Tambah Data";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $date = date('Y-m-d');
        $query = "INSERT INTO post (title, description, date) VALUES ('$title', '$description', '$date')";
        $query1 = mysqli_query($conn, $query);
        if ($query1) {
            echo "<script>alert('Data berhasil ditambahkan!'); window.location.href = './data.php';</script>";
        } else {  
            echo "<script>alert('Gagal menambahkan data!');</script>";
        }
    }
    ?>
    
    <div class="container d-flex mt-5 py-3 align-items-center" style="Height: 500px;">
        <div class="card" style="width: 100%;">
            <div class="card-header fs-5 fw-semibold">
                <?php echo $title ?>
            </div>
            <div class="card-body">
                <form method="POST">
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="./data.php" class="btn btn-secondary">Kembali</a>
            </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include './layouts/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>