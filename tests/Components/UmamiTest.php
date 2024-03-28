<?php

namespace B4mtech\LaravelUmami\Tests\Components;

use B4mtech\LaravelUmami\Tests\TestCase as TestCase;


class UmamiTest extends TestCase
{
    /** @test */
    public function it_can_render_correctly(): void
    {
        config()->set('umami.website_id', 'test123');
        config()->set('umami.server_url', 'https://url.test.com');

        $template = <<<'HTML'
            <x-laravel-umami::umami />
            HTML;

        $expected = <<<'HTML'
            <script
                async
                defer
                data-website-id="test123"
                src="https://url.test.com/script.js">
            </script>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
