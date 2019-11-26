<?php
    use Cake\ORM\Query;
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $register
 */
    $country = array();
    foreach ($countries as $value) {
        $country[]=$value->name;
    }
?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Registers'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="registers form large-9 medium-8 columns content">
    <?= $this->Form->create($register) ?>
    <fieldset>
        <legend><?= __('Add Register') ?></legend>
        <?php
            
            echo $this->Form->input('name',['class' => 'form-control']);
            echo $this->Form->input('phoneno',['class' => 'form-control']);
            echo $this->Form->input('addharcard',['class' => 'form-control']);
        ?>
        <div class="form-group">
            <label> Country</label>
            <?php echo $this->Form->select('country',$country,['id' => 'country' , 'empty' => 'Select Country' ] ); ?>
        </div>
        <div class="form-group">
            
            <?php echo $this->Form->input('state', array('type'=>'select', 'empty' => 'Select State' ,'class' => 'form-control'));?>
        </div>
         <!-- <div class="form-group">
                <?= $this->Form->control('gmail', ['class'=>'form-control gmailClass','data-role'=>'tagsinput','placeholder'=>'add mail','id'=>'myid']); ?>
        </div>  -->
        number : <input type="text" name = "number" id ="tagme" class="phoneno" data-role ="tagsinput"  />
        gmail :  <input type="text" name = "gmail" id ="gmail" class="gmail"  data-role ="tagsinput"  />

    </fieldset>
    <!-- <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary']) ?> -->
    <?= $this->Form->end() ?>
</div>
