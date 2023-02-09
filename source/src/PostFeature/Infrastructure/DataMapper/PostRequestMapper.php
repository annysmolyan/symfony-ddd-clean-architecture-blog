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

namespace App\PostFeature\Infrastructure\DataMapper;

use App\DataManagerFeatureApi\DTORequest\PostDataRequestInterface;
use App\DataManagerFeatureApi\DTORequestFactory\PostDataRequestFactoryInterface;
use App\PostFeature\Domain\Entity\Post;

/**
 * Class PostRequestMapper
 * @package App\PostFeature\Infrastructure\DataMapper
 */
class PostRequestMapper implements PostRequestMapperInterface
{
    private PostDataRequestFactoryInterface $postRequestFactory;

    /**
     * @param PostDataRequestFactoryInterface $postRequestFactory
     */
    public function __construct(PostDataRequestFactoryInterface $postRequestFactory)
    {
        $this->postRequestFactory = $postRequestFactory;
    }

    /**
     * Map domain object to a data object for sending to DataManagerFeature
     * @param Post $domainEntity
     * @return PostDataRequestInterface
     */
    public function map(Post $domainEntity): PostDataRequestInterface
    {
        $requestModel = $this->postRequestFactory->create();

        $requestModel->setId($domainEntity->getId()->getValue());
        $requestModel->setTitle($domainEntity->getTitle()->getValue());
        $requestModel->setSlug($domainEntity->getSlug()->getValue());
        $requestModel->setContent($domainEntity->getContent()->getValue());
        $requestModel->setPublished($domainEntity->isPublished()->getValue());
        $requestModel->setCategoryId($domainEntity->getCategoryId()->getValue());

        return $requestModel;
    }
}
