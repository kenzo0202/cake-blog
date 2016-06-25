/**
 * Created by PhpStorm.
 * User: kenzo
 * Date: 2016/06/25
 * Time: 17:25
 */

<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
<fieldset>
    <legend><?= __('Please enter your username and password') ?></legend>
    <?= $this->Form->input('username') ?>
    <?= $this->Form->input('password') ?>
</fieldset>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
</div>