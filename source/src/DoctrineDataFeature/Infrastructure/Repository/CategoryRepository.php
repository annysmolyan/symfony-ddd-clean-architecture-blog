<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the GNU General Public License v3 (GPL 3.0)
 * It is available through the world-wide-web at this URL:
 * https://www.gnu.org/licenses/gpl-3.0.en.html
 *
 * @license    https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License v3 (GPL 3.0)
 */

declare(strict_types=1);

namespace App\DoctrineDataFeature\Infrastructure\Repository;

use App\DoctrineDataFeature\Domain\Entity\Category;
use App\DoctrineDataFeature\Domain\Repository\CategoryRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;
use InvalidArgumentException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class CategoryRepository
 * Work directly with data storage
 *
 * @package App\DoctrineDataFeature\Infrastructure\Persistence\Doctrine
 *
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 **/
class CategoryRepository extends ServiceEntityRepository implements CategoryRepositoryInterface
{
    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    /**
     * @param Category $category
     * @return Category
     */
    public function save(Category $category): Category
    {
        if ($category->getId()) {
            $this->_em->merge($category);
        } else {
            $this->_em->persist($category);
        }

        $this->_em->flush();

        return $category;
    }

    /**
     * @return object[]
     */
    public function getList(array $criteria = null): array
    {
        if (!$criteria) {
            return $this->findAll();
        }

        return $this->findBy($criteria);
    }

    /**
     * @param int $id
     * @return Category|null
     */
    public function getById(int $id): ?Category
    {
        return $this->find($id);
    }

    /**
     * @param string $slug
     * @return object|null
     * @throws NonUniqueResultException
     */
    public function getBySlug(string $slug): ?object
    {
        $qb = $this->createQueryBuilder('q')
            ->where('q.slug = :slug')
            ->setParameter('slug', $slug);

        $query = $qb->getQuery();

        return $query->setMaxResults(1)->getOneOrNullResult();
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id): void
    {
        $category = $this->find($id);

        if (!$category) {
            throw new NotFoundHttpException(sprintf("The category with ID '%s' doesn't exist", $id));
        }

        $this->delete($category);
    }

    /**
     * @param object $category
     * @return void
     */
    public function delete(object $category): void
    {
        if (!$category instanceof Category) {
            throw new InvalidArgumentException(
                sprintf('You can only pass %s entity to this repository.', Category::class)
            );
        }

        $this->_em->remove($category);
        $this->_em->flush();
    }
}
