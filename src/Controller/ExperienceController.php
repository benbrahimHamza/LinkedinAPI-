<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Experience;

class ExperienceController extends AbstractController
{
    /**
     * @Route("/experience", name="experience")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ExperienceController.php',
        ]);
    }
}
