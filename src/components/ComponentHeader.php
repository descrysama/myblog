<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light p-2">
            <div class="container-fluid">
                <img src="<?php __DIR__ ?>/public/img/brand-logo.png" class="m-2" alt="">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-2">
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php __DIR__ ?>/">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?php __DIR__ ?>/posts">Posts</a>
                    </li>
                </ul>
                </div>
            </div>
            <a class="btn btn-success" href="<?php __DIR__ ?>/login">Login</a>
            <a class="btn" href="<?php __DIR__ ?>/register">Signup</a>
        </nav>
</header>