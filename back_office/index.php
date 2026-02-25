<?php
if(session_status() == PHP_SESSION_NONE) {
  session_start();
}

$formUser = $formPassword = '';
$loginError = false; 

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $formUser = $_POST['user'];
  $formPassword = $_POST['password'];
  $formPassword = md5($formPassword);
  $isFormOk = true;

  require_once "config.php";

  $sql = "SELECT * FROM users WHERE username = '$formUser' AND password = '$formPassword'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    $_SESSION['user'] = $formUser;
    header("Location: ". BASE_ADMIN_URL);
    exit;
  } else {
    $isFormOk = false;
    $loginError = true;
  }
 }

include "header.php";
?>

    <section class="container">
      <div class="p-2 mb-5 shadow text-center">
        <h4 class="mb-0">HOMEPAGE DO BACKOFFICE</h4>
      </div>

      <?php if (isset($_SESSION['user'])){ ?>

      <div class="alert alert-success" role="alert">
        You are logged in as <?= $_SESSION['user'] ?>.
      </div>
      
      

      <div class="row">
        <div class="col mt-3 p-3 d-flex justify-content-evenly flex-wrap gap-3">
            <a href="<?= BASE_ADMIN_URL ?>socials.php" class="btn btn-primary px-4 py-2 shadow-sm" style="min-width: 130px;">Social Networks</a>
            <a href="<?= BASE_ADMIN_URL ?>menu.php" class="btn btn-primary px-4 py-2 shadow-sm" style="min-width: 130px;">Menu</a>
            <a href="<?= BASE_ADMIN_URL ?>songs.php" class="btn btn-primary px-4 py-2 shadow-sm" style="min-width: 130px;">Songs</a>
            <a href="<?= BASE_ADMIN_URL ?>fans.php" class="btn btn-primary px-4 py-2 shadow-sm" style="min-width: 130px;">Contacts</a>
            <a href="<?= BASE_ADMIN_URL ?>logout.php" class="btn btn-outline-info px-4 py-2 shadow-sm" style="min-width: 130px;">Logout</a>
        </div>
      </div>

      <?php } else { ?>

         <?php if ($loginError) { ?>
    <div class="alert alert-danger" role="alert">
      Incorrect user or password.
    </div>
  <?php } ?>
    
    <div class="row d-flex justify-content-center ">
      <div class="card shadow" style="width: 350px; min-height: 450px;">
        <h3 class="mb-3 text-center">Login</h3>
        <p class="text-center">Please enter your credentials to access the BackOffice.</p>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
          <div class="mb-3">
            <input type="text" name="user" class="form-control" placeholder="Utilizador" required>
          </div>
          <div class="mb-4">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">Log in</button>
        </form>
      </div>
    </div>

    <?php } ?>

    </section>

    <?php
include "footer.php"
?>
   
  </body>
</html>
