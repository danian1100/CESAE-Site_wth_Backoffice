<?php
include "header.php";
?>

<section class="container">
    <div class="row">
        <div class="p-2 mb-5 shadow text-center">
        <h4 class="mb-0">BACKOFFICE - Fans Emails Management</h4>
      </div>
    </div>
    <div class="row">
        <div class="col-10 mx-auto">
            <?php
            $name = $message = $answer_m = $idFan = $email ="";
            $action = "answer";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name     = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
                $email    = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
                $idFan    = isset($_POST['id-fan']) ? htmlspecialchars($_POST['id-fan']) : '';
                $message  = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';
                $answer_m = isset($_POST['answer']) ? htmlspecialchars($_POST['answer']) : '';
                $action   = isset($_POST['action']) ? htmlspecialchars($_POST['action']) : 'answer';

                if ($action == "answer") {
                    // INSERE NA BASE DE DADOS DA TABELA ANSWER
                    $sql = "INSERT INTO answer (name, email, message, answer_m) VALUES ('$name', '$email', '$message', '$answer_m')";
                    $sucessText = "Email answered!";
                    $errorText = "Something went wrong: ";
                } else if ($action == "delete") {
                    // APAGA DA BASE DE DADOS DA TABELA FANS
                    $sql = "DELETE FROM fans WHERE id_fan='$idFan'";
                    $sucessText = "Message successfully deleted!";
                    $errorText = "Error deleting message: ";
                } else {
                    echo "<div class='alert alert-danger'>Invalid action!</div>";
                    exit;
                }

                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success'>$sucessText</div>";
                    $name = $message = $answer_m = $idFan = $email ="";
                    $action = "answer";
                } else {
                    echo "<div class='alert alert-danger'>$errorText: " . $conn->error . "</div>";
                }
            }
            ?>
            <ul class="list-group"> 
                <?php
                $sql = "SELECT * FROM fans";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class='list-group-item d-flex' data-id='$row[id_fan]' 
                        data-name='$row[name]' 
                        data-email='$row[email]' 
                        data-message='$row[message]'>";
                        echo "<span class='me-2'># $row[id_fan] -</span>";
                        echo "<span class='me-2'>hover over data to see it:</span>";
                        echo "<a href='$row[name]' title='$row[name]' class='mx-3'>name</a>";
                        echo "<a href='$row[email]' title='$row[email]' class='mx-3'>email</a>";
                        echo "<a href='$row[phone]' title='$row[phone]' class='mx-3'>phone</a>";
                        echo "<a href='$row[message]' title='$row[message]' class='mx-3'>message</a>";
                        echo "<div class='ms-auto'>";
                        echo "<button class='btn btn-sm btn-secondary mx-3' data-action='answer' onclick='editAnswer()'>Answer</button>";
                        echo "<button class='btn btn-sm btn-warning mx-3'  onclick='editRead(event)'>Read</button>";
                        echo "<button class='btn btn-sm btn-danger' data-action='delete' onclick='editDelete(event)'>Delete</button>";
                        echo "</div>";
                        echo "</li>";
                    }
                } else {
                    echo "<li class='list-group-item'>No menu tabs registered.</li>";
                }
                ?>
            </ul>
        </div>
        <div class="d-flex justify-content-center mt-5 ">

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="formwidth">
                <input type="hidden" name="id-fan" id="id-fan" value="<?= $idFan ?>">
                <input type="hidden" name="action" id="action" value="<?= $action ?>">

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" value="<?= $name ?>" class="form-control" id="name" name="name" required>
                </div>
                <div class="d-none">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" value="<?= $email ?>" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea rows="4" type="text" value="<?= $message ?>" class="form-control" id="message" name="message"required></textarea>
                </div>
                <div class="mb-3">
                    <label for="answer" class="form-label">Your Answer</label>
                    <textarea class="form-control" id="answer" name="answer" rows="4" required></textarea>
                </div>
                <button type="submit" id="btn-submit" class="btn btn-primary mb-5 mt-3">Answer</button>
            </form>

            <form id="delete-form" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="d-none">
                <input type="hidden" name="id-fan" id="delete-id-fan">
                <input type="hidden" name="action" value="delete">
            </form>
        </div>
    </div>
</section>

<?php
include "footer.php"
?>