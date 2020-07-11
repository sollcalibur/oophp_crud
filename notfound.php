<?php
require('./require.php');

class NotFound
{
    function __construct()
    {
        $this->render();
    }

    private function render()
    {
        BuildPage::requireLayout("header");
        BuildPage::requireMainContent("notfound");
        BuildPage::requireLayout("footer");
    }
}

$notfound = new NotFound();
