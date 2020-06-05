<?php 
 	require_once('pages/authorization_admin.php'); 		
    require "inc.koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ROOM BOOKING SYSTEM</title>

    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="icon" href="favicon.ico">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1d092830da.js" crossorigin="anonymous"></script>
</head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-light bg-white text-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="index.php"><strong>ROOM BOOKING SYSTEM</strong></a>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboardAdmin.php?p=adminListPeminjaman">Peminjaman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboardAdmin.php?p=adminListRuangan">Ruangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboardAdmin.php?p=adminListProdi">Prodi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboardAdmin.php?p=adminListFasilitas">Fasilitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboardAdmin.php?p=adminListUser">User</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <!-- <i class="fas fa-user"></i> -->
                        <ul class="navbar-nav ml-auto nav-flex-icons">
                            <li class="nav-item">
                                <a class="nav-link">
                                <?php echo 'Welcome, <strong>'.$_SESSION["nama"].'</strong>' ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                                    <a class="dropdown-item" href='dashboardAdmin.php?p=adminProfile'><i class="fas fa-user-circle"></i> Profile </a>
                                    <hr>
                                    <a class="dropdown-item" href='dashboardAdmin.php?p=adminListAdmin'><i class="fas fa-users-cog"></i> List Admin </a>
                                    <?php
                                        if ($_SESSION["role"] == 'Admin') {
                                            echo '<a class="dropdown-item" href="dashboardAdmin.php?p=tambahAdmin"><i class="fas fa-user-plus"></i> Add Admin </a>';
                                        }
                                    ?>
                                    <hr>
                                    <a class="dropdown-item" href="dashboardAdmin.php?p=logout"><i class="fas fa-sign-out-alt"></i> Log out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    

        <main class="container-fluid bg-light pb-5">       
            <?php
                $pages_dir = 'pages';
                if(!empty($_GET['p'])){
                    $pages = scandir($pages_dir, 0);
                    unset($pages[0], $pages[1]);

                    $p = $_GET['p'];
                    if(in_array($p.'.php', $pages)){
                            include($pages_dir.'/'.$p.'.php');
                    } else {
                        echo '<div class="container">';
                        echo '<h1></br>4😕4</h1>';
                        echo '<h2>Halaman yang kamu cari ga ada!</h2>';
                        echo '</br>';
                        echo '<a href="dashboardAdmin.php">&larr; Go Home</a>';
                        echo '</div>';
                    }
                } else {
                    include($pages_dir.'/adminListPeminjaman.php');
                }
            ?>    
        </main>
        
        <footer class="container-fluid bg-white border-top">
            <div class="container footer">
                <small>&copy; Copyright 2020, Room Booking System. <a href="https://www.esqbs.ac.id"> ESQ Business School </a</small>
            </div>
        </footer>
    </body>
</html>