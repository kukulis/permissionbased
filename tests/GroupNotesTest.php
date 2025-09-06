<?php

namespace Kukulis\PermissionBased\Tests;

use Kukulis\PermissionBased\Tests\Data\NoteHelper;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class GroupNotesTest extends TestCase
{

    #[DataProvider('provideNotesAndMessages')]
    public function testGroupNotes(array $notes, array $expectedMessages )
    {
        $messages = NoteHelper::transformNotes( $notes );
        $this->assertEquals($expectedMessages, $messages);
    }

    public static function provideNotesAndMessages(): array
    {
        return [
//            'test0' => [
//                'notes' =>[],
//                'expectedMessages' => [],
//            ]
            'test1' => [
                'notes' => [
                    [ 'NOTE_CODE' => 'aaa',
                        'NOTE_VALUE' => '1',
                        'NOTE_TITLE' => 'Pirma žinutė'
                    ],
                    [ 'NOTE_CODE' => 'aaa-bbb',
                        'NOTE_VALUE' => 'antras',
                        'NOTE_TITLE' => 'Antra žinutė'
                    ],

                ],
                'expectedMessages' => [
                    [
                        'NOTE_CODE' => 'aaa',
                        'NOTE_VALUE' => 'Antra žinutė : antras',
                        'NOTE_TITLE' => 'Pirma žintutė'
                    ]
                ],
            ]
        ];
    }
}