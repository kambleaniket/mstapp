<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $registers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Register'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="registers index large-9 medium-8 columns content">
    <h3><?= __('Registers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phoneno') ?></th>
                <th scope="col"><?= $this->Paginator->sort('addharcard') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($registers as $register): ?>
            <tr>
                <td><?= $this->Number->format($register->id) ?></td>
                <td><?= h($register->name) ?></td>
                <td><?= h($register->phoneno) ?></td>
                <td><?= h($register->addharcard) ?></td>
                <td><?= h($register->gender) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $register->id]) ?>       
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $register->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $register->id], ['confirm' => __('Are you sure you want to delete # {0}?', $register->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
