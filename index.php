<?php
require('./require.php');

class Index
{
    function __construct()
    {
        $this->render();
    }

    private function render()
    {
        $query_page = 1;
        $query_message = "";

        if (isset($_GET['page'])) {
            $query_page = $_GET['page'];
        }
        if (isset($_GET['message'])) {
            $query_message = $_GET['message'];
        }

        $input['page'] = (int) $query_page === 0 ? 1 : $query_page;
        $input['limit'] = 1;
        $input['pagination_url'] = Constants::INDEX_PAGE . "?page=";

        $data['data'] = Contacts::fetchAll($input);

        $data['data']['delete_sucess'] = FALSE;
        if ($query_message == Constants::DELETE_SUCESS) {
            $data['data']['delete_sucess'] = TRUE;
        }
        if ($query_message == Constants::UPDATE_SUCCESS) {
            $data['data']['update_success'] = TRUE;
        }
        if ($query_message == Constants::CREATE_SUCCESS) {
            $data['data']['create_success'] = TRUE;
        }
        if ($query_message == Constants::INFO_NOT_FOUND) {
            $data['data']['INFO_NOT_FOUND'] = TRUE;
        }

        $data['data']['update_url'] = str_replace("index.php", "", $_SERVER["SCRIPT_NAME"]) . "update.php?id=";
        $data['data']['delete_url'] = str_replace("index.php", "", $_SERVER["SCRIPT_NAME"]) . "delete.php?id=";
        $data['data']['create_url'] = str_replace("index.php", "", $_SERVER["SCRIPT_NAME"]) . "create.php";

        BuildPage::layoutSetData($data);
        BuildPage::requireLayout("header");
        BuildPage::requireMainContent("index");
        BuildPage::requireLayout("pagination_links");
        BuildPage::requireLayout("footer");
    }
}

$page = new Index();
