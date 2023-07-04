<?php

namespace Slim\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Model\ParticipationModel;

class ParticipationController
{
    public function show(Request $request, Response $response, $args): response // Function to search all registered shares
    {
        $participations = new ParticipationModel();

        $results = $participations->getPaticipation();

        if (empty($results)) {
            $results = [];
            $response->getBody()->write('No record found');
            return $response->withJson($results);
        }

        // Return results as a JSON response
        return $response->withJson($results);
    }

    public function create(Request $request, Response $response, $args): response // Function to create a new register
    {
        $data = $request->getParsedBody();

        $first_name = $data['first_name'] ?? null;
        $last_name = $data['last_name'] ?? null;
        $participation = $data['participation'] ?? null;
        $color = $data['color'] ?? null;

        if (empty($first_name) || empty($last_name) || empty($participation) || !is_numeric($participation)) {
            $response->getBody()->write('The fields were not filled in correctly');
            return $response->withStatus(400);
        }

        $participations = new ParticipationModel();

        $results = $participations->setParticipation($first_name, $last_name, $participation, $color);

        if (!$results) {
            $response->getBody()->write('Error when registering');
            return $response->withStatus(500);
        }

        $res = [
            'message' => 'Registration done successfully',
            'id' => $results
        ];

        $response->getBody()->write(json_encode($res));
        return $response->withStatus(200);
    }

    public function destroy(Request $request, Response $response, $args) //Function to delete a register by id
    {
        $participations = new ParticipationModel();

        $id = $args['id'];

        $results = $participations->deleteParticipation($id);

        if (!$results) {
            $response->getBody()->write('Error to delete a register');
            return $response->withStatus(500);
        }

        $response->getBody()->write('Delete performed successfully');
        return $response->withStatus(200);
    }
}
