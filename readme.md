# Eployee-Directory

***github repository:***  [https://github.com/livisun999/Employee-Directory](https://github.com/livisun999/Employee-Directory)

**Employee-directry** là một ứng dụng web phất triển trên  framework  ```laravel 5.2```. đây là một ứng dụng quản lý nhân  sự  cho  các  doanh nghiệp hặc các tổ chức vừa và nhỏ với số lượng nhân sự không quá nhiều.
## thông tin
- nhóm: ```MVH  K58-CB```

- môn:  ```phát triển ứng dụng web```

- lớp: ```INT3306 2```

- giảng viên: ```Lê Đình Thanh```

- học kỳ: ```Kỳ năm học 2015 - 2016```
    
## Nhóm phát triển

danh sách thành viên ```MVH K58-CB``` team:

| stt   |    thành viên     | lớp     | vai trò   | ghi chú       |
|:-----:|:----------------: |-------- |---------  |-------------  |
| 1     |   Lục Văn Minh    | K58-CB  | DEV       | nhóm trưởng   |
| 2     | Nguyễn Như Vương  | K58-CB  | DEV       | thành viên    |
| 3     |  Đinh Xuân Hưng   | K58-CB  | QA        | thành viên    |

## các chức năng
- **quản trị viên**
    - thêm quản trị viên
    - sủa thông tin quản trị viên
    - thay đổi ảnh đại diện
    - đăng nhập 
    - đăng xuất
    - xóa quản trị viên
- **phòng ban**
    - thêm mới phòng ban
    - xem danh sách phòng ban
    - xem thông tin phòng ban
    - xem danh sách nhân viên của phòng ban
    - sửa thông tin phòng ban
    - xóa phòng ban
- **nhân viên**
   - thêm mới nhân viên 
   - đặt ảnh nhân vien
   - xem danh sách nhân viên
   - sửa thông tin, ảnh đại diện 
   - tìm kiếm nhân viên
   - xóa nhân viên
   

## Yêu cầu phi chức năng
#### 1. giao diện
-  giao diện sán, thân thiện
#### 2. Bảo mật
- mật khẩu người dùng được mã hóa
- các tác vụ yêu cầu xác thực, được các  thực  phiên đăng nhập trước khi  thực hiện 
#### 3. data validate
- tất cả data gửi lên đều phải qua  modul validate  để kiểm tra 
##  Hướng Dẫn:
  - Khi clone ve: truoc tien can chay lenh: sudo composer install (tren ubuntu, MacOs)
                                            composer install (windows)
    Tren ubuntu va MacOs thi can phan quyen truy cap cho cac thu muc "Storage", "resources" ,public/uploads ,va "bootstrap"
  - Tao 1 co so du lieu moi voi ten la "demo_laravel".
  - chinh sua lai cau hinh truy cap tai config/database.php  : 'host' => env('DB_HOST', '127.0.0.1'),
                                                               'port': so cong ma apache dang chay
                                                               'database': ten CSDL ban vua tao luc truoc (demo_laravel).
                                                               'username': username cua ban tren CSDL (default la root)
                                                               'password': password cua ban tren CSDL (default la '' )

  - Tao bang CSDL chay lenh: php artisan migrate
  - Tao data trong CSDL chay lenh: php artisan db:seed


  tren trinh duyet: chay duong dan: localhost/Employee-Directory => trang chu
