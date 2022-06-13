<?php

namespace App\Controller;

use App\Entity\Produtos;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/produtos", name="produtos", methods={"GET"})
*/
class ProdutosController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index()
    {
        $produtos =$this->getDoctrine()->getRepository(Produtos::class)->findAll();

        return $this->json([
            'data' => $produtos
        ]);
    }

    /**
    * @Route("/{produtoId}", name="showp", methods={"GET"})
    */
    public function showp($produtoId)
    {
        $produto =$this->getDoctrine()->getRepository(Produtos::class)->find($produtoId);

        return $this->json([
            'data'=> $produto
        ]);

    }

    /**
    * @Route("/", name="createp", methods={"POST"})
    */
    public function createp(Request $request)
    {
        $data = $request->request->all();

        $produto = new Produtos();
        $produto->setNomeProduto($data['nome_produto']);
        $produto->setDescricaoProduto($data['descricao_produto']);
        $produto->setPreco($data['preco']);
        $produto->setStatusProduto($data['status_produto']);

        $doctrine = $this->getDoctrine()->getManager();

        $doctrine->persist($produto);
        $doctrine->flush();

        return $this->json([
            'data' => 'Produto criado!'
        ]);
    }

    /**
    * @Route("/{produtoId}", name="updatep", methods={"PUT", "PATCH"})
    */
    public function updatep($produtoId, Request $request)
    {
        $data = $request->request->all();
        $doctrine = $this->getDoctrine();

        $produto = $doctrine->getRepository(Produtos::class)->find($produtoId);

        if($request->request->has('nome_produto'))
            $produto->setNomeProduto($data['nome_produto']);
        
        if($request->request->has('descricao_produto'))
            $produto->setDescricaoProduto($data['descricao_produto']);

        if($request->request->has('preco'))    
            $produto->setPreco($data['preco']);

        if($request->request->has('status_produto'))
            $produto->setStatusProduto($data['status_produto']);

        $manager = $doctrine->getManager();
        $manager->flush();

        return $this->json([
            'data' => 'Produto atualizado!'
        ]);
    }

}

