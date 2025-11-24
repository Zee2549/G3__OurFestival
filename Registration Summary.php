<?php
date_default_timezone_set('Asia/Bangkok');
$dataFile = 'registration_data.json';

$records = [];
if (file_exists($dataFile)) {
    $jsonContent = file_get_contents($dataFile);
    $records = json_decode($jsonContent, true) ?? [];
}

$total_registrations = count($records);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Summary</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all-page.css">
    <link rel="stylesheet" href="css/all-summary-page.css">
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
                <a href="Registration Page.php" class="nav-a">ลงทะเบียน</a></div>
        </div>
    </div>

    <div class="registration-summary-section">
        <div>
            <h1 class="registration-summary-header">Registration Summary</h1>
        </div>
        <div>
            <h3 class="registration-summary-sub-header">ผู้ที่ลงทะเบียนเข้าร่วมงาน (<?php echo $total_registrations; ?> คน)</h3>
        </div>

        <?php if ($total_registrations > 0): ?>
            <?php 
            $reversed_records = array_reverse($records);
            foreach ($reversed_records as $data): 
            ?>
                <div class="registration-info">
                    <p>
                        <b>ชื่อ: </b> <?php echo htmlspecialchars($data['fullname']); ?><br>
                        <b>อีเมล: </b> <?php echo htmlspecialchars($data['email']); ?><br>
                        <b>เบอร์โทร: </b> <?php echo htmlspecialchars($data['tel']); ?><br>
                        <b>เพศ: </b> <?php echo htmlspecialchars($data['gender']); ?><br>
                        <b>สถานะการเป็นนักศึกษา: </b> <?php echo htmlspecialchars($data['is_student']); ?><br>
                        <b>คณะ: </b> <?php echo htmlspecialchars($data['faculty']); ?><br>
                        <span style="font-size: 0.8em; color: #888;">(เวลา: <?php echo htmlspecialchars($data['timestamp']); ?>)</span>
                    </p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="registration-info" style="text-align: center; color: #999;">
                <p>ยังไม่มีข้อมูลการลงทะเบียน</p>
            </div>
        <?php endif; ?>
    </div>


    <footer class="container-fluid bg-light py-3 border-top text-center">
        <p class="mb-0" style="color: black;">ส่วนติดต่อ</p>
        <p class="mb-0" style="color: black;">Cheewathep.par@dome.tu.ac.th</p>
    </footer>

<script src="java-script/all-page.js"></script>

</body>
</html>