<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Foods'), ['controller' => 'Foods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Food'), ['controller' => 'Foods', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="products form large-9 medium-8 columns content">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('Add Product') ?></legend>
        <?php
            echo $this->Form->control('type');
            echo $this->Form->control('name');
            echo $this->Form->control('price_excluding_tax');
            echo $this->Form->control('start_selling_at');
            echo $this->Form->control('end_of_sale_at');
            echo $this->Form->control('can_order');
            echo $this->Form->control('quantity_per_lot');
            echo $this->Form->control('min_order_lot_quantity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
