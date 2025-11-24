<?php
date_default_timezone_set('Asia/Bangkok');
$dataFile = 'registration_data.json';

$records = [];
$resultMessage = "";

if (file_exists($dataFile)) {
    $records = json_decode(file_get_contents($dataFile), true) ?? [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = trim($_POST['fullname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $tel = trim($_POST['tel'] ?? '');
    $gender = trim($_POST['gender'] ?? '');
    $is_student = trim($_POST['thammasat_student'] ?? '');
    $faculty = trim($_POST['faculty'] ?? '');

    $consent_data = isset($_POST['consent_data']) ? 'Yes' : 'No';
    $consent_news = isset($_POST['consent_news']) ? 'Yes' : 'No';

    $timestamp = date("Y-m-d H:i:s");

    if ($fullname && $email && $tel && $gender && $is_student) {
        $newEntry = [
            'timestamp' => $timestamp,
            'fullname' => $fullname,
            'email' => $email,
            'tel' => $tel,
            'gender' => $gender,
            'is_student' => $is_student,
            'faculty' => $faculty,
            'consent_data' => $consent_data,
            'consent_news' => $consent_news
        ];

        $records[] = $newEntry;
        file_put_contents($dataFile, json_encode($records, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        $resultMessage = "<div class='success-box'>";
        $resultMessage .= "<h3>✅ ลงทะเบียนสำเร็จ!</h3>";
        $resultMessage .= "<b>ชื่อ:</b> " . htmlspecialchars($fullname) . "<br>";
        $resultMessage .= "<b>อีเมล:</b> " . htmlspecialchars($email) . "<br>";
        $resultMessage .= "<b>สถานะ:</b> " . ($is_student == 'yes' ? 'นักศึกษา มธ.' : 'บุคคลทั่วไป') . "<br>";

        if (!empty($faculty)) {
            $resultMessage .= "<b>คณะ:</b> " . htmlspecialchars($faculty) . "<br>";
        }

        $resultMessage .= "</div>";
    } else {
        $resultMessage = "<div class='error-box'>❌ กรุณากรอกข้อมูลให้ครบถ้วน</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="th">

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
                <a href="Registration Page.php" class="nav-a">ลงทะเบียน</a>
            </div>
        </div>
    </div>

    <div class="registration-bg">
        <div class="registration-section">
            <div>
                <h1 class="registration-head">ลงทะเบียน</h1>
            </div>
            <div class="registration-form">
                <form action="" method="post">
                    <label><b>ชื่อ-นามสกุล:</b></label><br>
                    <input type="text" name="fullname" required placeholder=" Name Surname" class="input-box"><br><br>

                    <label><b>อีเมล:</b></label><br>
                    <input type="email" name="email" placeholder=" name@example.com" class="input-box" required><br><br>

                    <label><b>เบอร์โทร:</b></label><br>
                    <input type="tel" name="tel" placeholder=" 0XXXXXXXXXX" class="input-box" required maxlength="10" pattern="[0-9]{10}"><br><br>

                    <label><b>เพศ:</b></label><br>
                    <label><input type="radio" name="gender" value="male" required> ชาย</label>
                    <label><input type="radio" name="gender" value="female" class="radio"> หญิง</label>
                    <label><input type="radio" name="gender" value="others" class="radio"> อื่นๆ</label><br><br>

                    <label><b>ท่านเป็นนักศึกษามหาวิทยาลัยธรรมศาสตร์หรือไม่?</b></label><br>
                    <label><input type="radio" name="thammasat_student" value="yes" required> ใช่</label>
                    <label><input type="radio" name="thammasat_student" value="no" class="radio"> ไม่ใช่ </label><br><br>

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

                    <label><input type="checkbox" name="consent_data"> อนุญาต</label>ให้ทำการเก็บข้อมูล<br>
                    <label><input type="checkbox" name="consent_news"> อนุญาต</label>ให้ส่งสิทธิพิเศษสำหรับผู้ลงทะเบียนล่วงหน้า<br><br>

                    <div class="registration-btn-container">
                        <button type="submit" class="registration-accept-btn">ยืนยัน</button>
                        <button type="button" class="registration-reset-btn" onclick="window.location.href='Registration Page.php'">รีเซ็ต</button>
                    </div>

                    <div class="link-to-regis-summary">
                        <a href="Registration%20Summary.php" class="link-to-regis-summary-text">ดูข้อมูลผู้เข้าร่วมงานทั้งหมด</a>
                    </div>
                </form>
            </div>

            <?php echo $resultMessage; ?>

        </div>
    </div>


    <footer class="container-fluid bg-light py-3 border-top text-center">
        <p class="mb-0 text-dark">ส่วนติดต่อ</p>
    </footer>

    <script src="java-script/all-page.js"></script>

</body>

</html>