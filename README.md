# No5_quan_ly_su_kien

+ Quy tắc đặt tên:
    - Tên file đặt theo PascalCase
        - Ví dụ: EventAddModel, EventAddController
    - Tên hàm và phương thức sử dụng camelCase
        - Ví dụ: eventAddInput, eventAddCofirm
    - Do view của từng phần có thể nhiều hơn một trang, nên thêm một thư mục của file view
        - Ví dụ: view/evnetadd/

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
    - validate: hiển thị phía trên phần nội dung kiểm tra validate

+ PHP
    - Form search: là kiểu GET	
    - Form đăng ký/chỉnh sửa: là kiểu POST
    - Viết chương trình theo hướng cấu trúc (không sử dụng class)
    - Tên file controller mặc định chữ cuối là "Controller"
        - Ví dụ: EventAddController.php
    - url có dạng: http://localhost/'TÊN THƯ MỤC CHỨA CHƯƠNG TRÌNH TRONG htdocs'/TÊN FILE CONTROLLER/TÊN HÀM CHẠY TRONG FILECONTROLLER/ID
        - /ID có thể có hoặc không
        - Ví dụ: http://localhost/web/No5_quan_ly_su_kien/EventAdd/eventAddInput