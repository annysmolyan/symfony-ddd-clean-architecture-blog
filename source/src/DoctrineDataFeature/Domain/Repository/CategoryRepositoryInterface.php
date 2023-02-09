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

namespace App\DoctrineDataFeature\Domain\Repository;

use App\DoctrineDataFeature\Domain\Entity\Category;

/**
 * Interface CategoryRepositoryInterface
 * @package App\DoctrineDataFeature\Domain\Repository
 *
 * Domain layer NEVER implements repository. Domain doesn't know anything about data storages.
 * Domain uses behavior description, repository must be implemented in Infrastructure layer according to a source
 * (eg. DB, Session and so on)
 **/
interface CategoryRepositoryInterface
{
    /**
     * @param Category $category
     * @return Category
     */
    public function save(Category $category): Category;

    /**
     * @param array|null $criteria
     * @return array
     */
    public function getList(array $criteria = null): array;

    /**
     * @param int $id
     * @return object|null
     */
    public function getById(int $id): ?object;

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id): void;

    /**
     * @param object $category
     * @return void
     */
    public function delete(object $category): void;

    /**
     * @param string $slug
     * @return object|null
     */
    public function getBySlug(string $slug): ?object;
}
