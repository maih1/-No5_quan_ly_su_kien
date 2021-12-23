<?php
    require_once "./app/common/ErrorValidate.php";
    class EventAddController extends Controller {
        public $add;
        protected $name, $slogan, $leader, $description, $avatar;

        // public $error = new ErrorValidate();
        public function __construct()
        {
            $this -> add = $this -> model('EventAddModel');
        }

        public function display() {

            $list_add = $this -> add -> getAdd();
            // print_r($list_add);
            $this->validate();
            $this -> view("EventAddInput", ['EventAddInput' => $list_add]);
        }

        public function validate() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $error = new ErrorValidate();
                $this->load($_POST); 

                if(empty($this -> name)) {
                    $error -> addError('name', 'Hãy nhập tên sự kiện');
                } elseif(strlen($this -> name) == 100) {
                    $error -> addError('name', 'Không nhập quá 100 ký tự');
                } else {
                    $_SESSION['name'] = $this->name;
                }

                if(empty($this -> slogan)) {
                    $error -> addError('slogan', 'Hãy nhập slogan');
                } elseif(strlen($this -> slogan) == 250) {
                    $error -> addError('slogan', 'Không nhập quá 250 ký tự');
                } else {
                    $_SESSION['slogan'] = $this->slogan;
                }

                if(empty($this -> leader)) {
                    $error -> addError('leader', 'Hãy nhập tên leader');
                } elseif(strlen($this -> leader) == 250) {
                    $error -> addError('leader', 'Không nhập quá 250 ký tự');
                } else {
                    $_SESSION['leader'] = $this->leader;
                }

                if(empty($this -> description)) {
                    $error -> addError('description', 'Hãy nhập mô tả chi tiết');
                } elseif(strlen($this -> description) == 1000) {
                    $error -> addError('description', 'Không nhập quá 1000 ký tự');
                } else {
                    $_SESSION['description'] = $this->description;
                }

                if(empty($this -> avatar)) {
                    $error -> addError('avatar', 'Hãy chọn avatar');
                } else {
                    $_SESSION['avatar'] = $this->avatar;
                }
                print_r($error);
                print($this -> avatar);
            }

        }

        public function load($data) {
            $this -> name = $this -> test_input($data['name']);
            $this -> slogan = $this -> test_input($data['slogan']);
            $this -> leader = $this -> test_input($data['leader']);
            $this -> description = $this -> test_input($data['description']);
            $this -> avatar = $this -> test_input($data['avatar']);
        }

        public function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
?>