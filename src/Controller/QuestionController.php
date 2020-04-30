<?php


namespace App\Controller;


class QuestionController extends AbstractController
{
    private $errors = [];

    private function validateAnswer()
    {
        $countries = [
            'france' => 1228218512,
            'italie' => 1230041254,

        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $countries['italie'] = $_POST['validation'];
            return 'bonne réponse';
        }
    }
}