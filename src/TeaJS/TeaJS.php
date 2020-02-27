<?php

namespace TeaJs;

/**
 * @author Ammar Faizi <ammarfaizi2@gmail.com> https://www.facebook.com/ammarfaizi2
 * @license MIT
 * @package TeaJs
 * @version 0.0.1
 */

define("TEAJS_SCRIPT_DIR", __DIR__."/teajs");
define("TEAJS_MINIFIED_DIR", TEAJS_SCRIPT_DIR."/minified");

final class TeaJs
{
    /**
     * @const array
     */
    public const ALL_MODULES = ["core", "ajax"];

    /**
     * @var bool
     */
    public $minify = false;

    /**
     * Constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param array $modules
     * @return void
     */
    public function renderMinified(array $modules): void
    {
        require __DIR__."/../matthiasmullie/minify/src/Minify.php";
        require __DIR__."/../matthiasmullie/minify/src/JS.php";
        is_dir(TEAJS_MINIFIED_DIR) or mkdir(TEAJS_MINIFIED_DIR);

        foreach ($modules as $k => $v) {
            $ori = TEAJS_SCRIPT_DIR."/modules/".$v.".js";
            $mini = TEAJS_MINIFIED_DIR."/".$v.".js";
            if (file_exists($ori)) {
                if ((!file_exists($mini)) || (filemtime($ori) > filemtime($mini))) {

                    $min = new \MatthiasMullie\Minify\JS($ori);
                    echo $min->minify($mini).";";

                } else {
                    echo file_get_contents($mini).";";
                }
            }
        }
    }

    /**
     * @param ?array $modules
     * @return void
     */
    public function run(?array $modules = null): void
    {
        if (is_null($modules)) {
            $modules = self::ALL_MODULES;
        }

        if ($this->minify) {
            $this->renderMinified($modules);
            return;
        }

        foreach ($modules as $k => $v) {
            echo file_get_contents(TEAJS_SCRIPT_DIR."/modules/".$v.".js");
        }
    }
}
