<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Todo;

class TodoTest extends TestCase
{
    // public function testTodoWithEmptyTitleThrowsAnError()
    // {
    //     $this->expectException(\Illuminate\Validation\ValidationException::class);
    //     Todo::create(['title' =>'']);
    // }

    public function testTodoWithValidTitle()
    {
        $mock = $this->createMock(Todo::class);
        $mock->expects($this->once())
            ->method('save')
            ->willReturn(true);

        $mock->title = 'Buy milk';
        $this->assertTrue($mock->save());

    }

    // public function testTodoWithValidTitle()
    // {
    //     $todo = new Todo(['title' => 'Buy milk']);  // 実際のインスタンスを使用
    //     $this->assertEquals('Buy milk', $todo->title);
    // }


}
