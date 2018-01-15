<?php
// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class LuckyController
{
    /**
     * @Route("/lucky/number/{max}")
     */
    public function numberAction($max)
    {
        $number = mt_rand(0, $max);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}
