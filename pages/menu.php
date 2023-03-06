<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?page=1">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=2">VinylRecords</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=3">Artists</a>
                </li>
                <?php
                if(!isset($_COOKIE["logged_in"])){
                    echo '<li class="nav-item">
                            <a class="nav-link" href="index.php?page=5">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=4">Registration</a>
                        </li>';
                }else{
                    echo '<li class="nav-item">
                            <a class="nav-link" href="index.php?page=6">Logout</a>
                        </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>