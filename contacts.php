<?php
include "header.php";
?>

    <section class="container" id="contactos">
      <div class="row">
        <div class="col px-0">
          <h2>Contacts</h2>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-md-4">
          <h5>Address</h5>
          <p>Tokyo, Japan</p>

          <h5>Phone</h5>
          <p>+351 222 333 444</p>

          <h5>Email</h5>
          <p>world@world.ww</p>
        </div>

        <div class="col-md-8">
          <div class="text-center text-white mt-2 mb-4"> 
          <h3>Wanna be an official fan?</h3>
          <h4>Fill the form below!</h4>
          </div>
         

          <?php
            include "form-handler.php";

            if ($_SERVER["REQUEST_METHOD"] == "POST" and $isFormValid) {
              $sql = "INSERT INTO fans (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
             if($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success'style='width: 70%;' role='alert'>
                            Form sent successfully!
                      </div>";
                $name = $email = $phone = $message = "";
              } else {
                echo "<div class='alert alert-danger'>Error when saving to database: " . $conn->error . "</div>";
              }
            }
            ?>

          <form id="contactForm" method="post" action="contacts.php" novalidate >
            <div class="row mb-2">
              <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $name ?>"  />
                  <div class="error-message" id="nameError"></div>
                  <div class="success-message" id="nameSuccess"></div>
              </div>

              <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                  type="email"
                  class="form-control"
                  aria-describedby="emailHelp"
                  id="email"
                  name="email"
                  value="<?= $email ?>"
                />
                <div class="error-message" id="emailError"></div>
                <div class="success-message" id="emailSuccess"></div>
              </div>

              <div class="col-md-6 mb-2">
                <label for="telefone" class="form-label">Phone</label>
                <input
                  type="tel"
                  class="form-control"
                  id="phone"
                  name="phone"
                  value="<?= $phone ?>"
                />
                 <div class="error-message" id="phoneError"></div>
                  <div class="success-message" id="phoneSuccess"></div>
              </div>
            </div>

            <div class="mb-3">
              <label for="message" class="form-label">Message</label>
              <textarea
                class="form-control"
                id="message"
                name="message"
                rows="5"
                maxlength="500"
                placeholder="Tell us what you love about Ado..."
                value="<?= $message ?>"
              ></textarea>
              <div class="error-message" id="messageError"></div>
              <div class="success-message" id="messageSuccess"></div>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
          </form>

          
            <?php
                if (!$isFormValid) {
                    echo "<div class='alert alert-danger mt-3' role='alert'>
                            The form was not sent due to errors. Please correct the following fields:
                            <ul>";

                    echo ($nameError != "") ? "<li>$nameError</li>" : "";
                    echo ($emailError != "") ? "<li>$emailError</li>" : "";
                    echo ($phoneError != "") ? "<li>$phoneError</li>" : "";
                    echo ($messageError != "") ? "<li>$messageError</li>" : "";

                    echo "</ul>
                          </div>";
                }
            
            ?>

        </div>
      </div>

      <div class="row">
        <div class="col">
          <h5 class="mb-3">Where are we:</h5>
          <div class="ratio ratio-16x9">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d831455.2695834625!2d139.10915227201525!3d35.507439521881714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x605d1b87f02e57e7%3A0x2e01618b22571b89!2zVMOzcXVpbywgSmFww6Nv!5e0!3m2!1spt-PT!2spt!4v1751022473203!5m2!1spt-PT!2spt"
              width="600"
              height="450"
              style="border: 0"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
        </div>
      </div>
    </section>

<?php
include "footer.php"
?>