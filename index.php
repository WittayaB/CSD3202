<?php
// ตั้งค่าการเชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ssrumovie";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);


// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    die("Connection failed: " . $conn->connect_error);
}

// คำสั่ง SQL ดึงข้อมูลจากตาราง movies (สมมติว่าเราต้องการแสดงเฉพาะข้อมูลของภาพยนตร์ Avatar)
$sql = "SELECT title, poster, release_date, duration, rating, format, imdb_rating, synopsis FROM movies WHERE title = 'Avatar'";
$result = $conn->query($sql);

// ตรวจสอบว่ามีผลลัพธ์จากการ query หรือไม่
if ($result->num_rows > 0) {
    // ดึงข้อมูลแถวเดียว (เพราะเราต้องการแสดงภาพยนตร์แค่เรื่องเดียว)
    $movie = $result->fetch_assoc();
} else {
    echo "Movie not found";
    exit;
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
    <link href="css/s.css" rel="stylesheet">
    <link href="css/Search.css" rel="stylesheet">
    <link ref="icon" href="./icon_Web.png">



    <!-- ไอคอนเว็บไซต์ที่แสดงในแท็บเบราว์เซอร์ -->
    <link rel="shortcut icon" type="image/x-icon" href="Photo/preview (2).png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <!-- ส่วนของแถบนำทาง (Navbar) -->
    <nav class="navbar sticky-top navbar-expand-sm navbar-light " style="background-color:  #333;">
        <div class="container">
            <a href="index.php" class="navbar-brand">
                <!-- Logo -->
                <img src="img/Logo1.png" height="60" width="65" alt="" style="border-radius: 100%;">

            </a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar1">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- เมนูนำทางหลัก -->
            <div id="navbar1" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <!-- ลิงก์ไปยังหน้าจองหนัง -->
                    <li class="nav-item">
                        <a href="index.php" class="nav-link" style="color:beige; margin-right: 40px ;"><B>HOME</B></a>
                    </li>
                    <!-- เมนูแบบดร็อปดาวน์สำหรับหมวดหมู่หนัง -->
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" style="color:beige; margin-right: 40px;" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <B>Movies </B>
                        </a>

                        <ul class=" dropdown-content" style="margin-left: -40px;background-color: #333;">
                            <a class="dropdown-item" href="movie/Action.php">หนังแอคชั่น Action</a>
                            <a class="dropdown-item" href="movie/adventure.php">ผจญภัย Adventure</a>
                            <a class="dropdown-item" href="movie/horror.php">หนังสยองขวัญ Horror</a>
                            <a class="dropdown-item" href="movie/ASci-fi.php">วิทยาศาสตร์ Sci-fi</a>
                            
                                <hr class="dropdown-divider">
                            
                            <a class="dropdown-item" href="#"></a>
                        </ul>
                        
                    </li>
                    <!-- ลิงก์ไปยังหน้าจองหนัง -->
                    <li class="nav-item">
                        <a href="round.php" class="nav-link"
                            style="color:beige; margin-right: 50px;"><B>Reservation round </B></a>
                    </li>



                    <!-- กล่องค้นหา -->
                    <div class="search" style="margin-right: 200px;">
                        <div class="search-box">
                            <div class="search-field">
                                <form action="search.php" method="POST">
                                    <input placeholder="Search..." class="input" type="text" name="search_term" >
                                    <div class="search-box-icon">
                                        <button class="btn-icon-content" type="submit">
                                            <i class="search-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 512 512">
                                                    <path
                                                        d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"
                                                        fill="#fff"></path>
                                                </svg>
                                            </i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    



                </ul >


            </div>
            <div class="dropdown" >
                
                    <!-- Logo -->
                    <img src="img/user(1).png" height="50" width="50" alt=""
                        style="border-radius: 100%;margin-bottom: px; ">

                
                <!-- เนื้อหา dropdown -->
                <div class="dropdown-content" style="margin-right: -50px;">
                    <a href="login.php">Log in</a>
                    <a href="signup.php">Sign up</a>
                    <a href="logout.php">logout</a>
                </div>
            </div>





        </div>
        </div>
    </nav>

    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="img/wallpaperflare.com_wallpaper(20).jpg" class="d-block w-100"
                    style="width: 700px;height: 700px;" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="img/wallpaperflare.com_wallpaper(12).jpg" class="d-block w-100"
                    style="width: 700px;height: 700px;" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/wallpaperflare.com_wallpaper(22).jpg" class="d-block w-100"
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
        <h2>รวมหนังทั้งหมด</h2>
        <div class="container">
        <!-- ภาพแถวที่ 1 -->
            <!-- AVATAR -->
            <div class="col">
                <a href="movie-card/m1.php"><img src="admin/uploads/<?php echo $movie['poster']; ?>" alt="<?php echo $movie['title']; ?> Poster">
                </a>
            </div>
            <!-- AVATAR AWAY OF WATER -->
            <div class="col" style="height: 40px;">
                <a href="movie-card/m2.php"><img src="img/ed/avatar_away_of_water.jpg" alt="AVATAR AWAY OF WATER"></a>
            </div>
            <!-- BLACK ADAM -->
            <div class="col">
                <a href="movie-card/m3.php"><img src="img/ed/black_ADUM.jpg" alt="BLACK ADAM"></a>
            </div>
            <!-- Avengers2 -->
            <div class="col">
                <a href="movie-card/m4.php"><img src="img/ed/Avengers2.jpg" alt="Avengers2"></a>
            </div>
            <!-- avengers infinity war -->
            <div class="col">
                <a href="movie-card/m5.php"><img src="img/ed/avengers_infinity_war.jpg" alt="avengers infinity war"></a>
            </div>
            <!-- AvengersEndGame -->
            <div class="col">
                <a href="movie-card/m6.php"><img src="img/ed/AvengersEnd.jpg" alt="AvengersEnd"></a>
            </div>

        <!-- ภาพแถวที่ 2 -->
            <!-- First Love -->
            <div class="col">
                <a href="movie-card/m7.php"><img src="img/ed/First Love2.jpeg" alt="First Love"></a>
            </div>
            <!-- ben16 -->
            <div class="col">
                <a href="movie-card/m8.php"><img src="img/ed/ben16.jpg" alt="ben16"></a>
            </div>
            <!-- Ben10 -->
            <div class="col">
                <a href="movie-card/m9.php"><img src="img/ed/Ben_10.jpg" alt="Ben_10"></a>
            </div>
            <!-- Doctor Strange -->
            <div class="col">
                <a href="movie-card/m10.php"><img src="img/ed/Doctor Strange.jpg" alt="Doctor Strange"></a>
            </div>
            <!-- Deadpool&Wolverine -->
            <div class="col">
                <a href="movie-card/m11.php"><img src="img/ed/Deadpool&Wolverine.jpg" alt="Deadpool&Wolverine"></a>
            </div>
            <!-- Doraemon_space heroes -->
            <div class="col">
                <a href="movie-card/m12.php"><img src="img/ed/Doraemon_space heroes.jpg" alt="Doraemon_space heroes"></a>
            </div>

        <!-- ภาพแถวที่ 3 -->
            <!-- Doraemon_symphony -->
            <div class="col">
                <a href="movie-card/m13.php"><img src="img/ed/Doraemon_symphony.jpg" alt="Doraemon_symphony"></a>
                </div>
            <!-- gooseBumps -->
            <div class="col">
                <a href="movie-card/m14.php"><img src="img/ed/gooseBumps.jpg" alt="gooseBumps"></a>
            </div>
            <!-- Interstellar -->
            <div class="col">
                <a href="movie-card/m15.php"><img src="img/ed/Interstellar.jpg" alt="Interstellar"></a>
            </div>
            <!-- avengers1 -->
            <div class="col">
                <a href="movie-card/m16.php"><img src="img/ed/avengers1.jpg" alt="avengers1"></a>
            </div>
            <!-- joker2 -->
            <div class="col">
                <a href="movie-card/m17.php"><img src="img/ed/joker2.jpg" alt="joker2"></a>
            </div>
            <!-- joker -->
            <div class="col">
                <a href="movie-card/m18.php"><img src="img/ed/joker_ver3_xlg.jpg" alt="joker"></a>
            </div>

        <!-- ภาพแถวที่ 4 -->
            <!-- mylittle pony -->
            <div class="col">
                <a href="movie-card/m19.php"><img src="img/ed/mylittle_pony.jpg" alt="mylittle_pony"></a>
            </div>
            <!-- AD ASTRA -->
            <div class="col">
                <a href="movie-card/m20.php"><img src="img/ed/ADASTRA.jpg" alt="ADASTRA"></a>
            </div>
            <!-- ธี่หยด -->
            <div class="col">
                <a href="movie-card/m21.php"><img src="img/ed/T_YOD.jpg" alt="T_YOD"></a>
            </div>
            <!-- ธี่หยด2 -->
            <div class="col">
                <a href="movie-card/m22.php"><img src="img/ed/T_YOD2.jpg" alt="T_YOD2"></a>
            </div>
            <!-- Toy story -->
            <div class="col">
                <a href="movie-card/m23.php"><img src="img/ed/toy_story.jpg" alt="toy_story"></a>
            </div>
            <!-- Toy story2 -->
            <div class="col">
                <a href="movie-card/m24.php"><img src="img/ed/Toy_Story2.jpg" alt="Toy_Story2"></a>
            </div>

        <!-- ภาพแถวที่ 5 -->
            <!-- Toy Story3 -->
            <div class="col">
                <a href="movie-card/m25.php"><img src="img/ed/Toy_Stor_3.jpg" alt="Toy_Story3"></a>
            </div>
            <!-- Toy Story4 -->
            <div class="col">
                <a href="movie-card/m26.php"><img src="img/ed/toy_story4.jpg" alt="Toy_Story4"></a>
            </div>
            <!-- Ultraman Rising -->
            <div class="col">
                <a href="movie-card/m27.php"><img src="img/ed/Ultraman_Rising.jpg" alt="Ultraman_Rising"></a>
            </div>
            <!-- พี่นาค 4-->
            <div class="col">
                <a href="movie-card/m28.php"><img src="img/ed/unnamed.jpg" alt="unnamed"></a>
            </div>
            <!-- Wreck-It Ralph -->
            <div class="col">
                <a href="movie-card/m29.php"><img src="img/ed/WRECK-IT-RALPH.jpg" alt="WRECK-IT-RALPH"></a>
            </div>
            <!-- Wreck-It Ralph2 -->
            <div class="col">
                <a href="movie-card/m30.php"><img src="img/ed/Wreck-It-Ralph2.jpg" alt="Wreck-It-Ralph2"></a>
            </div>
        </div>



        <footer style="margin-top: 100px;">


            <!-- Footter-->
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