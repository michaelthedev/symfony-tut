<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/products')]
final class ProductController extends BaseController
{
    #[Route('/', name: 'products.index')]
    public function index(ProductRepository $repository): Response
    {
        return $this->render('product/index.html.twig', [
            'products' => $repository->findAll(),
        ]);
    }

    #[Route('/{id<\d+>}', name: 'products.show')]
    public function show(Product $product): Response
    {
        return $this->render('product/show.html.twig', [
            'product' => $product,
        ]);
    }

    #[Route('/create', methods: ['GET'], name: 'products.create')]
    public function create(): Response
    {
        return $this->render('product/create.html.twig');
    }

    #[Route('/create', methods: ['POST'], name: 'products.store')]
    public function store(Request $request, EntityManagerInterface $manager): Response
    {
        $product = new Product();
        $product->setName($request->get('name'));
        $product->setDescription($request->get('description'));
        $product->setPrice((float) $request->get('price'));

        $manager->persist($product);
        $manager->flush();

        return $this->response(
            message: 'Product created',
            data: $product->toArray(),
            status: Response::HTTP_CREATED
        );
    }
}
