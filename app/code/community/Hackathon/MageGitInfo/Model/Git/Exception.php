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
class Hackathon_MageGitInfo_Model_Git_Exception extends Mage_Core_Exception
{
    /**
     * Git Output
     * @var array
     */
    protected $_gitOutput = null;

    /**
     * Creates new Git Exception
     * @param string $message
     * @param int $statusCode
     * @param array $output
     */
    public function __construct($statusCode = null, $output = null)
    {
        parent::__construct(
            Mage::helper("magegitinfo")->__("Excec command returned with status code %s", $statusCode),
            $statusCode
        );

        if (!empty($output)) {
            $this->_gitOutput = $output;
        }
    }

    /**
     * Return Git Output for this Extensio
     * @return array
     */
    public function getGitOutput()
    {
        return $this->_gitOutput;
    }

    public function __toString()
    {
        $output =  parent::__toString();
        if (is_array($this->getGitOutput())) {
            $output  .= "\n" . implode("\n", $this->getGitOutput());
        }
    }
}