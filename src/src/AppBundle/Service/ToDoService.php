<?php

namespace AppBundle\Service;

use AppBundle\Entity\ToDoItem;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class ToDoService
{
    /** @var EntityRepository $todoRepository */
    protected $todoRepository;

    /** @var EntityManagerInterface $em */
    protected $em;

    /**
     * ToDoService constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->todoRepository = $em->getRepository(ToDoItem::class);
    }

    /**
     * @return ToDoItem[]|array
     */
    public function findAll(): array
    {
        return $this->todoRepository->findAll();
    }

    /**
     * @param ToDoItem $toDoItem
     */
    public function save(ToDoItem $toDoItem): void
    {
        $this->em->persist($toDoItem);
        $this->em->flush();

        return;
    }

    /**
     * @param ToDoItem $toDoItem
     */
    public function delete(ToDoItem $toDoItem): void
    {
        $this->em->remove($toDoItem);
        $this->em->flush();

        return;
    }
}
