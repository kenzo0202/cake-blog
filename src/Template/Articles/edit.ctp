/**
 * Created by PhpStorm.
 * User: kenzo
 * Date: 2016/06/25
 * Time: 15:36
 */

<h1>編集</h1>
<?php

echo $this->Form->create($article);
echo $this->Form->input('title');
echo $this->Form->input('body',['rows' => '3']);
echo $this->Form->button(__('保存する'));
echo $this->Form->end();

?>
