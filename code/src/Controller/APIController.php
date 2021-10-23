<?php
namespace App\Controller;

use App\Helpers\Checker;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;


class APIController extends AbstractController
{
    public function processWord(): Response
    {
        $checker = new Checker();

        // Get all the request data submitted by the client
        $request = Request::createFromGlobals();

        // Request->request will get POST data, request->query will get query data
        $submittedWord = $request->request->get('submitted_word');
        $comparisonWord = !empty($request->request->get('compare_word'))? $request->request->get('compare_word') : '';

        // Send our submitted word to our checker
        $isPalindrome = $checker->isPalindrome($submittedWord);
        // We only need to check if it is an Anagram if the compare word is present, thus we'll wrap this in a check
        if($comparisonWord == '') {
            $isAnagram = false;
        } else {
            $isAnagram = $checker->isAnagram($submittedWord, $comparisonWord);
        }
        $isPangram = $checker->isPangram($submittedWord);

        return $this->json([
            'palindrome_check' => $isPalindrome,
            'anagram_check' => $isAnagram,
            'pangram_check' => $isPangram,
            'submitted_word' => $submittedWord // Return the word to the client to sanity check
        ]);

    }

}