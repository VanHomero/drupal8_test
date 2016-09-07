<?php

namespace Drupal\points\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Controller routines for node_type_example.
 *
 * @ingroup node_type_example
 */
class PointsController extends ControllerBase {

  /**
   * A simple controller method to explain what this module is about.
   */
  public function description() {
    // Construct our links.
    $content_admin_link = Link::createFromRoute($this->t('the content type admin page'), 'entity.node_type.collection')->toString();

    // We can generate a URL fragment for an admin route. If the path is changed
    // for this route, this code will change it in the content displayed to the
    // user.
    $add_types = Url::fromRoute('node.type_add');
    $add_types_url = $add_types->toString();

    $build = array(
      '#markup' => t(
          '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique tempora aliquid placeat repudiandae sit enim quam quidem minus, veritatis quae ea nulla dolorum perferendis necessitatibus commodi ad ratione sint? Quas.</p>
          <p>Nobis quam totam repellat commodi, nemo, praesentium maiores incidunt ipsum temporibus, id magni consectetur, ex. Autem porro architecto excepturi id, nesciunt voluptatibus illum impedit quas perspiciatis consequuntur. Facere, quidem, eaque.</p>
          <p>Laboriosam asperiores quisquam consequatur accusamus, fugiat ducimus ipsum magni repellendus, dignissimos quidem aliquid numquam tenetur. Hic minima aspernatur quis nobis explicabo! Odit debitis, eos id quae! Non consequatur, commodi repellendus!</p>
          <p>Nobis reprehenderit modi unde repellat praesentium ad aliquid harum laborum eveniet quis impedit, beatae fugit adipisci voluptas illo ea itaque nam distinctio deleniti iste, voluptates ratione! Eius magnam, soluta corrupti.</p>',
        array(
          '@content_type_admin' => $content_admin_link,
          '@add_types_url' => $add_types_url,
        )
      ),
    );
    return $build;
  }

}
