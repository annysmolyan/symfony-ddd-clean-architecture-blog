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

namespace App\CategoryFeatureApi\Service;

use App\CategoryFeatureApi\DTORequest\CategoryUpdateRequestInterface as UpdateDTORequest;
use App\CategoryFeatureApi\DTORequest\CategoryCreateRequestInterface as CreateDTORequest;
use App\CategoryFeatureApi\DTOResponse\CategoryDTOInterface as ResponseDTO;

/**
 * @api
 * Interface CategoryServiceInterface
 * @package App\CategoryFeatureApi\Service
 *
 * Api service for categories management
 *
 * WARNING! API DOESN'T know anything about realization!
 * This interfaces provides public access for other features to a feature realization.
 */
interface CategoryServiceInterface
{
    /**
     * @param array|null $criteria
     * @return array
     */
    public function getList(array $criteria = null): array;

    /**
     * @param int $categoryId
     * @return ResponseDTO|null
     */
    public function getById(int $categoryId): ?ResponseDTO;

    /**
     * @param string $slug
     * @return ResponseDTO|null
     */
    public function getBySlug(string $slug): ?ResponseDTO;

    /**
     * @return ResponseDTO
     */
    public function initNewCategory(): ResponseDTO;

    /**
     * @param CreateDTORequest $dtoRequest
     * @return ResponseDTO
     */
    public function create(CreateDTORequest $dtoRequest): ResponseDTO;

    /**
     * @param UpdateDTORequest $dtoRequest
     * @return ResponseDTO
     */
    public function update(UpdateDTORequest $dtoRequest): ResponseDTO;

    /**
     * @param int $id
     * @return void
     */
    public function deleteById(int $id): void;
}
