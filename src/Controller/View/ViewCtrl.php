<?php
namespace Controller\View;

use Entity\Question;
use Entity\Answer;

/**
* Manage Politik views
*/
class ViewCtrl
{
    public $opts = array('http' => array('ignore_errors' => true));
    protected $candidates = array(
        'François Hollande',
        'Alain Jupé',
        'Marine Lepen',
        'Emmanuel Macron',
        'Jean Luc Mélanchon'
    );
    protected $categories = array(
        'Chômage',
        'Culture',
        'Europe',
        'Environnement',
        'Education',
        'Immigration',
        'Impôts/Fiscalité',
        'Monde',
        'Retraite',
        'Santé'
    );

    public function __construct($c)
    {
        $this->logger = $c->get('logger');
        $this->view = $c->get('view');
    }

    // Render views

    public function renderIndex($req, $res, $arg)
    {
        $questions = Question::all()->sortByDesc('rate');
        return $this->view->render($res, 'index.html.twig', [
            'candidates' => $this->candidates,
            'categories' => $this->categories,
            'questions' => $questions
        ]);
    }

    public function renderAsk($req, $res, $arg)
    {
        return $this->view->render($res, 'ask.html.twig', [
            'candidates' => $this->candidates,
            'categories' => $this->categories
        ]);
    }

    // Methods

    public function newQuestion($req, $res, $arg)
    {
        $body = $req->getParsedBody();
        $question = new Question;
        $question->text = $body['text'];
        $question->target = $body['target'];
        $question->category = $body['category'];
        
        if ($question->save()) {
            return $res;
        } else {
            return $res->withStatus(500); 
        }
    }

    public function rateQuestion($req, $res, $arg)
    {
        $question = Question::find($arg['id']);
        $question->rate = $question->rate + 1;
        
        if ($question->save()) {
            return $res->withJson(array('rate' => $question->rate));
        } else {
            return $res->withStatus(500); 
        }
    }
}