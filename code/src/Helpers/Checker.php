<?php declare(strict_types=1);

namespace App\Helpers;

/**
 * Pangrams, anagrams and palindromes
 *
 * Implement each of the functions of the Checker class.
 * Aim to spend about 10 minutes on each function.
 */
class Checker
{
    /**
     * A palindrome is a word, phrase, number, or other sequence of characters
     * which reads the same backward or forward.
     *
     * @param string $word
     * @return bool
     */
    public function isPalindrome(string $word) : bool
    {
        $word = strtolower(trim($word)); // Lowercase and remove any whitespace
        if($word == strrev($word)) {
            return true;
        }
        return false;
    }

    /**
     * An anagram is the result of rearranging the letters of a word or phrase
     * to produce a new word or phrase, using all the original letters
     * exactly once.
     *
     * @param string $word
     * @param string $comparison
     * @return bool
     */
    public function isAnagram(string $word, string $comparison) : bool
    {
        // Need to remove any white space, potential spaces, and just compare letters
        $fixedWord = strtolower(trim(str_replace(" ", "", $word)));
        $fixedSecondWord = strtolower(trim(str_replace(" ","", $comparison)));

        // Check we have the same number of letters
        if(strlen($fixedWord) != strlen($fixedSecondWord)) {
            return false;
        } else {
            $asciiWord1 = count_chars($fixedWord, 1);
            $asciiWord2 = count_chars($fixedSecondWord, 1);

            $arrayCheck = false;

            // Check each letter from word 1, is present in the compare word
            foreach($asciiWord1 as $key => $value) {
                // Check if the number of letters is either above or equal to
                if(!empty($asciiWord2[$key]) && $asciiWord2[$key] >= $value) {
                    $arrayCheck = true;
                } else {
                    $arrayCheck = false;
                    break;
                }
            }

            return $arrayCheck;
        }
    }

    /**
     * A Pangram for a given alphabet is a sentence using every letter of the
     * alphabet at least once.
     *
     * @param string $phrase
     * @return bool
     */
    public function isPangram(string $phrase) : bool
    {
        $stringChars = count_chars($phrase);

        // Start at A which is 97, and work our way to Z which is 122
        for ($i = 97; $i <= 122; $i++) {
            if($stringChars[$i]) {
                // Found the character, can mark as successful
                $isPangram = true;
            } else {
                // One of the alphabet characters wasn't found, no point in continuing, break here.
                $isPangram = false;
                break;
            }
        }

        return $isPangram;
    }
}