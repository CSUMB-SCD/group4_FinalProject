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
        <h1 class="title">Home</h1>
      </div>
      <div class="col-sm-1">
        <button type="button" class="btn btn-default">Logout</button>
      </div>
    </div>
    <?php
        include 'inc/nav.php';
    ?>
    <p>Welcome </p>
    <form action="/Group4_Test/movieSearchResult.php">Movie Title: 
      <input type="text" name="movieTitle"/><br/>Date: 
      <input type="date" name="movieDate"/><br/>Producers Name: 
      <input type="text" name="producersName"/><br/>actor/actress: 
      <input type="text" name="actorActress"/><br/>
      <input type="submit" value="Submit"/>
    </form>
    <?php
        include 'inc/footer.php';
    ?>
  </body>
</html>