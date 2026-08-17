<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-11-28 11:26:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') GROUP BY market_id' at line 1 - Invalid query: SELECT event_id,market_id,market_type, MIN(bet_runs) as min_run,MAX(bet_runs) as max_run,MAX(bet_runs2) as max_run2 FROM bet_details where event_id = '575816942' AND market_type='FANCY_ODDS' AND user_id IN () GROUP BY market_id
ERROR - 2025-11-28 11:26:30 --> Severity: Error --> Call to a member function result_array() on boolean /home/saffr247/public_html/admin_old/CODE_APP/controllers/Events_analysis.php 3288
