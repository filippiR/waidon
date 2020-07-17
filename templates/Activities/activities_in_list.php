<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity[]|\Cake\Collection\CollectionInterface $activities
 */
?>
<div class="activities index content">
    <?= $this->Html->link(__('New Activity'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Activities') ?></h3>
    <?= $this->Form->create(null, ['type'=>'GET']) ?>
    <?= $this->Form->input('created',['label'=>'DIA','type'=>'date', 'value'=>$query]) ?>
    <?= $this->Form->input('inlist',['label'=>'Em Lista','type'=>'checkbox', 'value'=>$inlist]) ?> Em Lista
    <?= $this->Form->submit('Buscar') ?>
    <?= $this->Form->end(); ?>
    <div class="list">
        <ul>
        <?php foreach ($activities as $activity): ?>
            <li><?= h($activity->description). ' - '.($activity->has('system')?$activity->system->name. ' - ':'').$activity->created ?></li>
        <?php endforeach; ?>
        </ul> 
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
