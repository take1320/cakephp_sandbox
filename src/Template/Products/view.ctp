<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Foods'), ['controller' => 'Foods', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Food'), ['controller' => 'Foods', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($product->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($product->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price Excluding Tax') ?></th>
            <td><?= $this->Number->format($product->price_excluding_tax) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity Per Lot') ?></th>
            <td><?= $this->Number->format($product->quantity_per_lot) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Min Order Lot Quantity') ?></th>
            <td><?= $this->Number->format($product->min_order_lot_quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Selling At') ?></th>
            <td><?= h($product->start_selling_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Of Sale At') ?></th>
            <td><?= h($product->end_of_sale_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($product->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($product->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Can Order') ?></th>
            <td><?= $product->can_order ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Foods') ?></h4>
        <?php if (!empty($product->foods)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Serving Size') ?></th>
                <th scope="col"><?= __('Shelf Life Day') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->foods as $foods): ?>
            <tr>
                <td><?= h($foods->id) ?></td>
                <td><?= h($foods->product_id) ?></td>
                <td><?= h($foods->serving_size) ?></td>
                <td><?= h($foods->shelf_life_day) ?></td>
                <td><?= h($foods->created) ?></td>
                <td><?= h($foods->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Foods', 'action' => 'view', $foods->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Foods', 'action' => 'edit', $foods->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Foods', 'action' => 'delete', $foods->id], ['confirm' => __('Are you sure you want to delete # {0}?', $foods->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
