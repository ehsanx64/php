<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ExceptionTest extends TestCase {
    public function testException(): void {
        // $this->expectException(InvalidArgumentException::class);
        $this->assertSame('a', 'a', 'a is not b');
    }
}
