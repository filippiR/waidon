<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Activities Controller
 *
 * @property \App\Model\Table\ActivitiesTable $Activities
 * @method \App\Model\Entity\Activity[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ActivitiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $created = $this->request->getQuery('created');
        $createdEnd = $this->request->getQuery('created_end');
        $company_id = $this->request->getQuery('company_id');
        $inlist = $this->request->getQuery('inlist');
        $date = !empty($created) ? $created : date('Y-m-d');
        $inList = !empty($inlist) ? $inlist : false;

        $now = $date . ' 00:00:00';
        if($createdEnd==''){
            $endOfDay = $date . ' 23:59:59';
        }else{
            $endOfDay = $createdEnd.' 23:59:59';
        }
        $query = $date;
        $conditions = [
            'Activities.created >=' => $now,
            'Activities.created <=' => $endOfDay,
            'Activities.user_id' => $this->request->getAttribute('identity')->get('id')
        ];


        if (!empty($company_id)) {
            $conditions['Activities.company_id'] = $company_id;
        }

        $this->paginate = [
            'contain' => ['Companies', 'Systems', 'Users'],
            'conditions' => $conditions
        ];

        $activities = $this->paginate($this->Activities);
        $companies = $this->Activities->Companies->find('list',['conditions' => ['Companies.user_id' =>$this->request->getAttribute('identity')->get('id')]]);
        $this->set(compact('activities', 'query', 'inlist', 'companies', 'company_id','createdEnd'));
        if ($inlist == true)
            $this->render('activities_in_list');
    }


    /**
     * View method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $activity = $this->Activities->get($id, [
            'contain' => ['Companies', 'Systems', 'Users'],
        ]);

        $this->set(compact('activity'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $companyDefaultId = $this->request->getQuery('company_id');
        $activity = $this->Activities->newEmptyEntity();
        if ($this->request->is('post')) {
            $activity = $this->Activities->patchEntity($activity, $this->request->getData());
            if ($this->Activities->save($activity)) {
                $this->Flash->success(__('The activity has been saved.'));

                return $this->redirect(['action' => 'index', '?' => ['company_id' => $activity->company_id]]);
            }
            $this->Flash->error(__('The activity could not be saved. Please, try again.'));
        }
        $companies = $this->Activities->Companies->find('list',['conditions' => ['Companies.user_id' =>$this->request->getAttribute('identity')->get('id')]]);
        $systems = $this->Activities->Systems->find('list', ['conditions' => ['Systems.user_id' =>$this->request->getAttribute('identity')->get('id')]]);
        $this->set(compact('activity', 'companies', 'systems', 'companyDefaultId'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadComponent('Redirect');
        $this->Redirect->saveReferer();
        $activity = $this->Activities->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $activity = $this->Activities->patchEntity($activity, $this->request->getData());
            if ($this->Activities->save($activity)) {
                $this->Flash->success(__('The activity has been saved.'));

                return $this->redirect($this->Redirect->getRedirectUrlByParams());
            }
            $this->Flash->error(__('The activity could not be saved. Please, try again.'));
        }
        $companies = $this->Activities->Companies->find('list',['conditions' => ['Companies.user_id' =>$this->request->getAttribute('identity')->get('id')]]);
        $systems = $this->Activities->Systems->find('list', ['conditions' => ['Systems.user_id' =>$this->request->getAttribute('identity')->get('id')]]);
        $this->set(compact('activity', 'companies', 'systems'));

        $this->render('add');
    }

    /**
     * Delete method
     *
     * @param string|null $id Activity id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->loadComponent('Redirect');
        $this->Redirect->saveReferer();
        $activity = $this->Activities->get($id);
        $this->request->allowMethod(['post', 'delete']);
        if ($this->Activities->delete($activity)) {
            $this->Flash->success(__('The activity has been deleted.'));
        } else {
            $this->Flash->error(__('The activity could not be deleted. Please, try again.'));
        }

        return $this->redirect($this->Redirect->getRedirectUrlByParams());
    }
}
