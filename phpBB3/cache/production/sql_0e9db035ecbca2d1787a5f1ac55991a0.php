<?php exit; ?>
1647448439
SELECT m.*, u.user_colour, g.group_colour, g.group_type FROM (pmoderator_cache m) LEFT JOIN pusers u ON (m.user_id = u.user_id) LEFT JOIN pgroups g ON (m.group_id = g.group_id) WHERE m.display_on_index = 1
6
a:0:{}