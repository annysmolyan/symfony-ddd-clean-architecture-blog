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
use App\PostFeatureApi\DTORequest\PostCreateDTOInterface;
use App\PostFeatureApi\DTORequest\PostUpdateDTOInterface;

/**
 * Interface PostMapperInterface
 * @package App\PostFeature\Application\DTODomainMapper
 */
interface PostMapperInterface
{
    /**
     * @param PostUpdateDTOInterface $dtoRequest
     * @return Post
     */
    public function mapUpdateRequest(PostUpdateDTOInterface $dtoRequest): Post;

    /**
     * @param PostCreateDTOInterface $dtoRequest
     * @return Post
     */
    public function mapCreateRequest(PostCreateDTOInterface $dtoRequest): Post;
}
