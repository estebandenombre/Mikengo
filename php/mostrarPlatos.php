<?php
// Supongamos que ya tienes una conexión a la base de datos llamada $pdo
function obtenerSeccionesYPlatos()
{
    require_once('conexion_db.php');
    try {
        $consultaSecciones = "SELECT * FROM secciones";
        $resultadoSecciones = $pdo->query($consultaSecciones);

        $seccionesPlatos = array();

        while ($seccion = $resultadoSecciones->fetch(PDO::FETCH_ASSOC)) {
            $seccionPlato = array(
                'nombre_seccion' => $seccion['nombre_seccion'],
                'platos' => array()
            );

            $consultaPlatos = "SELECT * FROM platos WHERE id_seccion = " . $seccion['id_seccion'];
            $resultadoPlatos = $pdo->query($consultaPlatos);

            while ($plato = $resultadoPlatos->fetch(PDO::FETCH_ASSOC)) {
                $platoInfo = array(
                    'nombre_plato' => $plato['nombre_plato'],
                    'descripcion' => $plato['descripcion'],
                    'precio' => number_format($plato['precio'], 2) . ' €'
                );

                $seccionPlato['platos'][] = $platoInfo;
            }

            $seccionesPlatos[] = $seccionPlato;
        }

        return $seccionesPlatos;
    } catch (PDOException $e) {
        // En caso de error en la consulta, puedes manejarlo aquí
        die("Error en la consulta: " . $e->getMessage());
    }
}
