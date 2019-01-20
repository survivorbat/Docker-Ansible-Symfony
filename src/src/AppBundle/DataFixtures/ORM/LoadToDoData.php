<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\ToDoItem;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class LoadToDoData extends AbstractFixture implements OrderedFixtureInterface
{
    const AMOUNT = 10;

    /** @var Factory $faker */
    protected $faker;

    public function __construct()
    {
        $this->faker = Factory::create('en');
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {
        $relatedToDoItems = [];

        for ($i = 0; $i < self::AMOUNT; $i++) {
            $toDoItem = new ToDoItem();
            $toDoItem
                ->setStatus($this->faker->randomElement(ToDoItem::getPossibleStatuses()))
                ->setTitle($this->faker->title)
                ->setDescription($this->faker->paragraph)
                ->setRelatedToDoItems(
                    $this->faker->randomElements($relatedToDoItems, random_int(0, count($relatedToDoItems)))
                );

            $manager->persist($toDoItem);

            $this->addReference('todoitem_' . $i, $toDoItem);
            $relatedToDoItems[] = $toDoItem;
        }

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return int
     */
    public function getOrder(): int
    {
        return 0;
    }
}
