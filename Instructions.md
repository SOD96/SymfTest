# Instructions

There are one of two ways to run this application, you can either send a API request to /api/word or use the frontend

First we need to start the application, if you navigate to the `code` directory and run the command `symfony server:start`
this will start the development server for Symfony and provide you with an IP and Port which you can see the application running

**You will require Symfony CLI for this to work https://symfony.com/download**

# Frontend
Simply navigate to wherever the application has started, for me this was `http://127.0.0.1:38053/`

# API Request

Will return back a JSON response of what has passed and failed our word checks  
I used Postman for testing

**Required Fields:**
- submitted_word
- compare_word (Only for Anagrams)


Endpoint `/api/word`  
Expected Response:

```
{
"palindrome_check": false,
"anagram_check": false,
"pangram_check": false,
"submitted_word": "The British Broadcasting Corporation (BBC) is a British public service broadcaster."
}
```