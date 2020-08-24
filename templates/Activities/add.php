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
            <?= $this->Html->link(__('List Activities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="activities form content">
            <?= $this->Form->create($activity) ?>
            <fieldset>
                <legend><?= __('Add Activity') ?></legend>
                <?php
                echo $this->Form->control('description');
                echo $this->Form->control('origin');
                echo $this->Form->control('company_id', ['options' => $companies, 'empty' => true, 'default' => $companyDefaultId]);
                echo $this->Form->control('system_id', ['options' => $systems, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>