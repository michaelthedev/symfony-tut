<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class MainController
{
    #[Route('/main')]
    public function index(): Response
    {
        // return html
        return new Response(
            '<h1>Hello, World!</h1></body>',
            Response::HTTP_OK,
        );
    }
}
