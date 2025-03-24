<!DOCTYPE html>
<html lang="en">
<?php include './layouts/head.php' ?>
<body>
    <!-- Navbar -->
    <?php include './layouts/navbar.php'; ?>
    <?php
    include '../config/conection.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM post WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($result);

        if (!$data) {
            echo "<script>alert('Data tidak ditemukan!'); window.location.href = './data.php';</script>";
            exit;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $id = mysqli_real_escape_string($conn, $_POST['id']);

        $query = "UPDATE post SET title = '$title', description = '$description' WHERE id = '$id'";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Data berhasil diubah!'); window.location.href = './data.php';</script>";
        } else {
            echo "<script>alert('Gagal mengupdate data!');</script>";
        }
    }
    ?>

    <div class="container d-flex mt-5 py-3 align-items-center" style="height: 500px;">
        <div class="card" style="width: 100%;">
            <div class="card-header fs-5 fw-semibold">
                Edit Data Post
            </div>
            <div class="card-body">
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $data['title']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required><?php echo $data['description']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
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