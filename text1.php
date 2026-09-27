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



function edit(int $index, string $title, string $text, array &$storage): bool
{
    if (isset($storage[$index])) {
        $storage[$index]['title'] = $title;
        $storage[$index]['text'] = $text;
        return true;
    }
    return false;
}


var_dump(edit(0, 'Обновлённый заголовок', 'Обновлённый текст', $textStorage));
var_dump(edit(5, 'Заголовок', 'Текст', $textStorage));


echo "\n Итоговое содержимое массива \n";

print_r($textStorage);

echo "\n Редактируем несуществующий элемент \n";
echo "Редактирование элемента с индексом 5: ";
var_dump(edit(5, 'Заголовок', 'Текст', $textStorage));

var_dump(edit(5, 'Заголовок', 'Текст', $textStorage));
print_r($textStorage);

