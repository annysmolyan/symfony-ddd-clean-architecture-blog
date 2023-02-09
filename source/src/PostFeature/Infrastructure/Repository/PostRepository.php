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

namespace App\PostFeature\Infrastructure\Repository;

use App\DataManagerFeatureApi\Service\PostDataServiceInterface;
use App\PostFeature\Domain\Entity\Post;
use App\PostFeature\Domain\Repository\PostRepositoryInterface;
use App\PostFeature\Infrastructure\DataMapper\PostDomainMapperInterface;
use App\PostFeature\Infrastructure\DataMapper\PostRequestMapperInterface;

/**
 * Class PostRepository
 * @package App\PostFeature\Infrastructure\Repository
 *
 * We save data in another feature by doctrine.
 * For that we need to convert a Post Domain Entity to a Data Manager request object,
 * send that request object for saving to the Doctrine feature, get response object from the Doctrine Data Manager
 * and convert that object back to a Domain entity.
 *
 * This approach allows you not to be depended on a concrete data storage.
 * You can use Doctrine / Csv / Elastic if needed.
 * Just create a separate module for each realisation and implement DataManagerFeatureApi.
 * PS: don't forget to change interface realisation in construct.
 */
class PostRepository implements PostRepositoryInterface
{
    private PostDataServiceInterface $postDataService;
    private PostDomainMapperInterface $domainMapper;
    private PostRequestMapperInterface $requestMapper;

    /**
     * @param PostDataServiceInterface $postDataService
     * @param PostDomainMapperInterface $domainMapper
     * @param PostRequestMapperInterface $requestMapper
     */
    public function __construct(
        PostDataServiceInterface   $postDataService,
        PostDomainMapperInterface  $domainMapper,
        PostRequestMapperInterface $requestMapper
    ) {
        $this->postDataService = $postDataService;
        $this->domainMapper = $domainMapper;
        $this->requestMapper = $requestMapper;
    }

    /**
     * @param Post $post
     * @return Post
     */
    public function save(Post $post): Post
    {
        $requestDTO = $this->requestMapper->map($post);
        $responseDTO = $this->postDataService->save($requestDTO);

        return $this->domainMapper->map($responseDTO);
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id): void
    {
        $this->postDataService->deleteById($id);
    }

    /**
     * @param array|null $criteria
     * @return array
     */
    public function getList(array $criteria = null): array
    {
        $result = $this->postDataService->getList($criteria);
        $list = [];

        foreach ($result as $item) {
            $list[] = $this->domainMapper->map($item);

        }
        return $list;
    }

    /**
     * @param int $id
     * @return Post|null
     */
    public function getById(int $id): ?Post
    {
        $responseDTO = $this->postDataService->getById($id);
        return $responseDTO ? $this->domainMapper->map($responseDTO) : null;
    }

    /**
     * @param string $slug
     * @return Post|null
     */
    public function getBySlug(string $slug): ?Post
    {
        $responseDTO = $this->postDataService->getBySlug($slug);
        return $responseDTO ? $this->domainMapper->map($responseDTO) : null;
    }
}
