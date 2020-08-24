<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity[]|\Cake\Collection\CollectionInterface $activities
 */
?>
<div class="activities index content">
    <?= $this->Html->link(__('Nova Atividade'), ['action' => 'add', '?' => ['company_id' => $company_id]], ['class' => 'button float-right']) ?>
    <h3><?= __('Activities') ?></h3>
    <?= $this->Form->create(null, ['type' => 'GET']) ?>
    <?= $this->Form->input('created', ['label' => 'DIA', 'type' => 'date', 'value' => $query]) ?>
    <?= $this->Form->input('company_id', ['label' => 'Empresa','empty'=>' ', 'type' => 'select', 'options' => $companies, 'default' => $company_id]) ?>
    <?= $this->Form->input('inlist', ['label' => 'Em Lista', 'type' => 'checkbox', 'value' => $inlist]) ?> Em Lista
    <?= $this->Form->submit('Buscar') ?>
    <?= $this->Form->end(); ?>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('description','Descrição') ?></th>
                    <th><?= $this->Paginator->sort('origin','Origem') ?></th>
                    <th><?= $this->Paginator->sort('company_id','Empresa') ?></th>
                    <th><?= $this->Paginator->sort('system_id','Sistema') ?></th>
                    <th><?= $this->Paginator->sort('created','Criado em') ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($activities as $activity) : ?>
                    <tr>
                        <td><?= $this->Number->format($activity->id) ?></td>
                        <td><?= h($activity->description) ?></td>
                        <td><?= h($activity->origin) ?></td>
                        <td><?= $activity->has('company') ? $this->Html->link($activity->company->name, ['controller' => 'Companies', 'action' => 'view', $activity->company->id]) : '' ?></td>
                        <td><?= $activity->has('system') ? $this->Html->link($activity->system->name, ['controller' => 'Systems', 'action' => 'view', $activity->system->id]) : '' ?></td>
                        <td><?= h($activity->created) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $activity->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $activity->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $activity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->id)]) ?>
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