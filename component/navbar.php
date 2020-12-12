<?php
require_once '../config/database.php';
require_once '../config/config.php';
spl_autoload_register(function ($class_name) {
    require '../app/models/' . $class_name . '.php';
});

class Navbar
{
    public static function createNavbar()
    {
        return '<nav class="navbar navbar-expand-sm navbar-light bg-white">
            <a class="navbar-brand" href="#"><img src="/' . BASE_URL . '/public/img/logo/codelearn-logo.png" alt=""></a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="/' . BASE_URL . '/home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <form action="/'.BASE_URL.'/index.php" method="post">
                                <input type="submit" value="Sign up" name="login">
                            </form>
                            
                            <a class="dropdown-item" href="/'.BASE_URL.'/index.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>';
    }
   // <a class="dropdown-item" href="/'.BASE_URL.'/index.php">Sign up</a>
}
