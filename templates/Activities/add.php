<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Activity $activity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Ações') ?></h4>
            <?= $this->Html->link(__('List Activities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="activities form content">
            <?= $this->Form->create($activity) ?>
            <fieldset>
                <legend><?= __('Add Activity') ?></legend>
                <?php
                echo $this->Form->control('description', ['autofocus']);
                echo $this->Form->control('origin');
                echo $this->Form->control('company_id', ['options' => $companies, 'empty' => true, 'default' => isset($companyDefaultId) ? $companyDefaultId : $activity->company_id]);
                echo $this->Form->control('system_id', ['options' => $systems, 'empty' => true]);
                if ($activity->id != null) {
                    echo $this->Form->control('created', ['type' => 'datetime']);
                }
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>