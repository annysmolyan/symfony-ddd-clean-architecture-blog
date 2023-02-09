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

use App\DataManagerFeatureApi\DTOResponse\PostDataResponseInterface;
use App\PostFeature\Domain\Entity\Post;

/**
 * Interface PostDomainMapperInterface
 * Map data response object to a domain object
 * @package App\PostFeature\Infrastructure\DataMapper
 */
interface PostDomainMapperInterface
{
    /**
     * @param PostDataResponseInterface $dataResponse
     * @return Post
     */
    public function map(PostDataResponseInterface $dataResponse): Post;
}
