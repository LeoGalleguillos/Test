<?php
namespace LeoGalleguillos\TestTest\Hydrator;

use Laminas\Db\Adapter\Driver\Pdo\Result;
use LeoGalleguillos\Test\Hydrator as TestHydrator;
use PHPUnit\Framework\TestCase;

class ResultTest extends TestCase
{
    protected function setup()
    {
        $this->result = new TestHydrator\Result();
    }

    public function test_hydrate_letters()
    {
        $resultMock = $this->createMock(
            Result::class
        );
        $this->result->hydrate(
            $resultMock,
            ['a', 'b', 'c',]
        );
        $this->assertSame(
            [
                0 => 'a',
                1 => 'b',
                2 => 'c',
            ],
            iterator_to_array($resultMock)
        );
    }

    public function test_hydrate_arrays()
    {
        $resultMock = $this->createMock(
            Result::class
        );
        $this->result->hydrate(
            $resultMock,
            [
                ['user_id' => 1, 'username' => 'Foo'],
                ['user_id' => 2, 'username' => 'Boo'],
            ]
        );
        $this->assertSame(
            [
                ['user_id' => 1, 'username' => 'Foo'],
                ['user_id' => 2, 'username' => 'Boo'],
            ],
            iterator_to_array($resultMock)
        );
    }
}
