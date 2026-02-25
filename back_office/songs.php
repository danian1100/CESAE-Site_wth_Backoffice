<?php
include "header.php";
?>

<section class="container">
    <div class="row">
        <div class="p-2 mb-5 shadow text-center">
        <h4 class="mb-0">BACKOFFICE - Songs Management</h4>
      </div>
    </div>
    <div class="row">
        <div class="col me-5">
            <?php
            $title = $file = $videoLink = $idSong = "";
            $action = "create";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $title = htmlspecialchars($_POST['title']);
                $file = $_FILES['file']['name'];
                $videoLink = htmlspecialchars($_POST['videolink']);
                $idSong = htmlspecialchars($_POST['id-song']);
                $action = htmlspecialchars($_POST['action']);

                
                $target_dir = BASE_IMAGES_SONGS_URL;
                $target_file = $target_dir . basename($file);
                $uploadOk = true;


                if ($file != "") {
                    $check = getimagesize($_FILES['file']['tmp_name']);
                    if ($check === false) {
                        echo "<div class='alert alert-danger'>The file is not an image.</div>";
                        $uploadOk = false;
                    }

                    if (file_exists($target_file)) {
                        echo "<div class='alert alert-danger'>The file already exists.</div>";
                        $uploadOk = false;
                    }

                    if ($_FILES['file']['size'] > 2000000) {
                        echo "<div class='alert alert-danger'>The file is too big.</div>";
                        $uploadOk = false;
                    }

                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif', 'webp'])) {
                        echo "<div class='alert alert-danger'>Only JPG, JPEG, PNG, GIF & WEBP files are allowed.</div>";
                        $uploadOk = false;
                    }

                    if ($uploadOk) {
                        if (!move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                            echo "<div class='alert alert-danger'>Error uploading the file.</div>";
                            $uploadOk = false;
                        }
                    }
                }
 

                if ($uploadOk and $action == "create") {
                    $sql = "INSERT INTO songs (title, file, video_link) VALUES ('$title', '$file', '$videoLink')";
                    $sucessText = "Social network successfully added!";
                    $errorText = "Error adding social network: ";

                } else if ($action == "edit") {
                    $sql = "UPDATE songs SET title='$title'";
                    $sql .= ($file != "") ? ", file='$file'" : "";
                    $sql .= ", video_link='$videoLink' WHERE id_song='$idSong'";
                    $sucessText = "Song successfully updated!";
                    $errorText = "Error updating song: ";

                } else if ($action == "delete") {
                    $sql = "DELETE FROM songs WHERE id_song='$idSong'";
                    $sqlSong = "SELECT file FROM songs WHERE id_song='$idSong'";
                    $resultSong = $conn->query($sqlSong);
                    if ($resultSong->num_rows > 0) {
                        $rowSong = $resultSong->fetch_assoc();
                        $file = $rowSong['file'];
                    } else {
                        echo "<div class='alert alert-danger'>Error getting the photo file.</div>";
                        exit;
                    }
                    $songPath = BASE_IMAGES_SONGS_URL . $file;
                    if (file_exists($songPath)) {
                        unlink($songPath);
                    }
                    $sucessText = "Photo successfully deleted!";
                    $errorText = "Error deleting photo: ";
                }

                if (isset($sql)) {
                    if ($conn->query($sql) === TRUE) {
                        echo "<div class='alert alert-success'>$sucessText</div>";
                        $title = $file = $videoLink = $idSong = "";
                        $action = "create";
                    } else {
                        echo "<div class='alert alert-danger'>$errorText: " . $conn->error . "</div>";
                    }
                }
            }
            ?>

             <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id-song" id="id-song" value="<?= $idSong ?>">
                <input type="hidden" name="action" id="action" value="<?= $action ?>">

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" value="<?= $title ?>" class="form-control" id="title" name="title" required>
                </div>
                 <div class="mb-3">
                    <label for="videolink" class="form-label">Video Link</label>
                    <input type="text" value="<?= $videoLink ?>" class="form-control" id="videolink" name="videolink" required>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">File</label>
                    <input type="file" value="<?= $file ?>" class="form-control" id="file" name="file" required>
                </div>
               
                <button type="submit" id="btn-submit" class="btn btn-primary mb-5 mt-3">Add Song</button>
            </form>
        </div>
        <div class="col-7">
            <ul class="list-group">
                <?php
                $sql = "SELECT * FROM songs ORDER BY id_song DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class='list-group-item d-flex' data-title='$row[title]' data-file='$row[file]' data-videolink='$row[video_link]' data-id='$row[id_song]'>";
                        echo "<img src ='" . BASE_IMAGES_URL . "addedsongs/" . $row['file'] . "' class='img-thumbnail me-2' style='width: 50px; height=50px;'>";
                        echo "<span class='me-2'>$row[title]</span>";
                        echo "<a href='https://$row[video_link]' target='_blank' title='https://$row[video_link]'>hover to see link</a>";
                        echo "<div class='ms-auto'>";
                        echo "<button class='btn btn-sm btn-warning mx-2' data-action='edit'>Edit</button>";
                        echo "<button class='btn btn-sm btn-danger' data-action='delete'>Delete</button>";
                        echo "</div>";
                        echo "</li>";
                    }
                } else {
                    echo "<li class='list-group-item'>No song registered.</li>";
                }
                ?>
            </ul>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('[data-action="edit"],[data-action="delete"]').forEach(button => {
        button.addEventListener('click', editSongs);
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