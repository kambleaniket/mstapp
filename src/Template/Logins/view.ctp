<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $login
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Login'), ['action' => 'edit', $login->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Login'), ['action' => 'delete', $login->id], ['confirm' => __('Are you sure you want to delete # {0}?', $login->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Logins'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Login'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="logins view large-9 medium-8 columns content">
    <h3><?= h($login->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($login->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($login->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($login->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($login->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($login->modified) ?></td>
        </tr>
    </table>
</div>
