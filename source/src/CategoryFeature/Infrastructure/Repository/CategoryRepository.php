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

namespace App\CategoryFeature\Infrastructure\Repository;

use App\CategoryFeature\Domain\Entity\Category;
use App\CategoryFeature\Domain\Repository\CategoryRepositoryInterface;
use App\CategoryFeature\Infrastructure\DataMapper\CategoryRequestMapperInterface;
use App\CategoryFeature\Infrastructure\DataMapper\CategoryDomainMapperInterface;
use App\DataManagerFeatureApi\Service\CategoryDataServiceInterface;

/**
 * Class CategoryRepository
 *
 * We save data in another feature by doctrine.
 * For that we need to convert a Category Domain Entity to a Data Manager request object,
 * send that request object for saving to the Doctrine feature, get response object from the Doctrine Data Manager
 * and convert that object back to a Domain entity.
 *
 * This approach allows you not to be depended on a concrete data storage.
 * You can use Doctrine / Csv / Elastic if needed.
 * Just create a separate module for each realisation and implement DataManagerFeatureApi.
 * PS: don't forget to change interface realisation in construct.
 *
 * @package App\CategoryFeature\Infrastructure\Repository
 */
class CategoryRepository implements CategoryRepositoryInterface
{
    private CategoryDomainMapperInterface $categoryDomainMapper;
    private CategoryRequestMapperInterface $categoryRequestDataMapper;
    private CategoryDataServiceInterface $categoryDataService;

    /**
     * @param CategoryDomainMapperInterface $domainMapper
     * @param CategoryRequestMapperInterface $requestMapper
     * @param CategoryDataServiceInterface $categoryDataService
     */
    public function __construct(
        CategoryDomainMapperInterface  $domainMapper,
        CategoryRequestMapperInterface $requestMapper,
        CategoryDataServiceInterface   $categoryDataService
    ) {
        $this->categoryDomainMapper = $domainMapper;
        $this->categoryRequestDataMapper = $requestMapper;
        $this->categoryDataService = $categoryDataService;
    }

    /**
     * @param Category $category
     * @return Category
     */
    public function save(Category $category): Category
    {
        $requestDTO = $this->categoryRequestDataMapper->map($category);
        $responseDTO = $this->categoryDataService->save($requestDTO);

        return $this->categoryDomainMapper->map($responseDTO);
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id): void
    {
        $this->categoryDataService->deleteById($id);
    }

    /**
     * @param array|null $criteria
     * @return array
     */
    public function getList(array $criteria = null): array
    {
        $result = $this->categoryDataService->getList($criteria);
        $list = [];

        foreach ($result as $item) {
            $list[] = $this->categoryDomainMapper->map($item);

        }

        return $list;
    }

    /**
     * @param int $id
     * @return Category|null
     */
    public function getById(int $id): ?Category
    {
        $responseDTO = $this->categoryDataService->getById($id);
        return $responseDTO ? $this->categoryDomainMapper->map($responseDTO) : null;
    }

    /**
     * @param string $slug
     * @return Category|null
     */
    public function getBySlug(string $slug): ?Category
    {
        $responseDTO = $this->categoryDataService->getBySlug($slug);
        return $responseDTO ? $this->categoryDomainMapper->map($responseDTO) : null;
    }
}
