<?php
include "header.php";
?>

<section class="container">
    <div class="row">
        <div class="p-2 mb-5 shadow text-center">
        <h4 class="mb-0">BACKOFFICE - Menu Management</h4>
      </div>
    </div>
    <div class="row">
        <div class="col me-4">
            <?php
            $title = $file = $idMenu = "";
            $action = "create";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $title = htmlspecialchars($_POST['title']);
                $file = htmlspecialchars($_POST['file']);
                $idMenu = htmlspecialchars($_POST['id-menu']);
                $action = htmlspecialchars($_POST['action']);

                if ($action == "create") {
                    $sql = "INSERT INTO menu (title, file) VALUES ('$title', '$file')";
                    $sucessText = "Menu tab successfully added!";
                    $errorText = "Error adding menu tab: ";
                } else if ($action == "edit") {
                    $sql = "UPDATE menu SET title='$title', file='$file' WHERE id_menu='$idMenu'";
                    $sucessText = "Menu tab successfully updated!";
                    $errorText = "Error updating menu: ";
                } else if ($action == "delete") {
                    $sql = "DELETE FROM menu WHERE id_menu='$idMenu'";
                    $sucessText = "Menu tab successfully deleted!";
                    $errorText = "Error deleting menu tab: ";
                } else {
                    echo "<div class='alert alert-danger'>Invalid action!</div>";
                    exit;
                }

                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success'>$sucessText</div>";
                    $title = $file = $idMenu = "";
                    $action = "create";
                } else {
                    echo "<div class='alert alert-danger'>$errorText: " . $conn->error . "</div>";
                }
            }
            ?>

             <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="hidden" name="id-menu" id="id-menu" value="<?= $idMenu ?>">
                <input type="hidden" name="action" id="action" value="<?= $action ?>">

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" value="<?= $title ?>" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">File</label>
                    <input type="text" value="<?= $file ?>" class="form-control" id="file" name="file" required>
                </div>
                <button type="submit" id="btn-submit" class="btn btn-primary mb-5 mt-3">Add Menu Tab</button>
            </form>
        </div>
        <div class="col">
            <ul class="list-group">
                <?php
                $sql = "SELECT * FROM menu";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class='list-group-item d-flex' data-title='$row[title]' data-file='$row[file]' data-id='$row[id_menu]'>";
                        echo "<span class='me-2'>$row[title] -</span>";
                        echo "<a href='$row[file]' target='_blank'>$row[file]</a>";
                        echo "<div class='ms-auto'>";
                        echo "<button class='btn btn-sm btn-warning mx-2' data-action='edit'>Edit</button>";
                        echo "<button class='btn btn-sm btn-danger' data-action='delete'>Delete</button>";
                        echo "</div>";
                        echo "</li>";
                    }
                } else {
                    echo "<li class='list-group-item'>No menu tabs registered.</li>";
                }
                ?>
            </ul>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('[data-action="edit"],[data-action="delete"]').forEach(button => {
        button.addEventListener('click', editMenu);
    });

    document.querySelector("form").addEventListener("submit", function(event) {
        event.preventDefault();
        if (action.value == "delete") {
            if (!confirm("Are you sure you want to delete this menu tab?")) {
                return;
            }
        } else if (action.value == "edit") {
            if (!confirm("Are you sure you want to edit this menu tab?")) {
                return;
            }
        }
        this.submit();
    });

});
</script>

<?php
include "footer.php"
?>