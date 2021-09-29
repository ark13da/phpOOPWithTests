<?php

namespace LeadDeskTasks\MaxSubarray;

interface MaxSubarray
{
    /**
     * Maximum subarray
     *
     * Description:
     * Subarray is a part of the original one dimensional array. In this problem you need to find out the maximum sum
     * that can be calculated by taking contiguous part of the original array.
     *
     * Tasks:
     * 1) You need to create a concrete implementation of this interface. congiguous method should find the
     *    contiguous subarray from given array that has the biggest sum.
     * 2) You also need to create a PHPUnit test suite to test your implementation (https://phpunit.de/) with
     *    few (>2) test cases
     *
     * Input definition (you don't need to check these in code):
     * - Input array will have 1...1e6 elements
     * - Integer values in the array will be from range -1e6...1e6.
     * - Input array can contain non-numeric values. Resulting subarray is not allowed to extend over non-numeric values.
     *   Numbers as text are OK however (e.g. '54')
     *
     * Development restrictions and rules:
     * - Empty subarrays should not be considered. Selected subarray must contain at least one element.
     * - Whole input array is also a valid subarray.
     * - Use PHP 5.6/7 and mention the version used in the implementation as a comment
     * - <deprecated> Follow the PSR-2 coding standard (http://www.php-fig.org/psr/psr-2/) </deprecated>
     * - https://www.php-fig.org/psr/psr-12/ was followed instead
     * - Write descriptive code that is easy to understand
     *
     * Example:
     * - -1 1 5 -6 3 => maximum contiguous sum is 6 (1+5)
     *
     * @param array $array input values
     * @return int maximum possible sum of contiguous subarray
     */
    public function contiguous($array);
}

class CheckMaxSubArray implements MaxSubarray
{
    public function contiguous($array)
    {
        $arrayFilter = array_filter(
            $array,
            function ($item) {
                return preg_match("/[0-9]/", $item);
            }
        );

        $filteredArray = array_values($arrayFilter);

        if (count($filteredArray) === 0) {
            return null;
        }

        $maxSum = 0;
        $currentSum = 0;

        if (max($filteredArray) < 0) {
            $maxSum = max($filteredArray);
        } else {
            for ($i = 0; $i < count($filteredArray); $i++) {
                $currentSum = max($filteredArray[$i], ($currentSum + $filteredArray[$i]));
                $maxSum = max($maxSum, $currentSum);
            }
        }
        return $maxSum;
    }
}
