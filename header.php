<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <?php
    if (strpos($_SERVER['PHP_SELF'], '/htdocs/siteado/index.php') !== false or !isset($page_title)) {
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
    <script src="form-handling.js" defer></script>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <header class="custom-header position-relative">
      <a href="index.php">
        <img id="logo" src="images/logo.webp" alt="Logo" class="logo-overlay" />
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

          <?php

              $current_page = basename($_SERVER['PHP_SELF']);

              $sql = "SELECT title, file FROM menu";
              $result = $conn->query($sql);

              
              while ($row = $result->fetch_assoc()) {
                $active = ($current_page === $row['file']) ? "active" : "";
                echo "
                <li class='nav-item mx-4'>
                  <a class='nav-link $active' aria-current='page' href='$row[file]'>$row[title]</a>
                </li>
                ";
              }
              
              ?>
              
          </ul>
        </div>
      </div>
    </nav>