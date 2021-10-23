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