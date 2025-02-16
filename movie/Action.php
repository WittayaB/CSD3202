<?php
session_start();

// ตั้งค่าการเชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ssrumovie";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// เช็คการเชื่อมต่อ
if ($conn->connect_error) {
    die("" . $conn->connect_error);
} else {
    echo ""; // แสดงข้อความเมื่อเชื่อมต่อสำเร็จ
}

// ตัวอย่างการใช้งาน: ดึงข้อมูลจากตาราง
$sql = "SELECT * FROM reservations"; // ปรับตามตารางที่คุณต้องการ
$result = $conn->query($sql);

if ($result) {
    echo ""; // แสดงข้อความเมื่อการ query สำเร็จ
} else {
    echo "" . $conn->error; // แสดงข้อความเมื่อการ query ไม่สำเร็จ
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!--  กำหนดตัวอักขระ -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Website</title>
    <!-- เชื่อมโยงไฟล์ CSS -->
    <link href="../css/s.css" rel="stylesheet">
    <link href="../css/Search.css" rel="stylesheet">
   



    <!-- ไอคอนเว็บไซต์ที่แสดงในแท็บเบราว์เซอร์ -->
    <link rel="shortcut icon" type="image/x-icon" href="Photo/preview (2).png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <!-- ส่วนของแถบนำทาง (Navbar) -->
    <nav class="navbar sticky-top navbar-expand-sm navbar-light " style="background-color:  #333;">
        <div class="container">
            <a href="../index.php" class="navbar-brand">
                <!-- Logo -->
                <img src="../img/Logo1.png"height="60" width="65" alt="" style="border-radius: 100%;">


            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar1">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- เมนูนำทางหลัก -->
            <div id="navbar1" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <!-- ลิงก์ไปยังหน้าจองหนัง -->
                    <li class="nav-item">
                        <a href="../index.php" class="nav-link" style="color: beige; margin-right: 40px ;"><B>HOME</B></a>
                    </li>
                    <!-- เมนูแบบดร็อปดาวน์สำหรับหมวดหมู่หนัง -->
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" style="color: beige; margin-right: 40px;" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <B>Movies </B>
                        </a>

                        <ul class=" dropdown-content" style="margin-left: -40px;background-color: #333;">
                            <a class="dropdown-item" href="../movie/Action.php">หนังแอคชั่น Action</a>
                            <a class="dropdown-item" href="../movie/adventure.php">ผจญภัย Adventure</a>
                            <a class="dropdown-item" href="../movie/horror.php">หนังสยองขวัญ Horror</a>
                            <a class="dropdown-item" href="../movie/ASci-fi.php">วิทยาศาสตร์ Sci-fi</a>
                            
                                <hr class="dropdown-divider">
                            
                            <a class="dropdown-item" href="#"></a>
                        </ul>
                    </li>
                    <!-- ลิงก์ไปยังหน้าจองหนัง -->
                    <li class="nav-item">
                        <a href="../round.php" class="nav-link"
                            style="color: beige; margin-right: 50px;"><B>Reservation round </B></a>
                    </li>



                    <!-- กล่องค้นหา -->
                    <div class="search" style="margin-right: 200px;">
                        <div class="search-box">
                            <div class="search-field">
                                <input placeholder="Search..." class="input" type="text">
                                <div class="search-box-icon">
                                    <button class="btn-icon-content">
                                        <i class="search-icon">
                                            <svg xmlns="://www.w3.org/2000/svg" version="1.1" viewBox="0 0 512 512">
                                                <path
                                                    d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"
                                                    fill="#fff"></path>
                                            </svg>
                                        </i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>



                </ul>


            </div>
            <div class="dropdown" >
                
                    <!-- Logo -->
                    <img src="../img/user(1).png" height="50" width="50" alt=""
                        style="border-radius: 100%;margin-bottom: px; ">

                
                <!-- เนื้อหา dropdown -->
                <div class="dropdown-content" style="margin-right: -50px;">
                    <a href="../login.php">Log in</a>
                    <a href="../signup.php">Sign up</a>
                    <a href="../logout.php">logout</a>
                                </div>
            </div>





        </div>
        </div>
    </nav>

    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="../img/wallpaperflare.com_wallpaper(20).jpg" class="d-block w-100"
                    style="width: 700px;height: 700px;" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="../img/wallpaperflare.com_wallpaper(12).jpg" class="d-block w-100"
                    style="width: 700px;height: 700px;" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../img/wallpaperflare.com_wallpaper(22).jpg" class="d-block w-100"
                    style="width: 700px;height: 700px;" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- ส่วนรายการหนังทั้งหมด -->
    <section class="movie-list">
        <h2>หนังแอคชั่น Action</h2>
        <div class="container">
        <!-- ภาพแถวที่ 1 -->
            <!-- AVATAR -->
            <div class="col">
                <a href="../movie-card/m1.php"><img src="../admin/uploads/avatar11.jpg" alt="AVATAR"></a>
            </div>
            <!-- AVATAR AWAY OF WATER -->
            <div class="col" style="height: 40px;">
                <a href="../movie-card/m2.php"><img src="../admin/uploads/avatar.jpg" alt="AVATAR AWAY OF WATER"></a>
            </div>
            <!-- BLACK ADAM -->
            <div class="col">
                <a href="../movie-card/m16.php"><img src="../admin/uploads/avengers1.jpg" alt="BLACK ADAM"></a>
            </div>
            <!-- Avengers2 -->
            <div class="col">
                <a href="../movie-card/m4.php"><img src="../admin/uploads/Avengers2.jpg" alt="Avengers2"></a>
            </div>
            <!-- avengers infinity war -->
            <div class="col">
                <a href="../movie-card/m5.php"><img src="../admin/uploads/avengers_infinity_war.jpg" alt="avengers infinity war"></a>
            </div>
            <!-- AvengersEndGame -->
            <div class="col">
                <a href="../movie-card/m6.php"><img src="../admin/uploads/AvengersEnd.jpg" alt="AvengersEnd"></a>
            </div>

            <div class="col">
                <a href="../movie-card/m9.php"><img src="../admin/uploads/Ben_10.jpg" alt="AVATAR"></a>
            </div>
            <!-- AVATAR AWAY OF WATER -->
            <div class="col" style="height: 40px;">
                <a href="../movie-card/m8.php"><img src="../admin/uploads/ben16.jpg" alt="AVATAR AWAY OF WATER"></a>
            </div>
            <!-- BLACK ADAM -->
            <div class="col">
                <a href="../movie-card/m3.php"><img src="../admin/uploads/black_ADUM.jpg" alt="BLACK ADAM"></a>
            </div>
            <!-- Avengers2 -->
            <div class="col">
                <a href="../movie-card/m11.php"><img src="../admin/uploads/Deadpool&Wolverine.jpg" alt="Avengers2"></a>
            </div>
            <!-- avengers infinity war -->
            <div class="col">
                <a href="../movie-card/m10.php"><img src="../admin/uploads/Doctor Strange.jpg" alt="avengers infinity war"></a>
            </div>
            <!-- AvengersEndGame -->
            <div class="col">
                <a href="../movie-card/m18.php"><img src="../admin/uploads/joker_ver3_xlg.jpg" alt="AvengersEnd"></a>
            </div>

            <div class="col">
                <a href="../movie-card/m17.php"><img src="../admin/uploads/joker2.jpg" alt="AVATAR"></a>
            </div>
            <!-- AVATAR AWAY OF WATER -->
            <div class="col" style="height: 40px;">
                <a href="../movie-card/m27.php"><img src="../admin/uploads/Ultraman_Rising.jpg" alt="AVATAR AWAY OF WATER"></a>
            </div>
            <!-- BLACK ADAM -->
           
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
          
        </div>



        <footer style="margin-top: 100px;">



            <div class="grid-item2">
                <div>
                    <h1>Contact us</h1>
                    
                    <p>email: s65122250008@ssru.ac.th</p>
                    <p>email: s65122250006@ssru.ac.th</p>
                    <p>email: s65122250014@ssru.ac.th</p>
                    <p>email: s65122250013@ssru.ac.th</p>
                    <p>email: s65122250032@ssru.ac.th</p>


                </div>

                <div class="menu-section">
                    <ul>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>

                <div class="social-section">
                    <h1>Social</h1>
                    <div>
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-linkedin"></i>
                        <i class="fa-brands fa-youtube"></i>
                    </div>
                    <div class="carda" >
                        <a class="socialContainer containerOne" href="https://www.instagram.com/kxma.blazi/">
                            <svg viewBox="0 0 16 16" class="socialSvg instagramSvg">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                                </path>
                            </svg>
                        </a>
            
                        <a class="socialContainer containerOne" href="https://www.instagram.com/non_control/">
                            <svg viewBox="0 0 16 16" class="socialSvg instagramSvg">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                                </path>
                            </svg>
                        </a>
                        <a class="socialContainer containerOne" href="https://www.instagram.com/_benz_ti/">
                            <svg viewBox="0 0 16 16" class="socialSvg instagramSvg">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                                </path>
                            </svg>
                        </a>
                        <a class="socialContainer containerOne" href="https://www.instagram.com/khwannicha_s/">
                            <svg viewBox="0 0 16 16" class="socialSvg instagramSvg">
                                <path
                                    d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                                </path>
                            </svg>
                        </a>
                       

                    </div>

                </div>
                
            </div>

            </div>

        </footer>
       


    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>