<?php 
include 'db_connect.php';
$variable=$_POST["opcion"];
							


                                                $municipios = $conn->query("SELECT * from municipios_lista WHERE id_departamento=$variable;");
                                                while($row=$municipios->fetch_assoc()):
                                                ?>
                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['municipio'] ?></option>
                                                <?php endwhile; ?>