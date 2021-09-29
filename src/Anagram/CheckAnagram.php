<?php

namespace LeadDeskTasks\Anagram;

interface Anagram
{
    /**
     * Anagram problem
     *
     * Description (from wikipedia):
     * An anagram is direct word switch or word play, the result of rearranging the letters of a word
     * or phrase to produce a new word or phrase, using all the original letters exactly once;
     * for example, the word anagram can be rearranged into nag-a-ram.
     *
     * Tasks:
     * 1) You need to create a concrete implementation of this interface. Solve method should determine
     *    if two given words are anagrams of each other. In other words determine if first word's letters
     *    can be arranged differently to generate the second word.
     * 2) You also need to create a PHPUnit test suite to test your implementation (https://phpunit.de/) with
     *    few (>2) test cases
     *
     * Input definition (you don't need to check these in code):
     * - Words might not be an actual dictionary word
     * - Words length is between: 1-1000
     * - Words consist only from uppercase letters A-Z
     *
     * Development restrictions and rules:
     * - Use PHP 5.6/7 and mention the version used in the implementation as a comment
     * - Follow the PSR-2 coding standard (http://www.php-fig.org/psr/psr-2/)
     * - Write descriptive code that is easy to understand
     *
     * Example:
     * - 'RAT' vs 'CAR' => false, because these words are not anagrams
     *
     * @param string $word1 first word
     * @param string $word2 second word
     * @return boolean true if word are anagrams of each other, false otherwise
     */
    public function isAnagram($word1, $word2);
}

class CheckAnagram implements Anagram
{
    public function isAnagram($word1, $word2)
    {
        $word1UpperCase = strtoupper($word1);
        $word2upperCaseReverse = strrev(strtoupper($word2));
        return ($word1UpperCase === $word2upperCaseReverse);
    }
}

