<?php
/**
 * Facade.php
 *
 * @author Rami
 */

namespace Silverbadge\Api;

use Phalcon\Mvc\User\Component;
use Silverbadge\Models\Popup;

class Facade extends Component {
    public function createNewPopup($name, $content)
    {
        $response = array();
        $content = strip_tags($content);
        if (empty($content) || empty($name) || count(Popup::find(array("Name = '$name'"))->toArray()) > 0) {
            $response['code'] = 400;
            $response['message'] = "Bad request, empty parameters supplied or popup with this name already exists";
        } else {
            $popup = new Popup();
            $popup->save(array(
                    'Name' => $name,
                    'Content' => $content,
                    'CreatedAt' => date('Y-m-d H:i:s'),
                    'LastUpdate' => date('Y-m-d H:i:s')
                )
            );

            $response['Name'] = $name;
            $response['Content'] = $content;
            $response['Id'] = $popup->getId();
        }
        return $response;
    }
} 