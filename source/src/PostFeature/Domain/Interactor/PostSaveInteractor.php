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
 * Class PostSaveInteractor
 * @package App\PostFeature\Domain\Interactor
 *
 * Interactor represents a union of use cases. 1 use case = 1 business logic action.
 * e.g. save() method represents save post use case.
 * Interactor holds use cases for the sake of decreasing complexity of the code and decreasing dependencies for classes
 * which will need several use cases.
 *
 * WARNING! Interactors must not be changed or inherited.
 * Business logic can't be changed by 3-d party modules and layers
 */
final class PostSaveInteractor
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
     * TODO check unique slug?
     * @param Post $post
     * @return Post
     */
    public function update(Post $post): Post
    {
        if (!$post->getSlug()->getValue()) {
            throw new DomainException("Post must have a slug");
        }

        $postId = $post->getId()->getValue();
        $existedPost = $this->postRepository->getById($postId);

        if (null == $existedPost) {
            throw new DomainException(sprintf("Post with id %s does not exist", $postId));
        }

        return $this->postRepository->save($post);
    }

    /**
     * @param Post $post
     * @return Post
     */
    public function create(Post $post): Post
    {
        $slug = $post->getSlug()->getValue();

        if (!$slug) {
            throw new DomainException("Post must have a slug");
        }

        $existedPost = $this->postRepository->getBySlug($slug);

        if (null != $existedPost) {
            throw new DomainException(sprintf("Post slug '%s' already exists", $slug));
        }

        return $this->postRepository->save($post);
    }
}
