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
use App\CategoryFeature\Domain\Factory\CategoryFactory;
use App\CategoryFeature\Domain\Repository\CategoryRepositoryInterface;

/**
 * Class CategoryLoadInteractor
 * @package App\CategoryFeature\Domain\Interactor
 *
 * Interactor represents a union of use cases. 1 use case = 1 business logic action.
 * e.g. loadById() method represents load category by id use case.
 * Interactor holds use cases for the sake of decreasing complexity of the code and decreasing dependencies for classes
 * which will need several use cases.
 *
 * WARNING! Interactors must not be changed or inherited.
 * Business logic can't be changed by 3-d party modules and layers
 */
final class CategoryLoadInteractor
{
    private CategoryRepositoryInterface $categoryRepository;
    private CategoryFactory $categoryFactory;

    /**
     * @param CategoryRepositoryInterface $categoryRepository
     * @param CategoryFactory $categoryFactory
     */
    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        CategoryFactory $categoryFactory
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->categoryFactory = $categoryFactory;
    }

    /**
     * @param array|null $criteria
     * @return array
     */
    public function loadAll(array $criteria = null): array
    {
        return $this->categoryRepository->getList($criteria);
    }

    /**
     * @param int $id
     * @return Category|null
     */
    public function loadById(int $id): ?Category
    {
        return $this->categoryRepository->getById($id);
    }

    /**
     * @return Category
     */
    public function loadEmptyCategory(): Category
    {
        return $this->categoryFactory->create();
    }

    /**
     * @param string $slug
     * @return Category|null
     */
    public function loadBySlug(string $slug): ?Category
    {
        return $this->categoryRepository->getBySlug($slug);
    }
}
