<?php
include 'php_actions/dbconnect.php';
session_start();

   if(!isset($_SESSION['login_user'])){
    header("location:login.php");
    die();
 }
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"SELECT f_name FROM user WHERE user_id = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['f_name'];
   
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Tour GuideS</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/extra.css">
    <link rel="stylesheet" href="extra_added_file/style.css">



</head>
<style>
    .map-container {
        height: 200px;
        position: relative;
    }
    
    .map-container iframe {
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        position: absolute;
    }
</style>

<body>
    <!-- Start your project here-->


    <header>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark black scrolling-navbar">
    <a class="navbar-brand" href="#"><strong>TRAVEL GUIDE</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="home.php">HOME <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown multi-level-dropdown">
                <a href="#" id="menu" data-toggle="dropdown" class="nav-link dropdown-toggle">PLACES</a>
                <ul class="dropdown-menu mt-2 rounded-0  blue-gradient lighten-4 border-0 z-depth-1">
                    <li class="dropdown-item dropdown-submenu p-0">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle text-black w-100 "><b>Barishal</b> </a>
                        <ul class="dropdown-menu ml-2 rounded-0 blue-gradient border-0 z-depth-1">
                            <li class="dropdown-item p-0">
                                <a href="#" class="text-black w-100"><b>Bhola</b></a>
                            </li>
                            <li class="dropdown-item p-0">
                                <a href="#" class="text-black w-100"><b>Potuakhali</b></a>
                            </li>
                            <li class="dropdown-item p-0">
                                <a href="#" class="text-black w-100"><b>Borguna</b></a>
                            </li>
                            <li class="dropdown-item p-0">
                                <a href="#" class="text-black w-100"><b>Pirojpur</b></a>
                            </li>
                            <li class="dropdown-item p-0">
                                <a href="#" class="text-black w-100"><b>Jhalokathi</b></a>
                            </li>

                        </ul>
                    </li>
                    <li class="dropdown-item dropdown-submenu p-0">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle text-black w-100"><b>Chottogram</b> </a>
                        <ul class="dropdown-menu mr-2 rounded-0 blue-gradient  border-0 z-depth-1 r-100 l-auto">
                            <li class="dropdown-item p-0">
                                <a href="#" class="text-black w-100"><b>Noakhali</b></a>
                            </li>
                            <li class="dropdown-item p-0">
                                <a href="#" class="text-black w-100"><b>Cumilla</b></a>
                            </li>
                            <li class="dropdown-item p-0">
                                <a href="#" class="text-black w-100"><b>Cox's Bazar</b></a>
                            </li>
                            <li class="dropdown-item p-0">
                                <a href="#" class="text-black w-100"><b>Feni</b></a>
                            </li>
                            <li class="dropdown-item p-0">
                                <a href="#" class="text-black w-100"><b>Bandarban</b></a>
                            </li>
                            <li class="dropdown-item p-0">
                                <a href="#" class="text-black w-100"><b>Khagrachari</b></a>
                            <li class="dropdown-item p-0">
                                <a href="#" class="text-black w-100"><b>Chadpur</b></a>
                            </li>
                            <li class="dropdown-item p-0">
                                <a href="#" class="text-black w-100"><b>Lokkhipur</b></a>
                            </li>

                        </ul>
                    </li>

                    <li class="dropdown-item dropdown-submenu p-0">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle text-black w-100"><b>Khulna</b> </a>
                        <ul class="dropdown-menu mr-2 rounded-0 blue-gradient  border-0 z-depth-1 r-100 l-auto">
                            <li class="dropdown-item p-0">
                                <a href="#" class="text-black w-100"><b>Jessore</b></a>
                            </li>
                            <li class="dropdown-item p-0">
                                <a href="#" class="text-black w-100"><b>Jhinaidhah</b></a>
                            </li>
                            <li class="dropdown-item p-0">
                                <a href="#" class="text-black w-100"><b>Chuadanga</b></a>
                            </li>
                            <li class="dropdown-item p-0">
                                <a href="#" class="text-black w-100"><b>Meherpur</b></a>
                            </li>
                            <li class="dropdown-item p-0">
                                <a href="#" class="text-black w-100"><b>Pabna</b></a>
                            </li>
                            <li class="dropdown-item p-0">
                                <a href="#" class="text-black w-100"><b>Kushtia</b></a>
                            <li class="dropdown-item p-0">
                                <a href="#" class="text-black w-100"><b>Mongla</b></a>
                            </li>
                            <li class="dropdown-item p-0">
                                <a href="#" class="text-black w-100"><b>Narail</b></a>
                            </li>

                    </li>
                </ul>
            </li>
            <li class="dropdown-item dropdown-submenu p-0">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle text-black w-100"><b>Dhaka</b> </a>
                <ul class="dropdown-menu mr-2 rounded-0 blue-gradient  border-0 z-depth-1 r-100 l-auto">
                    <li class="dropdown-item p-0">
                        <a href="#" class="text-black w-100"><b>Narshingdi</b></a>
                    </li>
                    <li class="dropdown-item p-0">
                        <a href="#" class="text-black w-100"><b>Narayanganj</b></a>
                    </li>
                    <li class="dropdown-item p-0">
                        <a href="#" class="text-black w-100"><b>Tangail</b></a>
                    </li>
                    <li class="dropdown-item p-0">
                        <a href="#" class="text-black w-100"><b>Shonargaon</b></a>
                    </li>

                </ul>
            </li>

            <li class="dropdown-item dropdown-submenu p-0">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle text-black w-100"><b>Rangpur</b> </a>
                <ul class="dropdown-menu mr-2 rounded-0 blue-gradient  border-0 z-depth-1 r-100 l-auto">
                    <li class="dropdown-item p-0">
                        <a href="#" class="text-black w-100"><b>Dinajpur</b></a>
                    </li>
                    <li class="dropdown-item p-0">
                        <a href="#" class="text-black w-100"><b>Jaipurhat</b></a>
                    </li>
                    <li class="dropdown-item p-0">
                        <a href="#" class="text-black w-100"><b>Gaibandha</b></a>
                    </li>
                    <li class="dropdown-item p-0">
                        <a href="#" class="text-black w-100"><b>Nilphamari</b></a>
                    </li>
                    <li class="dropdown-item p-0">
                        <a href="#" class="text-black w-100"><b>Phulbari</b></a>
                    </li>
                    <li class="dropdown-item p-0">
                        <a href="#" class="text-black w-100"><b>Thakurgaon</b></a>
                    </li>
                </ul>
            </li>

            <li class="dropdown-item dropdown-submenu p-0">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle text-black w-100"><b>Rajshahi</b> </a>
                <ul class="dropdown-menu mr-2 rounded-0 blue-gradient  border-0 z-depth-1 r-100 l-auto">
                    <li class="dropdown-item p-0">
                        <a href="#" class="text-black w-100"><b>Bogura</b></a>
                    </li>
                    <li class="dropdown-item p-0">
                        <a href="#" class="text-black w-100"><b>Natore</b></a>
                    </li>
                    <li class="dropdown-item p-0">
                        <a href="#" class="text-black w-100"><b>Sirajganj</b></a>
                    </li>
                    <li class="dropdown-item p-0">
                        <a href="#" class="text-black w-100"><b>Chapainabanganj</b></a>
                    </li>

                </ul>
            </li>
            <li class="dropdown-item dropdown-submenu p-0">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle text-black w-100"><b>Sylhet</b> </a>
                <ul class="dropdown-menu mr-2 rounded-0 blue-gradient  border-0 z-depth-1 r-100 l-auto">
                    <li class="dropdown-item p-0">
                        <a href="#" class="text-black w-100"><b>Sunamganj</b></a>
                    </li>
                    <li class="dropdown-item p-0">
                        <a href="#" class="text-black w-100"><b>Habiganj</b></a>
                    </li>
                    <li class="dropdown-item p-0">
                        <a href="#" class="text-black w-100"><b>Maulvibazar</b></a>
                    </li>


                </ul>
            </li>
            <li class="dropdown-item dropdown-submenu p-0">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle text-black w-100"><b>Mymanshing</b> </a>
                <ul class="dropdown-menu mr-2 rounded-0 blue-gradient  border-0 z-depth-1 r-100 l-auto">
                    <li class="dropdown-item p-0">
                        <a href="#" class="text-black w-100"><b>Jamalpur</b></a>
                    </li>
                    <li class="dropdown-item p-0">
                        <a href="#" class="text-black w-100"><b>Sherpur</b></a>
                    </li>
                    <li class="dropdown-item p-0">
                        <a href="#" class="text-black w-100"><b>Netrokona</b></a>
                    </li>

                </ul>
            </li>

        </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TIPS & TRICKS</a>
            <div class="dropdown-menu blue-gradient" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#"><b>TOUR TIPS</b></a>
                <a class="dropdown-item" href="#"><b>Useful Tricks</b></a>
                <a class="dropdown-item" href="#"><b>More Informations</b></a>
            </div>
        </li>


        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blogs</a>
            <div class="dropdown-menu blue-gradient" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="blog.php"><b>All Blogs</b></a>
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#modalContactForm"><b>Add New Blog</b></a>

            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="gallery.php">GALLERY</a>
        </li>
        </ul>
        <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
                <div class="container">


                    <input class="form-control" onkeyup="showResult(this.value)" type="text" placeholder="Type something to search list items">
                    <ul class="stack-top" id="search"></ul>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="userprofile.php?id=<?php echo $user_check; ?>">Hello <?php echo $login_session; ?></a>
            </li>

            <li class="nav-item">

                        <a class="btn blue-gradient btn-sm" href="userprofile.php?id=<?php echo $user_check; ?>">Your Profile</a>
                    </li>
            <li class="nav-item">

            <a class="btn purple-gradient btn-sm" href="php_actions/logout.php">Logout</a>
                    </li>

        </ul>
    </div>
