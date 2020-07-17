<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity $activity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Activity'), ['action' => 'edit', $activity->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Activity'), ['action' => 'delete', $activity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activity->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Activities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Activity'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="activities view content">
            <h3><?= h($activity->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Origin') ?></th>
                    <td><?= h($activity->origin) ?></td>
                </tr>
                <tr>
                    <th><?= __('Company') ?></th>
                    <td><?= $activity->has('company') ? $this->Html->link($activity->company->name, ['controller' => 'Companies', 'action' => 'view', $activity->company->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('System') ?></th>
                    <td><?= $activity->has('system') ? $this->Html->link($activity->system->name, ['controller' => 'Systems', 'action' => 'view', $activity->system->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $activity->has('user') ? $this->Html->link($activity->user->id, ['controller' => 'Users', 'action' => 'view', $activity->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($activity->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($activity->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($activity->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($activity->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
