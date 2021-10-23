<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;


class APIController extends AbstractController
{
    public function processWord(): Response
    {
        $request = Request::createFromGlobals(); // Get all the request data submitted by the client

        $submittedWord = $request->request->get('submitted_word'); // Request->request will get POST data, request->query will get query data

        // Check the word is a Palindrome
        $isPalindrome = false;

        // Check the word is an Anagram
        $isAnagram = false;

        // Check the word is a Pangram
        $isPangram = false;

        return $this->json([
            'palindrome_check' => $isPalindrome,
            'anagram_check' => $isAnagram,
            'pangram_check' => $isPangram,
            'submitted_word' => $submittedWord // Return the word to the client to sanity check
        ]);

    }
}