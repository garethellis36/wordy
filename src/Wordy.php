<?php declare(strict_types=1);

namespace Garethellis\Wordy;

class Wordy
{
    public function open(string $file): Reader
    {
        // TODO use appropriate reader based on file type
        return Docx::open($file);
    }
}