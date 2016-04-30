# Eployee-Directory

***github repository:***  [https://github.com/livisun999/Employee-Directory](https://github.com/livisun999/Employee-Directory)

**Employee-directry** là một ứng dụng web phất triển trên  framework  ```laravel 5.2```. đây là một ứng dụng quản lý nhân  sự  cho  các  doanh nghiệp hặc các tổ chức vừa và nhỏ với số lượng nhân sự không quá nhiều.

## thông tin

- nhóm: ```MVH  K58-CB```   
- môn:  ```phát triển ứng dụng web```   
- lớp: ```INT3306 2```  
- giảng viên: ```Lê Đình Thanh```   
- trường: ```ĐH Công Nghệ - ĐHQGHN```
- học kỳ: ```Kỳ 1 năm học 2015 - 2016```

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
   
## mô tả hệ thống

## Yêu cầu phi chức năng

#### 1. giao diện

-  giao diện sán, thân thiện

#### 2. Bảo mật

- mật khẩu người dùng được mã hóa
- các tác vụ yêu cầu xác thực, được các  thực  phiên đăng nhập trước khi  thực hiện 

#### 3. data validate

- tất cả data gửi lên đều phải qua  modul validate  để kiểm tra 


##  Hướng Dẫn:
#### 1. cài đặt
 - clone repo về thư mục gốc của apache (có thể là www hoặc htdocs) bằng lệnh:  
 ```
git clone https://github.com/livisun999/Employee-Directory.git
```

- để tải các dependencies chạy lệnh: 
    - trên linux và macos:
    ```sudo composer install```
    - trên windows:
    ```composer install```

- trên linux và macos bạn phải cấp quền ghi cho các thư mục:    
```Storage```, ```resources``` , ```public/uploads/profile_img```, ```public/uploads/admin_img``` ,và ```bootstrap```

- tạo cơ sở dữ liệu (csld) mới tên là "demo_laravel".

- chỉnh sửa lại cấu hình trong file "config/database.php":  
    - 'host' => env('DB_HOST', '127.0.0.1'),   
    - 'port': cổng mysql   
    - 'database': tên csld vừa tạo (demo_laravel). 
    - 'username': username của bạn trên CSDL (default là root) 
    - 'password': password của bạn trên CSDL (default là '' )  

- khởi tại csql bằng lệnh: ```php artisan migrate```
- tại dữ liệu mẫu bằng lệnh: ```php artisan db:seed```

- trên trình duyệt gõ đường dẫn: ```localhost/Employee-Director```
  
#### 2. đăng nhập 
tài khoản admin mặc định: ***admin1***  
mát khẩu admin mặc định: ***admin1*** 

## licence

đây vẫn là một sản phẩm đang trong qúa trình phát triển, một số chức năng vẫn còn thiếu sót. sản phẩm này chỉ mang ý nghĩa nghiên cứu và tìm hiểu về Ứng dúng web cũng như framework ```laravel 5.2```.

với mục đích phi lợi nhuận và phi thương mại mọi cá nhân tổ chức đều có toàn quền sử dụng mã nguồn này cho mục đích học tập và nghên cứu.

chúng tôi không chịu trách nhiệm cho bất cứ thiệt hại nào liên quan đến sản phầm này cho mọi mục đích ngoài học tập nghiên cứu.

## liên hệ

mọi thắc mắc, góp ý xin gửi về theo địa chỉ luk.mink@gmail.com  
hoặc đặt câu hỏi trong phần github issues.

chúng tôi rất sẵn lòng giải đáp.

