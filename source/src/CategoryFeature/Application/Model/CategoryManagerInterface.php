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

namespace App\CategoryFeature\Application\Model;

use App\CategoryFeature\Domain\Entity\Category;

/**
 * Interface CategoryManagerInterface
 * @package App\CategoryFeature\Application\Model
 **/
interface CategoryManagerInterface
{
    /**
     * @param array|null $criteria
     * @return array
     */
    public function getList(array $criteria = null): array;

    /**
     * @param int $categoryId
     * @return Category|null
     */
    public function getById(int $categoryId): ?Category;

    /**
     * @param string $slug
     * @return Category|null
     */
    public function getBySlug(string $slug): ?Category;

    /**
     * @return Category
     */
    public function initNewCategory(): Category;

    /**
     * @param Category $category
     * @return Category
     */
    public function create(Category $category): Category;

    /**
     * @param Category $category
     * @return Category
     */
    public function update(Category $category): Category;

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id): void;
}
