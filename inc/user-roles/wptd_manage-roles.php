<?php
// https://codex.wordpress.org/Roles_and_Capabilities
// CAUTION: ALL CHANGES HERE ARE PERMANENTLY CHANGES IN DATABASE

// OWNER
// define new role
$role_owner = 'owner';
// define display name
$role_owner_display_name = 'Owner';
// get capabilities from specific role
$role_caps_admin = get_role('administrator')->capabilities;
// add new role with depending capabilities
add_role($role_owner, $role_owner_display_name, $role_caps_admin);

// REMOVE_ROLES
/*remove_role('subscriber');
remove_role('contributor');
remove_role('author');
remove_role('editor');*/