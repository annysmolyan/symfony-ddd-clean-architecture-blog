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

namespace App\PostFeature\Domain\Interactor;

use App\PostFeature\Domain\Entity\Post;
use App\PostFeature\Domain\Factory\PostFactory;
use App\PostFeature\Domain\Repository\PostRepositoryInterface;

/**
 * Class PostLoadInteractor
 * @package App\PostFeature\Domain\Interactor
 *
 * Interactor represents a union of use cases. 1 use case = 1 business logic action.
 * e.g. loadById() method represents load post by id use case.
 * Interactor holds use cases for the sake of decreasing complexity of the code and decreasing dependencies for classes
 * which will need several use cases.
 *
 * WARNING! Interactors must not be changed or inherited.
 * Business logic can't be changed by 3-d party modules and layers
 */
final class PostLoadInteractor
{
    private PostRepositoryInterface $postRepository;
    private PostFactory $postFactory;

    /**
     * @param PostFactory $postFactory
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(
        PostFactory $postFactory,
        PostRepositoryInterface $postRepository
    ) {
        $this->postRepository = $postRepository;
        $this->postFactory = $postFactory;
    }

    /**
     * @param array|null $criteria
     * @return array
     */
    public function loadAll(array $criteria = null): array
    {
        return $this->postRepository->getList($criteria);
    }

    /**
     * @param int $id
     * @return Post|null
     */
    public function loadById(int $id): ?Post
    {
        return $this->postRepository->getById($id);
    }

    /**
     * @return Post
     */
    public function loadEmptyPost(): Post
    {
        return $this->postFactory->create();
    }

    /**
     * @param string $slug
     * @return Post|null
     */
    public function loadBySlug(string $slug): ?Post
    {
        return $this->postRepository->getBySlug($slug);
    }
}
