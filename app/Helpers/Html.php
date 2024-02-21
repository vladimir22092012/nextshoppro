<?php
namespace App\Helpers;

class Html {

    public static function getAlert($text, $status = 'alert-info'): string
    {
        return "<div class='alert $status' >$text</div>";
    }
}
