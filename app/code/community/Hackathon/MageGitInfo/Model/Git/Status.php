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
class Hackathon_MageGitInfo_Model_Git_Status extends Hackathon_MageGitInfo_Model_Git
{
    const STATE_CLEAN = 'clean';
    const STATE_DIRTY = 'dirty';

    const MODE_UNTRACKED_BEFORE_FILES = 'mode before untracked';
    const MODE_UNTRACKED_FILES = 'mode untracked';
    const MODE_UNTRACKED_FILES_AFTER = 'mode untracked after'; 

    protected $currentBranch = 'master';
    protected $changedFiles = array();
    protected $untrackedFiles = array();

    public function status()
    {
        $this->exec('git status --porcelain');
        
        foreach ($this->output as $line) {
            $state = substr($line, 0, 2);
            $file = substr($line, 3);
            switch ($state) {
                case '??': $this->untrackedFiles[] = file; break;
                case ' M': $this->changedFiles[] = file; break;
            }
        }
        return $this;
    }

    public function getCurrentBranch()
    {
        return $this->currentBranch;
    }

    public function getState()
    {
        if (count($this->changedFiles) || count($this->untrackedFiles)) {
            return self::STATE_DIRTY;
        }
        return STATE_CLEAN;
    }

    public function getChangedFiles()
    {
        return $this->changedFiles;
    }

    public function getUntrackedFiles()
    {
        return $this->untrackedFiles;
    }

    public function isDirty()
    {
        return (self::STATE_DIRTY == $this->getState());
    }
}

