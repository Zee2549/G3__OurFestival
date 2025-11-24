<?php
date_default_timezone_set('Asia/Bangkok');
$dataFile = 'feedback_data.json';

$records = [];
$resultMessage = "";

if (file_exists($dataFile)) {
    $records = json_decode(file_get_contents($dataFile), true) ?? [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $rating = trim($_POST['rating'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $timestamp = date("Y-m-d H:i:s");

    if ($name && $email && $rating) {
        $newEntry = [
            'timestamp' => $timestamp,
            'name' => $name,
            'email' => $email,
            'rating' => $rating,
            'message' => $message
        ];
        $records[] = $newEntry;
        file_put_contents($dataFile, json_encode($records, JSON_PRETTY_PRINT));

        $resultMessage = "<div class='success-box'>";
        $resultMessage .= "<h3>✅ บันทึกสำเร็จ!</h3>";
        $resultMessage .= "<b>ชื่อ:</b> " . htmlspecialchars($name) . "<br>";
        $resultMessage .= "<b>อีเมล:</b> " . htmlspecialchars($email) . "<br>";
        $resultMessage .= "<b>ระดับความพึงพอใจ:</b> " . htmlspecialchars($rating) . " ดาว<br>";
        $resultMessage .= "<b>ข้อความ:</b> " . htmlspecialchars($message);
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
    <title>Feedback</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all-page.css">
    <link rel="stylesheet" href="css/feedback-page.css?=v1">
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
    <div class="feedback-bg">
    <section class="feedback-section">
        <h2>แบบฟอร์มแสดงความคิดเห็น</h2>

        <form class="feedback-form" method="POST" action="">
            <label>ชื่อของคุณ:</label>
            <input type="text" name="name" placeholder="กรอกชื่อของคุณ" required>

            <label>อีเมล:</label>
            <input type="email" name="email" placeholder="example@email.com" required>

            <label>ระดับความพึงพอใจ:</label>
            <select id="rating" name="rating" required>
                <option value="">-- เลือกระดับความพึงพอใจ --</option>
                <option value="5">🌟🌟🌟🌟🌟</option>
                <option value="4">🌟🌟🌟🌟</option>
                <option value="3">🌟🌟🌟</option>
                <option value="2">🌟🌟</option>
                <option value="1">🌟</option>
            </select>

            <label>ข้อเสนอแนะเพิ่มเติม:</label>
            <textarea name="message" rows="5" placeholder="พิมพ์ความคิดเห็นของคุณที่นี่..."></textarea>

            <div class="feedback-btn-group">
                <button type="submit" class="feedback-submit">ส่งความคิดเห็น</button>
            </div>

            <div class="link-to-feedback-summary">
                <a href="Feedback%20Summary.php" class="link-to-feedback-summary-text">ดูความคิดเห็นทั้งหมด</a>
            </div>
        </form>

        
        <?php echo $resultMessage; ?>

    </section>
    </div>

<footer class="container-fluid bg-light py-3 border-top text-center">
    <h1 class="mb-0" style="color: black;">ส่วนติดต่อ</h1>
    <p class="mb-0" style="color: black;">Cheewathep.par@dome.tu.ac.th</p>
</footer>
<script src="java-script/all-page.js"></script>
</body>
</html>