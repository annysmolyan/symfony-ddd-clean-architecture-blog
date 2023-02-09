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

use App\PostFeature\Domain\Entity\Post;
use App\PostFeatureApi\DTOResponse\PostDTOInterface;

/**
 * Interface PostMapperInterface
 * Map domain entity to a Response DTO object.
 * Don't return domain entity outside the module.
 *
 * @package App\PostFeature\Application\DTOResponseMapper
 */
interface PostMapperInterface
{
    /**
     * @param Post $post
     * @return PostDTOInterface
     */
    public function map(Post $post): PostDTOInterface;
}
