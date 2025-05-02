<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

abstract class BaseController extends AbstractController
{
    final protected function response(
        string $message,
        array|\JsonSerializable|null $data = null,
        int $status = 200,
    ): JsonResponse {
        return $this->json([
            'message' => $message,
            'data' => $data,
        ], $status);
    }
}
