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
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @version   $Id:$
 * @since     0.1.0
 */
class Hackathon_MageGitInfo_Model_Git
{
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
            $this->lastLine = exec($statement, $this->output, $this->statusCode);

            if (0 != $this->statusCode) {
                throw Hackathon_MageGitInfo_Model_Git_Exception(
                    Mage::helper("magegitinfo")->__("Ecec command returned with status code %s", $this->statusCode)
                );
            }
        } catch (Exception $e) {
            throw $e;
        }

    }
}