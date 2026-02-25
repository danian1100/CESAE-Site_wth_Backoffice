<?php
if(session_status() == PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['user']) and basename($_SERVER['PHP_SELF']) != 'index.php') {
  header("Location: index.php");
  exit;
} 

require_once "config.php"; 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <?php
    if (strpos($_SERVER['PHP_SELF'], BASE_ADMIN_URL . 'index.php') !== false or !isset($page_title)) {
        $seo_title = $site_title;
    } else {
        $seo_title = $page_title . " - " . $site_title;
    }
    ?>
    <title><?php echo $seo_title; ?></title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
      crossorigin="anonymous"
    ></script>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script src="<?= BASE_ADMIN_URL ?>script.js" defer></script>
    <link rel="stylesheet" href="<?= BASE_URL ?>styles.css" />
  </head>
  <body>
    <header class="custom-header position-relative">
      <a href="<?= BASE_ADMIN_URL ?>">
        <img id="logo" src="<?= BASE_IMAGES_URL ?>logo.webp" alt="Logo" class="logo-overlay" />
      </a>
      <div
        class="banner-content d-flex align-items-center justify-content-center"
      >
        <a
          class="nav-link"
          href="https://www.youtube.com/watch?v=2tHHG7N1u10&ab_channel=UnGatoSinTacto"
          target="_blank"
          ><h4 class="mb-0 text-white"></h4>
        </a>
      </div>
    </header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-colour">
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-3">
            <li class="nav-item mx-4">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
             <li class="nav-item mx-4">
              <a class="nav-link" href="socials.php">Social Network</a>
            </li>
            <li class="nav-item mx-4">
              <a class="nav-link" href="menu.php">Menu</a>
            </li>
            <li class="nav-item mx-4">
              <a class="nav-link" href="songs.php">Songs</a>
            </li>
             <li class="nav-item mx-4">
              <a class="nav-link" href="fans.php">Contacts</a>
            </li>
            </li>
             <li class="nav-item mx-4">
              <a class="nav-link" href="<?= BASE_URL ?>">Oficial Site</a>
            </li>
            </li>
             <li class="nav-item mx-4">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>