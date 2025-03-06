<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center"><b>COURSE OFFERING AND GRADING WEBAPP</b></p>

### Tổng quát

Đây là một dự án CRUD nhỏ sử dụng Laravel, một khuôn khổ mạnh mẽ dựa trên PHP.
Trong dự án này, tôi tập trung vào việc xây dựng một trang web giáo dục, cho phép giáo viên cung cấp các khóa học, học sinh có thể tham gia và rời đi nếu muốn, đây là một dự án đơn giản đầy đủ chức năng CRUD để làm quen với laravel và cách triển khai chúng trên môi trường thực tế 

Đây là tên miền mà tôi đã triển khai: http://vietnamurbanmanagement.online





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

![Screenshot 2025-03-07 050536](https://hackmd.io/_uploads/SJ8C2qPi1e.png)


Gồm 3 thực thể: Giáo viên, học sinh, khóa học. Trong đó:
Giáo viên có thể có nhiều khóa học
Mỗi khóa học chỉ có 1 giáo viên 
Học sinh có nhiều khóa học
Khóa học có nhiều học sinh



### Cách trang web triển khai lên mạng công khai

B1: Đăng kí https://console.aiven.io/ để tạo cơ sở dữ liệu đám mây 
    Cấu hình .env:
    
    DB_CONNECTION=your_connect_aivencloud.com
    DB_HOST=127.0.0.1
    DB_PORT= your_port(XXXX)
    DB_DATABASE=your_database
    DB_USERNAME= your_DB_USERNAME
    DB_PASSWORD= your_DB_PASSWORD

B2: Đăng kí https://account.godaddy.com/ để thuê domain
    Lựa chọn tên domain phù hợp.

B3: Chuẩn bị 1 sever có địa chỉ ip công cộng tĩnh (Virtual Private Server) 
    Tải dự án về máy chủ: ```git clone https://github.com/ElonPeo/edutrack.git```
    Tạo khóa ứng dụng: ``` php artisan key:generate```
    Chuẩn bị cơ sở dữ liệu: ``` php artisan migrate```
    
B4: Cài đặt môi trường apache trên máy chủ:
    Sửa nội dung file:``` C:\xampp\apache\conf\extra\httpd-vhosts.conf ```
    
    <VirtualHost *:80>
    ServerAdmin admin@your_domain.site
    DocumentRoot "C:/xampp/htdocs/ten_du_an/public"
    ServerName your_domain.site
    ServerAlias www.your_domain.site
    <Directory "C:/xampp/htdocs/ten_du_an/public">
        AllowOverride All
        Require all granted
        </Directory>
    </VirtualHost>
B5: Cấu hình host:
    Tìm đến file: ```  C:\Windows\System32\drivers\etc\hosts ```
    Thêm dòng mới: ```  127.0.0.1 your_domain.site ```
    Khởi động lại Apache.

B6: Trỏ static ip của sever tới Domain Name System 
    Thêm bản ghi mới: 
    
    Type: A
    Host: @
    Value: XX.XXX.XXX.XXX (static ip của sever)
    TTL: 600 (Thời gian lan truyền tiên miền có hiệu lực)

B7: Truy cập website của bạn và kiểm thử.
    


### Project's screeshots

#### Trang mở đầu 
![Screenshot 2025-03-07 054510](https://hackmd.io/_uploads/SyxAriwoke.png)
#### Đăng nhập
![image](https://hackmd.io/_uploads/r1te8swsJe.png)
#### Đăng kí
![image](https://hackmd.io/_uploads/SJ07UoPo1e.png)
#### Hiển thị khóa học (teacher)
![Screenshot 2025-03-07 054915](https://hackmd.io/_uploads/SJxqj8jwjyl.png)
#### Thêm khóa học mới 
![Screenshot 2025-03-07 055115](https://hackmd.io/_uploads/B1XEPsDokx.png)
#### Sửa thông tin khóa học 
![Screenshot 2025-03-07 055300](https://hackmd.io/_uploads/By2uDiPoJl.png)
#### Hiển thị thông tin người đăng nhập, xóa, sửa thông tin tài khoản
![Screenshot 2025-03-07 055418](https://hackmd.io/_uploads/HJGpDjwoye.png)
#### Đổi mật khẩu
![Screenshot 2025-03-07 055621](https://hackmd.io/_uploads/SJ-NOowjkg.png)
#### Giao diện tham gia và rời khóa học(student)
![image](https://hackmd.io/_uploads/r1oYdsPoJg.png)



