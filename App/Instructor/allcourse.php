<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,
    300;0,400;0,700;1,300;1,400;1,700&family=Roboto+Slab:wght@100;200;300;400;500;600;
    700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;
    1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Instructor Homepage</title>
    <link rel="icon" href="image/MainLogo.png" type="image/x-icon">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #1B5056;
        }

        h1 {
            font-size: 40px;
            font-family: 'Roboto', serif;
            font-weight: bold;
            text-transform: uppercase;
            line-height: 1.2;
            color: whitesmoke;
            padding-top: 10px;
            letter-spacing: 2px;
        }

        p {
            line-height: 1.5;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
            color: black;
        }

        /*Navigation*/

        header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background: #333;
    box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
    padding: 20px 7%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    z-index: 1000;
    height: 18%;
}

header .logo-container {
    display: flex;
    align-items: center;
}

header .logo {
    font-weight: bolder;
    font-size: 25px;
    color: #0071f2;
}

header .title {
    margin-left: 10px;
    color: #fff;
}

header .navbar ul {
    list-style: none;
}

header .navbar ul li {
    position: relative;
    float: left;
}

header .navbar ul li a {
    font-size: 20px;
    padding: 20px;
    color: #fff;
    display: block;
}

header .navbar ul li a:hover {
    background: #d2d2d2;
    color: #333;
}

header .navbar ul li ul {
    position: absolute;
    left: 0;
    width: 200px;
    background: #333;
    display: none; /* Hide the dropdown by default */
}

header .navbar ul li ul li {
    width: 100%;
    border-top: 1px solid rgba(0, 0, 0, .1);
}

header .navbar ul li:hover ul {
    display: block; /* Display the dropdown when hovering over the parent item */
}

        /*Sections*/

        section {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .section-heading {
            font-size: 32px;
            font-family: 'Roboto Condensed', sans-serif;
            border-left: 2px solid black;
            border-right: 2px solid black;
            transition: all 0.4s;
            display: inline-block;
            padding: 4px 32px;
            margin-top: 100px;
            margin-bottom: 40px;
            margin-left: 50px;
            height: 100%;
        }

        .section-heading:hover {
            padding: 4px 48px;
            background: red;
        }

        /*Card*/

        .card {
            display: inline-block;
            text-align: center;
            margin: 20px;
            width: 300px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            cursor: pointer;
            box-shadow: 0 10px 6px -6px #777;
        }

        .card_image img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .card .card-description h3 {
            font-family: 'Roboto', sans-serif;
            font-size: 20px;
            margin-bottom: 10px;
            color: #333;
            transition: color 0.3s;
            letter-spacing: 1px;
        }

        .card .card-description p {
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
            margin-bottom: 20px;
            color: #666;
            transition: color 0.3s;
        }

        .card .card-description .update-btn {
            display: inline-block;
            background-color: #ffd700;
            color: #333;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            border-radius: 50px;
            transition: background-color 0.3s;
            border: none;
            outline: none;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 24px;
        }

        .card .card-description .update-btn:hover {
            background-color: #ffcd00;
            transform: scale(1.05);
        }

        /* Footer */

        footer {
            margin-top: 20px;
            background: black;
            padding: 8px;
            color: #eee;
            display: flex;
        }

        footer a {
            color: white;
        }

        footer #right-footer {
            flex: 2px;
            padding: 8px;
            text-align: center;
        }

        footer #social-media-footer a .fa-phone,
        footer #social-media-footer a .fa-envelope,
        footer #social-media-footer a .fa-github,
        footer #social-media-footer a .fa-facebook {
            color: white;
            transition: 0.4;
        }

        footer #social-media-footer ul {
            display: flex;
            list-style: none;
            justify-content: center;
            padding: 0;
        }

        footer #social-media-footer ul li {
            font-size: 48px;
            padding: 16px;
            transition: 0.4s;
        }

        footer #social-media-footer ul li:hover a .fa-phone {
            color: green;
        }

        footer #social-media-footer ul li:hover a .fa-envelope {
            color: red;
        }

        footer #social-media-footer ul li:hover a .fa-github {
            color: #bbb;
        }

        footer #social-media-footer ul li:hover a .fa-facebook {
            color: #3b5998;
        }

        #final-touch {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
    </style>
      <script src="js/ACfunction.js"></script>
      <script src="js/ACdata.js"></script>
</head>

<body>
    <header>
        <div class="logo-container">
            <a href="" class="logo"><img src="image/MainLogo.png" alt="" width="120px" height="120px"></a>
            <h1 class="title">COURSEHIVE</h1>
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="allcourse.php">All Courses</a></li>
                <li><a href="mycourse.php">My Courses</a></li>
                <li><a href="../Login/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <main style="margin-top:10vh">
        <a href="#">
            <h2 class="section-heading" style="color:white">All Courses</h2>
        </a>
        <section>
            <?php
                include '../dataconnection.php';

                $query = "SELECT * FROM course WHERE course_id NOT IN (SELECT course_id FROM course_instructor WHERE instructor_id = ".$_SESSION['id'].");";
                //$sql = "SELECT * FROM course WHERE course_id NOT IN (SELECT course_id FROM course_student WHERE student_id = ".$_SESSION['id'].");";

                $result = mysqli_query($connect, $query);

                if ($result) {
                    // Fetch and process each row of the query result
                    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                      $row = mysqli_fetch_assoc($result);
            ?>
            <div class="card">
                <div class="card_image">
                    <a href="#"><img src="<?php echo $row["course_img"] ?>" alt="Cybersecurity"></a>
                </div>
                <div class="card-description">
                    <h3><?php echo $row["course_title"] ?></h3>
                    <p><?php echo $row["course_description"] ?></p>
                    <a href="enrolled_course.php?id=<?php echo $row['course_id'] ?>" class="update-btn">Enroll</a>
                </div>
            </div>
               
            <?php
                }
                  } else {
                    // Handle query error
                    echo "Error executing the query: " . mysqli_error($connect);
                  }
            ?>

        </section>

    </main>
</body>

</html>