<?php


namespace App\Controller;

class WindyController extends AbstractController
{
    public function cam()
    {
        $camData = $this->get('https://api.windy.com/api/webcams/v2/list/country=FR?key=' . APP_API_KEY);
        $webcams = $camData['result']['webcams'];
        $camData = $webcams[rand(0, count($webcams) - 1)];
        $webcam = $this->get('https://api.windy.com/api/webcams/v2/list/webcam=' . $camData['id'] .
                             '?show=webcams:image,location,player&key=' . APP_API_KEY);
        //var_dump($webcams); die;
        $iframeSrc = $webcam['result']['webcams'][0]['player']['lifetime']['embed'];
        return $this->twig->render('Windy/cam.html.twig', [
            'iframe_src' => $iframeSrc,
            'api_key'  => APP_API_KEY,
        ]);
    }

    public function country()
    {
        $countries = [
            'france' => 1228218512,
            'italie' => 1230041254,

        ];
        $webcams = [];
        foreach ($countries as $country => $id) {
            $webcam = $this->get('https://api.windy.com/api/webcams/v2/list/webcam=' . $id . '?show=webcams:image,location,player&key=' . APP_API_KEY);
            $webcams[$country] = $webcam['result']['webcams'][0]['player']['lifetime']['embed'];
        }

        return $this->twig->render('Windy/country.html.twig', [
            'webcams' => $webcams,
        ]);
    }
}
