<?php

class Utils
{
    /**
    * エスケープ処理
    * @param string
    * @return string
    */
    public static function h($str)
    {
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }
}
