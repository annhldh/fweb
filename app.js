const express = require('express');
const fs = require('fs');
const path = require('path');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

// Cài đặt body-parser để phân tích dữ liệu POST
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

// Phục vụ tệp HTML
app.use(express.static('public'));

// Xử lý dữ liệu gửi đến từ biểu mẫu
app.post('/submit', (req, res) => {
    const { name, link, tthn, gt, ques } = req.body;

    const data = 'Tên: ${name}, Giới tính: ${gt}\nTình trạng: ${tthn}\nLinkFB: ${link}\nCâu hỏi: ${ques}\n_____________________________________ \n';

    // Lưu dữ liệu vào tệp userdata.txt
    fs.appendFile(path.join(__dirname, 'userdata.txt'), data, (err) => {
        if (err) {
            console.error('Lỗi ghi tệp:', err);
            return res.status(500).send('Đã xảy ra lỗi khi lưu dữ liệu.');
        }
        res.send('Thông tin đã được lưu trữ thành công!');
    });
});

// Khởi động máy chủ
app.listen(port, () => {
    console.log('Server đang chạy tại http://localhost:${port}');
});
