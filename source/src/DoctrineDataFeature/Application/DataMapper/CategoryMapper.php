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

use App\DataManagerFeatureApi\DTORequest\CategoryDataRequestInterface;
use App\DoctrineDataFeature\Application\DTORequest\DataRequestInterface;
use App\DoctrineDataFeature\Application\DTOResponse\DataResponseInterface;
use App\DoctrineDataFeature\Application\DTOResponseFactory\CategoryResponseFactoryInterface;
use App\DoctrineDataFeature\Domain\Entity\Category;
use InvalidArgumentException;

/**
 * Class CategoryMapper
 * @package App\DoctrineDataFeature\Application\DTOEntityMapper
 **/
class CategoryMapper implements DataMapperInterface
{
    private CategoryResponseFactoryInterface $categoryResponseFactory;

    /**
     * @param CategoryResponseFactoryInterface $categoryResponseFactory
     */
    public function __construct(CategoryResponseFactoryInterface $categoryResponseFactory)
    {
        $this->categoryResponseFactory = $categoryResponseFactory;
    }

    /**
     * Map DTORequest object to Infrastructure entity
     * @param DataRequestInterface $request
     * @return Category
     */
    public function toEntity(DataRequestInterface $request): Category
    {
        if (!$request instanceof CategoryDataRequestInterface) {
            throw new InvalidArgumentException(
                sprintf('You can pass %s only to this mapper.', CategoryDataRequestInterface::class)
            );
        }

        $doctrineEntity = new Category();

        $doctrineEntity->setId($request->getId());
        $doctrineEntity->setActive($request->isActive());
        $doctrineEntity->setContent($request->getContent());
        $doctrineEntity->setSlug($request->getSlug());
        $doctrineEntity->setTitle($request->getTitle());

        return $doctrineEntity;
    }

    /**
     * Map entity to DTOResponse
     * @param object $entity
     * @return DataResponseInterface
     */
    public function toResponse(object $entity): DataResponseInterface
    {
        if (!$entity instanceof Category) {
            throw new InvalidArgumentException(
                sprintf('You can only pass %s entity to this mapper.', Category::class)
            );
        }

        $response = $this->categoryResponseFactory->create();

        $response->setId($entity->getId());
        $response->setActive($entity->getIsActive());
        $response->setContent($entity->getContent());
        $response->setSlug($entity->getSlug());
        $response->setTitle($entity->getTitle());

        return $response;
    }
}
