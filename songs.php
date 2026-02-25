<?php
include "header.php";
?>

    <section class="container" id="galeria">
      <div class="row">
        <div class="col px-0">
          <h2>Original Songs</h2>
        </div>
      </div>
      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4">

    <?php
        $sql = "SELECT title, file, video_link FROM songs";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                echo "
                    <div class='col'>
                      <div>
                        <a
                          href='$row[video_link]'
                          data-fancybox='adomin'
                          target='_blank'
                        >
                          <img src='images/addedsongs/$row[file]' alt='' class='img-fluid' />
                          <h5>$row[title]</h5>
                        </a>
                      </div>
                    </div>
                   ";
            }
        }
        ?>

        </div>
    </section>

 <?php
  include "footer.php"
?>


