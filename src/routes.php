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
 * PUT /api/newquestion
 */
$app->put('/api/newquestion', 
    ViewCtrl::class . ':newQuestion');

/**
 * PATCH /api/ratequestion/[id]
 */
$app->patch('/api/ratequestion/{id}', 
    ViewCtrl::class . ':rateQuestion');

