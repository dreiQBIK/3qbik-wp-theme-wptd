<?php
// https://codex.wordpress.org/Roles_and_Capabilities
// CAUTION: ALL CHANGES HERE ARE PERMANENTLY CHANGES IN DATABASE

// ADMIN
// define new role
$role_admin = 'admin';
// define display name
$role_admin_display_name = 'Admin';
// get capabilities from specific role
$role_caps_admin = get_role('administrator')->capabilities;
// add new role with depending capabilities
add_role($role_admin, $role_admin_display_name, $role_caps_admin);

// REMOVE_ROLES
// remove_role('contributor');
// remove_role('author');
// remove_role('editor');
