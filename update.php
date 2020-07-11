<?php
require('./require.php');

class Update
{
    function __construct()
    {
        $this->renderUpdatePage();
    }

    private function renderUpdatePage()
    {
        $id = 0;

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data['data'] = NULL;
            $data['data'] = Contacts::fetchOneById($id);
            $data['data']['result'] = "";
            $data['data']['MIN_CHAR_LIMIT'] = Constants::MIN_CHAR_LIMIT;
            $data['data']['MAX_CHAR_LIMIT'] = Constants::MAX_CHAR_LIMIT;
            $data['data']['MIN_CHAR_LIMIT_NUMBER'] = Constants::MIN_CHAR_LIMIT_NUMBER;
            $data['data']['MAX_CHAR_LIMIT_NUMBER'] = Constants::MAX_CHAR_LIMIT_NUMBER;
            $data['data']['MIN_CHAR_LIMIT_EMAIL'] = Constants::MIN_CHAR_LIMIT_EMAIL;
            $data['data']['MAX_CHAR_LIMIT_EMAIL'] = Constants::MAX_CHAR_LIMIT_EMAIL;
            $data['data']['this_url'] = $_SERVER["SCRIPT_NAME"];
            $data['data']['home_url'] = Constants::REDIRECT_INDEX;
            if (empty($data['data']['contact_id'])) {
                header("Location: " . Constants::REDIRECT_INDEX . "&message=" . Constants::INFO_NOT_FOUND);
            }
            if (isset($_POST['submit'])) {
                $validation = FormValidation::validate($_POST['contact_name'], Constants::ALPHA, Constants::MIN_CHAR_LIMIT, Constants::MAX_CHAR_LIMIT)
                    && FormValidation::validate($_POST['contact_number'], Constants::NUMERIC, Constants::MIN_CHAR_LIMIT_NUMBER, Constants::MAX_CHAR_LIMIT_NUMBER)
                    && FormValidation::validate($_POST['contact_email'], Constants::EMAIL, Constants::MIN_CHAR_LIMIT_EMAIL, Constants::MAX_CHAR_LIMIT_EMAIL);
                if ($validation) {
                    $data['data']['contact_name'] = $_POST['contact_name'];
                    $data['data']['contact_number'] = $_POST['contact_number'];
                    $data['data']['contact_email'] = $_POST['contact_email'];
                    $contact_inserted_on = date('Y-m-d H:i:s');
                    $data['data']['result'] = Contacts::updateById($_POST['contact_name'], $_POST['contact_number'], $_POST['contact_email'], $contact_inserted_on, $id);
                    if ($data['data']['result']) {
                        header("Location: " . Constants::REDIRECT_INDEX . "&message=" . Constants::UPDATE_SUCCESS);
                    }
                } else {
                    $data['data']['contact_name'] = $_POST['contact_name'];
                    $data['data']['contact_number'] = $_POST['contact_number'];
                    $data['data']['contact_email'] = $_POST['contact_email'];
                    $data['data']['result'] = FALSE;
                }
            }
            BuildPage::layoutSetData($data);
            BuildPage::requireLayout("header");
            BuildPage::requireMainContent("update");
            BuildPage::requireLayout("footer");
        } else {
            header("Location: " . Constants::REDIRECT_INDEX . "&message=" . Constants::INFO_NOT_FOUND);
        }
    }
}

$update_page = new Update();
