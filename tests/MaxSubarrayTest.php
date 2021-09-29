<?php

//require_once realpath("/vendor/autoload.php");
require(__DIR__ . "/../vendor/autoload.php");
//require(__DIR__ . "/../src/MaxSubarray.php");


use LeadDeskTasks\MaxSubarray\CheckMaxSubArray;
use PHPUnit\Framework\TestCase;

final class MaxSubarrayTest extends TestCase
{

    public function testEmptyArray()
    {
        $newCheck = new CheckMaxSubArray();
        $testCase = $newCheck->contiguous([]);
        $this->assertNull($testCase);
    }

    public function testNonNumericArray()
    {
        $newCheck = new CheckMaxSubArray();
        $testCase = $newCheck->contiguous(['a', 'b', 'c']);
        $this->assertNull($testCase);
    }

    /**
     * @dataProvider integerInputsProvider
     * @dataProvider mixedInputsProvider
     */

    public function testMaxSubArray($array, $expected)
    {
        $newCheck = new CheckMaxSubArray();
        $testCase = $newCheck->contiguous($array);
        $this->assertSame($expected, $testCase);
    }

    public function integerInputsProvider()
    {
        return [
            [[-1, 1, 5, -6, 3], 6],
            [[-1, -2, -5, -6, -3], -1],
            [[0, 0, 0], 0],
            [[1, 1, 1], 3]
        ];
    }

    public function mixedInputsProvider()
    {
        return [
            [[-1, 1, '5', -6, 3], 6],
            [['a', '5', '3'], 8],
            [['a', 'b', '3'], '3'],
            [['a', 'b', '-3', '-1'], '-1'],
            [['0', 'b', 'a', '-2'], 0],
        ];
    }
}

