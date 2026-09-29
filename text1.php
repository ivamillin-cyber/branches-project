<?php


$textStorage = [];

function add(array &$storage, string $title, string $text): void
{
    $storage[] = [
        'title' => $title,
        'text' => $text
    ];
}

add($textStorage, 'Заголовок первого текста', 'Содержимое первого текста');
add($textStorage, 'Заголовок второго текста', 'Содержимое второго текста');

echo $textStorage[0]['title'] . "\n";
echo $textStorage[0]['text'] . "\n";
echo $textStorage[1]['title'] . "\n";
echo $textStorage[1]['text'] . "\n";


function remove(array &$storage, int $index): bool
{
    if (!array_key_exists($index, $storage)) {
        return false;
    }

    unset($storage[$index]);
    $storage = array_values($storage);
    return true;
}

var_dump(remove($textStorage, 0));
var_dump(remove($textStorage, 5));



function edit(int $index, array &$storage, string $title = '', string $text = ''): bool
{
     if (!isset($storage[$index])) {
        return false;
    }

    if ($title !== '') {
        $storage[$index]['title'] = $title;
    }

    if ($text !== '') {
        $storage[$index]['text'] = $text;
    }

    return true;
}


echo "\n Редактирование только заголовка \n";
var_dump(edit(0, $textStorage, 'Обновлённый заголовок'));

echo "\n Редактирование только текста \n";
var_dump(edit(0, $textStorage, '', 'Обновлённый текст'));

echo "\n Редактирование обоих полей \n";
var_dump(edit(0, $textStorage, 'Новый заголовок', 'Новый текст'));

echo "\n Редактирование несуществующего элемента \n";
var_dump(edit(5, $textStorage, 'Заголовок', 'Текст'));

echo "\nИтоговое содержимое массива \n";
print_r($textStorage);