</nav>

</header>
<!--Main Navigation-->


    <!--------------------------------------------JAA KORAR EKHAN THEKE KORTE HOBEEEE-------------------------------------->


    <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Write a Blog</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="php_actions/add_blog.php" enctype="multipart/form-data">
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <input type="hidden" name="uid" value="<?php echo $user_check; ?>">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control validate">

                        </div>


                        <div class="md-form">
                            <label for="">Description</label>
                            <textarea type="text" name="desc" class="md-textarea form-control" rows="4"></textarea>

                        </div>

                        <div class="md-form">

                            <input type="file" name="image" class="form-control">

                        </div>

                        <div id="success"></div>


                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-unique" type="submit" name="blogsubmit">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <h1>test</h1>


    <div class="container mt-5">


    <?php 
          $blogid=$_GET['blogid'] ;
           $blog=mysqli_query($db,"SELECT * FROM blog  WHERE blog_id = $blogid ");
           $get = mysqli_fetch_assoc($blog);

           $title = $get['title'];
           $desc = $get['description'];
           $img = $get['image'];
           $uid = $get['user_id'];
           $time = $get['up_time'];
 
           ?>


<section>
<?php 
        $name=mysqli_query($db,"SELECT * FROM user  WHERE user_id=$uid ");
        $get = mysqli_fetch_assoc($name);
        $image = $get['image'];
        if ($uid == $_SESSION['login_user']){
        $name = "You";
        }
        else {

        $name = $get['f_name'];
        

        }
