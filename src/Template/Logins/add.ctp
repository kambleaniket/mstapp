<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $login
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        
    </ul>
</nav>
<div class="logins form large-9 medium-8 columns content">
    <?= $this->Form->create("Logins",array('url'=>'/Logins/add'))?>
    <fieldset>
        <legend><?= __('Add Login') ?></legend>
        <?php
            echo $this->Form->control('email');
            echo $this->Form->control('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success']) ?>
    <?= $this->Form->end() ?>
</div>
