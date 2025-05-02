<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController extends BaseController
{
    #[Route('/main')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'userIsMichael' => false,
            'users' => [
                'Michael',
                'David',
                'Daniel',
                'Ezekiel',
            ],
            'app' => [
                'name' => 'Synt',
                'php_version' => PHP_VERSION,
            ],
        ]);
    }
}
