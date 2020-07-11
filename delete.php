<?php
require('./require.php');

class Delete
{
    function __construct()
    {
        $this->delete();
    }

    private function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            Contacts::deleteById($id);
            header("Location: " . Constants::REDIRECT_INDEX . "&message=" . Constants::DELETE_SUCESS);
        } else {
            header("Location: " . Constants::REDIRECT_NOT_FOUND . "?message=" . Constants::INFO_NOT_FOUND);
        }
    }
}

$delete_page = new Delete();
