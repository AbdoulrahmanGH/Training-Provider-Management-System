<?php
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

/* Confirmation modal */
.confirmation-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 999;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease-in-out;
}

.confirmation-modal.active {
    opacity: 1;
    pointer-events: auto;
}

.confirmation-modal .modal-content {
    background-color: #fff;
    max-width: 400px;
    padding: 20px;
    text-align: center;
    border-radius: 10px;
}

.confirmation-modal .modal-content h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

.confirmation-modal .modal-content .buttons {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.confirmation-modal .modal-content .buttons button {
    padding: 10px 20px;
    margin: 0 5px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

.confirmation-modal .modal-content .buttons .confirm-btn {
    background-color: #6ab04c;
    color: #fff;
}

.confirmation-modal .modal-content .buttons .cancel-btn {
    background-color: #d54949;
    color: #fff;
}	
.success-popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 999;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease-in-out;
}

.success-popup.active {
    opacity: 1;
    pointer-events: auto;
}

.success-popup .popup-content {
    background-color: #fff;
    max-width: 400px;
    padding: 20px;
    text-align: center;
    border-radius: 10px;
}

.success-popup .popup-content h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

.success-popup .popup-content p {
    font-size: 16px;
    margin-bottom: 20px;
}

</style>
</head>
<body>
    <div class="welcome-section">
        <div class="welcome-text">
            <h2 class="welcome-heading">Available Courses</h2>
        </div>
    </div>

    <div class="container">
        <div class="box-container">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "coursehive";

            $connection = new mysqli($servername, $username, $password, $database);
            $sql = "SELECT * FROM course WHERE course_id NOT IN (SELECT course_id FROM my_courses)";
            $result = mysqli_query($connection, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <div class='box'>
                        <img src='" . $row['course_img'] . "' alt=''>
                        <h3>" . $row['course_title'] . "</h3>
                        <p>" . $row['course_description'] . "</p>
                        <button class='btn enroll-btn' onclick='showConfirmationModal(" . $row['course_id'] . ")'>Enroll Now</button>
                    </div>";
                }
            } else {
                echo "
                <div class='welcome-section'>
                <div class='welcome-text'>
                <p class='welcome-message'>No Courses Currently Avaliable.</p>
                </div>
                </div>
                ";
            }

            mysqli_close($connection);
            ?>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div class="confirmation-modal" id="confirmationModal">
        <div class="modal-content">
            <h2>Confirm Enrollment</h2>
            <p>Are you sure you want to enroll in this course?</p>
            <div class="buttons">
                <button class="confirm-btn" onclick="enrollCourse()">Yes</button>
                <button class="cancel-btn" onclick="hideConfirmationModal()">No</button>
            </div>
        </div>
    </div>

 <!-- Success Popup -->
<div class="success-popup" id="successPopup">
    <div class="popup-content">
        <h2>Successfully Enrolled!</h2>
        <p id="successCourseTitle"></p>
    </div>
</div>

<script>
    let enrollCourseId;

    function showConfirmationModal(courseId) {
        const modal = document.getElementById('confirmationModal');
        modal.classList.add('active');
        enrollCourseId = courseId;
    }

    function hideConfirmationModal() {
        const modal = document.getElementById('confirmationModal');
        modal.classList.remove('active');
    }

    function enrollCourse() {
        // Send AJAX request to enroll the course
        const courseId = enrollCourseId;
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'enroll-course.php?courseId=' + courseId, true);
        xhr.onload = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Enrollment successful, show success popup
                    const successCourseTitle = document.getElementById('successCourseTitle');
                    successCourseTitle.innerText = ""; // Replace with the actual course title
                    const successPopup = document.getElementById('successPopup');
                    successPopup.classList.add('active');

                    // Hide the popup and confirmation modal after 3 seconds (3000 milliseconds)
                    setTimeout(function () {
                        successPopup.classList.remove('active');
                        hideConfirmationModal();
                        location.reload();

                    }, 1000);
                } else {
                    // Error occurred during enrollment
                    alert('Error occurred during enrollment.');
                }
            }
        };
        xhr.send();
    }
</script>


</body>
</html>