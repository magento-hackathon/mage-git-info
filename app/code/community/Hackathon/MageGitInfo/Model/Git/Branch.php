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
 * Git Branch Command Class
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
class Hackathon_MageGitInfo_Model_Git_Branch extends Hackathon_MageGitInfo_Model_Git
{
    /**
     * @var array
     */
    protected $branches = array();

    /**
     * @var string
     */
    protected $currentBranch = "";

    public function branch()
    {
        $this->exec('branch');

        foreach ($this->output as $line) {
            $state = substr($line, 0, 1);
            $branch = substr($line, 2);
            if ('*' == $state) {
                $this->currentBranch = $branch;
            }
            $this->branches[] = $branch;
        }
        return $this;
    }

    public function getCurrentBranch()
    {
        return $this->currentBranch;
    }

    public function getBranches()
    {
        return $this->branches;
    }
}

