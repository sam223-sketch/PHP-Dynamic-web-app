<?php
  require_once('includes/db.php');

  // Retrieving database records
  $sql = "SELECT * FROM notes";
  $notes = mysqli_query($dbconnection, $sql);

?>

<!-- View -->
<html>
  <head>
    <meta charset="utf-8">
    <title>Notes App</title>
    <link rel="stylesheet" href="styles/style.css">
  </head>
  <body class="container">
    <header>
      <div><h2>Notes App</h2></div>
    </header>

    <div>
      <div>
        <a class="nav-link" href="new.php">Add a new note</a>
      </div>
      <div>
        <?php
          while ($note = mysqli_fetch_assoc($notes)) {

        ?>
        <div class="note">
          <div class="titleContainer">
              <span class="nt-title"><?php echo $note['title']; ?></span>
              <div class="nt-links">
                  <a class="nt-link" href=<?php echo 'edit.php?id=' . $note['id']; ?>>Edit</a>
                  <a class="nt-link" href=<?php echo 'delete.php?id=' . $note['id']; ?>>Delete</a>
              </div>
          </div>
              <div class="nt-content"><?php if ($note['important']) {
                echo "<span class='imp'>IMPORTANT</span>";
              }?><?php echo $note['title']; ?></div>
        </div>
      <?php }
      mysqli_free_result($notes);
      ?>
      </div>
  </body>
</html>
<?php
  require_once('includes/footer.php');
?>
