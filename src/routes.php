<?php
// Routes
use Controller\View\ViewCtrl;

/**
 * GET /index
 */
$app->get('/', 
    ViewCtrl::class . ':renderIndex');

/**
 * GET /questions
 */
$app->get('/questions', 
    ViewCtrl::class . ':renderQuestions');

/**
 * GET /answers
 */
$app->get('/answers', 
    ViewCtrl::class . ':renderAnswers');

/**
 * POST /api/newquestion
 */
$app->post('/api/newquestion', 
    ViewCtrl::class . ':newQuestion');

/**
 * POST /api/ratequestion/[id]
 */
$app->post('/api/ratequestion/{id}', 
    ViewCtrl::class . ':rateQuestion');

/**
 * POST /api/rateanswer/[id]
 */
$app->post('/api/rateanswer/{id}', 
    ViewCtrl::class . ':rateAnswer');
