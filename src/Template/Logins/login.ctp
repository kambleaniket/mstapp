<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="logins form">
 <?= $this->Flash->render('auth') ?> 
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->control('email') ?>
        <?= $this->Form->control('password') ?>
    </fieldset>
    <?= $this->Form->button(__('Login')); ?>
    <?= $this->Html->link(__('Sign Up'), ['action' => 'add'])?>

    <?= $this->Form->end() ?>
</div>
