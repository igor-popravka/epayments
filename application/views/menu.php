<?php /** @var Model_User $user */?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <ul class="navbar-nav ml-5">
            <?php if(empty($user)): ?>
                <li class="nav-item active">
                    <a class="nav-link" href="/<?php echo Route::get('default')->uri(['controller'=> 'auth', 'action'=>'login']); ?>">Login</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/<?php echo Route::get('default')->uri(['controller'=> 'auth', 'action'=>'register']); ?>">Sign in</a>
                </li>
            <?php else: ?>
                <li class="nav-item active">
                    <span class="nav-link"><?php echo $user->get('username');  ?></span>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/<?php echo Route::get('default')->uri(['controller'=> 'auth', 'action'=>'logout']); ?>">Logout</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
