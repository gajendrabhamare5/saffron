<?php
include('../include/conn.php');
include "../session.php";
$user_id = $_SESSION['CLIENT_LOGIN_ID'];
$event_id = $conn->real_escape_string($_REQUEST['event_id']);
$casino_type = $conn->real_escape_string($_REQUEST['casino_type']);
$cards_result = new stdClass();
	$cards_result->{'ADD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'AHH'} = array(
		'type'		=>	'heart',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'ASS'} = array(
		'type'		=>	'spade',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'ACC'} = array(
		'type'		=>	'club',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	
	$cards_result->{'add'} = array(
		'type'		=>	'diamond',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'ahh'} = array(
		'type'		=>	'heart',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'ass'} = array(
		'type'		=>	'spade',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'acc'} = array(
		'type'		=>	'club',
		'name'		=>	'A',
		'rank'		=>	1,
		'priority'	=>	14
	);
	
	$cards_result->{'2DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	$cards_result->{'2HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	$cards_result->{'2SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	$cards_result->{'2CC'} = array(
		'type'		=>	'club',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	
	$cards_result->{'3DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	$cards_result->{'3HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	$cards_result->{'3SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	$cards_result->{'3CC'} = array(
		'type'		=>	'club',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	
	$cards_result->{'4DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	$cards_result->{'4HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	$cards_result->{'4SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	$cards_result->{'4CC'} = array(
		'type'		=>	'club',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	
	$cards_result->{'5SS'} = array(
		'type'		=>	'diamond',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	$cards_result->{'5HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	$cards_result->{'5SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	$cards_result->{'5CC'} = array(
		'type'		=>	'club',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	
	$cards_result->{'6DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	$cards_result->{'6HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	$cards_result->{'6SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	$cards_result->{'6CC'} = array(
		'type'		=>	'club',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	
	$cards_result->{'7DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	$cards_result->{'7HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	$cards_result->{'7SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	$cards_result->{'7CC'} = array(
		'type'		=>	'club',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	
	$cards_result->{'8DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	$cards_result->{'8HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	$cards_result->{'8SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	$cards_result->{'8CC'} = array(
		'type'		=>	'club',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	
	$cards_result->{'9DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	$cards_result->{'9HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	$cards_result->{'9SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	$cards_result->{'9CC'} = array(
		'type'		=>	'club',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	
	$cards_result->{'10DD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	$cards_result->{'10HH'} = array(
		'type'		=>	'heart',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	$cards_result->{'10SS'} = array(
		'type'		=>	'spade',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	$cards_result->{'10CC'} = array(
		'type'		=>	'club',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	
	$cards_result->{'JDD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'J',
		'rank'		=>	11,
		'priority'	=>	11
	);
	$cards_result->{'JHH'} = array(
		'type'		=>	'heart',
		'name'		=>	'J',
		'rank'		=>	11,
		'priority'	=>	11
	);
	$cards_result->{'JSS'} = array(
		'type'		=>	'spade',
		'name'		=>	'J',
		'rank'		=>	11,
		'priority'	=>	11
	);
	$cards_result->{'JCC'} = array(
		'type'		=>	'club',
		'name'		=>	'J',
		'rank'		=>	11,
		'priority'	=>	11
	);
	
	$cards_result->{'QDD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'Q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	$cards_result->{'QHH'} = array(
		'type'		=>	'heart',
		'name'		=>	'Q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	$cards_result->{'QSS'} = array(
		'type'		=>	'spade',
		'name'		=>	'Q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	$cards_result->{'QCC'} = array(
		'type'		=>	'club',
		'name'		=>	'Q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	
	$cards_result->{'KDD'} = array(
		'type'		=>	'diamond',
		'name'		=>	'K',
		'rank'		=>	13,
		'priority'	=>	13
	);
	$cards_result->{'KHH'} = array(
		'type'		=>	'heart',
		'name'		=>	'K',
		'rank'		=>	13,
		'priority'	=>	13
	);
	$cards_result->{'KSS'} = array(
		'type'		=>	'spade',
		'name'		=>	'K',
		'rank'		=>	13,
		'priority'	=>	13
	);
	$cards_result->{'KCC'} = array(
		'type'		=>	'club',
		'name'		=>	'K',
		'rank'		=>	13,
		'priority'	=>	13
	);
	$cards_result->{'add'} = array(
		'type'		=>	'diamond',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'ahh'} = array(
		'type'		=>	'heart',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'ass'} = array(
		'type'		=>	'spade',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'acc'} = array(
		'type'		=>	'club',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	
	$cards_result->{'add'} = array(
		'type'		=>	'diamond',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'ahh'} = array(
		'type'		=>	'heart',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'ass'} = array(
		'type'		=>	'spade',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	$cards_result->{'acc'} = array(
		'type'		=>	'club',
		'name'		=>	'a',
		'rank'		=>	1,
		'priority'	=>	14
	);
	
	$cards_result->{'2dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	$cards_result->{'2hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	$cards_result->{'2ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	$cards_result->{'2cc'} = array(
		'type'		=>	'club',
		'name'		=>	'2',
		'rank'		=>	2,
		'priority'	=>	2
	);
	
	$cards_result->{'3dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	$cards_result->{'3hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	$cards_result->{'3ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	$cards_result->{'3cc'} = array(
		'type'		=>	'club',
		'name'		=>	'3',
		'rank'		=>	3,
		'priority'	=>	3
	);
	
	$cards_result->{'4dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	$cards_result->{'4hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	$cards_result->{'4ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	$cards_result->{'4cc'} = array(
		'type'		=>	'club',
		'name'		=>	'4',
		'rank'		=>	4,
		'priority'	=>	4
	);
	
	$cards_result->{'5dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	$cards_result->{'5hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	$cards_result->{'5ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	$cards_result->{'5cc'} = array(
		'type'		=>	'club',
		'name'		=>	'5',
		'rank'		=>	5,
		'priority'	=>	5
	);
	
	$cards_result->{'6dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	$cards_result->{'6hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	$cards_result->{'6ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	$cards_result->{'6cc'} = array(
		'type'		=>	'club',
		'name'		=>	'6',
		'rank'		=>	6,
		'priority'	=>	6
	);
	
	$cards_result->{'7dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	$cards_result->{'7hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	$cards_result->{'7ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	$cards_result->{'7cc'} = array(
		'type'		=>	'club',
		'name'		=>	'7',
		'rank'		=>	7,
		'priority'	=>	7
	);
	
	$cards_result->{'8dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	$cards_result->{'8hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	$cards_result->{'8ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	$cards_result->{'8cc'} = array(
		'type'		=>	'club',
		'name'		=>	'8',
		'rank'		=>	8,
		'priority'	=>	8
	);
	
	$cards_result->{'9dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	$cards_result->{'9hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	$cards_result->{'9ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	$cards_result->{'9cc'} = array(
		'type'		=>	'club',
		'name'		=>	'9',
		'rank'		=>	9,
		'priority'	=>	9
	);
	
	$cards_result->{'10dd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	$cards_result->{'10hh'} = array(
		'type'		=>	'heart',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	$cards_result->{'10ss'} = array(
		'type'		=>	'spade',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	$cards_result->{'10cc'} = array(
		'type'		=>	'club',
		'name'		=>	'10',
		'rank'		=>	10,
		'priority'	=>	10
	);
	
	$cards_result->{'jdd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'j',
		'rank'		=>	11,
		'priority'	=>	11
	);
	$cards_result->{'jhh'} = array(
		'type'		=>	'heart',
		'name'		=>	'j',
		'rank'		=>	11,
		'priority'	=>	11
	);
	$cards_result->{'jss'} = array(
		'type'		=>	'spade',
		'name'		=>	'j',
		'rank'		=>	11,
		'priority'	=>	11
	);
	$cards_result->{'jcc'} = array(
		'type'		=>	'club',
		'name'		=>	'j',
		'rank'		=>	11,
		'priority'	=>	11
	);
	
	$cards_result->{'qdd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	$cards_result->{'qhh'} = array(
		'type'		=>	'heart',
		'name'		=>	'q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	$cards_result->{'qss'} = array(
		'type'		=>	'spade',
		'name'		=>	'q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	$cards_result->{'qcc'} = array(
		'type'		=>	'club',
		'name'		=>	'q',
		'rank'		=>	12,
		'priority'	=>	12
	);
	
	$cards_result->{'kdd'} = array(
		'type'		=>	'diamond',
		'name'		=>	'k',
		'rank'		=>	13,
		'priority'	=>	13
	);
	$cards_result->{'khh'} = array(
		'type'		=>	'heart',
		'name'		=>	'k',
		'rank'		=>	13,
		'priority'	=>	13
	);
	$cards_result->{'kss'} = array(
		'type'		=>	'spade',
		'name'		=>	'k',
		'rank'		=>	13,
		'priority'	=>	13
	);
	$cards_result->{'kcc'} = array(
		'type'		=>	'club',
		'name'		=>	'k',
		'rank'		=>	13,
		'priority'	=>	13
	); /*

$cards_result = new stdClass();
$cards_result->{'ASS'} = array(
	'type'		=>	'diamond',
	'name'		=>	'A',
	'rank'		=>	1,
	'priority'	=>	14
);
$cards_result->{'ADD'} = array(
	'type'		=>	'heart',
	'name'		=>	'A',
	'rank'		=>	1,
	'priority'	=>	14
);
$cards_result->{'AHH'} = array(
	'type'		=>	'spade',
	'name'		=>	'A',
	'rank'		=>	1,
	'priority'	=>	14
);
$cards_result->{'ACC'} = array(
	'type'		=>	'club',
	'name'		=>	'A',
	'rank'		=>	1,
	'priority'	=>	14
);

$cards_result->{'ass'} = array(
	'type'		=>	'diamond',
	'name'		=>	'A',
	'rank'		=>	1,
	'priority'	=>	14
);
$cards_result->{'add'} = array(
	'type'		=>	'heart',
	'name'		=>	'A',
	'rank'		=>	1,
	'priority'	=>	14
);
$cards_result->{'ahh'} = array(
	'type'		=>	'spade',
	'name'		=>	'A',
	'rank'		=>	1,
	'priority'	=>	14
);
$cards_result->{'acc'} = array(
	'type'		=>	'club',
	'name'		=>	'A',
	'rank'		=>	1,
	'priority'	=>	14
);

$cards_result->{'2SS'} = array(
	'type'		=>	'diamond',
	'name'		=>	'2',
	'rank'		=>	2,
	'priority'	=>	2
);
$cards_result->{'2DD'} = array(
	'type'		=>	'heart',
	'name'		=>	'2',
	'rank'		=>	2,
	'priority'	=>	2
);
$cards_result->{'2HH'} = array(
	'type'		=>	'spade',
	'name'		=>	'2',
	'rank'		=>	2,
	'priority'	=>	2
);
$cards_result->{'2CC'} = array(
	'type'		=>	'club',
	'name'		=>	'2',
	'rank'		=>	2,
	'priority'	=>	2
);

$cards_result->{'3SS'} = array(
	'type'		=>	'diamond',
	'name'		=>	'3',
	'rank'		=>	3,
	'priority'	=>	3
);
$cards_result->{'3DD'} = array(
	'type'		=>	'heart',
	'name'		=>	'3',
	'rank'		=>	3,
	'priority'	=>	3
);
$cards_result->{'3HH'} = array(
	'type'		=>	'spade',
	'name'		=>	'3',
	'rank'		=>	3,
	'priority'	=>	3
);
$cards_result->{'3CC'} = array(
	'type'		=>	'club',
	'name'		=>	'3',
	'rank'		=>	3,
	'priority'	=>	3
);

$cards_result->{'4SS'} = array(
	'type'		=>	'diamond',
	'name'		=>	'4',
	'rank'		=>	4,
	'priority'	=>	4
);
$cards_result->{'4DD'} = array(
	'type'		=>	'heart',
	'name'		=>	'4',
	'rank'		=>	4,
	'priority'	=>	4
);
$cards_result->{'4HH'} = array(
	'type'		=>	'spade',
	'name'		=>	'4',
	'rank'		=>	4,
	'priority'	=>	4
);
$cards_result->{'4CC'} = array(
	'type'		=>	'club',
	'name'		=>	'4',
	'rank'		=>	4,
	'priority'	=>	4
);

$cards_result->{'5SS'} = array(
	'type'		=>	'diamond',
	'name'		=>	'5',
	'rank'		=>	5,
	'priority'	=>	5
);
$cards_result->{'5DD'} = array(
	'type'		=>	'heart',
	'name'		=>	'5',
	'rank'		=>	5,
	'priority'	=>	5
);
$cards_result->{'5HH'} = array(
	'type'		=>	'spade',
	'name'		=>	'5',
	'rank'		=>	5,
	'priority'	=>	5
);
$cards_result->{'5CC'} = array(
	'type'		=>	'club',
	'name'		=>	'5',
	'rank'		=>	5,
	'priority'	=>	5
);

$cards_result->{'6SS'} = array(
	'type'		=>	'diamond',
	'name'		=>	'6',
	'rank'		=>	6,
	'priority'	=>	6
);
$cards_result->{'6DD'} = array(
	'type'		=>	'heart',
	'name'		=>	'6',
	'rank'		=>	6,
	'priority'	=>	6
);
$cards_result->{'6HH'} = array(
	'type'		=>	'spade',
	'name'		=>	'6',
	'rank'		=>	6,
	'priority'	=>	6
);
$cards_result->{'6CC'} = array(
	'type'		=>	'club',
	'name'		=>	'6',
	'rank'		=>	6,
	'priority'	=>	6
);

$cards_result->{'7SS'} = array(
	'type'		=>	'diamond',
	'name'		=>	'7',
	'rank'		=>	7,
	'priority'	=>	7
);
$cards_result->{'7DD'} = array(
	'type'		=>	'heart',
	'name'		=>	'7',
	'rank'		=>	7,
	'priority'	=>	7
);
$cards_result->{'7HH'} = array(
	'type'		=>	'spade',
	'name'		=>	'7',
	'rank'		=>	7,
	'priority'	=>	7
);
$cards_result->{'7CC'} = array(
	'type'		=>	'club',
	'name'		=>	'7',
	'rank'		=>	7,
	'priority'	=>	7
);

$cards_result->{'8SS'} = array(
	'type'		=>	'diamond',
	'name'		=>	'8',
	'rank'		=>	8,
	'priority'	=>	8
);
$cards_result->{'8DD'} = array(
	'type'		=>	'heart',
	'name'		=>	'8',
	'rank'		=>	8,
	'priority'	=>	8
);
$cards_result->{'8HH'} = array(
	'type'		=>	'spade',
	'name'		=>	'8',
	'rank'		=>	8,
	'priority'	=>	8
);
$cards_result->{'8CC'} = array(
	'type'		=>	'club',
	'name'		=>	'8',
	'rank'		=>	8,
	'priority'	=>	8
);

$cards_result->{'9SS'} = array(
	'type'		=>	'diamond',
	'name'		=>	'9',
	'rank'		=>	9,
	'priority'	=>	9
);
$cards_result->{'9DD'} = array(
	'type'		=>	'heart',
	'name'		=>	'9',
	'rank'		=>	9,
	'priority'	=>	9
);
$cards_result->{'9HH'} = array(
	'type'		=>	'spade',
	'name'		=>	'9',
	'rank'		=>	9,
	'priority'	=>	9
);
$cards_result->{'9CC'} = array(
	'type'		=>	'club',
	'name'		=>	'9',
	'rank'		=>	9,
	'priority'	=>	9
);

$cards_result->{'10SS'} = array(
	'type'		=>	'diamond',
	'name'		=>	'10',
	'rank'		=>	10,
	'priority'	=>	10
);
$cards_result->{'10DD'} = array(
	'type'		=>	'heart',
	'name'		=>	'10',
	'rank'		=>	10,
	'priority'	=>	10
);
$cards_result->{'10HH'} = array(
	'type'		=>	'spade',
	'name'		=>	'10',
	'rank'		=>	10,
	'priority'	=>	10
);
$cards_result->{'10CC'} = array(
	'type'		=>	'club',
	'name'		=>	'10',
	'rank'		=>	10,
	'priority'	=>	10
);

$cards_result->{'JSS'} = array(
	'type'		=>	'diamond',
	'name'		=>	'J',
	'rank'		=>	11,
	'priority'	=>	11
);
$cards_result->{'JDD'} = array(
	'type'		=>	'heart',
	'name'		=>	'J',
	'rank'		=>	11,
	'priority'	=>	11
);
$cards_result->{'JHH'} = array(
	'type'		=>	'spade',
	'name'		=>	'J',
	'rank'		=>	11,
	'priority'	=>	11
);
$cards_result->{'JCC'} = array(
	'type'		=>	'club',
	'name'		=>	'J',
	'rank'		=>	11,
	'priority'	=>	11
);

$cards_result->{'QSS'} = array(
	'type'		=>	'diamond',
	'name'		=>	'Q',
	'rank'		=>	12,
	'priority'	=>	12
);
$cards_result->{'QDD'} = array(
	'type'		=>	'heart',
	'name'		=>	'Q',
	'rank'		=>	12,
	'priority'	=>	12
);
$cards_result->{'QHH'} = array(
	'type'		=>	'spade',
	'name'		=>	'Q',
	'rank'		=>	12,
	'priority'	=>	12
);
$cards_result->{'QCC'} = array(
	'type'		=>	'club',
	'name'		=>	'Q',
	'rank'		=>	12,
	'priority'	=>	12
);

$cards_result->{'KSS'} = array(
	'type'		=>	'diamond',
	'name'		=>	'K',
	'rank'		=>	13,
	'priority'	=>	13
);
$cards_result->{'KDD'} = array(
	'type'		=>	'heart',
	'name'		=>	'K',
	'rank'		=>	13,
	'priority'	=>	13
);
$cards_result->{'KHH'} = array(
	'type'		=>	'spade',
	'name'		=>	'K',
	'rank'		=>	13,
	'priority'	=>	13
);
$cards_result->{'KCC'} = array(
	'type'		=>	'club',
	'name'		=>	'K',
	'rank'		=>	13,
	'priority'	=>	13
);
$cards_result->{'ass'} = array(
	'type'		=>	'diamond',
	'name'		=>	'a',
	'rank'		=>	1,
	'priority'	=>	14
);
$cards_result->{'add'} = array(
	'type'		=>	'heart',
	'name'		=>	'a',
	'rank'		=>	1,
	'priority'	=>	14
);
$cards_result->{'ahh'} = array(
	'type'		=>	'spade',
	'name'		=>	'a',
	'rank'		=>	1,
	'priority'	=>	14
);
$cards_result->{'acc'} = array(
	'type'		=>	'club',
	'name'		=>	'a',
	'rank'		=>	1,
	'priority'	=>	14
);

$cards_result->{'ass'} = array(
	'type'		=>	'diamond',
	'name'		=>	'a',
	'rank'		=>	1,
	'priority'	=>	14
);
$cards_result->{'add'} = array(
	'type'		=>	'heart',
	'name'		=>	'a',
	'rank'		=>	1,
	'priority'	=>	14
);
$cards_result->{'ahh'} = array(
	'type'		=>	'spade',
	'name'		=>	'a',
	'rank'		=>	1,
	'priority'	=>	14
);
$cards_result->{'acc'} = array(
	'type'		=>	'club',
	'name'		=>	'a',
	'rank'		=>	1,
	'priority'	=>	14
);

$cards_result->{'2ss'} = array(
	'type'		=>	'diamond',
	'name'		=>	'2',
	'rank'		=>	2,
	'priority'	=>	2
);
$cards_result->{'2dd'} = array(
	'type'		=>	'heart',
	'name'		=>	'2',
	'rank'		=>	2,
	'priority'	=>	2
);
$cards_result->{'2hh'} = array(
	'type'		=>	'spade',
	'name'		=>	'2',
	'rank'		=>	2,
	'priority'	=>	2
);
$cards_result->{'2cc'} = array(
	'type'		=>	'club',
	'name'		=>	'2',
	'rank'		=>	2,
	'priority'	=>	2
);

$cards_result->{'3ss'} = array(
	'type'		=>	'diamond',
	'name'		=>	'3',
	'rank'		=>	3,
	'priority'	=>	3
);
$cards_result->{'3dd'} = array(
	'type'		=>	'heart',
	'name'		=>	'3',
	'rank'		=>	3,
	'priority'	=>	3
);
$cards_result->{'3hh'} = array(
	'type'		=>	'spade',
	'name'		=>	'3',
	'rank'		=>	3,
	'priority'	=>	3
);
$cards_result->{'3cc'} = array(
	'type'		=>	'club',
	'name'		=>	'3',
	'rank'		=>	3,
	'priority'	=>	3
);

$cards_result->{'4ss'} = array(
	'type'		=>	'diamond',
	'name'		=>	'4',
	'rank'		=>	4,
	'priority'	=>	4
);
$cards_result->{'4dd'} = array(
	'type'		=>	'heart',
	'name'		=>	'4',
	'rank'		=>	4,
	'priority'	=>	4
);
$cards_result->{'4hh'} = array(
	'type'		=>	'spade',
	'name'		=>	'4',
	'rank'		=>	4,
	'priority'	=>	4
);
$cards_result->{'4cc'} = array(
	'type'		=>	'club',
	'name'		=>	'4',
	'rank'		=>	4,
	'priority'	=>	4
);

$cards_result->{'5ss'} = array(
	'type'		=>	'diamond',
	'name'		=>	'5',
	'rank'		=>	5,
	'priority'	=>	5
);
$cards_result->{'5dd'} = array(
	'type'		=>	'heart',
	'name'		=>	'5',
	'rank'		=>	5,
	'priority'	=>	5
);
$cards_result->{'5hh'} = array(
	'type'		=>	'spade',
	'name'		=>	'5',
	'rank'		=>	5,
	'priority'	=>	5
);
$cards_result->{'5cc'} = array(
	'type'		=>	'club',
	'name'		=>	'5',
	'rank'		=>	5,
	'priority'	=>	5
);

$cards_result->{'6ss'} = array(
	'type'		=>	'diamond',
	'name'		=>	'6',
	'rank'		=>	6,
	'priority'	=>	6
);
$cards_result->{'6dd'} = array(
	'type'		=>	'heart',
	'name'		=>	'6',
	'rank'		=>	6,
	'priority'	=>	6
);
$cards_result->{'6hh'} = array(
	'type'		=>	'spade',
	'name'		=>	'6',
	'rank'		=>	6,
	'priority'	=>	6
);
$cards_result->{'6cc'} = array(
	'type'		=>	'club',
	'name'		=>	'6',
	'rank'		=>	6,
	'priority'	=>	6
);

$cards_result->{'7ss'} = array(
	'type'		=>	'diamond',
	'name'		=>	'7',
	'rank'		=>	7,
	'priority'	=>	7
);
$cards_result->{'7dd'} = array(
	'type'		=>	'heart',
	'name'		=>	'7',
	'rank'		=>	7,
	'priority'	=>	7
);
$cards_result->{'7hh'} = array(
	'type'		=>	'spade',
	'name'		=>	'7',
	'rank'		=>	7,
	'priority'	=>	7
);
$cards_result->{'7cc'} = array(
	'type'		=>	'club',
	'name'		=>	'7',
	'rank'		=>	7,
	'priority'	=>	7
);

$cards_result->{'8ss'} = array(
	'type'		=>	'diamond',
	'name'		=>	'8',
	'rank'		=>	8,
	'priority'	=>	8
);
$cards_result->{'8dd'} = array(
	'type'		=>	'heart',
	'name'		=>	'8',
	'rank'		=>	8,
	'priority'	=>	8
);
$cards_result->{'8hh'} = array(
	'type'		=>	'spade',
	'name'		=>	'8',
	'rank'		=>	8,
	'priority'	=>	8
);
$cards_result->{'8cc'} = array(
	'type'		=>	'club',
	'name'		=>	'8',
	'rank'		=>	8,
	'priority'	=>	8
);

$cards_result->{'9ss'} = array(
	'type'		=>	'diamond',
	'name'		=>	'9',
	'rank'		=>	9,
	'priority'	=>	9
);
$cards_result->{'9dd'} = array(
	'type'		=>	'heart',
	'name'		=>	'9',
	'rank'		=>	9,
	'priority'	=>	9
);
$cards_result->{'9hh'} = array(
	'type'		=>	'spade',
	'name'		=>	'9',
	'rank'		=>	9,
	'priority'	=>	9
);
$cards_result->{'9cc'} = array(
	'type'		=>	'club',
	'name'		=>	'9',
	'rank'		=>	9,
	'priority'	=>	9
);

$cards_result->{'10ss'} = array(
	'type'		=>	'diamond',
	'name'		=>	'10',
	'rank'		=>	10,
	'priority'	=>	10
);
$cards_result->{'10dd'} = array(
	'type'		=>	'heart',
	'name'		=>	'10',
	'rank'		=>	10,
	'priority'	=>	10
);
$cards_result->{'10hh'} = array(
	'type'		=>	'spade',
	'name'		=>	'10',
	'rank'		=>	10,
	'priority'	=>	10
);
$cards_result->{'10cc'} = array(
	'type'		=>	'club',
	'name'		=>	'10',
	'rank'		=>	10,
	'priority'	=>	10
);

$cards_result->{'jss'} = array(
	'type'		=>	'diamond',
	'name'		=>	'j',
	'rank'		=>	11,
	'priority'	=>	11
);
$cards_result->{'jdd'} = array(
	'type'		=>	'heart',
	'name'		=>	'j',
	'rank'		=>	11,
	'priority'	=>	11
);
$cards_result->{'jhh'} = array(
	'type'		=>	'spade',
	'name'		=>	'j',
	'rank'		=>	11,
	'priority'	=>	11
);
$cards_result->{'jcc'} = array(
	'type'		=>	'club',
	'name'		=>	'j',
	'rank'		=>	11,
	'priority'	=>	11
);

$cards_result->{'qss'} = array(
	'type'		=>	'diamond',
	'name'		=>	'q',
	'rank'		=>	12,
	'priority'	=>	12
);
$cards_result->{'qdd'} = array(
	'type'		=>	'heart',
	'name'		=>	'q',
	'rank'		=>	12,
	'priority'	=>	12
);
$cards_result->{'qhh'} = array(
	'type'		=>	'spade',
	'name'		=>	'q',
	'rank'		=>	12,
	'priority'	=>	12
);
$cards_result->{'qcc'} = array(
	'type'		=>	'club',
	'name'		=>	'q',
	'rank'		=>	12,
	'priority'	=>	12
);

$cards_result->{'kss'} = array(
	'type'		=>	'diamond',
	'name'		=>	'k',
	'rank'		=>	13,
	'priority'	=>	13
);
$cards_result->{'kdd'} = array(
	'type'		=>	'heart',
	'name'		=>	'k',
	'rank'		=>	13,
	'priority'	=>	13
);
$cards_result->{'khh'} = array(
	'type'		=>	'spade',
	'name'		=>	'k',
	'rank'		=>	13,
	'priority'	=>	13
);
$cards_result->{'kcc'} = array(
	'type'		=>	'club',
	'name'		=>	'k',
	'rank'		=>	13,
	'priority'	=>	13
);*/


function is_even($card11, $cards_result)
{
	$card1 = $cards_result->$card11;
	$rank = $card1['rank'];
	if ($rank % 2 == 0) {
		return true;
	} else {
		return false;
	}
}

function is_red($card11, $cards_result)
{
	$card1 = $cards_result->$card11;
	$type = $card1['type'];
	if ($type == "diamond" or $type == "heart") {
		return true;
	} else {
		return false;
	}
}

function is_pair_dt20($dragon_cards, $tiger_cards, $cards_result)
{
	$dragon_cards = $cards_result->$dragon_cards;
	$dragon_cards_rank = $dragon_cards['rank'];

	$tiger_cards = $cards_result->$tiger_cards;
	$tiger_cards_rank = $tiger_cards['rank'];

	if ($tiger_cards_rank == $dragon_cards_rank) {
		return true;
	} else {
		return false;
	}
}

function rank_number($card11, $cards_result)
{
	$card1 = $cards_result->$card11;
	$rank = $card1['rank'];
	return $rank;
}

function is_dulhan($card11, $cards_result)
{
	$card1 = $cards_result->$card11;
	$rank = $card1['rank'];

	if ($rank == 12 or $rank == 13) {
		return true;
	} else {
		return false;
	}
}


if ($casino_type == "teen20OLD") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$cards = json_decode($cards);

	$carda1  = WEB_URL . "/storage/front/img/cards/" . $cards[0] . ".png";
	$carda2  = WEB_URL . "/storage/front/img/cards/" . $cards[2] . ".png";
	$carda3  = WEB_URL . "/storage/front/img/cards/" . $cards[4] . ".png";

	$cardb1  = WEB_URL . "/storage/front/img/cards/" . $cards[1] . ".png";
	$cardb2  = WEB_URL . "/storage/front/img/cards/" . $cards[3] . ".png";
	$cardb3  = WEB_URL . "/storage/front/img/cards/" . $cards[5] . ".png";
?>

	<div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player A</h4>
		</div>
		<div class="col-7">
			<div class="result-image"><img src="<?php echo $carda1; ?>"> <img src="<?php echo $carda2; ?>"> <img
					src="<?php echo $carda3; ?>"></div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == "A" || $result_status == "1") {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>


		</div>
	</div>


	<div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player B</h4>
		</div>
		<div class="col-7">
			<div class="result-image"><img src="<?php echo $cardb1; ?>"> <img src="<?php echo $cardb2; ?>"> <img
					src="<?php echo $cardb3; ?>"></div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == "B" || $result_status == "2") {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>


		</div>
	</div>

<?php
} else if ($casino_type == "teen41" || $casino_type == "teen42" || $casino_type == "teen33" || $casino_type == "teen3" || $casino_type == "teen32" || $casino_type == "teen6" || $casino_type == "teen" || $casino_type == "teen62") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$rdesc_array = explode("#", $desc_remakrs);
	$cards = json_decode($cards);

	$carda1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$carda2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
	$carda3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[4] . ".png";

	$cardb1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	$cardb2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";
	$cardb3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[5] . ".png";
?>


	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player A</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			<?php
			if ($result_status == "A" || $result_status == "1") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		<div class="result-image">
				<img src="<?php echo $carda1; ?>"> <img src="<?php echo $carda2; ?>"> <img
					src="<?php echo $carda3; ?>">
			</div>
		
		</div>

	</div>
	
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player B</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
	
		<div class="result-image">
				<img src="<?php echo $cardb1; ?>"> <img src="<?php echo $cardb2; ?>"> <img
					src="<?php echo $cardb3; ?>">
			</div>
				<?php
			if ($result_status == "B" || $result_status == "2") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		</div>

	</div>

	<? if ($casino_type == "teen" || $casino_type == "teen62") { ?>
		<div class="row row5 oepn-teen-result">
			<div class="col-12 text-center"
				style="flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px">
				<div><span style="color:gray">Winner: </span>
					<? echo $rdesc_array[0]; ?>
				</div>
				<div><span style="color:gray">Odd/Even: </span>
					<? echo $rdesc_array[2]; ?>
				</div>
				<div><span style="color:gray">Consecutive: </span>
					<? echo $rdesc_array[3]; ?>
				</div>
			</div>

		</div>
	<?
	}
	?>
	<? if ($casino_type == "teen41" || $casino_type == "teen42") { ?>
		<div class="row row5 oepn-teen-result mb-0">
			<div class="col-12 text-center"
				style="flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px">
				<div>Winner:
					<? echo $rdesc_array[0]; ?>
				</div>
				
			</div>

		</div>
		<div class="row row5 oepn-teen-result">
			<div class="col-12 text-center"
				style="flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;">
				
				<div>Under/Over:
					<? echo $rdesc_array[1]; ?>
				</div>
			</div>

		</div>
	<?
	}
	?>
	<? if ($casino_type == "teen33") { ?>
		<div class="row row5 oepn-teen-result">
			<div class="col-12 text-center"
				style="flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px">
				<div><span style="color:gray">Winner: </span>
					<? echo $rdesc_array[0]; ?>
				</div>
			</div>

		</div>
	<?
	}
	?>
	<? if ($casino_type == "teen32" || $casino_type == "teen3" ) { ?>
		<div class="row row5 oepn-teen-result">
			<div class="col-12 text-center"
				style="flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px">
				<div><span style="color:gray">Winner: </span>
					<? echo $rdesc_array[0]; ?>
				</div>
			</div>

		</div>
	<?
	}
	?>
	<? if ($casino_type == "teen6") { ?>
		<div class="row row5 oepn-teen-result">
			<div class="col-12 text-center flex-column text-center"
				style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;;gap:8px;">
				<div><span style="color:gray">Winner: </span>
					<? echo $rdesc_array[0]; ?>
				</div>
				<div><span style="color:gray">Suit: </span>
					<? echo $rdesc_array[1]; ?>
				</div>
				<div><span style="color:gray">Odd/Even: </span>
					<? echo $rdesc_array[2]; ?>
				</div>
				<div><span style="color:gray">Cards: </span>
					<? echo $rdesc_array[3]; ?>
				</div>
				<div><span style="color:gray">Under/Over: </span>
					<? echo $rdesc_array[4]; ?>
				</div>
			</div>

		</div>
	<?
	}
	?>
	<?php
} else if ($casino_type == "race2") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	if (mysqli_num_rows($get_casino_result) > 0) {
		$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
		$cards = $fetch_get_casino_result['cards'];
		$result_status = $fetch_get_casino_result['result_status'];
		$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
		$rdesc_array = explode("#", $desc_remakrs);
		$cards = json_decode($cards);

		$card1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
		$card2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
		$card3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";

		$card4  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";
	?>

		<!-- <div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title">
				<h4>Player A</h4>
			</div>
			<div class="col-7">
				<div class="result-image"><img src="<?php echo $card1; ?>"></div>
			</div>
			<div class="col-2 winner-box">
				<?php
				if ($result_status == "A" || $result_status == "1") {
				?>
					<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
				<?php
				}
				?>


			</div>
		</div>


		<div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title">
				<h4>Player B</h4>
			</div>
			<div class="col-7">
				<div class="result-image"><img src="<?php echo $card2; ?>"></div>
			</div>
			<div class="col-2 winner-box">
				<?php
				if ($result_status == "B" || $result_status == "2") {
				?>
					<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
				<?php
				}
				?>


			</div>
		</div> -->

<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player A</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
			<img src="<?php echo $card1; ?>">
			</div>
		<?php
			if ($result_status == "A" || $result_status == "1") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		</div>

	</div>
	
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player B</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
	
		<div class="result-image">
				<img src="<?php echo $card2; ?>">
			</div>
				<?php
			if ($result_status == "B" || $result_status == "2") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		</div>

	</div>

		<!-- <div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title">
				<h4>Player C</h4>
			</div>
			<div class="col-7">
				<div class="result-image"><img src="<?php echo $card3; ?>"></div>
			</div>
			<div class="col-2 winner-box">
				<?php
				if ($result_status == "C" || $result_status == "3") {
				?>
					<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
				<?php
				}
				?>


			</div>
		</div>
		<div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title">
				<h4>Player D</h4>
			</div>
			<div class="col-7">
				<div class="result-image"><img src="<?php echo $card4; ?>"></div>
			</div>
			<div class="col-2 winner-box">
				<?php
				if ($result_status == "D" || $result_status == "4") {
				?>
					<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
				<?php
				}
				?>


			</div>
		</div> -->

<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player C</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
		
		<div class="result-image">
			<img src="<?php echo $card3; ?>">
			</div>
			<?php
			if ($result_status == "C" || $result_status == "3") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		</div>

	</div>
	
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player D</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
	
		<div class="result-image">
				<img src="<?php echo $card4; ?>">
			</div>
				<?php
			if ($result_status == "D" || $result_status == "4") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		</div>

	</div>

		<div class="row row5 oepn-teen-result">
			<div class="col-12 text-center flex-column text-center"
				style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;;gap:8px;">
				<div><span style="color:gray">Winner </span>
					<? echo $rdesc_array[0]; ?>
				</div>
			</div>

		</div>
	<?php
	}
} else if ($casino_type == "cmeter1") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	if (mysqli_num_rows($get_casino_result) > 0) {
		$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
		$cards = $fetch_get_casino_result['cards'];
		$result_status = $fetch_get_casino_result['result_status'];
		$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
		$rdesc_array = explode("#", $desc_remakrs);
		$cards = json_decode($cards);

		$card1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
		$card2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	?>

		<!-- <div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title">
				<h4>Fighter A</h4>
			</div>
			<div class="col-7">
				<div class="result-image"><img src="<?php echo $card1; ?>"></div>
			</div>
			<div class="col-2 winner-box">
				<?php
				if ($result_status == "Fighter A" || $result_status == "1") {
				?>
					<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
				<?php
				}
				?>


			</div>
		</div>


		<div class="row row5 oepn-teen-result">
			<div class="col-3 winner-title">
				<h4>Fighter B</h4>
			</div>
			<div class="col-7">
				<div class="result-image"><img src="<?php echo $card2; ?>"></div>
			</div>
			<div class="col-2 winner-box">
				<?php
				if ($result_status == "Fighter B" || $result_status == "2") {
				?>
					<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
				<?php
				}
				?>


			</div>
		</div> -->

			<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Fighter A </h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			<?php
			if ($result_status == "Fighter A" || $result_status == "1") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		<div class="result-image">
			<img src="<?php echo $card1; ?>">
			</div>
		
		</div>

	</div>
	
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Fighter B</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
	
		<div class="result-image">
				<img src="<?php echo $card2; ?>">
			</div>
				<?php
			if ($result_status == "Fighter B" || $result_status == "2") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		</div>

	</div>

		<div class="row row5 oepn-teen-result">
			<div class="col-12 text-center flex-column text-center"
				style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;;gap:8px;">
				<div><span style="color:gray">Winner: </span>
					<? echo $rdesc_array[0]; ?>
				</div>
				<div><span style="color:gray">Points: </span>
					<? echo $rdesc_array[1]; ?>
				</div>
			</div>

		</div>
	<?php
	}
} else if ($casino_type == "teen120") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$rdesc_array = explode("#", $desc_remakrs);
	$cards = json_decode($cards);

	$carda1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$cardb1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	?>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player</h4>
		</div>
		<div class="col-7">
			<div class="result-image"><img src="<?php echo $carda1; ?>"> </div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == "A" || $result_status == "1") {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>


		</div>
	</div>


	<div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Dealer</h4>
		</div>
		<div class="col-7">
			<div class="result-image"><img src="<?php echo $cardb1; ?>"> </div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == "B" || $result_status == "2") {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>


		</div>
	</div> -->

	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player </h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			<?php
			if ($result_status == "A" || $result_status == "1") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		<div class="result-image">
			<img src="<?php echo $carda1; ?>"> 
			</div>
		
		</div>

	</div>
	
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Dealer</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
	
		<div class="result-image">
				<img src="<?php echo $cardb1; ?>"> 
			</div>
				<?php
			if ($result_status == "B" || $result_status == "2") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		</div>

	</div>

	<div class="row row5 oepn-teen-result">
		<div class="col-12 text-center flex-column text-center"
			style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;;gap:8px;">
			<div><span style="color:gray">Winner </span>
				<? echo $rdesc_array[0]; ?>
			</div>
			<div><span style="color:gray">Pair </span>
				<? echo $rdesc_array[1]; ?>
			</div>
		</div>

	</div>

<?php
} else if ($casino_type == "dum10") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$cards_b = $fetch_get_casino_result['b_cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$rdesc_array = explode("#", $desc_remakrs);
	$cards = json_decode($cards);
	$tot_count = count($cards);
	$cardb1 = "/storage/front/img/cards/1.png";

?>

	<div class="row abj-result">
		<div class="col-12 text-center">
			<div class="result-image">
				<div id="result-a-cards" class="ab-rtlslider owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
					<div class="owl-stage-outer">
						<div class="owl-stage"
							style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 608px;">
							<?php
							$i = 0;
							foreach ($cards as $a_cards) {

								if ($a_cards != "*") {


									$a_image  = WEB_URL . "/storage/front/img/cards_new/" . $a_cards . ".png";
									if ($i <= ($tot_count - 2)) {
							?>
										<div class="owl-item" style="">
											<div class="item"><img style="width:40px;height:50px;" src="<?php echo $a_image; ?>" />
											</div>
										</div>
							<?php
									}
								}
								$i++;
							}
							?>

						</div>
					</div>

				</div>
				<div class="result-image mt-1"><img src="<?php echo $a_image; ?>" style="width: 26px;"> </div>
			</div>
		</div>
	</div>
	<div class="row row5">
		<div class="col-12 text-center flex-column text-center"
			style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;;gap:8px;">
			<div><span style="color:gray">Card </span>
				<? echo $rdesc_array[0]; ?>
			</div>
			<div><span style="color:gray">Curr. Total </span>
				<? echo $rdesc_array[1]; ?>
			</div>
			<div><span style="color:gray">Total </span>
				<? echo $rdesc_array[2]; ?>
			</div>
			<div><span style="color:gray">Odd/Even </span>
				<? echo $rdesc_array[3]; ?>
			</div>
			<div><span style="color:gray">Red/Black </span>
				<? echo $rdesc_array[4]; ?>
			</div>
		</div>

	</div>
	<script src="/storage/front/js/owl.carousel.min.js" type="text/javascript"></script>
	<script>
		(function($) {
 
			jQuery("#result-a-cards").owlCarousel({

				rtl: false,
				loop: false,
				margin: 1,
				nav: true,
				responsive: {
					0: {
						items: 5
					},

					600: {
						items: 5
					},

					1000: {
						items: 5
					},
				}
			});

		}(jQuery));
	</script>

<?php
} else if ($casino_type == "teen1") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$rdesc_array = explode("#", $desc_remakrs);
	$cards = json_decode($cards);

	$carda1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$cardb1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
?>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player</h4>
		</div>
		<div class="col-7">
			<div class="result-image"><img src="<?php echo $carda1; ?>"> </div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == "A" || $result_status == "1") {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>


		</div>
	</div>


	<div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Dealer</h4>
		</div>
		<div class="col-7">
			<div class="result-image"><img src="<?php echo $cardb1; ?>"> </div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == "B" || $result_status == "2") {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>


		</div>
	</div> -->

	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player </h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			<?php
			if ($result_status == "A" || $result_status == "1") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		<div class="result-image">
			<img src="<?php echo $carda1; ?>"> 
			</div>
		
		</div>

	</div>
	
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Dealer</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
	
		<div class="result-image">
				<img src="<?php echo $cardb1; ?>"> 
			</div>
				<?php
			if ($result_status == "B" || $result_status == "2") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		</div>

	</div>

	<div class="row row5 oepn-teen-result">
		<div class="col-12 text-center flex-column text-center"
			style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;;gap:8px;">
			<div><span style="color:gray">Winner </span>
				<? echo $rdesc_array[0]; ?>
			</div>
			<div><span style="color:gray">7 Up - 7 Down </span>
				<? echo $rdesc_array[1]; ?>
			</div>
		</div>

	</div>

<?php
} else if ($casino_type == "mogambo") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$rdesc_array = explode("#", $desc_remakrs);
	$cards = json_decode($cards);

	$carda1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$cardb2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	$cardb3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
?>

	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Daga / Teja </h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
			<img src="<?php echo $carda1; ?>"> 
			<img src="<?php echo $carda2; ?>"> 
			</div>
		<?php
			if ($result_status == "B" || $result_status == "2") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		</div>

	</div>
	
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Mogambo</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
	
		<?php
			if ($result_status == "A" || $result_status == "1") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		<div class="result-image">
				<img src="<?php echo $cardb3; ?>"> 
			</div>
				
		</div>

	</div>

	<div class="row row5 oepn-teen-result">
		<div class="col-12 text-center flex-column text-center"
			style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;;gap:8px;">
			<div><span style="color:gray">Winner </span>
				<? echo $rdesc_array[0]; ?>
			</div>
			<div><span style="color:gray">Total </span>
				<? echo $rdesc_array[1]; ?>
			</div>
		</div>

	</div>

<?php
} else if ($casino_type == "trap") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$rdesc_array = explode("#", $desc_remakrs);
	$cards = json_decode($cards);

	$player_a = "";
	$player_a_rank = 0;
	$player_b = "";
	$player_b_rank = 0;
	foreach ($cards as $key => $card) {
		if ($card != "1") {
			if ($key % 2 == 0) {
				$player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
				$card_1 = $cards_result->{$card};
				$player_a_rank += $card_1['rank'];
			} else {
				$player_b .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
				$card_1 = $cards_result->{$card};
				$player_b_rank += $card_1['rank'];
			}
		}
	}
	/* $carda1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$carda2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
	$carda3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[4] . ".png";

	$cardb1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	$cardb2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";
	$cardb3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[5] . ".png"; */
?>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player A</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<? echo $player_a; ?>
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == "A" || $result_status == "1") {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>


		</div>
	</div> -->

	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player A - (<? echo $player_a_rank?>) </h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
		<?php
			if ($result_status == "A" || $result_status == "1") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		<div class="result-image">
				<? echo $player_a; ?>
			</div>
				
		</div>

	</div>


	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player B</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<? echo $player_b; ?>
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == "B" || $result_status == "2") {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>


		</div>
	</div> -->

	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player B - (<? echo $player_b_rank?>)</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
	
		<div class="result-image">
				<? echo $player_b; ?>
			</div>
				<?php
			if ($result_status == "B" || $result_status == "2") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		</div>

	</div>

	<div class="row row5 oepn-teen-result">
		<div class="col-12 text-center flex-column text-center"
			style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;;gap:8px;">
			<div><span style="color:gray">Main: </span>
				<? echo $rdesc_array[0]; ?>
			</div>
			<div><span style="color:gray">Seven: </span>
				<? echo $rdesc_array[1]; ?>
			</div>
			<div><span style="color:gray">Picture Card: </span>
				<? echo $rdesc_array[2]; ?>
			</div>
		</div>

	</div>

<?php
} else if ($casino_type == "patti2" || $casino_type == "teen20c" || $casino_type == "teen20") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$rdesc_array = explode("#", $desc_remakrs);
	$cards = json_decode($cards);

	$joker = "";
	$player_a = "";
	$player_b = "";
	foreach ($cards as $key => $card) {
		if ($card != "1") {
			if ($key % 2 == 0) {
				$player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
			} else {
				$player_b .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
			}
		}
	}
	/* $carda1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$carda2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
	$carda3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[4] . ".png";

	$cardb1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	$cardb2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";
	$cardb3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[5] . ".png"; */
?>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player A</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<? echo $player_a; ?>
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == "A" || $result_status == "1") {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>


		</div>
	</div> -->


	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player B</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<? echo $player_b; ?>
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == "B" || $result_status == "2") {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>


		</div>
	</div> -->

	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player A</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			<?php
			if ($result_status == "A" || $result_status == "1") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		<div class="result-image">
				<? echo $player_a; ?>
			</div>
		
		</div>

	</div>
	
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player B</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
	
		<div class="result-image">
				<? echo $player_b; ?>
			</div>
				<?php
			if ($result_status == "B" || $result_status == "2") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		</div>

	</div>

	<div class="row row5 oepn-teen-result">
		<div class="col-12 text-center flex-column text-center"
			style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;;gap:8px;">
			<? if ($casino_type == "teen20c" || $casino_type == "teen20") {
			?>
				<div><span style="color:gray">Winner: </span>
					<? echo $rdesc_array[0]; ?>
				</div>
				<div><span style="color:gray">3 Baccarat: </span>
					<? echo $rdesc_array[1]; ?>
				</div>
				<div><span style="color:gray">Total: </span>
					<? echo $rdesc_array[2]; ?>
				</div>
				<div><span style="color:gray">Pair Plus: </span>
					<? echo $rdesc_array[3]; ?>
				</div>
				<div><span style="color:gray">Red Black: </span>
					<? echo $rdesc_array[4]; ?>
				</div>
			<?
			} else { ?>
				<div><span style="color:gray">Winner: </span>
					<? echo $rdesc_array[0]; ?>
				</div>
				<div><span style="color:gray">Mini Baccarat: </span>
					<? echo $rdesc_array[1]; ?>
				</div>
				<div><span style="color:gray">Total: </span>
					<? echo $rdesc_array[2]; ?>
				</div>
				<div><span style="color:gray">Color Plus: </span>
					<? echo $rdesc_array[3]; ?>
				</div>
			<? } ?>
		</div>

	</div>

<?php
} else if ($casino_type == "teenjoker" || $casino_type == "joker20" ) {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$rdesc_array = explode("#", $desc_remakrs);
	$cards = json_decode($cards);

	$joker = "";
	$player_a = "";
	$player_b = "";
	foreach ($cards as $key => $card) {
		
			if ($card != "1") {
				if ($key == "0") {
					$joker = '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
				} else {
					if ($key % 2 == 0) {
						$player_b .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
					} else {
						$player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
					}
				}
			}
		
	}
	/* $carda1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$carda2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
	$carda3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[4] . ".png";

	$cardb1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	$cardb2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";
	$cardb3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[5] . ".png"; */
?>
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Joker</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			<div class="result-image">
				<? echo $joker; ?>
			</div>
		</div>

	</div>
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player A</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			<?php
			if (($result_status == "A" || $result_status == "1")) {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		<div class="result-image">
				<? echo $player_a; ?>
			</div>
		
		</div>

	</div>
	
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player B</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
		<?php
			if (($result_status == "B" || $result_status == "2")) {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		<div class="result-image">
				<? echo $player_b; ?>
			</div>
			
		</div>

	</div>

<?

?>
	<div class="row row5 oepn-teen-result">
		<div class="col-12 text-center flex-column text-center"
			style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;">

			<div><span style="color:gray">Winner: </span>
				<? echo $rdesc_array[0]; ?>
			</div>
			<div><span style="color:gray">Odd/Even: </span>
				<? echo $rdesc_array[1]; ?>
			</div>
			<div><span style="color:gray">Color: </span>
				<? echo $rdesc_array[2]; ?>
			</div>
			<div><span style="color:gray">Suit: </span>
				<? echo $rdesc_array[3]; ?>
			</div>

		</div>

	</div>


<?php
}elseif($casino_type == "joker120" || $casino_type == "joker1"){ 


	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$rdesc_array = explode("#", $desc_remakrs);
	$cards = json_decode($cards);

	$joker_vcardd="14";
	$get_account_data = $conn->query("select * from bet_teen_details where event_id=$event_id and user_id=$user_id ");
	// echo "select * from bet_teen_details where event_id=$event_id and user_id=$user_id and bet_status='1' ";
	if ($get_account_data->num_rows > 0) {
		$fetch_bet_teen_details = mysqli_fetch_assoc($get_account_data);
		$joker_vcardd=$fetch_bet_teen_details['joker_card'];
	}

	$joker = "";
	$player_a = "";
	$player_b = "";
	foreach ($cards as $key => $card) {
		if($casino_type == "joker120" || $casino_type == "joker1"){
			$joker = '<img src="' . WEB_URL . '/storage/front/img/cards_new/'.$joker_vcardd.'.png"> ';
			if ($card != "1") {
				
					if ($key % 2 == 0) {
						$player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
					} else {
						$player_b .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
					}
				
			}
		}else{
			if ($card != "1") {
				if ($key == "0") {
					$joker = '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
				} else {
					if ($key % 2 == 0) {
						$player_b .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
					} else {
						$player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
					}
				}
			}
		}
	}
	
?>
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Joker</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			<div class="result-image">
				<? echo $joker; ?>
			</div>
		</div>

	</div>
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player A</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
				<? echo $player_a; ?>
			</div>
		
		</div>

	</div>
	
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player B</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
		
		<div class="result-image">
				<? echo $player_b; ?>
			</div>
			
		</div>

	</div>

<?php }else if ($casino_type == "teensin") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$rdesc_array = explode("#", $desc_remakrs);
	$cards = json_decode($cards);

	$player_a = "";
	$player_b = "";
	foreach ($cards as $key => $card) {
		if ($card != "1") {
			if ($key % 2 == 0) {
				$player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
			} else {
				$player_b .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
			}
		}
	}
	/* $carda1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$carda2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
	$carda3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[4] . ".png";

	$cardb1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	$cardb2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";
	$cardb3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[5] . ".png"; */
?>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player A</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<? echo $player_a; ?>
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == "A" || $result_status == "1") {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>


		</div>
	</div> -->


	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player B</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<? echo $player_b; ?>
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == "B" || $result_status == "2") {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>


		</div>
	</div> -->

	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player A</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			<?php
			if ($result_status == "A" || $result_status == "1") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		<div class="result-image">
			<? echo $player_a; ?>
			</div>
		
		</div>

	</div>
	
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player B</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
	
		<div class="result-image">
				<? echo $player_b; ?>
			</div>
				<?php
			if ($result_status == "B" || $result_status == "2") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		</div>

	</div>

	<div class="row row5 oepn-teen-result">
		<div class="col-12 text-center flex-column text-center"
			style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;;gap:8px;">
			<div><span style="color:gray">Winner: </span>
				<? echo $rdesc_array[0]; ?>
			</div>
			<div><span style="color:gray">High Card: </span>
				<? echo $rdesc_array[1]; ?>
			</div>
			<div><span style="color:gray">Pair: </span>
				<? echo $rdesc_array[2]; ?>
			</div>
			<div><span style="color:gray">Color Plus: </span>
				<? echo $rdesc_array[3]; ?>
			</div>
			<div><span style="color:gray">Lucky 9: </span>
				<? echo $rdesc_array[4]; ?>
			</div>
		</div>

	</div>

<?php
} else if ($casino_type == "teen20b") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$rdesc_array = explode("#", $desc_remakrs);
	$cards = json_decode($cards);

	$player_a = "";
	$player_b = "";
	foreach ($cards as $key => $card) {
		if ($card != "1") {
			if ($key % 2 == 0) {
				$player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
			} else {
				$player_b .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
			}
		}
	}
	/* $carda1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$carda2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
	$carda3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[4] . ".png";

	$cardb1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	$cardb2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";
	$cardb3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[5] . ".png"; */
?>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player A</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<? echo $player_a; ?>
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == "A" || $result_status == "1") {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>


		</div>
	</div>


	<div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player B</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<? echo $player_b; ?>
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == "B" || $result_status == "2") {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>


		</div>
	</div> -->

	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player A</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			<?php
			if ($result_status == "A" || $result_status == "1") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		<div class="result-image">
			<? echo $player_a; ?>
			</div>
		
		</div>

	</div>
	
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player B</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
	
		<div class="result-image">
				<? echo $player_b; ?>
			</div>
				<?php
			if ($result_status == "B" || $result_status == "2") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		</div>

	</div>

	<div class="row row5 oepn-teen-result">
		<div class="col-12 text-center flex-column text-center"
			style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;;gap:8px;">
			<div><span style="color:gray">Winner: </span>
				<? echo $rdesc_array[0]; ?>
			</div>
			<div><span style="color:gray">3 Baccarat: </span>
				<? echo $rdesc_array[1]; ?>
			</div>
			<div><span style="color:gray">Total: </span>
				<? echo $rdesc_array[2]; ?>
			</div>
			<div><span style="color:gray">Pair Plus: </span>
				<? echo $rdesc_array[3]; ?>
			</div>
			<div><span style="color:gray">Red Black: </span>
				<? echo $rdesc_array[4]; ?>
			</div>
		</div>

	</div>

<?php
} else if ($casino_type == "teenmuf") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$rdesc_array = explode("#", $desc_remakrs);
	$cards = json_decode($cards);

	$player_a = "";
	$player_b = "";
	foreach ($cards as $key => $card) {
		if ($card != "1") {
			if ($key % 2 == 0) {
				$player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
			} else {
				$player_b .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
			}
		}
	}
	/* $carda1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$carda2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
	$carda3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[4] . ".png";

	$cardb1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	$cardb2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";
	$cardb3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[5] . ".png"; */
?>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player A</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<? echo $player_a; ?>
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == "A" || $result_status == "1") {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>


		</div>
	</div>


	<div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player B</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<? echo $player_b; ?>
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == "B" || $result_status == "2") {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>


		</div>
	</div> -->

	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player A</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			<?php
			if ($result_status == "A" || $result_status == "1") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		<div class="result-image">
			<? echo $player_a; ?>
			</div>
		
		</div>

	</div>
	
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player B</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
	
		<div class="result-image">
				<? echo $player_b; ?>
			</div>
				<?php
			if ($result_status == "B" || $result_status == "2") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		</div>

	</div>

	<div class="row row5 oepn-teen-result">
		<div class="col-12 text-center flex-column text-center"
			style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;;gap:8px;">
			<div><span style="color:gray">Winner: </span>
				<? echo $rdesc_array[0]; ?>
			</div>
			<div><span style="color:gray">Top 9: </span>
				<? echo $rdesc_array[1]; ?>
			</div>
			<div><span style="color:gray">M Baccarat: </span>
				<? echo $rdesc_array[2]; ?>
			</div>
		</div>

	</div>

<?php
} else if ($casino_type == "race17") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$rdesc_array = explode("#", $desc_remakrs);
	$cards = json_decode($cards);

	$player_a = "";
	$player_b = "";
	foreach ($cards as $key => $card) {
		if ($card != "1") {
			$player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
		}
	}
	/* $carda1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$carda2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
	$carda3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[4] . ".png";

	$cardb1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	$cardb2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";
	$cardb3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[5] . ".png"; */
?>

	<div class="row d-flex justify-content-center oepn-teen-result">

		<div >
			<div class="result-image">
				<? echo $player_a; ?>
			</div>
		</div>

	</div>

	<div class="row row5 oepn-teen-result">
		<div class="col-12 text-center flex-column text-center"
			style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;;gap:8px;">
			<div><span style="color:gray">Race to 17 </span>
				<? echo $rdesc_array[0]; ?>
			</div>
			<div><span style="color:gray"> Big Card </span>
				<? echo $rdesc_array[1]; ?>
			</div>
			<div><span style="color:gray">Zero Card </span>
				<? echo $rdesc_array[2]; ?>
			</div>
			<div><span style="color:gray">One Zero Card </span>
				<? echo $rdesc_array[3]; ?>
			</div>
		</div>

	</div>

<?php
} else if ($casino_type == "notenum") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$rdesc_array = explode("#", $desc_remakrs);
	$cards = json_decode($cards);

	$player_a = "";
	$player_b = "";
	foreach ($cards as $key => $card) {
		if ($card != "1") {
			$player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
		}
	}
	/* $carda1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$carda2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
	$carda3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[4] . ".png";

	$cardb1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	$cardb2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";
	$cardb3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[5] . ".png"; */
?>
<style>
	.notenum{
	display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    margin-top: 5px;
	}
</style>

	<div class="row row5 oepn-teen-result">

		<div class="col-12">
			<div class="result-image notenum">
				<? echo $player_a; ?>
			</div>
		</div>

	</div>

	<div class="row row5 oepn-teen-result">
		<div class="col-12 text-center flex-column text-center"
			style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;;gap:8px;">
			<div><span style="color:gray">Odd/Even </span>
				<? echo $rdesc_array[0]; ?>
			</div>
			<div><span style="color:gray">Red/Black
					 </span>
				<? echo $rdesc_array[1]; ?>
			</div>
			<div><span style="color:gray">Low/High
					 </span>
				<? echo $rdesc_array[2]; ?>
			</div>
			<div><span style="color:gray">Cards
					 </span>
				<? echo $rdesc_array[3]; ?>
			</div>
			<div><span style="color:gray">Baccarat
					 </span>
				<? echo $rdesc_array[4]; ?>
			</div>
		</div>

	</div>

<?php
} else if ($casino_type == "kbc") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$rdesc_array = explode("#", $desc_remakrs);
	$cards = json_decode($cards);

	$player_a = "";
	$player_b = "";
	foreach ($cards as $key => $card) {
		if ($card != "1") {
			$player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
		}
	}
	/* $carda1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$carda2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
	$carda3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[4] . ".png";

	$cardb1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	$cardb2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";
	$cardb3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[5] . ".png"; */
?>

<style>
	.kbc{
	display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    margin-top: 5px;
	}
</style>

	<div class="row row5 oepn-teen-result">

		<div class="col-12">
			<div class="result-image kbc">
				<? echo $player_a; ?>
			</div>
		</div>

	</div>

	<div class="row row5 oepn-teen-result">
		<div class="col-12 text-center flex-column text-center"
			style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;;gap:8px;">
			<div><span style="color:gray">[Q1] Red-Black </span>
				<b><? echo $rdesc_array[0]; ?></b>
			</div>
			<div><span style="color:gray">[Q2] Odd-Even
					 </span>
				<b><? echo $rdesc_array[1]; ?></b>
			</div>
			<div><span style="color:gray">[Q3] 7 Up-7 Down
					 </span>
				<b><? echo $rdesc_array[2]; ?></b>
			</div>
			<div><span style="color:gray">[Q4] 3 Card Judgement
					 </span>
				<b><? echo $rdesc_array[3]; ?></b>
			</div>
			<div><span style="color:gray">[Q5] Suits
					 </span>
				<b><? echo $rdesc_array[4]; ?></b>
			</div>
		</div>

	</div>

<?php
} else if ($casino_type == "trio") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$rdesc_array = explode("#", $desc_remakrs);
	$cards = json_decode($cards);

	$player_a = "";
	$player_b = "";
	foreach ($cards as $key => $card) {
		if ($card != "1") {
			$player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
		}
	}
	/* $carda1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$carda2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
	$carda3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[4] . ".png";

	$cardb1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	$cardb2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";
	$cardb3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[5] . ".png"; */
?>
<style>
	.trio{
	display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    margin-top: 5px;
	}
</style>
	<div class="row row5 oepn-teen-result">

		<div class="col-12">
			<div class="result-image trio">
				<? echo $player_a; ?>
			</div>
		</div>

	</div>

	<div class="row row5 oepn-teen-result">
		<div class="col-12 text-center flex-column text-center"
			style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;;gap:8px;">
			<div><span style="color:gray">Session (21)  </span>
				<? echo $rdesc_array[0]; ?>
			</div>
			<div><span style="color:gray">1 2 4 / J Q K
					 </span>
				<? echo $rdesc_array[1]; ?>
			</div>
			<div><span style="color:gray">Red/Black
					 </span>
				<? echo $rdesc_array[2]; ?>
			</div>
			<div><span style="color:gray">Odd/Even
					 </span>
				<? echo $rdesc_array[3]; ?>
			</div>
			<div><span style="color:gray">Pattern
					 </span>
				<? echo $rdesc_array[4]; ?>
			</div>
		</div>

	</div>

<?php
} else if ($casino_type == "meter") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='c$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$cards = json_decode($cards);
	$low_cards = array();
	$high_cards = array();
	$result_cards = array();
	$i = 0;
	while ($cards[$i]) {
		if ($cards[$i] == '10SS' || $cards[$i] == '10ss' || $cards[$i] == '9ss' || $cards[$i] == '9SS') {
			$result_cards[] = $cards[$i];
		} else {
			$a = $cards[$i];
			$card_1 = $cards_result->$a;
			$card_1_rank = $card_1['rank'];

			if ($card_1_rank < 10) {
				$low_cards[] = $cards[$i];
			} else {
				$high_cards[] = $cards[$i];
			}
		}
		$i++;
	}
?>
	<div data-v-4c3807ce="" class="row row5 align-items-center cmeter">
		<div data-v-4c3807ce="" class="col-10">
			<div data-v-4c3807ce="" class="row align-items-center">
				<div data-v-4c3807ce="" class="col-2">
					<h6 data-v-4c3807ce="">Low Cards</h6>
				</div>
				<div data-v-4c3807ce="" class="col-10">
					<div data-v-4c3807ce="" class="result-image">
						<?php
						$j = 0;
						while ($low_cards[$j]) {
							$carda1  = WEB_URL . "/storage/front/img/cards_new/" . $low_cards[$j] . ".png";
						?>
							<img src="<?php echo $carda1; ?>" class="mr-2">
						<?php
							$j++;
						}
						?>
					</div>
				</div>
			</div>
			<div data-v-4c3807ce="" class="row mt-3 align-items-center">
				<div data-v-4c3807ce="" class="col-2">
					<h6 data-v-4c3807ce="">High Cards</h6>
				</div>
				<div data-v-4c3807ce="" class="col-10">
					<div data-v-4c3807ce="" class="result-image">
						<?php
						$j = 0;
						while ($high_cards[$j]) {
							$carda1  = WEB_URL . "/storage/front/img/cards_new/" . $high_cards[$j] . ".png";
						?>
							<img src="<?php echo $carda1; ?>" class="mr-2">
						<?php
							$j++;
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<div data-v-4c3807ce="" class="col-2 align-items-center text-right">
			<div data-v-4c3807ce="" class="result-image">
				<?php
				$j = 0;
				while ($result_cards[$j]) {
					$carda1  = WEB_URL . "/storage/front/img/cards_new/" . $result_cards[$j] . ".png";
				?>
					<img src="<?php echo $carda1; ?>" class="mr-2">
				<?php
					$j++;
				}
				?>
			</div>
		</div>
	</div>
<?php
} else if ($casino_type == "teen9") {


	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$cards = json_decode($cards);


	$carda1  = WEB_URL . "/storage/front/img/cards/" . $cards[0] . ".png";
	$carda2  = WEB_URL . "/storage/front/img/cards/" . $cards[3] . ".png";
	$carda3  = WEB_URL . "/storage/front/img/cards/" . $cards[6] . ".png";

	$cardb1  = WEB_URL . "/storage/front/img/cards/" . $cards[1] . ".png";
	$cardb2  = WEB_URL . "/storage/front/img/cards/" . $cards[4] . ".png";
	$cardb3  = WEB_URL . "/storage/front/img/cards/" . $cards[7] . ".png";

	$cardc1  = WEB_URL . "/storage/front/img/cards/" . $cards[2] . ".png";
	$cardc2  = WEB_URL . "/storage/front/img/cards/" . $cards[5] . ".png";
	$cardc3  = WEB_URL . "/storage/front/img/cards/" . $cards[8] . ".png";


?>
	
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Tiger</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $carda1; ?>"> <img src="<?php echo $carda2; ?>"> <img
					src="<?php echo $carda3; ?>">
			</div>
			<?php
			if ($result_status == "T" ) {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		
		</div>

	</div>

	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Lion</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $cardb1; ?>"> <img src="<?php echo $cardb2; ?>"> <img
					src="<?php echo $cardb3; ?>">
			</div>
			<?php
			if ($result_status == "L") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		
		</div>

	</div>

<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Dragon</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $cardc1; ?>"> <img src="<?php echo $cardc2; ?>"> <img
					src="<?php echo $cardc3; ?>">
			</div>
			<?php
			if ($result_status == "D") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		
		</div>

	</div>

<?php

} else if ($casino_type == "war") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$desc_remakrs = explode("#",$desc_remakrs);
	$cards = json_decode($cards);

	$card1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$card2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	$card3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";

	$card4  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";
	$card5  = WEB_URL . "/storage/front/img/cards_new/" . $cards[4] . ".png";
	$card6  = WEB_URL . "/storage/front/img/cards_new/" . $cards[5] . ".png";

	$card_delear  = WEB_URL . "/storage/front/img/cards_new/" . $cards[6] . ".png";


	$result_status = explode(",", $result_status);


?>
	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Dealer</h4>
		</div>
		<div class="col-7">
			<div class="result-image"><img src="<?php echo $card_delear; ?>" /></div>
		</div>
	</div> -->
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Dealer</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $card_delear; ?>">
			</div>
		</div>

	</div>
	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 1</h4>
		</div>
		<div class="col-7">
			<div class="result-image"><img src="<?php echo $card1; ?>" /></div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if (in_array(1, $result_status)) {
			?>

				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>

			<?php
			}
			?>
		</div>
	</div> -->

<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">1</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $card1; ?>">
			</div>
			<?php
			if (in_array(1, $result_status)) {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		
		</div>

	</div>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 2</h4>
		</div>
		<div class="col-7">
			<div class="result-image"><img src="<?php echo $card2; ?>" /></div>
		</div>
		<div class="col-2 winner-box">

			<?php
			if (in_array(2, $result_status)) {
			?>

				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>

			<?php
			}
			?>
		</div>
	</div> -->
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">2</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $card2; ?>">
			</div>
			<?php
			if (in_array(2, $result_status)) {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		
		</div>

	</div>
	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 3</h4>
		</div>
		<div class="col-7">
			<div class="result-image"><img src="<?php echo $card3; ?>" /></div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if (in_array(3, $result_status)) {
			?>

				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>

			<?php
			}
			?>
		</div>
	</div> -->
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">3</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $card3; ?>">
			</div>
			<?php
			if (in_array(3, $result_status)) {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		
		</div>

	</div>
	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 4</h4>
		</div>
		<div class="col-7">
			<div class="result-image"><img src="<?php echo $card4; ?>" /></div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if (in_array(4, $result_status)) {
			?>

				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>

			<?php
			}
			?>
		</div>
	</div> -->

<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">4</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $card4; ?>">
			</div>
			<?php
			if (in_array(4, $result_status)) {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		
		</div>

	</div>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 5</h4>
		</div>
		<div class="col-7">
			<div class="result-image"><img src="<?php echo $card5; ?>" /></div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if (in_array(5, $result_status)) {
			?>

				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>

			<?php
			}
			?>
		</div>
	</div> -->
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">5</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $card5; ?>">
			</div>
			<?php
			if (in_array(5, $result_status)) {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		
		</div>

	</div>
	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 6</h4>
		</div>
		<div class="col-7">
			<div class="result-image"><img src="<?php echo $card6; ?>" /></div>
		</div>
		<div class="col-2 winner-box"><?php
										if (in_array(6, $result_status)) {
										?>

				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>

			<?php
										}
			?>
		</div>
	</div> -->
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">6</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $card6; ?>">
			</div>
			<?php
			if (in_array(6, $result_status)) {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		
		</div>

	

	<div class="row row5 oepn-teen-result">
		<div class="col-12 text-center flex-column text-center"
			style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;gap:2px;">
			<div>
				<span style="color:gray">Winner </span>
				<span><? echo $desc_remakrs[0]; ?></span>
			</div>
			<div><span style="color:gray">Color </span>
				<span><? echo $desc_remakrs[1]; ?></span>
			</div>
			<div><span style="color:gray">Odd/Even </span>
				<span><? echo $desc_remakrs[2]; ?></span>
			</div>
			<div><span style="color:gray">Suit </span>
				<span><? echo $desc_remakrs[3]; ?></span>
			</div>
			

		</div>

	</div>
</div>

<style>
	#cards_data h4.text-center {
    font-size: 16px !important;
}
</style>

<?php
} else if ($casino_type == "teen8") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$desc_remakrs = explode("#", $desc_remakrs);
	$cards = json_decode($cards);

	$card_1_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$card_1_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[9] . ".png";
	$card_1_3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[18] . ".png";

	$card_2_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	$card_2_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[10] . ".png";
	$card_2_3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[19] . ".png";

	$card_3_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
	$card_3_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[11] . ".png";
	$card_3_3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[20] . ".png";

	$card_4_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";
	$card_4_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[12] . ".png";
	$card_4_3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[21] . ".png";

	$card_5_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[4] . ".png";
	$card_5_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[13] . ".png";
	$card_5_3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[22] . ".png";

	$card_6_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[5] . ".png";
	$card_6_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[14] . ".png";
	$card_6_3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[23] . ".png";


	$card_7_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[6] . ".png";
	$card_7_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[15] . ".png";
	$card_7_3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[24] . ".png";

	$card_8_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[7] . ".png";
	$card_8_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[16] . ".png";
	$card_8_3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[25] . ".png";

	$card_dealer_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[8] . ".png";
	$card_dealer_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[17] . ".png";
	$card_dealer_3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[26] . ".png";




	$result_status = explode(",", $result_status);
?>


	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 1</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<img src="<?php echo $card_1_1; ?>" />
				<img src="<?php echo $card_1_2; ?>" />
				<img src="<?php echo $card_1_3; ?>" />
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if (in_array(1, $result_status)) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center"> 1</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $card_1_1; ?>"> <img src="<?php echo $card_1_2; ?>"> <img
					src="<?php echo $card_1_3; ?>">
			</div>
			<?php
			if (in_array(1, $result_status)) {
			?>
			<div class="winner-label"> <i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>	
		</div>

	</div>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Dealer</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<img src="<?php echo $card_dealer_1; ?>" />
				<img src="<?php echo $card_dealer_2; ?>" />
				<img src="<?php echo $card_dealer_3; ?>" />
			</div>
		</div>
	</div> -->

	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Dealer</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $card_dealer_1; ?>"> <img src="<?php echo $card_dealer_2; ?>"> <img
					src="<?php echo $card_dealer_3; ?>">
			</div>
		</div>

	</div>

	
	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 8</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<img src="<?php echo $card_8_1; ?>" />
				<img src="<?php echo $card_8_2; ?>" />
				<img src="<?php echo $card_8_3; ?>" />
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if (in_array(8, $result_status)) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center"> 8</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $card_8_1; ?>"> <img src="<?php echo $card_8_2; ?>"> <img
					src="<?php echo $card_8_3; ?>">
			</div>
			<?php
			if (in_array(8, $result_status)) {
			?>
			<div class="winner-label"> <i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>	
		</div>

	</div>


	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 2</h4>
		</div>
		<div class="col-7">
			<div class="result-image">

				<img src="<?php echo $card_2_1; ?>" />
				<img src="<?php echo $card_2_2; ?>" />
				<img src="<?php echo $card_2_3; ?>" />

			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if (in_array(2, $result_status)) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center"> 2</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $card_2_1; ?>"> <img src="<?php echo $card_2_2; ?>"> <img
					src="<?php echo $card_2_3; ?>">
			</div>
			<?php
			if (in_array(2, $result_status)) {
			?>
			<div class="winner-label"> <i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>	
		</div>

	</div>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 7</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<img src="<?php echo $card_7_1; ?>" />
				<img src="<?php echo $card_7_2; ?>" />
				<img src="<?php echo $card_7_3; ?>" />
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if (in_array(7, $result_status)) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center"> 7</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $card_7_1; ?>"> <img src="<?php echo $card_7_2; ?>"> <img
					src="<?php echo $card_7_3; ?>">
			</div>
			<?php
			if (in_array(7, $result_status)) {
			?>
			<div class="winner-label"> <i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>	
		</div>

	</div>


	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 3</h4>
		</div>
		<div class="col-7">
			<div class="result-image">

				<img src="<?php echo $card_3_1; ?>" />
				<img src="<?php echo $card_3_2; ?>" />
				<img src="<?php echo $card_3_3; ?>" />

			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if (in_array(3, $result_status)) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center"> 3</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $card_3_1; ?>"> <img src="<?php echo $card_3_2; ?>"> <img
					src="<?php echo $card_3_3; ?>">
			</div>
			<?php
			if (in_array(3, $result_status)) {
			?>
			<div class="winner-label"> <i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>	
		</div>

	</div>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 4</h4>
		</div>
		<div class="col-7">
			<div class="result-image">

				<img src="<?php echo $card_4_1; ?>" />
				<img src="<?php echo $card_4_2; ?>" />
				<img src="<?php echo $card_4_3; ?>" />

			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if (in_array(4, $result_status)) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center"> 4</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $card_4_1; ?>"> <img src="<?php echo $card_4_2; ?>"> <img
					src="<?php echo $card_4_3; ?>">
			</div>
			<?php
			if (in_array(4, $result_status)) {
			?>
			<div class="winner-label"> <i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>	
		</div>

	</div>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 5</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<img src="<?php echo $card_5_1; ?>" />
				<img src="<?php echo $card_5_2; ?>" />
				<img src="<?php echo $card_5_3; ?>" />
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if (in_array(5, $result_status)) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->


<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center"> 5</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $card_5_1; ?>"> <img src="<?php echo $card_5_2; ?>"> <img
					src="<?php echo $card_5_3; ?>">
			</div>
			<?php
			if (in_array(5, $result_status)) {
			?>
			<div class="winner-label"> <i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>	
		</div>

	</div>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 6</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<img src="<?php echo $card_6_1; ?>" />
				<img src="<?php echo $card_6_2; ?>" />
				<img src="<?php echo $card_6_3; ?>" />
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if (in_array(6, $result_status)) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center"> 6</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $card_6_1; ?>"> <img src="<?php echo $card_6_2; ?>"> <img
					src="<?php echo $card_6_3; ?>">
			</div>
			<?php
			if (in_array(6, $result_status)) {
			?>
			<div class="winner-label"> <i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>	
		</div>

	</div>

	<div class="row row5 oepn-teen-result">
		<div class="col-12 text-center flex-column text-center"
			style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;gap:2px;">
			<div>
				<span style="color:gray">Winner </span>
				<span><? echo $desc_remakrs[0]; ?></span>
			</div>
			<div><span style="color:gray">Pair Plus </span>
				<span><? echo $desc_remakrs[1]; ?></span>
			</div>
			<div><span style="color:gray">Total </span>
				<span><? echo str_replace("~", "<br>", $desc_remakrs[2]); ?></span>
			</div>

		</div>

	</div>
<?php
} else if ($casino_type == "poker" or $casino_type == "poker20") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$cards = json_decode($cards);
$desc_remakrs = explode("#", $desc_remakrs);

	$rdesc = str_replace(" ", "", $desc_remakrs);
	$rdesc_array = explode("##", $rdesc);



	$winner = $rdesc_array[0];
	$pair_check = $rdesc_array[1];
	if ($casino_type == "poker") {
		$pair_check = $rdesc_array[2];
	}

	$pair_check_array = explode("|", $pair_check);

	$card_a_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$card_a_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";

	$card_b_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
	$card_b_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";

	$card_dealer_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[4] . ".png";
	$card_dealer_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[5] . ".png";
	$card_dealer_3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[6] . ".png";
	$card_dealer_4  = WEB_URL . "/storage/front/img/cards_new/" . $cards[7] . ".png";
	$card_dealer_5  = WEB_URL . "/storage/front/img/cards_new/" . $cards[8] . ".png";


?>
	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player A</h4>
		</div>
		<div class="col-7">
			<div class="result-image">

				<img src="<?php echo $card_a_1; ?>" />
				<img src="<?php echo $card_a_2; ?>" />

			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == 1  or $result_status == "A") {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

<div class="row d-flex flex-column align-items-center">
		<div class="col-121">
			<h4 class="m-0 text-center"> Player A</h4>
		</div>
		<div class="col-121 d-flex gap-2 mt-1" style="align-items: center;">
			
			<?php
			if ($result_status == 1  or $result_status == "A") {
			?>
			<div class="col-2 winner-box">
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
				</div>
			<?php
			}
			?>
		
		<div class="result-image">
				<img src="<?php echo $card_a_1; ?>"> 
				<img src="<?php echo $card_a_2; ?>"> 
				
			</div>
			
		</div>

	</div>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player B</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<img src="<?php echo $card_b_1; ?>" />
				<img src="<?php echo $card_b_2; ?>" />
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == 2  or $result_status == "B") {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

<div class="row d-flex flex-column align-items-center">
		<div class="col-121">
			<h4 class="m-0 text-center"> Player B</h4>
		</div>
		<div class="col-121 d-flex gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $card_b_1; ?>"> 
				<img src="<?php echo $card_b_2; ?>"> 
				
			</div>
			
			<?php
			if ($result_status == 2  or $result_status == "B") {
			?>
			<div class="col-2 winner-box">
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
				</div>
			<?php
			}
			?>
		
		</div>

	</div>

<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Board</h4>
		</div>
		<div class="col-9">
			<div class="result-image">
				<img src="<?php echo $card_dealer_1; ?>" />
				<img src="<?php echo $card_dealer_2; ?>" />
				<img src="<?php echo $card_dealer_3; ?>" />
				<img src="<?php echo $card_dealer_4; ?>" />
				<img src="<?php echo $card_dealer_5; ?>" />
			</div>
		</div>
	</div> -->


<div class="row d-flex flex-column align-items-center">
		<div class="col-121">
			<h4 class="m-0 text-center"> Board</h4>
		</div>
		<div class="col-121 gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $card_dealer_1; ?>"> 
				<img src="<?php echo $card_dealer_2; ?>"> 
				<img src="<?php echo $card_dealer_3; ?>">
				<img src="<?php echo $card_dealer_4; ?>">
				<img src="<?php echo $card_dealer_5; ?>">
			</div>
		</div>

	</div>

<? if ($casino_type == "poker") { ?>
	<div class="row mt-3">
		<div class="col-12">
			<div class="winner-board d-flex align-items-center flex-column">

				<div class="mb-1">
					<span>Winner</span>
					<?php echo $desc_remakrs[0]; ?>
				</div>
				<div class="mb-1">
					<span>2 Card</span>
					<?php echo $desc_remakrs[1]; ?>
				</div>
				<div class="mb-1">
					<span>7 Card</span>
					<?php echo $desc_remakrs[2]; ?>
				</div>
				
			</div>
		</div>
	</div>
<? } ?>

<? if ($casino_type == "poker20") { ?>
	<div class="row mt-3">
		<div class="col-12">
			<div class="winner-board d-flex align-items-center flex-column">

				<div class="mb-1">
					<span>Winner:</span>
					<?php echo $desc_remakrs[0]; ?>
				</div>
				<div class="mb-1">
					<span>Other:</span>
					<?php echo $desc_remakrs[1]; ?>
				</div>
			</div>
		</div>
	</div>
<? } ?>

<?php
} else if ($casino_type == "poker9" || $casino_type == "poker6") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$desc_remakrs = explode("#", $desc_remakrs);
	$cards = json_decode($cards);

	$player_1_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$player_1_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[6] . ".png";

	$player_2_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	$player_2_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[7] . ".png";

	$player_3_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
	$player_3_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[8] . ".png";

	$player_4_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";
	$player_4_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[9] . ".png";

	$player_5_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[4] . ".png";
	$player_5_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[10] . ".png";

	$player_6_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[5] . ".png";
	$player_6_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[11] . ".png";



	$card_dealer_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[12] . ".png";
	$card_dealer_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[13] . ".png";
	$card_dealer_3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[14] . ".png";
	$card_dealer_4  = WEB_URL . "/storage/front/img/cards_new/" . $cards[15] . ".png";
	$card_dealer_5  = WEB_URL . "/storage/front/img/cards_new/" . $cards[16] . ".png";

?>

<div class="row d-flex flex-column align-items-center">
		<div class="col-121">
			<h4 class="m-0 text-center"> Board</h4>
		</div>
		<div class="col-121  d-flex flex-row mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $card_dealer_1; ?>"> 
				<img src="<?php echo $card_dealer_2; ?>"> 
				<img src="<?php echo $card_dealer_3; ?>">
				<img src="<?php echo $card_dealer_4; ?>">
				<img src="<?php echo $card_dealer_5; ?>">
			</div>
		</div>

	</div>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 1</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<img src="<?php echo $player_1_1; ?>" />
				<img src="<?php echo $player_1_2; ?>" />
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == 1) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

<div class="row d-flex flex-column align-items-center">
		<div class="col-121">
			<h4 class="m-0 text-center"> 1</h4>
		</div>
		<div class="col-121  d-flex flex-row mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $player_1_1; ?>"> 
				<img src="<?php echo $player_1_2; ?>"> 
				
			</div>
			
			<?php
			if ($result_status == 1  or $result_status == "A") {
			?>
			<div class="col-2 winner-box ml-2">
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
				</div>	
			<?php
			}
			?>
		
		</div>
	</div>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 6</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<img src="<?php echo $player_6_1; ?>" />
				<img src="<?php echo $player_6_2; ?>" />
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == 6) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

<div class="row d-flex flex-column align-items-center">
		<div class="col-121">
			<h4 class="m-0 text-center"> 6</h4>
		</div>
		<div class="col-121  d-flex flex-row mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $player_6_1; ?>"> 
				<img src="<?php echo $player_6_2; ?>"> 
				
			</div>
			
			<?php
			if ($result_status == 6  or $result_status == "F") {
			?>
			<div class="col-2 winner-box ml-2">
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
				</div>	
			<?php
			}
			?>
		
		</div>
	</div>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 2</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<img src="<?php echo $player_2_1; ?>" />
				<img src="<?php echo $player_2_2; ?>" />
			</div>
		</div>
		<div class="col-2 winner-box">

			<?php
			if ($result_status == 2) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>

		</div>
	</div> -->

<div class="row d-flex flex-column align-items-center">
		<div class="col-121">
			<h4 class="m-0 text-center"> 2</h4>
		</div>
		<div class="col-121  d-flex flex-row mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $player_2_1; ?>"> 
				<img src="<?php echo $player_2_2; ?>"> 
				
			</div>
			
			<?php
			if ($result_status == 2  or $result_status == "B") {
			?>
			<div class="col-2 winner-box ml-2">
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
				</div>	
			<?php
			}
			?>
		
		</div>
	</div>

	
	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 5</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<img src="<?php echo $player_5_1; ?>" />
				<img src="<?php echo $player_5_2; ?>" />
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == 5) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

<div class="row d-flex flex-column align-items-center">
		<div class="col-121">
			<h4 class="m-0 text-center"> 5</h4>
		</div>
		<div class="col-121  d-flex flex-row mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $player_5_1; ?>"> 
				<img src="<?php echo $player_5_2; ?>"> 
				
			</div>
			
			<?php
			if ($result_status == 5  or $result_status == "E") {
			?>
			<div class="col-2 winner-box ml-2">
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
				</div>	
			<?php
			}
			?>
		
		</div>
	</div>


	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 3</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<img src="<?php echo $player_3_1; ?>" />
				<img src="<?php echo $player_3_2; ?>" />
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == 3) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

<div class="row d-flex flex-column align-items-center">
		<div class="col-121">
			<h4 class="m-0 text-center"> 3</h4>
		</div>
		<div class="col-121  d-flex flex-row mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $player_3_1; ?>"> 
				<img src="<?php echo $player_3_2; ?>"> 
				
			</div>
			
			<?php
			if ($result_status == 3  or $result_status == "C") {
			?>
			<div class="col-2 winner-box ml-2">
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
				</div>	
			<?php
			}
			?>
		
		</div>
	</div>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 4</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<img src="<?php echo $player_4_1; ?>" />
				<img src="<?php echo $player_4_2; ?>" />
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == 4) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

<div class="row d-flex flex-column align-items-center">
		<div class="col-121">
			<h4 class="m-0 text-center"> 4</h4>
		</div>
		<div class="col-121  d-flex flex-row mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $player_4_1; ?>"> 
				<img src="<?php echo $player_4_2; ?>"> 
				
			</div>
			
			<?php
			if ($result_status == 4  or $result_status == "D") {
			?>
			<div class="col-2 winner-box ml-2">
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
				</div>	
			<?php
			}
			?>
		
		</div>
	</div>


	<!-- <div class="row mt-3"> -->
		<div class="col-12" style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;margin-top: 10px;">
			<div class="winner-board" style="min-width: -webkit-fill-available;text-align: center;">
				<div class="mb-1">
					<span>Winner </span>
					<?php echo $desc_remakrs[0]; ?>
				</div>
				<div class="mb-1">
					<span>Pattern </span>
					<?php echo $desc_remakrs[1]; ?>
				</div>
			</div>
		</div>
	<!-- </div> -->

<?php
} else if ($casino_type == "ab20") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$cards_b = $fetch_get_casino_result['b_cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$cards = json_decode($cards);
	$cards_b = json_decode($cards_b);


?>

	<div class="row  abj-result">
		<div class="col-12 text-center">
			<!-- <h4>Andar</h4> -->
			<div class="result-image">
				<div id="result-a-cards" class="ab-rtlslider owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
					<div class="owl-stage-outer">
						<div class="owl-stage"
							style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 608px;">
							<?php
							$i = 0;
							foreach ($cards as $a_cards) {

								if ($a_cards != "*") {


									$a_image  = WEB_URL . "/storage/front/img/cards_new/" . $a_cards . ".png";
							?>
									<div class="owl-item" style="">
										<div class="item"><img style="width:40px;height:50px;" src="<?php echo $a_image; ?>" />
										</div>
									</div>
							<?php
								}
								$i++;
							}
							?>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="row  abj-result mt-2">
		<div class="col-12 text-center">
			<!-- <h4>Bahar</h4> -->
			<div class="result-image">
				<div id="result-b-cards" class="ab-rtlslider owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
					<div class="owl-stage-outer">
						<div class="owl-stage"
							style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 654px;">
							<?php
							$i = 0;
							foreach ($cards_b as $b_cards) {
								if ($b_cards != "*") {


									$b_image  = WEB_URL . "/storage/front/img/cards_new/" . $b_cards . ".png";
							?>
									<div class="owl-item" style="width:68px">
										<div class="item"><img style="width:40px;height:50px;" src="<?php echo $b_image; ?>" />
										</div>
									</div>
							<?php
								}
								$i++;
							}
							?>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="row row5 oepn-teen-result">
		<div class="col-12 text-center flex-column text-center"
			style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;;gap:8px;">
			<div><span style="color:gray">Winner: </span>
				<? echo $desc_remakrs; ?>
			</div>

		</div>

	</div>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<script src="/storage/front/js/owl.carousel.min.js" type="text/javascript"></script>
	<script>
		(function($) {

			jQuery("#result-a-cards").owlCarousel({

				rtl: true,
				loop: false,
				margin: 2,
				nav: true,
				responsive: {
					0: {
						items: 5
					},

					600: {
						items: 5
					},

					1000: {
						items: 5
					},
				}
			});
			jQuery("#result-b-cards").owlCarousel({

				rtl: true,
				loop: false,
				margin: 2,
				nav: true,
				responsive: {
					0: {
						items: 5
					},

					600: {
						items: 5
					},

					1000: {
						items: 5
					},
				}
			});


		}(jQuery));
	</script>

<?php
} else if ($casino_type == "abj") {


	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$cards_b = $fetch_get_casino_result['b_cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$cards = json_decode($cards);


	$card_joker_image  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$card_1st_andar_image  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
	$card_1st_bahat_image  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";

	$i = 0;
	$aall = array();
	$ball = array();

	foreach ($cards as $card_image) {
		if ($card_image != 1) {
			if ($i >= 3) {
				if ($i % 2 == 0) {
					$aall[] = WEB_URL . "/storage/front/img/cards_new/" . $card_image . ".png";
				} else {
					$ball[] = WEB_URL . "/storage/front/img/cards_new/" . $card_image . ".png";
				}
			}
		}
		$i++;
	}

	$aall = array_reverse($aall);
	$ball = array_reverse($ball);

?>



	<div class="row row5 abj-result text-center align-items-center">
		<div class="col-1">
			<div class="row row5">
				<div class="col-12">
					<h4 class="mb-0" style="line-height: 50px;"><b>A</b></h4>
				</div>
			</div>
			<div class="row row5">
				<div class="col-12">
					<h4 class="mb-0" style="line-height: 50px;"><b>B</b></h4>
				</div>
			</div>
		</div>
		<div class="col-2"><img src="<?php echo $card_joker_image; ?>" class="card-right maincardscss"></div>
		<div class="col-9">
			<div class="card-inner">
				<div class="row row5">
					<div class="col-2"><img src="<?php echo $card_1st_andar_image; ?>" class="mb-1 maincardscss"></div>
					<div class="col-7 ml-3">
						<div id="result-a-cards" class="ab-rtlslider owl-carousel owl-theme owl-rtl owl-loaded owl-drag"
							style="width: 100%;">
							<div class="owl-stage-outer">
								<div class="owl-stage"
									style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 570px;">

									<?php
									$i = 0;
									foreach ($aall as $andar_card) {
										$active_class = "";
										if ($i == 0) {
											$active_class = "active";
										}
										$i++;
									?>
										<div class="owl-item <?php echo $active_class; ?>">
											<div class="item"><img src="<?php echo $andar_card; ?>"></div>
										</div>
									<?php
									}
									?>
								</div>
							</div>
							<!-- <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><span
										aria-label="Previous">‹</span></button><button type="button" role="presentation"
									class="owl-next"><span aria-label="Next">›</span></button></div>
							<div class="owl-dots disabled"></div> -->
						</div>
					</div>
					<!-- <div class="col-2 winner-box">

						<?php
						if ($result_status == 1) {
						?>
							<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
						<?php
						}
						?>
					</div> -->
				</div>
			</div>
			<div class="card-inner">
				<div class="row row5">
					<div class="col-2"><img src="<?php echo $card_1st_bahat_image; ?>" class="mb-1 maincardscss"></div>
					<div class="col-7 ml-3">
						<div id="result-b-cards" class="ab-rtlslider owl-carousel owl-theme owl-rtl owl-loaded owl-drag"
							style="width: 100%;">
							<div class="owl-stage-outer">
								<div class="owl-stage"
									style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 570px;">


									<?php
									$i = 0;
									foreach ($ball as $bahar_card) {
										$active_class = "";
										if ($i == 0) {
											$active_class = "active";
										}
										$i++;
									?>
										<div class="owl-item <?php echo $active_class; ?>">
											<div class="item"><img src="<?php echo $bahar_card; ?>"></div>
										</div>
									<?php
									}
									?>



								</div>
							</div>
							<!-- <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><span
										aria-label="Previous">‹</span></button><button type="button" role="presentation"
									class="owl-next"><span aria-label="Next">›</span></button></div>
							<div class="owl-dots disabled"></div> -->
						</div>
					</div>
					<!-- <div class="col-2 winner-box">
						<?php
						if ($result_status == 2) {
						?>
							<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
						<?php
						}
						?>
					</div> -->
				</div>
			</div>
		</div>
	</div>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<script src="/storage/front/js/owl.carousel.min.js" type="text/javascript"></script>
	<script>
		(function($) {

			jQuery("#result-a-cards").owlCarousel({

				rtl: true,
				loop: false,
				margin: 1,
				nav: true,
				responsive: {
					0: {
						items: 3
					},

					600: {
						items: 3
					},

					1000: {
						items: 3
					},
				}
			});
			jQuery("#result-b-cards").owlCarousel({

				rtl: true,
				loop: false,
				margin: 2,
				nav: true,
				responsive: {
					0: {
						items: 3
					},

					600: {
						items: 3
					},

					1000: {
						items: 3
					},
				}
			});


		}(jQuery));
	</script>
<?php
} else if ($casino_type == "ab4") {


	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$cards_b = $fetch_get_casino_result['b_cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$cards = json_decode($cards);


	// $card_joker_image  = WEB_URL . "/storage/front/img/cards/" . $cards[0] . ".png";
	// $card_1st_andar_image  = WEB_URL . "/storage/front/img/cards/" . $cards[2] . ".png";
	// $card_1st_bahat_image  = WEB_URL . "/storage/front/img/cards/" . $cards[1] . ".png";

	$i = 0;
	$aall = array();
	 $aall_number = array();
	$ball = array();
	$ball_number = array();

	foreach ($cards as $card_image) {
		if ($card_image != 1) {
			
				if ($i % 2 == 0) {
					$ball[] = WEB_URL . "/storage/front/img/cards_new/" . $card_image . ".png";
					 $ball_number[]=$i;
				} else {
					$aall[] = WEB_URL . "/storage/front/img/cards_new/" . $card_image . ".png";
					 $aall_number[]=$i;
				}
		
		}
		$i++;
	}

	// $aall = array_reverse($aall);
	// $ball = array_reverse($ball);

?>



	<div class="row row5 abj-result text-center align-items-center">
		<!-- <div class="col-1">
			<div class="row row5">
				<div class="col-12">
					<h4 class="mb-0" style="line-height: 50px;"><b>A</b></h4>
				</div>
			</div>
			<div class="row row5">
				<div class="col-12">
					<h4 class="mb-0" style="line-height: 50px;"><b>B</b></h4>
				</div>
			</div>
		</div> -->
		<!-- <div class="col-2"><img src="<?php echo $card_joker_image; ?>" class="card-right maincardscss"></div> -->
		<div class="col-9">
			<div class="card-inner">
				<div class="row row5">
					<!-- <div class="col-2"><img src="<?php echo $card_1st_andar_image; ?>" class="mb-1 maincardscss"></div> -->
					<div class="col-7 ml-3">
						<div id="result-a-cards" class="ab-ltrslider owl-carousel owl-theme owl-ltr owl-loaded owl-drag"
							style="width: 100%;">
							<div class="owl-stage-outer">
								<div class="owl-stage"
									style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 570px;">

									<?php
									$i = 0;
									foreach ($aall as $k=>$andar_card) {
										$active_class = "";
										if ($i == 0) {
											$active_class = "active";
										}
										$i++;
									?>
										<div class="owl-item <?php echo $active_class; ?>">
											 <div><?php echo $ball_number[$k] + 2 ?></div>
											<div class="item"><img src="<?php echo $andar_card; ?>"></div>
										</div>
									<?php
									}
									?>
								</div>
							</div>
							<!-- <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev disabled"><span
										aria-label="Previous">‹</span></button><button type="button" role="presentation"
									class="owl-next disabled"><span aria-label="Next">›</span></button></div>
							<div class="owl-dots disabled"></div> -->
						</div>
					</div>
					<!-- <div class="col-2 winner-box">

						<?php
						if ($result_status == 1) {
						?>
							<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
						<?php
						}
						?>
					</div> -->
				</div>
			<!-- </div>
			<div class="card-inner"> -->
				<div class="row row5">
					<!-- <div class="col-2"><img src="<?php echo $card_1st_bahat_image; ?>" class="mb-1 maincardscss"></div> -->
					<div class="col-7 ml-3">
						<div id="result-b-cards" class="ab-ltrslider owl-carousel owl-theme owl-ltr owl-loaded owl-drag"
							style="width: 100%;">
							<div class="owl-stage-outer">
								<div class="owl-stage"
									style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 570px;">


									<?php
									$i = 0;
									 $j = 1;
									foreach ($ball as $l=>$bahar_card) {
										$active_class = "";
										if ($i == 0) {
											$active_class = "active";
										}
										$i++;
									?>
										<div class="owl-item <?php echo $active_class; ?>">
											<div><?php echo $j ?></div>
											<div class="item"><img src="<?php echo $bahar_card; ?>"></div>
										</div>
									<?php
									  $j=$ball_number[$l] + 3;
									}
									?>



								</div>
							</div>
							<!-- <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><span
										aria-label="Previous">‹</span></button><button type="button" role="presentation"
									class="owl-next"><span aria-label="Next">›</span></button></div>
							<div class="owl-dots disabled"></div> -->
						</div>
					</div>
					<!-- <div class="col-2 winner-box">
						<?php
						if ($result_status == 2) {
						?>
							<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
						<?php
						}
						?>
					</div> -->
				</div>
			</div>
		</div>
	</div>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<script src="/storage/front/js/owl.carousel.min.js" type="text/javascript"></script>
	<script>
		(function($) {

			jQuery("#result-a-cards").owlCarousel({

				rtl: false,
				loop: false,
				margin: 1,
				nav: true,
				dots: false,
				responsive: {
					0: {
						items: 5
					},

					600: {
						items: 5
					},

					1000: {
						items: 5
					},
				}
			});
			jQuery("#result-b-cards").owlCarousel({

				rtl: false,
				loop: false,
				margin: 2,
				nav: true,
				dots: false,
				responsive: {
					0: {
						items: 5
					},

					600: {
						items: 5
					},

					1000: {
						items: 5
					},
				}
			});


		}(jQuery));
	</script>
<?php
}else if ($casino_type == "ab3") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$cards_b = $fetch_get_casino_result['b_cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$cards = json_decode($cards);
	// $cards_b = json_decode($cards_b);


?>

	<div class="row  abj-result">
		<div class="col-12 text-center">
			<!-- <h4>Andar</h4> -->
			<div class="result-image">
				<div id="result-a-cards" class="ab-rtlslider owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
					<div class="owl-stage-outer">
						<div class="owl-stage"
							style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 608px;">
							<?php
							$i = 0;
							foreach ($cards as $a_cards) {

								if ($i % 2 != 0 and $a_cards != "*") {


									$a_image  = WEB_URL . "/storage/front/img/cards/" . $a_cards . ".png";
							?>
									<div class="owl-item" style="width: 74px;">
										<div class="d-flex flex-column align-items-center justify-content-center text-center">
										<div><? echo $i + 1 ?></div>
										<div class="item"><img style="width:40px;height:50px;" src="<?php echo $a_image; ?>" />
										</div>
										</div>
									</div>
							<?php
								}
								$i++;
							}
							?>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="row  abj-result mt-2">
		<div class="col-12 text-center">
			<!-- <h4>Bahar</h4> -->
			<div class="result-image">
				<div id="result-b-cards" class="ab-rtlslider owl-carousel owl-theme owl-rtl owl-loaded owl-drag">
					<div class="owl-stage-outer">
						<div class="owl-stage"
							style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 654px;">
							<?php
							$i = 0;
							foreach ($cards as $a_cards) {
								if ($i % 2 == 0  and $a_cards != "*") {


									$a_cards  = WEB_URL . "/storage/front/img/cards/" . $a_cards . ".png";
							?>
									<div class="owl-item" style="width:68px">
										<div class="d-flex flex-column align-items-center justify-content-center text-center">
										<div><? echo $i + 1 ?></div>
										<div class="item"><img style="width:40px;height:50px;" src="<?php echo $a_cards; ?>" />
										</div>
									</div>
									</div>
							<?php
								}
								$i++;
							}
							?>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<script src="/storage/front/js/owl.carousel.min.js" type="text/javascript"></script>
	<script>
		(function($) {

			jQuery("#result-a-cards").owlCarousel({

				rtl: true,
				loop: false,
				margin: 2,
				nav: true,
				responsive: {
					0: {
						items: 5
					},

					600: {
						items: 5
					},

					1000: {
						items: 5
					},
				}
			});
			jQuery("#result-b-cards").owlCarousel({

				rtl: true,
				loop: false,
				margin: 2,
				nav: true,
				responsive: {
					0: {
						items: 5
					},

					600: {
						items: 5
					},

					1000: {
						items: 5
					},
				}
			});


		}(jQuery));
	</script>

<?php
} else if ($casino_type == "3cardj") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$cards = json_decode($cards);

	$card_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$card_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	$card_3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
?>
	<div class="row">
		<div class="col-12 text-center">
			<div class="result-image">
				<img src="<?php echo $card_1; ?>" />
				<img src="<?php echo $card_2; ?>" />
				<img src="<?php echo $card_3; ?>" />
			</div>
		</div>
	</div>
	<div class="row row5 oepn-teen-result">
		<div class="col-12 text-center flex-column text-center"
			style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;;gap:8px;">
			<div><span style="color:gray">Result: </span>
				<? echo $desc_remakrs; ?>
			</div>

		</div>

	</div>
<?php
} else if ($casino_type == "lottcard") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$cards = json_decode($cards);

	$card_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$card_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	$card_3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
?>
	<div class="row">
		<div class="col-12 text-center">
			<div class="result-image">
				<img src="<?php echo $card_1; ?>" />
				<img src="<?php echo $card_2; ?>" />
				<img src="<?php echo $card_3; ?>" />
			</div>
		</div>
	</div>
	<div class="row row5 oepn-teen-result">
		<div class="col-12 text-center flex-column text-center"
			style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;;gap:8px;">
			<div><span style="color:gray">Result: </span>
				<? echo $desc_remakrs; ?>
			</div>

		</div>

	</div>

<?php
} else if ($casino_type == "card32" or $casino_type == "card32eu") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$desc_remakrs = explode("#",$desc_remakrs);
	$cards = json_decode($cards);

	//player 8
	$player_8[] = $card_0  = WEB_URL . "/storage/front/img/cards_new//" . $cards[0] . ".png";
	$player_8[] = $card_4  = WEB_URL . "/storage/front/img/cards_new//" . $cards[4] . ".png";
	$player_8[] = $card_8  = WEB_URL . "/storage/front/img/cards_new//" . $cards[8] . ".png";
	$player_8[] = $card_12  = WEB_URL . "/storage/front/img/cards_new//" . $cards[12] . ".png";
	$player_8[] = $card_16  = WEB_URL . "/storage/front/img/cards_new//" . $cards[16] . ".png";
	$player_8[] = $card_20  = WEB_URL . "/storage/front/img/cards_new//" . $cards[20] . ".png";
	$player_8[] = $card_24  = WEB_URL . "/storage/front/img/cards_new//" . $cards[24] . ".png";
	$player_8[] = $card_28  = WEB_URL . "/storage/front/img/cards_new//" . $cards[28] . ".png";
	$player_8[] = $card_32  = WEB_URL . "/storage/front/img/cards_new//" . $cards[32] . ".png";

	$player_81[] = $cards[0];
	$player_81[] = $cards[4];
	$player_81[] = $cards[8];
	$player_81[] = $cards[12];
	$player_81[] = $cards[16];
	$player_81[] = $cards[20];
	$player_81[] = $cards[24];
	$player_81[] = $cards[28];
	$player_81[] = $cards[32];

	$player_8_img = "";
	$player_8_rank = 8;
	foreach ($player_8 as $key => $card_8) {
		if ($card_8 != WEB_URL . "/storage/front/img/cards_new//1.png") {
			$card_1 = $cards_result->{$player_81[$key]};
			
			$player_8_rank += $card_1['rank'];
			$player_8_img .= '<img src="' . $card_8 . '" />';
		}
	}


	//player 9
	$player_9[] = $card_1  = WEB_URL . "/storage/front/img/cards_new//" . $cards[1] . ".png";
	$player_9[] = $card_5  = WEB_URL . "/storage/front/img/cards_new//" . $cards[5] . ".png";
	$player_9[] = $card_9  = WEB_URL . "/storage/front/img/cards_new//" . $cards[9] . ".png";
	$player_9[] = $card_13  = WEB_URL . "/storage/front/img/cards_new//" . $cards[13] . ".png";
	$player_9[] = $card_17  = WEB_URL . "/storage/front/img/cards_new//" . $cards[17] . ".png";
	$player_9[] = $card_21  = WEB_URL . "/storage/front/img/cards_new//" . $cards[21] . ".png";
	$player_9[] = $card_25  = WEB_URL . "/storage/front/img/cards_new//" . $cards[25] . ".png";
	$player_9[] = $card_29  = WEB_URL . "/storage/front/img/cards_new//" . $cards[29] . ".png";
	$player_9[] = $card_33  = WEB_URL . "/storage/front/img/cards_new//" . $cards[33] . ".png";

$player_91[] = $cards[1];
	$player_91[] = $cards[5];
	$player_91[] = $cards[9];
	$player_91[] = $cards[13];
	$player_91[] = $cards[17];
	$player_91[] = $cards[21];
	$player_91[] = $cards[25];
	$player_91[] = $cards[29];
	$player_91[] = $cards[33];

	$player_9_img = "";
	$player_9_rank = 9;
	foreach ($player_9 as $key => $card_9) {
		if ($card_9 != WEB_URL . "/storage/front/img/cards_new//1.png") {
			$card_1 = $cards_result->{$player_91[$key]};
			$player_9_rank += $card_1['rank'];
			$player_9_img .= '<img src="' . $card_9 . '" />';
		}
	}

	//player 10
	$player_10[] = $card_2  = WEB_URL . "/storage/front/img/cards_new//" . $cards[2] . ".png";
	$player_10[] = $card_6  = WEB_URL . "/storage/front/img/cards_new//" . $cards[6] . ".png";
	$player_10[] = $card_10  = WEB_URL . "/storage/front/img/cards_new//" . $cards[10] . ".png";
	$player_10[] = $card_14  = WEB_URL . "/storage/front/img/cards_new//" . $cards[14] . ".png";
	$player_10[] = $card_18  = WEB_URL . "/storage/front/img/cards_new//" . $cards[18] . ".png";
	$player_10[] = $card_22  = WEB_URL . "/storage/front/img/cards_new//" . $cards[22] . ".png";
	$player_10[] = $card_26  = WEB_URL . "/storage/front/img/cards_new//" . $cards[26] . ".png";
	$player_10[] = $card_30  = WEB_URL . "/storage/front/img/cards_new//" . $cards[30] . ".png";
	$player_10[] = $card_34  = WEB_URL . "/storage/front/img/cards_new//" . $cards[34] . ".png";

$player_101[] = $cards[2];
	$player_101[] = $cards[6];
	$player_101[] = $cards[10];
	$player_101[] = $cards[14];
	$player_101[] = $cards[18];
	$player_101[] = $cards[22];
	$player_101[] = $cards[26];
	$player_101[] = $cards[30];
	$player_101[] = $cards[34];

	$player_10_img = "";
	$player_10_rank = 10;
	foreach ($player_10 as $key => $card_10) {
		if ($card_10 != WEB_URL . "/storage/front/img/cards_new//1.png") {
			$card_1 = $cards_result->{$player_101[$key]};
			$player_10_rank += $card_1['rank'];
			$player_10_img .= '<img src="' . $card_10 . '" />';
		}
	}

	//player 11
	$player_11[] = $card_3  = WEB_URL . "/storage/front/img/cards_new//" . $cards[3] . ".png";
	$player_11[] = $card_7  = WEB_URL . "/storage/front/img/cards_new//" . $cards[7] . ".png";
	$player_11[] = $card_11  = WEB_URL . "/storage/front/img/cards_new//" . $cards[11] . ".png";
	$player_11[] = $card_15  = WEB_URL . "/storage/front/img/cards_new//" . $cards[15] . ".png";
	$player_11[] = $card_19  = WEB_URL . "/storage/front/img/cards_new//" . $cards[19] . ".png";
	$player_11[] = $card_23  = WEB_URL . "/storage/front/img/cards_new//" . $cards[23] . ".png";
	$player_11[] = $card_27  = WEB_URL . "/storage/front/img/cards_new//" . $cards[27] . ".png";
	$player_11[] = $card_31  = WEB_URL . "/storage/front/img/cards_new//" . $cards[31] . ".png";
	$player_11[] = $card_35  = WEB_URL . "/storage/front/img/cards_new//" . $cards[35] . ".png";

	$player_111[] = $cards[3];
	$player_111[] = $cards[7];
	$player_111[] = $cards[11];
	$player_111[] = $cards[15];
	$player_111[] = $cards[19];
	$player_111[] = $cards[23];
	$player_111[] = $cards[27];
	$player_111[] = $cards[31];
	$player_111[] = $cards[35];

	$player_11_img = "";
	$player_11_rank = 11;
	foreach ($player_11 as $key => $card_11) {
		if ($card_11 != WEB_URL . "/storage/front/img/cards_new//1.png") {
			$card_1 = $cards_result->{$player_111[$key]};
			$player_11_rank += $card_1['rank'];
			$player_11_img .= '<img src="' . $card_11 . '" />';
		}
	}
?>
	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 8</h4>
		</div>
		<div class="col-7">
			<div class="result-image">

				<?php
				foreach ($player_8 as $card_8) {
					if ($card_8 != WEB_URL . "/storage/front/img/cards_new//1.png") {
				?>
						<img src="<?php echo $card_8; ?>" />
				<?php
					}
				}
				?>
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == 8) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

	<style>
		.winner-icon {
			position: absolute;
			right: 0;
			bottom: 15%;
		}

		.text-warning {
			color: #ffc107 !important;
		}
	</style>

<div class="row flex-column align-items-center">
		<div class="col-121">
			<h4 class="m-0 text-center">Player 8 - <span class="text-warning"> <? echo $player_8_rank; ?></span></h4>
		</div>
		<div class="col-121 d-flex  gap-2 mt-1" style="align-items: center;">

		<div class="result-image">
				<?php
				foreach ($player_8 as $card_8) {
					if ($card_8 != WEB_URL . "/storage/front/img/cards_new//1.png") {
				?>
						<img src="<?php echo $card_8; ?>" />
				<?php
					}
				}
				?> 
			</div>
			
			<?php
			if ($result_status == 8 ) {
			?>
			<div class="col-2 winner-box">
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
				</div>	
			<?php
			}
			?>
		
		</div>
	</div>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 9</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<?php
				foreach ($player_9 as $card_9) {
					if ($card_9 != WEB_URL . "/storage/front/img/cards_new//1.png") {
				?>
						<img src="<?php echo $card_9; ?>" />
				<?php
					}
				}
				?>
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == 9) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

<div class="row flex-column align-items-center">
		<div class="col-121">
			<h4 class="m-0 text-center">Player 9 - <span class="text-warning"> <? echo $player_9_rank; ?></span></h4>
		</div>
		<div class="col-121 d-flex  gap-2 mt-1" style="align-items: center;">

		<div class="result-image">
				<?php
				foreach ($player_9 as $card_9) {
					if ($card_9 != WEB_URL . "/storage/front/img/cards_new//1.png") {
				?>
						<img src="<?php echo $card_9; ?>" />
				<?php
					}
				}
				?>
			</div>
			
			<?php
			if ($result_status == 9 ) {
			?>
			<div class="col-2 winner-box">
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
				</div>	
			<?php
			}
			?>
		
		</div>
	</div>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 10</h4>
		</div>
		<div class="col-7">
			<div class="result-image">

				<?php
				foreach ($player_10 as $card_10) {
					if ($card_10 != WEB_URL . "/storage/front/img/cards_new//1.png") {
				?>
						<img src="<?php echo $card_10; ?>" />
				<?php
					}
				}
				?>

			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == 10) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

<div class="row flex-column align-items-center">
		<div class="col-121">
			<h4 class="m-0 text-center">Player 10 - <span class="text-warning"> <? echo $player_10_rank; ?></span></h4>
		</div>
		<div class="col-121 d-flex  gap-2 mt-1" style="align-items: center;">

		<div class="result-image">
				<?php
				foreach ($player_10 as $card_10) {
					if ($card_10 != WEB_URL . "/storage/front/img/cards_new//1.png") {
				?>
						<img src="<?php echo $card_10; ?>" />
				<?php
					}
				}
				?>
			</div>
			
			<?php
			if ($result_status == 10 ) {
			?>
			<div class="col-2 winner-box">
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
				</div>	
			<?php
			}
			?>
		
		</div>
	</div>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player 11</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<?php
				foreach ($player_11 as $card_11) {
					if ($card_11 != WEB_URL . "/storage/front/img/cards_new//1.png") {
				?>
						<img src="<?php echo $card_11; ?>" />
				<?php
					}
				}
				?>
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == 11) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

	<div class="row flex-column align-items-center">
		<div class="col-121">
			<h4 class="m-0 text-center">Player 11 - <span class="text-warning"> <? echo $player_11_rank; ?></span></h4>
		</div>
		<div class="col-121 d-flex gap-2 mt-1" style="align-items: center;">

		<div class="result-image">
				<?php
				foreach ($player_11 as $card_11) {
					if ($card_11 != WEB_URL . "/storage/front/img/cards_new//1.png") {
				?>
						<img src="<?php echo $card_11; ?>" />
				<?php
					}
				}
				?>
			</div>
			
			<?php
			if ($result_status == 11 ) {
			?>
			<div class="col-2 winner-box">
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
				</div>	
			<?php
			}
			?>
		
		</div>
	</div>
	<?php
	if($casino_type == "card32"){
		?>
		<div class="row mt-3 justify-content-center">
		<div class="col-12 text-center">
			<div class="casino-result-desc"
				style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px">
				<div class="casino-result-desc-item  flex-column text-center"
					style="display: flex;justify-content: center;width: 100%;gap:8px;">
					<div><span style="color:gray">Winner  </span>
						<? echo $desc_remakrs[0]; ?>
					</div>
					

				</div>

			</div>
		</div>
	</div>
	<?php 
	}else{
		?>
		<div class="row mt-3 justify-content-center">
		<div class="col-12 text-center">
			<div class="casino-result-desc"
				style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px">
				<div class="casino-result-desc-item  flex-column text-center"
					style="display: flex;justify-content: center;width: 100%;gap:8px;">
					<div>
						<span style="color:gray">Winner  </span><? echo $desc_remakrs[0]; ?>
					</div>
					<div>
						<span style="color:gray">Odd/Even  </span><? echo $desc_remakrs[1]; ?>
					</div>
					<div>
						<span style="color:gray">Black/Red  </span><? echo $desc_remakrs[2]; ?>
					</div>
					<div>
						<span style="color:gray">Total  </span><? echo $desc_remakrs[3]; ?>
					</div>
					<div>
						<span style="color:gray">Single  </span><? echo $desc_remakrs[4]; ?>
					</div>
				</div>

			</div>
		</div>
	</div>
<?php	}
	?>
	

<?php
} else if ($casino_type == "queen") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$cards = json_decode($cards);

	//player 8
	$player_8[] = $card_0  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$player_8[] = $card_4  = WEB_URL . "/storage/front/img/cards_new/" . $cards[4] . ".png";
	$player_8[] = $card_8  = WEB_URL . "/storage/front/img/cards_new/" . $cards[8] . ".png";
	$player_8[] = $card_12  = WEB_URL . "/storage/front/img/cards_new/" . $cards[12] . ".png";

	$player_81[] = $cards[0];
	$player_81[] = $cards[4];
	$player_81[] = $cards[8];
	$player_81[] = $cards[12];

	$player_8_img = "";
	$player_8_rank = 0;
	foreach ($player_8 as $key=>$card_8) {
					if ($card_8 != WEB_URL . "/storage/front/img/cards_new/1.png") {
						$card_1 = $cards_result->{$player_81[$key]};
						$player_8_rank += $card_1['rank'];
						$player_8_img .= '<img src="'.$card_8.'" />';
				
					}
				}


	//player 9
	$player_9[] = $card_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	$player_9[] = $card_5  = WEB_URL . "/storage/front/img/cards_new/" . $cards[5] . ".png";
	$player_9[] = $card_9  = WEB_URL . "/storage/front/img/cards_new/" . $cards[9] . ".png";
	$player_9[] = $card_13  = WEB_URL . "/storage/front/img/cards_new/" . $cards[13] . ".png";
	$player_91[] = $cards[1];
	$player_91[] = $cards[5];
	$player_91[] = $cards[9];
	$player_91[] = $cards[13];
	$player_9_img = "";
	$player_9_rank = 1;
	foreach ($player_9 as $key=>$card_9) {
					if ($card_9 != WEB_URL . "/storage/front/img/cards_new/1.png") {
						$card_1 = $cards_result->{$player_91[$key]};
						$player_9_rank += $card_1['rank'];
						$player_9_img .= '<img src="'.$card_9.'" />';
				
					}
				}

	//player 10
	$player_10[] = $card_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
	$player_10[] = $card_6  = WEB_URL . "/storage/front/img/cards_new/" . $cards[6] . ".png";
	$player_10[] = $card_10  = WEB_URL . "/storage/front/img/cards_new/" . $cards[10] . ".png";
	$player_10[] = $card_14  = WEB_URL . "/storage/front/img/cards_new/" . $cards[14] . ".png";
	
	$player_101[] = $cards[2];
	$player_101[] = $cards[6];
	$player_101[] = $cards[10];
	$player_101[] = $cards[14];

	$player_10_img = "";
	$player_10_rank = 2;
	foreach ($player_10 as $key=>$card_10) {
					if ($card_10 != WEB_URL . "/storage/front/img/cards_new/1.png") {
						$card_1 = $cards_result->{$player_101[$key]};
						$player_10_rank += $card_1['rank'];
						$player_10_img .= '<img src="'.$card_10.'" />';
				
					}
				}
	//player 11
	$player_11[] = $card_3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";
	$player_11[] = $card_7  = WEB_URL . "/storage/front/img/cards_new/" . $cards[7] . ".png";
	$player_11[] = $card_11  = WEB_URL . "/storage/front/img/cards_new/" . $cards[11] . ".png";
	$player_11[] = $card_15  = WEB_URL . "/storage/front/img/cards_new/" . $cards[15] . ".png";
$player_111[] = $cards[3];
	$player_111[] = $cards[7];
	$player_111[] = $cards[11];
	$player_111[] = $cards[15];

	$player_11_img = "";
	$player_11_rank = 3;
	foreach ($player_11 as $key=>$card_11) {
					if ($card_11 != WEB_URL . "/storage/front/img/cards_new/1.png") {
						$card_1 = $cards_result->{$player_111[$key]};
						$player_11_rank += $card_1['rank'];
						$player_11_img .= '<img src="'.$card_11.'" />';
				
					}
				}
?>
<style>
	.abc{
		color: white !important;
	}
</style>
	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Total 0</h4>
		</div>
		<div class="col-7">
			<div class="result-image">

				<?php
				foreach ($player_8 as $card_8) {
					if ($card_8 != WEB_URL . "/storage/front/img/cards_new/1.png") {
				?>
						<img src="<?php echo $card_8; ?>" />
				<?php
					}
				}
				?>
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == 0) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Total 0 - <span class="badge bg-success abc"> <? echo $player_8_rank;?></span></h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">

		<div class="result-image">
				<?php
				echo $player_8_img;
				?>
			</div>
			<div class="col-2 winner-box">
			<?php
			if ($result_status == 0 ) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>	
		</div>
	</div>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Total 1</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<?php
				foreach ($player_9 as $card_9) {
					if ($card_9 != WEB_URL . "/storage/front/img/cards/1.png") {
				?>
						<img src="<?php echo $card_9; ?>" />
				<?php
					}
				}
				?>
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == 1) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Total 1 - <span class="badge bg-success abc"><? echo $player_9_rank;?></span></h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">

		<div class="result-image">
				<?php
				echo $player_9_img;
				?>
			</div>
			<div class="col-2 winner-box">
			<?php
			if ($result_status == 1 ) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>	
		</div>
	</div>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Total 2</h4>
		</div>
		<div class="col-7">
			<div class="result-image">

				<?php
				foreach ($player_10 as $card_10) {
					if ($card_10 != WEB_URL . "/storage/front/img/cards/1.png") {
				?>
						<img src="<?php echo $card_10; ?>" />
				<?php
					}
				}
				?>

			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == 2) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Total 2 - <span class="badge bg-success abc"><? echo $player_10_rank;?></span></h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">

		<div class="result-image">
				<?php
					echo $player_10_img;
				?>
			</div>
			<div class="col-2 winner-box">
			<?php
			if ($result_status == 2 ) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>	
		</div>
	</div>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Total 3</h4>
		</div>
		<div class="col-7">
			<div class="result-image">
				<?php
				foreach ($player_11 as $card_11) {
					if ($card_11 != WEB_URL . "/storage/front/img/cards/1.png") {
				?>
						<img src="<?php echo $card_11; ?>" />
				<?php
					}
				}
				?>
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == 3) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->
	

	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Total 3 - <span class="badge bg-success abc"><? echo $player_11_rank;?></span></h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">

		<div class="result-image">
				<?php
				echo $player_11_img;
				?>
			</div>
			<div class="col-2 winner-box">
			<?php
			if ($result_status == 3 ) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>	
		</div>
	</div>

	<div class="row mt-3 justify-content-center">
		<div class="col-12 text-center">
			<div class="casino-result-desc"
				style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px">
				<div class="casino-result-desc-item  flex-column text-center"
					style="display: flex;justify-content: center;width: 100%;gap:8px;">
					<div><span style="color:gray">Winner  </span>
						<? echo $desc_remakrs; ?>
					</div>
					

				</div>

			</div>
		</div>
	</div>

<?php
} else if ($casino_type == "worli2" or $casino_type == "worli") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$cards = json_decode($cards);
	$card_path = "cards";
	if ($casino_type == "worli2") {
		$card_path = "cards_new";
	}
	$card_1  = WEB_URL . "/storage/front/img/$card_path/" . $cards[0] . ".png";
	$card_2  = WEB_URL . "/storage/front/img/$card_path/" . $cards[1] . ".png";
	$card_3  = WEB_URL . "/storage/front/img/$card_path/" . $cards[2] . ".png";

	$card_1_value = str_replace("A", "1", $card_1);
	$card_2_value = str_replace("A", "1", $card_2);
	$card_3_value = str_replace("A", "1", $card_3);

	$card_1_value = preg_replace("/[^0-9]/", "", "$card_1_value");
	$card_2_value = preg_replace("/[^0-9]/", "", "$card_2_value");
	$card_3_value = preg_replace("/[^0-9]/", "", "$card_3_value");

	if ($card_1_value >= 10) {
		$card_1_value = substr($card_1_value, -1);
	}

	if ($card_2_value >= 10) {
		$card_2_value = substr($card_2_value, -1);
	}

	if ($card_3_value >= 10) {
		$card_3_value = substr($card_3_value, -1);
	}
?>
	<div class="row">
		<div class="col-12 text-center">
			<div class="result-image">
				<img src="<?php echo $card_1; ?>" />
				<img src="<?php echo $card_2; ?>" />
				<img src="<?php echo $card_3; ?>" />
			</div>
			<!-- <div class="mt-3">
				<span class="bg-success pt-2 pb-2 pl-2 pr-2 text-white">
					<b><?php echo $card_1_value . $card_2_value . $card_3_value; ?>
						- <?php echo $result_status; ?></b></span>
			</div> -->
			<div class="row row5 oepn-teen-result">
				<div class="col-12 text-center flex-column text-center"
					style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;;gap:8px;">
					<div><span style="color:gray">Pana: </span>
					<?php echo $card_1_value . $card_2_value . $card_3_value; ?>
					</div>
					<div><span style="color:gray">Ocada: </span>
					<?php echo $result_status; ?>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php
} else if ($casino_type == "sicbo2" || $casino_type == "sicbo") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$cards = json_decode($cards);
	$card_path = "cards_new";

	$card_1  = WEB_URL . "/storage/front/img/$card_path/dice" . $cards[0] . ".png";
	$card_2  = WEB_URL . "/storage/front/img/$card_path/dice" . $cards[1] . ".png";
	$card_3  = WEB_URL . "/storage/front/img/$card_path/dice" . $cards[2] . ".png";

?>
	<div class="row">
		<div class="col-12 text-center">
			<div class="result-image">
				<img src="<?php echo $card_1; ?>" />
				<img src="<?php echo $card_2; ?>" />
				<img src="<?php echo $card_3; ?>" class="mr-2" />
			</div>
		</div>
	</div>
	<div class="row row5 oepn-teen-result">
		<div class="col-12 text-center flex-column text-center"
			style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;">
			<div>Desc
				<? echo $desc_remakrs; ?>
			</div>
			<div>Win
				<? echo $result_status; ?>
			</div>
		</div>

	</div>

<?php
}
 else if ($casino_type == "dolidana") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$cards = json_decode($cards);
	$card_path = "cards_new";
	$desc_remakrs = explode("#",$desc_remakrs);
	$card_1  = WEB_URL . "/storage/front/img/$card_path/dice" . $cards[0] . ".png";
	$card_2  = WEB_URL . "/storage/front/img/$card_path/dice" . $cards[1] . ".png";

?>
	<div class="row">
		<div class="col-12 text-center">
			<div class="result-image">
				<img src="<?php echo $card_1; ?>" />
				<img src="<?php echo $card_2; ?>" />
			</div>
		</div>
	</div>
	<div class="row row5 oepn-teen-result">
			<div class="col-12 text-center flex-column text-center"
				style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;;gap:8px;">
				<div><span style="color:gray">Turn: </span>
					<? echo $desc_remakrs[0]; ?>
				</div>
				<? if(count($desc_remakrs) == 2){
							?>
				<div><span style="color:gray">Win: </span>
					<? echo $desc_remakrs[1]; ?>
				</div>
				<?
				}else{?>
				<div><span style="color:gray">Any Pair: </span>
					<span><? echo $desc_remakrs[1]; ?></span>
				</div>
				<div><span style="color:gray">Particular Pair: </span>
					<? echo $desc_remakrs[2]; ?>
				</div>
				<div><span style="color:gray">Sum Total: </span>
					<? echo $desc_remakrs[3]; ?>
				</div>
				<div><span style="color:gray">Odd/Even: </span>
					<? echo $desc_remakrs[4]; ?>
				</div>
				<div><span style="color:gray">Lucky 7: </span>
					<? echo $desc_remakrs[5]; ?>
				</div>
				<?
				}
				?>
			</div>

		</div>

<?php
} else if ($casino_type == "lucky7" or $casino_type == "lucky7eu" or $casino_type == "lucky7eu2" or $casino_type == "lucky5") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
		
	
	$cards = json_decode($cards);

	if ($casino_type == "lucky5") {
		$rdesc_array1 = explode('#', $desc_remakrs);
		
		$card_11  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	}
	$card_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$result_status_text = "";
	if ($result_status == "H" or $result_status == "2") {
		$result_status_text = "High Card";
	} else if ($result_status == "L"  or $result_status == "1") {
		$result_status_text = "Low Card";
	} else if ($result_status == "T") {
		$result_status_text = "Tie";
	}
	$line_result = "";
	if ($casino_type == "lucky7eu2" || $casino_type == "lucky7" || $casino_type == "lucky7eu") {
		$parts = explode('#', $desc_remakrs);
		$last_value = trim(end($parts));
		$line_result = "$last_value";
		$card_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	}

	$card_1_value = str_replace("SS", "", $cards[0]);
	$card_1_value = str_replace("DD", "", $card_1_value);
	$card_1_value = str_replace("HH", "", $card_1_value);
	$card_1_value = str_replace("CC", "", $card_1_value);

	$odd_even = "";
	$is_even = is_even($cards[0], $cards_result);
	if ($is_even) {
		$odd_even = "Even";
	} else {
		$odd_even = "Odd";
	}

	$red_black = "";
	$is_red = is_red($cards[0], $cards_result);
	if ($is_red) {
		$red_black = "Red";
	} else {
		$red_black = "Black";
	}


if ($casino_type == "lucky5") { ?>
	<div class="row">
		<div class="col-12 text-center">
			<div class="result-image"><img src="<?php echo $card_11; ?>" class="mr-2" /></div>
		</div>
	</div>
<?php	}else{ ?>
<div class="row">
		<div class="col-12 text-center">
			<div class="result-image"><img src="<?php echo $card_1; ?>" class="mr-2" /></div>
		</div>
	</div>
<?php }


if($casino_type == "lucky5"){ ?>
	<div class="row mt-3 justify-content-center">
		<div class="col-12 text-center">
			<div class="casino-result-desc"
				style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px">
				<div class="casino-result-desc-item  flex-column text-center"
					style="display: flex;justify-content: center;width: 100%;gap:8px;">
					<div><span style="color:gray">Winner  </span>
						<? echo $rdesc_array1[0]; ?>
					</div>
					<div><span style="color:gray">Odd/Even  </span>
						<? echo $rdesc_array1[1] ?>
					</div>
					<div><span style="color:gray">Color </span>
						<? echo $rdesc_array1[2] ?>
					</div>
					<div><span style="color:gray">Card </span>
						<? echo $rdesc_array1[3] ?>
					</div>
					<?
					if ($casino_type == "lucky7eu2") {
					?>
						<div><span style="color:gray">Line </span>
							<? echo $line_result; ?>
						</div>
					<?
					}
					?>

				</div>

			</div>
		</div>
	</div>
<?php }else{ ?>


	<div class="row mt-3 justify-content-center">
		<div class="col-12 text-center">
			<div class="casino-result-desc"
				style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px">
				<div class="casino-result-desc-item  flex-column text-center"
					style="display: flex;justify-content: center;width: 100%;gap:8px;">
					<div><span style="color:gray">Winner  </span>
						<? echo $result_status_text; ?>
					</div>
					<div><span style="color:gray">Odd/Even  </span>
						<? echo $odd_even; ?>
					</div>
					<div><span style="color:gray">Color </span>
						<? echo $red_black; ?>
					</div>
					<div><span style="color:gray">Card </span>
						<? echo $card_1_value; ?>
					</div>
					<?
					if ($casino_type == "lucky7eu2" || $casino_type == "lucky7" || $casino_type == "lucky7eu") {
					?>
						<div><span style="color:gray">Line </span>
							<? echo $line_result; ?>
						</div>
					<?
					}
					?>
				

				</div>

			</div>
		</div>
	</div>
<?php }
?>
	<!-- <div class="row mt-3">
    <div class="col-12 text-center">
        <div class="winner-board">
            <div class="mb-1"><span class="text-success">Result:</span> <span><?php echo $result_status_text; ?> ||
                    <?php echo $red_black; ?> || <?php echo $odd_even; ?> || Card
                    <?php echo $card_1_value; ?><?php echo $line_result; ?></span></div>
        </div>
    </div>
</div> -->


<?php
} else if ($casino_type == "dt20" or $casino_type == "dt202" or $casino_type == "dt6") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$desc_remakrs = explode('#', $desc_remakrs);
	$cards = json_decode($cards);

	$card_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$card_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";

	$result_text = "";
	if ($result_status == "D") {
		$result_text = "Dragon";
	} else if ($result_status == "T") {
		$result_text = "Tiger";
	}

	$is_par_text = "No";
	$is_pair_dt20 = is_pair_dt20($cards[0], $cards[1], $cards_result);
	if ($is_pair_dt20) {
		$is_par_text = "Is";
	}

	$card_1_value = str_replace("SS", "", $cards[0]);
	$card_1_value = str_replace("DD", "", $card_1_value);
	$card_1_value = str_replace("HH", "", $card_1_value);
	$card_1_value = str_replace("CC", "", $card_1_value);


	$card_2_value = str_replace("SS", "", $cards[1]);
	$card_2_value = str_replace("DD", "", $card_2_value);
	$card_2_value = str_replace("HH", "", $card_2_value);
	$card_2_value = str_replace("CC", "", $card_2_value);

	$odd_even_dragon = "";
	$is_even = is_even($cards[0], $cards_result);
	if ($is_even) {
		$odd_even_dragon = "Even";
	} else {
		$odd_even_dragon = "Odd";
	}

	$red_black_dragon = "";
	$is_red = is_red($cards[0], $cards_result);
	if ($is_red) {
		$red_black_dragon = "Red";
	} else {
		$red_black_dragon = "Black";
	}

	$odd_even_tiger = "";
	$is_even = is_even($cards[1], $cards_result);
	if ($is_even) {
		$odd_even_tiger = "Even";
	} else {
		$odd_even_tiger = "Odd";
	}

	$red_black_tiger = "";
	$is_red = is_red($cards[1], $cards_result);
	if ($is_red) {
		$red_black_tiger = "Red";
	} else {
		$red_black_tiger = "Black";
	}
?>

	<!-- <div class="row">
		<div class="col-12 text-center">
			<div class="result-image">
				<span>Dragon</span>
				<img src="<?php echo $card_1; ?>" />
				<span>Tiger</span>
				<img src="<?php echo $card_2; ?>" />
			</div>
		</div>
	</div> -->

	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Dragon</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">

			<?php
			if ($result_status == 1  or $result_status == "D") {
			?>
			<div class="col-2 winner-box">
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
				</div>
			<?php
			}
			?>
			
		<div class="result-image">
				<img src="<?php echo $card_1; ?>"> 
			</div>
		</div>
	</div>

	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Tiger</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">

		<div class="result-image">
				<img src="<?php echo $card_2; ?>"> 
			</div>
			
			<?php
			if ($result_status == 2  or $result_status == "T") {
			?>
			<div class="col-2 winner-box">
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
				</div>	
			<?php
			}
			?>
		
		</div>
	</div>

	<!-- <div class="row mt-3">
		<div class="col-12 text-center">
			<div class="winner-board">
				<div class="mb-1">
					<span class="text-success">Result: </span>
					<?php echo $result_text; ?>|<?php echo $is_par_text; ?> Pair
				</div>
				<div class="mb-1">
					<span class="text-success">Dragon: </span>
					<?php echo $red_black_dragon; ?>|<?php echo $odd_even_dragon; ?>|Card<?php echo $card_1_value; ?>
				</div>
				<div class="mb-1">
					<span class="text-success">Tiger: </span>
					<?php echo $red_black_tiger; ?>|<?php echo $odd_even_tiger; ?>|Card<?php echo $card_2_value; ?>
				</div>
			</div>
		</div>
	</div> -->

	<div class="row mt-3">
		<div class="col-12 text-center">
			<div class="winner-board">
				<div class="mb-1">
					<span >Winner: </span> <span><?php echo $desc_remakrs[0]; ?> </span>
					</div>
					<div class="mb-1">
					<span >Pair: </span> <span><?php echo $desc_remakrs[1]; ?> </span>
					</div>
					<div class="mb-1">
					<span >Odd/Even: </span> <span><?php echo $desc_remakrs[2]; ?> </span>
					</div>
					<div class="mb-1">
					<span >Color: </span> <span><?php echo $desc_remakrs[3]; ?> </span>
					</div>
					
					<div class="mb-1">
					<span >Card: </span> <span><?php echo $desc_remakrs[4]; ?> </span>
				</div>
				
			</div>
		</div>
	</div>


<?php
} else if ($casino_type == "aaa") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$desc_remakrs = explode("#",$desc_remakrs);
	$cards = json_decode($cards);

	$card_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";

	$result_text = "";
	if ($result_status == "A") {
		$result_text = "Amar";
	} else if ($result_status == "B") {
		$result_text = "Akbar";
	} else if ($result_status == "C") {
		$result_text = "Anthony";
	}

	$card_1_value = str_replace("SS", "", $cards[0]);
	$card_1_value = str_replace("DD", "", $card_1_value);
	$card_1_value = str_replace("HH", "", $card_1_value);
	$card_1_value = str_replace("CC", "", $card_1_value);


	$odd_even = "";
	$is_even = is_even($cards[0], $cards_result);
	if ($is_even) {
		$odd_even = "Even";
	} else {
		$odd_even = "Odd";
	}

	$red_black = "";
	$is_red = is_red($cards[0], $cards_result);
	if ($is_red) {
		$red_black = "Red";
	} else {
		$red_black = "Black";
	}

	$is_under_over = "Tie ";
	$is_current_card = rank_number($cards[0], $cards_result);
	if ($is_current_card < 7) {
		$is_under_over = "Under 7";
	} else if ($is_current_card > 7) {
		$is_under_over = "Over 7";
	}
?>
	<div class="row">
		<div class="col-12 text-center">
			<div class="result-image"><img src="<?php echo $card_1; ?>" /></div>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-12 text-center">
			<div class="winner-board">
				<div class="mb-1">
					<span >Winner: </span> <span><?php echo $desc_remakrs[0]; ?> </span>
					</div>
					<div class="mb-1">
					<span >Odd/Even: </span> <span><?php echo $desc_remakrs[1]; ?> </span>
					</div>
					<div class="mb-1">
					<span >Color: </span> <span><?php echo $desc_remakrs[2]; ?> </span>
					</div>
					<div class="mb-1">
					<span >Under/Over: </span> <span><?php echo $desc_remakrs[3]; ?> </span>
					</div>
					<div class="mb-1">
					<span >Card: </span> <span><?php echo $desc_remakrs[4]; ?> </span>
				</div>
				
			</div>
		</div>
	</div>



<?php
} else if ($casino_type == "aaa2") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$cards = json_decode($cards);

	$card_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";

	$result_text = "";
	if ($result_status == "A") {
		$result_text = "Amar";
	} else if ($result_status == "B") {
		$result_text = "Akbar";
	} else if ($result_status == "C") {
		$result_text = "Anthony";
	}

	$card_1_value = str_replace("SS", "", $cards[0]);
	$card_1_value = str_replace("DD", "", $card_1_value);
	$card_1_value = str_replace("HH", "", $card_1_value);
	$card_1_value = str_replace("CC", "", $card_1_value);


	$odd_even = "";
	$is_even = is_even($cards[0], $cards_result);
	if ($is_even) {
		$odd_even = "Even";
	} else {
		$odd_even = "Odd";
	}

	$red_black = "";
	$is_red = is_red($cards[0], $cards_result);
	if ($is_red) {
		$red_black = "Red";
	} else {
		$red_black = "Black";
	}

	$is_under_over = "Tie ";
	$is_current_card = rank_number($cards[0], $cards_result);
	if ($is_current_card < 7) {
		$is_under_over = "Under 7";
	} else if ($is_current_card > 7) {
		$is_under_over = "Over 7";
	}
?>
	<div class="row">
		<div class="col-12 text-center">
			<div class="result-image"><img src="<?php echo $card_1; ?>" /></div>
		</div>
	</div>
	<div class="row mt-3 justify-content-center">
		<div class="col-6 text-center">
			<div class="casino-result-desc"
				style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px">
				<div class="casino-result-desc-item  flex-column text-center"
					style="display: flex;justify-content: center;width: 100%;gap:8px;">
					<div><span style="color:gray">Winner </span>
						<? echo $result_text; ?>
					</div>
					<div><span style="color:gray">Odd/Even </span>
						<? echo $odd_even; ?>
					</div>
					<div><span style="color:gray">Color </span>
						<? echo $red_black; ?>
					</div>
					<div><span style="color:gray">Under/Over </span>
						<? echo $is_under_over; ?>
					</div>
					<div><span style="color:gray">Card </span>
						<? echo $card_1_value; ?>
					</div>

				</div>

			</div>
		</div>
	</div>



<?php
} else if ($casino_type == "btable") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$desc_remakrs = explode("#",$desc_remakrs);
	$cards = json_decode($cards);

	$card_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";

	$result_text = "";
	if ($result_status == "A") {
		$result_text = "DON";
	} else if ($result_status == "B") {
		$result_text = "Amar Akbar Anthony";
	} else if ($result_status == "C") {
		$result_text = "Sahib Bibi Aur Ghulam";
	} else if ($result_status == "D") {
		$result_text = "Dharam Veer";
	} else if ($result_status == "E") {
		$result_text = "Kis KisKo Pyaar Karoon";
	} else if ($result_status == "F") {
		$result_text = "Ghulam";
	}

	$card_1_value = str_replace("SS", "", $cards[0]);
	$card_1_value = str_replace("DD", "", $card_1_value);
	$card_1_value = str_replace("HH", "", $card_1_value);
	$card_1_value = str_replace("CC", "", $card_1_value);


	$odd_even = "";
	$is_even = is_even($cards[0], $cards_result);
	if ($is_even) {
		$odd_even = "Even";
	} else {
		$odd_even = "Odd";
	}

	$red_black = "";
	$is_red = is_red($cards[0], $cards_result);
	if ($is_red) {
		$red_black = "Red";
	} else {
		$red_black = "Black";
	}

	$is_dulhan = is_dulhan($cards[0], $cards_result);
	if ($is_dulhan) {
		$dulha_barati = "Dulha Dulhan";
	} else {
		$dulha_barati = "Barati";
	}
?>

	<div class="row">
		<div class="col-12 text-center">
			<div class="result-image"><img src="<?php echo $card_1; ?>" /></div>
		</div>
	</div>

	<div class="row mt-3">
		<div class="col-12 text-center">
			<div class="winner-board">
				<div class="mb-1"><span>Winner:</span> <span><?php echo $desc_remakrs[0]; ?> </span></div>
				<div class="mb-1"><span>Odd:</span> <span><?php echo $desc_remakrs[1]; ?> </span></div>
				 <div class="mb-1"><span>Dulha Dulhan/Barati:</span> <span><?php echo $desc_remakrs[2]; ?> </span></div>
				<div class="mb-1"><span>Color:</span> <span><?php echo $desc_remakrs[3]; ?> </span></div>
				<div class="mb-1"><span>Card:</span> <span><?php echo $desc_remakrs[4]; ?> </span></div> 
			
			</div>
		</div>
	</div>



<?php
} else if ($casino_type == "btable2") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$rdesc_array = explode("#", $desc_remakrs);
	$cards = json_decode($cards);

	$card_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";

?>

	<div class="row">
		<div class="col-12 text-center">
			<div class="result-image"><img src="<?php echo $card_1; ?>" /></div>
		</div>
	</div>
	<div class="row row5">
		<div class="col-12 text-center"
			style="flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px">
			<div><span style="color:gray">Winner  </span>
				<? echo $rdesc_array[0]; ?>
			</div>
			<div><span style="color:gray">Odd  </span>
				<? echo $rdesc_array[1]; ?>
			</div>
			<div><span style="color:gray">Dulha Dulhan/Barati  </span>
				<? echo $rdesc_array[2]; ?>
			</div>
			<div><span style="color:gray">Color  </span>
				<? echo $rdesc_array[3]; ?>
			</div>
			<div><span style="color:gray">Card  </span>
				<? echo $rdesc_array[4]; ?>
			</div>
		</div>

	</div>

<?php
} else if ($casino_type == "dtl20") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$cards = json_decode($cards);

	$card_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$card_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	$card_3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";




?>
	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Dragon</h4>
		</div>
		<div class="col-7">
			<div class="result-image"><img src="<?php echo $card_1; ?>" /></div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == "1" or $result_status == "D") {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

	<div class="row flex-column align-items-center">
		<div class="col-121">
			<h4 class="m-0 text-center">Dragon</h4>
		</div>
		<div class="col-121 d-flex gap-2 mt-1" style="align-items: center;">

		<div class="result-image">
				<img src="<?php echo $card_1; ?>"> 
			</div>
			
			<?php
			if ($result_status == 1  or $result_status == "D") {
			?>
			<div class="col-2 winner-box">
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
				</div>	
			<?php
			}
			?>
		
		</div>
	</div>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Tiger</h4>
		</div>
		<div class="col-7">
			<div class="result-image"><img src="<?php echo $card_2; ?>" /></div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == "2" or $result_status == "T") {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

<div class="row flex-column align-items-center">
		<div class="col-121">
			<h4 class="m-0 text-center">Tiger</h4>
		</div>
		<div class="col-121 d-flex gap-2 mt-1" style="align-items: center;">

		<div class="result-image">
				<img src="<?php echo $card_2; ?>"> 
			</div>
			
			<?php
			if ($result_status == 2  or $result_status == "T") {
			?>
			<div class="col-2 winner-box">
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
				</div>	
			<?php
			}
			?>
		
		</div>
	</div>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Lion</h4>
		</div>
		<div class="col-7">
			<div class="result-image"><img src="<?php echo $card_3; ?>" /></div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == "3" or $result_status == "L") {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

	<div class="row flex-column align-items-center">
		<div class="col-121">
			<h4 class="m-0 text-center">Lion</h4>
		</div>
		<div class="col-121 d-flex gap-2 mt-1" style="align-items: center;">

		<div class="result-image">
				<img src="<?php echo $card_3; ?>"> 
			</div>
			
			<?php
			if ($result_status == 3  or $result_status == "L") {
			?>
			<div class="col-2 winner-box">
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
				</div>
			<?php
			}
			?>
			
		</div>
	</div>


<?php
} else if ($casino_type == "baccarat" or $casino_type == "baccarat2") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$desc_remakrs = explode("#",$desc_remakrs);
	$cards = json_decode($cards);

	$card_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$card_2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	$card_3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
	$card_4  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";
	$card_5  = WEB_URL . "/storage/front/img/cards_new/" . $cards[4] . ".png";
	$card_6  = WEB_URL . "/storage/front/img/cards_new/" . $cards[5] . ".png";
?>
	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Player</h4>
		</div>
		<div class="col-7">
			<div class="result-image">

				<?php
				if ($card_5 != WEB_URL . "/storage/front/img/cards_new/1.png") {
				?>
					<img src="<?php echo $card_5; ?>" class="lrotate" />
				<?php
				}
				?>
				<img src="<?php echo $card_3; ?>" />
				<img src="<?php echo $card_1; ?>" />

			</div>
		</div>
		<div class="col-2 winner-box">

			<?php
			if ($result_status == 1) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->

<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			<div class="col-2 winner-box">
			<?php
			if ($result_status == 1 ) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>	
		<div class="result-image">
			<?php
				if ($card_5 != WEB_URL . "/storage/front/img/cards_new/1.png") {
				?>
					<img src="<?php echo $card_5; ?>" class="lrotate" />
				<?php
				}
				?>
				<img src="<?php echo $card_3; ?>" />
				<img src="<?php echo $card_1; ?>" />
				
			</div>
			
		</div>
	</div>

	<!-- <div class="row row5 oepn-teen-result">
		<div class="col-3 winner-title">
			<h4>Banker</h4>
		</div>
		<div class="col-7">
			<div class="result-image">

				<img src="<?php echo $card_2; ?>" />
				<img src="<?php echo $card_4; ?>" />
				<?php
				if ($card_6 != WEB_URL . "/storage/front/img/cards/1.png") {
				?>
					<img src="<?php echo $card_6; ?>" class="rrotate" />
				<?php
				}
				?>
			</div>
		</div>
		<div class="col-2 winner-box">
			<?php
			if ($result_status == 2) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>
	</div> -->


	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Banker</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			
		<div class="result-image">
				<img src="<?php echo $card_2; ?>" />
				<img src="<?php echo $card_4; ?>" />
				<?php
				if ($card_6 != WEB_URL . "/storage/front/img/cards_new/1.png") {
				?>
					<img src="<?php echo $card_6; ?>" class="rrotate" />
				<?php
				}
				?>
				
			</div>
			<div class="col-2 winner-box">
			<?php
			if ($result_status == 2 ) {
			?>
				<div class="winner-label"><i class="fas fa-trophy text-success"></i></div>
			<?php
			}
			?>
		</div>	
		</div>
	</div>
	<?php
	if($casino_type == "baccarat"){ ?>
<div class="row row5 oepn-teen-result">
		<div class="col-12 text-center flex-column text-center"
			style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;">

			<div><span style="color:gray">Winner: </span>
				<? echo $desc_remakrs[0]; ?>
			</div>
			<div><span style="color:gray">Winner Pair: </span>
				<? echo $desc_remakrs[1]; ?>
			</div>
			<div><span style="color:gray">Perfect: </span>
				<? echo $desc_remakrs[2]; ?>
			</div>
			<div><span style="color:gray">Either: </span>
				<? echo $desc_remakrs[3]; ?>
			</div>
			<div><span style="color:gray">Big/Small: </span>
				<? echo $desc_remakrs[4]; ?>
			</div>

		</div>

	</div>
<?	}else{ ?>
	<div class="row row5 oepn-teen-result">
		<div class="col-12 text-center flex-column text-center"
			style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;">

			<div><span style="color:gray">Winner: </span>
				<? echo $desc_remakrs[0]; ?>
			</div>
			<div><span style="color:gray">Winner Pair: </span>
				<? echo $desc_remakrs[1]; ?>
			</div>
			<div><span style="color:gray">Score: </span>
				<? echo $desc_remakrs[2]; ?>
			</div> 

		</div>

	</div>
<? }
	?>
	

<?php
} else if ($casino_type == "cmatch20") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$cards = json_decode($cards);

	$card_1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
?>
	<div class="row">
		<div class="col-12 text-center">
			<div class="result-image"><img src="<?php echo $card_1; ?>" /></div>
		</div>
	</div>

	<div class="row row5">
		<div class="col-12 text-center"
			style="flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px">
			<div><span style="color:gray">Run  </span>
				<? echo $desc_remakrs; ?>
			</div>
			
		</div>

	</div>

	<?php
} else if ($casino_type == "cricketv3") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	if (mysqli_num_rows($get_casino_result) <= 0) {
	?>
		<div class="mb-1 text-center mt-3">
			Result not available
		</div>
	<?php
		exit();
	}
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$data_cards = $fetch_get_casino_result['data'];
	$cards = json_decode($cards);
	$data_cards = json_decode($data_cards);

	$winner_name = "";
	if ($result_status == 1) {
		$winner_name = "AUS";
	} else if ($result_status == 2) {
		$winner_name = "IND";
	} else {
		$winner_name = "TIE";
	}
	?>
<style>
	.text-fancy {
    color: #fdcf13;
}
</style>
	<div class="mb-1 text-right mt-3 market-title">
		Winner:
		<span class="text-fancy"><?php echo $winner_name; ?></span>

		| <?php echo $desc_remakrs; ?>
	</div>


	<div>
		<?php
		$socre_result = array();
		$ball = 1;
		foreach ($data_cards->t1->score as $cards_data) {
			$team_name = $cards_data->nation;
			if (!isset($team_name)) {
				$team_name = $cards_data->nat;
			}
			$over = $cards_data->oc;
			/* $ball = $cards_data->ball; */
			$wkt = $cards_data->wkt;
			$run = $cards_data->run;
			if (!array_key_exists($team_name, $socre_result)) {
				$ball = 1;
			} else {
				$ball++;
			}
			if (!isset($socre_result[$team_name])) {
				$socre_result[$team_name] = array();
			}

			if (!isset($socre_result[$team_name][$over])) {
				$socre_result[$team_name][$over] = array();
			}

			$bal_value = $run;
			if ($wkt == 1) {
				$bal_value = "ww";
			}
			$socre_result[$team_name][$over][$ball] = $bal_value;
		}


		?>
		<div class="table-responsive">
			<div class="market-title">First Inning</div>
			<table class="table table-bordered">
				<tr>
					<th class="text-center"><b><span>Australia</span></b></th>
					<th class="text-center"><b>1</b></th>
					<th class="text-center"><b>2</b></th>
					<th class="text-center"><b>3</b></th>
					<th class="text-center"><b>4</b></th>
					<th class="text-center"><b>5</b></th>
					<th class="text-center"><b>6</b></th>
					<th class="text-center"><b>Run/Over</b></th>
					<th class="text-center"><b>Score</b></th>
				</tr>
				<?php
				$over_wicket = 0;
				$over_score = 0;
				$total_score = 0;
				$total_wicket = 0;
				foreach ($socre_result['Australia'] as $data_key => $data_value) {

				?>
					<tr>
						<td class="text-center">Over <?php echo $data_key; ?></td>

						<?php
						$over_wicket = 0;
						$over_score = 0;
						if (count($data_value) != 6) {
							$ccc = 6 - count($data_value);
							for ($ii = 1; $ii <= $ccc; $ii++) {
								$data_value[] = "";
							}
						}
						foreach ($data_value as $ball_value) {
							if ($ball_value === "ww") {
								$over_wicket++;
								$total_wicket++;
							} else {
								$over_score = $over_score + $ball_value;
								$total_score = $total_score + $ball_value;
							}
						?>
							<td class="text-center">
							<span class="<? echo $ball_value === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_value; ?></span></td>
							<!-- <span class="text-danger"><?php echo $ball_value; ?></span> -->
						<?php
						}
						?>

						<td class="text-center nationcard"><?php echo $over_score; ?></td>
						<td class="text-center nationcard"><?php echo $total_score; ?>/<?php echo $total_wicket; ?></td>
					</tr>
				<?php
				}
				?>


			</table>
		</div>
		<div class="table-responsive mt-3">
			<div class="market-title">Second Inning</div>
			<table class="table table-bordered">
				<tr>
					<th class="text-center"><b><span>India</span></b></th>
					<th class="text-center"><b>1</b></th>
					<th class="text-center"><b>2</b></th>
					<th class="text-center"><b>3</b></th>
					<th class="text-center"><b>4</b></th>
					<th class="text-center"><b>5</b></th>
					<th class="text-center"><b>6</b></th>
					<th class="text-center"><b>Run/Over</b></th>
					<th class="text-center"><b>Score</b></th>
				</tr>
				<?php
				$over_wicket = 0;
				$over_score = 0;
				$total_score = 0;
				$total_wicket = 0;
				foreach ($socre_result['India'] as $data_key => $data_value) {

				?>
					<tr>
						<td class="text-center">Over <?php echo $data_key; ?></td>

						<?php
						$over_wicket = 0;
						$over_score = 0;
						if (count($data_value) != 6) {
							$ccc = 6 - count($data_value);
							for ($ii = 1; $ii <= $ccc; $ii++) {
								$data_value[] = "";
							}
						}
						foreach ($data_value as $ball_value) {
							if ($ball_value === "ww") {
								$over_wicket++;
								$total_wicket++;
							} else {
								$over_score = $over_score + $ball_value;
								$total_score = $total_score + $ball_value;
							}
						?>
							<td class="text-center">
								<span class="<? echo $ball_value === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_value; ?></span>
								<!-- <span class="text-danger"><?php echo $ball_value; ?></span> -->
							</td>
						<?php
						}
						?>

						<td class="text-center nationcard"><?php echo $over_score; ?></td>
						<td class="text-center nationcard"><?php echo $total_score; ?>/<?php echo $total_wicket; ?></td>
					</tr>
				<?php
				}
				?>
			</table>
		</div>
	</div>
	<?php
} else if ($casino_type == "superover") {


	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	if (mysqli_num_rows($get_casino_result) <= 0) {
	?>
		<div class="mb-1 text-center mt-3">
			Result not available
		</div>
	<?php
		exit();
	}
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$data_cards = $fetch_get_casino_result['data'];
	$cards = json_decode($cards);
	$data_cards = json_decode($data_cards);
	$result_array = $data_cards->t1;



	$data_cards = $result_array->score;

	$winner_name = "";
	if ($result_status == 1) {
		$winner_name = "ENG";
	} else if ($result_status == 2) {
		$winner_name = "RSA";
	} else {
		$winner_name = "TIE";
	}

	$ball_0_1 = "";
	$ball_0_2 = "";
	$ball_0_3 = "";
	$ball_0_4 = "";
	$ball_0_5 = "";
	$ball_0_6 = "";
	$ball_0_run_over = "";
	$ball_0_score = "";


	$ball_1_1 = "";
	$ball_1_2 = "";
	$ball_1_3 = "";
	$ball_1_4 = "";
	$ball_1_5 = "";
	$ball_1_6 = "";
	$ball_1_run_over = "";
	$ball_1_score = "";

	$team_1_score = 0;
	$team_1_wicket = 0;
	$team_2_score = 0;
	$team_2_wicket = 0;

	$ball_new = 1;
	$all_scorebaord = array();
	foreach ($data_cards as $cards_data) {
		$nation = $cards_data->nation;
		if (!isset($nation)) {
			$nation = $cards_data->nat;
		}
		if (!array_key_exists($nation, $all_scorebaord)) {
			$ball_new = 1;
		} else {
			$ball_new++;
		}

		$run  = $cards_data->run;
		$ball1 = "0_" . $ball_new;
		$all_scorebaord[$nation][$ball1]['over'] = $run;
		$ball = "0." . $ball_new;
		/* $ball  = $cards_data->ball; */
		$wkt  = $cards_data->wkt;
		if ($nation == "ENG") {
			$team_1_score = $team_1_score + $run;
			if ($ball == "0.1") {
				$ball_0_1 = $run;
				if ($wkt == 1) {
					$ball_0_1 = "ww";
					$team_1_wicket++;
				}
			} else if ($ball == "0.2") {
				$ball_0_2 = $run;
				if ($wkt == 1) {
					$ball_0_2 = "ww";
					$team_1_wicket++;
				}
			} else if ($ball == "0.3") {
				$ball_0_3 = $run;
				if ($wkt == 1) {
					$ball_0_3 = "ww";
					$team_1_wicket++;
				}
			} else if ($ball == "0.4") {
				$ball_0_4 = $run;
				if ($wkt == 1) {
					$ball_0_4 = "ww";
					$team_1_wicket++;
				}
			} else if ($ball == "0.5") {
				$ball_0_5 = $run;
				if ($wkt == 1) {
					$ball_0_5 = "ww";
					$team_1_wicket++;
				}
			} else if ($ball == "0.6") {
				$ball_0_6 = $run;
				if ($wkt == 1) {
					$ball_0_6 = "ww";
					$team_1_wicket++;
				}
			}
		} else {
			$team_2_score = $team_2_score + $run;
			if ($ball == "0.1") {
				$ball_1_1 = $run;
				if ($wkt == 1) {
					$ball_1_1 = "ww";
					$team_2_wicket++;
				}
			} else if ($ball == "0.2") {
				$ball_1_2 = $run;
				if ($wkt == 1) {
					$ball_1_2 = "ww";
					$team_2_wicket++;
				}
			} else if ($ball == "0.3") {
				$ball_1_3 = $run;
				if ($wkt == 1) {
					$ball_1_3 = "ww";
					$team_2_wicket++;
				}
			} else if ($ball == "0.4") {
				$ball_1_4 = $run;
				if ($wkt == 1) {
					$ball_1_4 = "ww";
					$team_2_wicket++;
				}
			} else if ($ball == "0.5") {
				$ball_1_5 = $run;
				if ($wkt == 1) {
					$ball_1_5 = "ww";
					$team_2_wicket++;
				}
			} else if ($ball == "0.6") {
				$ball_1_6 = $run;
				if ($wkt == 1) {
					$ball_1_6 = "ww";
					$team_2_wicket++;
				}
			}
		}

		$ball_0_score = "$team_1_score/$team_1_wicket";
		$ball_1_score = "$team_2_score/$team_2_wicket";
		$ball_0_run_over = "$team_1_score";
		$ball_1_run_over = "$team_2_score";
	}
	?>

<style>
		.market-title1 {
    background-color: var(--theme1-bg);
    color: #ffffff;
     padding: 10px; 
    /* font-size: 13px; */
    font-weight: bold;
    /* display: flex
; */
    flex-wrap: wrap;
		}
		.text-success1{
			color: #fdcf13 !important;
		}
	</style>

	<div class="mb-1 text-right mt-3 market-title1">
		Winner:
		<span class="text-success1"><?php echo $winner_name; ?></span>

		<?php echo $desc_remakrs; ?>
	</div>

	<div>
		<div class="table-responsive">
			<div class="market-title1">First Inning</div>
			<table class="table table-bordered">
				<tr>
					<th class="text-center"><b>ENG</b></th>
					<th class="text-center"><b>1</b></th>
					<th class="text-center"><b>2</b></th>
					<th class="text-center"><b>3</b></th>
					<th class="text-center"><b>4</b></th>
					<th class="text-center"><b>5</b></th>
					<th class="text-center"><b>6</b></th>
					<th class="text-center"><b>Run/Over</b></th>
					<th class="text-center"><b>Score</b></th>
				</tr>
				<tr>
					<td class="text-center">Over 1</td>
					<td class="text-center"><span class="<? echo $ball_0_1 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_0_1; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_0_2 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_0_2; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_0_3 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_0_3; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_0_4 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_0_4; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_0_5 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_0_5; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_0_6 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_0_6; ?></span></td>
					<td class="text-center nationcard"><?php echo $ball_0_run_over; ?></td>
					<td class="text-center nationcard"><?php echo $ball_0_score; ?></td>
				</tr>
			</table>
		</div>
		<div class="table-responsive mt-3">
			<div class="market-title1">Second Inning</div>
			<table class="table table-bordered">
				<tr>
					<th class="text-center"><b>RSA</b></th>
					<th class="text-center"><b>1</b></th>
					<th class="text-center"><b>2</b></th>
					<th class="text-center"><b>3</b></th>
					<th class="text-center"><b>4</b></th>
					<th class="text-center"><b>5</b></th>
					<th class="text-center"><b>6</b></th>
					<th class="text-center"><b>Run/Over</b></th>
					<th class="text-center"><b>Score</b></th>
				</tr>
				<tr>
					<td class="text-center">Over 1</td>
					<td class="text-center"><span class="<? echo $ball_1_1 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_1_1; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_1_2 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_1_2; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_1_3 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_1_3; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_1_4 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_1_4; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_1_5 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_1_5; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_1_6 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_1_6; ?></span></td>
					<td class="text-center nationcard"><?php echo $ball_1_run_over; ?></td>
					<td class="text-center nationcard"><?php echo $ball_1_score; ?></td>
				</tr>
			</table>
		</div>
	</div>
	<?php
} else if ($casino_type == "superover3") {


	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	if (mysqli_num_rows($get_casino_result) <= 0) {
	?>
		<div class="mb-1 text-center mt-3">
			Result not available
		</div>
	<?php
		exit();
	}
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$data_cards = $fetch_get_casino_result['data'];
	$cards = json_decode($cards);
	$data_cards = json_decode($data_cards);
	$result_array = $data_cards->t1;



	$data_cards = $result_array->score;

	$winner_name = "";
	if ($result_status == 1) {
		$winner_name = "IND";
	} else if ($result_status == 2) {
		$winner_name = "AUS";
	} else {
		$winner_name = "TIE";
	}

	$ball_0_1 = "";
	$ball_0_2 = "";
	$ball_0_3 = "";
	$ball_0_4 = "";
	$ball_0_5 = "";
	$ball_0_6 = "";
	$ball_0_run_over = "";
	$ball_0_score = "";


	$ball_1_1 = "";
	$ball_1_2 = "";
	$ball_1_3 = "";
	$ball_1_4 = "";
	$ball_1_5 = "";
	$ball_1_6 = "";
	$ball_1_run_over = "";
	$ball_1_score = "";

	$team_1_score = 0;
	$team_1_wicket = 0;
	$team_2_score = 0;
	$team_2_wicket = 0;

	$ball_new = 1;
	$all_scorebaord = array();
	foreach ($data_cards as $cards_data) {
		$nation = $cards_data->nation;
		if (!isset($nation)) {
			$nation = $cards_data->nat;
		}
		if (!array_key_exists($nation, $all_scorebaord)) {
			$ball_new = 1;
		} else {
			$ball_new++;
		}

		$run  = $cards_data->run;
		$ball1 = "0_" . $ball_new;
		$all_scorebaord[$nation][$ball1]['over'] = $run;
		$ball = "0." . $ball_new;
		/* $ball  = $cards_data->ball; */
		$wkt  = $cards_data->wkt;
		if ($nation == "IND") {
			$team_1_score = $team_1_score + $run;
			if ($ball == "0.1") {
				$ball_0_1 = $run;
				if ($wkt == 1) {
					$ball_0_1 = "ww";
					$team_1_wicket++;
				}
			} else if ($ball == "0.2") {
				$ball_0_2 = $run;
				if ($wkt == 1) {
					$ball_0_2 = "ww";
					$team_1_wicket++;
				}
			} else if ($ball == "0.3") {
				$ball_0_3 = $run;
				if ($wkt == 1) {
					$ball_0_3 = "ww";
					$team_1_wicket++;
				}
			} else if ($ball == "0.4") {
				$ball_0_4 = $run;
				if ($wkt == 1) {
					$ball_0_4 = "ww";
					$team_1_wicket++;
				}
			} else if ($ball == "0.5") {
				$ball_0_5 = $run;
				if ($wkt == 1) {
					$ball_0_5 = "ww";
					$team_1_wicket++;
				}
			} else if ($ball == "0.6") {
				$ball_0_6 = $run;
				if ($wkt == 1) {
					$ball_0_6 = "ww";
					$team_1_wicket++;
				}
			}
		} else {
			$team_2_score = $team_2_score + $run;
			if ($ball == "0.1") {
				$ball_1_1 = $run;
				if ($wkt == 1) {
					$ball_1_1 = "ww";
					$team_2_wicket++;
				}
			} else if ($ball == "0.2") {
				$ball_1_2 = $run;
				if ($wkt == 1) {
					$ball_1_2 = "ww";
					$team_2_wicket++;
				}
			} else if ($ball == "0.3") {
				$ball_1_3 = $run;
				if ($wkt == 1) {
					$ball_1_3 = "ww";
					$team_2_wicket++;
				}
			} else if ($ball == "0.4") {
				$ball_1_4 = $run;
				if ($wkt == 1) {
					$ball_1_4 = "ww";
					$team_2_wicket++;
				}
			} else if ($ball == "0.5") {
				$ball_1_5 = $run;
				if ($wkt == 1) {
					$ball_1_5 = "ww";
					$team_2_wicket++;
				}
			} else if ($ball == "0.6") {
				$ball_1_6 = $run;
				if ($wkt == 1) {
					$ball_1_6 = "ww";
					$team_2_wicket++;
				}
			}
		}

		$ball_0_score = "$team_1_score/$team_1_wicket";
		$ball_1_score = "$team_2_score/$team_2_wicket";
		$ball_0_run_over = "$team_1_score";
		$ball_1_run_over = "$team_2_score";
	}
	?>
	<style>
		.market-title1 {
    background-color: #AE4600;
    color: #ffffff;
     padding: 10px; 
    /* font-size: 13px; */
    font-weight: bold;
    /* display: flex
; */
    flex-wrap: wrap;
		}
	</style>
	<div class="mb-1 text-right mt-3 market-title1">
		Winner:
		<span class="text-fancy"><?php echo $winner_name; ?></span>

		<?php echo $desc_remakrs; ?>
	</div>

	<div>
		<div class="table-responsive">
			<div class="market-title">First Inning</div>
			<table class="table table-bordered">
				<tr>
					<th class="text-center"><b>IND</b></th>
					<th class="text-center"><b>1</b></th>
					<th class="text-center"><b>2</b></th>
					<th class="text-center"><b>3</b></th>
					<th class="text-center"><b>4</b></th>
					<!-- <th class="text-center"><b>5</b></th>
					<th class="text-center"><b>6</b></th> -->
					<th class="text-center"><b>Run/Over</b></th>
					<th class="text-center"><b>Score</b></th>
				</tr>
				<tr>
					<td class="text-center">Over 1</td>
					<td class="text-center"><span class="<? echo $ball_0_1 === 'ww' ? 'text-danger' : '' ?>"><?php echo $ball_0_1; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_0_2 === 'ww' ? 'text-danger' : '' ?>"><?php echo $ball_0_2; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_0_3 === 'ww' ? 'text-danger' : '' ?>"><?php echo $ball_0_3; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_0_4 === 'ww' ? 'text-danger' : '' ?>"><?php echo $ball_0_4; ?></span></td>
					<!-- <td class="text-center"><span class="text-danger"><?php echo $ball_0_5; ?></span></td>
					<td class="text-center"><span class="text-danger"><?php echo $ball_0_6; ?></span></td> -->
					<td class="text-center nationcard"><?php echo $ball_0_run_over; ?></td>
					<td class="text-center nationcard"><?php echo $ball_0_score; ?></td>
				</tr>
			</table>
		</div>
		<div class="table-responsive mt-3">
			<div class="market-title">Second Inning</div>
			<table class="table table-bordered">
				<tr>
					<th class="text-center"><b>AUS</b></th>
					<th class="text-center"><b>1</b></th>
					<th class="text-center"><b>2</b></th>
					<th class="text-center"><b>3</b></th>
					<th class="text-center"><b>4</b></th>
					<!-- <th class="text-center"><b>5</b></th>
					<th class="text-center"><b>6</b></th> -->
					<th class="text-center"><b>Run/Over</b></th>
					<th class="text-center"><b>Score</b></th>
				</tr>
				<tr>
					<td class="text-center">Over 1</td>
					<td class="text-center"><span class="<? echo $ball_1_1 === 'ww' ? 'text-danger' : '' ?>"><?php echo $ball_1_1; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_1_2 === 'ww' ? 'text-danger' : '' ?>"><?php echo $ball_1_2; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_1_3 === 'ww' ? 'text-danger' : '' ?>"><?php echo $ball_1_3; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_1_4 === 'ww' ? 'text-danger' : '' ?>"><?php echo $ball_1_4; ?></span></td>
					<!-- <td class="text-center"><span class="text-danger"><?php echo $ball_1_5; ?></span></td>
					<td class="text-center"><span class="text-danger"><?php echo $ball_1_6; ?></span></td> -->
					<td class="text-center nationcard"><?php echo $ball_1_run_over; ?></td>
					<td class="text-center nationcard"><?php echo $ball_1_score; ?></td>
				</tr>
			</table>
		</div>
	</div>
	<?php
} else if ($casino_type == "superover2") {


	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	if (mysqli_num_rows($get_casino_result) <= 0) {
	?>
		<div class="mb-1 text-center mt-3">
			Result not available
		</div>
	<?php
		exit();
	}
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$data_cards = $fetch_get_casino_result['data'];
	$cards = json_decode($cards);
	$data_cards = json_decode($data_cards);
	$result_array = $data_cards->t1;



	$data_cards = $result_array->score;

	$winner_name = "";
	if ($result_status == 1) {
		$winner_name = "IND";
	} else if ($result_status == 2) {
		$winner_name = "ENG";
	} else {
		$winner_name = "TIE";
	}

	$ball_0_1 = "";
	$ball_0_2 = "";
	$ball_0_3 = "";
	$ball_0_4 = "";
	$ball_0_5 = "";
	$ball_0_6 = "";
	$ball_0_run_over = "";
	$ball_0_score = "";


	$ball_1_1 = "";
	$ball_1_2 = "";
	$ball_1_3 = "";
	$ball_1_4 = "";
	$ball_1_5 = "";
	$ball_1_6 = "";
	$ball_1_run_over = "";
	$ball_1_score = "";

	$team_1_score = 0;
	$team_1_wicket = 0;
	$team_2_score = 0;
	$team_2_wicket = 0;

	$ball_new = 1;
	$all_scorebaord = array();
	foreach ($data_cards as $cards_data) {
		$nation = $cards_data->nation;
		if (!isset($nation)) {
			$nation = $cards_data->nat;
		}
		if (!array_key_exists($nation, $all_scorebaord)) {
			$ball_new = 1;
		} else {
			$ball_new++;
		}

		$run  = $cards_data->run;
		$ball1 = "0_" . $ball_new;
		$all_scorebaord[$nation][$ball1]['over'] = $run;
		$ball = "0." . $ball_new;
		/* $ball  = $cards_data->ball; */
		$wkt  = $cards_data->wkt;
		if ($nation == "IND") {
			$team_1_score = $team_1_score + $run;
			if ($ball == "0.1") {
				$ball_0_1 = $run;
				if ($wkt == 1) {
					$ball_0_1 = "ww";
					$team_1_wicket++;
				}
			} else if ($ball == "0.2") {
				$ball_0_2 = $run;
				if ($wkt == 1) {
					$ball_0_2 = "ww";
					$team_1_wicket++;
				}
			} else if ($ball == "0.3") {
				$ball_0_3 = $run;
				if ($wkt == 1) {
					$ball_0_3 = "ww";
					$team_1_wicket++;
				}
			} else if ($ball == "0.4") {
				$ball_0_4 = $run;
				if ($wkt == 1) {
					$ball_0_4 = "ww";
					$team_1_wicket++;
				}
			} else if ($ball == "0.5") {
				$ball_0_5 = $run;
				if ($wkt == 1) {
					$ball_0_5 = "ww";
					$team_1_wicket++;
				}
			} else if ($ball == "0.6") {
				$ball_0_6 = $run;
				if ($wkt == 1) {
					$ball_0_6 = "ww";
					$team_1_wicket++;
				}
			}
		} else {
			$team_2_score = $team_2_score + $run;
			if ($ball == "0.1") {
				$ball_1_1 = $run;
				if ($wkt == 1) {
					$ball_1_1 = "ww";
					$team_2_wicket++;
				}
			} else if ($ball == "0.2") {
				$ball_1_2 = $run;
				if ($wkt == 1) {
					$ball_1_2 = "ww";
					$team_2_wicket++;
				}
			} else if ($ball == "0.3") {
				$ball_1_3 = $run;
				if ($wkt == 1) {
					$ball_1_3 = "ww";
					$team_2_wicket++;
				}
			} else if ($ball == "0.4") {
				$ball_1_4 = $run;
				if ($wkt == 1) {
					$ball_1_4 = "ww";
					$team_2_wicket++;
				}
			} else if ($ball == "0.5") {
				$ball_1_5 = $run;
				if ($wkt == 1) {
					$ball_1_5 = "ww";
					$team_2_wicket++;
				}
			} else if ($ball == "0.6") {
				$ball_1_6 = $run;
				if ($wkt == 1) {
					$ball_1_6 = "ww";
					$team_2_wicket++;
				}
			}
		}

		$ball_0_score = "$team_1_score/$team_1_wicket";
		$ball_1_score = "$team_2_score/$team_2_wicket";
		$ball_0_run_over = "$team_1_score";
		$ball_1_run_over = "$team_2_score";
	}
	?>
	<style>
		.text-fancy{
			color: #fdcf13;
		}
	</style>
	<div class="mb-1 text-right mt-3 market-title">
		Winner:
		<span class="text-fancy"><?php echo $winner_name; ?></span>

		<?php echo $desc_remakrs; ?>
	</div>

	<div>
		<div class="table-responsive">
			<div class="market-title">First Inning</div>
			<table class="table table-bordered">
				<tr>
					<th class="text-center"><b>IND</b></th>
					<th class="text-center"><b>1</b></th>
					<th class="text-center"><b>2</b></th>
					<th class="text-center"><b>3</b></th>
					<th class="text-center"><b>4</b></th>
					<th class="text-center"><b>5</b></th>
					<th class="text-center"><b>6</b></th>
					<th class="text-center"><b>Run/Over</b></th>
					<th class="text-center"><b>Score</b></th>
				</tr>
				<tr>
					<td class="text-center">Over 1</td>
					<td class="text-center"><span class="<? echo $ball_0_1 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_0_1; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_0_2 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_0_2; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_0_3 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_0_3; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_0_4 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_0_4; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_0_5 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_0_5; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_0_6 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_0_6; ?></span></td>
					<td class="text-center nationcard"><?php echo $ball_0_run_over; ?></td>
					<td class="text-center nationcard"><?php echo $ball_0_score; ?></td>
				</tr>
			</table>
		</div>
		<div class="table-responsive mt-3">
			<div class="market-title">Second Inning</div>
			<table class="table table-bordered">
				<tr>
					<th class="text-center"><b>ENG</b></th>
					<th class="text-center"><b>1</b></th>
					<th class="text-center"><b>2</b></th>
					<th class="text-center"><b>3</b></th>
					<th class="text-center"><b>4</b></th>
					<th class="text-center"><b>5</b></th>
					<th class="text-center"><b>6</b></th>
					<th class="text-center"><b>Run/Over</b></th>
					<th class="text-center"><b>Score</b></th>
				</tr>
				<tr>
					<td class="text-center">Over 1</td>
					<td class="text-center"><span class="<? echo $ball_1_1 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_1_1; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_1_2 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_1_2; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_1_3 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_1_3; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_1_4 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_1_4; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_1_5 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_1_5; ?></span></td>
					<td class="text-center"><span class="<? echo $ball_1_6 === 'ww' ? 'text-danger' : ''?>"><?php echo $ball_1_6; ?></span></td>
					<td class="text-center nationcard"><?php echo $ball_1_run_over; ?></td>
					<td class="text-center nationcard"><?php echo $ball_1_score; ?></td>
				</tr>
			</table>
		</div>
	</div>
<?php
} else if ($casino_type == "race20") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$rdesc_array = explode("#",$desc_remakrs);
	$cards = json_decode($cards);

	$array_hh = array();
	$array_dd = array();
	$array_cc = array();
	$array_ss = array();

	foreach ($cards as $card_img) {
		if ($card_img == 1) {
			continue;
		}


		$card_data = $cards_result->$card_img;
		$card_type = $card_data['type'];
		if ($card_type == "diamond") {
			$array_hh[] = WEB_URL . "/storage/front/img/cards_new/" . $card_img . ".png";
		} else if ($card_type == "spade") {
			$array_dd[] = WEB_URL . "/storage/front/img/cards_new/" . $card_img . ".png";
		} else if ($card_type == "club") {
			$array_cc[] = WEB_URL . "/storage/front/img/cards_new/" . $card_img . ".png";
		} else if ($card_type == "heart") {
			$array_ss[] = WEB_URL . "/storage/front/img/cards_new/" . $card_img . ".png";
		}
	}



?>
	<div class="race-modal">
		<div class="race-result-box">


			<div class="mb-1 p-r">
				<span class="result-image"><img src="../storage/front/img/cards/spade_race.png"></span>

				<?php
				foreach ($array_hh as  $key => $hh_img) {
				?>
					<span class="result-image"><img src="<?php echo $hh_img; ?>"></span>
				<?php
				if(count($array_hh) <=4 && ($key+1) == count($array_hh) ){
					echo "<span class='result-image'><img src='../storage/front/img/cards/KHH.png'></span>";
				}
				}
				?>

				<?php
				if ($result_status == 1) {
				?>
					<span class="result-image k-image"><img src="../storage/front/img/cards/KHH.png"></span>
					<div class="winner-label"><i class="fas fa-trophy mr-2"></i></div>
				<?php
				}
				?>
			</div>
			<div class="mb-1 p-r">
				<span class="result-image"><img src="../storage/front/img/cards/heart_race.png"></span>


				<?php
				foreach ($array_dd as  $key => $dd_img) {
				?>
					<span class="result-image"><img src="<?php echo $dd_img; ?>"></span>
				<?php
				if(count($array_dd) <=4 && ($key+1) == count($array_dd)){
					echo "<span class='result-image'><img src='../storage/front/img/cards/KDD.png'></span>";
				}
				}
				?>


				<?php
				if ($result_status == 2) {
				?>
					<span class="result-image k-image"><img src="../storage/front/img/cards/KDD.png"></span>
					<div class="winner-label"><i class="fas fa-trophy mr-2"></i></div>
				<?php
				}
				?>

			</div>
			<div class="mb-1 p-r">
				<span class="result-image"><img src="../storage/front/img/cards/club_race.png"></span>

				<?php
				foreach ($array_cc as  $key => $cc_img) {
				?>
					<span class="result-image "><img src="<?php echo $cc_img; ?>"></span>
				<?php
				if(count($array_cc) <=4 && ($key+1) == count($array_cc)){
					echo "<span class='result-image'><img src='../storage/front/img/cards/KCC.png'></span>";
				}
				}
				?>

				<?php
				if ($result_status == 3) {
				?>
					<span class="result-image k-image"><img src="../storage/front/img/cards_new/KCC.png"></span>
					<div class="winner-label"><i class="fas fa-trophy mr-2"></i></div>
				<?php
				}
				?>
			</div>
			<div class="mb-1 p-r">
				<span class="result-image"><img src="../storage/front/img/cards/diamond_race.png"></span>

				<?php
				foreach ($array_ss as  $key => $ss_img) {
				?>
					<span class="result-image"><img src="<?php echo $ss_img; ?>"></span>
				<?php
				if(count($array_ss) <=4 && ($key+1) == count($array_ss)){
					echo "<span class='result-image'><img src='../storage/front/img/cards/KSS.png'></span>";
				}
				}
				?>

				<?php
				if ($result_status == 4) {
				?>
					<span class="result-image k-image"><img src="../storage/front/img/cards/KSS.png"></span>
					<div class="winner-label"><i class="fas fa-trophy mr-2"></i></div>
				<?php
				}
				?>
			</div>

			<div class="video-winner-text">
				<div>W</div>
				<div>I</div>
				<div>N</div>
				<div>N</div>
				<div>E</div>
				<div>R</div>
			</div>
		</div>

		<!-- <div class="row mt-3">
			<div class="col-12 text-center">
				<div class="winner-board">
					<div class="mb-1"><span class="text-success">Result:</span> <span><?php echo $desc_remakrs; ?></span>
					</div>
				</div>
			</div>
		</div> -->

		<div class="row row5">
		<div class="col-12 text-center"
			style="flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px">
			<div><span style="color:gray">Winner  </span>
				<? echo $rdesc_array[0]; ?>
			</div>
			<div><span style="color:gray">Points  </span>
				<? echo $rdesc_array[1]; ?>
			</div>
			
			<div><span style="color:gray">Cards  </span>
				<? echo $rdesc_array[2]; ?>
			</div>
		</div>

	</div>

	<?php
} else if ($casino_type == "goal") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$rdesc_array = explode("#", $desc_remakrs);



	$goal_by = $rdesc_array[0];
	$goal_method = $rdesc_array[1];
	?>
		<div class="row">
			<div class="col-12 text-center">
				<div class="goal-result goalresult">
					<img data-v-73ba2763="" src="/storage/img/soccer-ball.png" style="width: 130px;"> <span
						data-v-73ba2763="">
						<? echo $goal_method . " by " . $goal_by; ?>
					</span>
				</div>
			</div>
		</div>

	<?php
} else if ($casino_type == "ballbyball" || $casino_type == "lucky15") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];

	?>
		<div class="row">
			<div class="col-12 text-center">
				<div class="result-image">
					<img data-v-73ba2763="" src="/storage/img/ball-blank.png" style="width: 130px;"> <span
						data-v-73ba2763="">
						<? echo strtoupper(strtolower($desc_remakrs)) ?>
					</span>
				</div>
			</div>
		</div>

	<?php
}
else if ($casino_type == "roulette13" || $casino_type == "roulette12" || $casino_type == "roulette11") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$cards = json_decode($cards);

		$card_1  = WEB_URL . "/storage/front/img/cards_new/roulette/". $cards[0] . ".png";


