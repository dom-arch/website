<?php
/*
Copyright 2015 Lcf.vs
 -
Released under the MIT license
 -
https://github.com/Lcfvs/DOMArch
*/
namespace Modules\Error\Controllers;

use Lib\Config;
use DOMArch\Controller;

class InternalError
    extends Controller
{
    public function get(
        string $message,
        string $file,
        int $line,
        array $context,
        array $traces
    )
    {
        $view = $this->_view;

        if (!Config::global()->get('context')->get('isDevMode')) {
            // todo add to logs
            exit('define logger!');
        }

        $view->debug($message, $file, $line, $context, $traces);
    }
}