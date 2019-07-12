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

    <div class="container">
      <span class="float-right">
        <a class="btn btn-success" href="./new.php">New</a>
      </span>
      <h2 class="mb-5">Blog Posts</h2>

      <?php 
      include 'main.php';
      $blogPosts = getBlogPosts();
      if($blogPosts == 0){
        echo "
          <div> 
            <h4> There are no posts yet</h4> 
          </div> ";
      }else{
      $search = empty($_POST['searchtext']) ? -1 : $_POST['searchtext'];
      foreach ($blogPosts as $blogPart){
        if($search==-1){
          
              echo "
              <div> 
                <h4>" .$blogPart["Title"]. "</h4> 
                <p style='white-space: pre-line'>" .$blogPart["PreviewText"]. "</p> 
              </div> 
              <hr> 
              <a href='./show2.php?id=$blogPart[0]' class='btn btn-primary'>Read More</a>";
            
           
      }elseif(strpos($blogPart["Title"],$search) !==false || strpos($blogPart["PreviewText"],$search) !==false || strpos($blogPart["Author"],$search) !==false || strpos($blogPart["Body"],$search) !==false){
            echo "
          <div> 
            <h4>" .$blogPart["Title"]. "</h4> 
            <p style='white-space: pre-line'>" .$blogPart["PreviewText"]. "</p> 
          </div> 
          <hr> 
          <a href='./show2.php?id=$blogPart[0]' class='btn btn-primary'>Read More</a>";
        }
             
        }
      
        
      }
      ?>

    </div>
  </body>
</html>