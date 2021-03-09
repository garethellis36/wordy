<?php

namespace Garethellis\Wordy\Test;

use Garethellis\Wordy\Docx;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \Garethellis\Wordy\Docx
 */
class DocxTest extends TestCase
{
    /**
     * @test
     * @covers ::hasComments
     * @dataProvider withoutComments
     */
    public function it_returns_false_for_a_word_doc_without_comments(string $filename): void
    {
        $docx = Docx::open(__DIR__ . "/Resources/{$filename}");

        self::assertFalse($docx->hasComments(), "Failed asserting {$filename} has no comments");
    }

    /**
     * @test
     * @covers ::hasComments
     * @dataProvider withComments
     */
    public function it_returns_true_for_a_word_doc_with_comments(string $filename): void
    {
        $docx = Docx::open(__DIR__ . "/Resources/{$filename}");

        self::assertTrue($docx->hasComments(), "Failed asserting {$filename} has comments");
    }

    /**
     * @test
     * @covers ::hasImages
     * @dataProvider withImages
     */
    public function it_returns_true_for_a_word_doc_with_images(string $filename): void
    {
        $docx = Docx::open(__DIR__ . "/Resources/{$filename}");

        self::assertTrue($docx->hasImages(), "Failed asserting {$filename} has images");
    }

    /**
     * @test
     * @covers ::hasImages
     * @dataProvider withoutImages
     */
    public function it_returns_false_for_a_word_doc_without_images(string $filename): void
    {
        $docx = Docx::open(__DIR__ . "/Resources/{$filename}");

        self::assertFalse($docx->hasImages(), "Failed asserting {$filename} has no images");
    }

    public function withComments(): array
    {
        return [
            ["docx_with_comment.docx"],
        ];
    }

    public function withoutComments(): array
    {
        return [
            ["docx_text_only.docx"],
            ["docx_with_image.docx"],
        ];
    }

    public function withImages(): array
    {
        return [
            ["docx_with_image.docx"],
        ];
    }

    public function withoutImages(): array
    {
        return [
            ["docx_text_only.docx"],
            ["docx_with_comment.docx"],
        ];
    }
}
