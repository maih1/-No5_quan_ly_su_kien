# No5_quan_ly_su_kien

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
        - Ví dụ: view/evnet_add/

+ DB
    - servername = "localhost";
    - username = "root";
    - password = "";
    - dbname = "no5";

+ CSS & HTML
    - border form: 2px solid #385D8A
    - input:
        - background-color: #e4f6ff;
        - border:1px solid #385D8A; 
    - button submit: 
        - background-color: #4f81bd;
        - border:2px solid #385D8A;
    - button khác:
        - background-color: #4f81bdc2;
        - border:1px solid #385D8A;
    - text color : black
    - text color button: white
    - error color : red
    - font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif
    - padding input text : 12px 20px
    - font-size : 15px
    - validate: hiển thị phía trên phần nội dung kiểm tra validate
    - textarea: resize: none

+ PHP
    - Form search: là kiểu GET	
    - Form đăng ký/chỉnh sửa: là kiểu POST
    - Viết chương trình theo hướng cấu trúc (không sử dụng class)
    - Tên file controller mặc định chữ cuối là "Controller"
        - Ví dụ: EventAddController.php
    - url có dạng: http://localhost/No5_quan_ly_su_kien/TÊN FILE CONTROLLER/TÊN HÀM CHẠY TRONG FILECONTROLLER/ID
        - /ID có thể có hoặc không
        - Ví dụ: http://localhost/No5_quan_ly_su_kien/EventAdd/eventAddInput