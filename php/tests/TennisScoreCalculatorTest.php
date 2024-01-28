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

    /** @test */
    public function players_deuce() {
        $score = $this->tennisScoreCalculator->score(3, 3);

        self::assertEquals('Deuce', $score);
    }

    /** @test */
    public function punch_player_advantage() {
        $score = $this->tennisScoreCalculator->score(4, 3);

        self::assertEquals('Advantage punch player', $score);
    }

    /** @test */
    public function punch_player_advantage_after_deuce() {
        $score = $this->tennisScoreCalculator->score(5, 4);

        self::assertEquals('Advantage punch player', $score);
    }

    /** @test */
    public function other_player_advantage() {
        $score = $this->tennisScoreCalculator->score(3, 4);

        self::assertEquals('Advantage other player', $score);
    }

    /** @test */
    public function other_player_advantage_after_deuce() {
        $score = $this->tennisScoreCalculator->score(4, 5);

        self::assertEquals('Advantage other player', $score);
    }

    /** @test */
    public function punch_player_wins_against_zero() {
        $score = $this->tennisScoreCalculator->score(4, 0);

        self::assertEquals('Punch player wins', $score);
    }

    /** @test */
    public function punch_player_wins_against_thirty() {
        $score = $this->tennisScoreCalculator->score(4, 2);

        self::assertEquals('Punch player wins', $score);
    }
}
