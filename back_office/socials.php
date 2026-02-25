<?php
include "header.php";
?>

<section class="container">
    <div class="row">
        <div class="p-2 mb-5 shadow text-center">
        <h4 class="mb-0">BACKOFFICE - Social Management</h4>
      </div>
    </div>
    <div class="row">
        <div class="col me-4">
            <?php
            $title = $icon = $site = $idNet = "";
            $action = "create";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $title = htmlspecialchars($_POST['title']);
                $icon = htmlspecialchars($_POST['icon']);
                $site = htmlspecialchars($_POST['site']);
                $idNet = htmlspecialchars($_POST['id-network']);
                $action = htmlspecialchars($_POST['action']);

                if ($action == "create") {
                    $sql = "INSERT INTO social_network (site, icon, title) VALUES ('$site', '$icon', '$title')";
                    $sucessText = "Social network successfully added!";
                    $errorText = "Error adding social network: ";

                } else if ($action == "edit") {
                    $sql = "UPDATE social_network SET title='$title', icon='$icon', site='$site' WHERE id_social='$idNet'";
                    $sucessText = "Social network successfully updated!";
                    $errorText = "Error updating social network: ";

                } else if ($action == "delete") {
                    $sql = "DELETE FROM social_network WHERE id_social='$idNet'";
                    $sucessText = "Social network successfully deleted!";
                    $errorText = "Error deleting social network: ";
                    
                } else {
                    echo "<div class='alert alert-danger'>Invalid action!</div>";
                    exit;
                }

                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success'>$sucessText</div>";
                    $title = $icon = $site = $idNet = "";
                    $action = "create";
                } else {
                    echo "<div class='alert alert-danger'>$errorText: " . $conn->error . "</div>";
                }
            }
            ?>

             <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="hidden" name="id-network" id="id-network" value="<?= $idNet ?>">
                <input type="hidden" name="action" id="action" value="<?= $action ?>">

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" value="<?= $title ?>" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="icon" class="form-label">Icon (Font Awesome class)</label>
                    <input type="text" value="<?= $icon ?>" class="form-control" id="icon" name="icon" required>
                </div>
                <div class="mb-3">
                    <label for="site" class="form-label">Site</label>
                    <input type="text" value="<?= $site ?>" class="form-control" id="site" name="site" required>
                </div>
                <button type="submit" id="btn-submit" class="btn btn-primary mb-5 mt-3">Add Social Network</button>
            </form>
        </div>
        <div class="col">
            <ul class="list-group">
                <?php
                $sql = "SELECT * FROM social_network";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class='list-group-item d-flex' data-title='$row[title]' data-icon='$row[icon]' data-site='$row[site]' data-id='$row[id_social]'>";
                        echo "<i class='fa-brands $row[icon] mx-3'></i> ";
                        echo "<span class='me-2'>$row[title] -</span>";
                        echo "<a href='https://$row[site]' target='_blank'>$row[site]</a>";
                        echo "<div class='ms-auto'>";
                        echo "<button class='btn btn-sm btn-warning mx-2' data-action='edit'>Edit</button>";
                        echo "<button class='btn btn-sm btn-danger' data-action='delete'>Delete</button>";
                        echo "</div>";
                        echo "</li>";
                    }
                } else {
                    echo "<li class='list-group-item'>No social networks registered.</li>";
                }
                ?>
            </ul>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('[data-action="edit"],[data-action="delete"]').forEach(button => {
        button.addEventListener('click', editNetwork);
    });

    document.querySelector("form").addEventListener("submit", function(event) {
        event.preventDefault();
        if (action.value == "delete") {
            if (!confirm("Are you sure you want to delete this social network?")) {
                return;
            }
        } else if (action.value == "edit") {
            if (!confirm("Are you sure you want to edit this social network?")) {
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