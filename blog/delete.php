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
        $id = mysqli_real_escape_string($conn, $_POST['id']);

        $query = "DELETE FROM post WHERE id = '$id'";

        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Data berhasil dihapus!'); window.location.href = './data.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus data!');</script>";
        }
    }
    ?>

    <!-- <div class="container d-fl mt-5 py-3" style="height: 400px;">
        <div class="card">
            <div class="card-header">
                <h3 class="fw-bold">Hapus Data Post</h3>
            </div>
        </div>
        <div class="card-body py-2 px-2">
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <p>Apakah Anda yakin ingin menghapus data berjudul <strong><?php echo $data['title']; ?></strong>?</p>
                <button type="submit" class="btn btn-danger">Hapus</button>
                <a href="./data.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div> -->
    <div class="container d-flex mt-5 py-3 align-items-center justify-content-center" style="Height: 400px;">
        <div class="card" style="width: 600px;">
            <div class="card-header fs-5 fw-semibold">
                Hapus Data Post
            </div>
            <div class="card-body">
                <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                    <p>Apakah Anda yakin ingin menghapus data berjudul <strong><?php echo $data['title']; ?></strong>?</p>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    <a href="./data.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include './layouts/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>