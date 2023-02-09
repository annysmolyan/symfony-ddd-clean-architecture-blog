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

/**
 * Interface PostManagerInterface
 * @package App\PostFeature\Application\Model
 */
interface PostManagerInterface
{
    /**
     * @param array|null $criteria
     * @return array
     */
    public function getList(array $criteria = null): array;

    /**
     * @param int $postId
     * @return Post|null
     */
    public function getById(int $postId): ?Post;

    /**
     * @param string $slug
     * @return Post|null
     */
    public function getBySlug(string $slug): ?Post;

    /**
     * @return Post
     */
    public function initNewPost(): Post;

    /**
     * @param Post $post
     * @return Post
     */
    public function create(Post $post): Post;

    /**
     * @param Post $post
     * @return Post
     */
    public function update(Post $post): Post;

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id): void;
}
