<?php
error_reporting(-1);
mb_internal_encoding('utf-8');
header('Content-Type: text/html; charset=utf-8');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<table width=100%  cellspacing="0">

    <tr>

        <td width="15%"></td> <td width="69%" bgcolor="#CCCCCC">


        </td><td width="15%"></td>

    </tr>

    <tr>

        <td width="15%"></td> <td width="69%">

            <div class="nuspace">&nbsp<br><br></div>

            <?php

            include '../cs/conect.php';

            //var_dump($link);

            $link->real_query("SELECT * FROM test");

            $res = $link->use_result();

            while ($row = $res->fetch_assoc()) {

                ?>

                <div class="nuspace">&nbsp<br><br></div>

                <div class="shadow">

                    <table border='0' align='top' width='100%'>

                        <tr>

                            <td width='8%'></td>

                            <td><H2>

                                    <?php

                                    echo $row['test2'];

                                    ?>

                                    <H2>

                            </td>

                            <td  width='10%'>



                            </td>

                        </tr>

                        <td  colspan='3'><br /> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

                            <?php

                            echo "\n";

                            echo $row['test3'];

                            ?>

                        </td>

                        </tr>

                        <tr>

                            <td></td>

                            <td></td>

                            <td align='center'><br>

                                <?php

                                echo $row['test'];

                                ?>

                            </td>

                        </tr>

                    </table>

                    <br></div>

                <?php

            }

            ?>

        </td> <td width="15%"></td>

    </tr>

</table>
?>
</body>
</html>