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

namespace App\FrontFeature\Presentation\Controller\Home;

use App\CategoryFeatureApi\Service\CategoryServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ViewController
 * @package App\FrontFeature\Presentation\Controller\Home
 *
 * WARNING! Presentation layer can communicate ONLY with Application layer or shared API.
 * Presentation layer doesn't know anything about domain
 */
class ViewController extends AbstractController
{
    private const PAGE_TITLE = "Symfony Blog: Learn Clean Architecture Together";
    private const PAGE_DESCRIPTION = "Learn Clean Architecture Together";

    private CategoryServiceInterface $categoryService;

    /**
     * @param CategoryServiceInterface $categoryService
     */
    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    #[Route('/', name: 'home', methods: ["GET"])]
    public function __invoke(): Response
    {
        $categoryList = $this->categoryService->getList(["isActive" => true]);

        return $this->render('@frontend_feature_templates/baseTheme/layout/home/view.html.twig', [
            'categoryList' => $categoryList,
            'seoTitle' => self::PAGE_TITLE,
            'seoDescription' => self::PAGE_DESCRIPTION,
            'menuItems' => $categoryList
        ]);
    }
}
