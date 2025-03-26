<?php

function html_escape($text): string
{
    // Next line is an update for PHP 8.1 see https://phpandmysql.com/updates/passing-null-to-string-functions/
    $text = $text ?? ''; // If the value passed into function is null set $text to a blank string

    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8', false); // Return escaped string
}

function paragraph($text) {
    $replacement = '</p><p>';
    return preg_replace("/\r?\n/", $replacement, $text);
}

function handle_error($message) {
header("Location: error.php?message=" . $message);
exit();
}
function resize_image_gd($orig_path, $new_path, $max_width, $max_height)
{
    $image_data     = getimagesize($orig_path);
    $orig_width     = $image_data[0];
    $orig_height    = $image_data[1];
    $media_type     = $image_data['mime'];
    $new_width      = $max_width;
    $new_height     = $max_height;
    $orig_ratio     = $orig_width / $orig_height;

    // calculate new size
    if ($orig_width > $orig_height) {
        $new_height = $new_width / $orig_ratio;
    } else {
        $new_width = $new_height * $orig_ratio;
    }

    switch($media_type) {
        case 'image/gif' :
        $orig = imagecreatefromgif($orig_path);
        break;
        case 'image/jpeg' :
            $orig = imagecreatefromjpeg($orig_path);
            break;
            case 'imge/png' :
                $orig = imagecreatefrompng($orig_path);
                break;
    }

    $new = imagecreatetruecolor($new_width, $new_height); // create a blank image

    imagecopyresampled($new, $orig, 0, 0, 0, 0, $new_width, $new_height, $orig_width, $orig_height);
    // above copy orig to new image

    // save image the thumbs folder must be created and have the right permissions
    switch($media_type) {
        case 'image/gif' : $result = imagegif($new, $new_path); break;
        case 'image/jpeg' : $result = imagejpeg($new, $new_path); break;
        case 'image/png' : $result = imagepng($new, $new_path); break;
    }
    return $result;
} // code to upload and validate the image is the same previously stated in other php file
function authorize($target_user = null) {
    // echo $_COOKIE['id'];
    global $cms;
    
    if (isset($_COOKIE['id'])) {
    $id = $_COOKIE['id'];
    $pass = $_COOKIE['id2'];
    } else {
        header('Location: login.php');
        exit();
    }
    if ($id) {
        $row = $cms->getMember()->getViaId($id);
        $rowCount = $cms->getMember()->getMemberViaIdRowCount($id);
        if ($rowCount === 1) {

            $psw = $row['user_pass'];
    
            $id_check = $row['user_id'];
            // $id_check_valued = true;
        }
    }
    if ($target_user === null) {
    return;
    }
    elseif (password_verify($_COOKIE['id2'], $psw) && $id_check === $target_user) {
        header("Location: mainpage.php");
        exit;
    }}
    function redirect(string $location, array $parameters = [], $response_code = 302)
{
    $qs = $parameters ? '?' . http_build_query($parameters) : '';        // Create query string
    $location = $location . $qs;                                         // Create new path
    header('Location: ' .  $location, true, $response_code); // Redirect to new page
    exit;                                                                // Stop code
}

function disconnect() {

    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}


function create_filename($filename, $upload_path) {
    $basename = pathinfo($filename, PATHINFO_FILENAME);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $basename = preg_replace('/[^A-z0-9]/', '-', $basename);
    $i = 0;
    while (file_exists($upload_path . $filename)) {
        $i = $i + 1;
        $filename = $basename . $i . '.' . $extension;
    }
    return $filename;

}
function get_pagination_links($current_page, $total_pages, $url, $options)
{   
    if ($total_pages == 1 || $total_pages == 0) {
        return "";
    } else {
    $links = "";
    $total_pages = floor($total_pages);
    if ($current_page != 1) {
        $page = $current_page - 1;
        $links .= "<a href=\"{$url}?page={$page}{$options}\">LAST PAGE</a>";
        $links .= " . ";
    
    }
    if ($total_pages >= 1 && $current_page <= $total_pages) {
        $links .= "<a href=\"{$url}?page=1{$options}\">1-</a>";
        $i = max(2, $current_page - 5);
        if ($i > 2) {
            $links .= " ... ";
        }
         for (; $i < min($current_page + 6, $total_pages); $i++) {
            $links .= "<a href=\"{$url}?page={$i}{$options}\">-{$i}-</a>";
        }
        if ($i != $total_pages)
            $links .= " ... ";
        $links .= "<a href=\"{$url}?page={$total_pages}{$options}\">-{$total_pages}</a>";
    }
    if ($current_page != $total_pages) {
        $links .= " . ";
        $page = $current_page + 1;
        $links .= "<a href=\"{$url}?page={$page}{$options}\">NEXT PAGE</a>";
    }
    

    return $links;
    }
}
