<?php
/**
 * Created by PhpStorm.
 * User: witness
 * Date: 2018/5/14
 * Time: 上午10:26
 */

namespace jt\base;


use Throwable;

class TopException extends \Exception {

    public function __construct($message = "", $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
        set_exception_handler([$this, 'displayError']);
    }

    public function displayError(TopException $exception) {
        echo 'Exception occured: <strong>' . $exception->getMessage() .
            '</strong> in file: <strong>' . $exception->getFile() .
            '</strong> at line: <strong>' . $exception->getLine() .
            '</strong><br /><strong>Trace:</strong> ';
        $traces = explode('#', $exception->getTraceAsString());
        array_shift($traces);
        foreach ($traces as $trace) {
            echo '<pre>#' . $trace . '</pre>' . '<br />';
        }
        die;
    }

}