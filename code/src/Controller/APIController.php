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

        // Check if our word has been submitted
        if(!$request->request->has('submitted_word')) {
            // Return a validation fail
            return $this->json(['success' => false, 'message' => 'submitted_word field not present in post body data']);
        }

        // Request->request will get POST data, request->query will get query data
        $submittedWord = $request->request->get('submitted_word');
        $comparisonWord = !empty($request->request->get('compare_word'))? $request->request->get('compare_word') : '';

        // Will never be an anagram if the words submitted are blank
        if($comparisonWord == '' || $submittedWord == '') {
            $isAnagram = false;
        } else {
            $isAnagram = $checker->isAnagram($submittedWord, $comparisonWord);
        }

        // Check our submitted word isn't blank
        if($submittedWord != '') {
            // Send our submitted word to our checker
            $isPalindrome = $checker->isPalindrome($submittedWord);
            $isPangram = $checker->isPangram($submittedWord);
        } else {
            $isPalindrome = false;
            $isPangram = false;
        }

        return $this->json([
            'palindrome_check' => $isPalindrome,
            'anagram_check' => $isAnagram,
            'pangram_check' => $isPangram,
            'submitted_word' => $submittedWord, // Return the word to the client to sanity check
            'compare_word' => $comparisonWord // Return the word to the client to sanity check
        ]);

    }

}