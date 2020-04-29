<?php


namespace App\Controller;


class WindyController extends AbstractController
{
    public function cam()
    {
        $camData = $this->get('https://api.windy.com/api/webcams/v2/?key=' . APP_API_KEY);

        return $this->twig->render('Windy/cam.html.twig', [
            'cam_data' => $camData,
        ]);
    }
}