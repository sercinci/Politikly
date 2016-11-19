<?php
// Routes
use Controller\View\ViewCtrl;

/**
 * GET /index
 */
$app->get('/', 
    ViewCtrl::class . ':renderIndex');

/**
 * GET /ask
 */
$app->get('/ask', 
    ViewCtrl::class . ':renderAsk');

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

