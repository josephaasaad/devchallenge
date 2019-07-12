<html>
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://unpkg.com/popper.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="./myhome.php">Blog Example</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item"><a class="nav-link" href="./myhome.php">Home</a></li>
        </ul>
        <form action="myhome.php" method="post" class="form-inline my-2 my-lg-0">
          <input  name="searchtext" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button name="searchbar" class="btn btn-outline-success my-2 my-sm-0" type="submit" >Search</button>
        </form>
      </div>
    </nav>

    <?php
          include 'main.php';
          $link = empty($_GET['link']) ? -1 : $_GET['link'];
          $id = empty($_GET['id']) ? -1 : $_GET['id']-1;
          
          if ($id<0){
            $id = checkSharedLinks($link);
          }
          
          $blogPart = getBlogPost($id);
          $uniqid = uniqid();
          ?>

    <div class="container">
      <div class="content">
        <span class="float-right">
          <a class="btn btn-primary" href="./edit.php?id=<?php echo $id; ?>">Edit</a>
          <a class="btn btn-danger" href="#">Delete</a>
        </span>

       
          <?php
          echo "<h2>" .$blogPart[0]["Title"]. "</h2>
          <p>by <b>".$blogPart[0]["Author"]."</b></p> <hr>
          <p style='white-space: pre-line' >".$blogPart[0]["Body"]."</p>";
          ?>
        <form action="./show.php?id=<?php echo $id+1;?>" method="post">
        <button type=subtmit name="sharebutton" class="btn btn-dark float-right" data-toggle="modal" data-target="#shareModal">Share</button><span class="clearfix"></span>
        <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="shareModalLabel">Share this blog post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="input-group mb-3">
                  <input id="copytext" class="form-control" readonly value="<?php echo 'http://localhost/testing/show.php?link='.$uniqid;  ?>" />
                  <div class="input-group-append">
                    <a id="copying" class="btn btn-success float-right" value="copying">copy</a>
                  </div>
                  <script>
                    $('#copying').click(function(){
                      var copyText = document.getElementById("copytext");
                      copyText.select();
                      document.execCommand("copy");
                    });
                    </script>
                </div>
                </form>
                <?php 
                    $getsharedlink = empty($_POST['sharebutton']) ? -1 : $_POST['sharebutton']; 
                    if ($getsharedlink>0){
                    updateSharedLinks($id+1,$uniqid);
                    }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>