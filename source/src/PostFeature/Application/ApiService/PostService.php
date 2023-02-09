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

namespace App\PostFeature\Application\ApiService;

use App\PostFeature\Application\DTODomainMapper\PostMapperInterface as PostDomainMapper;
use App\PostFeature\Application\DTORequest\PostRequestDTOInterface;
use App\PostFeature\Application\DTORequestValidator\PostValidatorInterface;
use App\PostFeature\Application\DTOResponseMapper\PostMapperInterface as PostResponseMapper;
use App\PostFeature\Application\Model\PostManagerInterface;
use App\PostFeatureApi\DTORequest\PostCreateDTOInterface as CreateDTORequest;
use App\PostFeatureApi\DTORequest\PostUpdateDTOInterface as UpdateDTORequest;
use App\PostFeatureApi\DTOResponse\PostDTOInterface as ResponseDTO;
use App\PostFeatureApi\Service\PostServiceInterface;
use Exception;

/**
 * Class PostService
 * @package App\PostFeature\Application\ApiService
 *
 * This class is for external usage (outside this feature) only
 * Use PostManagerInterface for data manipulating and return DTOResponse here
 *
 * Don't return Domain entity outside the feature!
 */
class PostService implements PostServiceInterface
{
    private PostManagerInterface $postManager;
    private PostResponseMapper $responseMapper;
    private PostValidatorInterface $postValidator;
    private PostDomainMapper $domainMapper;

    /**
     * @param PostManagerInterface $postManager
     * @param PostResponseMapper $responseMapper
     * @param PostValidatorInterface $postValidator
     * @param PostDomainMapper $domainMapper
     */
    public function __construct(
        PostManagerInterface     $postManager,
        PostResponseMapper       $responseMapper,
        PostValidatorInterface   $postValidator,
        PostDomainMapper $domainMapper
    ) {
        $this->postManager = $postManager;
        $this->responseMapper = $responseMapper;
        $this->postValidator = $postValidator;
        $this->domainMapper = $domainMapper;
    }

    /**
     * @param array|null $criteria
     * @return array
     */
    public function getList(array $criteria = null): array
    {
        $list = [];
        $posts = $this->postManager->getList($criteria);

        foreach ($posts as $post) {
            $list[] = $this->responseMapper->map($post);
        }

        return $list;
    }

    /**
     * @param int $postId
     * @return ResponseDTO|null
     */
    public function getById(int $postId): ?ResponseDTO
    {
        $post = $this->postManager->getById($postId);
        return $post ? $this->responseMapper->map($post) : null;
    }

    /**
     * @param string $slug
     * @return ResponseDTO|null
     */
    public function getBySlug(string $slug): ?ResponseDTO
    {
        $post = $this->postManager->getBySlug($slug);
        return $post ? $this->responseMapper->map($post) : null;
    }

    /**
     * @return ResponseDTO
     */
    public function initNewPost(): ResponseDTO
    {
        $post = $this->postManager->initNewPost();
        return $this->responseMapper->map($post);
    }

    /**
     * @param CreateDTORequest $dtoRequest
     * @return ResponseDTO
     * @throws Exception
     */
    public function create(CreateDTORequest $dtoRequest): ResponseDTO
    {
        $this->validateRequest($dtoRequest);

        $domainEntity = $this->domainMapper->mapCreateRequest($dtoRequest);
        $createdEntity = $this->postManager->create($domainEntity);

        return $this->responseMapper->map($createdEntity);
    }

    /**
     * @param UpdateDTORequest $dtoRequest
     * @return ResponseDTO
     * @throws Exception
     */
    public function update(UpdateDTORequest $dtoRequest): ResponseDTO
    {
        $this->validateRequest($dtoRequest);
        
        $domainEntity = $this->domainMapper->mapUpdateRequest($dtoRequest);
        $updatedEntity = $this->postManager->update($domainEntity);

        return $this->responseMapper->map($updatedEntity);
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id): void
    {
        $this->postManager->deleteById($id);
    }

    /**
     * @param PostRequestDTOInterface $requestDTO
     * @return void
     * @throws Exception
     */
    protected function validateRequest(PostRequestDTOInterface $requestDTO): void
    {
        $errors = $this->postValidator->validate($requestDTO);
        $message = "";

        foreach ($errors as $property => $errorMsgs) {
            $message .= "The $property is not valid. Message: " . implode("," , $errorMsgs) . " \n";
        }

        if ($message) {
            throw new Exception($message);
        }
    }
}
