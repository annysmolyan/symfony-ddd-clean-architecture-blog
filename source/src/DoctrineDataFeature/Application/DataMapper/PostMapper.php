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

namespace App\DoctrineDataFeature\Application\DataMapper;

use App\DataManagerFeatureApi\DTORequest\PostDataRequestInterface;
use App\DoctrineDataFeature\Application\DTORequest\DataRequestInterface;
use App\DoctrineDataFeature\Application\DTOResponse\DataResponseInterface;
use App\DoctrineDataFeature\Application\DTOResponseFactory\PostResponseFactoryInterface;
use App\DoctrineDataFeature\Domain\Entity\Category;
use App\DoctrineDataFeature\Domain\Entity\Post;
use App\DoctrineDataFeature\Domain\Repository\CategoryRepositoryInterface;
use InvalidArgumentException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class PostMapper
 * @package App\DoctrineDataFeature\Application\DataMapper
 */
class PostMapper implements DataMapperInterface
{
    private PostResponseFactoryInterface $postResponseFactory;
    private CategoryRepositoryInterface $categoryRepository;

    /**
     * @param PostResponseFactoryInterface $postResponseFactory
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(
        PostResponseFactoryInterface $postResponseFactory,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->postResponseFactory = $postResponseFactory;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Map DTORequest object to Infrastructure entity
     * @param DataRequestInterface $request
     * @return object
     */
    public function toEntity(DataRequestInterface $request): object
    {
        if (!$request instanceof PostDataRequestInterface) {
            throw new InvalidArgumentException(
                sprintf('You can pass %s only to this mapper.', PostDataRequestInterface::class)
            );
        }

        $doctrineEntity = new Post();

        $doctrineEntity->setId($request->getId());
        $doctrineEntity->setPublished($request->isPublished());
        $doctrineEntity->setContent($request->getContent());
        $doctrineEntity->setSlug($request->getSlug());
        $doctrineEntity->setTitle($request->getTitle());

        if ($categoryId = $request->getCategoryId()) {
            $category = $this->getCategory($categoryId);
            $doctrineEntity->setCategory($category);
        }

        return $doctrineEntity;
    }

    /**
     * @param int $categoryId
     * @return Category
     */
    private function getCategory(int $categoryId): Category
    {
        $category = $this->categoryRepository->getById($categoryId);

        if (!$category) {
            throw new NotFoundHttpException(sprintf("The category with ID '%s' doesn't exist", $category));
        }

        return $category;
    }

    /**
     * Map entity to DTOResponse
     * @param object $entity
     * @return DataResponseInterface
     */
    public function toResponse(object $entity): DataResponseInterface
    {
        if (!$entity instanceof Post) {
            throw new InvalidArgumentException(
                sprintf('You can only pass %s entity to this mapper.', Post::class)
            );
        }

        $response = $this->postResponseFactory->create();

        $response->setId($entity->getId());
        $response->setPublished($entity->isPublished());
        $response->setContent($entity->getContent());
        $response->setSlug($entity->getSlug());
        $response->setTitle($entity->getTitle());
        $response->setCategoryId($entity->getCategory()?->getId());

        return $response;
    }
}
