<?php
function login_auth_key($length_of_string) 
{ 
  
    // String of all alphanumeric character 
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
  
    // Shufle the $str_result and returns substring 
    // of specified length 
    return substr(str_shuffle($str_result),  
                       0, $length_of_string); 
} 
function old_insert_query($conn,$table_name,$data){
		
    $columns = implode(',',array_keys($data));
    
    $values  = implode("','",array_values($data));
    
    $sql = "INSERT INTO $table_name ($columns) VALUES ('$values')";
    $status = $conn->query($sql);
    if($status == true){
        return $conn->insert_id;
    }
    else{
        return 0;
    }
}

function check_variable_for_datatable($conn, $data)
{
	$return_data = array();
	foreach ($data as $key => $data_value) {
		if (is_array($data_value)) {
			$array_data = array();

			foreach ($data_value as $array_key => $array_data_value) {
				if (is_object($array_data_value)) {

					$array_array_data = array();

					foreach ($array_data_value as $array_array_key => $array_array_data_value) {
						$array_array_data_value = $array_array_data_value;
						$array_array_data[$array_array_key] = $array_array_data_value;
					}
					$array_data_value = $array_array_data;
				} else {
					$array_data_value = check_string_for_datatable($conn, $array_data_value);

				}

				$array_data[$array_key] = $array_data_value;

			}

			$data_value = $array_data;
		} else {
			$data_value = check_string_for_datatable($conn, $data_value);
		}

		$return_data[$key] = $data_value;
	}


	return $return_data;
}

function check_string_for_datatable($conn, $data_value)
{
	$data_value = $conn->real_escape_string($data_value);
	$data_value = str_replace("--", " 1!=1 ", $data_value);
	$data_value = str_replace(";", " 1!=1 ", $data_value);
	$data_value = str_replace("#", " 1!=1 ", $data_value);
	$data_value = str_replace("=", " 1!=1 ", $data_value);
	$data_value = str_replace("\\", " 1!=1 ", $data_value);
	$data_value = str_replace("equal", " 1!=1 ", $data_value);
	$data_value = str_replace("equals", " 1!=1 ", $data_value);
	$data_value = str_replace(" LIKE ", " 1!=1 ", $data_value);
	$data_value = str_replace(" like ", " 1!=1 ", $data_value);
	$data_value = str_replace(">", " 1!=1 ", $data_value);
	$data_value = str_replace("<", " 1!=1 ", $data_value);
	$data_value = str_replace("'", " 1!=1 ", $data_value);
	$data_value = str_replace("DROP", " 1!=1 ", $data_value);
	$data_value = str_replace("drop", " 1!=1 ", $data_value);
	$data_value = str_replace("EMPTY", " 1!=1 ", $data_value);
	$data_value = str_replace("empty", " 1!=1 ", $data_value);
	$data_value = str_replace(" UNION ", " 1!=1 ", $data_value);
	$data_value = str_replace(" union ", " 1!=1 ", $data_value);
	$data_value = str_replace("TRUNCATE", " 1!=1 ", $data_value);
	$data_value = str_replace("truncate", " 1!=1 ", $data_value);
	$data_value = str_replace(" OR ", " 1!=1 ", $data_value);
	$data_value = str_replace(" AND ", " 1!=1 ", $data_value);
	$data_value = str_replace(" and ", " 1!=1 ", $data_value);
	$data_value = str_replace("!= ", " 1!=1 ", $data_value);
	$data_value = str_replace("make_set", " 1!=1 ", $data_value);
	$data_value = str_replace("SELECT", "S 1!=1 ", $data_value);
	$data_value = str_replace("select", "S 1!=1 ", $data_value);
	$data_value = str_replace("DELETE", " 1!=1 ", $data_value);
	$data_value = str_replace("delete", " 1!=1 ", $data_value);
	$data_value = str_replace("UPDATE", " 1!=1 ", $data_value);
	$data_value = str_replace("update", " 1!=1 ", $data_value);
	$data_value = str_replace("INSERT", " 1!=1 ", $data_value);
	$data_value = str_replace("insert", " 1!=1 ", $data_value);
	$data_value = str_replace("SHOW", " 1!=1 ", $data_value);
	$data_value = str_replace("show", " 1!=1 ", $data_value);
	$data_value = str_replace("SCHEMA", " 1!=1 ", $data_value);
	$data_value = str_replace("schema", " 1!=1 ", $data_value);
	$data_value = str_replace("CAST(", " 1!=1 ", $data_value);
	$data_value = str_replace("cast(", " 1!=1 ", $data_value);
	$data_value = str_replace("CHAR(", " 1!=1 ", $data_value);
	$data_value = str_replace("char(", " 1!=1 ", $data_value);
	$data_value = str_replace("||", " 1!=1 ", $data_value);
	$data_value = str_replace("&&", " 1!=1 ", $data_value);
	$data_value = str_replace("NUMERIC", " 1!=1 ", $data_value);
	$data_value = str_replace("numeric", " 1!=1 ", $data_value);
	$data_value = str_replace("END", " 1!=1 ", $data_value);
	$data_value = str_replace("end", " 1!=1 ", $data_value);
	$data_value = str_replace("NULL", " 1!=1 ", $data_value);
	$data_value = str_replace("null", " 1!=1 ", $data_value);
	$data_value = str_replace("ELSE", " 1!=1 ", $data_value);
	$data_value = str_replace("else", " 1!=1 ", $data_value);
	$data_value = str_replace("IF ", " 1!=1 ", $data_value);
	$data_value = str_replace("if ", " 1!=1 ", $data_value);
	$data_value = str_replace("DUAL", " 1!=1 ", $data_value);
	$data_value = str_replace("dual", " 1!=1 ", $data_value);
	$data_value = str_replace("EXISTS", " 1!=1 ", $data_value);
	$data_value = str_replace("exists", " 1!=1 ", $data_value);
	$data_value = str_replace("CASE WHEN", " 1!=1 ", $data_value);
	$data_value = str_replace("case when", " 1!=1 ", $data_value);
	$data_value = str_replace("DELAY", " 1!=1 ", $data_value);
	$data_value = str_replace("delay", " 1!=1 ", $data_value);
	$data_value = str_replace("SLEEP", " 1!=1 ", $data_value);
	$data_value = str_replace("sleep", " 1!=1 ", $data_value);
	$data_value = str_replace("WAITFOR", " 1!=1 ", $data_value);
	$data_value = str_replace("waitfor", " 1!=1 ", $data_value);
	$data_value = str_replace("BENCHMARK", " 1!=1 ", $data_value);
	$data_value = str_replace("benchmark", " 1!=1 ", $data_value);
	$data_value = str_replace("*", " 1!=1 ", $data_value);
	$data_value = str_replace("+", " 1!=1 ", $data_value);
	$data_value = str_replace("SYSDATE", " 1!=1 ", $data_value);
	$data_value = str_replace("sysdate", " 1!=1 ", $data_value);
	return $data_value;
}


?>