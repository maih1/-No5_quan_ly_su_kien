<?php

    require_once "./app/model/EventsModel.php";
    require_once "./app/model/EventCommentModel.php";

    function editComment($event_id, $comment_id) {
        $commentContents = getChosenComment($event_id, $comment_id);

        if(isset($_POST['submit'])) {
            $filename = $_FILES["file"]['name'];
            $tempname = $_FILES["file"]['tmp_name'];
            $targetDir = $_SERVER['DOCUMENT_ROOT'] . '/No5_quan_ly_su_kien/web/avatar/' . $event_id . '/';
            $targetFilePath = $targetDir . $filename;
            
            $content = $_POST['comment'];

            $validate = [];
            $validate['avatar'] = empty($filename) ? 'Hãy chọn avatar' : '';
            $validate['content'] = empty($content) ? 'Hãy nhập nội dung lịch trình' : '';
            $validate['contentLength'] = strlen($content) > 1000 ? 'Không nhập quá 1000 ký tự' : '';

            $checkValidate = 1;
			foreach ($validate as $key => $value) {
				if($value != '') {
					$checkValidate = 0;
					break;
				}
			}

            $inputData = ['', ''];
            if($checkValidate) {
                if(move_uploaded_file($tempname, $targetFilePath)) {
                    $result = editEventComment($event_id, $comment_id, $filename, $content);
                    if($result) {
                        unlink($targetDir . $commentContents['avatar']);
                    }
                }
            } else {
                $inputData[1] = $content;
            }
    
        }
        $eventName = getEventName($event_id);
        $listComments = getComments($event_id);

        
        require_once "./app/view/editComment.php";
    }
?>