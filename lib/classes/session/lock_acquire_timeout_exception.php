<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Session exception.
 *
 * @package    core
 * @copyright  2013 Petr Skoda {@link http://skodak.org}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace core\session;

defined('MOODLE_INTERNAL') || die;

/**
 * Session lock acquisition timeout exception.
 *
 * Raised when the session lock is unobtainable, e.g. because another process
 * is holding it.
 *
 * @package core
 */
class lock_acquire_timeout_exception extends exception {
    /**
     * Optional inner exception.
     *
     * @var \Exception
     */
    protected $innerexception;

    /**
     * Session ID.
     *
     * @var string
     */
    protected $sid;

    /**
     * Constructor.
     *
     * @param string $sid
     * @param \Exception|null $innerexception
     */
    public function __construct($sid, $innerexception = null) {
        $this->sid = $sid;
        $this->innerexception = $innerexception;

        $message = $this->innerexception ? $this->innerexception->getMessage() : '';
        parent::__construct('sessionhandlertimeout', null, null, $message);
    }

    /**
     * Get the inner exception.
     *
     * @return \Exception|null
     */
    public function get_inner_exception() {
        return $this->innerexception;
    }

    /**
     * Get the session ID.
     *
     * @return string
     */
    public function get_sid() {
        return $this->sid;
    }
}
