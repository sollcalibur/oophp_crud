<?php
require('./require.php');

class Create
{
    function __construct()
    {
        $this->render();
    }

    private function render()
    {
        $data['data']['MIN_CHAR_LIMIT'] = Constants::MIN_CHAR_LIMIT;
        $data['data']['MAX_CHAR_LIMIT'] = Constants::MAX_CHAR_LIMIT;
        $data['data']['MIN_CHAR_LIMIT_NUMBER'] = Constants::MIN_CHAR_LIMIT_NUMBER;
        $data['data']['MAX_CHAR_LIMIT_NUMBER'] = Constants::MAX_CHAR_LIMIT_NUMBER;
        $data['data']['MIN_CHAR_LIMIT_EMAIL'] = Constants::MIN_CHAR_LIMIT_EMAIL;
        $data['data']['MAX_CHAR_LIMIT_EMAIL'] = Constants::MAX_CHAR_LIMIT_EMAIL;
        $data['data']['result'] = "";
        $data['data']['this_url'] = $_SERVER["SCRIPT_NAME"];
        $data['data']['home_url'] = Constants::REDIRECT_INDEX;

        if (isset($_POST['submit'])) {
            $validation = FormValidation::validate($_POST['name'], Constants::ALPHA, Constants::MIN_CHAR_LIMIT, Constants::MAX_CHAR_LIMIT)
                && FormValidation::validate($_POST['number'], Constants::NUMERIC, Constants::MIN_CHAR_LIMIT_NUMBER, Constants::MAX_CHAR_LIMIT_NUMBER)
                && FormValidation::validate($_POST['email'], Constants::EMAIL, Constants::MIN_CHAR_LIMIT_EMAIL, Constants::MAX_CHAR_LIMIT_EMAIL);
            if ($validation) {
                $data['data']['result'] = Contacts::create($_POST['name'], $_POST['number'], $_POST['email']);
                if ($data['data']['result']) {
                    header("Location: " . Constants::REDIRECT_INDEX . "&message=" . Constants::CREATE_SUCCESS);
                }
            } else {
                $data['data']['result'] = FALSE;
            }
        }

        BuildPage::layoutSetData($data);
        BuildPage::requireLayout("header");
        BuildPage::requireMainContent("create");
        BuildPage::requireLayout("footer");
    }
}

$page = new Create();
