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


namespace App\PostFeature\Domain\Repository;

use App\PostFeature\Domain\Entity\Post;

/**
 * Interface PostRepositoryInterface
 * @package App\PostFeature\Domain\Repoitory
 *
 * Domain layer NEVER implements repository. Domain doesn't know anything about data storages.
 * Domain uses behavior description, repository must be implemented in Infrastructure layer according to a source
 * (eg. DB, Session and so on)
 */
interface PostRepositoryInterface
{
    /**
     * @param Post $post
     * @return Post
     */
    public function save(Post $post): Post;

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id): void;

    /**
     * @param array|null $criteria
     * @return array
     */
    public function getList(array $criteria = null): array;

    /**
     * @param int $id
     * @return Post|null
     */
    public function getById(int $id): ?Post;

    /**
     * @param string $slug
     * @return Post|null
     */
    public function getBySlug(string $slug): ?Post;
}
