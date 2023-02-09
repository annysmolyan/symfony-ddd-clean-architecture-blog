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

namespace App\PostFeature\Application\DTODomainMapper;

use App\PostFeature\Domain\Entity\Post;
use App\PostFeature\Domain\Factory\PostFactory as PostDomainFactory;
use App\PostFeatureApi\DTORequest\PostCreateDTOInterface;
use App\PostFeatureApi\DTORequest\PostUpdateDTOInterface;

/**
 * Class PostMapper
 * @package App\PostFeature\Application\DTODomainMapper
 */
class PostMapper implements PostMapperInterface
{
    private PostDomainFactory $postDomainFactory;

    public function __construct(PostDomainFactory $postDomainFactory)
    {
        $this->postDomainFactory = $postDomainFactory;
    }

    /**
     * Map DTO request to a Domain entity
     * @param PostUpdateDTOInterface $dtoRequest
     * @return Post
     */
    public function mapUpdateRequest(PostUpdateDTOInterface $dtoRequest): Post
    {
        return $this->postDomainFactory->create(
            $dtoRequest->getId(),
            $dtoRequest->getTitle(),
            $dtoRequest->getContent(),
            $dtoRequest->getSlug(),
            $dtoRequest->isPublished(),
            $dtoRequest->getCategoryId()
        );
    }

    /**
     * @param PostCreateDTOInterface $dtoRequest
     * @return Post
     */
    public function mapCreateRequest(PostCreateDTOInterface $dtoRequest): Post
    {
        return $this->postDomainFactory->create(
            null,
            $dtoRequest->getTitle(),
            $dtoRequest->getContent(),
            $dtoRequest->getSlug(),
            $dtoRequest->isPublished(),
            $dtoRequest->getCategoryId()
        );
    }
}
