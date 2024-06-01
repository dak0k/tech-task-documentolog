<?php
$comments = [
    ['id' => 1, 'parent_id' => 0, 'comment' => 'Comment 1'],
    ['id' => 2, 'parent_id' => 1, 'comment' => 'Comment 2'],
    ['id' => 3, 'parent_id' => 2, 'comment' => 'Comment 3'],
    ['id' => 4, 'parent_id' => 1, 'comment' => 'Comment 4'],
    ['id' => 5, 'parent_id' => 2, 'comment' => 'Comment 5'],
    ['id' => 6, 'parent_id' => 3, 'comment' => 'Comment 6'],
    ['id' => 7, 'parent_id' => 0, 'comment' => 'Comment 7'],
];

function foo($arr, $parentId = 0, $lvl = 0)
{
    $prepend = str_repeat(' ', $lvl * 4);
    echo $prepend, '<ul>', PHP_EOL;
    foreach ($arr as $comment) {
        if ($comment['parent_id'] == $parentId) {
            echo $prepend, '    <li>', htmlentities($comment['comment']), PHP_EOL;
            foo($arr, $comment['id'], $lvl + 1);
            echo $prepend, '    </li>', PHP_EOL;
        }
    }
    echo $prepend, '</ul>', PHP_EOL;
}

foo($comments);
?>
