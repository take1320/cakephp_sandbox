<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MEmployee[]|\Cake\Collection\CollectionInterface $mEmployees
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New M Employee'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mEmployees index large-9 medium-8 columns content">
    <h3><?= __('M Employees') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('employee_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('family_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('given_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('family_name_kana') ?></th>
                <th scope="col"><?= $this->Paginator->sort('given_name_kana') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mEmployees as $mEmployee): ?>
            <tr>
                <td><?= $this->Number->format($mEmployee->id) ?></td>
                <td><?= h($mEmployee->employee_number) ?></td>
                <td><?= h($mEmployee->family_name) ?></td>
                <td><?= h($mEmployee->given_name) ?></td>
                <td><?= h($mEmployee->family_name_kana) ?></td>
                <td><?= h($mEmployee->given_name_kana) ?></td>
                <td><?= h($mEmployee->gender) ?></td>
                <td><?= h($mEmployee->email) ?></td>
                <td><?= h($mEmployee->password) ?></td>
                <td><?= h($mEmployee->created) ?></td>
                <td><?= h($mEmployee->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mEmployee->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mEmployee->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mEmployee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mEmployee->id)]) ?>
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
