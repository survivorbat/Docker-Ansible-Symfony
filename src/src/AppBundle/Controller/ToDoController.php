<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ToDoItem;
use AppBundle\Form\ToDoItemType;
use AppBundle\Service\ToDoService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ToDoController extends Controller
{
    /** @var ToDoService $todoService */
    protected $todoService;

    /**
     * ToDoController constructor.
     * @param ToDoService $service
     */
    public function __construct(ToDoService $service)
    {
        $this->todoService = $service;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request): Response
    {
        $toDos = $this->todoService->findAll();

        return $this->render('@App/todo/index.html.twig', [
            'toDoItems' => $toDos,
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function createAction(Request $request): Response
    {
        $toDoItem = new ToDoItem();
        $form = $this->createForm(ToDoItemType::class, $toDoItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->todoService->save($toDoItem);

            $this->addFlash('info', 'Succesfully added ToDoItem!');

            return $this->redirectToRoute('app_todo_index');
        }

        return $this->render('@App/todo/form.html.twig', [
            'form' => $form->createView(),
            'toDoItem' => $toDoItem
        ]);
    }
}
