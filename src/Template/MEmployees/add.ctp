<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MEmployee $mEmployee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List M Employees'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mEmployees form large-9 medium-8 columns content">
    <?= $this->Form->create($mEmployee) ?>
    <fieldset>
        <legend><?= __('Add M Employee') ?></legend>
        <?php
            echo $this->Form->control('employee_number');
            echo $this->Form->control('family_name');
            echo $this->Form->control('given_name');
            echo $this->Form->control('family_name_kana');
            echo $this->Form->control('given_name_kana');
            echo $this->Form->control('gender');
            echo $this->Form->control('email');
            echo $this->Form->control('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
