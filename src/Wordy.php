<?php

namespace Garethellis\Wordy;

class Wordy
{
    public static function open(string $file): Reader
    {
        return new Docx($file);
    }
}