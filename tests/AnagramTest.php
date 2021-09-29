<?php

require(__DIR__ . "/../vendor/autoload.php");

use LeadDeskTasks\Anagram\CheckAnagram;
use PHPUnit\Framework\TestCase;

final class AnagramTest extends TestCase
{
    /**
     * @dataProvider stringInputsProvider
     * @dataProvider integerInputsProvider
     * @dataProvider mixedInputsProvider
     */

    public function testAnagram($a, $b, $expected)
    {
        $newCheck = new CheckAnagram();
        $testCase = $newCheck->isAnagram($a, $b);
        $this->assertSame($expected, $testCase);
    }

    public function stringInputsProvider()
    {
        return [
            ['car', 'rat', false],
            ['CaT', 'RaT', false],
            ['DOg', 'gOdd', false],
            [' dog', 'god', false],
            [' dog', ' god', false],
            [' dog', 'god ', true],
            ['car', 'rac', true],
            ['CAT', 'TAC', true],
            ['ABC', 'cba', true],
            ['A', 'a', true]
        ];
    }

    public function integerInputsProvider()
    {
        return [
            [13, 312, false],
            [1234, 5689, false],
            [12.5, 21.5, false],
            [032, 230, false],
            [123, -321, false],
            [-32, -23, false],
            [123, 321, true],
            [13.5, 5.31, true],
            [0, 0, true],
            [00, 0, true],
        ];
    }

    public function mixedInputsProvider()
    {
        return [
            [13, 312, false],
            [1234, 5689, false],
            [12.5, 21.5, false],
            [032, 230, false],
            [123, -321, false],
            [-32, -23, false],
            [123, 321, true],
            [13.5, 5.31, true],
            [0, 0, true],
            [00, 0, true],
        ];
    }
}

