<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://unpkg.com/popper.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
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
          $id = $_GET['id'];
          $blogPart = getBlogPost($id);
        
        ?>
  
  <div class="container">
    <h2>Edit Blog Post</h2>
    <form action="updateBlogPost.php" method="get">
      <input hidden name="id" value="<?php echo $id; ?>"/>
      <div class="form-group">
        <label for="title">Title</label>
        <input class="form-control" name="title" id="title" placeholder="Title"  value="<?php echo $blogPart[0]["Title"]; ?>" />
      </div>
      <div class="form-group">
        <label for="author">Author</label>
        <select class="form-control" name="author" id="author">
          <option selected hidden><?php echo $blogPart[0]["Author"]; ?></option>
          <option>John Doe</option>
          <option>Joshua Mcdonald</option>
          <option>Sasha May</option>
          <option>Emilee Harris</option>
        </select>
      </div>
      <div class="form-group">
        <label for="preview_text">Preview Text</label>
        <textarea style="white-space: pre-line" class="form-control" name="preview_text" id="preview_text" rows="3" placeholder="Preview Text"><?php echo $blogPart[0]["PreviewText"]; ?></textarea>
      </div>
      <div class="form-group">
        <label for="body">Body</label>
        <textarea style="white-space: pre-line" class="form-control" name="body" id="body" rows="10" placeholder="Body"><?php echo $blogPart[0]["Body"]; ?></textarea>
      </div>
      <input type="submit" class="btn btn-primary" value="Save"/>
    </form>
  </div>
</body>

</html>