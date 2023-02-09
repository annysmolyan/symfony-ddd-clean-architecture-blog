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

namespace App\CategoryFeature\Domain\Interactor;

use App\CategoryFeature\Domain\Entity\Category;
use App\CategoryFeature\Domain\Repository\CategoryRepositoryInterface;
use DomainException;

/**
 * Class CategorySaveInteractor
 * @package App\CategoryFeature\Domain\Interactor
 *
 * Interactor represents a union of use cases. 1 use case = 1 business logic action.
 * e.g. update() method represents update category use case.
 * Interactor holds use cases for the sake of decreasing complexity of the code and decreasing dependencies for classes
 * which will need several use cases.
 *
 * WARNING! Interactors must not be changed or inherited.
 * Business logic can't be changed by 3-d party modules and layers
 */
final class CategorySaveInteractor
{
    private CategoryRepositoryInterface $categoryRepository;

    /**
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * TODO check unique slug?
     * @param Category $category
     * @return Category
     */
    public function update(Category $category): Category
    {
        if (!$category->getSlug()->getValue()) {
            throw new DomainException("Category must have a slug");
        }

        $categoryId = $category->getId()->getValue();
        $existedCategory = $this->categoryRepository->getById($categoryId);

        if (null == $existedCategory) {
            throw new DomainException(sprintf("Category with id %s does not exist", $categoryId));
        }

        return $this->categoryRepository->save($category);
    }

    /**
     * @param Category $category
     * @return Category
     */
    public function create(Category $category): Category
    {
        $slug = $category->getSlug()->getValue();

        if (!$slug) {
            throw new DomainException("Category must have a slug");
        }

        $existedCategory = $this->categoryRepository->getBySlug($slug);

        if (null != $existedCategory) {
            throw new DomainException(sprintf("Category slug '%s' already exists", $slug));
        }

        return $this->categoryRepository->save($category);
    }
}
