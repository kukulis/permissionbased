<?php

namespace Kukulis\PermissionBased\Tests\Data;

class NoteHelper
{
    public static function transformNotes(array $notes) : array {
        // need to find parent note for each note
        // then remove notes with parents, and values put to the parent


        // put notes to the map

        $notesMap = array();
        foreach ($notes as $note) {
            $notesMap[$note['NOTE_CODE']] = $note;
        }

        foreach ($notes as $note) {
            $code = $note['NOTE_CODE'];
            $parentCode = self::calculateParentCode($code);

            if ( !array_key_exists($parentCode, $notesMap) ) {
                continue;
            }

            if ( !array_key_exists( 'children', $notesMap[$parentCode]) ) {
                $notesMap[$parentCode]['children'] = [];
            }
            $notesMap[$parentCode]['children'][] = $note;

            // remove the note from the map as it is already placed to children
             unset ( $notesMap[$code] );
        }

        foreach ($notesMap as &$note) {
            if ( !array_key_exists( 'children', $note ) ) {
                continue;
            }

            $childValues = array();
            foreach ( $note['children'] as $childNote ) {
                $valueLine = $childNote['NOTE_TITLE'] .' : ' . $childNote['NOTE_VALUE'];

                $childValues[] = $valueLine;
            }

            $allValues = implode('; ', $childValues);

            unset($note['children']);
            $note['NOTE_VALUE'] = $allValues;
        }

        return array_values($notesMap);
    }

    public static function calculateParentCode(string $noteCode): ?string {
        $parts = explode('-', $noteCode);

        if ( count($parts) <= 1  ) {
            return null;
        }

        // remove last element of the parts array
        unset($parts[count($parts) - 1]);

        return join('-', $parts);
    }
}