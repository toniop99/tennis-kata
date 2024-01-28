<?php declare(strict_types=1);

namespace KataTests;

use Kata\TennisScoreCalculator;
use PHPUnit\Framework\TestCase;

class TennisScoreCalculatorTest extends TestCase {

    /** @test */
    public function first() {
        $tennisScoreCalculator = new TennisScoreCalculator();

        self::assertTrue(true);
    }

}
