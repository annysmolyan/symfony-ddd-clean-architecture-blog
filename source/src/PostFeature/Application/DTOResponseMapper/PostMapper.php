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

namespace App\PostFeature\Application\DTOResponseMapper;

use App\PostFeature\Application\DTOResponseFactory\PostFactoryInterface;
use App\PostFeature\Domain\Entity\Post;
use App\PostFeatureApi\DTOResponse\PostDTOInterface;

/**
 * Class PostMapper
 * @package App\PostFeature\Application\DTOResponseMapper
 */
class PostMapper implements PostMapperInterface
{
    private PostFactoryInterface $postDTOResponseFactory;

    /**
     * @param PostFactoryInterface $postDTOResponseFactory
     */
    public function __construct(PostFactoryInterface $postDTOResponseFactory)
    {
        $this->postDTOResponseFactory = $postDTOResponseFactory;
    }

    /**
     * Map domain entity to a Response DTO object.
     * Don't return domain entity outside the module.
     *
     * @param Post $post
     * @return PostDTOInterface
     */
    public function map(Post $post): PostDTOInterface
    {
        $dtoResponse = $this->postDTOResponseFactory->create();

        $dtoResponse->setId($post->getId()->getValue());
        $dtoResponse->setSlug($post->getSlug()->getValue());
        $dtoResponse->setTitle($post->getTitle()->getValue());
        $dtoResponse->setContent($post->getContent()->getValue());
        $dtoResponse->setPublished($post->isPublished()->getValue());
        $dtoResponse->setCategoryId($post->getCategoryId()->getValue());
        $dtoResponse->setCreatedAt($post->getCreatedAt()->getValue());
        $dtoResponse->setUpdatedAt($post->getUpdatedAt()->getValue());

        return $dtoResponse;
    }
}
