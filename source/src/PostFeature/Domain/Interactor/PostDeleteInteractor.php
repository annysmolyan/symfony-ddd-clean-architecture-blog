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
use App\PostFeature\Domain\Repository\PostRepositoryInterface;
use DomainException;

/**
 * Class PostDeleteInteractor
 * @package App\PostFeature\Domain\Interactor
 *
 * Interactor represents a union of use cases. 1 use case = 1 business logic action.
 * e.g. deleteById() method represents delete post by id use case.
 * Interactor holds use cases for the sake of decreasing complexity of the code and decreasing dependencies for classes
 * which will need several use cases.
 *
 * WARNING! Interactors must not be changed or inherited.
 * Business logic can't be changed by 3-d party modules and layers
 */
final class PostDeleteInteractor
{
    private PostRepositoryInterface $postRepository;

    /**
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @param int $id
     * @return void
     * @throws DomainException
     */
    public function deleteById(int $id): void
    {
        $post = $this->postRepository->getById($id);

        if (null == $post) {
            throw new DomainException(sprintf("Post with id %s does not exist", $id));
        }

        $this->postRepository->deleteById($id);
    }

    /**
     * @param Post $post
     * @return void
     * @throws DomainException
     */
    public function delete(Post$post): void
    {
        $postId = $post->getId()->getValue();

        if (null == $postId) {
            throw new DomainException("Can't remove post without Id");
        }

        $this->postRepository->deleteById($postId);
    }
}
