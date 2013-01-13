<?php
/**
 * This file is part of the MAGEGITINFO project.
 *
 * Hackathon MageGitInfo is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License version 3 as
 * published by the Free Software Foundation.
 *
 * This script is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * PHP version 5
 *
 * @category  MageGitInfo
 * @package   Hackathon_MageGitInfo
 * @author    Tom Kadwill <tomkadwill@gmail.com>
 * @author    Stephan Hoyer <ste.hoyer@gmail.com>
 * @author    André Herrn <info@andre-herrn.de>
 * @author    Anjey Lobas <anjey.lobas@goodahead.com>
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @version   $Id:$
 * @since     0.1.0
 */
/**
 * Git Log Command Class
 *
 * @category  MageGitInfo
 * @package   Hackathon_MageGitInfo
 * @author    Tom Kadwill <tomkadwill@gmail.com>
 * @author    Stephan Hoyer <ste.hoyer@gmail.com>
 * @author    André Herrn <info@andre-herrn.de>
 * @author    Anjey Lobas <anjey.lobas@goodahead.com>
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @version   $Id:$
 * @since     0.1.0
 */
class Hackathon_MageGitInfo_Model_Log extends Hackathon_MageGitInfo_Model_Git
{
    /**
     * @var array
     */
    protected $logEntries = array();

    public function log($numberOfLogs='1') {
        $statement = 'log -v -n' . (string)$numberOfLogs;
        $this->exec($statement);
        $formattedLogsString = '';

        $tmpLogEntry = array();
        $i = 0;
        foreach ($this->output as $line){
            if ($line != '') {
                if (is_numeric(strpos($line, 'commit')) & strpos($line, 'commit') == 0) {
                    if ($i != 0) {
                        $this->logEntries[] = $tmpLogEntry;
                        $tmpLogEntry = array();
                    }
                    $line = str_replace('commit', '',$line);
                    $tmpLogEntry["hash"] = $line;
                } elseif (is_numeric(strpos($line, 'Author'))) {
                    $line = str_replace('Author: ', '',$line);
                    $tmpLogEntry["author"] = $line;
                } elseif (is_numeric(strpos($line, 'Date'))) {
                    $line = str_replace('Date: ', '',$line);
                    $tmpLogEntry["date"] = $line;
                } else {
                    if (!array_key_exists('message', $tmpLogEntry)) {
                        $tmpLogEntry["message"] = $line;
                    } else {
                        $tmpLogEntry["message"] .= $line;
                    }
                }
                $i++;
            }
        }
        $this->logEntries[] = $tmpLogEntry;
        return $this;
    }

    /**
     * Get log entries
     *
     * @return array
     */
    public function getLogEntries()
    {
        return $this->logEntries;
    }
}
