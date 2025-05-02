<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\BaseController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/collections')]
final class CollectionsController extends BaseController
{
    #[Route('/', methods: ['GET'], name: 'api.collections.index')]
    public function index(): Response
    {
        return $this->response(
            message: 'Collection items',
            data: [
                [
                    'id' => 1,
                    'name' => 'Collection item name',
                    'description' => 'Collection item description',
                ],
                [
                    'id' => 2,
                    'name' => 'Collection item name',
                    'description' => 'Collection item description',
                ],
            ]
        );
    }

    #[Route('/{id}', methods: ['GET'], name: 'api.collections.show')]
    public function show(int $id): Response
    {
        if ($id < 1) {
            return $this->response(
                message: 'Collection item not found',
                status: Response::HTTP_NOT_FOUND
            );
        }

        return $this->response(
            message: 'Collection item',
            data: [
                'id' => $id,
                'name' => 'Collection item name',
                'description' => 'Collection item description',
            ]
        );
    }

    #[Route('/', methods: ['POST'])]
    public function create(): Response
    {
        return $this->response(
            message: 'Collection item created',
            data: [
                'id' => 1,
                'name' => 'Collection item name',
                'description' => 'Collection item description',
            ]
        );
    }
}
