<?php

namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Http\Session;
use Cake\Event\Event;
use ArrayObject;
use Cake\Datasource\EntityInterface;

/**
 * UsuarioCriacao behavior
 */
class UserCreateBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = ['UserField' => 'user_id',
        'UserEditField' => 'user_edit_id'];

    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        $userfield = $this->getConfig();
        if (empty($data[$userfield['UserField']])) {
            $session = new Session();
            $userId = $session->read('Auth.id');
            if ($userId != null) {
                $data[$userfield['UserField']] = $userId;
                $data[$userfield['UserEditField']] = $userId;
            }
        }
    }

    public function beforeSave(Event $event, EntityInterface $entity, ArrayObject $options)
    {
        if (!$entity->isNew()) {
            $userfield = $this->getConfig();
            $session = new Session();
            $userId = $session->read('Auth.id');
            if ($userId != null) {
                $entity->{$userfield['UserEditField']} = $userId;
            }
        }
    }

}
