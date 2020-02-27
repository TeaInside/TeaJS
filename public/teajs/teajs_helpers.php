<?php

$modulesStr = "";

/**
 * @param string $module
 * @return string
 */
function teajs_load($module)
{
    global $modulesStr;
    $r = explode("/**@teajs_module_start:{$module}**/", $modulesStr, 2);
    $r = explode("/**@teajs_module_end:{$module}**/", $r[1], 2);
    return $r[0];
}

/**
 * @param array $modules
 * @return string
 */
function teajs_run(array $modules = []): string
{
    global $modulesStr;
    $teaJsData = file_get_contents(__DIR__."/modules/000_core.js");
    if ($modulesStr === "") {
        $modulesFile = scandir(__DIR__."/modules");
        unset($modulesFile[0], $modulesFile[1], $modulesFile[2]);
        foreach ($modulesFile as $v) {
            $modulesStr .= file_get_contents(__DIR__."/modules/".$v);
        }
    }
    $r = "";
    foreach ($modules as $v) {
        $r .= teajs_load($v);
    }
    return str_replace("/**@teajs_load_module_boundary**/", $r, $teaJsData);
}