?>
	<div class="row">
		<div class="col-12 text-center">
			<div class="result-image"><img style="width: 75px;" src="<? echo $card_1;?>" /></div>
		</div>
	</div>


	<!-- <div class="row mt-3">
    <div class="col-12 text-center">
        <div class="winner-board">
            <div class="mb-1"><span class="text-success">Result:</span> <span><?php echo $result_status_text; ?> ||
                    <?php echo $red_black; ?> || <?php echo $odd_even; ?> || Card
                    <?php echo $card_1_value; ?><?php echo $line_result; ?></span></div>
        </div>
    </div>
</div> -->


<?php
}
else if ($casino_type == "ourroullete") {
	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$cards = json_decode($cards);

		$card_1  = WEB_URL . "/storage/front/img/cards_new/roulette/". $cards[0] . ".png";


?>
	<div class="row">
		<div class="col-12 text-center">
			<div class="result-image"><img style="width: 75px;" src="<? echo $card_1;?>" /></div>
		</div>
	</div>


	<!-- <div class="row mt-3">
    <div class="col-12 text-center">
        <div class="winner-board">
            <div class="mb-1"><span class="text-success">Result:</span> <span><?php echo $result_status_text; ?> ||
                    <?php echo $red_black; ?> || <?php echo $odd_even; ?> || Card
                    <?php echo $card_1_value; ?><?php echo $line_result; ?></span></div>
        </div>
    </div>
</div> -->


<?php
}
else if ($casino_type == "poison20" || $casino_type == "poison") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$result_status = $fetch_get_casino_result['result_status'];
	$desc_remakrs = $fetch_get_casino_result['desc_remakrs'];
	$rdesc_array = explode("#", $desc_remakrs);
	$cards = json_decode($cards);

	$poison = "";
	$player_a = "";
	$player_b = "";
	foreach ($cards as $key => $card) {
		if ($card != "1") {
			if ($key == "0") {
				$poison = '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
			} else {
				if ($key % 2 == 0) {
					$player_b .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
				} else {
					$player_a .= '<img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> ';
				}
			}
		}
	}
