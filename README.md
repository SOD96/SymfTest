# SymfTest
Technical test for Jadu, create an application which will check the Palindrome, Anagram and Pangram of certain text

# Requirements
- Built in PHP
- Symfony Framework
- Using Checker.php class file
  - Palindrome
  - Anagram
  - Pangram
- Utilize Instructions.md for advice on running application
- Utilize Time.md for tracking time spent building application

# Environment
Code developed using Windows 10 with WSL2 (Ubuntu 20.04)

# Time log
Please see Time.md

# Instructions
Please see Instructions.md

# Journey
First time using Symfony from start to finish, so just detailing what I find interesting.  
So far, seems like a very cut down framework, which is good for reducing bloat!  
Twig sounds like a great way to replicate some of the templating I'm used to with Laravel, so will use this.  
Routes are done in Yaml files, seem pretty easy to work with, route name, path and what controller we're calling  
Trying to think of the best way to go about this, could just have an API that we can send the data to and get a response back,
that can then alert the user to whether their word passes the many checks

Interestingly there is an API package I could use that sets up all the API stuff for me, however in the interest of learning
a tad more, I'm going to run it old school and see how Symfony actually lets the dev dig through posted data.  

Might be the first time ever I've had to properly look up what an Anagram is. My solution has to be limited in such a way to 
ensure that words can't be taken, all letters need to be used once, so I'll ensure that the word and compare word are the same length to avoid that issue.
Still, it seems widely debated. I'm not sure if ALL letters should be used or just the ones present. I've kept my check in place, because if you have left over words 
it would just leave letters behind

# Testing

- Palindrome
  - **Passes**
    - Anna
    - Belleb
  - **Fails**
    - AnnaZ
    - Sean
    - Bark
- Anagram
  - **Passes**
    - coalface, cacao elf
  - **Fails**
    - coalface, dark elf
- Pangram
  - **Passes**
    - The quick brown fox jumps over the lazy dog
  - **Fails**
    - The British Broadcasting Corporation (BBC) is a British public service broadcaster

# Future Changes
- Update frontend so the script isn't so repeated
- Add an option to allow anagrams of words that are under the necessary amount of characters