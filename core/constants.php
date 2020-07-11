<?php
class Constants
{
    // FORM VALIDATION
    const ALPHA = 'ALPHA';
    const NUMERIC = 'NUMERIC';
    const EMAIL = 'EMAIL';
    const REGEX_NUMERIC = "/^[0-9]*$/";
    const REGEX_NAME = "/^[a-zA-Z ]*$/";
    const MIN_CHAR_LIMIT = 5;
    const MAX_CHAR_LIMIT = 49;
    const MIN_CHAR_LIMIT_NUMBER = 10;
    const MAX_CHAR_LIMIT_NUMBER = 24;
    const MIN_CHAR_LIMIT_EMAIL = 10;
    const MAX_CHAR_LIMIT_EMAIL = 254;
    const INVALID_INPUT_NAME = "Name is invalid";
    const INVALID_INPUT_NUMBER = "Phone number is invalid";
    const INVALID_INPUT_EMAIL = "Email is invalid";

    // FLAGS
    const DELETE_SUCESS = "DELETE_SUCESS";
    const UPDATE_SUCCESS = "UPDATE_SUCCESS";
    const CREATE_SUCCESS = "CREATE_SUCCESS";

    // MESSAGES
    const DELETE_SUCESS_MSG = "Success! Deletion of contact info was a success.";
    const UPDATE_SUCCESS_MSG = "Success! Update of contact info was a success.";
    const CREATE_SUCCESS_MSG = "Success! Successfully registered a new contact info.";
    const NOT_FOUND = "Error! Unable to find the info.";

    // REDIRECTIONS
    const REDIRECT_INDEX = "index.php?page=1";
    const REDIRECT_NOT_FOUND = "notfound.php";
    const INFO_NOT_FOUND = "INFO_NOT_FOUND";

    // URLS
    const INDEX_PAGE = "index.php";
}