?>

    <div class="card card-list">
    <div class="card-header dark d-flex justify-content-between align-items-center py-3" style="background-color: rgb(35 35 35)">
        <div class="d-flex justify-content-start align-items-center">
        <?php 
$filename ="profilephoto/$image"; 
if (file_exists($filename)) {
    ?>
    <img src="profilephoto/<?php echo $image; ?>"  class="z-depth-1 rounded-circle" width="45" alt="avatar image">
    <?php
   
} else {
    ?>
    <img src="<?php echo  $image; ?>"  class="z-depth-1 rounded-circle" width="45" alt="avatar image">
    <?php
}
    ?>

          <div class="d-flex flex-column pl-3">
            <a href="#!" class="font-weight-normal mb-0"> Posted By <?php echo $name;?> </a>
            <p class="small text-muted mb-0"><?php echo $time;?></p>
          </div>
        </div>
      </div>
      <div class="card-body">
        <img src="blogimage/<?php echo $img;?>" width="300px" class="img-fluid">
        <p class="my-4"><?php echo $desc;?></p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="d-flex flex-row">
            <button type="button" class="btn btn-fb btn-sm py-1 px-2 m-0 mr-2"><i class="far fa-thumbs-up pr-1"></i> Like</button>
            <button type="button" class="btn btn-light btn-sm py-1 px-2 m-0 mr-2"><i class="fas fa-share pr-1"></i> Share</button>
          </div>
          <div class="d-flex flex-column pl-3">
            <p class="small text-muted mb-0">135 likes - 7 comments</p>
          </div>
        </div>
      </div>

     

      <?php 
          $blogid=$_GET['blogid'] ;
           $blog=mysqli_query($db,"SELECT * FROM blog_comment  WHERE blog_id = $blogid ");

           if (mysqli_num_rows($blog) > 0) {
            // output data of each row
            while($get = mysqli_fetch_assoc($blog)) {    
           $comment = $get['comment'];
           $commentid = $get['comment_id'];
           $uid_form_comment = $get['user_id'];
           $time = $get['ctime'];
 
           ?>
      
      <div class="py-4 grey lighten-4">
        <div class="px-3">

        <?php 
        $name=mysqli_query($db,"SELECT * FROM user  WHERE user_id=$uid_form_comment ");
        $get = mysqli_fetch_assoc($name);
        $image = $get['image'];
        if ($uid == $_SESSION['login_user']){
        $name = "You";
        }
        else {

        $name = $get['f_name'];
        

        }

$filename ="profilephoto/$image"; 
if (file_exists($filename)) {
    ?>
    <img src="profilephoto/<?php echo $image; ?>"  class="z-depth-1 rounded-circle float-left" width="40" alt="avatar image">
    <?php
   
} else {
    ?>
    <img src="<?php echo  $image; ?>"  class="z-depth-1 rounded-circle float-left" width="40" alt="avatar image">
    <?php
}
    ?>
     
          <div class="d-flex flex-column pl-3">
            <div class="">
              <a href="#!" class="font-weight-normal mb-0"><?php echo $name; ?></a>
              <p class="small text-muted float-right mb-0"><?php echo $time; ?></p>
            </div>
            <p class="font-weight-light dark-grey-text mb-0"><?php echo $comment; ?></p>
          </div>
        </div>
        <hr class="my-3">
      </div>

          <?php }
                            
                        } 
                        else {
                            echo "No Comments Yet...";
                        }
                          ?>

      <div class="card-footer white py-3">
        <div class="form-group mb-0">
            <form action="php_actions/add_comment.php" method="post">
          <textarea class="form-control rounded-0"  rows="2" name="comment" placeholder="Write a comment"></textarea>
          <input type="hidden" name="blogid" value="<?php echo $blogid ; ?>">
          <input type="hidden" name="userid" value="<?php echo $user_check ; ?>">
          <div class="text-right pt-1">
            <button type="submit" name="submit" class="btn btn-primary btn-sm mb-0 mr-0">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>

  </section>