?>
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Poison</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			<div class="result-image">
				<? echo $poison; ?>
			</div>
		</div>

	</div>
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player A</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
			<?php
			if ($result_status == "1") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		<div class="result-image">
				<? echo $player_a; ?>
			</div>
		
		</div>

	</div>
	
	<div class="row flex-column align-items-center">
		<div class="col-12">
			<h4 class="m-0 text-center">Player B</h4>
		</div>
		<div class="col-12 d-flex flex-row justify-content-center gap-2 mt-1" style="align-items: center;">
		<?php
			if ($result_status == "2") {
			?>
			<div class="winner-label">
				<i class="fas fa-trophy text-success"></i>
			</div>
			<?php
			}
			?>	
		<div class="result-image">
				<? echo $player_b; ?>
			</div>
			
		</div>

	</div>


	<div class="row row5 oepn-teen-result">
		<div class="col-12 text-center flex-column text-center"
			style="display: -webkit-flex;flex-wrap: wrap;padding: 6px;box-shadow: 0 0 4px -1px;margin-top:10px;">

			<div><span style="color:gray">Winner: </span>
				<? echo $rdesc_array[0]; ?>
			</div>
			<div><span style="color:gray">Odd/Even: </span>
				<? echo $rdesc_array[1]; ?>
			</div>
			<div><span style="color:gray">Color: </span>
				<? echo $rdesc_array[2]; ?>
			</div>
			<div><span style="color:gray">Suit: </span>
				<? echo $rdesc_array[3]; ?>
			</div>

		</div>

	</div>

