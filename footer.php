 <footer id="footer" class="bg-dark text-white py-1">
      <div
        class="container d-flex justify-content-center justify-content-lg-center"
      >
        <div class="d-flex gap-4">

          <?php
          $sql = "SELECT site, icon, title FROM social_network";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
               echo "
                    <a href='https://$row[site]' target='_blank' class='text-white fs-4'>
                      <i class='fa-brands $row[icon]'></i>
                    </a>
                     ";
            }
          }
          ?>