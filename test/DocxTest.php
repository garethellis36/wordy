<?php declare(strict_types=1);

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

    /**
     * @test
     * @covers ::hasPendingTrackedChanges
     * @dataProvider withPendingTrackedChanges
     */
    public function it_returns_true_for_document_with_pending_tracked_changes(string $filename): void
    {
        $docx = Docx::open(__DIR__ . "/Resources/{$filename}");

        self::assertTrue($docx->hasPendingTrackedChanges(), "Failed asserting {$filename} has pending tracked changes");
    }

    /**
     * @test
     * @covers ::hasPendingTrackedChanges
     * @dataProvider withoutPendingTrackedChanges
     */
    public function it_returns_false_for_document_without_pending_tracked_changes(string $filename): void
    {
        $docx = Docx::open(__DIR__ . "/Resources/{$filename}");

        self::assertFalse($docx->hasPendingTrackedChanges(), "Failed asserting {$filename} has no pending tracked changes");
    }

    /**
     * @test
     * @covers ::isPasswordProtected
     * @dataProvider withPasswordProtection
     */
    public function it_returns_true_for_document_with_password_protection(string $filename): void
    {
        $docx = Docx::open(__DIR__ . "/Resources/{$filename}");

        self::assertTrue($docx->isPasswordProtected(), "Failed asserting that {$filename} is password protected");
    }

    /**
     * @test
     * @covers ::isPasswordProtected
     * @dataProvider withoutPasswordProtection
     */
    public function it_returns_false_for_document_without_password_protection(string $filename): void
    {
        $docx = Docx::open(__DIR__ . "/Resources/{$filename}");

        self::assertFalse($docx->isPasswordProtected(), "Failed asserting that {$filename} is not password protected");
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

    public function withoutPendingTrackedChanges(): array
    {
        return [
            ["docx_with_all_changes_accepted.docx"],
            ["docx_text_only.docx"],
            ["docx_with_comment.docx"],
            ["docx_with_image.docx"],
        ];
    }

    public function withPendingTrackedChanges(): array
    {
        return [
            ["docx_with_deleted_text_tracked_change.docx"],
            ["docx_with_inserted_text_tracked_change.docx"],
        ];
    }

    public function withPasswordProtection(): array
    {
        return [
            ["docx_password_protected_password_is_password.docx"],
        ];
    }

    public function withoutPasswordProtection(): array
    {
        return [
            ["docx_with_all_changes_accepted.docx"],
            ["docx_text_only.docx"],
            ["docx_with_comment.docx"],
            ["docx_with_image.docx"],
            ["docx_with_deleted_text_tracked_change.docx"],
            ["docx_with_inserted_text_tracked_change.docx"],
        ];
    }
}
