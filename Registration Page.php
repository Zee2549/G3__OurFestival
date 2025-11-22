<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all-page.css">
    <link rel="stylesheet" href="css/registration-page.css">
    <link rel="icon" type="img/All%20Page/x-png" href="img/All%20Page/Our_Festival_logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="nav-bar">
    <a href="Homepage.html"><img src="img/All%20Page/Our_Festival_logo.png" alt="Our Festival logo" class="our-festival-logo"></a>

    <div class="hamburger-container">
        <button class="hamburger" id="hamburger-button">&#9776;</button>
    </div>

    <div class="nav" id="main-nav-links">
        <div><button class="close-btn" id="close-menu-button">&#x2715;</button></div>
        <div><a href="Homepage.html" class="nav-a">หน้าแรก</a>
            <a href="Registration Page.html" class="nav-a">ลงทะเบียน</a></div>
    </div>
</div>

<div class="registration-bg">
    <div class="registration-section">
        <div>
            <h2 class="registration-head">ลงทะเบียน</h2>
        </div>
        <div class="registration-form">
            <form action="/action_page.php">
                <label><b>ชื่อ-นามสกุล:</b></label><br>
                <input type="text" name="fullname" required placeholder=" Name Surname" class="input-box"><br><br>

                <label><b>อีเมล:</b></label><br>
                <input type="email" name="email" placeholder=" name@example.com" class="input-box" required><br><br>

                <label><b>เบอร์โทร:</b></label><br>
                <input type="tel" name="tel" placeholder=" 0XXXXXXXXXX" class="input-box" required maxlength="10" pattern="[0-9]{10}"><br><br>

                <label><b>เพศ:</b></label><br>
                <label><input type="radio" name="gender" value="male"> ชาย</label>
                <label><input type="radio" name="gender" value="female" class="radio">  หญิง</label>
                <label><input type="radio" name="gender" value="others" class="radio">  อื่นๆ</label><br><br>

                <label><b>ท่านเป็นนักศึกษามหาวิทยาลัยธรรมศาสตร์หรือไม่?</b></label><br>
                <label><input type="radio" name="thammasat_student" value="yes"> ใช่</label>
                <label><input type="radio" name="thammasat_student" value="no" class="radio">  ไม่ใช่ </label><br><br>

                <label><b>คณะ:</b>
                    <p>(หากท่านเป็นนักศึกษามหาวิทยาลัยธรรมศาสตร์)</p>
                </label><br>
                <select name="faculty" class="input-box">
                    <option value="" disabled selected hidden>กรุณาเลือกคณะ...</option>
                    <option>คณะนิติศาสตร์</option>
                    <option>คณะพาณิชยศาสตร์และการบัญชี</option>
                    <option>คณะรัฐศาสตร์</option>
                    <option>คณะเศรษฐศาสตร์</option>
                    <option>คณะสังคมสงเคราะห์ศาสตร์</option>
                    <option>คณะสังคมวิทยาและมานุษยวิทยา</option>
                    <option>คณะศิลปศาสตร์</option>
                    <option>คณะวารสารศาสตร์และสื่อสารมวลชน</option>
                    <option>คณะวิทยาศาสตร์และเทคโนโลยี</option>
                    <option>คณะวิศวกรรมศาสตร์</option>
                    <option>คณะสถาปัตยกรรมศาสตร์และการผังเมือง</option>
                    <option>คณะศิลปกรรมศาสตร์</option>
                    <option>คณะแพทยศาสตร์</option>
                    <option>คณะสหเวชศาสตร์</option>
                    <option>คณะทันตแพทยศาสตร์</option>
                    <option>คณะพยาบาลศาสตร์</option>
                    <option>คณะสาธารณสุขศาสตร์</option>
                    <option>คณะเภสัชศาสตร์</option>
                    <option>คณะวิทยาการเรียนรู้และศึกษาศาสตร์</option>
                </select><br><br>

                <label><input type="checkbox" name="newsletter"> อนุญาต</label>ให้ทำการเก็บข้อมูล<br>
                <label><input type="checkbox" name="newsletter"> อนุญาต</label>ให้ส่งสิทธิพิเศษสำหรับผู้ลงทะเบียนล่วงหน้า<br><br>

                <div style="display: flex;">
                    <button type="submit" class="registration-accept-btn">ยืนยัน</button>
                    <button type="reset" class="registration-reset-btn">รีเซ็ต</button>
                </div>

            </form>
        </div>
    </div>
</div>


<footer class="container-fluid bg-light py-3 border-top text-center">
    <p class="mb-0 text-dark">ส่วนติดต่อ</p>
</footer>

<script src="java-script/all-page.js"></script>

</body>
</html>


