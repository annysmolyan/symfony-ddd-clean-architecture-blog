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

namespace App\CategoryFeature\Application\DTORequestValidator;

use App\CategoryFeature\Application\DTORequest\CategoryRequestDTOInterface;

/**
 * Interface CategoryValidatorInterface
 * Primary request validation (input). Other validation must be in interactors.
 * Interactors are responsible for business logic validation.
 *
 * @package App\CategoryFeature\Application\DTORequestValidator
 */
interface CategoryValidatorInterface
{
    /**
     * @param CategoryRequestDTOInterface $dto
     * @return array
     */
    public function validate(CategoryRequestDTOInterface $dto): array;
}
