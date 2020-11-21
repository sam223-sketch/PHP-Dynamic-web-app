<!-- Model -->
<?php
  require_once('includes/db.php');
  require_once('includes/functions.php');

  // Capturing user input
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
      $title = prep_data($_POST['title']);
      $content = prep_data($_POST['content']);
      $important = prep_data($_POST['important']);

      $sql = "INSERT INTO notes (title, content, important) VALUES ('";
      $sql .= $title . "','" . $content . "','" . $important . "')";
      if(mysqli_query($dbconnection, $sql)){
        echo "Success";
      }

    }

  // Adding record to database
  // BELOW is the database and table created with sql
  //INSERT INTO tablename (columns) VALUES (values)
  //INSERT INTO notes ('title', 'content', 'important') VALUES ('$title', '$content', '$important')

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

    <div class="title">
      <div class="backlink"><a class="nav-link" href="index.php"></a></div>
      <div class="head">New Note</div>
    </div>

    <form action="new.php" method="post">

            <span class="label">Title</span>
            <input class="box" type="text" name="title" />
            <br>

            <span class="label">Content</span>
            <textarea class="box" name="content"></textarea>
            <br>

            <div class="group">
              <span class="label-in">Important</span>
              <input type="hidden" name="important" value="0"/>
              <input type="checkbox" name="important" value="1">
            </div>
        <input type="submit" name="" value="submit">

    </form>

  </body>
</html>
<?php
  require_once('includes/footer.php');
?>
