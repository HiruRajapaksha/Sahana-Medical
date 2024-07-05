<div class="row" >
            <nav class="navbar navbar-expand-md -tertiary cnav " style="padding-top:20px;padding-bottom:20px">
                <div class="container-fluid " >
                  <a class="navbar-brand" href="#"><h4 style="font-weight: bolder;"></h4>
                    <img  src="../Assets/Logo02.png" alt="" style=" height:3vw;margin-left:40px" >
                  </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class=" navbar-collapse justify-content-center " id="navbarTogglerDemo02" >
                    <ul class="nav justify-content-center sm_navi">
                        <li class="nav-item">
                          <a class="nav-link " href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link " href="aboutUs.php" >About Us</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="blog.php">Blogs</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="reviews.php">Reviews</a>
                        </li>
 
                      </ul>
                  </div>
                  <div>                   
                  <button class="btn btn02 active" style="<?php echo $profileButtonStyle; ?>">
                    <a class="nav-link" href="userProfile.php">
                        <span class="bi bi-person-fill me-1"></span> Profile
                    </a>
                </button>
</div>

                  <!--<button  type="submit" style="margin-right:10px"><a class="btn02" href="../Controllers/userLogout.php" >Logout</a></button> -->
                  <a  href="../Controllers/userLogout.php" ><button class="btn02 active"  type="submit" style="margin-right:40px" >Log Out</button>  </a> 
                  
                  
                </div>
            </nav>
</div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.1/font/bootstrap-icons.css" rel="stylesheet">
