<?php
ob_start();
include('db.php');?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
       

    <!-- Custom CSS -->
    
    <link rel="stylesheet" href="style.css">
    <title>MediaBook</title>
</head>

<body>
    <nav>
        <div class="nav-left">
            <img src="./images/logo.png" alt="Logo">
            <input type="text" placeholder="Search Mediabook..">
        </div>

        <div class="nav-middle">
            <a href="#" class="active">
                <i class="fa fa-home"></i>
            </a>

            <a href="#">
                <i class="fa fa-user-friends"></i>
            </a>

            <a href="#">
                <i class="fa fa-play-circle"></i>
            </a>

            <a href="#">
                <i class="fa fa-users"></i>
            </a>
        </div>

        <div class="nav-right">
            <span class="profile"></span>

            <a href="#">
                <i class="fa fa-bell"></i>
            </a>

            <a href="#">
                <i class="fas fa-ellipsis-h"></i>
            </a>
        </div>
    </nav>


    <div class="container">
        <div class="left-panel">
            <ul>
                <li>
                    <span class="profile"></span>
                    <p>Aashish Panthi</p>
                </li>
                <li>
                    <i class="fa fa-user-friends"></i>
                    <p>Friends</p>
                </li>
                <li>
                    <i class="fa fa-play-circle"></i>
                    <p>Videos</p>
                </li>
                <li>
                    <i class="fa fa-flag"></i>
                    <p>Pages</p>
                </li>
                <li>
                    <i class="fa fa-users"></i>
                    <p>Groups</p>
                </li>
                <li>
                    <i class="fa fa-bookmark"></i>
                    <p>Bookmark</p>
                </li>
                <li>
                    <i class="fab fa-facebook-messenger"></i>
                    <p>Inbox</p>
                </li>
                <li>
                    <i class="fas fa-calendar-week"></i>
                    <p>Events</p>
                </li>
                <li>
                    <i class="fa fa-bullhorn"></i>
                    <p>Ads</p>
                </li>
                <li>
                    <i class="fas fa-hands-helping"></i>
                    <p>Offers</p>
                </li>
                <li>
                    <i class="fas fa-briefcase"></i>
                    <p>Jobs</p>
                </li>
                <li>
                    <i class="fa fa-star"></i>
                    <p>Favourites</p>
                </li>
            </ul>

            <div class="footer-links">
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
                <a href="#">Advance</a>
                <a href="#">More</a>
            </div>
        </div>


        <div class="middle-panel">

            <div class="story-section">

                <div class="story create">
                    <div class="dp-image">
                        <img src="./images/dp.jpg" alt="Profile pic">
                    </div>
                    <span class="dp-container">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="name">Create Story</span>
                </div>


                <div class="story">
                    <img src="./images/model.jpg" alt="Anuska's story">
                    <div class="dp-container">
                        <img src="./images/girl.jpg" alt="">
                    </div>
                    <p class="name">Anuska Sharma</p>
                </div>

                <div class="story">
                    <img src="./images/boy.jpg" alt="Story image">
                    <span class="dp-container">
                        <img src="./images/dp.jpg" alt="Profile pic">
                    </span>
                    <span class="name">Gaurav Gall</span>
                </div>

                <div class="story">
                    <img src="./images/mountains.jpg" alt="Story image">
                    <span class="dp-container">
                        <img src="./images/boy.jpg" alt="Profile pic">
                    </span>
                    <span class="name">Priyank Saksena</span>
                </div>

                <div class="story">
                    <img src="./images/shoes.jpg" alt="Story image">
                    <span class="dp-container">
                        <img src="./images/model.jpg" alt="Profile pic">
                    </span>
                    <span class="name"></span>
                </div>
            </div>

            <form action="" method="post" enctype="multipart/form-data">
            <div class="post create">
                <div class="post-top">
                    <div class="dp">
                        <img src="./images/girl.jpg" alt="">
                    </div>
                    <input type="text" name="content" placeholder="ماذا تفكر" />
                </div>
                
                <div class="post-bottom">
                    
                    <div class="action">
                    <input type="file" class="form-control" name="image">
                    </div>
                    <div class="action">
                        <input type="submit" name="post_button" class="btn btn-success" value="post">
                    </div>

                    
                </div>

            </div>
            </form>
            <?php
            if(isset($_POST['post_button'])){

                $content = $_POST['content'];
                $created_at = date('d-m-y');
                $image_name = $_FILES['image']['name'];
                $image_tmp = $_FILES['image']['tmp_name'];
                move_uploaded_file($image_tmp , "images/$image_name");

                $sql = "INSERT INTO `posts`( `content`, `image`, `created_at`, `author`) VALUES ('$content','$image_name','$created_at','new user')";
                $add = mysqli_query($connection ,$sql);
                header("location:index.php");
                 

            }
            ?>
            <?php
                    $sql ="SELECT * FROM `posts`";
                    $allposts = mysqli_query($connection ,$sql);
                    while($row =mysqli_fetch_assoc($allposts)){
  
                    $content =$row['content'];
                    $image =$row['image'];
                    $created_at =$row['created_at'];
                    $author =$row['author'];
                   
                    ?>
            <div class="post">
                <div class="post-top">
                    <div class="dp">
                        <img src="images/dp.jpg" alt="">
                    </div>
                    <div class="post-info">
                        <p class="name"><?=$author?></p>
                        <span class="time"><?=$created_at?></span>
                    </div>
                    <i class="fas fa-ellipsis-h"></i>
                </div>

                <div class="post-content">
                <?=$content?>
                    <img src="images/<?=$image?>" />
                </div>
             
                
                <div class="post-bottom">
                    <div class="action">
                        <i class="far fa-thumbs-up"></i>
                        <span>Like</span>
                    </div>
                    <div class="action">
                        <i class="far fa-comment"></i>
                        <span>Comment</span>
                    </div>
                    <div class="action">
                        <i class="fa fa-share"></i>
                        <span>Share</span>
                    </div>
                </div>
            </div>
            <?php
                    }?>
      
            
        </div>
        <div class="right-panel">
            <div class="pages-section">
                <h4>Your pages</h4>
                <a class='page' href="#">
                    <div class="dp">
                        <img src="./images/logo.png" alt="">
                    </div>
                    <p class="name">Cody</p>
                </a>

                <a class='page' href="#">
                    <div class="dp">
                        <img src="./images/dp.jpg" alt="">
                    </div>
                    <p class="name">Cody Tutorials</p>
                </a>
            </div>

            <div class="friends-section">
                <h4>Friends</h4>
                <a class='friend' href="#">
                    <div class="dp">
                        <img src="./images/dp.jpg" alt="">
                    </div>
                    <p class="name">Henry Mosely</p>
                </a>

                <a class='friend' href="#">
                    <div class="dp">
                        <img src="./images/shoes.jpg" alt="">
                    </div>
                    <p class="name">George</p>
                </a>

                <a class="friend" href="#">
                    <div class="dp">
                        <img src="./images/boy.jpg" alt="">
                    </div>
                    <p class="name">Aakash Malhotra</p>
                </a>

                <a class="friend" href="#">
                    <div class="dp">
                        <img src="./images/model.jpg" alt="">
                    </div>
                    <p class="name">Ragini Khanna</p>
                </a>

                <a class="friend" href="#">
                    <div class="dp">
                        <img src="./images/boy.jpg" alt="">
                    </div>
                    <p class="name">Justin Bieber</p>
                </a>

                <a class="friend" href="#">
                    <div class="dp">
                        <img src="./images/dp.jpg" alt="">
                    </div>
                    <p class="name">Ramesh GC</p>
                </a>

                <a class="friend" href="#">
                    <div class="dp">
                        <img src="./images/model.jpg" alt="">
                    </div>
                    <p class="name">Sajita Gurung</p>
                </a>
                
            </div>
        </div>
    </div>
    <div  id="slideshow-example" data-component="slideshow">
        <div  role="list">
            <div class="slide">
                <img onclick = "f2un();" src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Flag_of_Israel.svg/1200px-Flag_of_Israel.svg.png" alt="">
              </div>
          <div class="slide">
            <img   onclick = "fun();" src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/00/Flag_of_Palestine.svg/640px-Flag_of_Palestine.svg.png" alt="">
          </div>
          <div class="slide">
            <img src="https://images.theconversation.com/files/531829/original/file-20230614-27-7916dl.jpg?ixlib=rb-1.1.0&rect=0%2C9%2C6645%2C3925&q=20&auto=format&w=320&fit=clip&dpr=2&usm=12&cs=strip" alt="">
          </div>
          
        </div>
      </div>
    <script src="slideshow.js"></script>
     <!-- jQuery -->
     <script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>

</html>