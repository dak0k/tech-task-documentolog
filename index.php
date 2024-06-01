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

function createTree($comments, $parentId = 0) {
    $branch = [];
    foreach ($comments as $comment) {
        if ($comment['parent_id'] == $parentId) {
            $children = createTree($comments, $comment['id']);
            if ($children) {
                $comment['children'] = $children;
            }
            $branch[] = $comment;
        }
    }
    return $branch;
}

function generateTree($comments) {
    $html = '<ul>';
    foreach ($comments as $comment) {
        $html .= '<li>' . htmlspecialchars($comment['comment']);
        if (!empty($comment['children'])) {
            $html .= generateTree($comment['children']);
        }
        $html .= '</li>';
    }
    $html .= '</ul>';
    return $html;
}

$commentTree = createTree($comments);
echo generateTree($commentTree);

?>