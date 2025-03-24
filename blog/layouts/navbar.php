<nav class="navbar navbar-expand-lg bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand text-light" href="#">My Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php
            // Mengecek apakah URL mengandung parameter 'id'
            $isSinglePost = isset($_GET['id']) && !empty($_GET['id']);

            // Hanya tampilkan navbar jika tidak ada parameter 'id'
            if (!$isSinglePost):
            ?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="post.php">Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="data.php">Data</a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>

<!-- <nav class="navbar navbar-expand-lg  bg-primary  fixed-top">
        <div class="container">
            <a class="navbar-brand text-light" href="#">My Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="post.php">Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="data.php">Data</a>
                    </li>
                    <?php
                    $current_url = basename($_SERVER['REQUEST_URI']);
                    ?>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?php echo ($current_url == 'post.php') ? 'post.php' : './post/post.php'; ?>">Post</a>
                     </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?php echo ($current_url == 'data.php') ? 'data.php' : '../data.php'; ?>">Data</a>
                    </li>
                    <?php if (basename($_SERVER['REQUEST_URI']) != './post/post.php?id=[$id]') : ?>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="post.php">Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="data.php">Data</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav> -->