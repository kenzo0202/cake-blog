<h1>Blog Articles</h1>
<table>
    <tr>
        <th>ID</th>
        <th>TITLE</th>
        <th>CREATED_AT</th>
        <th>EDIT</th>
    </tr>

    <h1><?= $this->Html->link('追加する', ['action' => 'add'] )?></h1>
    <?php foreach ($articles as $article): ?>
    <tr>
        <td><?= $article->id ?></td>
        <td>
            <?= $this->Html->link($article->title,['action' =>'view' ,$article->id]) ?>
        </td>
        <td>
            <?= $article->created->format('Y-m-d H:i:s') ?>
        </td>
        <td>
            <?= $this->Form->postLink('Delete',['action' => 'delete',$article->id],['confirm' => '本当に大丈夫ですか?']) ?>
            <?= $this->Html->link('edit',['action'=> 'edit', $article->id]) ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
