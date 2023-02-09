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

use App\DoctrineDataFeature\Domain\Entity\Post;
use App\DoctrineDataFeature\Domain\Repository\PostRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\Persistence\ManagerRegistry;
use InvalidArgumentException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class PostRepository
 * Work directly with data storage
 *
 * @package App\DoctrineDataFeature\Infrastructure\Repository
 *
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository implements PostRepositoryInterface
{
    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    /**
     * @param Post $post
     * @return Post
     */
    public function save(Post $post): Post
    {
        if ($post->getId()) {
            $this->_em->merge($post);
        } else {
            $this->_em->persist($post);
        }

        $this->_em->flush();

        return $post;
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
     * @return Post|null
     */
    public function getById(int $id): ?Post
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
        $post = $this->find($id);

        if (!$post) {
            throw new NotFoundHttpException(sprintf("The post with ID '%s' doesn't exist", $id));
        }

        $this->delete($post);
    }

    /**
     * @param object $post
     * @return void
     */
    public function delete(object $post): void
    {
        if (!$post instanceof Post) {
            throw new InvalidArgumentException(
                sprintf('You can only pass %s entity to this repository.', Post::class)
            );
        }

        $this->_em->remove($post);
        $this->_em->flush();
    }
}
