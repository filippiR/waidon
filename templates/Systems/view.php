<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\System $system
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit System'), ['action' => 'edit', $system->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete System'), ['action' => 'delete', $system->id], ['confirm' => __('Are you sure you want to delete # {0}?', $system->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Systems'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New System'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="systems view content">
            <h3><?= h($system->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($system->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $system->has('user') ? $this->Html->link($system->user->id, ['controller' => 'Users', 'action' => 'view', $system->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($system->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($system->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($system->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Activities') ?></h4>
                <?php if (!empty($system->activities)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Origin') ?></th>
                            <th><?= __('Company Id') ?></th>
                            <th><?= __('System Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($system->activities as $activities) : ?>
                        <tr>
                            <td><?= h($activities->id) ?></td>
                            <td><?= h($activities->description) ?></td>
                            <td><?= h($activities->origin) ?></td>
                            <td><?= h($activities->company_id) ?></td>
                            <td><?= h($activities->system_id) ?></td>
                            <td><?= h($activities->user_id) ?></td>
                            <td><?= h($activities->created) ?></td>
                            <td><?= h($activities->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Activities', 'action' => 'view', $activities->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Activities', 'action' => 'edit', $activities->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Activities', 'action' => 'delete', $activities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $activities->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
