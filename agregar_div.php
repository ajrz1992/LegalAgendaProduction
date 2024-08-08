<?php
    include 'db_connect.php';
    $where = " where t.empresa='{$_SESSION['login_empresa']}'";
					if($_SESSION['login_type'] == 0)
						$where = " where t.employee_id = '{$_SESSION['login_id']}' and t.empresa='{$_SESSION['login_empresa']}'";
					elseif($_SESSION['login_type'] == 1)
						$where = " where e.evaluator_id = {$_SESSION['login_id']} and e.empresa='{$_SESSION['login_empresa']}'";

					$qry = $conn->query("SELECT t.*,concat(e.lastname,', ',e.firstname,' ',e.middlename) as name FROM task_list t inner join employee_list e on e.id = t.employee_id $where order by unix_timestamp(t.date_created) asc");
					while($row= $qry->fetch_assoc()):
						$trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
						unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
						$desc = strtr(html_entity_decode($row['description']),$trans);
						$desc=str_replace(array("<li>","</li>"), array("",", "), $desc);
                    ?>	
                    <?php echo '<div> ucwords($row["task"])?></div>' ?>
    <?php endwhile; ?>