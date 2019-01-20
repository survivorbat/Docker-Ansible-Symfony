<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Timestampable\Traits\TimestampableEntity;

class ToDoItem
{
    const STATUS_TODO = 'Todo';
    const STATUS_DOING = 'Doing';
    const STATUS_DONE = 'Done';

    /**
     * @return array
     */
    public static function getPossibleStatuses()
    {
        return [self::STATUS_DOING, self::STATUS_DONE, self::STATUS_TODO];
    }

    use TimestampableEntity;

    /** @var string $id */
    protected $id = '';

    /** @var string $title */
    protected $title = '';

    /** @var string $description */
    protected $description = '';

    /** @var string $status */
    protected $status = self::STATUS_TODO;

    /** @var ToDoItem[]|array $relatedToDos */
    protected $relatedToDoItems;

    /**
     * ToDoItem constructor.
     */
    public function __construct()
    {
        $this->relatedToDoItems = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return ToDoItem
     */
    public function setId(string $id): ToDoItem
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return ToDoItem
     */
    public function setTitle(string $title): ToDoItem
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return ToDoItem
     */
    public function setDescription(string $description): ToDoItem
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return ToDoItem
     */
    public function setStatus(string $status): ToDoItem
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return ToDoItem[]|array
     */
    public function getRelatedToDoItems()
    {
        return $this->relatedToDoItems;
    }

    /**
     * @param ToDoItem[]|array $relatedToDoItems
     * @return ToDoItem
     */
    public function setRelatedToDoItems($relatedToDoItems)
    {
        $this->relatedToDoItems = $relatedToDoItems;
        return $this;
    }
}