</div>



</div>



<div class="container my-5 py-5 z-depth-1">


<!--Section: Content-->
<section class="px-md-5 mx-md-5 text-center dark-grey-text">


    <!--Google map-->
    <div id="map-container-google-1" class="z-depth-1 map-container mb-5">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d466451.7041893772!2d90.39015015455186!3d24.025636125484137!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c64c103a8093%3A0xd660a4f50365294a!2sNorth%20South%20University!5e0!3m2!1sen!2sbd!4v1620025619646!5m2!1sen!2sbd" frameborder="0" style="border:0" loading="lazy" allowfullscreen></iframe>
    </div>


    <!--Google Maps-->

    <!--Grid row-->
    <div class="row d-flex justify-content-center mb-5">

        <!--Grid column-->
        <div class="col-md-6 text-center">

            <h3 class="font-weight-bold">Contact Us</h3>
    <form action="contact.php" method="post">
             <!-- Material outline input -->
             <div class="md-form md-outline mt-3">
                <input type="text" id="form-text" name="Name" class="form-control">
                <label for="form-email">Name</label>
            </div>

            <!-- Material outline input -->
            <div class="md-form md-outline mt-3">
                <input type="email" id="form-email" name="Email" class="form-control">
                <label for="form-email">E-mail</label>
            </div>

            <!-- Material outline input -->
            <div class="md-form md-outline">
                <input type="text" id="form-subject" name="Subject" class="form-control">
                <label for="form-subject">Subject</label>
            </div>

            <!--Material textarea-->
            <div class="md-form md-outline mb-3">
                <textarea id="form-message" class="md-textarea form-control" name="Message" rows="5"></textarea>
                <label for="form-message">How we can help?</label>
            </div>

            <button type="submit" name="mailSubmit" class="btn btn-info btn-sm ml-0">Submit<i class="far fa-paper-plane ml-2"></i></button>
            </form>
        </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->

    <!--Grid row-->
    <div class="row text-center">

        <!--Grid column-->
        <div class="col-lg-4 col-md-12 mb-4 mb-md-0">

            <i class="fas fa-map-marker-alt fa-2x blue-text"></i>

            <p class="font-weight-bold my-3">Address</p>

            <p class="text-muted">North South University</p>

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">

            <i class="fas fa-phone fa-2x blue-text"></i>

            <p class="font-weight-bold my-3">Phone number</p>

            <p class="text-muted">+88 0132211244</p>

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">

            <i class="fas fa-envelope fa-2x blue-text"></i>

            <p class="font-weight-bold my-3">E-mail</p>

            <p class="text-muted">travelguide@gmail.com</p>

        </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->


</section>
<!--Section: Content-->


</div>




<!-------------------------------------------AR EKHANEE ESHEE SESH HOBEEEE------------------------------------------->



<!-- Footer -->
<footer class="page-footer font-small unique-color-dark pt-4">
<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2021 Copyright:
    <a href="https://binaryBros.digital/"> binaryBros.digital</a>
</div>
<!-- Copyright -->
</footer>
<!-- Footer -->



    <!-- End your project here-->
    <!-- jQuery -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script type="text/javascript" src="extra_added_file/scrpits.js"></script>





    
</body>

</html>