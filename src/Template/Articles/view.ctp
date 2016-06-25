/**
 * Created by PhpStorm.
 * User: kenzo
 * Date: 2016/06/25
 * Time: 15:02
 */

<h1><?= h($article->title)?></h1>
<p><?= h($article->body)?></p>
<p><small>Created: <?= $article->created->format(DATE_RFC850) ?></small></p>


