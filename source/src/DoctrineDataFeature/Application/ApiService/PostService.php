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

use App\DataManagerFeatureApi\DTORequest\PostDataRequestInterface;
use App\DataManagerFeatureApi\DTOResponse\PostDataResponseInterface;
use App\DataManagerFeatureApi\Service\PostDataServiceInterface;
use App\DoctrineDataFeature\Application\DataMapper\DataMapperInterface;
use App\DoctrineDataFeature\Domain\Repository\PostRepositoryInterface;

/**
 * Class PostService
 * @package App\DoctrineDataFeature\Application\ApiService
 *
 * This class is for external usage (outside this feature) only
 * Use CategoryDataServiceInterface for data manipulating and return DTOResponse here
 *
 * Don't return Domain entity outside the feature!
 */
class PostService implements PostDataServiceInterface
{
    private DataMapperInterface $dataMapper;
    private PostRepositoryInterface $postRepository;

    /**
     * @param DataMapperInterface $dataMapper
     * @param PostRepositoryInterface $postRepository
     */
    public function __construct(
        DataMapperInterface $dataMapper,
        PostRepositoryInterface $postRepository
    ) {
        $this->dataMapper = $dataMapper;
        $this->postRepository = $postRepository;
    }

    /**
     * @param array|null $criteria
     * @return array
     */
    public function getList(array $criteria = null): array
    {
        $list = [];
        $result = $this->postRepository->getList($criteria);

        foreach ($result as $item) {
            $list[] = $this->dataMapper->toResponse($item);
        }

        return $list;
    }

    /**
     * @param int $postId
     * @return PostDataResponseInterface|null
     */
    public function getById(int $postId): ?PostDataResponseInterface
    {
        $entity = $this->postRepository->getById($postId);
        return $entity ? $this->dataMapper->toResponse($entity) : null;
    }

    /**
     * @param PostDataRequestInterface $dtoRequest
     * @return PostDataResponseInterface
     */
    public function save(PostDataRequestInterface $dtoRequest): PostDataResponseInterface
    {
        $entity = $this->dataMapper->toEntity($dtoRequest);
        $this->postRepository->save($entity);

        return $this->dataMapper->toResponse($entity);
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id): void
    {
        $this->postRepository->deleteById($id);
    }

    /**
     * @param string $slug
     * @return PostDataResponseInterface|null
     */
    public function getBySlug(string $slug): ?PostDataResponseInterface
    {
        $entity = $this->postRepository->getBySlug($slug);
        return $entity ? $this->dataMapper->toResponse($entity) : null;
    }
}
