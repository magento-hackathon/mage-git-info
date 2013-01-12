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
 * Dummy data helper for translation issues.
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
class Hackathon_MageGitInfo_Model_Git
{
    const GIT_BINARY_NAME = 'git';

    /**
     * @var string
     */
    protected $lastLine = "";

    /**
     * @var array
     */
    protected $output = array();

    /**
     * @var int
     */
    protected $statusCode = null;

    protected function _getGitBinary()
    {
        $gitName = Mage::getStoreConfig('magegitinfo/params/git_binary');
        if (file_exists($gitName) && is_executable($gitName)) {
            return $gitName;
        } else {
            return self::GIT_BINARY_NAME;
        }
    }

    /**
     * @param sring $statement
     * @returns string
     * @throws Hackathon_MageGitInfo_Model_Git_Exception
     */
    public function exec($statement)
    {
        $output = array();
        $statusCode = null;

        try {
            $statement = escapeshellarg($this->_getGitBinary()). ' ' . $statement;
            $this->lastLine = exec($statement, $this->output, $this->statusCode);

            if (0 != $this->statusCode) {
                throw new Hackathon_MageGitInfo_Model_Git_Exception(
                    $this->statusCode,
                    $this->output
                );
            }
        } catch (Exception $e) {
            throw $e;
        }

    }
}
