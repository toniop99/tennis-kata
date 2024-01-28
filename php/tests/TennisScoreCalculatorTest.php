<?php declare(strict_types=1);

namespace KataTests;

use Kata\TennisScoreCalculator;
use PHPUnit\Framework\TestCase;

class TennisScoreCalculatorTest extends TestCase {
    private TennisScoreCalculator $tennisScoreCalculator;

    protected function setUp(): void {
        $this->tennisScoreCalculator = new TennisScoreCalculator();
    }

    /** @test */
    public function punch_player_wins_first_ball() {
        $score = $this->tennisScoreCalculator->score(15, 0);

        self::assertEquals('15 - 0', $score);
    }
}
