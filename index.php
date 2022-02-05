<?php
include("include/header.php");
?>
<title>Advert System</title>
</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Advert</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Homepage</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="create.php">Create Ads</a>
        </li>
    </div>
  </nav>

  <main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">Welcome to Advert!</h1>
        <p>Design and Implementation of an Online Adertisement System. Developed by Ibrahim Surajat.</p>
        <p><a class="btn btn-primary btn-lg" href="create.php" role="button">Create Advert Now &raquo;</a></p>
      </div>
    </div>

    <div class="container-fluid">
      <!-- Example row of columns -->
      <?php
      $select = mysqli_query($con, "SELECT * FROM myadvert order by ads_date DESC");
      while ($row = mysqli_fetch_array($select)) {
      ?>
        <div class="container shadow" style="margin-bottom: 20px; padding:10px;">
          <div class="row">
            <div class="col-md-4">
              <img src="<?php echo 'image/' . $row['item_image']; ?>" alt="<?php echo $row['item_name']; ?>" style="width:300px; height:300px;">
            </div>
            <div class="col-md-8">

              <div class="row">
                <div class="col-md-6">
                  <h2><?php echo $row['item_name']; ?></h2>
                  <p>by: <b><?php echo $row['company']; ?></b></p>
                </div>
                <div class="col-md-6">
                <a href="tel:<?php echo $row['seller_phone']; ?>">
                  <button class="btn btn-primary"><i class="fas fa-phone-alt"></i> Call me now</button>
                </a>
                &nbsp;
                <a href="http://wa.me/<?php echo $row['seller_phone']; ?>">
                  <button class="btn btn-success"><i class="fab fa-whatsapp"></i> chat me up</button>
                </a>
                  <p>Ads created on: <?php echo date('d l M, Y', strtotime($row['ads_date'])); ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <h3>Product Description</h3>
                  <div class="text-justify"><?php echo $row['item_description']; ?></div>
                </div>
                <div class="col-md-6">
                  <h3>Product Specification</h3>
                  <div><?php echo $row['item_spec']; ?></div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <hr>
      <?php } ?>


    </div> <!-- /container -->

  </main>
  <?php
  include("include/footer.php");
  ?>