<?php
}
 else if ($casino_type == "teenunique") {

	$get_casino_result = $conn->query("select * from twenty_teenpatti_result where game_type='$casino_type' and event_id='$event_id'");
	$fetch_get_casino_result = mysqli_fetch_assoc($get_casino_result);
	$cards = $fetch_get_casino_result['cards'];
	$cards = json_decode($cards);
	
	$poison = "";
	foreach ($cards as $key => $card) {
		if ($card != "1") {
			$index=$key+1;
			$poison .= '<div class="unique-teen20-cardpopup"><img src="' . WEB_URL . '/storage/front/img/s'.$index.'-icon.png" alt=""><img src="' . WEB_URL . '/storage/front/img/cards_new/' . $card . '.png"> </div>';
		}
	}
	/* $carda1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[0] . ".png";
	$carda2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[2] . ".png";
	$carda3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[4] . ".png";

	$cardb1  = WEB_URL . "/storage/front/img/cards_new/" . $cards[1] . ".png";
	$cardb2  = WEB_URL . "/storage/front/img/cards_new/" . $cards[3] . ".png";
	$cardb3  = WEB_URL . "/storage/front/img/cards_new/" . $cards[5] . ".png"; */
?>
<div class="d-flex justify-content-center">
	<div class="d-flex justify-content-between gap-3">
		<!-- <div class="d-flex flex-column text-center">
			<div class="result-image d-flex align-items-center  gap-2"> -->
				<? echo $poison; ?>
			<!-- </div>

		</div> -->
		</div>
	</div>
	<style>
		.unique-teen20-cardpopup {
    /* width: 10%; */
    text-align: center;
    margin: 5px 5px;
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
    align-items: center;
    gap: 5px;
}
.unique-teen20-cardpopup img:first-child {
    width: 25px;
}
.unique-teen20-cardpopup img {
    width: 40px;
    height: auto;
    cursor: pointer;
    /* border: 3px solid; */
}
	</style>
	

	<?php
}
	
	

	$get_account_data = $conn->query("select * from bet_teen_details where event_id=$event_id and user_id=$user_id ");
	// echo "select * from bet_teen_details where event_id=$event_id and user_id=$user_id and bet_status='1' ";
	if ($get_account_data->num_rows > 0) {
	?>
		<div class="container-fluid container-fluid-5" style="margin-top: 10px;">
			<div class="row row5">
				<div class="col-12 text-center">
					<div id="match_all" role="radiogroup" tabindex="-1">
						<div class="custom-control custom-control-inline custom-radio float-left">
							<input id="all" type="radio" name="match_all" autocomplete="off" checked='checked' value="0" class="custom-control-input" checked>
							<label for="all" class="custom-control-label"><span>All</span></label>
						</div>
						<div class="custom-control custom-control-inline custom-radio float-left">
							<input id="matched_back" type="radio" name="match_all" autocomplete="off" value="Back" class="custom-control-input">
							<label for="matched_back" class="custom-control-label"><span>Back</span></label>
						</div>
						<div class="custom-control custom-control-inline custom-radio float-left">
							<input id="matched_lay" type="radio" name="match_all" autocomplete="off" value="Lay" class="custom-control-input">
							<label for="matched_lay" class="custom-control-label"><span>Lay</span></label>
						</div>
						<div class="custom-control custom-control-inline custom-radio float-left">
							<input id="deleteed" type="radio" name="match_all" autocomplete="off" value="2" class="custom-control-input">
							<label for="deleteed" class="custom-control-label"><span>Deleted</span></label>
						</div>
						<div class="custom-control-inline float-right">
							<h5>Total Bets: <span class="mr-2 total_bet">0</span> Total Win: <span class="text-success total_pl">0</span></h5>
						</div>
					</div>
				</div>
			</div>
			<div class="row row5">
				<div class="col-12">
					<input type="hidden" name="bet_time" id="bet_time" />
					<div class="table-responsive">
						<table role="table" aria-busy="false" aria-colcount="8" class="table b-table table-bordered" id="__BVID__886">
							<!---->
							<!---->
							<thead role="rowgroup" class="">
								<!---->
								<tr role="row" class="">
									<!-- <th aria-colindex="1" class="text-right">No</th> -->
									<th aria-colindex="2" class="text-center">Nation</th>
									<!-- <th aria-colindex="3" class="text-center">Side</th> -->
									<th aria-colindex="4" class="text-right">Rate</th>
									<th aria-colindex="5" class="text-right">Amount</th>
									<th aria-colindex="6" class="text-right">Win/Loss</th>
									<th aria-colindex="7" class="text-center">Date</th>
									<th aria-colindex="8" class="text-center">Ip Address</th>
									<th aria-colindex="8" class="text-center">Browser Details</th>
									<th aria-colindex="8" class="text-center"><input type="checkbox" id="select_all"></th>
								</tr>
							</thead>
							<tbody>
						<?php
					}
					while ($fetch_bet_teen_details = mysqli_fetch_assoc($get_account_data)) {

						$bet_id = $fetch_bet_teen_details['bet_id'];
						$event_type = $fetch_bet_teen_details['event_type'];
						$event_id = $fetch_bet_teen_details['event_id'];
						$user_id = $fetch_bet_teen_details['user_id'];
						$event_name = $fetch_bet_teen_details['event_name'];
						$market_name = $fetch_bet_teen_details['market_name'];
						$bet_type = $fetch_bet_teen_details['bet_type'];
						$bet_odds = $fetch_bet_teen_details['bet_odds'];
						$bet_stack = $fetch_bet_teen_details['bet_stack'];
						$bet_result = $fetch_bet_teen_details['bet_result'];
						$bet_time = $fetch_bet_teen_details['bet_time'];
						$bet_status = $fetch_bet_teen_details['bet_status'];
						$bet_user_agent = $fetch_bet_teen_details['bet_user_agent'];
						$bet_ip_address = $fetch_bet_teen_details['bet_ip_address'];



						if ($bet_type == "Yes" or $bet_type == "Back") {
							$tr_class = "back";
						} else {
							$tr_class = "lay";
						}

						if ($bet_result < 0) {
							$result_status = '<span class="text-danger">';
						} else {
							$result_status = '<span class="text-success">';
						}

						?>

								<tr class="bet_shows <?php echo $tr_class; ?>" data-type="<?php echo $bet_type; ?>" data-status="<?php echo $bet_status; ?>" data-bet_id="<? echo $bet_id; ?>">
									<!-- <td>
													<?php echo $sr_no; ?>
												</td> -->
									<td><?php echo $market_name; ?></td>
									<!-- <td><?php echo $bet_type; ?></td> -->
									<td><?php echo $bet_odds; ?></td>
									<td><?php echo $bet_stack; ?></td>
									<td><?php echo $result_status . " " . number_format($bet_result, 2); ?></span></td>
									<td><?php echo date("d-m-Y H:i:s", strtotime($bet_time)); ?></td>
									<td><?php echo $bet_ip_address; ?></td>
									<td>

										<a href="javascript:void(0);"
											data-toggle="tooltip"
											data-placement="top"
											style="color:#128412 !important; text-decoration: underline;"
											title="<?php echo htmlspecialchars($bet_user_agent); ?>">
											Detail
										</a>
									</td>
									<td class="text-right">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input bet-checkbox" id="pro_los_<?php echo $bet_id; ?>" data-wl="<?php echo $bet_result; ?>" data-amount="<?php echo $bet_stack; ?>"><label class="custom-control-label" for="pro_los_<?php echo $bet_id; ?>"></label>
										</div>
									</td>

								</tr>
							
						<?
					}
						?>
							</tbody>

						</table>
					</div>
				</div>
			</div>
		</div>
	


	<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
			
		});

		$('#select_all').click(function() {
			$('.bet-checkbox:visible').prop('checked', this.checked);
			calculateTotals();
		});

		$(document).on('change', '.bet-checkbox', function() {
			calculateTotals();
		});

		function calculateTotals() {

			var totalBets = 0;
			var totalWin = 0;
 var checkedBoxes = $('.bet-checkbox:checked:visible');

   if (checkedBoxes.length > 0) {
        // Sum only selected
        checkedBoxes.each(function() {
            totalBets++;
            totalWin += parseFloat($(this).data('wl'));
        });
    } else {
			$('.bet-checkbox:visible').each(function() {

				totalBets++;

				var winLoss = parseFloat($(this).data('wl'));
				totalWin += winLoss;

			});
}

			 if (totalWin < 0) {
       $('.total_pl').removeClass('text-success')
                       .addClass('text-danger');
    } else {
        $('.total_pl').removeClass('text-danger')
                       .addClass('text-success');
    }

			$('.total_bet').text(totalBets);
			 $('.total_pl').text(totalWin);
		}
	</script>

	<script>
		$(document).ready(function() {
			
			$('input[name="match_all"]').change(function() {

				var selected = $(this).val();

				if (selected == "0") { // All
					$('.bet_shows').show();
				} else if (selected == "2") { // Deleted
					$('.bet_shows').each(function() {
						if ($(this).data('status') == 2) {
							$(this).show();
						} else {
							$(this).hide();
						}
					});
				} else { // Back or Lay
					$('.bet_shows').each(function() {
						if ($(this).data('type') == selected) {
							$(this).show();
						} else {
							$(this).hide();
						}
					});
				}

				$('.bet-checkbox').prop('checked', false);
    			$('#select_all').prop('checked', false);
				calculateTotals();
			});
				  calculateTotals();
		});
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>