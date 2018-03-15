<!doctype html>
<html class="no-js" lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>PHP Web Example</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <?php
    require 'function.php';
    /**
     * Session security should be properly configured, such as:
     * @ref: https://paragonie.com/blog/2015/04/fast-track-safe-and-secure-php-sessions
     *
     * session.save_handler = files
     * session.use_cookies = 1
     * session.cookie_secure = 1
     * session.use_only_cookies = 1
     * session.cookie_domain = "example.com"
     * session.cookie_httponly = 1
     * session.entropy_length = 32
     * session.entropy_file = /dev/urandom
     * session.hash_function = sha256
     * session.hash_bits_per_character = 5
     */
    session_start();

    check_canary();
    ?>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="#">Top navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <?php if(is_logged_in()): ?>
                    <a class="nav-link" href="logout.php">Logout</a>
                <?php else: ?>
                    <a class="nav-link" href="login.php">Login</a>
                <?php endif; ?>
            </li>
	        <?php if(is_logged_in()): ?>
            <li class="nav-item">
                <a class="nav-link disabled">Hello <?php get_user(); ?></a>
            </li>
	        <?php endif; ?>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>



<main role="main" class="container">
<!-- Add your site or application content here -->
<p>Hello world! This is HTML5 Boilerplate.</p>
</main>


<script src="js/bootstrap.js"></script>
</body>
</html>