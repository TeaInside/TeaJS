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
        is_dir(TEAJS_MINIFIED_DIR) or mkdir(TEAJS_MINIFIED_DIR);

        foreach ($modules as $k => $v) {
            $ori = TEAJS_SCRIPT_DIR."/modules/".$v.".js";
            $mini = TEAJS_MINIFIED_DIR."/".$v.".js";
            if (file_exists($ori)) {
                if ((!file_exists($mini)) || (filemtime($ori) > filemtime($mini))) {
                    $ori = str_replace(
                        ["\n"],
                        "",
                        file_get_contents($ori)
                    );
                    file_put_contents($mini, $ori);
                    echo $ori;
                } else {
                    echo file_get_contents($mini);
                }
            }
        }
    }

    /**
     * @param array $modules
     * @return void
     */
    public function run(array $modules = []): void
    {
        if ($this->minify) {
            $this->renderMinified($modules);
            return;
        }

        foreach ($modules as $k => $v) {
            echo file_get_contents(TEAJS_SCRIPT_DIR."/modules/".$v.".js");
        }
    }
}
