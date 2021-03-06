<?php
namespace jacmoe\mdpages\components\yii2tech;
/*
* This file is part of
*     the yii2   _
*  _ __ ___   __| |_ __   __ _  __ _  ___  ___
* | '_ ` _ \ / _` | '_ \ / _` |/ _` |/ _ \/ __|
* | | | | | | (_| | |_) | (_| | (_| |  __/\__ \
* |_| |_| |_|\__,_| .__/ \__,_|\__, |\___||___/
*                 |_|          |___/
*                 module
*
*	Copyright (c) 2016 Jacob Moen
*	Licensed under the MIT license
*/
/**
 * @link https://github.com/yii2tech
 * @copyright Copyright (c) 2015 Yii2tech
 * @license [New BSD License](http://www.opensource.org/licenses/bsd-license.php)
 */


/**
 * Shell is a helper for shell command execution.
 *
 * @see ShellResult
 *
 * @author Paul Klimov <klimov.paul@gmail.com>
 * @since 1.0
 */
class Shell
{
    /**
     * Executes shell command.
     * @param string $command command to be executed.
     * @param array $placeholders placeholders to be replaced using `escapeshellarg()` in format: placeholder => value.
     * @return ShellResult execution result.
     */
    public static function execute($command, array $placeholders = [])
    {
        if (!empty($placeholders)) {
            $command = strtr($command, array_map('escapeshellarg', $placeholders));
        }
        $result = new ShellResult();
        $result->command = $command;
        exec($command . ' 2>&1', $result->outputLines, $result->exitCode);
        return $result;
    }
}
