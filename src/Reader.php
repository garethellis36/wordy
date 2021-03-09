<?php

namespace Garethellis\Wordy;

interface Reader
{
    public function hasComments(): bool;
    public function hasImages(): bool;
}