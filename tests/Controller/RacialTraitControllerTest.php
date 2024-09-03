<?php

namespace App\Test\Controller;

use App\Entity\RacialTrait;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RacialTraitControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private EntityManagerInterface $manager;
    private EntityRepository $repository;
    private string $path = '/racial/trait/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->manager = static::getContainer()->get('doctrine')->getManager();
        $this->repository = $this->manager->getRepository(RacialTrait::class);

        foreach ($this->repository->findAll() as $object) {
            $this->manager->remove($object);
        }

        $this->manager->flush();
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('RacialTrait index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'racial_trait[size]' => 'Testing',
            'racial_trait[speed]' => 'Testing',
            'racial_trait[extraLanguage]' => 'Testing',
            'racial_trait[abilityBonus]' => 'Testing',
            'racial_trait[racialAbility]' => 'Testing',
            'racial_trait[race]' => 'Testing',
        ]);

        self::assertResponseRedirects('/sweet/food/');

        self::assertSame(1, $this->getRepository()->count([]));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new RacialTrait();
        $fixture->setSize('My Title');
        $fixture->setSpeed('My Title');
        $fixture->setExtraLanguage('My Title');
        $fixture->setAbilityBonus('My Title');
        $fixture->setRacialAbility('My Title');
        $fixture->setRace('My Title');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('RacialTrait');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new RacialTrait();
        $fixture->setSize('Value');
        $fixture->setSpeed('Value');
        $fixture->setExtraLanguage('Value');
        $fixture->setAbilityBonus('Value');
        $fixture->setRacialAbility('Value');
        $fixture->setRace('Value');

        $this->manager->persist($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'racial_trait[size]' => 'Something New',
            'racial_trait[speed]' => 'Something New',
            'racial_trait[extraLanguage]' => 'Something New',
            'racial_trait[abilityBonus]' => 'Something New',
            'racial_trait[racialAbility]' => 'Something New',
            'racial_trait[race]' => 'Something New',
        ]);

        self::assertResponseRedirects('/racial/trait/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getSize());
        self::assertSame('Something New', $fixture[0]->getSpeed());
        self::assertSame('Something New', $fixture[0]->getExtraLanguage());
        self::assertSame('Something New', $fixture[0]->getAbilityBonus());
        self::assertSame('Something New', $fixture[0]->getRacialAbility());
        self::assertSame('Something New', $fixture[0]->getRace());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();
        $fixture = new RacialTrait();
        $fixture->setSize('Value');
        $fixture->setSpeed('Value');
        $fixture->setExtraLanguage('Value');
        $fixture->setAbilityBonus('Value');
        $fixture->setRacialAbility('Value');
        $fixture->setRace('Value');

        $this->manager->remove($fixture);
        $this->manager->flush();

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertResponseRedirects('/racial/trait/');
        self::assertSame(0, $this->repository->count([]));
    }
}
