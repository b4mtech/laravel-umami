<?php

namespace B4mtech\LaravelUmami\Tests;

use B4mtech\LaravelUmami\LaravelUmamiServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use B4mtech\LaravelUmami\Tests\InteractsWithViews;

abstract class TestCase extends OrchestraTestCase
{
    use InteractsWithViews;

    protected function getPackageProviders($app): array
    {
        return [
            LaravelUmamiServiceProvider::class,
        ];
    }

    public function assertComponentRenders(string $expected, string $template, array $data = []): void
    {
        $indenter = new \Gajus\Dindent\Indenter();

        $blade = (string) $this->blade($template, $data);
        $indented = $indenter->indent($blade);

        $this->assertSame(
            $expected,
            $indented
        );
    }
}
