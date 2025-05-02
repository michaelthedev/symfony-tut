<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\BaseController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ApiController extends BaseController
{
    #[Route('/api/')]
    public function index(): Response
    {
        return $this->response(
            message: 'Symfony API',
            data: [
                'status' => 'success',
            ],
        );
    }
}
