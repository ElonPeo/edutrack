---
title: '#EduTrack'

---

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center"><b>COURSE OFFERING AND GRADING WEBAPP</b></p>

### Tổng quát

Đây là một dự án CRUD nhỏ sử dụng Laravel, một khuôn khổ mạnh mẽ dựa trên PHP.
Trong dự án này, tôi tập trung vào việc xây dựng một trang web giáo dục, cho phép giáo viên cung cấp các khóa học cho sinh viên và cũng cho điểm sinh viên của mình.
Sinh viên có thể đăng ký bất kỳ khóa học nào do giáo sư cung cấp và họ có thể xem bảng điểm cho khóa học tương ứng.

Here is the deployment of this project: [Course Offering]





#### Đối với giáo viên

1. Quản lý tài khoản:
    - Tạo tài khoản
    - Đăng nhập, đăng xuất
    - Xóa tài khoản

2. Quản lý khóa học:
    - Thêm mới khóa học
    - Xóa khóa học đã có 
    - Sửa khóa học

3. Chấm điểm:
    - Chấm điểm cho từng học sinh
    - Chấm điểm cho tất cả học sinh

#### Dối với học sinh

1. Quản lý tài khoản:
    - Tạo tài khoản
    - Đăng nhập, đăng xuất
    - Xóa tài khoản

2. Quản lý khóa học:
    - Hiển thị khóa học đang có
    - Hiển thị khóa học đã tham gia
    - Tham gia khóa học
    - Rời khóa học



### Sơ đồ Use-case

![Screenshot 2025-02-28 103248](https://hackmd.io/_uploads/r11kJ3R51l.png)

Gồm 3 nhóm chức năng chính: 
1.1 Nhóm chức năng xác thực
1.2 Tham gia khóa học 
1.3 Thêm sửa xóa khóa học

## Cấu hình cơ sở dữ liệu
### Mô hình quan hệ thực thể
![Screenshot 2025-02-28 100420](https://hackmd.io/_uploads/HkXTuiC9Je.png)

Gồm 3 thực thể: Giáo viên, học sinh, khóa học. Trong đó:
Giáo viên có thể có nhiều khóa học
Mỗi khóa học chỉ có 1 giáo viên 
Học sinh có nhiều khóa học
Khóa học có nhiều học sinh



### Cách trang web triển khai lên mạng công khai

Để Triển khai cần chuẩn bị các công cụ:


B1: Đăng kí https://console.aiven.io/ để tạo cơ sở dữ liệu đám mây 
    Cấu hình .env
    DB_CONNECTION=mysql-c7b1f37-bohaohieu2-87d3.h.aivencloud.com
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=root
    DB_PASSWORD=
B2: Chuẩn bị 1 máy chủ có địa chỉ ip công cộng tĩnh (Virtual Private Server)
    - Cài đặt môi trường trên máy chủ 
    - Tải và cài đặt xampp
    - Cấu hình apache
    

B2: Chuẩn bị 1 tên miền 
    - Thuê 1 tên miền trên godaddy
    - Vd: edutrack.site
    - Trỏ ip máy chủ tới tên miền 


### Project's screeshots
