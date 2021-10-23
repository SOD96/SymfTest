<?php
namespace App\Tests\Service;

use App\Controller\APIController;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Helpers\Checker;


class APIControllerTest extends KernelTestCase
{
    public function testHelper()
    {
        // (1) boot the Symfony kernel
        self::bootKernel();

        // Check our helper returns the expected values
        $trueTest = $this->trueTests();
        $falseTest = $this->falseTests();

        $this->assertEquals(true, $trueTest);
        $this->assertEquals(false, $falseTest);
    }

    /**
     * @return bool
     * Check all our functions are returning true for the correct test data
     */
    public function trueTests(): bool
    {
        $checker = new Checker();

        $isAnagram = $checker->isAnagram('coalface', 'cacao elf');
        $isPalindrome = $checker->isPalindrome('anna');
        $isPangram = $checker->isPangram('The quick brown fox jumps over the lazy dog');

        if($isAnagram && $isPalindrome && $isPangram) {
            return true;
        }

        return false;
    }

    public function falseTests(): bool
    {
        $checker = new Checker();

        $isAnagram = $checker->isAnagram('coalface', 'dark elf');
        $isPalindrome = $checker->isPalindrome('Bark');
        $isPangram = $checker->isPangram('“The British Broadcasting Corporation (BBC) is a British public service broadcaster.');

        if(!$isAnagram && !$isPalindrome && !$isPangram) {
            return false;
        }

        return true;
    }

}