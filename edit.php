<?php
  // Updating records
  require_once('includes/db.php');
  require_once('includes/functions.php');

  if ($_SERVER['REQUEST_METHOD'] == "POST"){
      $title = prep_input($_POST['title']);
      $content = prep_input($_POST['content']);
      $important = prep_input($_POST['important']);
      $id = prep_input($_POST['id']);

      $sql = "UPDATE notes SET ";
      $sql .= "title ='" . $title . "',";
      $sql .= "content ='" . $content . "',";
      $sql .= "important ='" . $important . "',";
      $sql .= "WHERE id ='" . $id . "'";
      $sql .= "LIMIT 1";

      if (mysqli_query($dbconnection, $sql)){
        // Redirect back to home page index.php
        header("Location: index.php");
      }
  }

  if (!isset($_GET['id'])){
    header("Location: index.php");
  }
  $id = $_GET['id'];
  $sql = "SELECT * FROM notes WHERE id='" . $id . "' LIMIT 1";
  $result = mysqli_query($dbconnection, $sql);
  $note = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
?>

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

    <div class="title">
      <div class="backlink"><a class="nav-link" href="index.php"></a></div>
      <div class="head">Edit Note</div>
    </div>

    <form action="edit.php" method="post">
            <input type="hidden" name="id" value=<?php echo $note['id']; ?> />
            <span class="label">Title</span>
            <input class="box" type="text" name="title" value=<?php echo $note['title']; ?>/>
            <br>

            <span class="label">Content</span>
            <textarea class="box" name="content"><?php echo $note['content']; ?></textarea>
            <br>

            <div class="group">
              <span class="label-in">Important</span>
              <input type="hidden" name="important" value="0"/>
              <input type="checkbox" name="important" value="1" <?php if ($note['important']) {echo "checked"; } ?> />
            </div>
        <input type="submit" name="" value="submit">

    </form>

  </body>
</html>
