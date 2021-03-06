<?php

namespace Drupal\points\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Controller routines for node_type_example.
 *
 * @ingroup node_type_example
 */
class PointsController extends ControllerBase {

  /**
   * A simple controller method to explain what this module is about.
   */
  public function pointsList() {
    $query = \Drupal::entityQuery('node')
      ->condition('type', 'points')
      ->condition('status', 1);
    $nids = $query->execute();

    $nodes = entity_load_multiple('node', $nids);

    $coords = array();

    foreach ($nodes as $node) {
      $point = $node->get('points_map');
      $coords[] = array(
        'title' => $node->get('title')->value,
        'lat' => $point->lat,
        'lon' => $point->lon,
      );
    }


    $build = array();
    $build['content'] = array(
      '#markup' => '<div class="contMap">
        <div id="map"></div>
      </div>',
    );
    $build['#attached']['library'][] = 'points/points.points_map';
    $build['#attached']['library'][] = 'google_map_field/google-map-apis';
    $build['#attached']['drupalSettings']['points']['coords'] = $coords;

    return $build;
  }
  public function pointsListTitle() {
    $date = date('Y-m-d');
    return 'Points List '.$date;
  }
  public function pointsServices() {
    $query = \Drupal::entityQuery('node')
      ->condition('type', 'points')
      ->condition('status', 1);
    $nids = $query->execute();

    $nodes = entity_load_multiple('node', $nids);

    $coords = array();

    foreach ($nodes as $node) {
      $point = $node->get('points_map');
      $coords[] = array(
        'title' => $node->get('title')->value,
        'lat' => $point->lat,
        'lon' => $point->lon,
      );
    }
    $response['data'] = $coords;
    
    return new JsonResponse($response); 
  }
  public function pointsServicesArgs($point) {
    $query = \Drupal::entityQuery('node')
      ->condition('type', 'points')
      ->condition('nid', $point)
      ->condition('status', 1);
    $nids = $query->execute();

    $nodes = entity_load_multiple('node', $nids);

    $coords = array();

    foreach ($nodes as $node) {
      $point = $node->get('points_map');
      $coords[] = array(
        'title' => $node->get('title')->value,
        'lat' => $point->lat,
        'lon' => $point->lon,
      );
    }
    $response['data'] = $coords;
    
    return new JsonResponse($response); 
  }
}
