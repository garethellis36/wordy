<?php declare(strict_types=1);

namespace Garethellis\Wordy;

interface Reader
{
    public function hasComments(): bool;
    public function hasImages(): bool;
    public function hasPendingTrackedChanges(): bool;
    public function isPasswordProtected(): bool;
}