<?php


namespace App\Controller;

class WindyController extends AbstractController
{
    public function cam()
    {
        $camData = $this->get('https://api.windy.com/api/webcams/v2/list/country=IT?key=' . APP_API_KEY);
        $webcams = $camData['result']['webcams'];
        $camData = $webcams[rand(0, count($webcams) - 1)];
        $webcam = $this->get('https://api.windy.com/api/webcams/v2/list/webcam=' . $camData['id'] .
                             '?show=webcams:image,location,player&key=' . APP_API_KEY);
        $iframeSrc = $webcam['result']['webcams'][0]['player']['lifetime']['embed'];
        //var_dump($iframeSrc); die;
        return $this->twig->render('Windy/cam.html.twig', [
            'iframe_src' => $iframeSrc,
            'api_key'  => APP_API_KEY,
        ]);
    }
}