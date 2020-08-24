<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity[]|\Cake\Collection\CollectionInterface $activities
 */
?>
<div class="activities index content">
    <?= $this->Html->link(__('Nova Atividade'), ['action' => 'add','?'=>['company_id'=>$company_id]], ['class' => 'button float-right']) ?>
    <h3><?= __('Activities') ?></h3>
    <?= $this->Form->create(null, ['type' => 'GET']) ?>
    <?= $this->Form->input('created', ['label' => 'DIA', 'type' => 'date', 'value' => $query]) ?>
    <?= $this->Form->input('company_id',['label'=>'Empresa','type'=>'select','options'=>$companies, 'default'=>$company_id]) ?>
    <?= $this->Form->input('inlist', ['label' => 'Em Lista', 'type' => 'checkbox', 'value' => $inlist]) ?> Em Lista
    <?= $this->Form->submit('Buscar') ?>
    <?= $this->Form->end(); ?>
    <div class="list">
        <ul>
            <?php foreach ($activities as $activity) : ?>
                <li><?= h($activity->description) . ' - ' . ($activity->has('system') ? $activity->system->name . ' - ' : '') . $activity->created->format('d/m/Y') ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primeira')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('proxima') . ' >') ?>
            <?= $this->Paginator->last(__('última') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Pagina {{page}} de {{pages}}, mostrando {{current}} registro(s) de um total de {{count}}')) ?></p>
    </div>
</div>