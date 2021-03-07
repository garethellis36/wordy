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
     */
    public function it_returns_false_for_a_word_doc_without_comments()
    {
        $docx = Docx::open(__DIR__ . "/Resources/docs_text_only.docx");

        self::assertFalse($docx->hasComments(), "Failed asserting docs_text_only.docx has no comments");
    }

    /**
     * @test
     * @covers ::hasComments
     */
    public function it_returns_true_for_a_word_doc_with_comments()
    {
        $docx = Docx::open(__DIR__ . "/Resources/docx_with_comment.docx");

        self::assertTrue($docx->hasComments(), "Failed asserting docx_with_comment.docx has no comments");
    }
}
