<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $register
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Register'), ['action' => 'edit', $register->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Register'), ['action' => 'delete', $register->id], ['confirm' => __('Are you sure you want to delete # {0}?', $register->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Registers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Register'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="registers view large-9 medium-8 columns content">
    <h3><?= h($register->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($register->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phoneno') ?></th>
            <td><?= h($register->phoneno) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Addharcard') ?></th>
            <td><?= h($register->addharcard) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= h($register->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($register->id) ?></td>
        </tr>
    </table>
</div>
