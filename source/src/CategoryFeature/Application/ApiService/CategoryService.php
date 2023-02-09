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

namespace App\CategoryFeature\Application\ApiService;

use App\CategoryFeature\Application\DTODomainMapper\CategoryMapperInterface as CategoryDomainMapper;
use App\CategoryFeature\Application\DTORequest\CategoryRequestDTOInterface;
use App\CategoryFeature\Application\DTORequestValidator\CategoryValidatorInterface;
use App\CategoryFeature\Application\DTOResponseMapper\CategoryMapperInterface as CategoryDTOResponseMapper;
use App\CategoryFeature\Application\Model\CategoryManagerInterface;
use App\CategoryFeatureApi\DTORequest\CategoryUpdateRequestInterface as UpdateRequest;
use App\CategoryFeatureApi\DTORequest\CategoryCreateRequestInterface as CreateRequest;
use App\CategoryFeatureApi\DTOResponse\CategoryDTOInterface as ResponseDTO;
use App\CategoryFeatureApi\Service\CategoryServiceInterface;
use Exception;

/**
 * Class CategoryService
 * @package App\CategoryFeature\Application\ApiService
 *
 * This class is for external usage (outside this feature) only
 * Use CategoryManagerInterface for data manipulating and return DTOResponse here
 *
 * Don't return Domain entity outside the feature!
 */
class CategoryService implements CategoryServiceInterface
{
    private CategoryDTOResponseMapper $categoryDtoResponseMapper;
    private CategoryDomainMapper $categoryDomainMapper;
    private CategoryManagerInterface $categoryManager;
    private CategoryValidatorInterface $categoryValidator;

    /**
     * @param CategoryDTOResponseMapper $categoryDtoResponseMapper
     * @param CategoryDomainMapper $categoryDomainMapper
     * @param CategoryManagerInterface $categoryManager
     * @param CategoryValidatorInterface $categoryValidator
     */
    public function __construct(
        CategoryDTOResponseMapper $categoryDtoResponseMapper,
        CategoryDomainMapper $categoryDomainMapper,
        CategoryManagerInterface $categoryManager,
        CategoryValidatorInterface $categoryValidator
    ) {
        $this->categoryDtoResponseMapper = $categoryDtoResponseMapper;
        $this->categoryDomainMapper = $categoryDomainMapper;
        $this->categoryManager = $categoryManager;
        $this->categoryValidator = $categoryValidator;
    }

    /**
     * @param array|null $criteria
     * @return array
     */
    public function getList(array $criteria = null): array
    {
        $list = [];
        $categories = $this->categoryManager->getList($criteria);

        foreach ($categories as $category) {
            $list[] = $this->categoryDtoResponseMapper->map($category);
        }

        return $list;
    }

    /**
     * @param int $categoryId
     * @return ResponseDTO|null
     */
    public function getById(int $categoryId): ?ResponseDTO
    {
        $category = $this->categoryManager->getById($categoryId);
        return $category ? $this->categoryDtoResponseMapper->map($category) : null;
    }

    /**
     * @param string $slug
     * @return ResponseDTO|null
     */
    public function getBySlug(string $slug): ?ResponseDTO
    {
        $category = $this->categoryManager->getBySlug($slug);
        return $category ? $this->categoryDtoResponseMapper->map($category) : null;
    }

    /**
     * @return ResponseDTO
     */
    public function initNewCategory(): ResponseDTO
    {
        $category = $this->categoryManager->initNewCategory();
        return $this->categoryDtoResponseMapper->map($category);
    }

    /**
     * @param CreateRequest $dtoRequest
     * @return ResponseDTO
     * @throws Exception
     */
    public function create(CreateRequest $dtoRequest): ResponseDTO
    {
        $this->validateRequest($dtoRequest);

        $domainEntity = $this->categoryDomainMapper->mapCreateRequest($dtoRequest);
        $createdCategory = $this->categoryManager->create($domainEntity);

        return $this->categoryDtoResponseMapper->map($createdCategory);
    }

    /**
     * @param UpdateRequest $dtoRequest
     * @return ResponseDTO
     * @throws Exception
     */
    public function update(UpdateRequest $dtoRequest): ResponseDTO
    {
        $this->validateRequest($dtoRequest);

        $domainEntity = $this->categoryDomainMapper->mapUpdateRequest($dtoRequest);
        $updatedCategory = $this->categoryManager->update($domainEntity);

        return $this->categoryDtoResponseMapper->map($updatedCategory);
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id): void
    {
        $this->categoryManager->deleteById($id);
    }

    /**
     * @param CategoryRequestDTOInterface $requestDTO
     * @return void
     * @throws Exception
     */
    protected function validateRequest(CategoryRequestDTOInterface $requestDTO): void
    {
        $errors = $this->categoryValidator->validate($requestDTO);
        $message = "";

        foreach ($errors as $property => $errorMsgs) {
            $message .= "The $property is not valid. Message: " . implode("," , $errorMsgs) . " \n";
        }

        if ($message) {
            throw new Exception($message);
        }
    }
}
