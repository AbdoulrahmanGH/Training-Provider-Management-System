<?php
session_start();
include("navbar.html");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" href="css/studentStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
            text-transform: capitalize;
            transition: .2s linear;
        }

        .container {
            padding: 15px 9%;
            padding-bottom: 100px;
        }

        .container .heading {
            text-align: center;
            padding-bottom: 15px;
            color: #fff;
            text-shadow: 0 5px 10px rgba(0, 0, 0, .2);
            font-size: 50px;
        }

        .container .box-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
            gap: 15px;
        }

        .container .box-container .box {
            box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
            border-radius: 10px;
            background: linear-gradient(#1c5054, #1c5c5c);
            text-align: center;
            padding: 30px 20px;
            position: relative;
        }

        .container .box-container .box img {
            height: 150px;
        }

        .container .box-container .box h3 {
            color: #000;
            font-size: 22px;
            padding: 10px 0;
        }

        .container .box-container .box p {
            color: #fff;
            font-size: 15px;
            line-height: 1.8;
        }

        .container .box-container .box .btn {
            margin-top: 10px;
            display: inline-block;
            background: #333;
            color: #fff;
            font-size: 17px;
            border-radius: 5px;
            padding: 8px 25px;
        }

        .container .box-container .box .btn:hover {
            letter-spacing: 1px;
        }

        .container .box-container .box .completed {
            background: #6ab04c;
        }

        .container .box-container .box .completed:hover {
            background: #5ca946;
        }

        .container .box-container .box .certificate-btn {
            margin-top: 10px;
            display: inline-block;
            background: #c7c100;
            color: #fff;
            font-size: 17px;
            border-radius: 5px;
            padding: 8px 25px;
        }

        .container .box-container .box .certificate-btn:hover {
            letter-spacing: 1px;
        }

        .container .box-container .box .certificate-btn.disabled {
            background: #ccc;
            cursor: not-allowed;
        }

        .container .box-container .box .certificate-btn.disabled:hover {
            letter-spacing: 0;
        }

        .container .box-container .box .certificate-btn.gold {
            background: gold;
            cursor: not-allowed;
        }

        .container .box-container .box .certificate-btn.gold:hover {
            letter-spacing: 0;
        }
        .modal {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 9999;
  align-items: center;
  justify-content: center;
}

.modal-content {
  background-color: #fff;
  padding: 20px;
  border-radius: 5px;
  text-align: center;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

.modal-content h2 {
  font-size: 24px;
  margin-bottom: 10px;
}

.modal-content p {
  font-size: 16px;
}


    </style>
    </head>
<body>

    <div class="welcome-section">
        <div class="welcome-text">
            <h2 class="welcome-heading">My Courses</h2>
        </div>
    </div>    
    
    <div class="container">
        <div class="box-container">
            <?php
            // PHP code for fetching and displaying course data
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "coursehive";

            $connection = new mysqli($servername, $username, $password, $database);
            $sql = "SELECT c.course_id, c.course_title, c.course_description, c.course_img, m.start_date, m.end_date, m.completed FROM course c INNER JOIN my_courses m ON c.course_id = m.course_id";
            $result = mysqli_query($connection, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $completedClass = $row['completed'] == 1 ? 'completed' : '';
                    $completedButtonDisabled = $row['completed'] == 1 ? 'disabled' : '';
                    $certificateButtonDisabled = $row['completed'] == 1 ? '' : 'disabled';
                    $certificateButtonClass = $row['completed'] == 1 ? 'gold' : '';

                    echo "
                    <div class='box'>
                        <img src='" . $row['course_img'] . "' alt=''>
                        <h3>" . $row['course_title'] . "</h3>
                        <p>" . $row['course_description'] . "</p>
                        <button class='btn $completedClass'>Completed</button>
                        <button class='btn certificate-btn $completedButtonDisabled $certificateButtonClass'>View Certificate</button>
                    </div>";
                }
            } 
            else {
                echo "
                <div class='welcome-section'>
                <div class='welcome-text'>
                <p class='welcome-message'>No Courses Currently Registered.</p>
                </div>
                </div>
                ";
            }

            mysqli_close($connection);
            ?>
        </div>
    </div>

    <div id="modal" class="modal">
  <div class="modal-content">
    <h2>Congratulations on completing the course!</h2>
    <p>Your certificate will be downloaded shortly.</p>
  </div>
</div>



    <script>

function showModal() {
  var modal = document.getElementById('modal');
  modal.style.display = 'flex';
  
  setTimeout(function() {
    modal.style.display = 'none';
  }, 1500); // 1.5 seconds
}

        // JavaScript code for handling button clicks and certificate generation
        const certificateButtons = document.querySelectorAll('.certificate-btn');
        certificateButtons.forEach(button => {
            button.style.display = 'none'; // Hide the "View Certificate" button initially

            const completedButton = button.previousElementSibling; // Get the corresponding "Completed" button

            completedButton.addEventListener('click', () => {
                button.style.display = 'block'; // Display the "View Certificate" button when the "Completed" button is clicked
            });

            button.addEventListener('click', () => {
                if (button.classList.contains('disabled')) {
                    return;
                }

                showModal();

                const box = button.closest('.box');
                const courseTitle = box.querySelector('h3').textContent;
                const studentName = "student1"; // Replace this with the actual student name from database

                const certificateTemplate = `<!DOCTYPE html>
                <html>
                <head>
                    <title>Certificate Template</title>
                  <style>
                    @import url('https://fonts.googleapis.com/css?family=Open+Sans|Rock+Salt|Shadows+Into+Light|Cedarville+Cursive');
                    
                    body {
                      font-family: 'Open Sans', sans-serif;
                    }
                    
                    .certificate {
                      width: 800px;
                      height: 600px;
                      margin: 0 auto;
                      background-color: #eae6e6;
                      border: 10px solid #c7c100;
                      padding: 20px;
                      display: flex;
                      flex-direction: column;
                      justify-content: center;
                      align-items: center;
                      position: relative;
                    }
                    
                    .certificate h2 {
                      margin-top: 20px;
                      font-size: 28px;
                      font-family: 'Rock Salt', cursive;
                      color: #333;
                    }
                    
                    .certificate p {
                      font-size: 20px;
                      color: #555;
                      margin: 10px 0;
                    }
                    
                    .certificate .name {
                      font-size: 32px;
                      color: #000;
                      margin: 10px 0;
                      text-decoration: underline;
                    }
                    
                    .certificate .achievement {
                      font-size: 24px;
                      color: #444;
                      margin-bottom: 30px;
                    }
                    
                    .certificate .logo {
                      position: absolute;
                      top: 20px;
                      left: 20px;
                      width: 250px;
                      height: 250px;
                    }
                    
                    .certificate .signature {
                      position: absolute;
                      bottom: 20px;
                      right: 20px;
                      font-family: 'Cedarville Cursive', cursive;
                    }
                  </style>  
                      </head>
                <body>
                <div class="certificate">
                    <img class="logo" src="https://web-dev-app-assignment--virosshensivasa.repl.co/Login/img/MainLogo.png" alt="Logo">
                    <h2>COURSEHIVE</h2>
                    <h3>Certificate of Completion</h3>
                    <p>This certificate is presented to</p>
                    <p class="name">${studentName}</p>
                    <p class="achievement">For Completing the ${courseTitle} Course.</p>
                    <p class="signature">Signature: <u>Training Provider</u></p>
                  </div>

                </body>
                </html>`;

                const element = document.createElement('a');
                element.setAttribute('href', 'data:text/html;charset=utf-8,' + encodeURIComponent(certificateTemplate));
                element.setAttribute('download', 'certificate.html');
                element.style.display = 'none';
                document.body.appendChild(element);
                element.click();
                document.body.removeChild(element);
            });
        });
    </script>
</body>
</html>
