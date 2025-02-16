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
$sql = "SELECT title, poster, release_date, duration, rating, format, imdb_rating, synopsis FROM movies WHERE title = 'Avengers: Age of Ultron (2015)'";
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $movie['title']; ?></title>

    <link href="../css/m1.css" rel="stylesheet">
    <link href="../css/Search.css" rel="stylesheet">
    <link href="../css/m2.css" rel="stylesheet">


    <link rel="shortcut icon" type="image/x-icon" href="Photo/preview (2).png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-color: #bdbdbd;">
<nav class="navbar sticky-top navbar-expand-sm navbar-light " style="background-color:  #333;" >
  <div class="container" style="background-color: #333;">
      <a href="../index.php" class="navbar-brand" >
          <!-- Logo -->
          <img src="../img/Logo1.png" height="60" width="65" alt="" style="border-radius: 100%;">

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

                  <ul class=" dropdown-menu" style="margin-left: -40px;background-color: #333;">
                      <a class="dropdown-item" href="../movie/Action.php" style="color: aliceblue;background-color: #333;">หนังแอคชั่น Action</a>
                      <a class="dropdown-item" href="../movie/adventure.php"style="color: aliceblue;background-color: #333;">ผจญภัย Adventure</a>
                      <a class="dropdown-item" href="../movie/horror.php"style="color: aliceblue;background-color: #333;">หนังสยองขวัญ Horror</a>
                      <a class="dropdown-item" href="../movie/ASci-fi.php"style="color: aliceblue;background-color: #333;">วิทยาศาสตร์ Sci-fi</a>
                      
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

    <div class="container" >
        <div class="poster" style="margin-right: 20px;margin-left: -85px;">
            <img src="../admin/uploads/<?php echo $movie['poster']; ?>" alt="<?php echo $movie['title']; ?> Poster">
        </div>

        <div class="details" style="margin-right:2px ;">
            <h1 style="color: #000000;"><?php echo $movie['title']; ?></h1>
            <div class="info">
                <p><strong>Release Date:</strong> <?php echo $movie['release_date']; ?></p>
                <p><strong>Duration:</strong> <?php echo $movie['duration']; ?> </p>
                <p><strong>Rating:</strong> <?php echo $movie['rating']; ?></p>
                <p><strong>Format:</strong> <?php echo $movie['format']; ?></p>
            </div>

            <div class="rating" style="color: aliceblue;">
                <div >IMDb: <?php echo $movie['imdb_rating']; ?>/10</div>

            </div>

            <a href="../round.php"><button class="showtimes-button">จองรอบดูหนัง</button></a>
        </div>

        <iframe class="video-section" style="width: 750px;height:400px;"
      src="https://www.youtube.com/embed/tmeOjFno6Do?feature=shared" allowfullscreen></iframe>

    </div>
    <div style="margin-left: 20px;">

        <br>
        <h1>
            เรื่องย่อ
        </h1>
        <p style="margin-left: 20px;">
            <?php echo $movie['synopsis']; ?>
        </p>
    </div>
 <br>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</body>

</html>