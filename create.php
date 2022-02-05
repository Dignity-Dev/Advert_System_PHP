<?php
include("include/header.php");
?>
<title>Create Ads - Advert System</title>
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="idex.php">Advert</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Homepage</a>
                </li>
                <li class="nav-item active">
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
            <div class="container shadow" style="margin-top: 20px; margin-bottom:20px; padding:20px; border: 1px solid gray;">
                <h3 class="text-center">Create Advert</h3>
                <form method="POST" class="form-group" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Company/Business Name</label>
                            <input type="text" class="form-control" name="company" required>
                            <label>Your fullname</label>
                            <input type="text" class="form-control" name="fullname" required>
                            <label>Phone Number</label>
                            <input type="number" class="form-control" name="phone" required>
                            <label>Whatsapp ID</label>
                            <input type="number" class="form-control" name="whatsapp" required>

                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-7">
                                    <label>product Name</label>
                                    <input type="text" class="form-control" name="item" required>
                                </div>
                                <div class="col-md-5">
                                    <label>product Image</label>
                                    <input type="file" class="form-control" name="image" required>
                                </div>
                            </div>
                            <label>product Description</label>
                            <textarea name="description" rows="3" class="form-control" required></textarea>
                            <label>product Specification</label>
                            <textarea name="spec" rows="3" class="form-control" required></textarea>
                        </div>

                    </div>
                    <div class="row" style="padding-top: 10px;">
                        <br>
                        <div class="col-md-4 offset-md-4"><input type="submit" value="Create" name="create" class="btn btn-primary col-md-10"></div>
                    </div>
                </form>
            </div>
            <?php
        if (isset($_POST["create"])) {
            $company = $_POST['company'];
            $fullname = $_POST['fullname'];
            $whatsapp = $_POST['whatsapp'];
            $phone = $_POST['phone'];
            $item = $_POST['item'];
            $description = $_POST['description'];
            $spec = $_POST['spec'];
            $date = date("d/m/Y");
            $fileInfo = PATHINFO($_FILES["image"]["name"]);
            if ($fileInfo['extension'] == "jpg" or $fileInfo['extension'] == "png" or $fileInfo['extension'] == "PNG" or $fileInfo['extension'] == "JPG" or $fileInfo['extension'] == "jpeg" or $fileInfo['extension'] == "gif" or $fileInfo['extension'] == "svg" or $fileInfo['extension'] == "bmp") {
                $newFileName = $fileInfo['filename'] . "-" . time() . "." . $fileInfo['extension'];
                move_uploaded_file($_FILES["image"]["tmp_name"], "image/" . $newFileName);
                $location = $newFileName;

                $asdf = mysqli_query($con, "INSERT INTO myadvert(company, item_name, item_spec, item_description, item_image, seller_name, seller_phone, seller_whatsapp, ads_date) VALUES ('$company', '$item', '$spec', '$description', '$location', '$fullname', '$phone', '$whatsapp', '$date')");
                echo "<script>window.alert('Sucessfully Created');</script>";
                echo "<script>window.location='index.php';</script>";
            } else {
                echo "<script>window.alert('not save!');</script>";
            }
        }
    ?>
            <!-- list -->
            <div class="container shadow" style="margin-top: 20px; margin-bottom:20px; padding:20px; border: 1px solid gray;">
            <h3 class="text-center">Advert List</h3>
            <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>S/N</th>
          <th>Image</th>
          <th>Company</th>
          <th>product Name</th>
          <th>Phone Number</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $counter = 1;
      $select = mysqli_query($con, "SELECT * FROM myadvert order by ads_date DESC");
      while ($row = mysqli_fetch_array($select)) {
      ?>
        <tr>
            <td><?php echo $counter;?></td>
            <td><img src="<?php echo 'image/' . $row['item_image']; ?>" alt="<?php echo $row['item_name']; ?>" style="width:100px; height:100px;"></td>
            <td><?php echo $row['company']; ?></td>
            <td><?php echo $row['item_name']; ?></td>
            <td><?php echo $row['seller_phone']; ?></td>
            <td>
                <a href="delete.php?id=<?php echo $row['advert_id']?>">Delete</a>
            </td>
          
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

            </div>

        </div> <!-- /container -->

    </main>

   
    <?php
    include("include/footer.php");
    ?>