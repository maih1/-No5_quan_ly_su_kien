# No5_quan_ly_su_kien
+ Chương trình đặt trong htdocs(htdocs/No5_quan_ly_su_kien)(Windows), hoặc var/www/html(var/www/html/No5_quan_ly_su_kien)(Linux).
+ Cấu trúc folder
    - app
        - common
        - controller
        - model
        - view
            - {tên từng phần}
    - web 
        - avatar
            - {tên từng phần}
                - {id - avatar}
                - tmp
                - ví dụ: web/avatar/event/id, web/avatar/event/tmp
                
        - css
        - image
        - js
    - index.php
        - Chương trình chỉ chạy ở file index.php
        - file index sẽ require các file controller để chạy chương trình


+ Quy tắc đặt tên:
    - Tên file đặt theo PascalCase
        - Ví dụ: EventAddModel.php, EventAddController.php
    - Tên hàm và phương thức sử dụng camelCase
        - Ví dụ: eventAddInput, eventAddCofirm
    - Do view của từng phần có thể nhiều hơn một trang, nên thêm một thư mục của file view
        - Ví dụ: view/event_add/

+ DB
    - servername = "localhost";
    - username = "root";
    - password = "";
    - dbname = "no5";

+ CSS & HTML
    - background button: #e4f6ff
    - border: 2px solid #97a8bc
    - text color : black
    - error color : red
    - font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif
    - padding input text : 12px 20px
    - font-size : 15px

+ PHP
    - Form search: là kiểu GET	
    - Form đăng ký/chỉnh sửa: là kiểu POST
    - Viết chương trình theo hướng cấu trúc (không sử dụng class)
    - Tên file controller mặc định chữ cuối là "Controller"
        - Ví dụ: EventAddController.php
    - url có dạng: http://localhost/No5_quan_ly_su_kien/TÊN FILE CONTROLLER/TÊN HÀM CHẠY TRONG FILECONTROLLER/ID
        - /ID có thể có hoặc không
        - Ví dụ: http://localhost/No5_quan_ly_su_kien/EventAdd/eventAddInput
