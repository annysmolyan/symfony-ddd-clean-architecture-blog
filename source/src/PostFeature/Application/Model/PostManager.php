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

namespace App\PostFeature\Application\Model;

use App\PostFeature\Domain\Entity\Post;
use App\PostFeature\Domain\Interactor\PostDeleteInteractor;
use App\PostFeature\Domain\Interactor\PostLoadInteractor;
use App\PostFeature\Domain\Interactor\PostSaveInteractor;

/**
 * Class PostManager
 * This class is for internal usage (inside this feature) only
 *
 * @package App\PostFeature\Application\Model
 */
class PostManager implements PostManagerInterface
{
    private PostLoadInteractor $postLoadInteractor;
    private PostSaveInteractor $postSaveInteractor;
    private PostDeleteInteractor $postDeleteInteractor;

    public function __construct(
        PostLoadInteractor $postLoadInteractor,
        PostSaveInteractor $postSaveInteractor,
        PostDeleteInteractor $postDeleteInteractor
    ) {
        $this->postLoadInteractor = $postLoadInteractor;
        $this->postSaveInteractor = $postSaveInteractor;
        $this->postDeleteInteractor = $postDeleteInteractor;
    }

    /**
     * @param array|null $criteria
     * @return array
     */
    public function getList(array $criteria = null): array
    {
        return $this->postLoadInteractor->loadAll($criteria);
    }

    /**
     * @param int $postId
     * @return Post|null
     */
    public function getById(int $postId): ?Post
    {
        return $this->postLoadInteractor->loadById($postId);
    }

    /**
     * @param string $slug
     * @return Post|null
     */
    public function getBySlug(string $slug): ?Post
    {
        return $this->postLoadInteractor->loadBySlug($slug);
    }

    /**
     * @return Post
     */
    public function initNewPost(): Post
    {
        return $this->postLoadInteractor->loadEmptyPost();
    }

    /**
     * @param Post $post
     * @return Post
     */
    public function create(Post $post): Post
    {
       return $this->postSaveInteractor->create($post);
    }

    /**
     * @param Post $post
     * @return Post
     */
    public function update(Post $post): Post
    {
        return $this->postSaveInteractor->update($post);
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id): void
    {
        $this->postDeleteInteractor->deleteById($id);
    }
}
