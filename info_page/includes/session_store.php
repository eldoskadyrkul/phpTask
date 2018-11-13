<?php 
function get_parameters_in_url($user) {
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts = parse_url($url);
    parse_str( $parts['query'] , $query);
    $user = $query['user_id'];
}

function get_data_from_database() {
    $id = print_r($_GET['user_id']);
    $select = mysqli_query($con, "SELECT `id_user`, `reg_firstname`, `reg_lastname`, `reg_activity`, `reg_brthday`, `work_about`, `information_about`, `url_profile`, `email`, `image_url` FROM login_user, register_user, about_user WHERE login_user.id_user = '$id' AND login_user.about_id = about_user.id_about AND login_user.reg_id = register_user.id_reg GROUP BY login_user.id_user");
    $result = mysqli_fetch_array($select);
    $query = mysqli_query($con, "SELECT `id_user` FROM `login_user`");
}
?>
