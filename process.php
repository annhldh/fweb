<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form và làm sạch dữ liệu
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : 'Không cung cấp';
    $link = isset($_POST['link']) ? htmlspecialchars($_POST['link']) : 'Không cung cấp';
    $tthn = isset($_POST['tthn']) ? htmlspecialchars($_POST['tthn']) : 'Không cung cấp';
    $gt = isset($_POST['gt']) ? htmlspecialchars($_POST['gt']) : 'Không cung cấp';
    $question = isset($_POST['question']) ? htmlspecialchars($_POST['question']) : 'Không cung cấp';

    // Định dạng dữ liệu để lưu vào tệp tin
    $data = "Tên: " . $name . "\n" . 
            "Giới tính: " . $gt . "\n" . 
            "Tình trạng: " . $tthn . "\n" . 
            "Link FB: " . $link . "\n" . 
            "Câu hỏi: " . $question . "\n" . 
            "-----------------------\n"; // Thêm dấu phân cách để dễ đọc

    // Lưu dữ liệu vào tệp tin
    $file = fopen("userdata.txt", "a");
    if ($file) {
        fwrite($file, $data);
        fclose($file);
        echo "Thông tin đã được lưu trữ thành công!";
    } else {
        echo "Không thể mở tệp tin để lưu trữ dữ liệu.";
    }
}
?>
