<?php

    /**
     * backtrace function. Alias of native `debug_print_backtrace` or
     *     `debug_backtrace` functions, with UI mods in the former case.
     * 
     * @todo make the $slim = false version of this call more visually appealing
     * @access public
     * @param bool $slim. (default: true) whether or not to print a slim version
     *     of the backtrace, or the fancy, verbose one
     * @return void
     */
    function backtrace($slim = true)
    {
        if ($slim) {
            echo '<pre>' . PHP_EOL;
            debug_print_backtrace();
            echo '</pre>' . PHP_EOL;
        } else {
            pr(debug_backtrace());
        }
    }

    /**
     * el function. Alias of native `error_log` function.
     * 
     * @note same parameter signature as native 'error_log' function
     * @access public
     * @return bool error logging success
     */
    function el()
    {
        $args = func_get_args();
        return call_user_func_array('error_log', $args);
    }

    /**
     * elx function. Aggregate alias of `el` and `ex` functions.
     * 
     * @access public
     * @return void
     */
    function elx()
    {
        $args = func_get_args();
        call_user_func_array('el', $args);
        ex();
    }

    /**
     * ex function. Aggregate alias of `e` and native `exit` functions.
     * 
     * @access public
     * @return void
     */
    function ex($str = '')
    {
        if (!empty($str)) {
            echo $str . PHP_EOL;
        }
        exit(0);
    }

    /**
     * pr function. Alias of native `print_r` function with UI mods.
     * 
     * @access public
     * @param mixed $exp variable to be printed out
     * @param bool $return. (default: false) whether or not the the print_r
     *     statement should be stored
     * @return string|void if printable expression is to be returned, then
     *     returned as string
     */
    function pr($exp, $return = false)
    {
        if ($return) {
            return print_r($exp, true);
        }
        echo '<pre>';
        print_r($exp, false);
        echo '</pre>' . PHP_EOL;
    }

    /**
     * prx function. Alias of `pr` and `ex` functions.
     * 
     * @access public
     * @return void
     */
    function prx()
    {
        $args = func_get_args();
        call_user_func_array('pr', $args);
        ex();
    }

    /**
     * vd function. Alias of native `var_dump` with UI mods.
     * 
     * @access public
     * @return void
     */
    function vd()
    {
        $args = func_get_args();
        echo '<pre>' . PHP_EOL;
        foreach ($args as $arg) {
            var_dump($arg);
        }
        echo '</pre>' . PHP_EOL;
    }

    /**
     * vdx function. Alias of `vd` and `ex` functions.
     * 
     * @access public
     * @return void
     */
    function vdx()
    {
        $args = func_get_args();
        call_user_func_array('vd', $args);
        ex();
    }
