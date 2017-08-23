<?php

class HttpRequestHandler
{
    #Нативно HTML и PHP поддерживают только GET и POST.
    public function HandleRequest()
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'HEAD':
                if (file_exists($_GET['file']))
                    return filesize($_GET['file']);
                break;

            case 'GET':
                if (file_exists($_GET['file']))
                    return file_get_contents($_GET['file']);
                break;

            case 'POST':
                if (file_exists($_POST['file'])) {
                    $body = array();
                    parse_str(file_get_contents('php://input'), $body);
                    $keys = array_keys($body);
                    return file_put_contents($_POST['file'], $body[$keys[1]]);
                }
                break;

            case 'DELETE':
                if (file_exists($_POST['file']))
                    return unlink($_POST['file']);
                break;

            case 'PATCH':
                if (file_exists($_POST['file'])) {
                    $body = array();
                    parse_str(file_get_contents('php://input'), $body);
                    $keys = array_keys($body);
                    return file_put_contents($_POST['file'], $body[$keys[1]], FILE_APPEND);
                }
                break;

            default: http_response_code(404);
        }
        http_response_code(403);
        exit('file does not exist');
    }
}