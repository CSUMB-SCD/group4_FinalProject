<!DOCTYPE html>
<html>
  <head>
    <title>Movie Search</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <div class="row">
      <div class="col-sm-11">
        <h1 class="title">Movie Search Results</h1>
      </div>
    <?php
        include 'inc/nav.php';
    ?>
    <p>Welcome </p>
    <table>
      <tr>
        <th>Movie Details</th>
        <th>Result</th>
      </tr>
      <tr>
        <td>Title</td>
        <td>percentage%</td>
      </tr>
    </table>
    <?php
        include 'inc/footer.php';
    ?>
  </body>
</html>