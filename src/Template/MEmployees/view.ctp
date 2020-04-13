<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MEmployee $mEmployee
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit M Employee'), ['action' => 'edit', $mEmployee->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete M Employee'), ['action' => 'delete', $mEmployee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mEmployee->id)]) ?> </li>
        <li><?= $this->Html->link(__('List M Employees'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New M Employee'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="mEmployees view large-9 medium-8 columns content">
    <h3><?= h($mEmployee->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Employee Number') ?></th>
            <td><?= h($mEmployee->employee_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Family Name') ?></th>
            <td><?= h($mEmployee->family_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Given Name') ?></th>
            <td><?= h($mEmployee->given_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Family Name Kana') ?></th>
            <td><?= h($mEmployee->family_name_kana) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Given Name Kana') ?></th>
            <td><?= h($mEmployee->given_name_kana) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= h($mEmployee->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($mEmployee->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($mEmployee->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($mEmployee->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($mEmployee->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($mEmployee->modified) ?></td>
        </tr>
    </table>
</div>
