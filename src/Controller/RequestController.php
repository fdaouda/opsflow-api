<?php
declare(strict_types=1);

namespace App\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Service\RequestService;

class RequestController {

public function __construct(private RequestService $requestService) {}

    #[Route('/api/requests/{id}', methods: ['GET'])]
    public function getRequest(int $id): JsonResponse {

        if ($id <= 0) {
            $response = new JsonResponse(
                [
                    "error" => "Invalid request ID"
                ],
                Response::HTTP_BAD_REQUEST
            );
            return $response;
        }
        
        $response = $this->requestService->findById($id);
        return new JsonResponse($response, Response::HTTP_OK);
    }

}