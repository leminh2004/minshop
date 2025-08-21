<?php

class AdminCommentController
{
    protected $modelComment;

    public function __construct()
    {
        $this->modelComment = new AdminComment();
    }

    public function show()
    {
        $comments = $this->modelComment->all();
        require_once "./views/admin/comments/listCMT.php";
    }

    public function find()
    {
        $id = $_GET['id'];
        // var_dump($id);die;
        $cmt = $this->modelComment->find($id);
        require_once "./views/admin/comments/detailCMT.php";
    }

    public function formActive()
    {
        $id = $_GET['id'];
        $cmt = $this->modelComment->find($id);
        require_once "./views/admin/comments/updateActiveCMT.php";
    }

    public function postActive()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id'];
            $active = $_POST['active'];
            $this->modelComment->update($id, $active);
            header('Location:' . BASE_URL . '?act=admin/binh-luan');
        }
    }

}
