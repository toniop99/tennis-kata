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
        $score = $this->tennisScoreCalculator->score(1, 0);

        self::assertEquals('15 - 0', $score);
    }

    /** @test */
    public function fifteen_all() {
        $score = $this->tennisScoreCalculator->score(1, 1);

        self::assertEquals('15 - 15', $score);
    }

    /** @test */
    public function other_player_wins_first_two_balls() {
        $score = $this->tennisScoreCalculator->score(0, 2);

        self::assertEquals('0 - 30', $score);
    }

    /** @test */
    public function thirty_all() {
        $score = $this->tennisScoreCalculator->score(2, 2);

        self::assertEquals('30 - 30', $score);
    }
}
