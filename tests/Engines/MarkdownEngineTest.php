<?php

/**
 * This file is part of Laravel Markdown by Graham Campbell.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace GrahamCampbell\Tests\Markdown\Engines;

use Mockery;
use GrahamCampbell\Markdown\Engines\MarkdownEngine;
use GrahamCampbell\TestBench\Classes\AbstractTestCase;

/**
 * This is the markdown engine test class.
 *
 * @package    Laravel-Markdown
 * @author     Graham Campbell
 * @copyright  Copyright 2013-2014 Graham Campbell
 * @license    https://github.com/GrahamCampbell/Laravel-Markdown/blob/master/LICENSE.md
 * @link       https://github.com/GrahamCampbell/Laravel-Markdown
 */
class MarkdownTest extends AbstractTestCase
{
    public function testRender()
    {
        $engine = $this->getEngine();

        $engine->getMarkdown()->shouldReceive('render')->once()
            ->with('qwertyuiop'.PHP_EOL)->andReturn('html');

        $return = $engine->get(__DIR__.'\stubs\test');

        $this->assertEquals('html', $return);
    }

    protected function getEngine()
    {
        $markdown = Mockery::mock('GrahamCampbell\Markdown\Classes\Markdown');

        return new MarkdownEngine($markdown);
    }
}
