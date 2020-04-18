<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Domain\ImageProcess\ImageProcessService;
use App\Domain\ImageProcess\ImageEntityFactory;

class imgTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $ImageEntityFactory = new ImageEntityFactory();
        $ImageProcessService = new ImageProcessService( $ImageEntityFactory );
        $data = $ImageProcessService->_test();

        $this->assertIsArray( $data );
    }
}
