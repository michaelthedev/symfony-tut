<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseController extends AbstractController
{
    final protected function response(
        string $message,
        array|\JsonSerializable $data = [],
    ): Response {
        return new Response();
    }
}
