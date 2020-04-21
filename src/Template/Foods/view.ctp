<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Food $food
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Food'), ['action' => 'edit', $food->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Food'), ['action' => 'delete', $food->id], ['confirm' => __('Are you sure you want to delete # {0}?', $food->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Foods'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Food'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="foods view large-9 medium-8 columns content">
    <h3><?= h($food->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $food->has('product') ? $this->Html->link($food->product->name, ['controller' => 'Products', 'action' => 'view', $food->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($food->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Serving Size') ?></th>
            <td><?= $this->Number->format($food->serving_size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Shelf Life Day') ?></th>
            <td><?= $this->Number->format($food->shelf_life_day) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($food->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($food->modified) ?></td>
        </tr>
    </table>
</div>
