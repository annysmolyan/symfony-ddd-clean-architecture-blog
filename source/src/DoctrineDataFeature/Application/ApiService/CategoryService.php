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

namespace App\DoctrineDataFeature\Application\ApiService;

use App\DataManagerFeatureApi\DTORequest\CategoryDataRequestInterface;
use App\DataManagerFeatureApi\DTOResponse\CategoryDataResponseInterface;
use App\DataManagerFeatureApi\Service\CategoryDataServiceInterface;
use App\DoctrineDataFeature\Application\DataMapper\DataMapperInterface;
use App\DoctrineDataFeature\Domain\Repository\CategoryRepositoryInterface;

/**
 * Class CategoryService
 * @package App\DoctrineDataFeature\Application\ApiService
 *
 * This class is for external usage (outside this feature) only
 * Use CategoryDataServiceInterface for data manipulating and return DTOResponse here
 *
 * Don't return Domain entity outside the feature!
 **/
class CategoryService implements CategoryDataServiceInterface
{
    private DataMapperInterface $dataMapper;
    private CategoryRepositoryInterface $categoryRepository;

    /**
     * Use DI for injecting appropriate objects here
     * @param DataMapperInterface $dataMapper
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(
        DataMapperInterface $dataMapper,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->dataMapper = $dataMapper;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param array|null $criteria
     * @return array
     */
    public function getList(array $criteria = null): array
    {
        $list = [];
        $result = $this->categoryRepository->getList($criteria);

        foreach ($result as $item) {
            $list[] = $this->dataMapper->toResponse($item);
        }

        return $list;
    }

    /**
     * @param int $categoryId
     * @return CategoryDataResponseInterface|null
     */
    public function getById(int $categoryId): ?CategoryDataResponseInterface
    {
        $entity = $this->categoryRepository->getById($categoryId);
        return $entity ? $this->dataMapper->toResponse($entity) : null;
    }

    /**
     * @param CategoryDataRequestInterface $dtoRequest
     * @return CategoryDataResponseInterface
     */
    public function save(CategoryDataRequestInterface $dtoRequest): CategoryDataResponseInterface
    {
        $entity = $this->dataMapper->toEntity($dtoRequest);
        $this->categoryRepository->save($entity);

        return $this->dataMapper->toResponse($entity);
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id): void
    {
        $this->categoryRepository->deleteById($id);
    }

    /**
     * @param string $slug
     * @return CategoryDataResponseInterface|null
     */
    public function getBySlug(string $slug): ?CategoryDataResponseInterface
    {
        $entity = $this->categoryRepository->getBySlug($slug);
        return $entity ? $this->dataMapper->toResponse($entity) : null;
    }
}
