<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Tests for the greeting block.
 *
 * @package    block_greeting
 * @copyright  2026 Samuel Monteiro Machado de Sousa
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_greeting;

/**
 * Tests for the greeting block and its localized text helper.
 *
 * @package    block_greeting
 * @copyright  2026 Samuel Monteiro Machado de Sousa
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers     \block_greeting
 * @covers     \block_greeting\local\greeting_text
 */
final class greeting_test extends \advanced_testcase {

    /**
     * Ensures the localized greeting is rendered by the block template.
     */
    public function test_greeting_is_rendered(): void {
        global $OUTPUT, $PAGE;

        $OUTPUT = $PAGE->get_renderer('core');
        $block = new \block_greeting();
        $block->page = $PAGE;

        $content = $block->get_content();
        $message = get_string('greeting', 'block_greeting');

        $this->assertInstanceOf(stdClass::class, $content);
        $this->assertStringContainsString($message, $content->text);
    }
}
