<?php declare(strict_types=1);

namespace Garethellis\Wordy;

use ZipArchive;

class Docx implements Reader
{
    private string $file;
    private array $zipContents = [];

    public static function open(string $file): static
    {
        return new self($file);
    }

    private function __construct(string $file)
    {
        $this->file = $file;

        $this->zipArchive = new ZipArchive();
        $this->zipArchive->open($file, ZipArchive::RDONLY);

        for( $i = 0; $i < $this->zipArchive->numFiles; $i++ ){
            $stat = $this->zipArchive->statIndex( $i );
            $this->zipContents[] = $stat['name'];
        }
    }

    public function hasComments(): bool
    {
        foreach ($this->zipContents as $zippedFile) {
            $contents = $this->zipArchive->getFromName($zippedFile);

            if (stripos($contents, "w:commentRangeStart") !== false) {
                return true;
            }
        }

        return false;
    }

    public function hasImages(): bool
    {
        foreach ($this->zipContents as $zippedFile) {
            $contents = $this->zipArchive->getFromName($zippedFile);

            if (stripos($contents, "<pic:") !== false) {
                return true;
            }
        }

        return false;    }
}