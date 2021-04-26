<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TravelLog</title>
  <link rel="icon" type="image/png" href="../Images/alps_favicon.png">
  <meta name="description" content="Connect with people over travelling">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- custom css -->
  <link rel="stylesheet" href="../CSS/homepage.css">
  <script src="../JS/scroll-homepage.js" defer></script>
  <!-- google fonts and fontawesome -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>

<body>
  <!-- navbar/header -->
  <?php
  require_once "functions.php";
  include "header.php";
  dbConnect();
  ?>

  <!-- map for usemap of Logo-Img -->
  <map name="home">
    <area shape="default" coords="21,21,21" href="../index.php" alt="Home Page">
  </map>

  <!-- main -->
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <!-- profile brief -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>swaranjana</h4>
            <p>I love to code!</p>
          </div>
        </div>
        <!-- ./profile brief -->

        <!-- friend requests -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>friend requests</h4>
            <ul>
              <li>
                <a href="#">johndoe</a>
                <a class="text-success" href="#">[accept]</a>
                <a class="text-danger" href="#">[decline]</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- ./friend requests -->
      </div>
      <div class="col-md-6">
        <!-- post form -->
        <form method="post" action="">
          <div class="input-group">
            <input class="form-control" type="text" name="content" placeholder="Make a post...">
            <span class="input-group-btn">
              <button class="btn btn-success" type="submit" name="post">Post</button>
            </span>
          </div>
        </form>
        <hr>
        <!-- ./post form -->

        <!-- feed -->
        <div>
          <!-- post -->
          <?php
          $sql = "SELECT * FROM posts";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($post = $result->fetch_assoc()) {
          ?>
              <!-- One Post -->
              <div id="main-window">
                <div class="post">
                  <div class="user">
                    <div class="user-stuff">
                      <div class="user-img"></div>
                      <div class="user-info">
                        <div class="user-name">Louis Dickinson</div>
                        <span class="post-date"><?php echo $post['created_at']; ?></span>
                      </div>
                    </div>
                    <div class="actions">
                      <span class="heart"></span>
                      <span class="comment"></span>
                      <span class="share"></span>
                    </div>
                  </div>
                  <div class="content">
                    <?php 
                    echo '<img src="data:image/jpeg;base64,'.base64_encode( $post['content_img'] ).'"/>';
                    echo $post['content']; 
                    ?>
                  </div>
                </div>
              </div>
            <?php
                }
              } else {
            ?>
                <p class="text-center">No posts yet!</p>
            <?php
              }
            $conn->close();
            ?>
          <!-- ./post -->
        </div>
        <!-- ./feed -->
      </div>
      <div class="col-md-3">
        <!-- add friend -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>add friend</h4>
            <ul>
              <li>
                <a href="#">alberte</a>
                <a href="#">[add]</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- ./add friend -->

        <!-- friends -->
        <div class="panel panel-default">
          <div class="panel-body">
            <h4>friends</h4>
            <ul>
              <li>
                <a href="#">peterpan</a>
                <a class="text-danger" href="#">[unfriend]</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- ./friends -->
      </div>
    </div>
  </div>
  <!-- ./main -->

  <?php
  include "footer.php";
  ?>


</body>

</html>