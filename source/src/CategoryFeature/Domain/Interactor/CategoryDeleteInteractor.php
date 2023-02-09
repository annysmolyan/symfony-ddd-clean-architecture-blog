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
 * Class CategoryDeleteInteractor
 * @package App\CategoryFeature\Domain\Interactor
 *
 * Interactor represents a union of use cases. 1 use case = 1 business logic action.
 * e.g. deleteById() method represents delete category by id use case.
 * Interactor holds use cases for the sake of decreasing complexity of the code and decreasing dependencies for classes
 * which will need several use cases.
 *
 * WARNING! Interactors must not be changed or inherited.
 * Business logic can't be changed by 3-d party modules and layers
 */
final class CategoryDeleteInteractor
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
     * @param int $id
     * @return void
     * @throws DomainException
     */
    public function deleteById(int $id): void
    {
        $category = $this->categoryRepository->getById($id);

        if (null == $category) {
            throw new DomainException(sprintf("Category with id %s does not exist", $id));
        }

        $this->categoryRepository->deleteById($id);
    }

    /**
     * @param Category $category
     * @return void
     * @throws DomainException
     */
    public function delete(Category $category): void
    {
        $categoryId = $category->getId()->getValue();

        if (null == $categoryId) {
            throw new DomainException("Can't remove category without Id");
        }

        $this->categoryRepository->deleteById($categoryId);
    }
}
