<?php

class EventCommentController extends Controller {

    public $comments;
    public function __construct()
    {
        $this -> comments = $this -> model('EventCommentModel');
    }

    function display() {

        $list_comments = $this -> comments -> getComments();
        $this -> view("comments", ['comments' => $list_comments]);

    }
}
?>