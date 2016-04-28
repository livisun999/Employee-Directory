
===============================================================================================================================================================

                                                        Employee-Derectory

===============================================================================================================================================================

 Thanh vien:    1) DEV: Luc Van Minh (NT)
                2) DEV: Nguyen Nhu Vuong
                3) QA : Dinh Xuan Hung


 Huong dan:
  - Khi clone ve: truoc tien can chay lenh: sudo composer install (tren ubuntu, MacOs)
                                            composer install (windows)
    Tren ubuntu va MacOs thi can phan quyen truy cap cho cac thu muc "Storage", "resources" va "bootstrap"
  - Tao 1 co so du lieu moi voi ten la "demo_laravel".
  - chinh sua lai cau hinh truy cap tai config/database.php  : 'host' => env('DB_HOST', '127.0.0.1'),
                                                               'port': so cong ma apache dang chay
                                                               'database': ten CSDL ban vua tao luc truoc (demo_laravel).
                                                               'username': username cua ban tren CSDL (default la root)
                                                               'password': password cua ban tren CSDL (default la '' )

  - Tao bang CSDL chay lenh: php artisan migrate
  - Tao data trong CSDL chay lenh: php artisan db:seed


    ------------------------------------------------------------------------------------------

  tren trinh duyet: chay duong dan: localhost/Employee-Directory => trang chu
