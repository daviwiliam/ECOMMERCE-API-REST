<?php

namespace App\Controller;

use App\Entity\Pedidos;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/pedidos", name="pedidos", methods={"GET"})
*/
class PedidosController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $pedidos =$this->getDoctrine()->getRepository(Pedidos::class)->findAll();

        return $this->json([
            'data' => $pedidos
        ]);
    }

    /**
    * @Route("/{pedidoId}", name="showr", methods={"GET"})
    */
    public function showr($pedidoId)
    {
        $pedido =$this->getDoctrine()->getRepository(Pedidos::class)->find($pedidoId);

        return $this->json([
            'data'=> $pedido
        ]);

    }

    /**
    * @Route("/", name="creater", methods={"POST"})
    */
    public function creater(Request $request)
    {
        $data = $request->request->all();

        $pedido = new Pedidos();
        $pedido->setNumeroPedido($data['numero_pedido']);
        $pedido->setStatusPedido($data['status_pedido']);
        $pedido->setProdutoPedido($data['produto_pedido']);
        $pedido->setDescricaoProdutoPedido($data['descricao_produto_pedido']);
        $pedido->setUsuarioComprador($data['usuario_comprador']);

        $doctrine = $this->getDoctrine()->getManager();

        $doctrine->persist($pedido);
        $doctrine->flush();

        return $this->json([
            'data' => 'Pedido criado!'
        ]);
    }

    /**
    * @Route("/{pedidoId}", name="updater", methods={"PUT", "PATCH"})
    */
    public function updater($pedidoId, Request $request)
    {
        $data = $request->request->all();
        $doctrine = $this->getDoctrine();

        $pedido = $doctrine->getRepository(Pedidos::class)->find($pedidoId);

        if($request->request->has('numero_pedido'))
            $pedido->setNumeroPedido($data['numero_pedido']);
        
        if($request->request->has('status_pedido'))
            $pedido->setStatusPedido($data['status_pedido']);

        if($request->request->has('produto_pedido'))    
            $pedido->setProdutoPedido($data['produto_pedido']);

        if($request->request->has('status_pedido'))
            $pedido->setStatusPedido($data['status_pedido']);

        if($request->request->has('descricao_produto_pedido'))
            $pedido->setDescricaoProdutoPedido($data['descricao_produto_pedido']);

        if($request->request->has('usuario_comprador'))
            $pedido->setUsuarioComprador($data['usuario_comprador']);

        $manager = $doctrine->getManager();
        $manager->flush();

        return $this->json([
            'data' => 'Pedido atualizado!'
        ]);
    }

}
