<?php declare(strict_types=1);

namespace Kata;

class TennisScoreCalculator
{

    private const WIN_DIFFERENCE = 2;
    private const ADVANTAGE_DIFFERENCE = 1;

    public function score(int $punchPlayer, int $otherPlayer): string
    {
        if ($this->isWin($punchPlayer, $otherPlayer)) {
            return $punchPlayer > $otherPlayer ? 'Punch player wins' : 'Other player wins';
        }

        if ($this->isDeuce($punchPlayer, $otherPlayer)) {
            return 'Deuce';
        }

        if ($this->isAdvantage($punchPlayer, $otherPlayer)) {
            return $punchPlayer > $otherPlayer ? 'Advantage punch player' : 'Advantage other player';
        }

        $punchPlayerReadableScore = $this->readableScore($punchPlayer);
        $otherPlayerReadableScore = $this->readableScore($otherPlayer);

        return $punchPlayerReadableScore . ' - ' . $otherPlayerReadableScore;
    }

    private function readableScore(int $score): string
    {
        return match ($score) {
            0 => '0',
            1 => '15',
            2 => '30',
            3 => '40',
            default => throw new \InvalidArgumentException('Invalid score'),
        };
    }

    private function isWin(int $punchPlayer, int $otherPlayer): bool
    {
        return ($punchPlayer >= 4 && $punchPlayer - $otherPlayer >= self::WIN_DIFFERENCE) ||
            ($otherPlayer >= 4 && $otherPlayer - $punchPlayer >= self::WIN_DIFFERENCE);
    }

    private function isAdvantage(int $punchPlayer, int $otherPlayer): bool
    {
        return ($punchPlayer >= 4 && $punchPlayer - $otherPlayer === self::ADVANTAGE_DIFFERENCE) ||
            ($otherPlayer >= 4 && $otherPlayer - $punchPlayer === self::ADVANTAGE_DIFFERENCE);
    }

    private function isDeuce(int $punchPlayer, int $otherPlayer): bool
    {
        return $punchPlayer === $otherPlayer && $punchPlayer >= 3;
    }
}
