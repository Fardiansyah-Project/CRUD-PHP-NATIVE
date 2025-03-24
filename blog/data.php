<?php include './layouts/head.php' ?>
<style>
    body{
        margin: 0;
        padding: 0;
    }
</style>
<body class="justify-content-center align-items-center">
    <!-- navbar -->
    <?php
    include './layouts/navbar.php';
    ?>
    <!-- body -->
    <div class="py-5 my-3" style="height: 500px; display: flex; justify-content: center; align-items: center;">
        <div class="container">
            <h3 class="fs-5 fw-bold text-center ">Data Post</h3>
            <div class="pt-2 ms-auto" style="width: 100px;">
                <a href="./create.php" class="btn btn-outline-primary btn-sm mb-3">Tambah Data</a>
            </div>
            <div>
                <table class="table text-center">
                    <thead class="border-2" style="border-right: 0; border-left: 0;">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        include '../config/conection.php';
                        $result = mysqli_query($conn, "SELECT * FROM post");
                        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

                        for ($i = 0; $i < count($posts); $i++) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $posts[$i]['title']; ?></td>
                                <td><?= $posts[$i]['description']; ?></td>
                                <td><?= $posts[$i]['date']; ?></td>
                                <td>
                                    <a href="./post/post.php?id=<?= $posts[$i]['id']; ?>" class="btn btn-info btn-sm">Lihat</a>
                                    <a href="./edit.php?id=<?= $posts[$i]['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="./delete.php?id=<?= $posts[$i]['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        <?php endfor; ?>
                        <?php if (count($posts) == 0) : ?>
                            <tr>
                                <td colspan="5">Tidak ada data</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php
    include './layouts/footer.php';
    ?>
    <!-- footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>