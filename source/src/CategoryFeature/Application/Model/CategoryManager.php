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
use App\CategoryFeature\Domain\Interactor\CategoryDeleteInteractor;
use App\CategoryFeature\Domain\Interactor\CategoryLoadInteractor;
use App\CategoryFeature\Domain\Interactor\CategorySaveInteractor;

/**
 * Class CategoryManager
 * @package App\CategoryFeature\Application\Model
 *
 * This class is for internal usage (inside this feature) only
 **/
class CategoryManager implements CategoryManagerInterface
{
    private CategorySaveInteractor $categorySaveInteractor;
    private CategoryDeleteInteractor $categoryDeleteInteractor;
    private CategoryLoadInteractor $categoryLoadInteractor;

    /**
     * @param CategorySaveInteractor $categorySaveInteractor
     * @param CategoryDeleteInteractor $categoryDeleteInteractor
     * @param CategoryLoadInteractor $categoryLoadInteractor
     */
    public function __construct(
        CategorySaveInteractor $categorySaveInteractor,
        CategoryDeleteInteractor $categoryDeleteInteractor,
        CategoryLoadInteractor $categoryLoadInteractor,
    ) {
        $this->categorySaveInteractor = $categorySaveInteractor;
        $this->categoryDeleteInteractor = $categoryDeleteInteractor;
        $this->categoryLoadInteractor = $categoryLoadInteractor;
    }

    /**
     * @param array|null $criteria
     * @return array
     */
    public function getList(array $criteria = null): array
    {
        return $this->categoryLoadInteractor->loadAll($criteria);
    }

    /**
     * @param int $categoryId
     * @return Category|null
     */
    public function getById(int $categoryId): ?Category
    {
        return $this->categoryLoadInteractor->loadById($categoryId);
    }

    /**
     * @param string $slug
     * @return Category|null
     */
    public function getBySlug(string $slug): ?Category
    {
        return $this->categoryLoadInteractor->loadBySlug($slug);
    }

    /**
     * @return Category
     */
    public function initNewCategory(): Category
    {
        return $this->categoryLoadInteractor->loadEmptyCategory();
    }

    /**
     * @param Category $category
     * @return Category
     */
    public function create(Category $category): Category
    {
        return $this->categorySaveInteractor->create($category);
    }

    /**
     * @param Category $category
     * @return Category
     */
    public function update(Category $category): Category
    {
        return $this->categorySaveInteractor->update($category);
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id): void
    {
        $this->categoryDeleteInteractor->deleteById($id);
    }
}
