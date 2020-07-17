<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\System[]|\Cake\Collection\CollectionInterface $systems
 */
?>
<div class="systems index content">
    <?= $this->Html->link(__('New System'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Systems') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($systems as $system): ?>
                <tr>
                    <td><?= $this->Number->format($system->id) ?></td>
                    <td><?= h($system->name) ?></td>
                    <td><?= h($system->created) ?></td>
                    <td><?= h($system->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $system->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $system->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $system->id], ['confirm' => __('Are you sure you want to delete # {0}?', $system->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
