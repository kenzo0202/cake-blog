<?php
/**
 * Created by PhpStorm.
 * User: kenzo
 * Date: 2016/06/25
 * Time: 14:24
 */

namespace App\Controller;


/**
 * @property bool|object Articles
 */
class ArticlesController extends AppController
{
    public function index(){
        $articles = $this->Articles->find("all");
        $this->set(compact('articles'));
    }

    public function view($id = null){
        $article = $this->Articles->get($id);
        $this->set(compact('article'));
    }

    public function add(){

        $article = $this->Articles->newEntity();
        if($this->request->is('post')){
            $article = $this->Articles->patchEntity($article,$this->request->data);
            //コンポーネントで提供されている user() 関数は、現在ログインしているユーザのカラムを返す
            $article->user_id = $this->Auth->user('id');

            if($this->Articles->save($article)){
                $this->Flash->set("good");
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->set("error");
        }

        $this->set('article',$article);

        // Just added the categories list to be able to choose
        // one category for an article
        $categories = $this->Articles->Categories->find('treeList');
        $this->set(compact('categories'));
    }

    public function edit($id = null){

        $article = $this->Articles->get($id);
        if($this->request->is(['post','put'])){
            $this->Articles->patchEntity($article,$this->request->data);
            if($this->Articles->save($article)){
                $this->Flash->success(__('できたよ！'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('できなかったよ'));
        }

        $this->set('article', $article);
    }

    public function delete($id = null){

        $article = $this->Articles->get($id);
        if($this->request->is(['post','delete'])){
            if($this->Articles->delete($article)){
                $this->Flash->success(__('success deleted'));
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->Flash->error(__('できなかったよ'));
    }

    public function isAuthorized($user)
    {
        if($this->request->action === 'add'){
            return true;
        }

        if(in_array($this->request->action,['edit','delete'])){
            $articleId = (int)$this->request->params['pass'][0];
            if($this->Articles->isOwnby($articleId,$user['id'])){
                return true;
            }
        }

        return parent::isAuthorized($user);

    }

    public function isOwnby($articleId,$user_id){
        return $this->exists(['id' => $articleId,'user_id'=> $user_id ]);
    }
}